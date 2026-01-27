<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Container\Condition\Condition; 

Container::make( 'theme_options', 'as_theme_options', 'Настройки темы' )
  //Главная страница
    ->add_tab('Главная', array(
      Field::make( 'image', 'as_logo', 'Логотип')
        ->set_width(30),
      Field::make( 'image', 'as_logo_white', 'Логотип белый')
        ->set_width(30),
      Field::make('complex', 'main_slider', 'Слайдер на Главной')
        ->add_fields(array(
          Field::make('image', 'image', 'Фото'),
		  Field::make('text', 'video_file', 'Имя видеофайла'),
		  Field::make('text', 'banner_title', 'Заголовок'),
		  Field::make('rich_text', 'banner_sub_title', 'Подзаголовок'),
		  
        )),
      Field::make('text', 'site_en', 'Cсылка на английскую версию'),
    ))
    ->add_tab('Продуктовый магазин', array(

        Field::make('text', 'text_const_cat', 'Название Константы (Конвейерная лента)')
          ->set_width(50),
      Field::make( 'image', 'as_menu_photo_1', 'Фото в меню (Конвейерная лента)')
        ->set_width(50),
        Field::make('text', 'as_catalog_file_2', 'Название Константы (Промышленные рукава)')
          ->set_width(50),

      Field::make( 'image', 'as_menu_photo_2', 'Фото в меню (Промышленные рукава)')
        ->set_width(50),
        Field::make('text', 'as_catalog_file_3', 'Название Константы (Рукава высокого давления)')
          ->set_width(50),

      Field::make( 'image', 'as_menu_photo_3', 'Фото в меню (Рукава высокого давления)')
        ->set_width(50),
      Field::make('text', 'as_catalog_file_4', 'Название Константы (ПВХ Рукава)')
        ->set_width(50),
      Field::make( 'image', 'as_menu_photo_4', 'Фото в меню (ПВХ Рукава)')
        ->set_width(50),
      Field::make('text', 'as_catalog_file_5', 'Название Константы (Рукава для авто)')
        ->set_width(50),
      Field::make( 'image', 'as_menu_photo_5', 'Фото в меню (Рукава для авто)')
        ->set_width(50),
    ))
    ->add_tab('Разное', array(
      Field::make( 'text', 'as_link_shop', 'Ссылка на магазин')
        ->set_width(30),
     
    ))
    ->add_tab('Каталог на Главной', array(
      Field::make('text', 'main_catalog_title_1', 'Заголовок')
        ->set_width(25),
      Field::make('text', 'main_catalog_id_1', 'ID категории')
        ->set_width(25),
      Field::make('file', 'main_catalog_file_1', 'Файл каталога')
        ->set_value_type('url')
        ->set_width(25),
	Field::make('image', 'main_catalog_img_1', 'Картинка')
        ->set_width(25),
	
      Field::make('text', 'main_catalog_title_2', 'Заголовок')
        ->set_width(25),
      Field::make('text', 'main_catalog_id_2', 'ID категории')
        ->set_width(25),
      Field::make('file', 'main_catalog_file_2', 'Файл каталога')
        ->set_value_type('url')
        ->set_width(25),
	Field::make('image', 'main_catalog_img_2', 'Картинка')
        ->set_width(25),	
		
      Field::make('text', 'main_catalog_title_3', 'Заголовок')
        ->set_width(25),
      Field::make('text', 'main_catalog_id_3', 'ID категории')
        ->set_width(25),
      Field::make('file', 'main_catalog_file_3', 'Файл каталога')
        ->set_value_type('url')
        ->set_width(25),
	Field::make('image', 'main_catalog_img_3', 'Картинка')
        ->set_width(25),	

    ))
    ->add_tab('Контакты', array(
        Field::make( 'text', 'as_phone', __( 'Телефон горячей линии' ) )
          ->set_width(100),
        Field::make( 'text', 'as_phone_1', __( 'Телефон' ) )
          ->set_width(100),
        Field::make( 'text', 'as_email', __( 'Email' ) )
          ->set_width(100),
        Field::make( 'text', 'as_adress', __( 'Адрес' ) )
          ->set_width(100),
        
        Field::make( 'text', 'as_insta', __( 'Инстаграм' ) )
          ->set_width(30),
        Field::make( 'text', 'as_face', __( 'Facebook' ) )
          ->set_width(30),
        Field::make( 'text', 'as_vk', __( 'Вконтакте' ) )
          ->set_width(30),
        Field::make( 'text', 'mkad_map_point', __( 'Центр карты' ) )
          ->set_width(30),
    ) )
	->add_tab('Список e-mail для рассылки', array( 
	  	Field::make( 'text', 'ob_email', 'Email для рассылки со страницы контакты (Общий)'),
		Field::make( 'text', 'marketing_email', 'Email службы маркетинга'),
		Field::make( 'text', 'rnd_email', 'Email службы R&D'),
		Field::make( 'text', 'zak_email', 'Email службы закупок'),
		Field::make( 'text', 'prod_email', 'Email службы продаж'),
		Field::make( 'text', 'hr_email', 'Email службы HR'),
		Field::make( 'text', 'bez_email', 'Email службы безопасности'),
		Field::make( 'text', 'service_email', 'Email сервисного центра'),
		Field::make( 'text', 'pobr_email', 'Email для рассылки прямых обращений'),
		Field::make( 'text', 'test_email', 'Email для теста системы')
		
	));

