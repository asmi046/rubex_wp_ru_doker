<?php

//-----------------Подключение JWT

require_once __DIR__.'/jwt/BeforeValidException.php';
require_once __DIR__.'/jwt/ExpiredException.php';
require_once __DIR__.'/jwt/SignatureInvalidException.php';
require_once __DIR__.'/jwt/JWT.php';
	
use \Firebase\JWT\JWT;

//-----------------Получение файлов от файлового хранилища

function get_files_from_server($contragent_id, $guid) {
	$key = 'QWERQEWRS$$Rsdfg3443';
	$token = array("user" => $contragent_id,  "iat" => 1502291193);

	$jwt = JWT::encode($token, $key);
	$decoded = JWT::decode($jwt, $key, array('HS256'));
	
	SetCookie('token', $jwt, 0, "/", "rubexgroup.ru");
	
	$decoded_array = (array) $decoded;
	
	$out = array();
	
	if( $curl = curl_init() ) {
		curl_setopt($curl, CURLOPT_URL, 'http://91.240.210.200/files');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($curl, CURLOPT_COOKIE, "token=".$jwt);
		
		$out = curl_exec($curl);
		if (!empty(curl_error($curl))) 
		{
			curl_close($curl);
			return NULL;
		}
		curl_close($curl);
	}
	$out = json_decode($out,true);
	$outRez = array(); 
	foreach ($out["files"] as $outElem)
	{
		if ($guid !== $outElem["order"]) continue;
		
		foreach ($outElem["files"] as $zakfileselem) {
			
			$outRez[$outElem["order"]][] = array(
				"url" => $zakfileselem["url"],
				"name" => $zakfileselem["name"],
				"size" => $zakfileselem["size"],
				"type" => $zakfileselem["type"]

			);
			
		}
	}
	return $outRez;

}

  function generate_password($number)  
  {  
    $arr = array('a','b','c','d','e','f',  
                 'g','h','i','j','k','l',  
                 'm','n','o','p','r','s',  
                 't','u','v','x','y','z',  
                 'A','B','C','D','E','F',  
                 'G','H','I','J','K','L',  
                 'M','N','O','P','R','S',  
                 'T','U','V','X','Y','Z',  
                 '1','2','3','4','5','6',  
                 '7','8','9','0','.',',',  
                 '(',')','[',']','!','?',  
                 '3','^','%','@','*','$',  
                 'f','2','f','4','+','-',  
                 '{','}','d','~');  
    // Генерируем пароль  
    $pass = "";  
    for($i = 0; $i < $number; $i++)  
    {  
      // Вычисляем случайный индекс массива  
      $index = rand(0, count($arr) - 1);  
      $pass .= $arr[$index];  
    }  
    return $pass;  
  }  

function translit_m($s) {
  $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'',' '=>'-'));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
  return $s; // возвращаем результат
}

function set_html_content_type() {
	return 'text/html';
}

//пересчитать корзину
function recalcBascet() {
	global $wpdb;
	$bascet = $wpdb->get_results("SELECT * FROM `wp_im_basket` WHERE `email` = '".getSalerData("mail")."'",  ARRAY_A);
	
	foreach ($bascet as $b) { 
		$priceLine = getPrice($b["count"],$b["price"],$b["minPrice"],$b["gost"],mencode2($b["inskl"],"herli"),"","");
		//print_r(json_decode(stripcslashes($_COOKIE['selContragent']),true));
		
		//print_r($b["count"]."|".$b["price"]."|".$b["minPrice"]."|".$b["gost"]."|".$b["inskl"]);
		
		
		//print_r($priceLine);
		
		$repData = array("nal" => strip_tags($priceLine["nal"]),
				"count" => $b["count"],
				"sale" => $priceLine["sale"],
				"salePrice" => $priceLine["pricesale"],
				"summPos" => $priceLine["sumsale"],
		);
		
		print_r($repData);
		
		
		$bascetUpdate = $wpdb->update("wp_im_basket", $repData,
								array ("email" => getSalerData("mail"), 
										"idElem" => $b["idElem"])
										);
		
		
	}

		
	summCalculate();
}

