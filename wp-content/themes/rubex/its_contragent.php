<?php
//require __DIR__ .'/wp-load.php';
require_once $_SERVER['DOCUMENT_ROOT']."/wp-load.php";

/*Класс для получения данных с ЕГРЮЛ по ИНН*/

class CISContragentITS {
    //Подключение к веб сервису

    public static function ConnectToService($login,$password){
        GLOBAL $APPLICATION;
            
        if (!function_exists('is_soap_fault')){
           // $APPLICATION->ThrowException('Не настроен web сервер. Не найден модуль php-soap.');
            return new WP_Error('server', 'Не настроен web сервер. Не найден модуль php-soap.');
        }
        try {
        $client = new SoapClient("https://api.orgregister.1c.ru/orgregister/v7?wsdl",
                              array('login' => $login,
                                    'password' => $password,
                                    'cache_wsdl' => WSDL_CACHE_NONE,
                                    'exceptions' => true,
                                    'trace' => 1));
        }catch(SoapFault $e) {
            //$APPLICATION->ThrowException('Ошибка подключения к веб сервису или внутреняя ошибка.'.print_r($e,true));
            return new WP_Error('server', 'Ошибка подключения к веб сервису или внутреняя ошибка. <pre>'.print_r($e,true).'</pre>');
        }
        
        if (is_soap_fault(Client)){
          //  $APPLICATION->ThrowException('Ошибка подключения к веб сервису или внутреняя ошибка.');
            return new WP_Error('server', 'Ошибка подключения к веб сервису или внутреняя ошибка.');
        }
        return $client ;
              
    }
        
    //Проверка ИНН    
    public static function CheckINN($inn){
        if ( preg_match('/\D/', $inn) ) return false;
            
        $inn = (string) $inn;
        $len = strlen($inn);
            
        if ( $len === 10 )
        {
            return $inn[9] === (string) (((
                2*$inn[0] + 4*$inn[1] + 10*$inn[2] +
                3*$inn[3] + 5*$inn[4] + 9*$inn[5] +
                4*$inn[6] + 6*$inn[7] + 8*$inn[8]
            ) % 11) % 10);
        }
        elseif ( $len === 12 )
        {
            $num10 = (string) (((
                 7*$inn[0] + 2*$inn[1] + 4*$inn[2] +
                10*$inn[3] + 3*$inn[4] + 5*$inn[5] +
                 9*$inn[6] + 4*$inn[7] + 6*$inn[8] +
                 8*$inn[9]
            ) % 11) % 10);
                
            $num11 = (string) (((
                3*$inn[0] + 7*$inn[1] + 2*$inn[2] +
                4*$inn[3] + 10*$inn[4] + 3*$inn[5] +
                5*$inn[6] + 9*$inn[7] + 4*$inn[8] +
                6*$inn[9] + 8*$inn[10]
            ) % 11) % 10);
                
            return $inn[11] === $num11 && $inn[10] === $num10;
        }
            
        return false;
    }
        
    //Определить тип ИНН, организация или ИП
    public static function TypeInn($inn){
        $len = strlen($inn);
        if($len == 10){
            return "Corporation";
        }else{
            return "Entrepreneur";
        }
    }
        
    // Транслит ключей массива
    public static function TranslitArray($array){
        GLOBAL $APPLICATION;
        $arNew = array();
        foreach($array as $name=>$ar){
                $trans = Cutil::translit($APPLICATION->ConvertCharset($name,
                'UTF-8', SITE_CHARSET),"ru",array("change_case"=>false));    
                if(is_array($ar)){
                        $arNew[$trans] = self::TranslitArray($ar);
                }else
                {
                        $arNew[$trans] = $APPLICATION->ConvertCharset($ar,
                        'UTF-8', SITE_CHARSET);
                }
        }
        return $arNew;
    }
    
    // Собираем ЧПА из массива 
    public static function ParseAddress($arAddress){
      if(empty($arAddress)){
        return "";        
      }
      
      $ar['FULL'] = "";
      $ar['NUMBER'] = "";
      
      $ar['INDEX'] = $arAddress['Sostav']['enc_value']['DopAdrEl'][0]['Znachenie'];
      $ar['COUNTRY'] = $arAddress['Strana'];
      
      
      $arTypes = self::TypeObjects();
      
     // номера
     
     foreach($arAddress['Sostav']['enc_value']['DopAdrEl'] as $k=>$arDetail){
            $num = $k+1;
            if(!empty($arDetail['Nomer'])){
                $ar['NUMBER'].=  $arTypes[$arDetail['Nomer']['Tip']]['SHORT']."".$arDetail['Nomer']['Znachenie'];
                
                if($num!=count($arAddress['Sostav']['enc_value']['DopAdrEl'])){
                    $ar['NUMBER'].=", ";    
                }
            }

            
     }
      
            
      //субект 
      $ar['SUBEKT'] = self::Ucfirst(ToLower($arAddress['Sostav']['enc_value']['SubektRF']));
      $ar['CITY'] = self::Ucfirst(ToLower($arAddress['Sostav']['enc_value']['Gorod']));
      
      //улица
      $ar['STREET'] = self::Ucfirst(ToLower($arAddress['Sostav']['enc_value']['Ulitsa']));
      
      
      if(!empty($ar['INDEX'])){
        $ar['FULL'].=$ar['INDEX'].", ";  
      }
      
      if(!empty($ar['SUBEKT'])){
        $ar['FULL'].=$ar['SUBEKT'].", ";
      }
      
      if(!empty($ar['CITY'])){
        if(!is_array($ar['CITY'])){
            $ar['FULL'].=$ar['CITY'].", ";
        }
      }
      
      if(!empty($ar['STREET'])){
        $ar['FULL'].=$ar['STREET'].", ";
      }
      
      if(!empty($ar['NUMBER'])){
        $ar['FULL'].=$ar['NUMBER'];
      }
      
      
        return $ar; 
      
    }
    