//Страница page
Container::make('post_meta', 'as_page', 'Дополнительные поля')
  ->show_on_post_type('page')
  ->add_fields(array(
    Field::make('image', 'page_banner', 'Баннер')
  ));
  
Container::make('post_meta', 'as_page_lang', 'Английйская версия')
  ->show_on_post_type(array('page', 'post'))
  ->add_fields(array(
    Field::make('text', 'page_en', 'Ссылка на английскую версию')
      ->set_width(30),
    Field::make('text', 'sort_catalog', 'Общий порядок')
      ->set_default_value( '1' )
      ->set_width(30),
    Field::make('text', 'sort_category_main', 'Cортировка в основной категории ()')
		->set_default_value( '1' )	
      ->set_width(30),

  ));


//Single страницы РВД 

Container::make('post_meta', 'as_single_RVD_osn', 'Основные параметры (таблица)')
  ->show_on_template(array('single-rvd.php'))
  ->add_fields(array(
    Field::make('text', 'rvd_vnutr', 'Внутренний слой')
      ->set_width(25),
    Field::make('text', 'rvd_vnesh', 'Внешний слой')
      ->set_width(25),
    Field::make('text', 'rvd_prok', 'Прокладка')
      ->set_width(25),
    Field::make('text', 'rvd_temp', 'Температура') 
      ->set_width(25),
  ));

//Single страницы Медиа

Container::make('post_meta', 'as_single_RVD_osn', 'Основные параметры (таблица)')
  ->show_on_template(array('page-media.php'))
  ->add_fields(array(
    Field::make('complex', 'video_media', 'Видео')
      ->add_fields(array(
        Field::make('textarea', 'iframe', 'Фрейм')
          ->set_width(30),
        Field::make('text', 'title', 'Заголовок')
          ->set_width(30),
      )),
    Field::make('complex', 'brochure_media', 'Брошюры')
      ->add_fields(array(
        Field::make('text', 'name', 'Название')
          ->set_width(30),
        Field::make('image', 'img', 'Обложка')
          ->set_width(30),
        Field::make('text', 'text_const', 'Название Константы')
          ->set_width(30),
        // Field::make('file', 'file', 'Файл')
        //   ->set_value_type('url')
        //   ->set_width(30)
      )),
    Field::make('complex', 'industry_media', 'Отраслевые решения')
      ->add_fields(array(
        Field::make('text', 'name', 'Название')
          ->set_width(30),
        Field::make('image', 'img', 'Обложка')
          ->set_width(30),
        Field::make('text', 'text_const', 'Название Константы')
          ->set_width(30),
        // Field::make('file', 'file', 'Файл')
        //   ->set_value_type('url')
        //   ->set_width(30)
      )),
    Field::make('complex', 'photo_media', 'Фото')
      ->add_fields(array(
        Field::make('text', 'name', 'Заголовок')
          ->set_width(30),
        Field::make('text', 'size', 'Размер')
          ->set_width(30),
        Field::make('text', 'paremeters', 'Параметры')
          ->set_width(30),
        Field::make('image', 'img', 'Миниатюра')
          ->set_width(30),
        Field::make('file', 'file', 'Файл для скачивания')
          ->set_value_type('url')
          ->set_width(30)
      )),
    Field::make('complex', 'catalog_media', 'Каталоги')
      ->add_fields(array(
        Field::make('text', 'name', 'Название')
          ->set_width(30),
        Field::make('image', 'img', 'Обложка')
          ->set_width(30),
        Field::make('text', 'text_const', 'Название Константы')
          ->set_width(30),
        // Field::make('file', 'file', 'Файл')
        //   ->set_value_type('url')
        //   ->set_width(30)
      )),
    Field::make('complex', 'logo_media', 'Бренд')
      ->add_fields(array(
        Field::make('image', 'logo', 'Логотип')
          ->set_width(30),
        Field::make('image', 'jpeg', 'Файл jpeg')
          ->set_width(20),
        Field::make('image', 'png', 'Файл PNG')
          ->set_width(20),
        Field::make('image', 'tif', 'Файл tif')
          ->set_width(20),
      ))
  ));

