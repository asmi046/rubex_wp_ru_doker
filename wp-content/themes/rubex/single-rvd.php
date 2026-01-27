<?php
/*
* Template Name: Рукава высокого давления (РВД)
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
				<?php while(have_posts()):
					the_post();?>
					<div class="product-main__top">
						<img class="product-main__photo" src="<?php echo get_the_post_thumbnail_url();?>">
						<div class = "t_wraper">
							<table>
								<tbody>
									<tr>
										<td><span class="color-red"><?_e("Внутренний слой","rubex");?></span> / Tube</td>
										<td><?php echo carbon_get_the_post_meta('rvd_vnutr');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Внешний слой","rubex");?></span> / Cover</td>
										<td><?php echo carbon_get_the_post_meta('rvd_vnesh');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Прокладка","rubex");?></span> / Reinforcement</td>
										<td><?php echo carbon_get_the_post_meta('rvd_prok');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Температура","rubex");?></span> / Temperature range</td>
										<td><?php echo carbon_get_the_post_meta('rvd_temp');?></td>
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
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/vnutr-diam-2.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Внутренний диаметр","rubex");?></div>
									<div class="product-main__legend-text">Inside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/procladki.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Количество прокладок","rubex");?></div>
									<div class="product-main__legend-text">Number of spaces</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/tolsch-stenki.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Толщина стенки","rubex");?></div>
									<div class="product-main__legend-text">Wall thickness</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/max-radius.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Максимальный радиус изгиба","rubex");?></div>
									<div class="product-main__legend-text">Maximum bending radius</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/vnutr-diam.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Внешний диаметр","rubex");?></div>
									<div class="product-main__legend-text">Outside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/ves.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Примерный вес","rubex");?></div>
									<div class="product-main__legend-text">Approximate weight</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/davlen.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Рабочее давление","rubex");?></div>
									<div class="product-main__legend-text">Operating pressure</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/dlina.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Максимальная длина","rubex");?></div>
									<div class="product-main__legend-text">Maximum lendth</div>
								</div>
							</div>
						</div>
					</div>
					<?php if($table = carbon_get_the_post_meta('rvd_condition')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/nominal-diameter.png" title="<?_e("Номинальный диаметр","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" title="<?_e("Внутренний диаметр","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/diameter-with-braiding.png" title="<?_e("Диаметр с оплетками","rubex");?>"></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/outside-diameter.png" title="<?_e("Внешний диаметр","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/operating-pressure.png" title="<?_e("Рабочее давление (Бар)","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/testing-pressure.png" title="<?_e("Тестовое давление","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/rupture-pressure.png" title="<?_e("Давление на разрыв","rubex");?>" alt=""></th>
								</tr>
								<tr class="thead-inits">
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("Бар.","rubex");?></span> / bar</th>
									<th><span class="color-white"><?_e("Бар.","rubex");?></span> / bar</th>
									<th><span class="color-white"><?_e("Бар.","rubex");?></span> / bar</th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['nomin']?></td>
										<td><?php echo $tr['vnutr']?></td>
										<td><?php echo $tr['opletka']?></td>
										<td><?php echo $tr['vnesh']?></td>
										<td><?php echo $tr['work_davl']?></td>
										<td><?php echo $tr['test_davl']?></td>
										<td><?php echo $tr['davl_razryv']?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<?php endif;
					$post_id = get_the_ID();?>
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