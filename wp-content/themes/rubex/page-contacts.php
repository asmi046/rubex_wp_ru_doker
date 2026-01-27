<?php
/*
* Template Name: Контакты
*/
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

<section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
  <div class="container">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>
  </div>      
  
  	<div class="container">
			<h1 class="page-title single-product__title"><?_e("Контакты","rubex");?></h1>
	</div>
  
  <div class="container">
    <div class="category-wrapper">
      
		<?php get_template_part('template-parts/sidebar-contacts');?>
	    <div class="product-main">
	    	
	    	<div class="mapLine-wrap " id="mapLine-wrap-4">
		    	<div id = "mapLine-4" class = "mapLine"></div>
				 <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
				<script>
					ymaps.ready(init);
					var myMap;
					function init(){ 
						myMap = new ymaps.Map("mapLine-4", {
							center: [59.93792142, 94.84260950],
							zoom: 2,							controls: ['zoomControl']													}); 
						
						myPlacemark1 = new ymaps.Placemark([51.66105733482322,36.12405733175717], {
								hintContent: '<?_e("Магазин ОАО «Курскрезинотехника»","rubex");?>',
								balloonContent: '<?_e("Магазин ОАО «Курскрезинотехника»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("г.Курск, Проспект Ленинского комсомола, 2К2","rubex");?><br/><strong><?_e("Телефон","rubex");?>Телефон: </strong>+ 7 4712 73 03 63</br>'
						}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					  }); 
						
						myPlacemark2 = new ymaps.Placemark([54.21448807039112,45.251536499999915], {
								hintContent: '<?_e("Магазин ОАО «Саранский завод «Резинотехника»","rubex");?>',
								balloonContent: '<?_e("Магазин ОАО «Саранский завод «Резинотехника»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("г. Саранск, Северо-восточное шоссе, 15","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+ 7 8342 59 54 44</br>'
						}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					  }); 
						myMap.geoObjects.add(myPlacemark1);
						myMap.geoObjects.add(myPlacemark2);
					}
				</script>
				<div class="address">
					<h3><?_e("Магазин ОАО «Курскрезинотехника»","rubex");?></h3>					
					<?_e("г.Курск, Проспект Ленинского комсомола, 2К2","rubex");?><br/>
					<a href="tel:+74712730363">+ 7 4712 73 03 63</a><br/>										
				</div>								
				<div class="address">						
					<h3><?_e("Магазин ОАО «Саранский завод «Резинотехника»","rubex");?></h3>					
					<?_e("г. Саранск, Северо-восточное шоссе, 15","rubex");?></br>
					<a href="tel:+78342595444" class="address-tel">+7 8342 59 54 44</a>	</br>
				</div>
			</div>
			<div class="mapLine-wrap " id="mapLine-wrap-3">
	    	<div id = "mapLine-3" class = "mapLine"></div>
			<script>
				ymaps.ready(init);
				var myMap;
				function init(){ 
					myMap = new ymaps.Map("mapLine-3", {
						center: [49.98970629, 36.25002250],
						zoom: 3,						
						controls: ['zoomControl']											
					}); 
					
				   myPlacemark0 = new ymaps.Placemark([59.922697064194026,30.441785], {hintContent: '<?_e("Филиал «Рабэкс Трэйд Северо-Запад»","rubex");?>',balloonContent: '<?_e("Филиал «Рабэкс Трэйд Северо-Запад»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("Россия, г.Санкт — Петербург, ул Ворошилова, дом 2, оф 527","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+7 812 335 50 17</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					  }); myMap.geoObjects.add(myPlacemark0);

					myPlacemark1 = new ymaps.Placemark([56.76714027, 60.61787550], {hintContent: '<?_e("Филиал «Рабэкс Трэйд Урал»","rubex");?>',balloonContent: '<?_e("Филиал «Рабэкс Трэйд Урал»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("Россия, г.Екатеринбург, ул. Новинская, д.2, литер В1, оф. №202","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+7 343 295 70 37</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					  }); myMap.geoObjects.add(myPlacemark1);

					myPlacemark2 = new ymaps.Placemark([47.2459465742607,39.69299499999991], {hintContent: '<?_e("Региональный склад ООО «ГидроФлекс»","rubex");?>',balloonContent: '<?_e("Региональный склад ООО «ГидроФлекс»","rubex");?>"<br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("344079 , г.Ростов-на-Дону, ул. Нансена, дом № 87","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+7 863 322 00 44</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					}); myMap.geoObjects.add(myPlacemark2);

					myPlacemark3 = new ymaps.Placemark([49.813204173605214,73.08758699999998], {hintContent: '<?_e("Рабэкс Трейд-Казахстан","rubex");?>',balloonContent: '<br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("Республика Казахстан, Карагандинская область, г.Караганда, район имени Казыбек Би, проспект БухарЖырауд.49","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+ 7 015 35 10 58</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					}); myMap.geoObjects.add(myPlacemark3);

					myPlacemark5 = new ymaps.Placemark([55.35566928, 86.05784050], {hintContent: '<?_e("ООО «ТД «КРТ-Сибирь»","rubex");?>',balloonContent: '<?_e("ООО «ТД «КРТ-Сибирь»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("Россия, г.Кемерово, ул.Красноармейская, 50А, комната 11","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+7 3842 75 63 29</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					}); myMap.geoObjects.add(myPlacemark5);

					myPlacemark6 = new ymaps.Placemark([55.75420278, 37.55638850], {hintContent: '<?_e("ООО «Рабэкс Трэйд»","rubex");?>',balloonContent: '<?_e("ООО «Рабэкс Трэйд»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("Россия, г. Москва, Краснопресненская наб., д.12, подъезд 3, оф. №1002","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+7 495 780 97 25</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					}); myMap.geoObjects.add(myPlacemark6);
				}
			
			</script>
				<div class="address">				
					<h3><?_e("Территориальное подразделение ООО «Рабэкс Трэйд» по городу Москве","rubex");?></h3>
					<?_e("Россия, г. Москва, Краснопресненская наб., д.12, подъезд 3, оф. №1002","rubex");?><br/>
					<a href="tel:+74957809725" class="address-tel">+7 495 780 97 25</a><br/>
					<a href="mailto:td-msk@rubexgroup.ru" class="address-tel">td-msk@rubexgroup.ru</a><br/>	
				</div>							
				
				<div class="address">
					<h3><?_e("Территориальное подразделение ООО «Рабэкс Трэйд» по городу Кемерово","rubex");?></h3>
					<?_e("Россия, г.Кемерово, ул.Красноармейская, 50А, комната 11","rubex");?><br/>
					<a href="tel:+73842756329" class="address-tel">+7 3842 75 63 29</a><br/>
					<a href="mailto:td-sib@rubexgroup.ru" class="address-tel">td-sib@rubexgroup.ru</a><br/>
				</div>	
				
				<div class="address">
					<h3><?_e("Территориальное подразделение ООО «Рабэкс Трэйд» по городу Екатеринбургу","rubex");?></h3>
					<?_e("Россия, г.Екатеринбург, ул. Новинская, д.2, литер В1, оф. №202","rubex");?><br/>
					<a href="tel:+73432957037">+7 343 295 70 37</a><br/>
					<a href="mailto:td-ural@rubexgroup.ru">td-ural@rubexgroup.ru</a><br/>
				</div>
				
				<div class="address">
					<h3><?_e("Территориальное подразделение ООО «Рабэкс Трэйд» по городу Санкт-Петербургу","rubex");?></h3>	
					<?_e("Россия, г.Санкт — Петербург, ул Ворошилова, дом 2, оф 527","rubex");?><br/>
					<a href="tel:+78123355017" class="address-tel">+7 812 335 50 17</a><br/>
					<a href="mailto:td-spb@rubexgroup.ru">td-spb@rubexgroup.ru</a><br/>
				</div>
				
									
				<div class="address">
					<h3><?_e("Филиал ТОО «Рабэкс Трэйд — Казахстан»","rubex");?></h3>
					<?_e("Республика Казахстан, Карагандинская область, г.Караганда, район имени Казыбек Би, проспект БухарЖырауд.49","rubex");?><br/>
					<a href="tel:87015351058" class="address-tel">8 7 015 35 10 58</a><br/>	
				</div>
																	
				<div class="address">
					<h3><?_e("Региональный склад ООО «ГидроФлекс»","rubex");?></h3>
					<?_e("344079 , г.Ростов-на-Дону, ул. Нансена, дом № 87","rubex");?>.<br/>
					<a href="tel:+78633220044" class="address-tel">+7 863 322 00 44</a><br/>
					<a href="mailto:gf06@bk.ru" class="address-tel">gf06@bk.ru</a><br/>
				</div>
				
														
			</div>
			
			<div class="mapLine-wrap " id="mapLine-wrap-2">
	    	<div id = "mapLine-2" class = "mapLine"></div>
			<script>
				ymaps.ready(init);
				var myMap;
				function init(){ 
					myMap = new ymaps.Map("mapLine-2", {
						center: [59.93792142, 94.84260950],
						zoom: 2,
						controls: ['zoomControl']					
					}); 
					
					myPlacemark0 = new ymaps.Placemark([54.21884728, 45.25850750], {hintContent: '<?_e("ОАО «Саранский завод «Резинотехника»","rubex");?>',balloonContent: '<?_e("ОАО «Саранский завод «Резинотехника»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("Республика Мордовия, г.Саранск, Октябрьский район, Северо-восточное шоссе, 15","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+7 834 238 04 13</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					}); myMap.geoObjects.add(myPlacemark0);
					myPlacemark1 = new ymaps.Placemark([51.66104472, 36.13015304], {hintContent: '<?_e("ОАО «Курскрезинотехника»","rubex");?>',balloonContent: '<?_e("ОАО «Курскрезинотехника»","rubex");?><br/><strong><?_e("Адрес","rubex");?>: </strong><?_e("Россия, г.Курск, пр-т Ленинского комсомола, 2","rubex");?><br/><strong><?_e("Телефон","rubex");?>: </strong>+7 471 273 03 40</br>'}, {
						iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
						iconImageSize: [30, 54],
						iconImageOffset: [-15, -54]
					}); myMap.geoObjects.add(myPlacemark1);
				}
			</script>
				<div class="address">
					
					<h3><?_e("ОАО «Курскрезинотехника»","rubex");?></h3>
					<div class="address-item">						
						<?_e("Россия, г.Курск, пр-т Ленинского комсомола, 2","rubex");?></br>						
						<a href="tel:+7 471 273 03 40" class="address-tel">+7 471 273 03 40</a></br>						
						<a href = "mailto:kursk@rubexgroup.ru">kursk@rubexgroup.ru</a></br>												
						<a href="<?php echo get_the_permalink(19795); ?>" class = "tdu color-red"><?_e("Реквизиты и документы","rubex");?></a>					
					</div>
															
					<h3><?_e("ОАО «Саранский завод «Резинотехника»","rubex");?></h3>					
					<div class="address-item">
						<?_e("Республика Мордовия, г.Саранск, Октябрьский район, Северо-восточное шоссе, 15","rubex");?></br>
						<a href="tel:+78342380413" class="address-tel">+7 834 238 04 13</a></br>						
						<a href = "mailto:saransk@rubexgroup.ru">saransk@rubexgroup.ru</a></br>												
						<a href="<?php echo get_the_permalink(19795); ?>" class = "tdu color-red"><?_e("Реквизиты и документы","rubex");?></a>					
					</div>					
				</div>
			</div>
			<div class="mapLine-wrap " id="mapLine-wrap-1">
				<div id = "mapLine-1" class = "mapLine"></div>
				<script>
				  ymaps.ready(init);
				  function init () {
					  var myMap = new ymaps.Map("mapLine-1", {
							  center: [55.75420278, 37.55638850],
							  zoom: 14,
							  controls: ['zoomControl']
						  }),
						myPlacemarkAdr = new ymaps.Placemark([55.75420278, 37.55638850], {
							  iconContent: '',
							  balloonContent: '<?_e("Управляющая компания RubEx Group","rubex");?><br/> <b><?_e("Адрес","rubex");?></b> <?_e("Россия, г. Москва, Краснопресненская наб., д.12, подъезд 3, оф. №1002","rubex");?><br/><b><?_e("Телефон","rubex");?>:</b>  +7 495 258 14 28',
							  hintContent: '<?_e("Управляющая компания RubEx Group","rubex");?><br/> <b><?_e("Адрес","rubex");?></b> <?_e("Россия, г. Москва, Краснопресненская наб., д.12, подъезд 3, оф. №1002","rubex");?><br/><b><?_e("Телефон","rubex");?>:</b>  +7 495 258 14 28',
						  }, {
							iconLayout: 'default#image',
							iconImageHref: '<?php bloginfo("template_url"); ?>/img/map.svg',
							iconImageSize: [30, 54],
							iconImageOffset: [-15, -54]
						  });
						myMap.geoObjects.add(myPlacemarkAdr);
						myMap.behaviors.disable('scrollZoom');
				  }
				</script>
				<div class="address">
					<h3><?_e("Управляющая компания RubEx Group","rubex");?></h3>					
					<div class="address-item">						
						<?_e("Россия, г. Москва, Краснопресненская наб., д.12, подъезд 3, оф. №1002","rubex");?></br>						
						<a href = "tel:+7 495 258 14 28">+7 495 258 14 28</a></br>						
						<a href = "mailto:info-uk@rubexgroup.ru">info-uk@rubexgroup.ru</a></br>												
						<a href="<?php echo get_the_permalink(19795); ?>" class = "tdu color-red"><?_e("Реквизиты и документы","rubex");?></a>					
					</div>
					
				</div>			
			</div>
		</div>
      </div>
    </div>
	
    </div>
    </div>

  <?php get_template_part('template-parts/callback-form');?>
  <?php get_template_part('template-parts/price-block');?>
  <?php get_template_part('template-parts/articles');?>
<?php
get_footer();