//Single страницы ПВХ 

Container::make('post_meta', 'as_single_pvh_osn', 'Основные параметры (таблица)')
  ->show_on_template(array('single-pvh.php'))
  ->add_fields(array(
    Field::make('text', 'pvh_temp', 'Температура') 
      ->set_width(25),
    Field::make('text', 'pvh_color', 'Цвет') 
      ->set_width(25),
    Field::make('complex', 'pvh_condition', 'Таблица размеров')
      ->add_fields(array(
        Field::make('text', 'vnutr', 'Внутренний диаметр')
          ->set_width(12),
        Field::make('text', 'tol', 'Толщина стенок')
          ->set_width(12),
        Field::make('text', 'work_davl', 'Рабочее давление')
          ->set_width(12),
        Field::make('text', 'radius', 'Радиус изгиба')
          ->set_width(12),
        Field::make('text', 'work_raz', 'Рабочее разряжение')
          ->set_width(12),
        Field::make('text', 'buhta', 'Длина бухты')
          ->set_width(12),
      ))
  ));
Container::make('post_meta', 'as_single_RVD_table', 'Таблица размеров')
  ->show_on_template(array('single-rvd.php'))
  ->add_fields(array(
    Field::make('complex', 'rvd_condition', 'Таблица размеров')
      ->add_fields(array(
        Field::make('text', 'nomin', 'Номинальный диаметр')
          ->set_width(12),
        Field::make('text', 'vnutr', 'Внутренний диаметр')
          ->set_width(12),
        Field::make('text', 'opletka', 'Диаметр с оплетками')
          ->set_width(12),
        Field::make('text', 'vnesh', 'Внешний диаметр')
          ->set_width(12),
        Field::make('text', 'work_davl', 'Рабочее давление')
          ->set_width(12),
        Field::make('text', 'test_davl', 'Тестовое давление')
          ->set_width(12),
        Field::make('text', 'davl_razryv', 'Давление на разрыв')
          ->set_width(12),
      ))
  ));


// Container::make('post_meta', 'shtuc_table', 'Таблица размеров')
//   ->show_on_template(array('single-shtuc.php'))
//   ->add_fields(array(
//     Field::make('complex', 'shtuc_condition', 'Таблица размеров')
//       ->add_fields(array(
//         Field::make('text', 'nomin', 'Номинальный диаметр')
//           ->set_width(12),
//         Field::make('text', 'vnutr', 'Внутренний диаметр')
//           ->set_width(12),
//         Field::make('text', 'opletka', 'Диаметр с оплетками')
//           ->set_width(12),
//         Field::make('text', 'vnesh', 'Внешний диаметр')
//           ->set_width(12),
//         Field::make('text', 'work_davl', 'Рабочее давление')
//           ->set_width(12),
//         Field::make('text', 'test_davl', 'Тестовое давление')
//           ->set_width(12),
//         Field::make('text', 'davl_razryv', 'Давление на разрыв')
//           ->set_width(12),
//       ))
//   ));

Container::make('post_meta', 'as_single_auto_primenen', 'Таблица размеров')
  ->show_on_template(array('single-auto_primenen.php'))
  ->add_fields(array(
    Field::make('complex', 'auto_condition', 'Таблица размеров')
      ->add_fields(array(
        Field::make('text', 'cond_name', 'Условное обозначение')
          ->set_width(12),
        Field::make('text', 'name', 'Наименование')
          ->set_width(12),
        Field::make('text', 'naznach', 'Назначение')
          ->set_width(12),
        Field::make('text', 'kg', 'кг/шт')
          ->set_width(12),
      ))
  ));
//Single страницы Промышленные рукава
Container::make('post_meta', 'as_single_prom', 'Дополнительные поля')
  // ->where( 'post_template', '=', 'single-prom.php' )
  //   ->where( 'post_type', '=', 'post' )
  ->show_on_template(array('single-davlenie.php', 'single-prom.php', 'single-auto_primenen.php', 'single-auto.php'))
  // ->where( 'post_id', '=', '19075' )
  ->add_fields(array(
    Field::make('text', 'prom_vnutr', 'Внутренний слой')
      ->set_width(30),
    Field::make('text', 'prom_vnesh', 'Внешний слой')
      ->set_width(30),
    Field::make('text', 'prom_prok', 'Прокладка')
      ->set_width(30),
    Field::make('text', 'prom_temp', 'Температура') 
      ->set_width(30),
    Field::make('text', 'prom_temp_2', 'Температура (2)') 
      ->set_width(30),
    Field::make('text', 'prom_pred', 'Предел прочности')
      ->set_width(30),
  ));
  
