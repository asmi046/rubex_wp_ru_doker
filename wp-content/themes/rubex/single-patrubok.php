<?php
/*
* Template Name: Пережимной патрубок
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
					<?php get_template_part('template-parts/productsitebar/sidebar-blt');?>
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
				
					<?php if($table = carbon_get_the_post_meta('patrubok_condition')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th><span class="color-white"><?_e("Наименование","rubex");?></span> </th>
									<th><span class="color-white"><?_e("Внутр. диаметр, мм","rubex");?></span></th>
									<th><span class="color-white"><?_e("Износост. слой, мм","rubex");?></span></th>
									<th><span class="color-white"><?_e("Рабочее давление, Мпа","rubex");?></span></th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['name']?></td>
										<td><?php echo $tr['vnutr']?></td>
										<td><?php echo $tr['iznosost']?></td>
										<td><?php echo $tr['davlen']?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<?php endif;?>
				<?php endwhile;?>
								<div class="product-uppsells">
					<h2 class="product-uppsells__title"><?_e("Похожие продукты","rubex");?></h2>
				    <div class="category-list">
				    	<?php 
						
						$arrStr = carbon_get_the_post_meta('rg_single_condition_products');
						if(!empty($arrStr)):
							$arr_posts = explode(',', carbon_get_the_post_meta('rg_single_condition_products'));
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
								'cat' => 17,
								'orderby' => 'rand'
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
				    <?php get_template_part('template-parts/price-block');?>
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();