<div class="category-list__item">
	<a href="<?php echo get_permalink();?>">		
		<!-- <div class="category-list__photo" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>)"></div>	 -->
		<img class="category-list__photo" src = "<?php echo get_the_post_thumbnail_url();?>" alt ="<?php the_title();?>" title = "<?php the_title();?>"/>
	</a>
	
	<a href="<?php echo get_permalink();?>">
		<div class="category-list__title"><?php the_title();?></div>	
	</a>	
	
	<div class="category-list__descr">
		<?php the_excerpt();?>
	</div>
  
  	<a href="<?php echo get_permalink();?>" class="main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
</div>