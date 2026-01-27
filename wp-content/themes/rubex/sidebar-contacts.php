<aside class="sidebar sidebar-news">
  <div class="sidebar-block sidebar-block__category sidebar-block__news">
      
    <div class = "mobile_sidebar_select mobile_sidebar_select_no_marging">
		<span class = "mobile_sidebar_select_label" ><?_e("Все подразделения","rubex");?></span>
		<ul class="ul-clean ul-full contacts-map">
			<li><a href="<?php echo get_category_link(227);?>" data-mail="info-uk@rubexgroup.ru" data-tel="+7 495 258 14 28" data-address="Россия, г. Москва, Краснопресненская наб., д.12, подъезд 3, оф. №1002" data-map="1" class="active map map-1"><?_e("Управляющая компания","rubex");?></a></li>
			<li><a href="<?php echo get_category_link(229);?>" data-mail="saransk@rubexgroup.ru" data-tel="+7 834 259 55 56" data-address="Республика Мордовия, г.Саранск, Октябрьский район, Северо-восточное шоссе, 15" data-map="2" class="map map-2"><?_e("Активы","rubex");?></a></li>
			<li><a href="<?php echo get_category_link(231);?>" data-mail="td-msk@rubexgroup.ru" data-tel="+7 495 780 97 25" data-address="Россия, г. Москва, Краснопресненская наб., д.12, подъезд 3, оф. №1002" data-map="3" class="map map-3"><?_e("Территориальные подразделения","rubex");?></a></li>
			<li><a href="<?php echo get_category_link(233);?>" data-mail="" data-tel="+ 7 4712 73 03 63" data-address="г.Курск, Проспект Ленинского комсомола, 2К2" data-map="4" class="map map-4"><?_e("Розничные магазины","rubex");?></a></li> 
		</ul>
	</div>  
	  
	  
      <div class="sidebar-title sidebar-title__contact"><?_e("Контакт-центр","rubex");?></div>
      <div class=""><?_e("Позвоните нам на бесплатную горячую линию и мы оперативно ответим на все ваши вопросы.","rubex");?></div>
      <a href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>" class="phone-line"><?php echo carbon_get_theme_option('as_phone');?></a>
</aside>