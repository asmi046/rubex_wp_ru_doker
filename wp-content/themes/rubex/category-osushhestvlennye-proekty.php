<?php
/**
 */

get_header('page');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		  <section class="header-bnr" style="background-image: url(<?php echo get_template_directory_uri();?>/img/R_G_ban.jpg)"></section>
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
		  </div>
		  <div class="container">
			<h1 class="page-title single-product__title"><? single_cat_title(); ?></h1>
		  </div>
		  <div class="container">
		    <div class="category-wrapper">
		      <!-- <div class="category-wrapper__cat">Каталог</div> -->
				<?php get_template_part('template-parts/sidebar-project');?>
				<?php $args = array(
					'cat' => 248,
					'posts_per_page' => 8
				);
				$query = new WP_Query($args);
				if($query->have_posts()):
					$inc = 0;
				?>
				<div class="news-wrapper">
					<?php while($query->have_posts()):
						$query->the_post();
						if($inc < 4):?>

						<div class="news-item">
							<div class="news-item__photo project_photo_wrapper" >
								<img src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php the_title();?>">
							</div>
							<div class="news-item__content">
								<div class="news-item__title"><?php the_title();?></div>
								
								<div class="news-item__text">
									<?php the_excerpt();?>
								</div>
								<a href="<?php echo get_permalink();?>" class="main-catalog__photo-link"><?_e("Читать далее","rubex");?></a>
							</div>
						</div>
						<?php else:?>
							<div class="news-item news-item__toggle" style="display: none;">
								<div class="news-item__photo project_photo_wrapper" >
									<img src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php the_title();?>">
								</div>
								<div class="news-item__content">
									<div class="news-item__title"><?php the_title();?></div>
									
									<div class="news-item__text">
										<?php the_excerpt();?>
									</div>
									<a href="<?php echo get_permalink();?>" class="main-catalog__photo-link"><?_e("Читать далее","rubex");?></a>
								</div>
							</div>

						<?php endif;
					$inc++; endwhile;?>
			    	<a href="#" class="load-more"><?_e("Показать еще","rubex");?></a>
				</div>
			  <?php endif; wp_reset_postdata();?>
		    </div>
		    <div class="container">
		    </div>
		  <div class="container">
		    <div class="category-list">
			</div>
		  </div>
		  </div>
		  <?php get_template_part('template-parts/price-block');?>
		  <?php get_template_part('template-parts/articles');?>
	</main>
</div>

<?php
get_footer();