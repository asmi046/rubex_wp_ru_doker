<?php
/*
* Template Name: Промышленные рукава
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
		  
				<?php get_template_part('template-parts/productsitebar/sidebar-prom');?>
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
									<? if (!carbon_get_the_post_meta('prom_temp_2')) {?>
										<tr>
											<td><span class="color-red"><?_e("Температура","rubex");?></span> / Temperature range</td>
											<td><?php echo carbon_get_the_post_meta('prom_temp');?></td>
										</tr>
									<?} else {?>
										<tr>
											<td><span class="color-red"><?_e("Температура (Рукава ОРБТ)","rubex");?></span> / Temperature range</td>
											<td><?php echo carbon_get_the_post_meta('prom_temp_2');?></td>
										</tr>
										<tr>
											<td><span class="color-red"><?_e("Температура (Рукава ОРТ)","rubex");?></span> / Temperature range</td>
											<td><?php echo carbon_get_the_post_meta('prom_temp');?></td>
										</tr>
									<?}?>
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
					
					<div class="product-main__legend">
						<div class="product-main__legend-btn"><?_e("Условные обозначения","rubex");?></div>
						<div class="product-main__legend-wrapper" style="display: none;">
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/outside-diameter.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Внутренний диаметр","rubex");?></div>
									<div class="product-main__legend-text">Inside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/number-of-spaces.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Количество прокладок","rubex");?></div>
									<div class="product-main__legend-text">Number of spaces</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/wall-thickness.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Толщина стенки","rubex");?></div>
									<div class="product-main__legend-text">Wall thickness</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/outside-diameter.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Максимальный радиус изгиба","rubex");?></div>
									<div class="product-main__legend-text">Maximum bending radius</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/inside-diameter.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Внешний диаметр","rubex");?></div>
									<div class="product-main__legend-text">Outside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/approximate-weight.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Примерный вес","rubex");?></div>
									<div class="product-main__legend-text">Approximate weight</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/operating-pressure.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Рабочее давление","rubex");?></div>
									<div class="product-main__legend-text">Operating pressure</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/table/maximum-length.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Максимальная длина","rubex");?></div>
									<div class="product-main__legend-text">Maximum lendth</div>
								</div>
							</div>
						</div>
					</div>
					<?php if($table = carbon_get_the_post_meta('prom_condition')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/number-of-spaces.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/wall-thickness.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/outside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/approximate-weight.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/operating-pressure.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/maximum-length.png" alt=""></th>
								</tr>
								<tr class="thead-inits">
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("ед.","rubex");?></span> /units.</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("кг. / м.","rubex");?></span> / kg. / m.</th>
									<th><span class="color-white"><?_e("Бар","rubex");?></span> /bar</th>
									<th><span class="color-white"><?_e("м.","rubex");?></span> / m.</th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['vnutr']?></td>
										<td><?php echo $tr['qty']?></td>
										<td><?php echo $tr['tolsch']?></td>
										<td><?php echo $tr['max_radius']?></td>
										<td><?php echo $tr['vnesh']?></td>
										<td><?php echo $tr['weight']?></td>
										<td><?php echo $tr['volue']?></td>
										<td><?php echo $tr['width']?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<?php endif;
						$post_id = get_the_ID();
					?>
				
					<?php 
						$params = [ 'img' => get_the_post_thumbnail_url() ];
						get_template_part('template-parts/product-num/hoses', 'num', $params);
					?>			

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
								'cat' => 18,
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
				<?php endwhile;?>
				  
				    <?php get_template_part('template-parts/price-block');?>	
					
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();