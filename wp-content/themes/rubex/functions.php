<?php

include "sender_tg.php";

/**
 * rubex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rubex
 */


function get_http_response_code($theURL)
{
	$headers = get_headers($theURL);
	return substr($headers[0], 9, 3);
}

function gen_password($length = 6)
{
	$chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP1234567890';
	$size = strlen($chars) - 1;
	$password = '';
	while ($length--) {
		$password .= $chars[random_int(0, $size)];
	}
	return $password;
}

define("thencspage", get_the_permalink(20935));

add_action('carbon_fields_register_fields', 'boots_register_custom_fields');
function boots_register_custom_fields()
{
	require_once __DIR__ . '/inc/custom-fields-options/metaboxes.php';
	require_once __DIR__ . '/inc/custom-fields-options/theme-options.php';
}
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	require_once(get_template_directory() . '/inc/carbon-fields/vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}

require get_template_directory() . '/file-lnk-def.php';
$siteadr = "/";
$sitename = "RubEx";

include_once("imAjaxAction.php");

include_once("its_contragent.php");

/*
add_filter( 'locale', 'my_theme_localized' );
function my_theme_localized( $locale ){
	return esc_attr( "en_UK" );
}
*/

if (! function_exists('rubex_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rubex_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rubex, use a find and replace
		 * to change 'rubex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('rubex', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'rubex'),
			'menu-2' => esc_html__('Меню в подвале', 'rubex'),
			'menu-mob' => esc_html__('Мобильное меню', 'rubex'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('rubex_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'rubex_setup');





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rubex_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('rubex_content_width', 640);
}
add_action('after_setup_theme', 'rubex_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rubex_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'rubex'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'rubex'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'rubex_widgets_init');

/**
 * Enqueue scripts and styles.
 */

define("ALL_VERSION", "1.0.35");

function rubex_scripts()
{

	// wp_enqueue_style('basket', get_template_directory_uri() . '/css/backet.css', array(), null, 'all');



	wp_enqueue_style("style-modal", get_template_directory_uri() . "/css/jquery.arcticmodal-0.3.css");
	wp_enqueue_style('rubex-style', get_stylesheet_uri(), array(), ALL_VERSION, 'all');
	wp_enqueue_style('rubex-light', get_template_directory_uri() . '/css/lightbox.min.css', array(), ALL_VERSION, 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('libs', get_template_directory_uri() . '/js/scripts.min.js', array(), ALL_VERSION, true);
	wp_enqueue_script('light', get_template_directory_uri() . '/js/lightbox.min.js', array(), ALL_VERSION, true);

	wp_enqueue_script('career', get_template_directory_uri() . '/js/kariera.js', array(), ALL_VERSION, true);
	wp_enqueue_script('amodal', get_template_directory_uri() . '/js/jquery.arcticmodal-0.3.min.js', array(), ALL_VERSION, true);

	wp_enqueue_script('main', get_template_directory_uri() . '/js/custom.js', array(), ALL_VERSION, true);

	wp_enqueue_style('rubex_adv_style', get_template_directory_uri() . "/adv.css", array(), ALL_VERSION, 'all');
	wp_enqueue_style('rubex_cookies_style', get_template_directory_uri() . "/cookies.css", array(), ALL_VERSION, 'all');

	if (is_page(array(20700, 20734, 20749, 20715, 20736, 20738, 20744, 20746, 20748, 20742, 20722, 20740, 20717))) {
		wp_enqueue_style('rubexprice-style', get_template_directory_uri() . "/css/rubex-price-style.css", array(), ALL_VERSION, 'all');
		wp_enqueue_script('rubexprice-cookies', get_template_directory_uri() . '/js/jquery.cookie.js', array(), ALL_VERSION, true);
		wp_enqueue_script('rubexprice-acuting', get_template_directory_uri() . '/js/accounting.min.js', array(), ALL_VERSION, true);
		wp_enqueue_script('rubexprice-script', get_template_directory_uri() . '/js/rubex-price-script.js', array(), ALL_VERSION, true);

		wp_enqueue_script('vue', get_template_directory_uri() . '/js/vue.js', array(), ALL_VERSION, false);
		wp_enqueue_script('axios', get_template_directory_uri() . '/js/axios.min.js', array(), ALL_VERSION, false);
	}

	if (is_page(array(22056))) {
		wp_enqueue_style("opros_css", get_template_directory_uri() . "/opros.css");
		wp_enqueue_script('opros', get_template_directory_uri() . '/js/opros.js', array(), ALL_VERSION, false);
	}

	wp_localize_script('main', 'allAjax', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('NEHERTUTLAZIT')
	));


	wp_enqueue_script('loader', get_template_directory_uri() . '/js/back_loader.js', array(), ALL_VERSION, false);
	wp_enqueue_style("nam_table", get_template_directory_uri() . "/nam-table.css");

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}


add_action('wp_enqueue_scripts', 'rubex_scripts');


function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_filter('excerpt_more', function ($more) {
	return '...';
});

add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});

function main_menu()
{
	wp_nav_menu(array(
		'theme_location' => 'menu-1',
		'container' => false,
		'menu_class' => 'header-top__menu ul-clean'
	));
}

function mobile_menu()
{
	wp_nav_menu(array(
		'theme_location' => 'menu-mob',
		'container' => false,
		'menu_class' => 'header-mobile__menu ul-clean'
	));
}

function footer_menu()
{
	wp_nav_menu(array(
		'theme_location' => 'menu-2',
		'container' => false,
		'menu_class' => 'footer-menu ul-clean'
	));
}

//------------------Отравка заказа обратного звонка

add_action('wp_ajax_sen_recall', 'sen_recall');
add_action('wp_ajax_nopriv_sen_recall', 'sen_recall');

function sen_recall()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт RubEx <RubExGroup@yandex.ru>',
			'content-type: text/html',
		);




		$sendAdr = "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru";
		$managername = "Не указан";

		$region = $_REQUEST["region"];

		if ($_REQUEST["napravl"] == "Приобретение продукции Rubex") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,contact@rubexgroup.ru,silin@rubexgroup.ru";
		}

		if ($_REQUEST["napravl"] == "Предложение сырья и материалов") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,mazurinayum@rubexgroup.ru";
		}

		if ($_REQUEST["napravl"] == "Карьера") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,pogozihvv@rubexgroup.ru";
		}

		if ($_REQUEST["napravl"] == "Другие вопросы") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,contact@rubexgroup.ru,contact@rubexgroup.ru";
		}

		// add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		add_filter('wp_mail_content_type', 'set_html_content_type');


		$mailContent = '<h1>Обратный звонок с сайта</h1>';
		$mailContent .= 'Имя: <strong>' . $_REQUEST["name"] . '</strong><br/>';
		$mailContent .= 'Телефон: <strong>' . $_REQUEST["phone"] . '</strong><br/>';
		$mailContent .= 'e-mail: <strong>' . $_REQUEST["mail"] . '</strong><br/>';
		$mailContent .= 'Направление: <strong>' . $_REQUEST["napravl"] . '</strong><br/>';
		$mailContent .= 'Страна: <strong>' . ((!empty($_REQUEST["stait"])) ? $_REQUEST["stait"] : "Не указано") . '</strong><br/>';
		$mailContent .= 'Регион: <strong>' . ((!empty($region)) ? $region : "Не указано") . '</strong><br/>';

		message_to_telegram($mailContent);

		if (wp_mail($sendAdr, 'Заказа обратного звонка с сайта RubEx Group (Направление: ' . $_REQUEST["napravl"] . ')', $mailContent, $headers))
			wp_die(thencspage);
		else wp_die('Ошибка отправки!', '', 403);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}
