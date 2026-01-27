<?php
/*
Plugin Name: Мибок: Версия для слабовидящих
Plugin URI: https://slabovid.ru/
Description: Решение позволяет генерировать версию сайта для слабовидящих на основе существующих шаблонов вашего сайта
Version: 1.1.0
Author: MIBOK
Author URI: http://www.mibok.ru/
License: GPL2
*/

add_action( 'init', 'my_setcookie' );
function my_setcookie(){
//setcookie( $visitor_username, $username_value, 3 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
    if (!isset($_COOKIE['user1'])) SetCookie("user1",rand(1,999999999),time()+3600*24*30, '/');
    if (!isset($_COOKIE['glas'])) SetCookie("glas", 0,time()+3600*24*30, '/');
    if (!isset($_COOKIE['old1'])) SetCookie("old1", 0,time()+3600*24*30, '/');
    if (!isset($_COOKIE['razmer'])) SetCookie("razmer", '100',time()+3600*24*30, '/');
    if (!isset($_COOKIE['color'])) SetCookie("color", '1',time()+3600*24*30, '/');
    if (!isset($_COOKIE['graf'])) SetCookie("graf", '1',time()+3600*24*30, '/');
    if (!isset($_COOKIE['kern'])) SetCookie("kern", '1',time()+3600*24*30, '/');
    if (!isset($_COOKIE['interval'])) SetCookie("interval", '1',time()+3600*24*30, '/');
    if (!isset($_COOKIE['gar'])) SetCookie("gar", '1',time()+3600*24*30, '/');
    if (!isset($_COOKIE['mono'])) SetCookie("interval", '0',time()+3600*24*30, '/');
    if (!isset($_COOKIE['flash'])) SetCookie("gar", '1',time()+3600*24*30, '/');

}



//special_version=Y
if (isset($_GET['special_version']))
    if ($_GET['special_version'] == 'Y' && isset($_COOKIE['glas']) && $_COOKIE['glas'] == 0) {
        SetCookie("glas", 1,time()+3600*24*30, '/');
        SetCookie("old1", 0,time()+3600*24*30, '/');
    }

if (isset($_GET['special_version']))
    if ($_GET['special_version'] == 'N' && isset($_COOKIE['glas']) && $_COOKIE['glas'] == 1) {
        SetCookie("glas", 0,time()+3600*24*30, '/');
        SetCookie("old1", 1,time()+3600*24*30, '/');
    }


if (isset($_COOKIE['glas']) && $_COOKIE['glas'] == '1'){
    add_action('wp_head', 'buffer_start', 0);
    add_action('wp_footer', 'buffer_end', 900);
    add_action('wp_head', 'action_function_name_11');

}


// Создаем виджет

class btru_widget extends WP_Widget {

    function __construct() {

        parent::__construct(

            'btru_widget',

// Название виджета, показано в консоли
            __('Мибок: Версия для слабовидящих', 'btru_widget_domain'),
            array( 'description' => __( 'Мибок: Версия для слабовидящих', 'btru_widget_domain' ), )
        );
    }
    public function widget( $args, $instance )
    {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $before_widget;
        if ( ! empty( $title ) )
            echo $before_title . $title . $after_title;

// Именно здесь записываем весь код и вывод данных
        $nlink = add_query_arg( 'special_version', 'Y');
        echo __( '<a id="liink"  href="' . $nlink . '">Версия для слабовидящих</a>', 'btru_widget_domain' );
        echo $args['after_widget'];
    }
    public function form( $instance ) {

        $title = isset( $instance[ 'title' ] )  ? $instance[ 'title' ] : 'Для слабовидящих';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <?php
    }


    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        // $instance['numberofusers'] = strip_tags( $new_instance['numberofusers'] );
        return $instance;
    }
} // Закрываем класс btru_widget
function btru_load_widget() {
    register_widget( 'btru_widget' );
}
add_action( 'widgets_init', 'btru_load_widget' );






