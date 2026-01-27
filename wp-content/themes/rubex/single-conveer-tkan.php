<?php
/*
* Template Name: Конвеерная лента (тканевая)
* Template Post Type: post, page
*/
get_header();
?>	<div id="content" class="site-content product-page">		
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
				
					<?php if($table = carbon_get_the_post_meta('conveer_condition')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th><span class="color-white"><?_e('Тип ленты', 'rubex');?></span> </th>
									<th><span class="color-white"><?_e("Тип ткани прокладки","rubex");?></span></th>
									<th><span class="color-white"><?_e("Количество прокладок","rubex");?></span></th>
									<th><span class="color-white"><?_e("Прочность при разрыве по основе Н/мм","rubex");?></span></th>
									<th><span class="color-white"><?_e("Вид борта","rubex");?></span></th>
								</tr>
								<tr class="thead-inits">
									<th>Belt type</th>
									<th>Fabric lining type</th>
									<th>Number of linings</th>
									<th>Rupture strength as per N/mm</th>
									<th>Edge type</th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['type']?></td>
										<td><?php echo $tr['type_tkan']?></td>
										<td><?php echo $tr['qty_proklad']?></td>
										<td><?php echo $tr['prochnost']?></td>
										<td><?php echo $tr['vid']?></td>
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
						
						$post_id = get_the_ID();
						
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