Container::make('post_meta', 'as_single_condition', 'Таблица')

  ->show_on_template(array('single-prom.php'))

  ->add_fields(array(
    Field::make('complex', 'prom_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'vnutr', 'Внутренний диаметр')
          ->set_width(20),
        Field::make('text', 'qty', 'Количество прокладок')
          ->set_width(20),
        Field::make('text', 'tolsch', 'Толщина стенки')
          ->set_width(20),
        Field::make('text', 'max_radius', 'Максимальный радиус изгиба')
          ->set_width(20),
        Field::make('text', 'vnesh', 'Внешний диаметр')
          ->set_width(20),
        Field::make('text', 'weight', 'Примерный вес')
          ->set_width(20),
        Field::make('text', 'volue', 'Давление')
          ->set_width(20),
        Field::make('text', 'width', 'Длина')
          ->set_width(20),
      ))
  ));
  
Container::make('post_meta', 'as_single_flanc', 'Таблица')

  ->show_on_template(array('single-flanc.php'))

  ->add_fields(array(
    Field::make('complex', 'flanc_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр')
          ->set_width(20),
        Field::make('text', 'width', 'Длина')
          ->set_width(20),
        Field::make('text', 'iznosost', 'Износост. слой')
          ->set_width(20),
        Field::make('text', 'davlen', 'Рабочее давление')
          ->set_width(20),
        Field::make('text', 'vacuum', 'Вакуум')
          ->set_width(20),
      ))
  ));
  
Container::make('post_meta', 'as_single_muft', 'Таблица')

  ->show_on_template(array('single-muft.php'))

  ->add_fields(array(
    Field::make('complex', 'muft_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр')
          ->set_width(20),
        Field::make('text', 'width', 'Длина')
          ->set_width(20),
        Field::make('text', 'iznosost', 'Износост. слой')
          ->set_width(20),
        Field::make('text', 'davlen', 'Рабочее давление')
          ->set_width(20),
        Field::make('text', 'vacuum', 'Вакуум')
          ->set_width(20),
      ))
  ));
  
Container::make('post_meta', 'as_single_colco', 'Таблица')

  ->show_on_template(array('single-colco.php'))

  ->add_fields(array(
    Field::make('complex', 'colco_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр трубопровода')
          ->set_width(20),
        Field::make('text', 'vnutr_colco', 'Внутр. диаметр кольца')
          ->set_width(20),
        Field::make('text', 'vnesh_colco', 'Внешний. диаметр кольца')
          ->set_width(20),
        Field::make('text', 'height', 'Высота кольца')
          ->set_width(20),
      ))
  ));
  
Container::make('post_meta', 'as_single_mufta', 'Таблица')

  ->show_on_template(array('single-mufta.php'))

  ->add_fields(array(
    Field::make('complex', 'mufta_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Диаметр трубопровода')
          ->set_width(20),
        Field::make('text', 'size_1', 'Размер D1')
          ->set_width(20),
        Field::make('text', 'size_2', 'Размер D2')
          ->set_width(20),
        Field::make('text', 'qty_otverst', 'Количество отверстий в ответном фланце')
          ->set_width(20),
        Field::make('text', 'width_paza', 'Ширина паза')
          ->set_width(20),
        Field::make('text', 'height_mufta', 'Высота муфты')
          ->set_width(20),
        Field::make('text', 'tolshina', 'Толщина фланца')
          ->set_width(20),
        Field::make('text', 'volue', 'Рабочее давление')
          ->set_width(20),
      ))
  ));