    // Первый символ в верхний регистр 
    public static function Ucfirst($str){
        $str[0] = ToUpper($str[0]);
        return $str;   
    }
    
    //Расшифровка типов объекта по кодам  
    public static function TypeObjects(){
        $arRes = array();
        $arRes["1010"] = array("NAME"=>"Дом","SHORT"=>"д.");
        $arRes["1020"] = array("NAME"=>"Владение","SHORT"=>"вл.");
        $arRes["1030"] = array("NAME"=>"Домовладение","SHORT"=>"двл.");
        $arRes["1050"] = array("NAME"=>"Корпус","SHORT"=>"корп.");
        $arRes["1060"] = array("NAME"=>"Строение","SHORT"=>"стр.");
        $arRes["1070"] = array("NAME"=>"Сооружение","SHORT"=>"соор.");
        $arRes["1080"] = array("NAME"=>"Литера","SHORT"=>"лит.");
        $arRes["1040"] = array("NAME"=>"Участок","SHORT"=>"уч.");
        $arRes["2010"] = array("NAME"=>"Квартира","SHORT"=>"кв.");
        $arRes["2030"] = array("NAME"=>"Офис","SHORT"=>"оф.");
        $arRes["2040"] = array("NAME"=>"Бокс","SHORT"=>"бокс");
        $arRes["2020"] = array("NAME"=>"Помещение","SHORT"=>"пом.");
        $arRes["2050"] = array("NAME"=>"Комната","SHORT"=>"ком.");
        
        return $arRes; 
    }   
  
    
        
    //Получить данные по ИНН для ИП
    public static function getEntrepreneurRequisitesByINN($client,$inn,$conf){
        //GLOBAL $APPLICATION;
        
        //$inn = $APPLICATION->ConvertCharset($inn,SITE_CHARSET,'UTF-8');
        //$conf = $APPLICATION->ConvertCharset($conf,SITE_CHARSET,'UTF-8');
        
        if (is_object($client)){
            try {
              $arPar = array('INN' =>
              $inn,"configurationName"=>$conf);
              $res = $client->getEntrepreneurRequisitesByINN($arPar);
            } catch (SoapFault $e) {
              //  $APPLICATION->ThrowException('Ошибка подключения к веб сервису или внутреняя ошибка.'.print_r($e,true));
                
				return new WP_Error('server', 'Ошибка подключения к веб сервису или внутреняя ошибка. <pre>'.print_r($e,true)."</pre>");
            }
          }
          else{
            //$APPLICATION->ThrowException('Ошибка подключения к веб сервису или внутреняя ошибка.');
            return new WP_Error('server', 'Ошибка подключения к веб сервису или внутреняя ошибка.');
          }
		  
        return $res;
    }
        
     //Получить данные по ИНН для Организаций
    public static function getCorporationRequisitesByINN($client,$inn,$conf){
        //GLOBAL $APPLICATION;
        //$inn = $APPLICATION->ConvertCharset($inn,SITE_CHARSET,'UTF-8');
        //$conf = $APPLICATION->ConvertCharset($conf,SITE_CHARSET,'UTF-8'); 
        if (is_object($client)){
            try {
              $arPar = array('INN' =>
              $inn,"configurationName"=>$conf);
              $res = $client->getCorporationRequisitesByINN($arPar);
            } catch (SoapFault $e) {
               // $APPLICATION->ThrowException('Ошибка подключения к веб сервису или внутреняя ошибка.'.print_r($e,true));
				
				return new WP_Error('server', 'Ошибка подключения к веб сервису или внутреняя ошибка.<pre>'.print_r($e,true)."</pre>");
                return false;
            }
          }
          else{
				//$APPLICATION->ThrowException('Ошибка подключения к веб сервису или внутреняя ошибка.');
				return new WP_Error('server', 'Ошибка подключения к веб сервису или внутреняя ошибка.');
            return false;
          }
        return $res;
    }
    
    

}



?>