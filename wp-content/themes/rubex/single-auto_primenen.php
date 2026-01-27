<?php
/*
* Template Name: Рукава для Авто (применение)
* Template Post Type: post, page
*/
get_header();?>
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
		      
				<?php get_template_part('template-parts/productsitebar/sidebar-rukava-avto');?>
		      <div class="product-main">

			    <h1 class="page-title product-title"><?php the_title();?></h1>
				<?php while(have_posts()):
					the_post();?>
					<div class="product-main__top">
						<img class="product-main__photo" src="<?php echo get_the_post_thumbnail_url();?>">
						<div class = "t_wraper">
							<table>
								<tbody>
									<tr>
										<td><span class="color-red"><?_e("Внутренний слой","rubex");?></span> / Tube</td>
										<td><?php echo carbon_get_the_post_meta('prom_vnutr');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Внешний слой","rubex");?></span> / Cover</td>
										<td><?php echo carbon_get_the_post_meta('prom_vnesh');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Прокладка","rubex");?></span> / Reinforcement</td>
										<td><?php echo carbon_get_the_post_meta('prom_prok');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Температура","rubex");?></span> / Temperature range</td>
										<td><?php echo carbon_get_the_post_meta('prom_temp');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Предел прочности","rubex");?></span> / Ultimate strength</td>
										<td><?php echo carbon_get_the_post_meta('prom_pred');?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="product-main__descr">
						<?php the_content();?>
					</div>
					
					<?php if($table = carbon_get_the_post_meta('auto_condition')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<!-- <tr class="thead-img">
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/number-of-spaces.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/wall-thickness.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/outside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/approximate-weight.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/operating-pressure.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/maximum-length.png" alt=""></th>
								</tr> -->
								<tr class="thead-inits">
									<th><span class="color-white"><?_e("Условное обозначение","rubex");?></span> / symbol</th>
									<th><span class="color-white"><?_e("Наименование","rubex");?></span> / name</th>
									<th><span class="color-white"><?_e("Назначение","rubex");?></span> / appointment.</th>
									<th><span class="color-white"><?_e("кг/шт","rubex");?></span> / kg/Pieces</th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['cond_name']?></td>
										<td><?php echo $tr['name']?></td>
										<td><?php echo $tr['naznach']?></td>
										<td><?php echo $tr['kg']?></td>
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
								'cat' => 225,
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