Container::make('post_meta', 'as_single_otvod', 'Таблица')

  ->show_on_template(array('single-otvod.php'))

  ->add_fields(array(
    Field::make('complex', 'otvod_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр')
          ->set_width(20),
        Field::make('text', 'iznosost', 'Износост. слой')
          ->set_width(20),
        Field::make('text', 'davlen', 'Рабочее давление')
          ->set_width(20),
        Field::make('text', 'vacuum', 'Вакуум')
          ->set_width(20),
        Field::make('text', 'axb', 'AxB')
          ->set_width(20),
        Field::make('text', 'radius', 'Радиус изгиба')
          ->set_width(20),
      ))
  ));

  Container::make('post_meta', 'as_single_perehod', 'Таблица')

  ->show_on_template(array('single-konus_perehod.php'))

  ->add_fields(array(
    Field::make('complex', 'perehod_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр')
          ->set_width(20),
        Field::make('text', 'iznosost', 'Износост. слой')
          ->set_width(20),
        Field::make('text', 'davlen', 'Рабочее давление')
          ->set_width(20),
        Field::make('text', 'vacuum', 'Вакуум')
          ->set_width(20),
      ))
  ));

  Container::make('post_meta', 'as_single_anti', 'Таблица')

  ->show_on_template(array('single-antivibr.php'))

  ->add_fields(array(
    Field::make('complex', 'anti_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр')
          ->set_width(20),
        Field::make('text', 'iznosost', 'Износост. слой')
          ->set_width(20),
        Field::make('text', 'davlen', 'Рабочее давление')
          ->set_width(20),
        Field::make('text', 'vacuum', 'Вакуум')
          ->set_width(20),
      ))
  ));
  Container::make('post_meta', 'as_single_linza', 'Таблица')

  ->show_on_template(array('single-linza.php'))

  ->add_fields(array(
    Field::make('complex', 'linza_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр')
          ->set_width(20),
        Field::make('text', 'width', 'Длина')
          ->set_width(20),
        Field::make('text', 'sgatie', 'Сжатие')
          ->set_width(20),
        Field::make('text', 'rast', 'Растяжение')
          ->set_width(20),
        Field::make('text', 'sdvig', 'Сдвиг')
          ->set_width(20),
        Field::make('text', 'ugol', 'Угол')
          ->set_width(20),
        Field::make('text', 'volue', 'Растяжение')
          ->set_width(20),
      ))
  ));


Container::make('post_meta', 'as_single_patrubok', 'Таблица')

  ->show_on_template(array('single-patrubok.php'))

  ->add_fields(array(
    Field::make('complex', 'patrubok_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'name', 'Наименование')
          ->set_width(20),
        Field::make('text', 'vnutr', 'Внутр. диаметр')
          ->set_width(20),
        Field::make('text', 'iznosost', 'Износост. слой')
          ->set_width(20),
        Field::make('text', 'davlen', 'Рабочее давление')
          ->set_width(20),
      ))
  ));


  Container::make('post_meta', 'rg_single_condition', 'Похожие товары')
	->show_on_template(array('single-prom.php','single-rvd.php','single-conveer-tkan.php','single-conveer-tros.php','single-auto.php','single-auto_primenen.php','single-tehplastina.php'))
	
	->add_fields(array( Field::make( 'text', 'rg_single_condition_products', 'ID продуктов для показа в рекомендованных (через запятую)')
        ->set_width(100),
	     
  ));

Container::make('post_meta', 'as_single_condition', 'Таблица')
  // ->where( 'post_template', '=', 'single-prom.php' )
  //   ->where( 'post_type', '=', 'post' )
  ->show_on_template(array('single-auto.php'))
  // ->where( 'post_id', '=', '19075' )
  ->add_fields(array(
    Field::make('complex', 'single_auto_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'vnutr', 'Внутренний диаметр')
          ->set_width(20),
        Field::make('text', 'tolsch', 'Толщина стенки')
          ->set_width(20),
        Field::make('text', 'vnesh', 'Внешний диаметр')
          ->set_width(20),
        Field::make('text', 'volue', 'Давление')
          ->set_width(20),
        Field::make('text', 'qty', 'Количество прокладок')
          ->set_width(20),
        Field::make('text', 'max_radius', 'Радиус изгиба')
          ->set_width(20),
        Field::make('text', 'weight', 'Примерный вес')
          ->set_width(20),
        Field::make('text', 'width', 'Длина')
          ->set_width(20),
      ))
  ));
  
  //'single-conveer.php', 
Container::make('post_meta', 'as_single_condition', 'Таблица')
  ->show_on_template(array('single-conveer.php', 'single-conveer-tkan.php'))
  ->add_fields(array(
    Field::make('complex', 'conveer_condition', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'type', 'Тип ленты')
          ->set_width(20),
        Field::make('text', 'type_tkan', 'Тип ткани прокладки')
          ->set_width(20),
        Field::make('text', 'qty_proklad', 'Количество прокладок')
          ->set_width(20),
        Field::make('text', 'prochnost', 'Прочность при разрыве по основе')
          ->set_width(20),
        Field::make('text', 'vid', 'Вид борта')
          ->set_width(20),
      ))
  ));
  
  //single-conveer-tros.php
