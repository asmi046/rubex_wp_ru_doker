<?php

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
					the_post();
					$post_id = get_the_ID();?>
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
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/vnutr-diam-2.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Внутренний диаметр</div>
									<div class="product-main__legend-text">Inside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/procladki.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Количество прокладок</div>
									<div class="product-main__legend-text">Number of spaces</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/tolsch-stenki.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Толщина стенки</div>
									<div class="product-main__legend-text">Wall thickness</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/max-radius.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Максимальный радиус изгиба</div>
									<div class="product-main__legend-text">Maximum bending radius</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/vnutr-diam.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Внешний диаметр</div>
									<div class="product-main__legend-text">Outside diameter</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/ves.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Примерный вес</div>
									<div class="product-main__legend-text">Approximate weight</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/davlen.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Рабочее давление</div>
									<div class="product-main__legend-text">Operating pressure</div>
								</div>
							</div>
							<div class="product-main__legend-item">
								<div class="product-main__legend-img" style="background-image: url(<?php echo get_template_directory_uri()?>/img/condition/dlina.svg);"></div>
								<div class="product-main__legend-content">
									<div class="product-main__legend-title">Максимальная длина</div>
									<div class="product-main__legend-text">Maximum lendth</div>
								</div>
							</div>
						</div>
					</div>
					<?php if($table = carbon_get_the_post_meta('davl_condition')):?>
					<div class="product-main__table">
						<table>
							<thead>
								<tr class="thead-img">
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/vnutr-diam-2.svg" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/procladki.svg" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/tolsch-stenki.svg" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/max-radius.svg" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/vnutr-diam.svg" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/ves.svg" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/davlen.svg" alt=""></th>
									<th><img src="<?php echo get_template_directory_uri()?>/img/condition/dlina.svg" alt=""></th>
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
					<?php endif;?>
					<?php get_template_part('template-parts/upsells');?>
				<?php endwhile;?>
				    <section class="price product-price-block">
					    <div class="container">
					      <div class="price-wrapper">
					        <div class="price-title">Rubex Price</div>
					        <div class="price-text">Интернет магазин РТИ</div>
					        <div class="price-text">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всеми грустный послушавшись несколько парадигматическая лучше предложения ее ты, безопасную, проектах, решила все единственное маленький? Но языкового текст вскоре запятой.</div>
					        <a href="#" class="main-catalog__photo-link">Перейти в магазин</a>
					      </div>
					    </div>
					  </section>
				</div>
		      </div>
		    </div>
		  </div>
<?php
get_footer();	