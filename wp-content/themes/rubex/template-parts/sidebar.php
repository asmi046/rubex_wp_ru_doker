  <aside class="sidebar">
    <?php if(is_category() || is_single()):?>
    <div class="sidebar-block sidebar-block__category">
      <div class="sidebar-title"><?_e("Сфера применения","rubex");?></div>
      <?php 
      if(is_category()):
        $cat_ID = get_query_var('cat');
      else:
        $cat_ID = get_the_category();
        $cat_ID = $cat_ID[1]->term_id;
      endif;
      if($cat_ID):
        if(is_category()):
          $args = array(
            'hide_empty' => 0,
            'parent' => $cat_ID
          );
          $categories = get_categories($args);
        else:
          $args = array(
            'parent' => $cat_ID
          );
          $categories = get_categories($args);
        endif;
        if($categories):?>
          <ul class="ul-clean ul-full">
            <?php foreach($categories as $cat):?>
              <li><a href="<?php echo get_category_link( $cat->term_id )?>"><?php echo $cat->name;?></a></li>
            <?php endforeach;?>
          </ul>
        <?php else:
          $ancestors = get_ancestors( $cat_ID, 'category' );
          $parent_category = $ancestors[0];
          $args = array(
            'hide_empty' => 0,
            'parent' => $parent_category,
            // 'exclude' => $cat_ID
          );
          $categories = get_categories($args);
          if($categories):?>
            <ul class="ul-clean ul-full">
              <?php 
              $is_active = '';
              foreach($categories as $cat):
                if($cat->term_id === $cat_ID) {
                  $is_active = 'active';
                }?>
                <li><a href="<?php echo get_category_link( $cat->term_id )?>" class="<?php echo $is_active;?>"><?php echo $cat->name;?></a></li>
              <?php $is_active = ''; endforeach;?>
            </ul>
          <?php endif;?>
        <?php endif;
      endif;
      ?>
    </div>
    <?php endif;?>
    <div class="sidebar-block sidebar-article">
      <div class="sidebar-title"><?_e("Полезные материалы","rubex");?></div>
      <ul class="ul-clean">
		<?
			if ($cat_ID === 18) {	
		?>
	  
			<li><a href="<?php echo get_the_permalink(20684);?>"><?_e("Расчет параметров","rubex");?></a></li>
		<?}?>
		
        <li><a href="<?php echo get_category_link(16);?>"><?_e("Каталог продукции","rubex");?></a></li>
        <li><a href="<?php echo carbon_get_theme_option('as_link_shop');?>"><?_e("В магазин РТИ","rubex");?></a></li>
      </ul>
    </div>
  </aside>