//------------------Отравка прямого обращения

add_action('wp_ajax_send_obrashenie', 'send_obrashenie');
add_action('wp_ajax_nopriv_send_obrashenie', 'send_obrashenie');

function send_obrashenie()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт RubEx <RubExGroup@yandex.ru>',
			'content-type: text/html',
		);

		$sendAdr = "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru";
		$managername = "Не указан";

		$region = $_REQUEST["region"];

		if ($_REQUEST["napravl"] == "Приобретение продукции Rubex") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,contact@rubexgroup.ru,silin@rubexgroup.ru,silin@rubexgroup.ru";

			global $wpdb;

			if ($_REQUEST["stait"] == "Россия") {
				$rez = $wpdb->get_results('SELECT * FROM `rubex_region_managers` WHERE `region` = "' . $_REQUEST["region"] . '"');
			} else {
				$rez = $wpdb->get_results('SELECT * FROM `rubex_region_managers` WHERE `stait` = "' . $_REQUEST["stait"] . '"');
				$region = "";
			}

			$managername = $rez[0]->name;
			$sendAdr .= ", " . $rez[0]->email;
		}

		if ($_REQUEST["napravl"] == "Предложение сырья и материалов") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,mazurinayum@rubexgroup.ru,mazurinayum@rubexgroup.ru";
		}

		if ($_REQUEST["napravl"] == "Карьера") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,pogozihvv@rubexgroup.ru";
		}

		if ($_REQUEST["napravl"] == "Другие вопросы") {
			$sendAdr .= "vorobevaov@rubexgroup.ru,V.Garbuzov@rubexgroup.ru,asmi-work046@yandex.ru,contact@rubexgroup.ru,contact@rubexgroup.ru";
		}


		add_filter('wp_mail_content_type', 'set_html_content_type');

		$mailContent = '<h1>Прямое обращение с сайта RubEx Group</h1>';
		$mailContent .= 'Имя: <strong>' . $_REQUEST["name"] . '</strong><br/>';
		$mailContent .= 'Телефон: <strong>' . $_REQUEST["phone"] . '</strong><br/>';
		$mailContent .= 'e-mail: <strong>' . $_REQUEST["mail"] . '</strong><br/>';
		$mailContent .= 'Направление: <strong>' . $_REQUEST["napravl"] . '</strong><br/>';
		$mailContent .= 'Страна: <strong>' . ((!empty($_REQUEST["stait"])) ? $_REQUEST["stait"] : "Не указано") . '</strong><br/>';
		$mailContent .= 'Регион: <strong>' . ((!empty($region)) ? $region : "Не указано") . '</strong><br/>';
		$mailContent .= 'Менеджер: <strong>' . $managername . '</strong><br/>';

		$mailContent .= '<strong>Сообщение: </strong><br/>' . $_REQUEST["msg"] . '<br/>';

		message_to_telegram($mailContent);

		if (wp_mail($sendAdr, 'Прямое обращение с сайта RubEx Group (Направление: ' . $_REQUEST["napravl"] . ')', $mailContent, $headers))
			wp_die(thencspage);
		else wp_die('Ошибка отправки!', '', 403);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}


add_action('wp_ajax_universal_send', 'universal_send');
add_action('wp_ajax_nopriv_universal_send', 'universal_send');

function universal_send()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт RubEx <RubExGroup@yandex.ru>',
			'content-type: text/html',
		);

		add_filter('wp_mail_content_type', 'set_html_content_type');
		if (wp_mail(carbon_get_theme_option('as_email_send'), 'Заказ с сайта', '<strong>С какой формы:</strong> ' . $_REQUEST["msg"] . '<br/> <strong>Имя:</strong> ' . $_REQUEST["name"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["tel"], $headers))
			wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
		else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

//--------------отправка писем раздел карьера

add_action('wp_ajax_send_form_vacancy', 'send_form_vacancy');
add_action('wp_ajax_nopriv_send_form_vacancy', 'send_form_vacancy');

function send_form_vacancy()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}
	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт RubEx Group <RubExGroup@yandex.ru>',
			'content-type: text/html',
		);

		$text_to_send = '<strong>С какой формы:</strong> Анкета на вакансию<br/>' .
			' <br/> <strong>ФИО:</strong> ' . $_REQUEST["name"] .
			' <br/> <strong>Дата рождения:</strong> ' . $_REQUEST["born"] .
			' <br/> <strong>Телефон:</strong> ' . $_REQUEST["tel"] .
			' <br/> <strong>e-mail:</strong> ' . $_REQUEST["semail"] .
			' <br/> <strong>Город:</strong> ' . $_REQUEST["city"] .
			' <br/> <strong>Гражданство:</strong> ' . $_REQUEST["country"] .
			' <br/> <strong>Семейное положение:</strong> ' . $_REQUEST["family"] .
			' <br/> <strong>Цель заполнения анкеты</strong> ' . $_REQUEST["goal"] .
			' <br/> <strong>Название вакансии:</strong> ' . $_REQUEST["vacancy_name"] .
			' <br/> <strong>Предприятие и подразделение, в котором вы хотели бы пройти стажировку:</strong> ' . $_REQUEST["company_name"] .
			' <br/> <strong>Образование:</strong> ' . $_REQUEST["education"] .
			' <br/> <strong>Наличие рабочей профессии (для технических специальностей):</strong> ' . $_REQUEST["profession_name"] .
			' <br/> <strong>среднее профессиональное образование (колледж, техникум):</strong> ' . $_REQUEST["colleg_name"] .
			' <br/> <strong>Название учебного заведения:</strong> ' . $_REQUEST["university"] .
			' <br/> <strong>Год окончания:</strong> ' . $_REQUEST["university_year"] .
			' <br/> <strong>Уровень образования:</strong> ' . $_REQUEST["education_level"] .
			' <br/> <strong>Уровень первого высшего образования:</strong> ' . $_REQUEST["education_level_1"] .
			' <br/> <strong>Название учебного заведения:</strong> ' . $_REQUEST["university_vo_1"] .
			' <br/> <strong>Специальность по диплому:</strong> ' . $_REQUEST["specialty_vo_1"] .
			' <br/> <strong>Год окончания:</strong> ' . $_REQUEST["university_year_vo_1"] .
			' <br/> <strong>Уровень 2-го высшего образования:</strong> ' . $_REQUEST["education_vo_level_2"] .
			' <br/> <strong>Название учебного заведения:</strong> ' . $_REQUEST["university_vo_2"] .
			' <br/> <strong>Специальность по диплому:</strong> ' . $_REQUEST["specialty_vo_2"] .
			' <br/> <strong>Год окончания:</strong> ' . $_REQUEST["university_year_vo_2"] .
			' <br/> <strong>Уровень 3-го высшего образования:</strong> ' . $_REQUEST["education_vo_level_3"] .
			' <br/> <strong>Название учебного заведения:</strong> ' . $_REQUEST["university_vo_3"] .
			' <br/> <strong>Специальность по диплому:</strong> ' . $_REQUEST["specialty_vo_3"] .
			' <br/> <strong>Год окончания:</strong> ' . $_REQUEST["university_year_vo_3"] .
			' <br/> <strong>Наличие рабочей профессии:</strong> ' . $_REQUEST["profession_so_name_1"] .
			' <br/> <strong>Наличие 2-й рабочей профессии:</strong> ' . $_REQUEST["profession_so_name_2"] .
			' <br/> <strong>Наличие 3-й рабочей профессии:</strong> ' . $_REQUEST["profession_so_name_3"] .
			' <br/> <strong>Название учебного заведения (Средн.спец):</strong> ' . $_REQUEST["university_so_1"] .
			' <br/> <strong>Специальность по диплому (Средн.спец):</strong> ' . $_REQUEST["specialty_so_1"] .
			' <br/> <strong>Год окончания (Средн.спец):</strong> ' . $_REQUEST["specialty_so_1"] .
			' <br/> <strong>Название учебного заведения (Средн.спец):</strong> ' . $_REQUEST["university_so_2"] .
			' <br/> <strong>Специальность по диплому (Средн.спец):</strong> ' . $_REQUEST["specialty_so_2"] .
			' <br/> <strong>Год окончания (Средн.спец):</strong> ' . $_REQUEST["specialty_so_2"] .
			' <br/> <strong>Название учебного заведения (Средн.спец):</strong> ' . $_REQUEST["university_so_3"] .
			' <br/> <strong>Специальность по диплому (Средн.спец):</strong> ' . $_REQUEST["specialty_so_3"] .
			' <br/> <strong>Год окончания (Средн.спец):</strong> ' . $_REQUEST["specialty_so_3"] .
			' <br/> <strong>Владение языками:</strong> ' . $_REQUEST["lang"] .
			' <br/> <strong>Другой язык:</strong> ' . $_REQUEST["lang_name"] .
			' <br/> <strong>Владение ПК:</strong> ' . $_REQUEST["pc"] .
			' <br/> <strong>Программное обеспечение:</strong> ' . $_REQUEST["programms"] .
			' <br/> <strong>Имеется ли опыт работы:</strong> ' . $_REQUEST["m_work"] .
			' <br/> <strong>Компания:</strong> ' . $_REQUEST["company_work_1"] .
			' <br/> <strong>Период работы:</strong> ' . $_REQUEST["period_work_1"] .
			' <br/> <strong>Задачи:</strong> ' . $_REQUEST["work_project_1"] .
			' <br/> <strong>Компания:</strong> ' . $_REQUEST["company_work_2"] .
			' <br/> <strong>Период работы:</strong> ' . $_REQUEST["period_work_2"] .
			' <br/> <strong>Задачи:</strong> ' . $_REQUEST["work_project_2"] .
			' <br/> <strong>Готов ли к командировкам</strong> ' . $_REQUEST["trip"] .
			' <br/> <strong>Зарплатные ожидания :</strong> ' . $_REQUEST["salary"] .
			' <br/> <strong>О себе:</strong> ' . $_REQUEST["about"];

		message_to_telegram($text_to_send);

		add_filter('wp_mail_content_type', 'set_html_content_type');
		if (wp_mail('asmi-work046@yandex.ru, vorobevaov@rubexgroup.ru,pogozihvv@rubexgroup.ru,Silin@rubexgroup.ru,asmi-work046@yandex.ru,contact@rubexgroup.ru', 'Вакансия', $text_to_send, $headers))
			wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
		else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_resume_send', 'resume_send');
