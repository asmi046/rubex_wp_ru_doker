<?php

/*
* Template Name: О компании
*/
get_header();?>
  <section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
  <div class="container">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>
	<h1 class="h1-contacts"><?_e("О нас","rubex");?></h1>
	<div class="about-text">
		<?_e("В 2013 г. в России произошло образование крупнейшего резинотехнического холдинга Rubex Group. Управляющая компания Rubex Group – лидер в разработке, производстве и поставке узкоспециализированных резинотехнических изделий для промышленных секторов бизнеса в России. Группа включает в себя две производственные площадки – ОАО «Курскрезинотехника» и ОАО «Саранский завод «Резинотехника», а также многочисленные офисы продаж по всей России и штаб-квартиру в Москве. История наших предприятий – это более 60 лет работы, на протяжении которых была создана полная технологическая цепочка производства, начиная от изготовления резиновых смесей и заканчивая выпуском готовой продукции для всех отраслей промышленности и сельского хозяйства","rubex");?>.
	</div>
	
	<a href="<?php echo get_permalink(20914);?>" class="main-catalog__photo-link"><?_e("Наше производство","rubex");?></a>
  </div>    
  <section class="team">
		<div class="container">
			<h2 class="section-title"><?_e("Команда Rubex Group","rubex");?></h2>
			<div class="team-wrapper">
				<div class="team-item">
					<div class="team-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/gordeev.jpg);"></div>
					<div class="team-item__name"><?_e("Гордеев Владимир Николаевич","rubex");?></div>
					<div class="team-item__text"><?_e("Председатель совета директоров ОАО «Курскрезинотехника» и ОАО «Саранский завод «Резинотехника»","rubex");?></div>
					<!-- <a href="#" class="main-catalog__photo-link">Подробнее</a> -->
				</div>
				
				<div class="team-item">
					<div class="team-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/silin.jpg);"></div>
					<div class="team-item__name"><?_e("Силин Алексей Альбертович","rubex");?></div>
					<div class="team-item__text"><?_e("Первый заместитель директора ООО «Рабэкс Трэйд»");?></div>
					<!-- <a href="#" class="main-catalog__photo-link">Подробнее</a> -->
				</div>

				<div class="team-item">
					<div class="team-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/shtang.jpg);"></div>
					<div class="team-item__name"><?_e("Штанг Олег Макарович","rubex");?></div>
					<div class="team-item__text"><?_e("Директор по правовым вопросам ООО «Рабэкс Групп»","rubex");?></div>
					<!-- <a href="#" class="main-catalog__photo-link">Подробнее</a> -->
				</div>

			</div>
			<a href="<?php echo get_permalink(20752);?>" class="main-catalog__photo-link bg-gray"><?_e("В раздел команда","rubex");?></a>
		</div>
	</section>
	
	<section class="history">
		<div class="container">
			<h2 class="section-title"><?_e("История","rubex");?></h2>
			<div class="history-sliders-wrap">
				<div class="history-slider__item">
					<div class="history-slider__date">1940-1950</div>
					<div class="history-slider__logo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/logo-1.svg);"><?_e("Курскрезинотехника","rubex");?></div>
					<div class="history-slider__slider">
						<div class="history-slider__slide" data-time="1940 - 1950">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/1.png);"></div>
							<div class="history-slider__slide-text"><?_e("В январе 1946 года началось строительство Курского завода резиновых технических изделий общей площадью 30 га. В сентябре 1948 года был выпущен первый клиновой ремень. В 1949 году завод начал выпускать маты, бытовые дорожки, автоковры","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1950 - 1960">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/2.png);"></div>
							<div class="history-slider__slide-text"><?_e("В 1950 году завод стал важнейшей стройкой Главхимстроя. В 1951 году введен в эксплуатацию цех гуммирования валов и химаппаратуры. За период 1950 — 1955 годов завод увеличил объем производства в 3 раза, производительность труда повысилась более чем на 100%. Освоены совершено новые для резинотехнической отрасли технологии в производствах транспортной ленты и вентиляторных ремней. В этот период на предприятии открыто бюро рационализаторства и изобретательства","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1960 - 1970">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/3.png);"></div>
							<div class="history-slider__slide-text"><?_e("В данный период интенсивно наращивались мощности производства конвейерных лент: модернизация и введение в эксплуатацию нового вулканизационного оборудования. В 1975 году государственная комиссия аттестовала качество резинотросовых конвейерных лент повышенной прочности и износостойкости по высшей категории. Открыт цех по пропитке синтетических тканей","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1970 - 1980">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/4.png);"></div>
							<div class="history-slider__slide-text"><?_e("Численность работников завода превысила 10 000 человек. Ежегодный прирост производственных мощностей более 10%.  Площадь предприятия увеличилась до 120 га. Пуск 2 — ой очереди комплекса по производству резинометаллических уплотнителей","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1980 - 1990">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/5.png);"></div>
							<div class="history-slider__slide-text"><?_e("Модернизация линий плоскопараллельной сборки каркасов конвейерных лент.  Запущена в работу новая линия по производству рукавов высокого давления с  металлооплеткой","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1990 - 2000">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/6.png);"></div>
							<div class="history-slider__slide-text"><?_e("Ввод в эксплуатацию линии по выпуску рукавов высокого давления с металлонавивками. Налажено производство рукавов высокого давления с концевой арматурой","rubex");?>.</div>
						</div>
					</div>
				</div>
				<div class="history-slider__item">
					<div class="history-slider__date">1950-1960</div>
					<div class="history-slider__logo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/logo-2.svg);"><?_e("Саранский завод «Резинотехника»","rubex");?></div>
					<div class="history-slider__slider">
						<div class="history-slider__slide" data-time="1950 - 1960">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/7.png);"></div>
							<div class="history-slider__slide-text"><?_e("В 1960 году на части бывшей территории совхоза им.Куйбышева состоялся митинг по закладке первого камня комбината в ознаменование 30 летия Мордовской АССР. В 1965 году цеха выпустили первую продукцию","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1960 - 1970">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/8.png);"></div>
							<div class="history-slider__slide-text"><?_e("В цехе №4 основана технология изготовления клиновых ремней в северном исполнении. В цехе №8 стали выпускать рукава с металлооплеткой. В цехе №3 были внедрены линии непрерывной вулканизации профильных изделий в расплавах солей, началось производство резиновых ковров для автобусов. В 1975 году в цехе №5 было осуществлено внедрение в формовом производстве кассетированных пресс-форм и перезарядчиков. В 1976 году Саранский резиновый комбинат был переименован в Саранский завод «Резинотехника»","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1970 - 1980">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/9.png);"></div>
							<div class="history-slider__slide-text"><?_e("Завод постоянно обновляется, начинается выпуск новой продукции, внедряются передовые технологии, происходит замена оборудования на более современное, высокопроизводительное","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1980 - 1990">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/10.png);"></div>
							<div class="history-slider__slide-text"><?_e("ОАО «Саранский завод «Резинотехника» стал одним из ведущих предприятий отрасли, комплектующий такие автогиганты как «ГАЗ», «ИжМаш», «УАЗ», «ПАЗ». На предприятии разрабатывается, и внедрятся целый комплекс новинок, которые позволили сделать большой шаг вперед. Например, безоблицовочное изготовление клиновых ремней не имело аналогов в мире","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="1980 - 1990">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/11.png);"></div>
							<div class="history-slider__slide-text"><?_e("Наращивание мощностей ключевого продукта — промышленных рукавов","rubex");?>.</div>
						</div>
					</div>
				</div>
				<div class="history-slider__item">
					<div class="history-slider__date">2010 - 2015</div>
					<div class="history-slider__logo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/logo-3.svg);"></div>
					<div class="history-slider__slider">
						<div class="history-slider__slide" data-time="2010 - 2015">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/moderniz.jpg);"></div>
							<div class="history-slider__slide-text"><?_e("В 2013 году для управления двумя активами создана Управляющая Компания – ООО «Рабэкс Групп» (Rubex Group). Проводится интенсивная техническая модернизация активов: на ОАО «Саранский завод «Резинотехника» реализация крупнейшего в истории предприятия инвестиционного проекта «Техническое перевооружение производства напорных рукавов»; на ОАО «Курскрезинотехника» приобретена новая каландровая линия для производства высококачественных конвейерных лент (производства «Uth GmbH» (Германия) по специальному заказу ОАО «Курскрезинотехника»), внедрена новая линии по сборке каркасов высокопрочных конвейерных лент","rubex");?>.</div>
						</div>
						<div class="history-slider__slide" data-time="2015-2020">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/pargen.jpg);"></div>
							<div class="history-slider__slide-text"><?_e("Осуществлена реализации инвестиционных программ в сфере повышения энергетической эффективности - строительство двух цехов парогенерации. На обоих активах запущены новые немецкие  линии для производства стрейнированной резины. Дооснощение испытательного центра стендами для проверки РВД на циклическую прочность. В 2016 г. на базе ОАО «Курскрезинотехника» состоялось открытие нового текстильного производства и создание участка пропитки и термообработки технических тканей. В 2018 г. запуск самого широкого в России пресса по вулканизации резинотканевых и резинотросовых конвейерных лент Saspol. В 2019 г. открытие участка по производству шламовых рукавов","rubex");?>.</div>
						</div>
						
						<div class="history-slider__slide" data-time="2020-∞">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history/planes.jpg);"></div>
							<div class="history-slider__slide-text"><?_e("Разработаны «Долгосрочная Стратегия развития Холдинга» и «Инвестиционная программа», предусматривающие значительное увеличение мощностей по выпуску ключевых продуктов и становление Холдинга лидером резинотехнической промышленности ЕАЭС к 2030 году","rubex");?>.</div>
						</div>
						
						<!--
						<div class="history-slider__slide">
							<div class="history-slider__slide-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/history-3.png);"></div>
							<div class="history-slider__slide-text">В 1960 году на части бывшей территории совхоза им.Куйбышева состоялся митинг по закладке первого камня комбината в ознаменование 30 летия Мордовской АССР. В 1965 году цеха выпустили первую продукцию.</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="more-information">
		<div class="container">
			<h2 class="section-title"><?_e("Больше информации о нас","rubex");?></h2>
			<div class="inform-wrapper">
				<div class="inform-item">
					<?php $arr_const = get_defined_constants();?>
					<div class="inform-item__text"><? echo sprintf(__("Корпоративная %s презентация","rubex"),"<br/>");?></div>
					<a href="<?php echo $arr_const['RubEx_Group_RUS']?>" class="main-catalog__photo-link"><?_e("Скачать (*.PDF)","rubex");?></a>
				</div>
				<div class="inform-item">
					<div class="inform-item__text"><? echo sprintf(__("Отчетность %s ОАО «Курскрезинотехника»","rubex"),"<br/>");?></div>
					<a href="http://www.e-disclosure.ru/portal/files.aspx?id=5400&type=3" class="main-catalog__photo-link"><?_e("Перейти","rubex");?></a>
				</div>
				<div class="inform-item">
					<div class="inform-item__text"><? echo sprintf(__("Отчетность %s ОАО «Саранский завод «Резинотехника»","rubex"),"<br/>");?></div>
					<a href="http://www.disclosure.ru/issuer/1328028538/" class="main-catalog__photo-link"><?_e("Перейти","rubex");?></a>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('template-parts/articles');?>
<?php
get_footer();