Container::make('post_meta', 'as_single_condition_tros', 'Таблица')
  ->show_on_template(array('single-conveer-tros.php'))
  ->add_fields(array(
    Field::make('complex', 'conveer_condition_tros', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'type', 'Тип ленты')
          ->set_width(20),
        Field::make('text', 'diam_tros', 'Диаметр троса')
          ->set_width(20),
        Field::make('text', 'prochnost', 'Прочность при разрыве по основе Н/мм')
          ->set_width(20),
        Field::make('text', 'massa', 'Расчетная масса ленты (кг/м2)')
          ->set_width(20),
        Field::make('text', 'tolsch', 'Толщина ленты, мм')
          ->set_width(20),
        Field::make('text', 'length', 'Длина, м')
          ->set_width(20),
      ))
  ));
  //'single-resinatkan.php', 
Container::make('post_meta', 'as_single_rezinatkan', 'Таблица')
  ->show_on_template(array('single-resinatkan.php'))
  ->add_fields(array(
    Field::make('complex', 'rezinatkan_table', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'type', 'Тип ленты')
          ->set_width(20),
        Field::make('text', 'type_tkan', 'Тип ткани прокладки')
          ->set_width(20),
        Field::make('text', 'qty_proklad', 'Количество прокладок')
          ->set_width(20),
        Field::make('text', 'prochnost', 'Прочность при разрыве по основе')
          ->set_width(20),
        Field::make('text', 'vid', 'Вид борта')
          ->set_width(20),
      ))
  ));
  //'single-resinatros.php', 
Container::make('post_meta', 'as_single_rezinatkan', 'Таблица')
  ->show_on_template(array('single-resinatros.php'))
  ->add_fields(array(
    Field::make('complex', 'rezinatkan_table', 'Таблица')
      ->add_fields(array(
        Field::make('text', 'type', 'Тип ленты')
          ->set_width(20),
        Field::make('text', 'diameter', 'Диаметр троса, мм')
          ->set_width(20),
        Field::make('text', 'prochnost', 'Прочность при разрыве по основе Н/мм')
          ->set_width(20),
        Field::make('text', 'massa', 'Расчетная масса ленты (кг/м2)')
          ->set_width(20),
        Field::make('text', 'tolsh', 'Толщина ленты, мм')
          ->set_width(20),
        Field::make('text', 'length', 'Длина, м')
          ->set_width(20),
      ))
  ));
  
//Single страницы Новости 

Container::make('post_meta', 'rg_single_news', 'Параметры для новостей')
  ->show_on_template(array('single-news.php'))
  ->add_fields(array(
    Field::make('select', 'rg_single_news_them', 'Тема новости')
      ->set_width(100)->set_options( array(
        'Общекорпоративные' => "Общекорпоративные",
        'Конвейерная лента' => "Конвейерная лента",
        'Промышленные рукава' => "Промышленные рукава",
        'Гидравлические рукава' => "Гидравлические рукава",
        'Техническая пластина' => "Техническая пластина",
        'Формовые и неформовые' => "Формовые и неформовые",
        'Резиновые смеси' => "Резиновые смеси",
    ) ),
	
	Field::make('image', 'rg_single_news_img_1', 'Фото 1')
      ->set_width(20),
    Field::make('image', 'rg_single_news_img_2', 'Фото 2')
      ->set_width(20),
	Field::make('image', 'rg_single_news_img_3', 'Фото 3')
      ->set_width(20),
    Field::make('image', 'rg_single_news_img_4', 'Фото 4')
      ->set_width(20),	
  ));
  
Container::make('post_meta', 'rg_single_project', 'Параметры для новостей')
  ->show_on_template(array('single-project.php'))
  ->add_fields(array(
    Field::make('image', 'page_banner', 'Баннер'),
	Field::make('select', 'rg_single_project_them', 'Тема новости')
      ->set_width(100)->set_options( array(
        'Общекорпоративные' => "Общекорпоративные",
        'Конвейерная лента' => "Конвейерная лента",
        'Промышленные рукава' => "Промышленные рукава",
        'Гидравлические рукава' => "Гидравлические рукава",
        'Техническая пластина' => "Техническая пластина",
        'Формовые и неформовые' => "Формовые и неформовые",
        'Резиновые смеси' => "Резиновые смеси",
    ) )
	
	
  ));  
  
