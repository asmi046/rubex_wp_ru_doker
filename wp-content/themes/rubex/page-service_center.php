<?php
/*
* Template Name: Сервисный центр
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
    <div class="page-descr"><?_e("Для своих клиентов сервисный центр RubEx Group предлагает комплексное обслуживание конвейерных лент.","rubex");?></div>
    <div class="service-wrapper">
      	  <div class="service-item">
        <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/s1.svg);"></div>
        <div class="service-item__title"><?_e("Дистанционная оценка ситуации","rubex");?></div>
        <ul class="service-item__list tests-item__list ul-clean">
          <li><?_e("Оценка текущей ситуации - «Слушаем заказчика – выявляем проблему»","rubex");?></li>
          <li><?_e("Обзор условий эксплуатации конвейерных лент посредством анкетирования","rubex");?></li>
        </ul>
      </div>
      <div class="service-item">
        <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/s2.svg);"></div>
        <div class="service-item__title"><?_e("Аудит конвейерного транспорта","rubex");?></div>
        <ul class="service-item__list tests-item__list ul-clean">
          <li><?_e("Проведение полного аудита конвейерного транспорта (конвейерных лент, конвейерного оборудования, условий эксплуатации и пр.)","rubex");?></li>
        </ul>
      </div>
      <div class="service-item">
        <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/s3.svg);"></div>
        <div class="service-item__title"><?_e("Предложения и рекомендации Rubex","rubex");?></div>
        <ul class="service-item__list tests-item__list ul-clean">
          <li><?_e("Итоговые рекомендации по пакету «лента +транспортировка+стыковка»","rubex");?></li>
          <li><?_e("Расчет показателей финансового эффекта от внедрения","rubex");?></li>
        </ul>
      </div>
      <div class="service-item">
        <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/s4.svg);"></div>
        <div class="service-item__title"><?_e("Обучение","rubex");?></div>
        <ul class="service-item__list tests-item__list ul-clean">
          <li><?_e("Проведение обучающих семинаров для техн.специалистов потребляющих предприятий","rubex");?> </li>
          <li><?_e("Дистанционное консультирование и обучение по установке КЛ (обучающие материалы, руководство по эксплуатации)","rubex");?></li>
        </ul>
      </div>
      <div class="service-item">
        <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/s5.svg);"></div>
        <div class="service-item__title"><?_e("Мониторинг эксплуатации","rubex");?></div>
        <ul class="service-item__list tests-item__list ul-clean">
          <li><?_e("Постоянный мониторинг жизненного цикла ленты (осмотр, системы обнаружения порывов, измерение удлинения, толщины)","rubex");?> </li>
          <li><?_e("Оповещение и предупреждение","rubex");?></li>
        </ul>
      </div>
      <div class="service-item">
        <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/s6.svg);"></div>
        <div class="service-item__title"><?_e("Поставка эффективных решений","rubex");?></div>
        <ul class="service-item__list tests-item__list ul-clean">
          <li><?_e("Конвейерная лента под индивидуальные условия работы Заказчика","rubex");?></li>
          <li><?_e("Стыковка (материалы / работа)","rubex");?></li>
          <li><?_e("Поставка и установка дополнительного оборудования (скребки, балки, уплотнители, датчики и пр.)","rubex");?></li>
        </ul>
      </div>
    </div>
    <div class="result">
      <div class="result-title"><? echo sprintf(__("В результате %sВы получаете:","rubex"),"<br/>");?></div>
      <ul class="result-list ul-clean">
        <li><?_e("Обеспечение бесперебойного, экономически эффективного производственного процесса","rubex");?></li>
        <li><?_e("Повышение эксплуатационного ресурса конвейерных лент от 30 до 50 %","rubex");?></li>
        <li><?_e("Снижение стоимости владения конвейерной ленты","rubex");?></li>
      </ul>
    </div>
    <div class="result-note"><?_e("Мы предлагаем воспользоваться как полным пакетом сервисных услуг так и выбрать отдельное предложение под Ваши потребности","rubex");?></div>
  </div>
  <section class="service-form">
    <div class="container">
      <div class="service-form__header">
        <div class="service-form__title"><?_e("Задать вопрос специалистам cервисного центра","rubex");?></div>
        <div class="service-form__note"<?_e('Нажимая на кнопку "Отправить", вы соглашаетесь с условиями обработки персональных данных.',"rubex");?>></div>
      </div>
      <form action="" class="service-form__form">
        <input type="text" name="name" placeholder="<?_e("Имя","rubex");?>">
        <input type="text" name="mail" placeholder="<?_e("e-mail","rubex");?>">
        <textarea name="message" id="" cols="30" rows="10" placeholder="<?_e("Сообщение","rubex");?>"></textarea>
        <a href="#" class="main-catalog__photo-link uniSendBtn"><?_e("Отправить","rubex");?></a>
      </form>
    </div>
  </section>
  <section class="text-section">
    <div class="container">
    <h2 class="section-title"><?_e("Повышение квалификации в области техники вулканизации и технического обслуживания лент","rubex");?></h2>
    <div class=""><?_e("Система обучения от Rubex предлагает Вам и Вашим сотрудникам пошагово получить оптимально подобранный пакет знаний. Целью программы является предоставление знаний и умений необходимых для практического увеличения эксплуатационного состояния конвейерных лент.","rubex");?></div>
  </div>
  </section>
  <section class="programms">
    <div class="container">
      <h3 class="section-title"><?_e("Программы повышения квалификации","rubex");?></h3>
      <div class="service-wrapper">
          
        <div class="service-item">
          <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/p3.svg);"></div>
          <div class="service-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/test-1.jpg);"></div>
          <div class="service-item__title color-red"><?_e("Вулканизация","rubex");?></div>
          <div class="service-item__title"><?_e("Техника вулканизации","rubex");?></div>
          <ul class="service-item__list tests-item__list ul-clean">
            <li><?_e("Базовые знания о технике вулканизации резинотканевых и резинотросовых конвейерных лентах","rubex");?></li>
            <li><?_e("Основные технические понятия","rubex");?></li>
          </ul>
        </div>
        <div class="service-item">
          <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/p2.svg);"></div>
          <div class="service-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/p2.png);"></div>
          <div class="service-item__title color-red"><?_e("Тканевая лента","rubex");?></div>
          <div class="service-item__title"><?_e("Программа «Резинотканевая конвейерная лента»","rubex");?></div>
          <ul class="service-item__list tests-item__list ul-clean">
            <li><?_e("Материаловедение ,предупреждение аварий уход, определение и решение проблем Техническое обслуживание, машиноведение","rubex");?></li>
            <li><?_e("Ремонт: «холодный», «горячий»","rubex");?> <li>
            <li><?_e("Монтаж / демонтаж","rubex");?> </li>
            <li><?_e("Стыковка методом «холодной» вулканизации","rubex");?> </li>
            <li><?_e("Стыковка методом «горячей» вулканизации Применение вулканизационного пресса","rubex");?> </li>
            <li><?_e("Расчеты, согласно норм ДИН","rubex");?></li>
            <li><?_e("Основные технические понятия","rubex");?></li>
          </ul>
        </div>
        <div class="service-item">
          <div class="service-item__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/img/p1.svg);"></div>
          <div class="service-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/p3.png);"></div>
          <div class="service-item__title color-red"><?_e("Тросовая лента","rubex");?></div>
          <div class="service-item__title"><?_e("Программа «Резинотканевая конвейерная лента»","rubex");?></div>
          <ul class="service-item__list tests-item__list ul-clean">
            <li><?_e("Материаловедение ,предупреждение аварий уход, определение и решение проблем Техническое обслуживание, машиноведение","rubex");?></li>
            <li><?_e("Ремонт: «холодный», «горячий» ","rubex");?><li>
            <li><?_e("Монтаж / демонтаж","rubex");?> </li>
            <li><?_e("Стыковка методом «холодной» вулканизации","rubex");?> </li>
            <li><?_e("Стыковка методом «горячей» вулканизации Применение вулканизационного пресса","rubex");?> </li>
			<li><?_e("Расчеты, согласно норм ДИН","rubex");?></li>
            <li><?_e("Основные технические понятия","rubex");?></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
 
	</div>
 </div>
<?php
get_footer();