add_action('wp_ajax_nopriv_resume_send', 'resume_send');

function resume_send()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		$tel = $_REQUEST['tel'];
		$tel = $_REQUEST['tel'];
		$comment = $_REQUEST['comment'];
		$photo = $_REQUEST['file'];

		$headers = array(
			'From: Сайт RubEx Group <RubExGroup@yandex.ru>',
			'content-type: form/multipart',
		);

		$text_to_send = '<h1>Резюме:</h1><strong>Вакансия:</strong> ' . $_REQUEST["vakansy"] . '<br/><strong>Телефон:</strong> ' . $_REQUEST["tel"] . '<br/> <strong>Комментарий:</strong> ' . $_REQUEST["comment"];

		message_to_telegram($text_to_send);

		add_filter('wp_mail_content_type', 'set_html_content_type');
		if (wp_mail('asmi-work046@yandex.ru, vorobevaov@rubexgroup.ru,pogozihvv@rubexgroup.ru,Silin@rubexgroup.ru,asmi-work046@yandex.ru,contact@rubexgroup.ru', 'Резюме', $text_to_send, $headers, $photo))
			wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span><pre>" . $_FILES['photo'] . '</pre>');
		else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

// ------ Отправка опроса

add_action('wp_ajax_opros_sendr', 'opros_sendr');
add_action('wp_ajax_nopriv_opros_sendr', 'opros_sendr');

function opros_sendr()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$oprData = json_decode(stripcslashes($_REQUEST["data"]), true);

		$headers = array(
			'From: Сайт RubEx Group <RubExGroup@yandex.ru>',
			'content-type: form/multipart',
		);

		$send_adr = ["asmi-work046@yandex.ru", "vorobevaov@rubexgroup.ru", "vorobevav@rubexgroup.ru"];

		$subj = "Опрос о производстве ПВХ рукавам";

		$content = "<h2>" . $_REQUEST["opr_name"] . "</h2>";

		$content .= "<strong>ID компании</strong><br/>";
		$content .= $_REQUEST["cid"] . "<br/>";

		foreach ($oprData as $item) {
			$content .= "<h3>" . $item["question"] . "<h3/>";

			foreach ($item["results"] as $rez) {
				$content .= "<p>" . $rez['q'] . " <b>" . $rez['otv'] . "</b></p>";
			}

			$content .= "<strong>Свой вариант</strong> " . $item["other"];
		}




		add_filter('wp_mail_content_type', 'set_html_content_type');
		if (wp_mail($send_adr, $subj, $content, $headers))
			wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span><pre>" . gettype($oprData) . '</pre>');
		else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_main_load_file', 'main_load_file');
add_action('wp_ajax_nopriv_main_load_file', 'main_load_file');