function callback($buffer) {
  //  $buffer = str_replace('.css?', '.css', $buffer);
    //$buffer = preg_replace('/<link(.*?)\/>/is','', $buffer);
   // $$buffer = preg_replace('#<style[^>]*>.*?</style>#is', '', $buffer);

   // $buffer = str_replace('body ', 'body id="c_panel_special" style="visibility: hidden"', $buffer);
    $buffer = str_replace('body ', 'body id="c_panel_special" style="display: none" ', $buffer);
    //$buffer = str_replace('body ', 'body id="c_panel_special" ', $buffer);
    // $buffer = str_replace('sitetitle', 'My bodySEO Title', $buffer);
//<div class="bs-docs-panel font-size-100 color-1 images   kerning-1 line-1 garnitura-1 voice-3 volume-0.5" id="c_panel_special">

    $ins = '
    <div class="bs-docs-panel font-size-100 color-1 images   kerning-1 line-1 garnitura-1 voice-3 volume-0.5" id="c_panel_special">
    
    <div class="container wcag">
        <div class="panel panel-default panel-access">
            <div class="panel-body">
                <div class="btn-toolbar access-toolbar" id="access_toolbar" role="toolbar" aria-label="Вспомогательная панель">   
                    <div class="container-fluid">
                        <div class=\'pull-left p-content\'>
 
 
                        </div>
                        <div class=\'pull-left p-font\'>
                            <div class="btn-title kerning-1 line-1 garnitura-1">Шрифт</div>
                            <div class="btn-group btn-group-font-size" role="group">                                               
                                <button id="razmer100" type="button" class="btn btn-default btn-font-size-100 checked" tabindex="-1" data-choice="font-size-100" aria-checked="true" aria-label="Размер шрифта 100%"><span class="value">А</span><span class="hover"></span></button>
                                <button id="razmer150" type="button" class="btn btn-default btn-font-size-150 " tabindex="-1" data-choice="font-size-150" aria-checked="true" aria-label="Размер шрифта 150%"><span class="value">А</span><span class="hover"></span></button>
                                <button id="razmer200" type="button" class="btn btn-default btn-font-size-200 " tabindex="-1" data-choice="font-size-200" aria-checked="true" aria-label="Размер шрифта 200%"><span class="value">А</span><span class="hover"></span></button>
                            </div>
                        </div>
                        <div class=\'pull-left p-color\'>
                            <div class="btn-title">Цвет</div>
                            <div class="btn-group btn-group-color" role="group">
                                <button id="color1" type="button" class="btn btn-default btn-color-1 checked" tabindex="-1" data-choice="color-1" aria-checked="true" aria-label="Цветовая схема №1">Ц<span class="hover"></span></button>
                                <button id="color2" type="button" class="btn btn-default btn-color-2 " tabindex="-1" data-choice="color-2" aria-checked="false" aria-label="Цветовая схема №2">Ц<span class="hover"></span></button>
                                <button id="color3" type="button" class="btn btn-default btn-color-3 " tabindex="-1" data-choice="color-3" aria-checked="false" aria-label="Цветовая схема №3">Ц<span class="hover"></span></button>
								<button id="color4" type="button" class="btn btn-default btn-color-4 " tabindex="-1" data-choice="color-4" aria-checked="false" aria-label="Цветовая схема №4">Ц<span class="hover"></span></button>
								<button id="color5" type="button" class="btn btn-default btn-color-5 " tabindex="-1" data-choice="color-5" aria-checked="false" aria-label="Цветовая схема №5">Ц<span class="hover"></span></button>
                            </div>   
                        </div>
                        <div class=\'pull-right p-setting\'>

								<div class="btn-group btn-group-reset" role="group">
                                    <button type="button" class="btn btn-default btn-reset" tabindex="-1" value="go" onclick="location.href=\'?special_version=N\'" aria-label="Обычная версия сайта ">&nbsp;Обычная версия сайта <span class="hover"></span></button>
                                    
                                    </div>

                            <div class="btn-group btn-group-setting" role="group">
								
                                <button type="button" class="btn btn-default" tabindex="-1" data-choice="setting" aria-label="Дополнительные настройки">&nbsp;Дополнительно<span class="hover"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-subsetting" aria-hidden="true">
                        <div class="container-fluid">
                            <div class="btn-title">Графика</div>
                            <div class="btn-group btn-group-images" role="group">
                                <button id="grafon" type="button" class="btn btn-default checked" tabindex="-1" data-choice="images" aria-checked="true" aria-label="Включить">Включить<span class="hover"></span></button>
								<button id="grafoff" type="button" class="btn btn-default "tabindex="-1" data-choice="not-images" aria-checked="false" aria-label="Отключить">Отключить<span class="hover"></span></button>
                            </div>                                  
                            <div class="btn-group btn-group-mono" role="group">
                                <button id= "mono" type="button" class="btn btn-default btn-mono  " tabindex="-1" data-choice="mono" aria-checked="false" aria-label="Монохромные изображения">Монохромные изображения<span class="hover"></span></button>
                            </div>                                  
                            <div class="btn-group btn-group-flash" role="group">
                                <button id= "flash"  type="button" class="btn btn-default btn-flash " tabindex="-1" data-choice="flash" aria-checked="false" aria-label="Отключить Flash">Отключить Flash<span class="hover"></span></button>
                            </div>                                  
                        </div>
                        <div class="container-fluid">
                            <div class="btn-title">Кернинг</div>
                            <div class="btn-group btn-group-kerning" role="group">
                                <button id="kern1" type="button" class="btn btn-default btn-kerning-1 checked" tabindex="-1" data-choice="kerning-1" aria-checked="true" aria-label="Стандартный">Стандартный<span class="hover"></span></button>
                                <button id="kern2" type="button" class="btn btn-default btn-kerning-2 " tabindex="-1" data-choice="kerning-2" aria-checked="false" aria-label="Средний">Средний<span class="hover"></span></button>
                                <button id="kern3" type="button" class="btn btn-default btn-kerning-3 " tabindex="-1" data-choice="kerning-3" aria-checked="false" aria-label="Большой">Большой<span class="hover"></span></button>
                            </div>                                                                      
                        </div>
						<div class="container-fluid">
                            <div class="btn-title">Интервал</div>
                            <div class="btn-group btn-group-kerning" role="group">
                                <button id="interval1" type="button" class="btn btn-default btn-line-1 checked" tabindex="-1" data-choice="line-1" aria-checked="true" aria-label="Одинарный">Одинарный<span class="hover"></span></button>
                                <button id="interval2" type="button" class="btn btn-default btn-line-2 " tabindex="-1" data-choice="line-2" aria-checked="false" aria-label="Полуторный">Полуторный<span class="hover"></span></button>
                                <button id="interval3" type="button" class="btn btn-default btn-line-3 " tabindex="-1" data-choice="line-3" aria-checked="false" aria-label="Двойной">Двойной<span class="hover"></span></button>
                            </div>                                                                      
                        </div>
                        <div class="container-fluid">
                            <div class="btn-title">Гарнитура</div>
                            <div class="btn-group btn-group-garnitura" role="group">
                                <button id="gar1" type="button" class="btn btn-default btn-garnitura-1 checked" tabindex="-1" data-choice="garnitura-1" aria-checked="true" aria-label="Без засечек">Без засечек<span class="hover"></span></button>
                                <button id="gar2" type="button" class="btn btn-default btn-garnitura-2 " tabindex="-1" data-choice="garnitura-2" aria-checked="false" aria-label="С засечками">С засечками<span class="hover"></span></button>
                            </div> 
                        </div>

                        <div class="panel-reset">
                            <div class="container-fluid">
                                <div class="btn-group btn-group-reset" role="group">
                                    <button type="button" class="btn btn-default btn-reset" tabindex="-1" data-choice="reset" aria-label="Вернуть стандартные настройки">&nbsp;Вернуть стандартные настройки<span class="hover"></span></button>
                                </div>   
       
                                    <div class="btn-group btn-group-reset" role="group">
                                    <button type="button" class="btn btn-default btn-reset" tabindex="-1" value="go" onclick="location.href=\'?special_version=N\'" aria-label="Обычная версия сайта ">&nbsp;Обычная версия сайта <span class="hover"></span></button>
                                    
                                    </div>
                                <div class="btn-group btn-group-close" role="group">
                                    <button type="button" class="btn btn-default btn-close" tabindex="-1" data-choice="setting" aria-label="Закрыть дополнительные настройки">&nbsp;Закрыть дополнительные настройки<span class="hover"></span></button>
                                </div>  
                            </div>
                        </div>
                            <div class="author-mibok">
                                <a href="https://slabovid.ru/" target="_blank">&copy; Мибок: Версия для слабовидящих (модуль на сайт)</a>
                            </div>
                    </div>

                </div>        
                
            </div>    
        </div>
    </div>
</div>
';

    $sw = true;
    $buf1 = '';
    $buf2 = '';
    $buf = explode('>', $buffer);
    foreach($buf as $key => $value)
    {
        if ($sw) {$buf1 .= $buf[$key] . '>';} else {$buf2 .= $buf[$key] . '>';}
        if (strpos ($buf[$key], '<body')) $sw = false;
    }
    return $buf1 . "\r\n" . $ins . "\r\n" . $buf2;
}

