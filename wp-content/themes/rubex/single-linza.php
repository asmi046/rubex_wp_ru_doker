<?php
/*
* Template Name: Линзовый компенсатор
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
		      				
					<?php get_template_part('template-parts/productsitebar/sidebar-shlam');?>
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
				
					<?php if($table = carbon_get_the_post_meta('linza_condition')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th rowspan="2"><span class="color-white"><?_e("Наименование","rubex");?></span> </th>
									<th><span class="color-white"><?_e("Внутр. диаметр, мм","rubex");?></span></th>
									<th><span class="color-white"><?_e("Длина, м","rubex");?></span></th>
									<th colspan="4"><span class="color-white"><?_e("Допустимые перемещения","rubex");?></span></th>
									<th rowspan="2"><span class="color-white"><?_e("Рабочее давление, Мпа","rubex");?></span></th>
								</tr>
								<tr class="thead-img">
									<th>d</th>
									<th>L</th>
									<th><?_e("Сжатие, мм","rubex");?></th>
									<th><?_e("Растяжение, мм","rubex");?></th>
									<th><?_e("Сдвиг, мм","rubex");?></th>
									<th><?_e("Угол, град","rubex");?></th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['name']?></td>
										<td><?php echo $tr['vnutr']?></td>
										<td><?php echo $tr['width']?></td>
										<td><?php echo $tr['sgatie']?></td>
										<td><?php echo $tr['rast']?></td>
										<td><?php echo $tr['sdvig']?></td>
										<td><?php echo $tr['ugol']?></td>
										<td><?php echo $tr['volue']?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<?php endif;?>
				<?php endwhile;?>
				    <?php get_template_part('template-parts/price-block');?>
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();