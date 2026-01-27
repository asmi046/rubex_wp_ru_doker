<?php
/*
* Template Name: Техпластина
* Template Post Type: post, page
*/
get_header();
?>

<div id="content" class="site-content product-page">
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
		  </div>
		  <div class="container">
		    <div class="category-wrapper">
			
					<?php get_template_part('template-parts/productsitebar/sidebar-tehplastina');?>
				<div class="product-main">
			    <h1 class="page-title product-title"><?php the_title();?></h1>
					<?php while(have_posts()):
						the_post();?>
												<div class="product-main__top">
							<img class="product-main__photo" src="<?php echo get_the_post_thumbnail_url();?>">
						</div>

					<div class="product-main__descr">
						<?php the_content();?>
					</div>
				<?php endwhile;?>
				
				
				
				    
					<?php get_template_part('template-parts/price-block');?>
					
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();