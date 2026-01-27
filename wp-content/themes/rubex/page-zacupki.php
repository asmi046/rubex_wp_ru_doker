<?php

/*
* Template Name: Закупки
*/
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0]; ?>)"></section>
		<div class="container">
			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
			}
			?>
		</div>

		<section class="content">
			<div class="container">
				<h1 class="page-title"><? _e("Закупки и реализация неликвидов", "rubex"); ?></h1>
				<?php
				the_content();
				?>
			</div>
		</section>

		<div class="container">
		    <h2 ><?_e("Контакты службы снабжения","rubex");?></h2>
		    <div class="service-contacts__wrapper">
		    	<!-- <div class="service-contacts__item">
		    		<div class="service-contacts__title"><? echo sprintf(__("Щелкунов%s Александр Георгиевич","rubex"),"<br/>");?></div>
		    		<div class="service-contacts__position"><?_e("Начальник отдела закупок","rubex");?></div>
		    		<a href="tel:+74712377981" class="service-contacts__phone">+7 4712 377 981</a>
		    		<a href="mailto:shelkunovag@rubexgroup.ru" class="service-contacts__mail">shelkunovag@rubexgroup.ru</a>
		    	</div> -->
		    	<div class="service-contacts__item">
		    		<div class="service-contacts__title"><? echo sprintf(__("Щербакова%s Елена Викторовна","rubex"),"<br/>");?></div>
		    		<div class="service-contacts__position"><?_e("Руководитель тендерной группы","rubex");?></div>
		    		<a href="tel:+78342595238" class="service-contacts__phone">+7 8342 595 238</a>
		    		<a href="mailto:E.Scherbakova@rubexgroup.ru" class="service-contacts__mail">E.Scherbakova@rubexgroup.ru</a>
		    	</div>
		    	<div class="service-contacts__item">
		    		<div class="service-contacts__title"><? echo sprintf(__("Петькова%s Ирина Викторовна","rubex"),"<br/>");?></div>
		    		<div class="service-contacts__position"><?_e("Специалист по организации тендеров","rubex");?></div>
		    		<a href="tel:+74712730340" class="service-contacts__phone">+7 4712 730 340 доб. 3265</a>
		    		<a href="mailto:petkovaiv@rubexgroup.ru" class="service-contacts__mail">petkovaiv@rubexgroup.ru</a>
		    	</div>
		    </div>
		    <div class="service-security">
			    <h2 class="page-title"><?_e("Контакты службы безопасности","rubex");?></h2>
		    	<div class="service-security__wrapper">
		    		<span class="color-red"><?_e("Телефон доверия по фактам злоупотребления:","rubex");?></span>
		    		<a href="tel:+74712371503" class="service-security__phone">+7 4712 37-15-03</a>
		    		<a href="mailto:security@rubexgroup.ru" class="service-security__mail">security@rubexgroup.ru</a>
		    	</div>
		    </div>
		</div>




		<section class="data-section">
			<div class="container">
				<div class="data-wrapper">
					<div class="data-wrapper__item data-wrapper__item-min">
						<h2 class="data-wrapper__title"><? _e("Дополнительные данные по закупкам", "rubex"); ?></h2>
						<div class="data-item">
							<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_1'); ?></div>
							<a href="<?php echo carbon_get_the_post_meta('zac_file_1'); ?>" target="_blank" class="data-item__link"><? _e("Скачать", "rubex"); ?></a>
						</div>
						<div class="data-item">
							<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_2'); ?></div>
							<a href="<?php echo carbon_get_the_post_meta('zac_file_2'); ?>" class="data-item__link"><? _e("Скачать", "rubex"); ?></a>
						</div>
						<div class="data-item">
							<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_3'); ?></div>
							<a href="<?php echo carbon_get_the_post_meta('zac_file_3'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
						</div>
					</div>
					<div class="data-wrapper__item data-wrapper__item-max">
						<h2 class="data-wrapper__title"><? echo sprintf(__("Реализация%s неликвидов", "rubex"), "<br/>"); ?></h2>
						<div class="data-wrapper__max">
							<!-- <div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_4'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_4'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>-->
							<div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_5'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_5'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>
							<div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_6'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_6'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>
							<div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_7'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_7'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>
							<div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_8'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_8'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>
							<div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_9'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_9'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>
							<div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_10'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_10'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>
							<div class="data-item">
								<div class="data-item__text"><?php echo carbon_get_the_post_meta('zac_title_11'); ?></div>
								<a href="<?php echo carbon_get_the_post_meta('zac_file_11'); ?>" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="collateral">
			<div class="container">
				<div class="collateral-content">
					<div class="collateral-content__img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/advertising/advertising.webp" alt="Фото гидроцилиндров для вулканизационного пресса">
					</div>
					<div class="collateral-content__container">
						<h2 class="collateral-content__title">Продажа гидроцилиндров для вулканизационного пресса Siempelkamp</h2>
						<div class="collateral-content__text">
							<p>Продаются гидроцилиндры для вулканизационного пресса Siempelkamp в отличном состоянии, не требующие ремонта.</p>
							<ul>
								<li>Количество: 20 штук</li>
								<li>Местонахождение: г. Курск</li>
							</ul>
							<p>Гидроцилиндры полностью готовы к эксплуатации.<br>Контактное лицо: Михаил Иванович А.</p>
							<p>Телефон: <a href="tel:+79202650025">+7 920 265 00 25</a><br>Звоните для уточнения деталей и оформления покупки!</p>
							<div class="req-wrapper">
								<div class="data-item">
									<div class="data-item__text"><? _e("Чертёж гидроцилиндра (pdf)", "rubex"); ?></div>
									<a target="_blank" href="<?php echo get_template_directory_uri(); ?>/img/advertising/hydraulic-cylinder.pdf" class="data-item__link" target="_blank"><? _e("Скачать", "rubex"); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="container">
			<hr class="backg-gray">
		</div>

		<section class="tenders">
			<div class="container">
				<div class="wrapper">
					<div class="tabs">
						<span class="tab tab-year active">2026</span>
						<span class="tab tab-year">2025</span>
						<span class="tab tab-year">2024</span>
						<span class="tab tab-year">2023</span>
						<span class="tab tab-year">2022</span>
						<span class="tab tab-year">2021</span>
						<span class="tab tab-year">2020</span>
						<span class="tab tab-year">2019</span>
						<span class="tab tab-year">2018</span>
						<span class="tab tab-year">2017</span>
						<span class="tab tab-year">2016</span>
						<span class="tab tab-year">2015</span>
						<span class="tab tab-year">2014</span>
						<span class="tab tab-year">2013</span>
					</div>
					<div class="tab_content">
						<div id="tab_item" class="tab_item">
							<?php
							function filter_where2($where = '')
							{
								$where .= " AND post_date >= '" . date("Y") . "-01-01' AND post_date < '" . date("Y") . "-12-31'";
								return $where;
							}
							add_filter('posts_where', 'filter_where2');
							$posts = new WP_Query(array("cat" => "117", "posts_per_page" => 8));
							// echo '<pre>';
							// var_dump($posts);
							// echo "</pre>";
							remove_filter('posts_where', 'filter_where2');
							while ($posts->have_posts()) {
								$posts->the_post();
								if (in_category(117)):
									echo "<div class = 'tenders-item'>";
									echo "<div class = 'tenders-item__title'>" . get_the_title() . "</div>";
									echo "<div class = 'tenders-item__text'>" . get_the_excerpt() . "</div>";
									echo "<a href = '" . get_the_permalink() . "' class='data-item__link'>Подробнее</a>";
									echo "</div>";
								endif;
							}
							wp_reset_postdata();
							?>
							<a href="#" class="data-more-link"><? _e("Смотреть еще", "rubex"); ?></a>
						</div>

					</div>
				</div>
			</div>
		</section>

	</main>
</div>

<?php
get_footer();
