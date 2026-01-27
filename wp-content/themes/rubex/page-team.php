<?php /*
* Template Name: Наша команда
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
	<h1 class="h1-contacts"><?php the_title();?></h1>
	
	<div class="team-block">
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/gordeev.jpg);"></div>
		<div class="team-block__content">
			<div class="team-block__name"><? echo sprintf(__("Гордеев%s Владимир Николаевич","rubex"),"<br/>");?></div>
			<!-- <div class="team-block__date"><?_e("1964 года рождения","rubex");?></div> -->
			<div class="team-block__descr">
				<p class="team-block__position"><?_e("Председатель совета директоров ОАО «Курскрезинотехника» и ОАО «Саранский завод «Резинотехника»","rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончил:","rubex");?></strong>
					<p><?_e("Кемеровский технологический институт пищевой промышленности, Экономика и управление на предприятии, 2003 г.","rubex");?></p>
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">1996 – 2006</span> <?_e("ООО «Росконтракт», Генеральный директор","rubex");?></p>
					<p><span class="color-red">2006 – 2013</span> <?_e("ОАО «Курскрезинотехника», Генеральный директор","rubex");?></p>
					<p><span class="color-red">2013 — 2015</span> <?_e("ОАО «Курскрезинотехника», Управляющий директор","rubex");?></p>
					<p><span class="color-red">2015</span> <?_e("Председатель совета директоров","rubex");?></p>
				</div>
			</div>
			<a href="#" class="team-btn main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
		</div>
	</div>
	

	<!-- <div class="team-block">
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/iamnikova.jpg);"></div>
		<div class="team-block__content">
			<div class="team-block__name"><? echo sprintf(__("Ямникова%s Наталья Борисовна","rubex"),"<br/>");?></div>
			<div class="team-block__descr">
				<p class="team-block__position"><?_e("Финансовый директор ООО «Рабэкс Групп»","rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончилa:","rubex");?></strong>
					<p><?_e("Всероссийский финансово-экономический институт, 2002","rubex");?></p>
					<p><?_e("Международный институт менеджмента ЛИНК, курс «Стратегия».","rubex");?></p>
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">2018 </span> <?_e("генеральный директор, финансовый директор ООО «Рабэкс Групп»","rubex");?></p>
					<p><span class="color-red">2016-2018</span>  <?_e("финансовый директор ООО «Рабэкс Групп»","rubex");?></p>
					<p><span class="color-red">2011-2016</span> <?_e("Финансовый директор,  ОАО «СЗРТ»","rubex");?></p>
					<p><span class="color-red">2006-2011</span> <?_e("Заместитель финансового директора, ОАО «КРТ»","rubex");?></p>
				</div>
			</div>
			<a href="#" class="team-btn main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
		</div>
	</div> 

	<div class="team-block">
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/torshenko.jpg);"></div>
		<div class="team-block__content">
			<div class="team-block__name"><? echo sprintf(__("Торшенко%s Дмитрий Сергеевич","rubex"),"<br/>");?></div>
			<div class="team-block__descr">
				<p class="team-block__position"><?_e("Директор по информационным технологиям  ООО «Рабэкс Групп»","rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончил:","rubex");?></strong>
					<p><?_e("Курский Государственный Университет, Информатика и Вычислительная техника, 2004г.","rubex");?></p>
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">2004 – 2006</span> <?_e("Управляющая компания «Электроаппарат», Начальник отдела внедрения информационных систем;","rubex");?></p>
					<p><span class="color-red">2006 — 2007</span> <?_e("ООО «Информационные технологии бизнеса» (1С франчайзи), Генеральный директор","rubex");?></p>
					<p><span class="color-red">2007 — 2012</span> <?_e("ОАО «Курскрезинотехника», Начальник Управления Информационных Технологий","rubex");?></p>
					<p><span class="color-red">2012</span> <?_e("Директор по информационным технологиям ООО «RubEx Group»","rubex");?></p>
				</div>
			</div>
			<a href="#" class="team-btn main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
		</div>
	</div>

	-->
	
	<div class="team-block">		
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/silin.jpg);"></div>		
		<div class="team-block__content">			
			<div class="team-block__name"><? echo sprintf(__("Силин%s Алексей Альбертович","rubex"),"<br/>");?></div>			
			<!-- <div class="team-block__date"><?_e("1968 года рождения","rubex");?></div> -->
			<div class="team-block__descr">
				<p class="team-block__position"><?_e("Первый заместитель директора ООО «Рабэкс Трэйд»","rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончил:","rubex");?></strong>
					<p>1993 — <?_e("Курский государственный технический университет","rubex");?></p>
					<p>2009 — <?_e("Курский институт менеджмента, экономики и бизнеса, курс «Маркетинг»","rubex");?></p>
					
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">2015</span> <?_e("Первый заместитель директора ООО «Рабэкс Трэйд»","rubex");?></p>
					<p><span class="color-red">2007-2015</span> <?_e(" коммерческий директор ЗАО «Курскрезинотехника» (совместительство – директор ООО «Торговый Дом «КРТ»)","rubex");?></p>
					<p><span class="color-red">2000-2007</span> <?_e("Заместитель директора ООО «Торговый Дом «КРТ»","rubex");?></p>
					
				</div>
			</div>	
			<a href="#" class="team-btn main-catalog__photo-link">Подробнее</a>		</div>	
	</div>
	
	<div class="team-block">
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/shtang.jpg);"></div>
		<div class="team-block__content">
			<div class="team-block__name"><? echo sprintf(__("Штанг%s Олег Макарович","rubex"),"<br/>");?></div>
			<!-- <div class="team-block__date"><?_e("1968 года рождения","rubex");?></div> -->
			<div class="team-block__descr">
				<p class="team-block__position"><?_e("Директор по правовым вопросам ООО «Рабэкс Групп»","rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончил:","rubex");?></strong>
					<p><?_e("Саратовская Государственная Академия права, юриспруденция, 1997 г.","rubex");?></p>
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">2003-2013 </span> <?_e("Директор по юридическим вопросам ООО «ЭХК»","rubex");?></p>
					<p><span class="color-red">2013</span> <?_e("Директор по юридическим вопросам ООО «RubEx Group»","rubex");?></p>
				</div>
			</div>
			<a href="#" class="team-btn main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
		</div>
	</div>
	<!-- <div class="team-block">
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/garova.jpg);"></div>
		<div class="team-block__content">
			<div class="team-block__name"><? echo sprintf(__("Жарова%s Ксения Сергеевна","rubex"),"<br/>");?></div>
			<div class="team-block__descr">
				<p class="team-block__position"><?_e("Директор по закупкам и внешнеэкономической деятельности ООО «Рабэкс Групп»","rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончилa:","rubex");?></strong>
					<p><?_e("ВолГУ, Мировая экономика, 2002 г.","rubex");?></p>
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">2003-2006</span> <?_e("Ведущий специалист по ВЭД, ВОАО «Химпром» (одно из крупнейших предприятий отечественного химического комплекса).","rubex");?></p>
					<p><span class="color-red">2006-2012</span> <?_e("Руководитель отдела ВЭД УК ЗАО «Ренова Оргсинтез» (ГК «Ренова»). В управлении ЗАО «Ренова Оргсинтез» —  ОАО «Химпром», Новочебоксарск; ОАО «Перкарбонат», Новочебоксарск; ОАО «Нефтехимия», Новокуйбышевск.","rubex");?></p>
					<p><span class="color-red">2013</span> — <?_e("Директор по закупкам ООО «RubEx Group»","rubex");?></p>
				</div>
			</div>
			<a href="#" class="team-btn main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
		</div>
	</div> -->
	
	
	<!-- <div class="team-block">
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/kalinin.jpg);"></div>
		<div class="team-block__content">
			<div class="team-block__name"><? echo sprintf(__("Калинин%s Михаил Сергеевич","rubex"),"<br/>");?></div>
			<div class="team-block__descr">
				<p class="team-block__position"><?_e("Управляющий директор ООО «Рабэкс Групп» (ОАО «СЗРТ»)","rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончил:","rubex");?></strong>
					<p>2017 — <?_e("Moscow City Business School, MBA с дипломом Европейской ассоциации дистанционного обучения и образования EDLEA","rubex");?></p>
					<p>2004 — <?_e("Воронежский государственный технический университет, г. Воронеж, специальность «Электромеханика и электрические аппараты», квалификация «Кандидат технических наук»","rubex");?></p>
					<p>2001 — <?_e("Липецкий государственный технический университет, г. Липецк, специальность «Электропривод и автоматика промышленных установок и технологических комплексов», квалификация «Инженер».","rubex");?></p>
					
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">2019</span> <?_e("Управляющий директор ООО «Рабэкс Групп»","rubex");?></p>
					<p><span class="color-red">2018-2019</span> <?_e("Директор по развитию технической политики и экспертизы ТОиР, Аппарат вице-президента по развитию системы управления состоянием основных фондов предприятий Группы Новолипецкий металлургический комбинат (НЛМК)","rubex");?></p>
					<p><span class="color-red">2014-2018</span> <?_e("Руководитель планово-аналитического управления, Липецкая площадка Группы НЛМК","rubex");?></p>
					<p><span class="color-red">2013-2014</span> <?_e("Руководитель направления «Техническая политика», Дирекция по управлению энергетическим комплексом Группы НЛМК","rubex");?></p>
					<p><span class="color-red">2008-2013</span> <?_e("Главный специалист по электроснабжению, Дирекция по энергетике Группы НЛМК","rubex");?></p>
				</div>
			</div>
			<a href="#" class="team-btn main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
		</div>
	</div>		 -->
	
	<div class="team-block">
		<div class="team-block__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/team/lapin.jpg);"></div>
		<div class="team-block__content">
			<div class="team-block__name"><? echo sprintf(__("Лапин %s Алексей Геннадьевич","rubex"),"<br/>");?></div>
			
			<div class="team-block__descr">
				<p class="team-block__position"><?_e('3аместитель генерального директора-управляющий директор ООО "Рабэкс Групп"',"rubex");?></p>
				<div class="team-block__hide">
					<strong><?_e("Закончил:","rubex");?></strong>
					<p>2012 — <?_e("Вятский государственный университет, MBA","rubex");?></p>
					<p>1997 — <?_e("Кемеровский государственный университет, специальность «Экономика и управление на предприятии», экономист","rubex");?></p>
					
					<strong><?_e("Опыт работы:","rubex");?></strong>
					<p><span class="color-red">2020</span> <?_e("Первый заместитель управляющего директора ООО «Рабэкс Групп»","rubex");?></p>
					<p><span class="color-red">2017-2020</span> <?_e("Управляющий директор ООО «Сибирский бетон»","rubex");?></p>
					<p><span class="color-red">2014-2017</span> <?_e("Заместитель генерального директора - коммерческий директор, КОАО «АЗОТ»","rubex");?></p>
					<p><span class="color-red">2009-2014</span> <?_e("Заместитель директора по материально-техническому снабжению, ОАО «Уралхим»","rubex");?></p>
					<p><span class="color-red">1999-2009</span> <?_e("Заместитель коммерческого директора - начальник управления снабжения, КОАО «АЗОТ»","rubex");?></p>
				</div>
			</div>
			<a href="#" class="team-btn main-catalog__photo-link"><?_e("Подробнее","rubex");?></a>
		</div>
	</div>		
	


	

	
  </div>

<?php
get_footer();