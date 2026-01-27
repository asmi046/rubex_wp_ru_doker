<aside class="sidebar sidebar-news">
  <!-- <div class="sidebar-block sidebar-block__category sidebar-block__news">
 
    <div class="sidebar-title"><?_e("Направления","rubex");?></div>
	
	<div class = "mobile_sidebar_select">
		<span><?_e("Все направления","rubex");?></span>
	</div>
	
    <ul class="ul-clean ul-full">
      <?php 
        $cat_ID = get_query_var('cat');
        $is_active = '';
        if($cat_ID === 173){
          $is_active = 'active';
        } else {
          $is_active = '';
        }?>
      <li><a href="<?php echo get_category_link(173);?>" data-cat="173" class="<?php echo $is_active;?>"><?_e("Все направления","rubex");?></a></li>
      <?php $args = array(
        'parent' => 173,
        'hide_empty' => 0
      );
      $categories = get_categories($args);
      // var_dump($categories);
      $is_active = '';
      if($categories):
        foreach($categories as $cat):
          if($cat_ID === $cat->term_id){
            $is_active = 'active';
          }?>
          <li class="sidebar-cat-parent1">
            <a href="<?php echo get_category_link( $cat->term_id )?>" data-cat="<?php echo $cat->term_id;?>" class="<?php echo $is_active;?>"><?php echo $cat->name;?></a>
          </li>
        <?php $is_active = ''; endforeach;?>
    </ul>
  </div> -->
  
    <div class="sidebar-title"><?_e("Период","rubex");?></div>
    <ul class="ul-clean sidebar-period">
      <li><a href="#" class="active">2023</a></li>
      <li><a href="#">2022</a></li>
      <li><a href="#">2021</a></li>
      <li><a href="#">2020</a></li>
      <li><a href="#">2019</a></li>
      <li><a href="#">2018</a></li>
      <li><a href="#">2017</a></li>
      <li><a href="#">2016</a></li>
      <li><a href="#">2015</a></li>
      <li><a href="#">2014</a></li>
      <li><a href="#">2013</a></li>
      <li><a href="#">2012</a></li>
    </ul>
    <?php endif;?>
</aside>