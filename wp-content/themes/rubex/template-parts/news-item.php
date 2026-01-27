<div class="news-item">
	<div class="news-item__photo" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>);"></div>
	<div class="news-item__content">
		<div class="news-item__title"><?php the_title();?></div>
		<div class="news-item__date"><?php echo get_the_date('d.m.Y');?></div>
		<div class="news-item__text">
			<?php the_excerpt();?>
		</div>
		<a href="<?php echo get_permalink();?>" class="main-catalog__photo-link"><?_e("Читать далее","rubex");?></a>
	</div>
</div>