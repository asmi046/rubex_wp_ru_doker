  <aside class="sidebar">
    <div class="sidebar-block sidebar-block__category">
      <?php 
      
        $cat_ID = get_query_var('cat');
        
		  $args = array(
            'hide_empty' => 1,
            'parent' => $cat_ID
          );
          
			$categories = get_categories($args);
        
			if(!$categories) { 
				$ancestors = get_ancestors( $cat_ID, 'category' );
				$parent_category = $ancestors[0];
				$args = array(
					'hide_empty' => 1,
					'parent' => $parent_category,
				);
				$categories = get_categories($args);
			}
		
        ?>
        
				
		<div class = "mobile_sidebar_select">
			<span class = "mobile_sidebar_select_label" ><?_e("Все подкатегории","rubex");?></span>
			<ul class="ul-clean ul-full catalog_subcategory_list">
				<?php foreach($categories as $cat) {
					$catName = carbon_get_term_meta( $cat->term_id, 'term_sb_text' );	
					$catName = (!empty($catName))?$catName:$cat->name;	
				?>
				  <li><a href="<?php echo get_category_link( $cat->term_id )?>" class="<?php  if($cat->term_id === $cat_ID) echo 'active';?>" data-catid = "<? echo $cat->term_id;?>" data-catname = "<? echo $catName;?>" data-cattype = "lnk" ><?php echo $catName;?></a></li>
				<?php } ?>
			</ul>
		</div>
    </div>

    <div class="sidebar-block sidebar-article">
      <div class="sidebar-title sidebar-title-hidden"><?_e("Полезные материалы","rubex");?></div>
      <ul class="ul-clean catalog_material_list">
	  
	  
        <? if (($cat_ID === 18)||((isset($parent_category))&&($parent_category === 18))) {	?>
			<li><a href="<?php echo get_the_permalink(20684);?>"><?_e("Расчет параметров","rubex");?></a></li>
		<?}?>
		
		
		<?php 
			$catlnk = carbon_get_term_meta($cat_ID, 'term_catalog');
		if (!empty($catlnk)) {?>
			<li><a href="<?php echo $catlnk;?>"><?_e("Скачать каталог","rubex");?></a></li>
		<?}?>

		<? if (($cat_ID === 17)||((isset($parent_category))&&($parent_category === 17))) {	?>
			<li><a href="<? echo get_the_permalink(21881);?>"><?_e("Как производят <br/>ленты RubEx","rubex");?></a></li>
		<?}?>

        <li><a href="<?php echo carbon_get_theme_option('as_link_shop');?>"><?_e("В магазин РТИ","rubex");?></a></li>
      </ul>
    </div>

		<div class="sidebar-block__contacts">

			<div class="sidebar-block__contacts-item">
				<h4 class="sidebar-block__contacts-title">Отдел продаж в Москве</h4>
				<a href="tel:88005059870" class="sidebar-block__contacts-tel">8 (800) 505-98-70</a>
				<a href="mailto:info-uk@rubexgroup.ru" class="sidebar-block__contacts-mail">info-uk@rubexgroup.ru</a>
			</div>

			<div class="sidebar-block__contacts-item">
				<h4 class="sidebar-block__contacts-title">Отдел продаж в Курске</h4>
				<a href="tel:88005059870" class="sidebar-block__contacts-tel">8 (800) 505-98-70</a>
				<a href="mailto:info-uk@rubexgroup.ru" class="sidebar-block__contacts-mail">info-uk@rubexgroup.ru</a>
			</div>

			<div class="sidebar-block__contacts-item">
				<h4 class="sidebar-block__contacts-title">Отдел продаж в Екатеринбурге</h4>
				<a href="tel:88005059870" class="sidebar-block__contacts-tel">8 (800) 505-98-70</a>
				<a href="mailto:info-uk@rubexgroup.ru" class="sidebar-block__contacts-mail">info-uk@rubexgroup.ru</a>
			</div>

		</div>

  </aside>