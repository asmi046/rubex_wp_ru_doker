<aside class="sidebar sidebar-news">
  <div class="sidebar-block sidebar-block__category sidebar-block__news">
      <div class="sidebar-title"><?_e("Подразделения","rubex");?></div>
      <ul class="ul-clean ul-full contacts-map">
        <li><a href="#" class="active"><?_e('RubEx Group',"rubex");?></a></li>
        <li><a href="#" class=""><?_e('ОАО "Курскрезинотехника"',"rubex");?></a></li>
        <li><a href="#" class=""><?_e('ОАО "Cаранский завод "Резинотехника"',"rubex");?></a></li>
      </ul>
      <div class="sidebar-title sidebar-title__contact"><?_e("Контакт центр","rubex");?></div>
      <div class=""><?_e("Позвоните нам на бесплатную горячую линию и мы оперативно ответим на все ваши вопросы.","rubex");?></div>
      <a href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>" class="phone-line"><?php echo carbon_get_theme_option('as_phone');?></a>
    
</aside>