function buffer_start() {
    ob_start("callback");
}

function buffer_end() {
    ob_end_flush();
}


function action_function_name_11(){
    //  echo "head1111\r\n";

    echo "<script type='text/javascript' src='" . WP_PLUGIN_URL . "/mibok_glaza/js/tollbar.js'></script>\r\n";
    echo "<link rel='stylesheet' href='" . WP_PLUGIN_URL . "/mibok_glaza/css/bstyle.css' type='text/css' />\r\n";
    echo "<link rel='stylesheet' href='" . WP_PLUGIN_URL . "/mibok_glaza/css/bootstrap.css' type='text/css' />\r\n";

}





add_action( 'wp_footer', 'action_footer_11' );
function action_footer_11(){
    echo ' <script type=\'text/javascript\'>
 
 function get_Cookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, \'\\$1\') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}
 
    jQuery(document).ready(function ($item) {

        // $a1 = getCookie(\'old1\') + 1 - 1;
        //  $a2 = getCookie(\'glas\') + 1 - 1;
        //  alert($a1  + \' - \' +  $a2 );
        //alert( getCookie(\'glas\') + \' - \' +  getCookie(\'old1\') );
        if (get_Cookie(\'glas\') != get_Cookie(\'old1\')) {
            //   alert( getCookie(\'old1\') + \' - \' +  getCookie(\'glas\') );
            if (get_Cookie(\'glas\') == 1) {document.cookie = "old1=1; expires=01/01/2200 00:00:00; path=/";}
            if (get_Cookie(\'glas\') == 0) {document.cookie = "old1=0; expires=01/01/2200 00:00:00; path=/";}
            //document.cookie = "razmer=200; expires=01/01/2200 00:00:00; path=/";
            //   alert( getCookie(\'old1\') + \' - \' +  getCookie(\'glas\') );
            location.reload();
        }
    }); 
   </script>  
';
}



?>