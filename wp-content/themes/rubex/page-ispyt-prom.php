<?php 



/* 

* Template Name: Испытательный центр (Пром. Рукава)

*/

get_header();

?>

<div id="primary" class="content-area">

	<main id="main" class="site-main">

		<div class=""></div>

<section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>

  <div class="container">

    <?php

		if ( function_exists('yoast_breadcrumb') ) {

		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

		}

	?>

  </div> 



	<div class="container">

		<h1 class="page-title single-product__title"><? the_title();?></h1>

		<p>Rubex Group - лидер производства конвейерных лент в РФ. Более 70 лет опыта в производстве конвейерных лент. Мы являемся единственным в ЕАЭС производителем резинотросовой ленты и лент шириной до 2400 мм метров с характеристиками на уровне лучших мировых стандартов. Мощности нашего производства составляют 1,5 миллиона квадратных метров конвейерной ленты в год.</p> <p>Наши конвейерные ленты используются во все отраслях промышленности и сельского хозяйства. Наша продукция имеет характеристики для самых разных условия, начиная с лент для легких условий эксплуатации до высокопрочных лент для тяжелонагруженных конвейеров.</p>

	</div>

	<section class=" potencial volue-section">

		<div class="container">

			<div class="main-catalog__item main-catalog__item-odd">

		        <div class="main-catalog__photo">

		        	<h2 class="main-catalog__text-title">Объемы производства конвейерной ленты</h2>

		        	<p>70 лет опыта в производстве конвейерных лент. Единственный в ЕАЭС производитель резинотросовой ленты и лент шириной до 2400 мм</p>

		        	<h3 class="potencial-item-title">Текущие мощности: 1,5 миллиона квадратных метров конвейерной ленты</h3>

		        	<p>Выпуск конвейерной ленты шириной до 2400 мм, толщиной до 50 мм, длинной до 500 погонных метров с характеристиками на уровне лучших мировых стандартов.</p>

		        	<a href="/" class="main-catalog__photo-link">Каталог</a>

		        </div>

		        <div class="main-catalog__text" style="background-image: url(https://rubexgroup.ru/wp-content/themes/rubex/img/potencial-1.png);">

		        </div>

	      </div>

		</div>



	</section>

	<section>

		<div class="container">

			<h2 class="section-title">Каталог продукции</h2>

		    <?php get_template_part('template-parts/catalog-item');?>

		</div>

	</section>

	<div class="container">

		<h2 class="page-title single-product__title">Цены на конвейерную ленту</h2>

		<p>Цены на нашу продукцию устанавливаются по индивидуальным параметрам и зависят от многих факторов: объема закупки, типа ленты, условий эксплуатации и много другого. Действует гибкая система ценообразования и скидок для постоянных покупателей.</p> 

		<p>Для уточнения стоимости и параметров заказа, просим Вас оставить контактные данные. Наши менеджеры свяжутся с Вами и ответят на все Ваши вопросы.</p>

	</div>

	<section class="form-ispyt-section">

		<div class="container">

			<h2 class="section-title">Заказать расчет стоимости конвейерной ленты</h2>

			<form action="">

				<input type="text" name="name" placeholder="Имя">

				<input type="tel" name="tel" placeholder="Телефон">

				<a href="#" class="main-catalog__photo-link uniSendBtn" data-mailmsg="Заказать расчет стоимости конвейерной ленты">Отправить</a>

			</form>

			<div class="note-form-isp">* Нажимая на кнопку "Отправить", вы соглашаетесь с условиями обработки персональных данных.</div>

		</div>

	</section>

	<section>

		<div class="container">

			<h2 class="section-title">Конвейерная лента купить On-Line</h2>

			<p>Зарегистрируйтесь в нашем сервисе Rubex Price и будьте в курсе последних ценовых предложений на нашу продукцию.</p>

			<?php get_template_part('template-parts/price-block');?>

		</div>

	</section>

	<section class="cert-section">

		<div class="container">

			<h2 class="section-title">Сертификаты на конвейерную ленту производства RubEx Group</h2>

			<div class="cert-wrapper">

				<a href="<?php echo get_template_directory_uri();?>/img/cert-1.jpg" data-lightbox="cert"><img src="<?php echo get_template_directory_uri();?>/img/cert-1.jpg" alt=""></a>

				<a href="<?php echo get_template_directory_uri();?>/img/cert-2.jpg" data-lightbox="cert"><img src="<?php echo get_template_directory_uri();?>/img/cert-2.jpg" alt=""></a>

				<a href="<?php echo get_template_directory_uri();?>/img/cert-3.jpg" data-lightbox="cert"><img src="<?php echo get_template_directory_uri();?>/img/cert-3.jpg" alt=""></a>

				<a href="<?php echo get_template_directory_uri();?>/img/cert-4.jpg" data-lightbox="cert"><img src="<?php echo get_template_directory_uri();?>/img/cert-4.jpg" alt=""></a>

			</div>

		</div>

	</section>

	<section class="cert-section">

		<div class="container">

			<h2 class="section-title">Конвейерная лента купить On-Line</h2>

			<p>Территориальные подразделения Rubex Group расположены в крупных логистических центрах, что позволяет нам оперативно отгружать продукцию со складов в регионах присутствия и создавать оптимальные логистические маршруты для быстрой доставки продукции нашим потребителям в России и за ее пределами.</p>

		</div>

	</section>

	<section class="inform">

		<div class="container">

			<h2 class="section-title">Полезная информация о конвейерной ленте</h2>

			<h3 class="section-subtitle">Условные обозначения конвейерных лент типа 1 и 1.2</h3>

			<a href="<?php echo get_template_directory_uri();?>/img/table-1.png" data-lightbox="table"><img src="<?php echo get_template_directory_uri();?>/img/table-1.png" class="isp-table-img" alt=""></a>

			<h3 class="section-subtitle">Условные обозначения конвейерных лент типа 2</h3>

			<a href="<?php echo get_template_directory_uri();?>/img/table-2.png" data-lightbox="table"><img src="<?php echo get_template_directory_uri();?>/img/table-2.png" class="isp-table-img" alt=""></a>

		</div>

	</section>

	<section class="fabric-section">

		<div class="container">

			<h3 class="section-subtitle">Ткани для конвейерных лент</h3>

			<p>Специальные ткани придают конвейерным лентам вы сокую прочность при растяжении и стойкость к ударным нагрузкам, обеспечивают удлинение не более 1-2% (в зависимости от типа ткани) и хорошую способность к желобообразованию.</p>

			<div class="table-wrapper">

				<table>

					<thead>

						<tr>

							<th rowspan="2">Тип ткани</th>

							<th colspan="2">ПРОЧНОСТЬ ПРИ РАЗРЫВЕ, H/мм, НЕ МЕНЕЕ</th>

							<th rowspan="2">Плотность г/м2</th>

							<th rowspan="2">Состав</th>

						</tr>

						<tr>

							

							<th>По основе</th>

							<th>По утку</th>

						</tr>

					</thead>

					<tbody>

						<tr>

							<td>ТК-200-2</td>

							<td>260</td>

							<td>88</td>

							<td>650±30</td>

							<td>Р</td>

						</tr>

						<tr>

							<td>ТК-300-2</td>

							<td>380</td>

							<td>85</td>

							<td>880±30</td>

							<td>Р</td>

						</tr>

						<tr>

							<td>ТЛК-200-МА</td>

							<td>260</td>

							<td>90</td>

							<td>680±30</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ТЛК-250</td>

							<td>300</td>

							<td>95</td>

							<td>760±30</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ТЛК-315</td>

							<td>480</td>

							<td>110</td>

							<td>1060±30</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ТЛК-400-2</td>

							<td>500</td>

							<td>130</td>

							<td>1300±40</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ЕР-200</td>

							<td>250</td>

							<td>95</td>

							<td>635±30</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ЕР-250</td>

							<td>300</td>

							<td>110</td>

							<td>760±30</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ЕР-315</td>

							<td>400</td>

							<td>110</td>

							<td>1000±40</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ЕР-400</td>

							<td>500</td>

							<td>110</td>

							<td>1200±50</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ЕР-500</td>

							<td>600</td>

							<td>130</td>

							<td>1550±60</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>ЕР-630</td>

							<td>750</td>

							<td>140</td>

							<td>1900±60</td>

							<td>ЕР</td>

						</tr>

						<tr>

							<td>БКНЛ-65-2</td>

							<td>65</td>

							<td>28</td>

							<td>550±30</td>

							<td>ЕР</td>

						</tr>

					</tbody>

				</table>

			</div>

			<!-- <div class="fabrics-wrapper">

				<div class="fabric-item">Тип ткани</div>

				<div class="fabric-item fabric-item__center">

					<div class="fabric-item__item">ПРОЧНОСТЬ ПРИ РАЗРЫВЕ, H/мм, НЕ МЕНЕЕ</div>

					<div class="fabric-item__item-wrap">

						<div class="">По основе</div>

						<div class="">По утку</div>

					</div>

				</div>

				<div class="fabric-item">Плотность г/м2</div>

				<div class="fabric-item">Состав</div>

			</div> -->

		</div>

	</section>

  </main>

</div>

<?php 

get_footer();