// Параметры для реквизитов и документов  
Container::make('post_meta', 'rg_page_requizit_rg', 'Реквизиты и документы RubEx Group')
  ->show_on_template(array('page-rekvisit.php'))
  ->add_fields(array(
    Field::make('file', 'requizit_rg_inn1', 'Cвидетельство ИНН ООО Рабэкс Групп')
      ->set_width(30)->set_value_type('url'),
	Field::make('file', 'requizit_rg_ogrn', 'Cвидетельство ОГРН ООО Рабэкс Групп')
      ->set_width(30)->set_value_type('url'),
	Field::make('file', 'requizit_rg_ustav', 'Устав ООО Рабэкс Групп')
      ->set_width(30)->set_value_type('url'),
));

// Документы учебного центра  
Container::make('post_meta', 'rg_teach_center', 'Документы учебного центра')
  ->show_on_template(array('page-teach_center.php'))
  ->add_fields(array(
    Field::make('complex', 'rg_teach_center_docs', 'Документы')
    ->add_fields(array(
      Field::make('text', 'title', 'Заголовок')
        ->set_width(50),
      Field::make('file', 'file', 'Файл')
        ->set_width(50)->set_value_type('url')
      ))
));

Container::make('post_meta', 'rg_page_requizit_krt', 'Реквизиты и документы КРТ')
  ->show_on_template(array('page-rekvisit.php'))
  ->add_fields(array(
    Field::make('file', 'requizit_krt_inn', 'Cвидетельство ИНН ОАО "Курскрезинотехника"')
      ->set_width(20)->set_value_type('url'),
	Field::make('file', 'requizit_krt_ogrn', 'Cвидетельство ОГРН ОАО "Курскрезинотехника"')
      ->set_width(20)->set_value_type('url'),
	Field::make('file', 'requizit_krt_ustav', 'Устав ООО ОАО "Курскрезинотехника"')
      ->set_width(20)->set_value_type('url'),
	  
	Field::make('file', 'requizit_krt_policy', 'Политика в области качества 2018г. ОАО "Курскрезинотехника"')
      ->set_width(20)->set_value_type('url'),
));  
  
Container::make('post_meta', 'rg_page_requizit_szrt', 'Реквизиты и документы СЗРТ')
  ->show_on_template(array('page-rekvisit.php'))
  ->add_fields(array(
    Field::make('file', 'requizit_szrt_inn', 'Cвидетельство ИНН ОАО "Cаранский завод "Резинотехника"')
      ->set_width(25)->set_value_type('url'),
	Field::make('file', 'requizit_szrt_ogrn', 'Cвидетельство ОГРН ОАО "Cаранский завод "Резинотехника"')
      ->set_width(25)->set_value_type('url'),
	Field::make('file', 'requizit_szrt_ustav', 'Устав ООО ОАО "Cаранский завод "Резинотехника"')
      ->set_width(25)->set_value_type('url'),
	  
	Field::make('file', 'requizit_szrt_policy', 'Политика в области качества 2020г. ОАО "Cаранский завод "Резинотехника"')
      ->set_width(25)->set_value_type('url'),
	
	
	Field::make('complex', 'requizit_szrt_sert_all', 'Сертификаты')
      ->add_fields(array(
        Field::make('text', 'sert_title', 'Заголовок')
          ->set_width(50),
		Field::make('file', 'sert_file', 'Сертификат')
		->set_width(50)->set_value_type('url')
    ))
	
	/*
	Field::make('file', 'requizit_szrt_sert_iso_2011', 'Сертификат соответствия СМК ГОСТ ISO 9001-2011')
      ->set_width(25)->set_value_type('url'),
	Field::make('file', 'requizit_szrt_sert_iso_2008en', 'Сертификат соответствия СМК ISO 9001-2008 (ENG)')
      ->set_width(25)->set_value_type('url'),
	Field::make('file', 'requizit_szrt_sert_iso_2008', 'Сертификат соответствия СМК ISO 9001-2008')
      ->set_width(25)->set_value_type('url'),
	Field::make('file', 'requizit_szrt_sert_iso_2012', 'Сертификат соответствия СМК ГОСТ РВ 0015-002- 2012')
      ->set_width(25)->set_value_type('url'),
	 */
));

