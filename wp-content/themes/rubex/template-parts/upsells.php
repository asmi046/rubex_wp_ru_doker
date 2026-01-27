<?php 
global $post;
$post_id = $post->ID;
?>
	<div class="product-uppsells">
		<h2 class="product-uppsells__title"><?_e("Похожие продукты","rubex");?></h2>
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
	    			'post_type' => 'post',,
	    			'post__not_in' => $post_id
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