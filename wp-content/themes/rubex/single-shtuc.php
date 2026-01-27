<?php
/*
* Template Name: Штуцированные рвд
* Template Post Type: post, page
*/
get_header();
?><div id="content" class="site-content product-page">
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
		  </div>
		  <div class="container">
		    <div class="category-wrapper">
		      	
				<?php get_template_part('template-parts/productsitebar/sidebar-rvd');?>
								<div class="product-main">
			    <h1 class="page-title product-title"><?php the_title();?></h1>
				<?php while(have_posts()): ?>					<div class="product-main__top">						<img class="product-main__photo" src="<?php echo get_the_post_thumbnail_url();?>">					</div>				
					<?php the_post();
					$post_id = get_the_ID();?>
					<div class="product-main__descr">
						<?php the_content();?>
					</div>
				<div class="product-uppsells">
					<h2 class="product-uppsells__title"><?_e('Похожие продукты','rubex');?></h2>
				    <div class="category-list">
				    	<?php
				    	if(in_category(array(17,18,225,19), $post_id)):
				    		$arr_posts = explode(',', carbon_get_theme_option('as_products'));
				    		$args = array(
				    			'posts_per_page' => 2,
				    			'post_type' => 'post',
				    			'post__in' => $arr_posts,
				    			'post__not_in' => $post_id
				    		);
				    	else:
				    		$args = array(
				    			'posts_per_page' => 2,
				    			'post_type' => 'post',
				    			'post__not_in' => $post_id,
				    											'cat' => 19
				    		);
				    	endif;
				    		$query = new WP_Query($args);
				    		if($query->have_posts()):
				    			while($query->have_posts()):
				    				$query->the_post();

									get_template_part('template-parts/products', 'loop');
								endwhile; wp_reset_postdata();
				    	?>
						  <?php endif;?>
				    </div>
				  </div>
				<?php endwhile;?>
				    
					<?php get_template_part('template-parts/price-block');?>
					
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();