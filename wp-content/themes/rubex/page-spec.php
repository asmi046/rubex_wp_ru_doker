<?php
/*
* Template Name: Молодым специалистам
*/
get_header();
?>
  <section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
  <div class="container">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>
  </div>
   <div class="container">
   	<h1 class="page-title">Молодым специалистам</h1>
   	<div class="page-descr">Мы строим кадровое будущее наших предприятий, привлекая молодых специалистов и студентов, помогая готовить их к реальной работе, знакомя с условиями и особенностиями труда на наших активах.</div>
   	<div class="ms_wriper">
		<div class="ms_text">
			<h2>Практика</h2>
			<p>«Рабэкс Групп» на постоянной основе сотрудничает с региональными СУЗами и ВУЗами Саранска и Курска: ЮЗГУ, КЭМТ, КМТ, КГУ, МГУ им. Н.П. Огарева, СКИ РУК, Саранский техникум сферы услуг и промышленных технологий, Саранский техникум энергетики и электронной техники им. А.И. Полежаева, СЭК и др.</p>
			<p>Студенты имеют возможность пройти практику (ознакомительную, производственную, преддипломную) на предприятиях холдинга или посетить заводы с экскурсией. Ежегодно подобную практику проходят около двухсот  учащихся. В этом году наш холдинг стал участником федерального проекта <a href="https://xn--80aeliblxdekein0a.xn--p1ai/">Профстажировки.рф</a></p>
		</div>
		
		<div class="ms_icon">
			<div class="ms_icon_elem" style="background-image:url(https://rubexgroup.ru/wp-content/themes/rgn/images/vuz-logo/kemt.jpg);"></div>
			<div class="ms_icon_elem" style="background-image:url(https://rubexgroup.ru/wp-content/themes/rgn/images/vuz-logo/kgu.png);"></div>
			<div class="ms_icon_elem" style="background-image:url(https://rubexgroup.ru/wp-content/themes/rgn/images/vuz-logo/kmt.jpg);"></div>
			<div class="ms_icon_elem" style="background-image:url(https://rubexgroup.ru/wp-content/themes/rgn/images/vuz-logo/mog.jpg);"></div>
			<div class="ms_icon_elem" style="background-image:url(https://rubexgroup.ru/wp-content/themes/rgn/images/vuz-logo/ski.jpg);"></div>
			<div class="ms_icon_elem" style="background-image:url(https://rubexgroup.ru/wp-content/themes/rgn/images/vuz-logo/uzgu.jpg);"></div>
		</div>
	</div>
		<h2>Экскурсии</h2>
		<p>«Рабэкс Групп» также проводит профориентационные мероприятия для школьников. Учащиеся 9-11 классов могут посетить активы холдинга (ОАО «Курскрезинотехника», ОАО «Сранский завод «Резинотехника») с экскурсией, во время которой увидят производственный процесс «онлайн», узнают о видах выпускаемой продукции, познакомятся с востребованными профессиями резинотехнической отрасли.</p>
		<h2>По вопросам проведения экскурсий и прохождения практики обращаться:</h2>
		<p>Руководитель обучения и развития корпоративной культуры - Погожих Виктория Викторовна, тел. <a href="tel:88005059870">8 800 505 98 70</a></p>
		<!-- <p>Начальник учебного центра ОАО "Саранский завод "Резинотехника" Андронова Юлия Анатольевна, тел. <a href="tel:88005059870">8 800 505 98 70</a></p> -->
   </div>
<?php
get_footer();