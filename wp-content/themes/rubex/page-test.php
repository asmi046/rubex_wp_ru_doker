<?php
/*
* Template Name: Испытательный центр
*/
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

  <section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
  <div class="container">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>
  </div>
  <div class="container">
  	<h1 class="page-title"><?php the_title();?></h1>
  	<p><?_e("Центральная лаборатория ОАО «Курскрезинотехника» функционирует со времени основания самого завода. И в настоящее время является многофункциональным, технически оснащенным подразделением холдинга RubEx Group.","rubex");?> </p>
  	<p><?_e("В состав лаборатории входит испытательный центр, который аккредитован Федеральной службой по аккредитации (аттестат аккредитации №RA.RU.21АБ16, выдан 07 апреля 2015г.), как соответствующий ГОСТ ИСО/МЭК 17025-2009 по утвержденной области испытаний широкого спектра резиновых технических изделий. Мы проводим испытания широкого ассортимента РТИ на соответствие физико-механических, химических, антистатических показателей, термического старения, пожаробезопасности и других видов испытаний, применительно к соответствующим группам изделий.","rubex");?></p>
  </div>
	<section class="about-test">
		<div class="container">
			<div class="about-test__block about-test__block-1">
				<div class="about-test__item about-test__item-red">
					<div class="about-test__item-title"><?_e("Кратко об испытательном центре","rubex");?></div>
					<div class="about-test__item-text"><?_e("Узнайте больше о нашем опыте испытаний резинотехнических изделий","rubex");?></div>
				</div>
				<div class="about-test__item about-test__item-last">
					<div class="about-test__item-text">
						<?_e("Более 150 различных видов испытательного и измерительного оборудования","rubex");?>
					</div>
				</div>
			</div>
			<div class="about-test__block about-test__block-2">
				<div class="about-test__item-wrap-2">
					<div class="about-test__item about-test__item-min">
						<?_e("Центр аттестован Федеральной службой по аккредитации","rubex");?>
					</div>
					<div class="about-test__item about-test__item-min">
						<?_e("Опробовано более 1 000 видов ингредиентов","rubex");?>
					</div>
				</div>
				<div class="about-test__item about-test__item-photo"></div>
			</div>
			<div class="about-test__block about-test__block-3">
				
				<div class="about-test__item about-test__item-min">
					<? echo sprintf(__("Создано более %s1 500 видов резиновых смесей","rubex"),"<br/>");?>
				</div>
				<div class="about-test__item about-test__item-min">
					<?_e("Отработаны параметры изготовления более 22 000 изделий","rubex");?>
				</div>
				<div class="about-test__item about-test__item-min about-test__item-last">
					<?_e("Проведено более 7 миллионов различных испытаний","rubex");?>
				</div>
			</div>
		</div>
	</section>
	<section class="tests">
		<div class="container">
			<h2 class="section-title"><?_e("Проводимые исследования","rubex");?></h2>
		</div>
		<div class="container tests-container">
			<div class="tests-item">
				<div class="tests-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/conv-blt-testing.jpg);"></div>
				<div class="tests-item__title"><?_e("Испытания конвейерной ленты","rubex");?></div>
				<ul class="ul-clean tests-item__list">
					<li><a href="#"><?_e("Прочность связи при расслоении","rubex");?></a></li>
					<li><a href="#"><?_e("Поверхностное электрическое сопротивление","rubex");?></a></li>
					<li><a href="#"><?_e("Время горения","rubex");?> </a></li>
					<li><a href="#"><?_e("Кислородный индекс","rubex");?></a></li>
					<li><a href="#"><?_e("Длина неповреждённого участка ленты, при проведении испытаний в лабораторной пожарной штольне","rubex");?></a></li>
					<li><a href="#"><?_e("Температура самовоспламенения Маслостойкость Истираемость Термо- и морозостойкость (от -60°С до +200°С)","rubex");?></a></li>
				</ul>
			</div>
			<div class="tests-item">
				<div class="tests-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/hoses-testing.jpg);"></div>
				<div class="tests-item__title"><? echo sprintf(__("Испытания %sрукавов","rubex"),"<br/>");?></div>
				<ul class="ul-clean tests-item__list">
					<li><a href="#"><?_e("Герметичность","rubex");?></a></li>
					<li><a href="#"><?_e("Запас прочности","rubex");?></a></li>
					<li><a href="#"><?_e("Морозостойкость","rubex");?></a></li>
					<li><a href="#"><?_e("Озоностойкость","rubex");?></a></li>
					<li><a href="#"><?_e("Огнестойкость","rubex");?></a></li>
					<li><a href="#"><?_e("Стойкость к агрессивным средам","rubex");?></a></li>
					<li><a href="#"><?_e("Изменение диаметра","rubex");?></a></li>
					<li><a href="#"><?_e("Радиус изгиба","rubex");?></a></li>
				</ul>
			</div>
			<div class="tests-item">
				<div class="tests-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/test-3.jpg);"></div>
				<div class="tests-item__title"><?_e("Испытания формовых и не формовых","rubex");?></div>
				<ul class="ul-clean tests-item__list">
					<li><a href="#"><?_e("Прочностные характеристики (до 30-ти МПА)","rubex");?></a></li>
					<li><a href="#"><?_e("Остаточную деформацию сжатия","rubex");?></a></li>
					<li><a href="#"><?_e("Термо и морозостойкость (от -60°С до +200°С)","rubex");?> </a></li>
					<li><a href="#"><?_e("Изменение показателей после искусственного старения в воздухе и в агрессивных средах","rubex");?></a></li>
					<li><a href="#"><?_e("Масло-, бензо-, агрессивостойкость","rubex");?></a></li>
					<li><a href="#"><?_e("Прочность связи резины с металлом и тканью","rubex");?></a></li>
					<li><a href="#"><?_e("Удельное объемное электросопротивление","rubex");?></a></li>
					<li><a href="#"><?_e("Сопротивление истиранию, потери массы при истирании","rubex");?></a></li>
					<li><a href="#"><?_e("Герметичность, водонепроницаемость","rubex");?></a></li>
					<li><a href="#"><?_e("Кажущуюся плотность (для пористых изделий) статическую жесткость при сжатии.","rubex");?></a></li>
				</ul>
			</div>
		</div>
	</section>
	<section class="equipment">
		<div class="container">
			<h2 class="section-title"><?_e("Оборудование лаборатории","rubex");?></h2>
			<div class="equipment-wrapper">
				<div class="equipment-item">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-1.png);"></div>
					<div class="equipment-item__title"><?_e("Вискозометр","rubex");?></div>
					<div class="equipment-item__text">V-3000 Basic «Mon Tech»</div>
				</div>
				<div class="equipment-item">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-2.png);"></div>
					<div class="equipment-item__title"><?_e("Испытательная машина","rubex");?></div>
					<div class="equipment-item__text">«Инстрон - 5584»</div>
				</div>
				<div class="equipment-item">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-3.png);"></div>
					<div class="equipment-item__title"><?_e("Испытательная камера","rubex");?></div>
					<div class="equipment-item__text">«ARGENTOX» 3МR-RVB-140</div>
				</div>
				<div class="equipment-item">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/vesi-analit.jpg);"></div>
					<div class="equipment-item__title"><?_e("Весы аналитические","rubex");?></div>
					<div class="equipment-item__text">AGN-200</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-5.jpg);"></div>
					<div class="equipment-item__title"><?_e("Абразиметр","rubex");?></div>
					<div class="equipment-item__text">АБ-6332</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-6.jpg);"></div>
					<div class="equipment-item__title"><?_e("Климатическая камера","rubex");?></div>
					<div class="equipment-item__text">ТХ-500</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-7.jpg);"></div>
					<div class="equipment-item__title"><?_e("Температура плавления","rubex");?></div>
					<div class="equipment-item__text">Melting Point System MP 50</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-8.jpg);"></div>
					<div class="equipment-item__title"><?_e("Cпектрофотометр","rubex");?></div>
					<div class="equipment-item__text">Nicolet iS10</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-9.jpg);"></div>
					<div class="equipment-item__title"><?_e("Влагомер весовой","rubex");?></div>
					<div class="equipment-item__text">МХ-50</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-10.jpg);"></div>
					<div class="equipment-item__title"><?_e("Электронный рН-метр","rubex");?></div>
					<div class="equipment-item__text">HANNA edge</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-11.jpg);"></div>
					<div class="equipment-item__title"><?_e("Весы аналитические","rubex");?></div>
					<div class="equipment-item__text">AGN-200</div>
				</div>
				<div class="equipment-item item-slide" style="display: none;">
					<div class="equipment-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/eq-11.jpg);"></div>
					<div class="equipment-item__title"><?_e("Прочее","rubex");?></div>
					<div class="equipment-item__text"><?_e("Цифровое измерительное оборудование","rubex");?></div>
				</div>
			</div>
			<a href="#" class="main-catalog__photo-link more-catalog"><?_e("Все оборудование","rubex");?></a>
		</div>
	</section>
	<section class="contacts-section">
		
		<div class="container">
		    <h1 class="page-title"><?_e("Контакты лаборатории","rubex");?></h1>
		    <div class="contacts-section__descr"><?_e("По вопросам выполнения услуг по проведению испытаний для сторонних организаций в соответствии с областью аккредитации, вы можете обращаться:","rubex");?></div>
		    <div class="service-contacts__wrapper">
		    	<div class="service-contacts__item">
		    		<div class="service-contacts__title"><? echo sprintf(__("Бирдус%s Татьяна Ростиславовна","rubex"),"<br/>");?></div>
		    		<div class="service-contacts__position"><? echo sprintf(__("руководитель испытательного%s центра","rubex"),"<br/>");?></div>
		    		<div class="contacts-snab-item">
		    			<div class="contacts-snab-item__text"><?_e("Факс:","rubex");?></div>
		    			<div class="">
				    		<a href="tel:+74712381282" class="service-contacts__phone">+7 4712 38-12-82</a>
				    		<a href="tel:+747377978" class="service-contacts__phone">+7 4712 37-79-78</a>
		    			</div>
		    		</div>
		    		<div class="contacts-snab-item">
		    			<div class="contacts-snab-item__text"><?_e("Факс:","rubex");?></div>
		    			<div class="">
				    		<a href="tel:+74712371571" class="service-contacts__phone">+7 4712 37-15-71</a>
		    			</div>
		    		</div>
		    		<a href="mailto:birdus@rubexgroup.ru" class="service-contacts__mail">birdus@rubexgroup.ru</a>
		    	</div>
		    	<div class="service-contacts__item">
		    		<div class="service-contacts__title"><? echo sprintf(__("Демидова%s Инна Владимировна","rubex"),"<br/>");?></div>
		    		<div class="service-contacts__position"><? echo sprintf(__("начальник центральной %sлаборатории","rubex"),"<br/>");?></div>
		    		<div class="contacts-snab-item">
		    			<div class="contacts-snab-item__text"><?_e("Тел:","rubex");?></div>
		    			<div class="">
				    		<a href="tel:+74712381503" class="service-contacts__phone">+7 4712 38-15-03</a>
		    			</div>
		    		</div>
		    		<a href="mailto:Demidova@rubexgroup.ru" class="service-contacts__mail">Demidova@rubexgroup.ru</a>
		    	</div>
		    	<div class="service-contacts__item">
		    		<div class="service-contacts__title"><? echo sprintf(__("Морозова%s Ольга Эдуардовна","rubex"),"<br/>");?></div>
		    		<div class="service-contacts__position"><? echo sprintf(__("заместитель начальника%s центральной лаборатории","rubex"),"<br/>");?></div>
		    		<div class="contacts-snab-item">
		    			<div class="contacts-snab-item__text"><?_e("Тел:","rubex");?></div>
			    		<a href="tel:+74712381860" class="service-contacts__phone">+7 4712 38-18-60</a>
			    	</div>
		    		<a href="mailto:morozovaoe@rubexgroup.ru" class="service-contacts__mail">morozovaoe@rubexgroup.ru</a>
		    	</div>
		    </div>
		</div>
	</section>
	
	</div>
	</div>
<?php
get_footer();