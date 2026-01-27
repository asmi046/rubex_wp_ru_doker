<?php
/**
 */
$current_cat_ID = get_query_var('cat');
$active = '';
get_header('page');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_term_meta($current_cat_ID, 'term_banner_img'), 'full')[0];?>)"></section>
	<div class="container">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>
	</div>
  <div class="container">
    <h1 class="page-title"><?_e("Каталог продукции","rubex");?></h1>	
    <div class="catalog-wrapper">
    	<?php 
    		$args = array(
    			'parent' => 16,
    			'hide_empty' => 0,
				'orderby' => 'meta_value_num',
				'meta_key' => '_term_position',
    		);
    		$categories = get_categories($args);
    		if($categories):
    			foreach($categories as $category ):
    	?>
		      <div class="catalog-item" style="order: <?php //echo carbon_get_term_meta($category->term_id, 'term_position')?>">
				<a href="<?php echo get_category_link( $category->term_id );?>" class="catalog-item__head" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_term_meta($category->term_id, 'term_product_img'), 'full')[0];?>)">
					<div class="catalog-item__title"><?php echo $category->name?></div>
		        </a>
		    	<?php 
		    	if($category->term_id === 221 || $category->term_id === 223):

		    		$args = array(
		    			'posts_per_page' => 4,
		    			'cat' => $category->term_id,
		    		);
		    		$query = new WP_Query($args);
		    		// $cat_child = get_categories($args);
		    		if($query->have_posts()):?>
				        <ul class="catalog-item__list ul-clean">
							<?php while($query->have_posts()):
								$query->the_post(); ?>
								<li><a href="<?php echo get_permalink();?>"><?php the_title();?></a></li>
							<?php endwhile; wp_reset_postdata();?>
				        </ul>
					<?php endif;
		    	else:
		    		$args = array(
		    			'parent' => $category->term_id,
		    			'number' => 4,
		    			'hide_empty' => 0
		    		);
		    		$cat_child = get_categories($args);
		    		if($cat_child):?>
				        <ul class="catalog-item__list ul-clean">
							<?php foreach($cat_child as $category_child ): ?>
								<li><a href="<?php echo get_category_link( $category_child->term_id );?>"><?php echo $category_child->name?></a></li>
							<?php endforeach; ?>
				        </ul>
				<?php endif;
			endif;?>
		        <a href="<?php echo get_category_link( $category->term_id );?>" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></a>
		      </div>
		  <?php endforeach; endif;?>
    </div>
  </div>
  <?php get_template_part('template-parts/price-block');?>
  <?php get_template_part('template-parts/articles-mobile');?>

	</div>
	</main>
</div>

<?php
get_footer();