<?php
/*
* Template Name: Резинотросовая
* Template Post Type: post, page
*/
get_header();
?><div id="content" class="site-content">
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
		  </div>
		  <div class="container">
		    <div class="category-wrapper">
				<?php get_template_part('template-parts/sidebar');?>
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
					
					<?php if($table = carbon_get_the_post_meta('rezinatkan_table')):?>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" title="Тип ленты" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/outside-diameter.png" title="Диаметр троса, мм" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" title="Прочность при разрыве по основе Н/мм" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" title="Расчетная масса ленты (кг/м2)" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" title="Толщина ленты, мм" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" title="Длина, м" alt=""></th>
									
								</tr>
								<tr class="thead-inits">
									<th><span class="color-white"><?_e("Тип ленты","rubex");?></span> / Belt type</th>
									<th><span class="color-white"><?_e("Диаметр троса, мм","rubex");?></span> / Cord diameter, mm</th>
									<th><span class="color-white"><?_e("Прочность при разрыве по основе Н/мм","rubex");?></span> / Rupture strength as per N/mm</th>
									<th><span class="color-white"><?_e("Расчетная масса ленты (кг/м2)","rubex");?></span> / Estimated belt weight, kg/m2</th>
									<th><span class="color-white"><?_e("Толщина ленты, мм","rubex");?></span> / Belt thickness, mm</th>
									<th><span class="color-white"><?_e("Длина, м","rubex");?></span> / Length, m</th>
								</tr>
							</thead>
							<tbody class="">
								<?php foreach($table as $tr):?>
									<tr>
										<td><?php echo $tr['type']?></td>
										<td><?php echo $tr['diameter']?></td>
										<td><?php echo $tr['prochnost']?></td>
										<td><?php echo $tr['massa']?></td>
										<td><?php echo $tr['tolsh']?></td>
										<td><?php echo $tr['length']?></td>
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
				<?php endwhile;?>
				    <section class="price product-price-block">
					    <div class="container">
					      <div class="price-wrapper">
					        <div class="price-title"><?_e("Rubex Price","rubex");?></div>
					        <div class="price-text"><?_e("Интернет магазин РТИ","rubex");?></div>
					        <div class="price-text"><?_e("Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всеми грустный послушавшись несколько парадигматическая лучше предложения ее ты, безопасную, проектах, решила все единственное маленький? Но языкового текст вскоре запятой.","rubex");?></div>
					        <a href="<?php echo carbon_get_theme_option('as_link_shop');?>" class="main-catalog__photo-link"><?_e("Перейти в магазин","rubex");?></a>
					      </div>
					    </div>
					  </section>
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();