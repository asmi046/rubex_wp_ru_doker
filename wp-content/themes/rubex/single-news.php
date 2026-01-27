<?php
/*
* Template Name: Новость
* Template Post Type: post
*/ 
get_header();
?><div id="content" class="site-content">
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
		  </div>
		  <div class="container">
				<?php while(have_posts()):
					the_post();?>
					<div class="single-news__content">
						<div class="single-news__text">
						    <h1 class="page-title"><?php the_title();?></h1>
						    <div class="date"><?php echo get_the_date('d.m.Y');?></div>
							<?php the_content();?>
						</div>
						<div class="single-news__media">
							
							<?php if(carbon_get_the_post_meta('rg_single_news_img_1')):?>
								<img src="<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('rg_single_news_img_1'), 'full')[0];?>" alt="">
							<?php endif;?>
							
							<?php if(carbon_get_the_post_meta('rg_single_news_img_2')):?>
								<img src="<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('rg_single_news_img_2'), 'full')[0];?>" alt="">
							<?php endif;?>
							
							<?php if(carbon_get_the_post_meta('rg_single_news_img_2')):?>
								<img src="<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('rg_single_news_img_3'), 'full')[0];?>" alt="">
							<?php endif;?>
							
							
							<?php if(carbon_get_the_post_meta('rg_single_news_img_2')):?>
								<img src="<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('rg_single_news_img_4'), 'full')[0];?>" alt="">
							<?php endif;?>
						</div>
					</div>
				<?php endwhile;?>

		  </div>
<?php
get_footer();	