//Страница закупок
Container::make('post_meta', 'as_page_zacupki', 'Дополнительные поля')
  // ->show_on_template('page-zacupki.php')
  // ->where( 'post_template', '=', 'page-zacupki.php' )
  ->where( 'post_id', '=', '28' )
  ->add_fields(array(
    Field::make('text', 'zac_title_1', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_1', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('text', 'zac_title_2', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_2', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('text', 'zac_title_3', 'Название файла')
      ->set_width(50),
    Field::make('text', 'zac_file_3', 'Файл документа')
      ->set_width(50),
    Field::make('text', 'zac_title_4', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_4', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('text', 'zac_title_5', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_5', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('text', 'zac_title_6', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_6', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('text', 'zac_title_7', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_7', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('text', 'zac_title_8', 'Название файла')
      ->set_width(50),
    Field::make('text', 'zac_file_8', 'Файл документа')
      ->set_width(50),
    Field::make('text', 'zac_title_9', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_9', 'Файл документа')
      ->set_width(50),
    Field::make('text', 'zac_title_10', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_10', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('text', 'zac_title_11', 'Название файла')
      ->set_width(50),
    Field::make('file', 'zac_file_11', 'Файл документа')
      ->set_width(50)
      ->set_value_type('url'),
  ));
  
//Рубрика товара
Container::make('term_meta', 'as_term_catalog', 'Дополнительные поля')
  // ->where('term_taxonomy', '=', 'asgproductcat')
  ->add_fields(array(
    Field::make('text', 'term_sb_text', 'Название для вывода в сайдбар'),
    Field::make('text', 'term_position', 'Позиция в Каталоге')->set_default_value(0),
    Field::make('image', 'term_product_img', 'Фото категории'),
    Field::make('image', 'term_banner_img', 'Баннер категории'),
    Field::make('text', 'term_en', 'Ссылка на английскую версию'),
    Field::make('file', 'term_catalog_file', 'Файл каталога ')
      ->set_value_type('url'),
  ) );
  
  Container::make('post_meta', 'vacancy_complex_fields', 'Список вакансий')
  ->show_on_template('page-kariera-u2-vokansii.php')
  ->add_fields(array(
     Field::make('complex', 'complex_vakansy', 'Вакансии')
        ->add_fields(array(
      Field::make('checkbox', 'cv_is_show_vacancy', 'Показать вакансию'),
      Field::make('text', 'cv_vac_subdivision', 'Подразделение')
        ->set_width(30),
      Field::make('text', 'cv_vac_direction', 'Направление')
        ->set_width(30),
      Field::make('text', 'cv_vac_vacancy', 'Вакансия')
        ->set_width(30),
      
      Field::make('text', 'cv_vac_region', 'Регион')
        ->set_width(50),
        
      Field::make('text', 'cv_vac_pay', 'Зарплата')
        ->set_width(50),
      
      Field::make('rich_text', 'cv_vac_dities', 'Обязанности')
        ->set_width(30),
      Field::make('rich_text', 'cv_vac_requirements', 'Требования')
        ->set_width(30),
      Field::make('rich_text', 'cv_vac_conditions', 'Условия')
        ->set_width(30),
        ))
    
  ));
  
  
    Container::make('post_meta', 'vacancy_complex_fields', 'Список вакансий')
	->show_on_template('page-vacansii.php')
	->add_fields(array(
		 Field::make('complex', 'complex_vakansy', 'Вакансии')
        ->add_fields(array(
			Field::make('checkbox', 'cv_is_show_vacancy', 'Показать вакансию'),
			Field::make('text', 'cv_vac_subdivision', 'Подразделение')
			  ->set_width(30),
			Field::make('text', 'cv_vac_direction', 'Направление')
			  ->set_width(30),
			Field::make('text', 'cv_vac_vacancy', 'Вакансия')
			  ->set_width(30),
			
			Field::make('text', 'cv_vac_region', 'Регион')
			  ->set_width(50),
			  
			Field::make('text', 'cv_vac_pay', 'Зарплата')
			  ->set_width(50),
			
			Field::make('rich_text', 'cv_vac_dities', 'Обязанности')
			  ->set_width(30),
			Field::make('rich_text', 'cv_vac_requirements', 'Требования')
			  ->set_width(30),
			Field::make('rich_text', 'cv_vac_conditions', 'Условия')
			  ->set_width(30),
        ))
    
  ));

  Container::make('post_meta', 'as_single_blog', 'Параметры блога')
  ->show_on_template(array('single-material.php'))
  ->add_fields(array(
    Field::make('complex', 'blog_sod', 'Содержание')
      ->add_fields(array(
        Field::make('text', 'blog_photo_lnk', 'Ссылка')
          ->set_width(12),

        Field::make('text', 'blog_photo_text', 'Текст')
          ->set_width(12),
      )),

      Field::make('complex', 'blog_photo', 'Боковые фото блога')
      ->add_fields(array(
        Field::make('image', 'blog_photo_img', 'Фото')
          ->set_width(50),

        Field::make('text', 'blog_photo_text', 'Текст')
          ->set_width(12),
      ))
  ));