function main_load_file()
{

	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$movrez = move_uploaded_file($_FILES['file']['tmp_name'], get_template_directory() . '/download/' . $_FILES['file']['name']);

		if ($movrez) {
			wp_die(get_template_directory() . '/download/' . $_FILES['file']['name']);
		} else {
			wp_die('При загрузке файла произошла ошибка', '', 403);
		}
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_contacts_send', 'contacts_send');
add_action('wp_ajax_nopriv_contacts_send', 'contacts_send');

function contacts_send()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт RubEx <RubExGroup@yandex.ru>',
			'content-type: text/html',
		);

		add_filter('wp_mail_content_type', 'set_html_content_type');

		$text_to_send = '<strong>С какой формы:</strong> Обратная связь' . '<br/> <strong>Имя:</strong> ' . $_REQUEST["name"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["tel"] . ' <br/> <strong>Email:</strong> ' . $_REQUEST["email"] . ' <br/> <strong>Регион:</strong> ' . $_REQUEST["region"] . ' <br/> <strong>Направление:</strong> ' . $_REQUEST["napr"] . ' <br/> <strong>Сообщение:</strong> ' . $_REQUEST["mes"];

		message_to_telegram($text_to_send);

		//carbon_get_theme_option( 'as_email_send' )
		if (wp_mail(carbon_get_theme_option('as_email_send'), 'Заявка со страницы Контакты', $text_to_send, $headers))
			wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
		else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

//обработка тендеров

function filter_where1($where = '')
{

	$where .= " AND post_date >= '" . $_POST['year'] . "-01-01' AND post_date < '" . $_POST['year'] . "-12-31'";
	echo $year;
	return $where;
}

add_action('wp_ajax_load_news', 'load_news');
add_action('wp_ajax_nopriv_load_news', 'load_news');
function load_news()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}
	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		if ($_REQUEST['cat'] || $_REQUEST['year']) {



			$args = array(
				'cat' => 173,
				'year' => $_REQUEST['year'],
				'posts_per_page' => -1,
			);

			if ($_REQUEST['cat'] !== "Все направления") {
				$args["meta_key"] = '_rg_single_news_them';
				$args["meta_value"] = $_REQUEST['cat'];
				$args["meta_compare"] = '=';
			}

			$query = new WP_Query($args);
			$html = '';
			$inc = 0;
			if ($query->have_posts()):
				while ($query->have_posts()):
					$query->the_post();
					if ($inc < 4) {
						$html .= '<div class="news-item"><div class="news-item__photo" style="background-image: url(' . get_the_post_thumbnail_url() . '"></div>	<div class="news-item__content"><div class="news-item__title">' . get_the_title() . '</div><div class="news-item__date">' . get_the_date('d.m.Y') . '</div><div class="news-item__text"><p>' . get_the_excerpt() . '</p></div>
		<a href="' . get_permalink() . '" class="main-catalog__photo-link">' . __('Читать далее', 'rubex') . '</a>
	</div></div>';
					} else {
						$html .= '<div class="news-item news-item__toggle" style="display:none;"><div class="news-item__photo" style="background-image: url(' . get_the_post_thumbnail_url() . '"></div>	<div class="news-item__content"><div class="news-item__title">' . get_the_title() . '</div><div class="news-item__date">' . get_the_date('d.m.Y') . '</div><div class="news-item__text">' . get_the_excerpt() . '</div>
		<a href="' . get_permalink() . '" class="main-catalog__photo-link">' . __('Читать далее', 'rubex') . '</a>
	</div></div>';
					}

					$inc++;
				endwhile;
				if ($inc > 4) {
					$html .= '<a href="#" class="load-more">' . __('Показать еще', 'rubex') . '</a>';
				}
				wp_die($html);
			else:
				wp_die('<h2>' . __('Нет новостей за этот период', 'rubex') . '</h2>');
			endif;
		}
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}



add_action('wp_ajax_get_cantry', 'get_cantry');
add_action('wp_ajax_nopriv_get_cantry', 'get_cantry');
function get_cantry()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$rezStr = '<option value="" disabled selected>' . _x("Выберите страну", "rubex") . '*</option>';
		$rezStr .= '<option value="Россия">' . _x("Россия", "rubex") . '</option>';
		$rezStr .= '<option value="Азербайджан">' . _x("Азербайджан", "rubex") . '</option>';
		$rezStr .= '<option value="Армения">' . _x("Армения", "rubex") . '</option>';
		$rezStr .= '<option value="Белоруссия">' . _x("Белоруссия", "rubex") . '</option>';
		$rezStr .= '<option value="Казахстан">' . _x("Казахстан", "rubex") . '</option>';
		$rezStr .= '<option value="Киргизия">' . _x("Киргизия", "rubex") . '</option>';
		$rezStr .= '<option value="Молдавия">' . _x("Молдавия", "rubex") . '</option>';
		$rezStr .= '<option value="Таджикистан">' . _x("Таджикистан", "rubex") . '</option>';
		$rezStr .= '<option value="Туркменистан">' . _x("Туркменистан", "rubex") . '</option>';
		$rezStr .= '<option value="Узбекистан">' . _x("Узбекистан", "rubex") . '</option>';
		$rezStr .= '<option value="Украина">' . _x("Украина", "rubex") . '</option>';
		$rezStr .= '<option value="Страны Евросоюза">' . _x("Страны Евросоюза", "rubex") . '</option>';
		$rezStr .= '<option value="Другие государства">' . _x("Другие государства", "rubex") . '</option>';

		wp_die($rezStr);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_get_city', 'get_city');
