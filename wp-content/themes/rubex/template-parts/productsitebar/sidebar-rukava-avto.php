  <aside class="sidebar">
    <div class="sidebar-block sidebar-block__category">
      <?php 
        		
				$args = array(
					'hide_empty' => 0,
					'parent' => 225,
				);
				$categories = get_categories($args);
				
				$cat = new WPSEO_Primary_Term('category', $wp_query->get_queried_object_id());
				$cat_id = $cat->get_primary_term();
				
		?>
        
				
			<div class = "mobile_sidebar_select">
				<span class = "mobile_sidebar_select_label" ><?_e("Все подкатегории","rubex");?></span>	
				<ul class="ul-clean ul-full catalog_subcategory_list">
					<?php foreach($categories as $cat):?>
					  <li><a href="<?php echo get_category_link( $cat->term_id )?>" class="<?php  if($cat->term_id === $cat_id ) echo 'active';?>" data-catname = "<? echo $cat->name;?>" data-cattype = "lnk"><?php echo $cat->name;?></a></li>
					<?php endforeach;?>
				</ul>
			</div>
    </div>

    <div class="sidebar-block sidebar-article">
      <div class="sidebar-title sidebar-title-hidden"><?_e("Полезные материалы","rubex");?></div>
      <ul class="ul-clean">
        <li><a href="<?php echo carbon_get_theme_option('as_link_shop');?>"><?_e("В магазин РТИ","rubex");?></a></li>
      </ul>
    </div>
  </aside>