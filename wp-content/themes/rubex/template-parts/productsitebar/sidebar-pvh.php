  <aside class="sidebar">
    <div class="sidebar-block sidebar-block__category">
      <?php 
        		
				$args = array(
					'hide_empty' => 0,
					'parent' => 20,
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
      <div class="sidebar-title"><?_e("Фото нашей продукции","rubex");?></div>
		
		<div class = "pvc_foto_galery">
			<img class = "slide_img slick-slide" src = "<? echo get_template_directory_uri();?>/img/pvc_product_foto/PVC5.jpg" alt = "<?_e("ПВХ рукава производства RubEx Group","rubex");?>" />
			<img class = "slide_img slick-slide" src = "<? echo get_template_directory_uri();?>/img/pvc_product_foto/PVC6.jpg" alt = "<?_e("ПВХ рукава производства RubEx Group","rubex");?>" />
			<img class = "slide_img slick-slide" src = "<? echo get_template_directory_uri();?>/img/pvc_product_foto/PVC8.jpg" alt = "<?_e("ПВХ рукава производства RubEx Group","rubex");?>" />
			<img class = "slide_img slick-slide" src = "<? echo get_template_directory_uri();?>/img/pvc_product_foto/PVC4-1.jpg" alt = "<?_e("ПВХ рукава производства RubEx Group","rubex");?>" />
			<img class = "slide_img slick-slide" src = "<? echo get_template_directory_uri();?>/img/pvc_product_foto/PVC3.jpg" alt = "<?_e("ПВХ рукава производства RubEx Group","rubex");?>" />
			<img class = "slide_img slick-slide" src = "<? echo get_template_directory_uri();?>/img/pvc_product_foto/PVC1.jpg" alt = "<?_e("ПВХ рукава производства RubEx Group","rubex");?>" />
		</div>
		
		<div class = "coll_center_wriper coll_center_wriper_nomarging">  
			<div class="sidebar-title sidebar-title__contact"><?_e("Контакты менеджера","rubex");?></div>
			<div class=""><?_e("По вопросам приобретения ПВХ рукавов обращайтесь по телефону","rubex");?>:</div>
			<a href="tel:88005059870" class="phone-line">8 800 505-98-70</a>
		</div>
	  

	  
	  <ul class="ul-clean">
        <li><a href="<?php echo pvc_hoses_sert;?>"><?_e("Свидетельство","rubex");?></a></li>
        <li><a href="<?php echo carbon_get_theme_option('as_link_shop');?>"><?_e("В магазин РТИ","rubex");?></a></li>
      </ul>
    </div>
  </aside>