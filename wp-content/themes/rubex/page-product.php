<?php
/*
* Template Name: Товар
*/
get_header();
?>
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
		  </div>
		  <div class="container">
		    <div class="category-wrapper">
		      <div class="category-wrapper__cat">Каталог</div>
				<?php get_template_part('template-parts/sidebar');?>
		      <div class="product-main">

			    <h1 class="page-title product-title"><?php the_title();?></h1>
				<?php while(have_posts()):
					the_post();?>
					<div class="product-main__top">
						<img class="product-main__photo" src="<?php echo get_the_post_thumbnail_url();?>">
						<table>
							<tbody>
								<tr>
									<td><span class="color-red">Внутренний слой</span> / Tube</td>
									<td>SBR / BR NBR / SBR</td>
								</tr>
								<tr>
									<td><span class="color-red">Внешний слой</span> / Cover</td>
									<td>NBR / SBR</td>
								</tr>
								<tr>
									<td><span class="color-red">Прокладка</span> / Reinforcement</td>
									<td>Текстильный корд / Textile cord</td>
								</tr>
								<tr>
									<td><span class="color-red">Температура</span> / Temperature range</td>
									<td>-35°C / +50°C</td>
								</tr>
								<tr>
									<td><span class="color-red">Предел прочности</span> / Ultimate strength</td>
									<td>не менее 5P / not less then 5P</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="product-main__descr">
						<?php the_content();?>
					</div>
					
					<div class="product-main__legend">
						<div class="product-main__legend-btn">Условные обозначения</div>
						<div class="product-main__legend-wrapper" style="display: none;">
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Внутренний диаметр</div>
									<div class="product-main__legend-text">Inside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Количество прокладок</div>
									<div class="product-main__legend-text">Number of spaces</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Толщина стенки</div>
									<div class="product-main__legend-text">Wall thickness</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Максимальный радиус изгиба</div>
									<div class="product-main__legend-text">Maximum bending radius</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Внешний диаметр</div>
									<div class="product-main__legend-text">Outside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Примерный вес</div>
									<div class="product-main__legend-text">Approximate weight</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Рабочее давление</div>
									<div class="product-main__legend-text">Operating pressure</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/item-legend.PNG);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Максимальная длина</div>
									<div class="product-main__legend-text">Maximum lendth</div>
								</div>
							</div>
						</div>
					</div>
					<div class="product-main__table">
						<table cellspacing="0" style="overflow:auto;">
							<thead>
								<tr class="thead-img">
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/outside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/table/inside-diameter.png" alt=""></th>
								</tr>
								<tr class="thead-inits">
									<th><span class="color-white">мм.</span> / mm.</th>
									<th><span class="color-white">мм.</span> / mm.</th>
									<th><span class="color-white">мм.</span> / mm.</th>
									<th><span class="color-white">Бар.</span> / bar</th>
									<th><span class="color-white">ед.</span> / units</th>
									<th><span class="color-white">мм.</span> / mm.</th>
									<th><span class="color-white">кг. / м.</span> / kg. / m.</th>
									<th><span class="color-white">м.</span> / m.</th>
								</tr>
							</thead>
							<tbody class="">
								<tr>
									<td>65</td>
									<td>8.5</td>
									<td>82</td>
									<td>10</td>
									<td>5</td>
									<td>1300</td>
									<td>4</td>
									<td>10</td>
								</tr>
								<tr>
									<td>65</td>
									<td>8.5</td>
									<td>82</td>
									<td>10</td>
									<td>5</td>
									<td>1300</td>
									<td>4</td>
									<td>10</td>
								</tr>
								<tr>
									<td>65</td>
									<td>8.5</td>
									<td>82</td>
									<td>10</td>
									<td>5</td>
									<td>1300</td>
									<td>4</td>
									<td>10</td>
								</tr>
								<tr>
									<td>65</td>
									<td>8.5</td>
									<td>82</td>
									<td>10</td>
									<td>5</td>
									<td>1300</td>
									<td>4</td>
									<td>10</td>
								</tr>
							</tbody>
						</table>
					</div>
				<?php endwhile;?>
				<div class="product-uppsells">
					<h2 class="product-uppsells__title">Похожие продукты</h2>
				    <div class="category-list">
				    	<?php 
				    		$args = array(
				    			'posts_per_page' => 2,
				    			'post_type' => 'asgproduct',
				    		);
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
				    <section class="price product-price-block">
					    <div class="container">
					      <div class="price-wrapper">
					        <div class="price-title">Rubex Price</div>
					        <div class="price-text">Интернет магазин РТИ</div>
					        <div class="price-text">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всеми грустный послушавшись несколько парадигматическая лучше предложения ее ты, безопасную, проектах, решила все единственное маленький? Но языкового текст вскоре запятой.</div>
					        <a href="<?php echo carbon_get_theme_option('as_link_shop');?>" class="main-catalog__photo-link">Перейти в магазин</a>
					      </div>
					    </div>
					  </section>
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();	