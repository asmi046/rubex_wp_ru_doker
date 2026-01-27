<aside class="sidebar sidebar-news">
  <div class="sidebar-block sidebar-block__category sidebar-block__news">
      
	<!--  <div class="sidebar-title sidebar-title-hidden">Подразделения</div>-->
      
	  
	<div class = "mobile_sidebar_select mobile_sidebar_select_no_marging">
		<span class = "mobile_sidebar_select_label" >RubEx Group</span>
			<ul class="ul-clean ul-full contacts-map">
				<li><a href="#" data-map="1" class="active map map-1">RubEx Group</a></li>
				<li><a href="#" data-map="2" class="map map-2"><?_e('ОАО "Курскрезинотехника"',"rubex");?></a></li>
				<li><a href="#" data-map="3" class="map map-3"><?_e('ОАО "Cаранский завод "Резинотехника"',"rubex");?></a></li>
			</ul>
    </div>
	
	<div class = "coll_center_wriper">	
		<div class="sidebar-title sidebar-title__contact"><?_e("Контакт центр","rubex");?></div>
		<div class=""><?_e("Позвоните нам на бесплатную горячую линию и мы оперативно ответим на все ваши вопросы","rubex");?>.</div>
		<a href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>" class="phone-line"><?php echo carbon_get_theme_option('as_phone');?></a>
    </div>
	
</aside>