add_action('wp_ajax_nopriv_get_city', 'get_city');
function get_city()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$rezStr = '<option value="" disabled selected>' . _x("Выберите регион", "rubex") . '*</option>';
		$rezStr .= '<option value="Брянская область">' . _x("Брянская область", "rubex") . '</option>';
		$rezStr .= '<option value="Камчатский край">' . _x("Камчатский край", "rubex") . '</option>';
		$rezStr .= '<option value="Приморский край">' . _x("Приморский край", "rubex") . '</option>';
		$rezStr .= '<option value="Тамбовская область">' . _x("Тамбовская область", "rubex") . '</option>';
		$rezStr .= '<option value="Хабаровский край">' . _x("Хабаровский край", "rubex") . '</option>';
		$rezStr .= '<option value="Ленинградская область">' . _x("Ленинградская область", "rubex") . '</option>';
		$rezStr .= '<option value="Ненецкий автономный округ">' . _x("Ненецкий автономный округ", "rubex") . '</option>';
		$rezStr .= '<option value="Новгородская область">' . _x("Новгородская область", "rubex") . '</option>';
		$rezStr .= '<option value="Псковская область">' . _x("Псковская область", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Карелия">' . _x("Республика Карелия", "rubex") . '</option>';
		$rezStr .= '<option value="Архангельская область">' . _x("Архангельская область", "rubex") . '</option>';
		$rezStr .= '<option value="Вологодская область">' . _x("Вологодская область", "rubex") . '</option>';
		$rezStr .= '<option value="г. Санкт-Петербург">' . _x("г. Санкт-Петербург", "rubex") . '</option>';
		$rezStr .= '<option value="Калининградская область">' . _x("Калининградская область", "rubex") . '</option>';
		$rezStr .= '<option value="Мурманская область">' . _x("Мурманская область", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Коми">' . _x("Республика Коми", "rubex") . '</option>';
		$rezStr .= '<option value="Пермский край">' . _x("Пермский край", "rubex") . '</option>';
		$rezStr .= '<option value="Тюменская область">' . _x("Тюменская область", "rubex") . '</option>';
		$rezStr .= '<option value="Ханты-Мансийский автономный округ">' . _x("Ханты-Мансийский автономный округ", "rubex") . '</option>';
		$rezStr .= '<option value="Ямало-Ненецкий автономный округ">' . _x("Ямало-Ненецкий автономный округ", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Татарстан">' . _x("Республика Татарстан", "rubex") . '</option>';
		$rezStr .= '<option value="Саратовская область">' . _x("Саратовская область", "rubex") . '</option>';
		$rezStr .= '<option value="Удмуртская Республика">' . _x("Удмуртская Республика", "rubex") . '</option>';
		$rezStr .= '<option value="Амурская область">' . _x("Амурская область", "rubex") . '</option>';
		$rezStr .= '<option value="Волгоградская область">' . _x("Волгоградская область", "rubex") . '</option>';
		$rezStr .= '<option value="Магаданская область">' . _x("Магаданская область", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Саха (Якутия)">' . _x("Республика Саха (Якутия)", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Северная Осетия - Алания">' . _x("Республика Северная Осетия - Алания", "rubex") . '</option>';
		$rezStr .= '<option value="Сахалинская область">' . _x("Сахалинская область", "rubex") . '</option>';
		$rezStr .= '<option value="Ставропольский край">' . _x("Ставропольский край", "rubex") . '</option>';
		$rezStr .= '<option value="Алтайский край">' . _x("Алтайский край", "rubex") . '</option>';
		$rezStr .= '<option value="Иркутская область">' . _x("Иркутская область", "rubex") . '</option>';
		$rezStr .= '<option value="Новосибирская область">' . _x("Новосибирская область", "rubex") . '</option>';
		$rezStr .= '<option value="Омская область">' . _x("Омская область", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Алтай">' . _x("Республика Алтай", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Хакасия">' . _x("Республика Хакасия", "rubex") . '</option>';
		$rezStr .= '<option value="Кировская область">' . _x("Кировская область", "rubex") . '</option>';
		$rezStr .= '<option value="Пензенская область">' . _x("Пензенская область", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Марий Эл">' . _x("Республика Марий Эл", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Мордовия">' . _x("Республика Мордовия", "rubex") . '</option>';
		$rezStr .= '<option value="Самарская область">' . _x("Самарская область", "rubex") . '</option>';
		$rezStr .= '<option value="Ульяновская область">' . _x("Ульяновская область", "rubex") . '</option>';
		$rezStr .= '<option value="Чувашская Республика">' . _x("Чувашская Республика", "rubex") . '</option>';
		$rezStr .= '<option value="Курганская область">' . _x("Курганская область", "rubex") . '</option>';
		$rezStr .= '<option value="Свердловская область">' . _x("Свердловская область", "rubex") . '</option>';
		$rezStr .= '<option value="Челябинская область">' . _x("Челябинская область", "rubex") . '</option>';
		$rezStr .= '<option value="Нижегородская область">' . _x("Нижегородская область", "rubex") . '</option>';
		$rezStr .= '<option value="Оренбургская область">' . _x("Оренбургская область", "rubex") . '</option>';
		$rezStr .= '<option value="Pеспублика Башкортостан">' . _x("Pеспублика Башкортостан", "rubex") . '</option>';
		$rezStr .= '<option value="Забайкальский край">' . _x("Забайкальский край", "rubex") . '</option>';
		$rezStr .= '<option value="Кемеровская область">' . _x("Кемеровская область", "rubex") . '</option>';
		$rezStr .= '<option value="Красноярский край">' . _x("Красноярский край", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Бурятия">' . _x("Республика Бурятия", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Тыва">' . _x("Республика Тыва", "rubex") . '</option>';
		$rezStr .= '<option value="Томская область">' . _x("Томская область", "rubex") . '</option>';
		$rezStr .= '<option value="Белгородская область">' . _x("Белгородская область", "rubex") . '</option>';
		$rezStr .= '<option value="Еврейская автономная область">' . _x("Еврейская автономная область", "rubex") . '</option>';
		$rezStr .= '<option value="Карачаево-Черкесская Республика">' . _x("Карачаево-Черкесская Республика", "rubex") . '</option>';
		$rezStr .= '<option value="Краснодарский край">' . _x("Краснодарский край", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Дагестан">' . _x("Республика Дагестан", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Ингушетия">' . _x("Республика Ингушетия", "rubex") . '</option>';
		$rezStr .= '<option value="Чеченская Республика">' . _x("Чеченская Республика", "rubex") . '</option>';
		$rezStr .= '<option value="Астраханская область">' . _x("Астраханская область", "rubex") . '</option>';
		$rezStr .= '<option value="Кабардино-Балкарская Республика">' . _x("Кабардино-Балкарская Республика", "rubex") . '</option>';
		$rezStr .= '<option value="Курская область">' . _x("Курская область", "rubex") . '</option>';
		$rezStr .= '<option value="Орловская область">' . _x("Орловская область", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Адыгея">' . _x("Республика Адыгея", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Калмыкия">' . _x("Республика Калмыкия", "rubex") . '</option>';
		$rezStr .= '<option value="Чукотский автономный округ">' . _x("Чукотский автономный округ", "rubex") . '</option>';
		$rezStr .= '<option value="Владимирская область">' . _x("Владимирская область", "rubex") . '</option>';
		$rezStr .= '<option value="г. Москва">' . _x("г. Москва", "rubex") . '</option>';
		$rezStr .= '<option value="Ивановская область">' . _x("Ивановская область", "rubex") . '</option>';
		$rezStr .= '<option value="Калужская область">' . _x("Калужская область", "rubex") . '</option>';
		$rezStr .= '<option value="Костромская область">' . _x("Костромская область", "rubex") . '</option>';
		$rezStr .= '<option value="Московская область">' . _x("Московская область", "rubex") . '</option>';
		$rezStr .= '<option value="Рязанская область">' . _x("Рязанская область", "rubex") . '</option>';
		$rezStr .= '<option value="Смоленская область">' . _x("Смоленская область", "rubex") . '</option>';
		$rezStr .= '<option value="Тверская область">' . _x("Тверская область", "rubex") . '</option>';
		$rezStr .= '<option value="Тульская область">' . _x("Тульская область", "rubex") . '</option>';
		$rezStr .= '<option value="Ярославская область">' . _x("Ярославская область", "rubex") . '</option>';
		$rezStr .= '<option value="Воронежская область">' . _x("Воронежская область", "rubex") . '</option>';
		$rezStr .= '<option value="г. Севастополь">' . _x("г. Севастополь", "rubex") . '</option>';
		$rezStr .= '<option value="Липецкая область">' . _x("Липецкая область", "rubex") . '</option>';
		$rezStr .= '<option value="Республика Крым">' . _x("Республика Крым", "rubex") . '</option>';
		$rezStr .= '<option value="Ростовская область">' . _x("Ростовская область", "rubex") . '</option>';

		wp_die($rezStr);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}


add_action('wp_ajax_tenders', 'tenders');
add_action('wp_ajax_nopriv_tenders', 'tenders');
function tenders()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		add_filter('posts_where', 'filter_where1');

		if ($_POST['ajaxAction'] == "getYearTender") {
			$posts = new WP_Query(array("posts_per_page" => 5, "cat" => "117"));
		} else {
			$posts = new WP_Query(array("posts_per_page" => -1, "cat" => "117"));
		}


		remove_filter('posts_where', 'filter_where1');


		while ($posts->have_posts()) {
			$posts->the_post();
			if (in_category(117)):
				echo "<div class = 'tenders-item'>";
				echo "<div class = 'tenders-item__title'>" . get_the_title() . "</div>";
				echo "<div class = 'tenders-item__text'>" . get_the_excerpt() . "</div>";
				echo "<a href = '" . get_the_permalink() . "' class='data-item__link'>Подробнее</a>";
				echo "</div>";
			endif;
		}
		if ($_POST['ajaxAction'] == "getYearTender" && $posts->have_posts()) {
			echo '<a href="#" class="data-more-link">Смотреть еще</a>';
		}

		wp_reset_postdata();


		wp_die("");
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}


add_action('wp_ajax_vacancy_list', 'vacancy_list');
add_action('wp_ajax_nopriv_vacancy_list', 'vacancy_list');

function vacancy_list()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}
	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		$args = '';
		$vac_direction = $_REQUEST['vac_direction'];
		$vac_subdivision = $_REQUEST['vac_region'];
		$args = array(
			'posts_per_page' => -1,
			'cat' => '2435',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'is_show_vacancy',
					'value' => 'yes',
					'compare' => '='
				),
				array(
					'key' => 'vac_direction',
					'value' => $vac_direction,
					'compare' => 'LIKE'
				),
				array(
					'key' => 'vac_subdivision',
					'value' => $vac_subdivision,
					'compare' => 'LIKE'
				)
			),
		);
		$vacancy_html = 'Вакансий не найдено';
		$query = new WP_Query($args);
		if ($query->have_posts()) {
			$vacancy_html = '<div class="vacancy_list_table">';
			while ($query->have_posts()) {
				$query->the_post();
				$vacancy_html .= '<div class="vacancy-item">';
				$vacancy_html .= '<div class="vacancy-item__title">' . get_the_title(get_the_ID()) . '</div>';
				$vacancy_html .= '<div class="vacancy-item__region">' . carbon_get_the_post_meta('vac_subdivision') . '</div>';
				$vacancy_html .= '<div class="vacancy-item__direction">' . carbon_get_the_post_meta('vac_direction') . '</div>';
				$vacancy_html .= '<a href="' . get_permalink(get_the_ID()) . '" class="vacancy-item__link">Подробнее</a>';
				$vacancy_html .= '</div>';
			}
			$vacancy_html .= '</div>';
		}

		wp_die($vacancy_html);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

/*
add_filter('template_include', 'my_template');
function my_template( $template ) {
 $main_cat_id = 173;
 if (cat_is_ancestor_of( $main_cat_id, get_query_var('cat') ) or is_category( $main_cat_id) ) {
  $new_template = locate_template( array( 'category-173.php' ) );
  return $new_template ;
 }
 return $template;
}
*/


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* --------------------- API RubEx Price-------------------------------- */

// Регистрирует маршрут для авторизации
//http://rubexgroup.ru/wp-json/rubexprice/v2/autorization
add_action('rest_api_init', function () {
	register_rest_route('rubexprice/v2', '/autorization', array(
		'methods'  => 'GET',
		'callback' => 'get_rp_autorisation',
		'args' => array(
			'login' => array(
				'default'           => null,
				'required'          => true,
			),
			'password' => array(
				'default'           => null,
				'required'          => true,
			)
		),
	));
});

// Обрабатывает запрос
function get_rp_autorisation(WP_REST_Request $request)
{

	$rez = array();

	if (empty($request['login']) || empty($request['password']))
		return new WP_Error('no_authorisation', 'Неверные логин и/или пароль', array('status' => 403));

	global $wpdb;
	$fivesdrafts = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='" . $request['login'] . "'", ARRAY_A);

	if (empty($fivesdrafts))
		return new WP_Error('no_authorisation', 'Такая учетная запись не найдена.', array('status' => 403));

	if ($fivesdrafts[0]["moderate"] <= 0)
		return new WP_Error('no_authorisation', 'Ваша учетная запись еще не подтверждена.', array('status' => 403));

	if ($fivesdrafts[0]["passHeshes"]) {

		if ($fivesdrafts[0]["RPPasword"] == md5(stripcslashes($request['password']) . "mainsalt"))
			$rez["RPlogin2"] = array("mail" => $fivesdrafts[0]["RPemail"], "p" => $fivesdrafts[0]['RPPasword'], "type" => $fivesdrafts[0]['moderate'], "passType" => $fivesdrafts[0]["passHeshes"], "psale" => $fivesdrafts[0]["personalSale"], "rezident" => $fivesdrafts[0]["Rezedent"], "obr" => $fivesdrafts[0]["RPname"] . " " . $fivesdrafts[0]["RPfname"]);
		else return new WP_Error('no_authorisation', 'Неверные логин и/или пароль', array('status' => 403));
	} else {

		if ($fivesdrafts[0]["RPPasword"] == stripcslashes($request['password']))
			$rez["RPlogin2"] = array("mail" => $fivesdrafts[0]["RPemail"],  "p" => $fivesdrafts[0]['RPPasword'], "type" => $fivesdrafts[0]['moderate'], "passType" => $fivesdrafts[0]["passHeshes"], "psale" => $fivesdrafts[0]["personalSale"], "rezident" => $fivesdrafts[0]["Rezedent"], "obr" => $fivesdrafts[0]["RPname"] . " " . $fivesdrafts[0]["RPfname"]);
		else return new WP_Error('no_authorisation', 'Неверные логин и/или пароль', array('status' => 403));
	}

	$allRez = $wpdb->get_results("SELECT * FROM `wp_im_salesetings` WHERE `RPemail` = '" . $request['login'] . "'", ARRAY_A);

	$rez["RPdefSkl"] = isset($allRez[0]["defaultSklad"]) ? $allRez[0]["defaultSklad"] : "Склады КРТ";

	$defCa = isset($allRez[0]["defaultKontragent"]) ? $allRez[0]["defaultKontragent"] : -1;
	$rez["selContragent"] = setSelContragent($defCa, $request['login']);

	return $rez;
}

/* --------------------- API RubEx Trands (Bi ТОиР)-------------------------------- */

// Регистрирует маршрут для получения списка линий




// Регистрирует маршрут для получения среза данных по показателю для всех линий

$registerTrueAddres = [
	"178.67.198.143",
];

define("BI_SERVICE_DB_NAME", "krtiru_biservic");
define("BI_SERVICE_USER_NAME", "krtiru_biservic");
define("BI_SERVICE_USER_PASS", "UID5LXhmU3P7");
define("BI_SERVICE_DB_HOST", "localhost");

add_action('rest_api_init', function () {
	register_rest_route('bi/v2', '/worklines', array(
		'methods'  => 'GET',
		'callback' => 'get_work_line',
	));


	register_rest_route('bi/v2', '/lineinfo', array(
		'methods'  => 'GET',
		'callback' => 'get_lineinfo',
		'args' => array(
			'linename' => array(
				'default'           => null,
				'required'          => true,
			),
			'aktiv' => array(
				'default'           => null,
				'required'          => true,
			),
			'data' => array(
				'default'           => null,
				'required'          => true,
			)

		),
	));

	register_rest_route('bi/v2', '/kpiinfo', array(
		'methods'  => 'GET',
		'callback' => 'get_kpiinfo',
		'args' => array(
			'kpi' => array(
				'default'           => null,
				'required'          => true,
			),
			'aktiv' => array(
				'default'           => null,
				'required'          => true,
			),
			'data' => array(
				'default'           => null,
				'required'          => true,
			)
		),
	));

	register_rest_route('bi/v2', '/biautorise', array(
		'methods'  => 'GET',
		'callback' => 'get_biautorise',
		'args' => array(
			'reginfo' => array(
				'default'           => null,
				'required'          => true,
			)
		),
	));

	register_rest_route('bi/v2', '/userautorization', array(
		'methods'  => 'GET',
		'callback' => 'user_autorization',
		'args' => array(
			'autinfo' => array(
				'default'           => null,
				'required'          => true,
			)
		),
	));

	register_rest_route('bi/v2', '/relogin', array(
		'methods'  => 'GET',
		'callback' => 'relogin',
		'args' => array(
			'mail' => array(
				'default'           => null,
				'required'          => true,
			)
		),
	));

	register_rest_route('bi/v2', '/passrec', array(
		'methods'  => 'GET',
		'callback' => 'pass_rec',
		'args' => array(
			'mail' => array(
				'default'           => null,
				'required'          => true,
			)
		),
	));

	register_rest_route('bi/v2', '/get_user_list', array(
		'methods'  => 'GET',
		'callback' => 'get_user_list',
	));

	register_rest_route('bi/v2', '/get_all_data', array(
		'methods'  => 'GET',
		'callback' => 'get_all_data',
	));

	register_rest_route('bi/v2', '/set_user_activation', array(
		'methods'  => 'GET',
		'callback' => 'set_user_activation',
		'args' => array(
			'doaction' => array(
				'default'           => null,
				'required'          => true,
			)
		),
	));

	register_rest_route('bi/v2', '/rest_test', array(
		'methods'  => 'GET',
		'callback' => 'rest_test',
	));
});


//http://rubexgroup.ru/wp-json/bi/v2/worklines
function get_work_line(WP_REST_Request $request)
{

	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);
	$worklines = $serviceBase->get_results("SELECT `line` FROM `rubex_bi_toir` WHERE `activ` = 'СЗРТ' GROUP BY `line`", ARRAY_A);

	if (empty($worklines))
		return new WP_Error('no_author_posts', 'Данные не найдены', ['status' => 404]);
	else {
		$firstLineValues = $serviceBase->get_results("SELECT `vipolnenie_otm`,`rassledovanie_po`,`vneplan_rab`,`expl_got`,`osvoenie_pof` FROM `rubex_bi_toir` WHERE `line` = '" . $worklines[0]["line"] . "'", ARRAY_A);
	}
	return array(
		"lines" => $worklines,
		"firstLine" => $worklines[0]["line"],
		"firstLineValues" => $firstLineValues[0]
	);
}

//http://rubexgroup.ru/wp-json/bi/v2/lineinfo?linename=ЛИНИЯ АНБР&data=2021-01-31&aktiv=СЗРТ
function get_lineinfo(WP_REST_Request $request)
{

	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	if ($request['data'] === "Текущая")
		$query = "SELECT `vipolnenie_otm`,`rassledovanie_po`,`vneplan_rab`,`expl_got`,`osvoenie_pof` FROM `rubex_bi_toir` WHERE `activ` = '" . $request['aktiv'] . "' AND `line` = '" . $request['linename'] . "' AND `type` = '" . $request['data'] . "'";
	else
		$query = "SELECT `vipolnenie_otm`,`rassledovanie_po`,`vneplan_rab`,`expl_got`,`osvoenie_pof` FROM `rubex_bi_toir` WHERE `activ` = '" . $request['aktiv'] . "' AND `line` = '" . $request['linename'] . "' AND `date` = '" . $request['data'] . "'";

	$LineValues = $serviceBase->get_results($query, ARRAY_A);


	if (empty($LineValues))
		return new WP_Error('no_work_line', 'Данные не найдены', ['status' => 404]);

	return $LineValues[0];
}

//http://rubexgroup.ru/wp-json/bi/v2/kpiinfo
//http://rubexgroup.ru/wp-json/bi/v2/kpiinfo?aktiv=СЗРТ&kpi=ВЫПОЛНЕНИЕ ОТМ
function get_kpiinfo(WP_REST_Request $request)
{

	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	if ($request['data'] === "Текущая")
		$KPIValues = $serviceBase->get_results("SELECT * FROM `rubex_bi_toir` WHERE `activ` = '" . $request['aktiv'] . "'  AND `type` = '" . $request['data'] . "' GROUP BY `line`", ARRAY_A);
	else
		$KPIValues = $serviceBase->get_results("SELECT * FROM `rubex_bi_toir` WHERE `activ` = '" . $request['aktiv'] . "'  AND `date` = '" . $request['data'] . "' GROUP BY `line`", ARRAY_A);


	if (empty($KPIValues))
		return new WP_Error('no_author_posts', 'Данные не найдены', ['status' => 404]);

	else {
		$name = array();
		$vals = array();
		$nameTrue = array();
		foreach ($KPIValues as $KPI) {
			$name[] = explode(" ", $KPI["line"]);
			$nameTrue[] = $KPI["line"];

			if (mb_strtoupper($request['kpi']) === "ВЫПОЛНЕНИЕ ОТМ")
				$vals[] = $KPI["vipolnenie_otm"];
			if (mb_strtoupper($request['kpi']) === "РАССЛЕДОВАНИЕ ПРИЧИН ОТКАЗОВ")
				$vals[] = $KPI["rassledovanie_po"];
			if (mb_strtoupper($request['kpi']) === "ДОЛЯ ВНЕПЛАНОВЫХ РАБОТ")
				$vals[] = $KPI["vneplan_rab"];
			if (mb_strtoupper($request['kpi']) === "ЭКСПЛУАТАЦИОННАЯ ГОТОВНОСТЬ")
				$vals[] = $KPI["expl_got"];
			if (mb_strtoupper($request['kpi']) === "ТОЧНОСТЬ ОСВОЕНИЯ ПОФ")
				$vals[] = $KPI["osvoenie_pof"];
		}
		return array(
			"name" => $name,
			"value" => $vals,
			"nameFull" => $nameTrue,
		);
	}
}
// https://rubexgroup.ru/wp-json/bi/v2/biautorise?reginfo=null
function get_biautorise(WP_REST_Request $request)
{

	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	$reginfo = json_decode($request["reginfo"], true);

	$addResult = $serviceBase->get_results("SELECT * FROM `service_users` WHERE `mail` = '" . $reginfo["mail"] . "'");

	if (!empty($addResult))
		return new WP_Error('user_exist', 'Пользователь с таким e-mail уже зарегистрирован.', ['status' => 403]);

	$addResult = $serviceBase->insert('service_users', array(
		"fio" => $reginfo["fio"],
		"mail" => $reginfo["mail"],
		"podrazdelenie" => $reginfo["podrazdelenie"],
		"dolgnost" => $reginfo["dolgnost"],
		"pass" => md5($reginfo["pass"] . "dssff3fxx")
	));

	if (empty($addResult))
		return new WP_Error('no_inser_user', 'При регистрации возникли ошибки попробуйте позднее', ['status' => 403]);
	else
		return array("result" => true);
}

//http://rubexgroup.ru/wp-json/bi/v2/userautorization?autinfo=null
//https://rubexgroup.ru/wp-json/bi/v2/userautorization?autinfo[mail]=asmi-work046@yandex.ru&autinfo[pass]=1111
function user_autorization(WP_REST_Request $request)
{


	$autinfo = json_decode($request["autinfo"], true);

	if (empty($autinfo))
		$autinfo = $request["autinfo"];

	if (empty($autinfo)) return new WP_Error('no_user_data', 'Учетные данные не переданы.', ['status' => 403]);

	$mail = $autinfo["mail"];
	$password = $autinfo["pass"];
	$passwordSalt = md5($password . "dssff3fxx");

	$token = rand(200000, 300000);

	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	$user_feeld =  $serviceBase->get_results("SELECT * FROM `service_users` WHERE `mail` = '" . $mail . "' AND `pass` =  '" . $passwordSalt . "'");

	if (!empty($user_feeld)) {
		if (empty($user_feeld[0]->autorize))
			return new WP_Error('no_checed_user', 'Ваша учетная запись еще не активирована администартором.', ['status' => 403]);

		$updateRez = $serviceBase->update(
			"service_users",
			array(
				"autorizeKey" => $token,
			),
			array(
				"id" => $user_feeld[0]->id,
			)
		);

		return array(
			"fio" => $user_feeld[0]->fio,
			"podrazdelenie" => $user_feeld[0]->podrazdelenie,
			"mail" => $user_feeld[0]->mail,
			"dolgnost" => $user_feeld[0]->dolgnost,
			"seans_length" => $user_feeld[0]->seans_length,
			"token" => $token
		);
	} else {
		return new WP_Error('no_user', 'Пользоватея с такими данными нет в системе.', ['status' => 403]);
	}
}

//http://rubexgroup.ru/wp-json/bi/v2/relogin?mail=asmi-work046@yandex.ru
function relogin(WP_REST_Request $request)
{
	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	$updateRez = $serviceBase->update(
		"service_users",
		array(
			"autorizeKey" => 0,
		),
		array(
			"mail" => $request["mail"],
		)
	);
	if (!empty($updateRez))
		return array("dell" => true);
	else
		return new WP_Error('no_token', 'Токен не найден или пользователь уже разлогинен.', ['status' => 403]);
}

//http://rubexgroup.ru/wp-json/bi/v2/passrec?mail=asmi-work046@yandex.ru
function pass_rec(WP_REST_Request $request)
{
	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	$user_feeld =  $serviceBase->get_results("SELECT * FROM `service_users` WHERE `mail` = '" . $request["mail"] . "'");

	if (empty($user_feeld)) return new WP_Error('no_user', 'Пользоватея с такими данными нет в системе.', ['status' => 403]);

	if (empty($user_feeld[0]->autorize)) return new WP_Error('no_checed_user', 'Ваша учетная запись еще не активирована администратором.', ['status' => 403]);

	$newPass = gen_password(4);
	$newPassHesh = md5($newPass . "dssff3fxx");
	$updateRez = $serviceBase->update(
		"service_users",
		array(
			"pass" => $newPassHesh,
		),
		array(
			"id" => $user_feeld[0]->id,
		)
	);

	if (!empty($updateRez)) {
		$headers = array(
			'From: Корпоративные сервисы RubEx Group <RubExGroup@yandex.ru>',
			'content-type: text/html',
		);

		add_filter('wp_mail_content_type', 'set_html_content_type');

		$mail_message =
			"<h1>Восстановление пароля</h1>" .
			"<p>Ваш логин:<p>" .
			"<p>" . $request["mail"] . "</p>" .
			"<p>Ваш новый пароль:<p>" .
			"<p>" . $newPass . "</p>" .
			"<a href = 'https://bi.rubexgroup.ru'>Перейти в сервис.</a>";

		if (wp_mail($user_feeld[0]->mail, "Восстановление пароля", $mail_message, $headers)) {
			return array("send" => true);
		} else
			return new WP_Error('no_send_mail', 'Письмо с новым паролем не отправлено, попробуйте позднее или обратитесь к администратору. ', ['status' => 403]);

		return array("dell" => true);
	} else
		return new WP_Error('no_update_base', 'Пароль не изменен обратитесь к администратору.', ['status' => 403]);
}

//http://rubexgroup.ru/wp-json/bi/v2/get_user_list
function get_user_list(WP_REST_Request $request)
{
	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	$userlist = $serviceBase->get_results("SELECT * FROM `service_users`");
	if (!empty($userlist))
		return $userlist;
	else
		return new WP_Error('no_data', 'Данные не получены.', ['status' => 403]);
}

//http://rubexgroup.ru/wp-json/bi/v2/get_all_data
function get_all_data(WP_REST_Request $request)
{
	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	$datelist = $serviceBase->get_results("SELECT `date` FROM `rubex_bi_toir` WHERE `type` = 'Архив' GROUP BY `date`");
	$datelistMain = $serviceBase->get_results("SELECT `date` FROM `rubex_bi_toir` WHERE `type` = 'Текущая' GROUP BY `date`");

	if (!empty($datelistMain))
		$datelist[]["date"] = "Текущая";

	if (!empty($datelist))
		return $datelist;
	else
		return new WP_Error('no_data', 'Данные не получены.', ['status' => 403]);
}

//http://rubexgroup.ru/wp-json/bi/v2/set_user_activation
function set_user_activation(WP_REST_Request $request)
{
	$serviceBase = new wpdb(BI_SERVICE_USER_NAME, BI_SERVICE_USER_PASS, BI_SERVICE_DB_NAME, BI_SERVICE_DB_HOST);

	$datelist = $serviceBase->get_results("SELECT `date` FROM `rubex_bi_toir` WHERE `type` = 'Архив' GROUP BY `date`");
	if (!empty($datelist))
		return $datelist;
	else
		return new WP_Error('no_data', 'Данные не получены.', ['status' => 403]);
}



//http://rubexgroup.ru/wp-json/bi/v2/rest_test
function rest_test(WP_REST_Request $request)
{
	return $_SERVER;
}


add_action('init', 'do_rewrite');
function do_rewrite()
{
	// Правило перезаписи
	add_rewrite_rule('^(rubex-rti-shop/konvejernye-lenty-ceny/conv_lenta)/([^/]*)/?', 'index.php?pagename=$matches[1]&tovname=$matches[2]', 'top');

	// add_rewrite_rule( '^(vtorichnaya)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );
	// add_rewrite_rule( '^(novostrojki)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );
	// add_rewrite_rule( '^(doma-uchastki-dachi)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );
	// add_rewrite_rule( '^(kommercheskaya)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );


	// скажем WP, что есть новые параметры запроса
	add_filter('query_vars', function ($vars) {
		$vars[] = 'tovname';
		// $vars[] = 'onpage';
		return $vars;
	});
}

add_filter('wpseo_title', function ($title) {
	if (is_page(21986)) {
		$param = explode("ТУ", urldecode(get_query_var("tovname")));

		$standart = "ТУ" . $param[1];
		$nam = $param[0];
		$title = "Лента конвейерная резинотканевая " . $nam;
	}
	return $title;
}, 10, 1);


add_filter('wpseo_metadesc', function ($metadesc) {

	if (is_page(21986)) {
		$param = explode("ТУ", urldecode(get_query_var("tovname")));

		$standart = "ТУ" . $param[1];
		$nam = $param[0];

		$metadesc = "Купить конвейерную ленту " . $nam . " " . $standart . " Производство Курскрезинотехника. Выгодные оптовые цены.";
	}

	return $metadesc;
}, 10, 1);


add_filter('wpseo_sitemap_page_content', 'add_archive_URL');

function add_archive_URL()
{

	global $wpdb;
	$q = 'SELECT * FROM `wp_im_product_transfer` WHERE `ukrnam` = "Лента конвейерная с текстилем" AND `geo` = "КРТ" ';
	$allpage = $wpdb->get_results($q);

	$url = "";
	$index = 0;
	foreach ($allpage as $us) {
		$urlMain = get_the_permalink(21986) . $us->name;

		$date = get_post_modified_time('Y-m-d h:i:s', true, 21986);
		$last_mod = YoastSEO()->helpers->date->format($date);

		$url .= "\t<url>\n";
		$url .= "\t\t<loc>$urlMain</loc>\n";
		$url .= "\t\t<lastmod>$last_mod</lastmod>\n";
		$url .= "\t</url>\n";

		$index++;
	}


	return $url;
}

add_action('save_post', 'my_project_updated_send_email');
function my_project_updated_send_email($post_id)
{



	$all_cat = get_the_category($post_id);

	if ($all_cat[0]->term_id != 117)
		return;

	$post_data = get_post($post_id);

	if (wp_is_post_revision($post_id) || $post_data->post_status != 'publish')
		return;

	$tg_text = '<b>Опубликовано извещение: ' . $post_data->post_title . '</b>' . "\n\r" . "Цитата: " . get_the_excerpt($post_id);
	message_to_telegram($tg_text);

	add_filter('wp_mail_content_type', 'set_html_content_type');

	$headers = array(
		'From: Сайт RubEx <RubExGroup@yandex.ru>',
		'content-type: text/html',
	);

	$post_title = get_the_title($post_id);
	$post_url = get_permalink($post_id);
	$subject = 'Опубликовано извещение: ' . $post_data->post_title;

	$message = $tg_text;
	$message .= $post_title . ": " . $post_url;
	$sendAdr = "vorobevaov@rubexgroup.ru,vorobevav@rubexgroup.ru,asmi-work046@yandex.ru,petkovaiv@rubexgroup.ru";
	wp_mail($sendAdr, $subject, $message, $headers);
}

include "mes-rest.php";
include "product-rest.php";
