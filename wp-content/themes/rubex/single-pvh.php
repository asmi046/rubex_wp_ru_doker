<?php
/*
* Template Name: ПВХ Рукава
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
			
					<?php get_template_part('template-parts/productsitebar/sidebar-pvh');?>
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
										<td><span class="color-red"><?_e("Температура","rubex");?></span> / Temperature</td>
										<td><?php echo carbon_get_the_post_meta('pvh_temp');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Цвет","rubex");?></span> / Color</td>
										<td><?php echo carbon_get_the_post_meta('pvh_color');?></td>
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
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/tolsch-stenki.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Толщина стенок","rubex");?></div>
									<div class="product-main__legend-text">Wall thickness</div>
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
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/max-radius.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Радиус изгиба","rubex");?></div>
									<div class="product-main__legend-text">Maximum bending radius</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/vnutr-diam.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Рабочее разряжение","rubex");?></div>
									<div class="product-main__legend-text">Working vacuum</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/dlina.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title"><?_e("Длина бухты","rubex");?></div>
									<div class="product-main__legend-text">Bay length</div>
								</div>
							</div>
						</div>
					</div>
					<?php if($table = carbon_get_the_post_meta('pvh_condition')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" title="<?_e("Внутренний диаметр","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/wall-thickness.png" title="<?_e("Толщина стенок","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/operating-pressure.png" title="<?_e("Рабочее давление","rubex");?>"></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/bending-radius.png" title="<?_e("Радиус изгиба","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/vakuum.png" title="<?_e("Рабочее разряжение","rubex");?>" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/maximum-length.png" title="<?_e("Длина бухты","rubex");?>" alt=""></th>
								</tr>
								<tr class="thead-inits">
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("Бар.","rubex");?></span> / bar</th>
									<th><span class="color-white"><?_e("мм.","rubex");?></span> / mm.</th>
									<th><span class="color-white"><?_e("Бар.","rubex");?></span> / bar</th>
									<th><span class="color-white"><?_e("м.","rubex");?></span> / m.</th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['vnutr']?></td>
										<td><?php echo $tr['tol']?></td>
										<td><?php echo $tr['work_davl']?></td>
										<td><?php echo $tr['radius']?></td>
										<td><?php echo $tr['work_raz']?></td>
										<td><?php echo $tr['buhta']?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<?php endif;
					$post_id = get_the_ID();?>
				
				
				
				<?php endwhile;?>
					<?php get_template_part('template-parts/price-block');?>
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();