// выбранный контрагент запись в куку {
function setSelContragent($ctrg,$sendetMail){
	global $wpdb;
	
	$qMail = !empty($sendetMail)?$sendetMail:getSalerData("mail");
	
	if ($ctrg < 0) {
		$contr = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".$qMail."'", ARRAY_A);
	} else {
		$contr = $wpdb->get_results("SELECT * FROM `wp_im_contragent` WHERE `id`='".$ctrg."'", ARRAY_A);
	}
	
	
	
	$loyalityQ = $wpdb->get_results("SELECT * FROM `wp_im_loyality_transfer` WHERE `conragent_id`='".$contr[0]["conragent_id"]."'", ARRAY_A);
	$loyality = (empty($loyalityQ))?0:$loyalityQ[0]["sale"];
		
		
	$rezArray = array(
					"caId" => $ctrg, 
					"psale" => $loyality, 
					"rezident" => $contr[0]["Rezedent"], 
					"org" => $contr[0]["RPorg"], 
					"obr" => $contr[0]["RPsname"]." ".$contr[0]["RPname"]." ".$contr[0]["RPfname"],
					"inn" => (!empty($contr[0]["rezerv"]))?$contr[0]["rezerv"]:$contr[0]["RPinn"],
					"kpp" => $contr[0]["RPkpp"],
					"caid" => $contr[0]["conragent_id"],
					);
	$rezCookie = json_encode($rezArray);
	
	SetCookie('selContragent', $rezCookie, 0, "/", "rubexgroup.ru");

	return $rezArray;
}



	//Шифрование при передаче параметров
	function miencode($String, $Password)
	{
		$Salt='BGuxLWQtKweKEMV4';
		$StrLen = strlen($String);
		$Seq = $Password;
		$Gamma = '';
		while (strlen($Gamma)<$StrLen)
		{
			$Seq = pack("H*",sha1($Gamma.$Seq.$Salt));
			$Gamma.=substr($Seq,0,8);
		}
	   
		return $String^$Gamma;
	}
	
	
	function mencode2($unencoded,$key){//Шифруем
		$string=base64_encode($unencoded);//Переводим в base64

		$arr=array();//Это массив
		$x=0;
		while ($x++< strlen($string)) {//Цикл
		$arr[$x-1] = md5(md5($key.$string[$x-1]).$key);//Почти чистый md5
		$newstr = $newstr.$arr[$x-1][3].$arr[$x-1][6].$arr[$x-1][1].$arr[$x-1][2];//Склеиваем символы
		}
		return $newstr;//Вертаем строку
	}

	function mdecode2($encoded, $key){//расшифровываем
		$strofsym="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM=";//Символы, с которых состоит base64-ключ
		$x=0;
		while ($x++<= strlen($strofsym)) {//Цикл
		$tmp = md5(md5($key.$strofsym[$x-1]).$key);//Хеш, который соответствует символу, на который его заменят.
		$encoded = str_replace($tmp[3].$tmp[6].$tmp[1].$tmp[2], $strofsym[$x-1], $encoded);//Заменяем №3,6,1,2 из хеша на символ
		}
		return base64_decode($encoded);//Вертаем расшифрованную строку
	}
	
	
	
	//Разбиение по заказам
	function gesZakStruk($rezCookie)
	{
		$rez = null;
		if (!empty($rezCookie)){
			
			for ($i =0; $i<count($rezCookie); $i++)
			{
				//$rez[$rezCookie[$i]["sklad"]][] = $rezCookie[$i]; 
				$rez[$rezCookie[$i]["sklad"].", производство: ".$rezCookie[$i]["geo"]][] = $rezCookie[$i]; 
			}
			
		}
		return $rez;
	}
	
	//--------удаление корзины и очистка куки
	
	function deleteBascet() {
		global $wpdb;
		$bascet = $wpdb->delete("wp_im_basket", array ("email" => getSalerData("mail")));
		SetCookie("imTovarBascetItog", "", 0, "/", "rubexgroup.ru");
		SetCookie("imTovarBascet", "", 0, "/", "rubexgroup.ru");
	}
	
	//--------подсчет суммы корзины и запись в куку
	function summCalculate() {
		global $wpdb;
		$bascet = $wpdb->get_results("SELECT * FROM `wp_im_basket` WHERE `email` = '".getSalerData("mail")."'",  ARRAY_A);
		
		
		$summ = 0;					
		$summZakSale = 0;
		$summZakNoSale = 0;
				
		$cooke_bascet_elem = "";		
				
		foreach ($bascet as $b) {
			$summ+=$b["summPos"];
			$summZakSale = $summZakSale+$b["summPos"];
			$summZakNoSale = $summZakNoSale + ($b["price"]*$b["count"]);	
			$cooke_bascet_elem .= $b["idElem"]."|";
		}
				
		$rezident = getContragentData("rezident");
								
		if ($rezident == 1)
			$summ = $summZakSale * 1.20;
		else $summ = $summZakSale;
				
		if ($rezident == 1)
			$nds = $summ * (1 - 1 / 1.20);
		else $nds = 0;
				
		$sale = $summZakNoSale-$summZakSale;	
		
		$rezCookieBascet.= $summ."|".$sale."|".$nds."|".$summZakSale;	
		SetCookie("imTovarBascetItog", $rezCookieBascet, 0, "/", "rubexgroup.ru");
		SetCookie("imTovarBascet", $cooke_bascet_elem, 0, "/", "rubexgroup.ru");
	}
	
	//рассчет цены ЕСЦ 2.0

	function esc2PriceCalc($caId, $gost, $name, $carecter) {
		global $wpdb;
		$rez = $wpdb->get_results('SELECT * FROM `wp_im_tov_discount_transfer` WHERE `conragent_id` = "'.$caId.'" AND `gost` = "'.$gost.'" AND `name` = "'.$name.'" AND `namCharecter` = "'.$carecter.'"'); 
		
		if (!empty($rez)) {
			return 	$rez[0]->discount;
		} else {
			$rez = $wpdb->get_results('SELECT * FROM `wp_im_tov_discount_transfer` WHERE `conragent_id` = "'.$caId.'" AND `gost` = "'.$gost.' AND `name` = "'.$name.'" AND `namCharecter` = "'.$carecter.'"'); 
			return 	$rez[0]->discount;
		}
		
		return 0;
	}

	//рассчет цены
	function getPrice($count, $price, $minprice, $gost, $nal, $name, $carecter)
	{
		
		
		$zakSumm = $price * $count;
		$pType = getSalerData("type");
		$saleSystem = getContragentData("psale");
		
		global $wpdb;
		$sSys = $wpdb->get_results("SELECT * FROM `wp_im_sales_transfer` WHERE `gost` = '".$gost."' AND `count_ot` < ".$count." AND `count_do` >= ".$count." AND `price_ot` < ".$zakSumm." and price_do >= ".$zakSumm.";", ARRAY_A);
		$q = "SELECT * FROM `wp_im_sales_transfer` WHERE `gost` = '".$gost."' AND `count_ot` < ".$count." AND `count_do` >= ".$count." AND `price_ot` < ".$zakSumm." and price_do >= ".$zakSumm.";";
		
		if ((isset($sSys))&&($sSys != NULL))
		{
			if ($pType == 1)
				$saleSystem += $sSys[0]["sale_Pr"];
			else $saleSystem += $sSys[0]["sale"];
		}

		$esc2Sale = esc2PriceCalc(getContragentData("caid"), $gost, $name, $carecter);
		$saleSystem +=$esc2Sale;


		$priceZaEd = round($price-($price*($saleSystem/100)),2);
		
		$minprice =  mdecode2($minprice, "herli");
		
		$fl = 0;
		if ($priceZaEd < $minprice)
		{
			$priceZaEd = $minprice; 
			$fl = 1;
		}
		
		$wpdb->insert("wp_im_bedaction",array(
			"caid" => getContragentData("caid"),
			"org" => getContragentData("org"),
			"inn" => getContragentData("inn"),
			"tovar" => $gost,
			"count" => $count
		));
		
		//print_r(miencode($sklad, "herli"));
		return array("nal" => ostatokView($count,mdecode2($nal, "herli")), "sale" => $saleSystem, "pricesale" => $priceZaEd, "sumsale" => ($priceZaEd*$count), "test" =>$esc2Sale);
	}

	//Вывод наличия по складу
	function ostatokView($size,$nal) {
		if (empty($nal)) return "<span class = 'nalShdat'>Под заказ</span>";
		if ($size>$nal) return "<span class = 'nalNehv'>На складе: ".$nal."</span>";
		if ($size<=$nal) return "<span class = 'nalEst'>В наличии</span>";
	}
	
	function ostatokGetView($nal) { 
		if (strcmp($nal, "Под заказ") == 0) return "<span class = 'nalShdat'>Под заказ</span>";
		if (strcmp($nal, "В наличии") == 0) return "<span class = 'nalEst'>В наличии</span>";
		return "<span class = 'nalNehv'>".$nal."</span>";
	}
	
	//проценка
	function priceup($price, $priceUp) {
		return round($price * (1+($priceUp/100)),2);
	}
	
	//верификация пользователя на странице
	function userVeryfy() {
		$rez = false;
		if (isset($_COOKIE['RPlogin2'])){
			$data = json_decode(stripcslashes($_COOKIE['RPlogin2']),true);
			global $wpdb;
			$rezinBase = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".$data["mail"]."' AND `RPPasword` = '".$data["p"]."'", ARRAY_A);
			$rez = !empty($rezinBase);
		}
		return $rez; 
	}
	
	//Данные из Кукиз
	function getSalerData($s) {
		$rez = false;
		if (isset($_COOKIE['RPlogin2'])){
			$data = json_decode(stripcslashes($_COOKIE['RPlogin2']),true);
			$rez = $data[$s];
		}
		return $rez; 
	}
	
	//Данные из Кукиз контрагента 
	function getContragentData($s) {
		$rez = false;
		if (isset($_COOKIE['selContragent'])){
			$data = json_decode(stripcslashes($_COOKIE['selContragent']),true);
			$rez = $data[$s];
		}
		return $rez; 
	}
	
	function getDefGeo($gost) {
		
		global $wpdb;
		//$rezSZRT = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` WHERE `gost` = '".$gost."' AND `geo` LIKE 'СЗРТ' AND `price` != 0", ARRAY_A);
		//$rezKRT = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` WHERE `gost` = '".$gost."' AND `geo` LIKE 'КРТ' AND `price` != 0", ARRAY_A);
		$rezSZRT = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` WHERE `gost` = '".$gost."' AND `geo` LIKE 'СЗРТ' AND `price` != 0 UNION ALL (SELECT * FROM `wp_im_product_transfer_no` WHERE `gost` = '".$gost."' AND `geo` LIKE 'СЗРТ' AND `price` != 0)", ARRAY_A);
		$rezKRT = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` WHERE `gost` = '".$gost."' AND `geo` LIKE 'КРТ' AND `price` != 0 UNION ALL (SELECT * FROM `wp_im_product_transfer_no` WHERE `gost` = '".$gost."' AND `geo` LIKE 'КРТ' AND `price` != 0)", ARRAY_A);
		if (!empty($rezSZRT)&&(!empty($rezKRT))) return 2;
		if (!empty($rezKRT)) return 1;
		if (!empty($rezSZRT)) return 0;
		return -1;
	}
	
	
	
	//-----оформление заказа
	add_action( 'wp_ajax_oformlenie_z', 'oformlenie_z' );
	add_action( 'wp_ajax_nopriv_oformlenie_z', 'oformlenie_z' );
	
	function oformlenie_z() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			global $wpdb;
			$bascetElems = $wpdb->get_results("SELECT * FROM `wp_im_basket` WHERE `email` = '".getSalerData("mail")."'", ARRAY_A);
			
			/*
			$bascetElems = $wpdb->get_results("
							SELECT `wp_im_basket`.*, 
								   `wp_im_tk_param_transfer`.`obves`,
								   `wp_im_tk_param_transfer`.`ves` 
							FROM `krtiru_site2015`.`wp_im_basket` LEFT JOIN `krtiru_site2015`.`wp_im_tk_param_transfer` ON 
								(`wp_im_basket`.`name` = `wp_im_tk_param_transfer`.`name`) AND  
								(`wp_im_basket`.`rgNumber` = `wp_im_tk_param_transfer`.`rgNumber`) AND 
								(`wp_im_basket`.`cherecter` = `wp_im_tk_param_transfer`.`namCharecter`)
							WHERE `wp_im_basket`.`email` = 'asmi-work046@yandex.ru'", ARRAY_A);
			
			*/
			
			$zaks = gesZakStruk($bascetElems);
						
			foreach($zaks as $key => $value)
			{
				$summ = 0;					
				$summZakSale = 0;
				$summZakNoSale = 0;
				
				$summObves = 0;
				$summVes = 0;
				
				$allrezerv = 1;
				
				for ($i = 0; $i < count($value); $i++)
				{
					$summ+=$value[$i]["summPos"];
					$summZakSale = $summZakSale+$value[$i]["summPos"];
					$summZakNoSale = $summZakNoSale + ($value[$i]["price"]*$value[$i]["count"]);	
					
					$summObves += $value[$i]["obves"]*$value[$i]["count"];
					$summVes += $value[$i]["ves"]*$value[$i]["count"];
					
					if (strcmp($value[$i]["nal"], "В наличии") != 0) $allrezerv = 0;
				}
				
				$rezident = getContragentData("rezident");
								
				if ($rezident == 1)
					$summ = $summZakSale * 1.20;
				else $summ = $summZakSale;
				
				if ($rezident == 1)
					$nds = $summ * (1 - 1 / 1.20);
				else $nds = 0;
				
				$sale = $summZakNoSale-$summZakSale;
				
				$comment = "";
				if ($_REQUEST["delivery"] == "Уточнить") {
					$comment = "Уточнить стоимость доставки, Объемный вес: ".$summObves." Вес: ".$summVes;
				}
				
				
				$zakazID = 'zak'.date("d").date("m").date("Y").date("H").date("i").date("s").translit_m($key);
				
				$zakMailText = "<table style = 'width:100%; text-align:left;'>";
				$zakMailText .= "<thead>";
				$zakMailText .= "<tr>";
				$zakMailText .= "<th>Наименование</th>";
				$zakMailText .= "<th>Количество</th>";
				$zakMailText .= "<th>Цена</th>";
				$zakMailText .= "<th>Скидка</th>";
				$zakMailText .= "<th>Цена со скидкой</th>";
				$zakMailText .= "<th>Итого</th>";
				$zakMailText .= "</tr>";
				$zakMailText .= "</thead>";
				$zakMailText .= "<tbody>";
			
				$rezdab = false;
				for ($i = 0; $i < count($value); $i++)
				{
					global $wpdb;
					
					$dataAdd = array('status' => "Загружен", //1
						  'ca_id' => $_REQUEST["conragent_id"], //2
						  'magZakId' => $zakazID, //3
						  'ca_mail' => $_REQUEST["mail"], //4
						  'ca_inn' => $_REQUEST["inn"], //5
						  'ca_kpp' => $_REQUEST["kpp"], //6
						  'ca_org' => $_REQUEST["org"], //7
						  'zak_sale' => $sale, //8
						  'zak_summ' => $summ, //9
						  'zak_nds' => $nds, //10
					 
						  'tov_name' => $value[$i]["name"], //11
						  'tov_cherecter' => $value[$i]["cherecter"], //12
						  'tov_gost' => $value[$i]["gost"], //13
						  'tov_price' => $value[$i]["price"], //14
						  'tov_min_price' => $value[$i]["minPrice"], //15
						  'tov_count' => $value[$i]["count"], //16
						  'tov_sale' => $value[$i]["sale"], //17
						  'tov_sale_price' => $value[$i]["salePrice"], //18
						  'tov_summ' => $value[$i]["summPos"], //19
						  'tov_weight' => "", //20
						  'tov_rgnumber' => $value[$i]["rgNumber"], //21
						  'tov_geo' => $value[$i]["geo"], //22
						  'sklad' => $value[$i]["sklad"], //23
						  'type' => $value[$i]["nal"], //24
						  'comment' => $comment." ".$_REQUEST["comment"], //25
						  'sms_number' => "+79103123696", //26
						  'allrezerv' => $allrezerv, //27
						  
						  );
						  
						  $zakMailText .= "<tr>";
							$zakMailText .= "<td>".$value[$i]["name"]." ".$value[$i]["tov_cherecter"]."</td>";
							$zakMailText .= "<td>".$value[$i]["count"]."</td>";
							$zakMailText .= "<td>".$value[$i]["price"]."</td>";
							$zakMailText .= "<td>".$value[$i]["sale"]."</td>";
							$zakMailText .= "<td>".$value[$i]["salePrice"]."</td>";
							$zakMailText .= "<td>".$value[$i]["summPos"]."</td>";
							$zakMailText .= "";
						  $zakMailText .= "</tr>";
					
					//echo "<pre>";
					//print_r($dataAdd);
					//echo "</pre>";
					
					$rezdab  = $wpdb->insert(
					'wp_im_zakaz_transfer',
					$dataAdd
					//array("%s", "%s", "%s", "%s", "%s", "%s", "%s", "%f", "%f", "%f", "%s", "%s", "%s", "%f", "%f", "%d", "%f", "%f", "%d", "%s", "%s", "%s", "%s", "%s", "%s", "%d")
					);
					
					//$wpdb->show_errors(); // включит показ ошибок
					//$wpdb->print_error();
					//$wpdb->hide_errors(); // выключит показ ошибок
					
					
					
				}
				$zakMailText .= "</tbody>";
				$zakMailText .= "</table>";
				
				
					$headers = 'From: Холдинг RubEx Group <RubExGroup@yandex.ru>' . "\r\n";
					$mailContent = "В системе RubEx Price на Вашу организацию оформлен заказ:<br/>".
								   "Номер заказа: ".$zakazID."<br/>".
								   "Организация: ".$_REQUEST["org"]."<br/>".
								   "e-mail: ".$_REQUEST["mail"]."<br/>".
								   "<h2>Детали заказа</h2>".
								   $zakMailText.
								   "Сумма заказа: ".$summ."<br/>".
								   "Скидка: ".$sale."<br/>".
								   "НДС: ".$nds."<br/>";
								  
					add_filter( 'wp_mail_content_type', 'set_html_content_type' );
					wp_mail(array($_REQUEST["mail"], "vorobevav@rubexgroup.ru", "asmi046@gmail.com"), 'Оформлен новыз заказ в сервисе RubEx Price', $mailContent, $headers);
				

				
				global $wpdb;
				if (!empty($rezdab))
					{
						$wpdb->delete(
							'wp_im_basket',
							array("email" => $_REQUEST["mail"])
							);
				}
				
				
				
				$wpdb->insert("wp_im_zakaz_documents_transfer",
						array("magZakId" => $zakazID),
						array("%s")
				);
					
				$rezText .= "<h2>Номер закзаа: ".$zakazID."</h2>";
				$rezText .= "<strong>Сумма заказа: </strong>".$summZakSale."<br/>";
				$rezText .= "<strong>Заказ на склад: </strong>".$key."<br/>";
			}
			
			$rezText .= '<div class = "formButtonLine">';
			$rezText .= '<a class = "RMRegister RMRegisterBig RMRegisterRform" href = "'.get_permalink(20700).'"><div class = "trueButton redBtnCenter">Оформить новый заказ</div></a>';
			$rezText .= '<a class = "RMRegister RMRegisterBig RMRegisterRform" href = "'.get_permalink(20744).'"><div class = "trueButton redBtnCenter">История заказов</div></a>';
			$rezText .= '<a class = "RMRegister RMRegisterBig RMRegisterRform" href = "'.get_permalink(20738).'"><div class = "trueButton redBtnCenter">Личный кабинет</div></a>';
			$rezText .= '</div>';
			
			// setcookie('imTovarBascetItog', null, -1, '/');
			SetCookie("imTovarBascetItog", "", 0, "/", "rubexgroup.ru");
			wp_die($rezText);
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	

	//-----Вывод деталей заказа
	
	add_action( 'wp_ajax_get_zak_detale', 'get_zak_detale' );
	add_action( 'wp_ajax_nopriv_get_zak_detale', 'get_zak_detale' );
	
	function get_zak_detale() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
			$zaksInfo = $wpdb->get_results("SELECT * FROM `wp_im_zakaz_transfer` WHERE `ca_mail` LIKE '".getSalerData("mail")."' AND `magZakId` LIKE '".$_REQUEST['magZakId']."'",OBJECT);
		
			$rezText = "<div class = 'product-main__table'>";
			$rezText .= "<table>";
				$rezText .= "<tr class = 'thead-img'>";
					$rezText .= "<th>Наименование</th>";
					$rezText .= "<th>Цена оферты</th>";
					$rezText .= "<th>Количество</th>";
					$rezText .= "<th>Скидка</th>";
					$rezText .= "<th>Цена со скидкой</th>";
					$rezText .= "<th>Сумма</th>";
				$rezText .= "</tr>";
			
				$summ = 0;					
				$summZakSale = 0;
				$summZakNoSale = 0;
			
				foreach ($zaksInfo as $zi) {
					$rezText .= "<tr>";
						if (!empty($zi->tov_cherecter))
							$rezText .=  "<td>".$zi->tov_name." (".$zi->tov_cherecter.")</td>";
						else 
							$rezText .= "<td>".$zi->tov_name."</td>";
						$rezText .= "<td>".$zi->tov_price."</td>";
						$rezText .= "<td>".$zi->tov_count."</td>";
						$rezText .= "<td>".$zi->tov_sale."</td>";
						$rezText .= "<td>".$zi->tov_sale_price."</td>";
						$rezText .= "<td>".$zi->tov_summ."</td>";
					$rezText .= "</tr>";
					
					$summ+=$zi->tov_summ;
					$summZakSale = $summZakSale+$zi->tov_summ;
					$summZakNoSale = $summZakNoSale + ($zi->tov_price*$zi->tov_count);
					
				}
			$rezText .= "</table>";
			$rezText .= "</div>";
			
			if ($rezident == 1)
				$summ = $summZakSale * 1.20;
			else $summ = $summZakSale;
				
			if ($rezident == 1)
				$nds = $summ * (1 - 1 / 1.20);
			else $nds = 0;
				
			$sale = $summZakNoSale-$summZakSale;
		
		
			$rezText .= '<div class = "summRecalcBlk">';
				$rezText .= "Сумма заказа: <span class = 'itogPrice'>".number_format ($summ,2,",", " ")."</span> р.</br>";
				$rezText .= "В том числе НДС: <span class = 'itogNDS'>".number_format ($nds,2,",", " ")."</span> р.</br>";
				$rezText .= "Сумма скидки: <span class = 'itogSale'>".number_format ($sale,2,",", " ")."</span> р.</br>";
			$rezText .= '</div>';
		
		wp_die($rezText);
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	
	//-----Пересчет и повторение заказа
	
	add_action( 'wp_ajax_get_zak_newinfo_dok', 'get_zak_newinfo_dok' );
	add_action( 'wp_ajax_nopriv_get_zak_newinfo_dok', 'get_zak_newinfo_dok' );
	
	function get_zak_newinfo_dok() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			
			$rezText = "";
			$zakFiles = get_files_from_server($_REQUEST['ca_id'],$_REQUEST['id1c']);
			if (!empty($zakFiles)){					
				$rezText = "<h2>Документы по заказу</h2>";
				foreach ($zakFiles[$_REQUEST['id1c']] as $zakFilesElem) {
					$rezText .= '<i style = "color:#bf1e2e;" class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href = "'.$zakFilesElem["url"].'">'.$zakFilesElem["name"].'</a><br/>';
				}
			}
			
			
		wp_die($rezText);
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	
	//-----Пересчет и повторение заказа
	
	add_action( 'wp_ajax_get_zak_newinfo', 'get_zak_newinfo' );
	add_action( 'wp_ajax_nopriv_get_zak_newinfo', 'get_zak_newinfo' );
	
	function get_zak_newinfo() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
			$zaksInfo = $wpdb->get_results("SELECT * FROM `wp_im_zakaz_transfer` WHERE `ca_mail` LIKE '".getSalerData("mail")."' AND `magZakId` LIKE '".$_REQUEST['magZakId']."'",OBJECT);
			
			
			$rezText = "<table>";
				$rezText .= "<tr>";
					$rezText .= "<th>Наименование</th>";
					$rezText .= "<th>Цена оферты</th>";
					$rezText .= "<th>Количество</th>";
					$rezText .= "<th>Скидка</th>";
					$rezText .= "<th>Цена со скидкой</th>";
					$rezText .= "<th>Сумма</th>";
				$rezText .= "</tr>";
			
				$deletedFild = 0;
				$chengetFild = 0;
				
				$summ = 0;					
				$summZakSale = 0;
				$summZakNoSale = 0;
				
				foreach ($zaksInfo as $zi) {
					
						$newPosInfo = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` WHERE `rgNumber` = '".$zi->tov_rgnumber."' AND `name` = '".$zi->tov_name."' AND `namCharecter` = '".$zi->tov_cherecter."' AND `GEO` = '".$zi->tov_geo."'", OBJECT);
						
						$trColorClass = "trNoChenge";
						
						if ($zi->tov_price != $newPosInfo[0]->price) {
							$chengetFild++;
							$trColorClass = "trChenge";	
						}
						
						if (empty($newPosInfo)) {
							$deletedFild++;
							continue;
						}
						
						$priceLine = getPrice($zi->tov_count,$newPosInfo[0]->price,$newPosInfo[0]->min_price,$newPosInfo[0]->gost,$zi->type,"","");
					
					$rezText .= "<tr class ='".$trColorClass."' >";
						if (!empty($zi->tov_cherecter))
							$rezText .=  "<td>".$zi->tov_name." (".$zi->tov_cherecter.")</td>";
						else 
							$rezText .= "<td>".$zi->tov_name."</td>";
						$rezText .= "<td>".$newPosInfo[0]->price."</td>";
						$rezText .= "<td>".$zi->tov_count."</td>";
						$rezText .= "<td>".$priceLine["sale"]."</td>";
						$rezText .= "<td>".$priceLine["pricesale"]."</td>";
						$rezText .= "<td>".$priceLine["sumsale"]."</td>";
						
						$summ+=$priceLine["sumsale"];
						$summZakSale = $summZakSale+$priceLine["sumsale"];
						$summZakNoSale = $summZakNoSale + ($newPosInfo[0]->price*$zi->tov_count);
						
					$rezText .= "</tr>";
					
					if ($_REQUEST["infoType"] > 0) {
						$bascetData1 = array (
							"email" => getSalerData("mail"),
							"gost" => $zi->tov_gost,
							"name" => $zi->tov_name,
							"cherecter" => $zi->tov_cherecter,
							"rgNumber" => $zi->tov_rgnumber,
							"nal" => strip_tags($priceLine["nal"]),
							"inskl" => "",
							"sklad" => $zi->sklad,
							"geo" => $zi->tov_geo,
							"price" => $zi->tov_price, 
							"minPrice" => $zi->tov_min_price,
							"count" => $zi->tov_count, 
							"sale" => $priceLine["sale"],
							"salePrice" => $priceLine["pricesale"], 
							"summPos" => $priceLine["sumsale"],	
							"idElem" => $newPosInfo[0]->id.translit_m($zi->sklad)
						); 
						
						global $wpdb;
						$addRez = $wpdb->insert("wp_im_basket", $bascetData1, array("%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s", "%s", "%f", "%f", "%d", "%f", "%f", "%f", "%s"));
						
					}
				}
				

			$rezText .= "</table>";
			
			if ($rezident == 1)
				$summ = $summZakSale * 1.20;
			else $summ = $summZakSale;
				
			if ($rezident == 1)
				$nds = $summ * (1 - 1 / 1.20);
			else $nds = 0;
				
			$sale = $summZakNoSale-$summZakSale;
				
			$rezText .= '<div class = "summRecalcBlk">';
				$rezText .= "Сумма заказа: <span class = 'itogPrice'>".number_format ($summ,2,",", " ")."</span> р.</br>";
				$rezText .= "В том числе НДС: <span class = 'itogNDS'>".number_format ($nds,2,",", " ")."</span> р.</br>";
				$rezText .= "Сумма скидки: <span class = 'itogSale'>".number_format ($sale,2,",", " ")."</span> р.</br>";
			$rezText .= '</div>';
			
			$rezText .= "<span style = 'color:green'>Заказ пересчитан.</span></br>";
			
			if($chengetFild > 0)
				$rezText .= "<div style = 'background-color:#7cc576; width:13px;height:13px; display: inline-block;'></div> - позиции с измененной ценой </br>";
			if ($deletedFild > 0)
				$rezText .= "Из заказа удалено: ".$deletedFild." позиций отсутствующих в продаже</br>";
			
			
		wp_die($rezText);
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	
	
	//-----изменение куки с выбранным контрагентом
	
	add_action( 'wp_ajax_contragent_reload', 'contragent_reload' );
	add_action( 'wp_ajax_nopriv_contragent_reload', 'contragent_reload' );
	
	function contragent_reload() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
				setSelContragent($_REQUEST["contragentID"],null);
				
			wp_die("");
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	//-----пересчет корзины
	
	add_action( 'wp_ajax_recalc_bascet', 'recalc_bascet' );
	add_action( 'wp_ajax_nopriv_recalc_bascet', 'recalc_bascet' );
	
	function recalc_bascet() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
				recalcBascet();
			wp_die("");
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	add_action( 'wp_ajax_add_bascet', 'add_bascet' );
	add_action( 'wp_ajax_nopriv_add_bascet', 'add_bascet' );
	
	function add_bascet() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			//---------------------------------------------------------------------------------
			$rezCookieBascet = $_COOKIE['imTovarBascet'];
			$bascetData1 = array (
				"email" => getSalerData("mail"),
				"gost" => $_REQUEST["gost"],
				"name" => $_REQUEST["name"],
				"cherecter" => $_REQUEST["cherecter"],
				"rgNumber" => $_REQUEST["rgNumber"],
				"nal" => $_REQUEST["nal"],
				"inskl" => mdecode2($_REQUEST["inskl"], "herli"),
				"sklad" => $_REQUEST["sklad"],
				"geo" => $_REQUEST["geo"],
				"price" => $_REQUEST["price"], 
				"minPrice" => mdecode2($_REQUEST["minPrice"], "herli"),
				"count" => $_REQUEST["count"], 
				"sale" => $_REQUEST["sale"],
				"salePrice" => $_REQUEST["salePrice"], 
				"summPos" => $_REQUEST["summPos"],	
				"idElem" => $_REQUEST["idElem"]
			); 
			
			global $wpdb;
			$addRez = $wpdb->insert("wp_im_basket", $bascetData1, array("%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s", "%s", "%f", "%f", "%d", "%f", "%f", "%f", "%s"));
			
			$rezCookieBascet.= $_REQUEST["idElem"]."|";
			
			SetCookie("imTovarBascet", $rezCookieBascet, 0, "/", "rubexgroup.ru");
			
			summCalculate();
			//---------------------------------------------------------------------------------
			wp_die($bascetData1);
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}

	add_action( 'wp_ajax_get_bascet_info', 'get_bascet_info' );
	add_action( 'wp_ajax_nopriv_get_bascet_info', 'get_bascet_info' );
	
	function get_bascet_info() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			
			global $wpdb;
			$bascet = $wpdb->get_results("SELECT * FROM `wp_im_basket` WHERE `email` = '".getSalerData("mail")."'",  ARRAY_A);
		
			$bascet_elems = "";	
			
			foreach ($bascet as $b) {
				$bascet_elems .= $b["idElem"].";".$b["count"].";".$b["sale"].";".$b["salePrice"].";".$b["summPos"].";".$b["nal"]."|";
			}
			
			wp_die($bascet_elems);
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}

	
	add_action( 'wp_ajax_delete_in_bascet', 'delete_in_bascet' );
	add_action( 'wp_ajax_nopriv_delete_in_bascet', 'delete_in_bascet' );
	
	function delete_in_bascet() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			
			global $wpdb;
			$bascet = $wpdb->delete("wp_im_basket", array ("email" => getSalerData("mail"), "idElem" => $_REQUEST["idElem"]));
			summCalculate();
			
			/*
			$rezCookie = json_decode(stripcslashes($_COOKIE['imTovar2']),true);
			$newCookie = array();
			
			$countInBascet = 0;
			
			for ($i =0; $i<count($rezCookie); $i++)
			{
				if (strcmp($_REQUEST["idElem"], $rezCookie[$i]["idElem"]) !=0)
				{
					$newCookie[] = $rezCookie[$i];
					$countInBascet++;
				}
			}
			
			SetCookie('imTovar2', json_encode($newCookie), 0, "/", "rubexgroup.ru");
			*/
			
			wp_die($countInBascet);
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	
	add_action( 'wp_ajax_update_bascet', 'update_bascet' );
	add_action( 'wp_ajax_nopriv_update_bascet', 'update_bascet' );
	
	function update_bascet() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$priceLine = getPrice($_REQUEST["count"],$_REQUEST["price"],$_REQUEST["minprice"],$_REQUEST["gost"],$_REQUEST["sklad"],"","");
			
			global $wpdb;
			$bascet = $wpdb->update("wp_im_basket", 
								array("nal" => strip_tags($priceLine["nal"]),
										"count" => $_REQUEST["count"],
										"sale" => $priceLine["sale"],
										"salePrice" => $priceLine["pricesale"],
										"summPos" => $priceLine["sumsale"],
								), 
								array ("email" => getSalerData("mail"), 
										"idElem" => $_REQUEST["idElem"])
										);
			summCalculate();
			
			/*
			$rezCookie = json_decode(stripcslashes($_COOKIE['imTovar2']),true);
			$newCookie = array();
			
			for ($i =0; $i<count($rezCookie); $i++)
			{
				if (strcmp($_REQUEST["idElem"], $rezCookie[$i]["idElem"]) ==0)
				{
					$rezCookie[$i]["nal"] = strip_tags($priceLine["nal"]);
					$rezCookie[$i]["count"] = $_REQUEST["count"];
					$rezCookie[$i]["sale"] = $priceLine["sale"];
					$rezCookie[$i]["salePrice"] = $priceLine["pricesale"];
					$rezCookie[$i]["summPos"] = $priceLine["sumsale"];
				}
				$newCookie[] = $rezCookie[$i];
			}
			
			SetCookie('imTovar2', json_encode($newCookie), 0, "/", "rubexgroup.ru");
			*/
			wp_die(json_encode($priceLine));
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	add_action( 'wp_ajax_get_price', 'get_price' );
	add_action( 'wp_ajax_nopriv_get_price', 'get_price' );
	
	function get_price() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$priceLine = json_encode(getPrice($_REQUEST["count"],$_REQUEST["price"],$_REQUEST["minprice"],$_REQUEST["gost"],$_REQUEST["sklad"],$_REQUEST["name"],$_REQUEST["carecter"]));
			wp_die($priceLine);
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	
	add_action( 'wp_ajax_get_inn_info', 'get_inn_info' );
	add_action( 'wp_ajax_nopriv_get_inn_info', 'get_inn_info' );
	
	function get_inn_info() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$inn = trim($_REQUEST['SerchInn']);
			if(!CISContragentITS::CheckINN($inn)){
				$errors = true;			
				wp_die("Некорректный ИНН",'', array( 'response' => 403 ));
			}	else {

				
				$strType = CISContragentITS::TypeInn($inn);

				$client = CISContragentITS::ConnectToService('75028206','ghjcgtrn02');
				
					
				if( !is_wp_error( $client ) ) {							
					
					if($strType == "Corporation"){       
						// Запрос по организации
						$rez  = CISContragentITS::getCorporationRequisitesByINN($client,$inn,"БухгалтерияПредприятияКОРП");
						
						$returnRez["type"] = "corp";
						$returnRez["F"] = $rez->РеквизитыЮрЛица->СвУправлДеят->СведДолжнФЛ->ФИО->Фамилия;
						$returnRez["I"] = $rez->РеквизитыЮрЛица->СвУправлДеят->СведДолжнФЛ->ФИО->Имя;
						$returnRez["O"] = $rez->РеквизитыЮрЛица->СвУправлДеят->СведДолжнФЛ->ФИО->Отчество;
						
						//$returnRez["name"] = stripcslashes (htmlspecialchars ($rez->РеквизитыЮрЛица->СвНаимЮЛ->НаимЮЛСокр,ENT_QUOTES));
						
						$returnRez["name"] = $rez->РеквизитыЮрЛица->СвНаимЮЛ->НаимЮЛСокр;
						$returnRez["inn"] = $rez->РеквизитыЮрЛица->ИНН;
						$returnRez["kpp"] = $rez->РеквизитыЮрЛица->КПП;
						
					}else{
						// Запрос по ИП
						$rez = CISContragentITS::getEntrepreneurRequisitesByINN($client,$inn,"БухгалтерияПредприятияКОРП");	
						
						$returnRez["type"] = "individ";
						$returnRez["F"] = $rez->РеквизитыИП->СвФЛ->ФИОРус->Фамилия;
						$returnRez["I"] = $rez->РеквизитыИП->СвФЛ->ФИОРус->Имя;
						$returnRez["O"] = $rez->РеквизитыИП->СвФЛ->ФИОРус->Отчество;
						
						$returnRez["name"] = "ИП ".$rez->РеквизитыИП->СвФЛ->ФИОРус->Фамилия." ".$rez->РеквизитыИП->СвФЛ->ФИОРус->Имя." ".$rez->РеквизитыИП->СвФЛ->ФИОРус->Отчество;
						$returnRez["inn"] = $rez->РеквизитыИП->ИННФЛ;
						
					}
					
					 if( is_wp_error( $rez ) ){
							$errors = true;			
							wp_die($rez,'',403);
					 } 
					 else {
						 wp_die(json_encode($returnRez));
						// echo"<pre>"; 
							//print_r($returnRez);
							//print_r($rez);
						 //echo "</pre>";
						
						 
						 }
					 
					 
				} else {
					$errors = true;			
					wp_die($client,'',403);
				}
				
				}
			
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	add_action( 'wp_ajax_add_im_user', 'add_im_user' );
	add_action( 'wp_ajax_nopriv_add_im_user', 'add_im_user' );
	
	function add_im_user() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$checedFild = "";
			$errors = false;
					
			
				
				if (empty($_POST['RPPasword']))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Пароль обязательное для заполнения</span>";		
				}
				
				if (empty($_POST['RPPasword2']))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Пароль должно быть заполненно дважды.</span>";		
				}
				
				if ($_POST['RPPasword2'] != $_POST['RPPasword'])
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Пароли не совпадают.</span>";		
				}
				
				if (empty($_POST['RPname']))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Имя обязательное для заполнения.</span>";		
				}
					
				if (empty($_POST['RPsname']))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Фамилия обязательное для заполнения.</span>";		
				}

				if (empty($_POST['RPorg']))
				{
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Организация обязательное для заполнения.</span>";		
				}
				
				if (empty($_POST['RPinn']))
				{
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле ИНН обязательное для заполнения.</span>";		
				}
				
				if ($_POST['RPrezident'] === 'yes')
				{
					if(!CISContragentITS::CheckINN($_POST['RPinn'])){
						$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Введен недействительный ИНН.</span>";
					}
				}
			
				if ((empty($_POST['RPkpp']))&&($_POST['RPtypeul'] === 'corp')&&($_POST['RPrezident'] === 'yes'))
				{
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле КПП обязательное для заполнения.</span>";		
				}
			
				if ( empty($_POST['RPphone']))
				{
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Телефон обязательное для заполнения.</span>";		
				}
				
				
				if (empty(trim($_POST['RPemail'])))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле e-mail обязательное для заполнения.</span>";		
				}	
			else
			if (!filter_var(trim($_POST['RPemail']), FILTER_VALIDATE_EMAIL))
			{
				$errors = true;
				$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Значение в поле e-mail не соответствует формату адреса электронной почты.</span>";	
			}
			else
			{
				$allowed_domains = array('yandex.ru', 'ya.ru', 'mail.ru', 'inbox.ru', 'bk.ru', 'list.ru', 'internet.ru', 'vk.com', 'xmail.ru', 'rambler.ru', 'lenta.ru', 'myrambler.ru', 'autorambler.ru', 'ro.ru', 'r0.ru');
				$email_domain = strtolower(substr(strrchr(trim($_POST['RPemail']), "@"), 1));
				if (!in_array($email_domain, $allowed_domains))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Домен электронной почты не разрешен для регистрации. В соответствии с законодательством РФ.</span>";
				}
			}
				
				
				// $captcha_instance = new ReallySimpleCaptcha();
				// $correct = $captcha_instance->check( $_POST['CHPrefix'], $_POST['RPcapsha'] );
				
				
				
				// if (!$correct)
				// {
				// 	$errors = true;
				// 	$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Введенный текст не совпадает с текстом на картинке</span>";	
				// }
				
				// $captcha_instance->remove( $_POST['CHPrefix'] );
				
				
				if ($errors)
					wp_die($checedFild, '', 403 );
				else {
				
					global $wpdb;	
					//$wpdb->show_errors();
					$inserInRez = $wpdb->insert('wp_rubex_price',
						array(
							"moderate" => "0",
							"RPemail" => trim($_POST["RPemail"]),
							"RPsname" => $_POST["RPsname"],
							"RPname" => $_POST["RPname"],
							"RPfname" => $_POST["RPfname"],
							"RPdolg" => $_POST["RPdolg"],
							"RPPasword" => md5($_POST["RPPasword"]."mainsalt"),
							"rezerv" => $_POST["RPinn"],
							"RPkpp" => $_POST["RPkpp"],
							"RPorg" => $_POST["RPorg"],
							"RPotr" => $_POST["RPotr"],
							"RPstrana" => $_POST["RPstrana"],
							"RPregion" => $_POST["RPregion"],
							"RPphone" => $_POST["RPphone"],
							"Rezedent" => ($_POST["RPrezident"] == 'yes')?1:0,
							"passHeshes" => 1
						),
						array('%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%d','%d')
					);
				
					if (!$inserInRez) {
						wp_die('Регистрация не может быть осуществленна, данный e-mail уже зарегистрирован', '', 403 );
					} else {
						
						 $headers = 'From: Холдинг RubEx Group <RubExGroup@yandex.ru>' . "\r\n";
								  $mailContent = "В системе зарегистрировался:<br/>".
								  "<strong>".$_POST["RPsname"]." ".$_POST["RPname"]." ".$_POST["RPfname"]."</strong><br/>".
								  "<strong>Ник: </strong>".$_POST["RPlogin"]."<br/>".
								  "<strong>Пароль: </strong>".stripcslashes($_POST["RPPasword"])."<br/>".
								  "<strong>Организация: </strong>".$_POST["RPorg"]."<br/>".
								  "<strong>ИНН: </strong>".$_POST["RPinn"]."<br/>".
								  "<strong>Отрасль: </strong>".$_POST["RPotr"]."<br/>".
								  "<strong>Должность: </strong>".$_POST["RPdolg"]."<br/>".
								  "<strong>Страна: </strong>".$_POST["RPstrana"]."<br/>".
								  "<strong>Регион: </strong>".$_POST["RPregion"]."<br/>".
								  "<strong>Контактный терефон: </strong>".$_POST["RPphone"]."<br/>".
								  "<strong>e-mail: </strong>".trim($_POST["RPemail"])."<br/><br/><br/>".
								  "Для активации пользователя в системе перейдите по ссылке:<br/> <a href = 'http://rubexgroup.ru/?p=20749&mail=".trim($_POST["RPemail"])."&typeOfSaler=1'>Активировать как прямого потребителя</a><br/>".
								  "<a href = 'http://rubexgroup.ru/?p=20749&mail=".trim($_POST["RPemail"])."&typeOfSaler=2'>Активировать как посредника</a>";
								  
								  add_filter( 'wp_mail_content_type', 'set_html_content_type' );
								  
								 
								  wp_mail(array("asmi046@gmail.com","vorobevav@rubexgroup.ru","V.Garbuzov@rubexgroup.ru", "kovalevagb@rubexgroup.ru", "avtaevata@rubexgroup.ru", "lazarenkoiu@rubexgroup.ru"), 'Новый пользователь в системе RubEx Price', $mailContent, $headers);
								  
								  $headers2 = 'From: RubEx Group <contact@rubexgroup.ru>' . "\r\n";
								  $mailContent2 = "Уважаемый пользователь сервиса Rubex Price,<br/>".
								  "Ваша заявка на подключение к сервису Rubex Price получена.".
								  "После ее рассмотрения и утверждения модератором мы Вам вышлем подтверждение на почту.<br/><br/>".
								  "С уважением, <br/>".
								  "компания RubexGroup<br/>".
								  '<a href = "http://rubexgroup.ru">rubexgroup.ru</a><br/><br/>'.
								  '<img src = "http://rubexgroup.ru/wp-content/themes/rgn/images/logo.png" />';
								  
								  $sabj = "Заявка на подключение сервиса Rubex Price принята";
								  
								//   if (pll_current_language() == "en") {
								// 		$mailContent2 = "Dear user of Rubex Price service,<br/>".
								// 						  "Your request for connection to the service Rubex Price is received.".
								// 						  "After its examination and approval by the moderator, we will send you a confirmation email.<br/><br/>".
								// 						  "Best regards, <br/>".
								// 						  "RubexGroup<br/>".
								// 						  '<a href = "http://rubexgroup.com/">rubexgroup.ru</a><br/><br/>'.
								// 						  '<img src = "http://rubexgroup.ru/wp-content/themes/rgn/images/logo.png" />';
														  
								// 						  $sabj = "Request for Rubex Price service is received";
								//   }

								  wp_mail(array(trim($_POST["RPemail"])), $sabj, $mailContent2, $headers2);
								  
								 
						
						wp_die( 'Поздравляем! Вы успешно зарегистрировались в Интернет магазине RubEx Group. Ваши данные находятся на модерации, по результатам Вам придет уведомление на указанный при регистрации адрес электронной почты.');
					} 
				}
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	add_action( 'wp_ajax_add_im_contragent', 'add_im_contragent' );
	add_action( 'wp_ajax_nopriv_add_im_contragent', 'add_im_contragent' );
	
	function add_im_contragent() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$checedFild = "";
			$errors = false;
					
			
				
				
				if (empty($_POST['RPname']))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Имя обязательное для заполнения.</span>";		
				}
					
				if (empty($_POST['RPsname']))
				{
					$errors = true;
					$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Фамилия обязательное для заполнения.</span>";		
				}

				if (empty($_POST['RPorg']))
				{
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Организация обязательное для заполнения.</span>";		
				}
				
				if (empty($_POST['RPinn']))
				{
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле ИНН обязательное для заполнения.</span>";		
				}
				
				if(!CISContragentITS::CheckINN($_POST['RPinn'])){
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Введен недействительный ИНН.</span>";
				}
			
				if ((empty($_POST['RPkpp']))&&($_POST['RPtypeul'] === 'corp')&&($_POST['RPrezident'] === 'yes'))
				{
					$errors = true; $checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле КПП обязательное для заполнения.</span>";		
				}
				
				if ($errors)
					wp_die($checedFild, '', 403 );
				else {
				
					global $wpdb;	
					//$wpdb->show_errors();
					$inserInRez = $wpdb->insert('wp_im_contragent',
						array(
							"RPemail" => getSalerData("mail"),
							"RPsname" => $_POST["RPsname"],
							"RPname" => $_POST["RPname"],
							"RPfname" => $_POST["RPfname"],
							"RPinn" => $_POST["RPinn"],
							"RPkpp" => $_POST["RPkpp"],
							"RPorg" => $_POST["RPorg"],
							"Rezedent" => ($_POST["RPrezident"] == 'yes')?1:0,
						),
						array('%s', '%s','%s','%s','%s','%s','%s','%s')
					);
				
					if (!$inserInRez) {
						wp_die('Контрагент не может быть добавлен. Возможно контрагент с таким ИНН уже зарегистрирован в системе', '', 403 );
					} else {
						
						$headers = 'From: Холдинг RubEx Group <RubExGroup@yandex.ru>' . "\r\n";
								  $mailContent = "В системе зарегистрировался новый контрагент для учетной записи ".getSalerData("mail").":<br/>".
								  "<strong>".$_POST["RPsname"]." ".$_POST["RPname"]." ".$_POST["RPfname"]."</strong><br/>".
								  "<strong>Организация: </strong>".$_POST["RPorg"]."<br/>".
								  "<strong>ИНН: </strong>".$_POST["RPinn"]."<br/>".
								  "<strong>КПП: </strong>".$_POST["RPkpp"]."<br/>".
								  "<strong>Резидент РФ: </strong>".(($_POST["RPrezident"] == 'yes')?"Да":"Нет")."<br/><br/><br/>".
								  "Для активации Контрагента в системе перейдите по ссылке:<br/> <a href = 'http://rubexgroup.ru/?p=17132&mid=".$wpdb->insert_id."&typeOfSaler=1'>Активировать как прямого потребителя</a><br/>".
								  "<a href = 'http://rubexgroup.ru/?p=17132&mid=".$wpdb->insert_id."&typeOfSaler=2'>Активировать как посредника</a>";
								  
								  add_filter( 'wp_mail_content_type', 'set_html_content_type' );
								  
								 
								  wp_mail(array("asmi046@gmail.com","vorobevav@rubexgroup.ru","V.Garbuzov@rubexgroup.ru"), 'Добавлен новый контрагент', $mailContent, $headers);
						
						wp_die( 'Новый контрагент успешно добавлен.');
					} 
				}
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	
	add_action( 'wp_ajax_add_dell_im_contragent', 'dell_im_contragent' );
	add_action( 'wp_ajax_nopriv_dell_im_contragent', 'dell_im_contragent' );
	
	function dell_im_contragent() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
				
					global $wpdb;	
					//$wpdb->show_errors();
					$dellInRez = $wpdb->delete('wp_im_contragent',
						array(
							"id" => $_POST["id"],	
						)
						
					);
				
					if (empty($dellInRez)) {
						wp_die('Не удалось удалить контрагента', '', 403 );
					} else {
						wp_die( 'Контрагент успешно удален.');
					} 
				
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
	
	
	add_action( 'wp_ajax_new_capcha', 'new_capcha' );
	add_action( 'wp_ajax_nopriv_new_capcha', 'new_capcha' );
	
	function new_capcha() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$captcha_instance = new ReallySimpleCaptcha();
			$captcha_instance->bg = array( 231, 232, 234 );
			$word = $captcha_instance->generate_random_word();
			
			
			$prefix = mt_rand();
			wp_die(get_bloginfo("template_url")."/wp-content/plugins/really-simple-captcha/tmp/".$captcha_instance->generate_image( $prefix, $word )."|".$prefix);
			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}
?>