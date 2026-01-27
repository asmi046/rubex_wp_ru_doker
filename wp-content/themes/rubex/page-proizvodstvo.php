<?php
/*
* Template Name: Производство
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
<h1 class="section-title"><?_e("Производство резинотехнических изделий RubEx Group","rubex");?></h1>
<?php
while ( have_posts() ) :
	the_post();
	the_content();
endwhile; // End of the loop.
?>
</div>


<section class="manufacturer-wrapper">
	<div class="container">
		<div class="manufacturer-photo">
			<a href="<?php echo get_template_directory_uri();?>/img/proizvodstvo/tp-obor.jpg" data-lightbox="man">
				<img src="<?php echo get_template_directory_uri();?>/img/proizvodstvo/tp-obor-mini.jpg" alt="">
			</a>
		</div>
		<div class="manufacturer-photo">
			<a href="<?php echo get_template_directory_uri();?>/img/proizvodstvo/dlinnomer.jpg" data-lightbox="man">
				<img src="<?php echo get_template_directory_uri();?>/img/proizvodstvo/dlinnomer-mini.jpg" alt="">
			</a>
		</div>
		<div class="manufacturer-photo">
			<a href="<?php echo get_template_directory_uri();?>/img/proizvodstvo/press-green.jpg" data-lightbox="man">
				<img src="<?php echo get_template_directory_uri();?>/img/proizvodstvo/press-green-mini.jpg" alt="">
			</a>
		</div>
		<div class="manufacturer-photo">
			<a href="<?php echo get_template_directory_uri();?>/img/proizvodstvo/rukava.jpg" data-lightbox="man">
				<img src="<?php echo get_template_directory_uri();?>/img/proizvodstvo/rukava-mini.jpg" alt="">
			</a>
		</div>
	</div>
</section>

<section class="video-manufacturer-wrapper">
	<div class="container">
		<h2>Видео о нашем производстве «Курскрезинотехника»</h2>
		<video poster="<?echo get_bloginfo("template_url")?>/img/proizv.jpg" controls="controls">
   			<source src="<?php echo get_bloginfo("url"); ?>/manuf.mp4"  type='video/mp4;'>
   		</video>

		<br>
		<br>
		<h2>Видео о нашем производстве «Саранский завод «Резинотехника»</h2>
		<video poster="<?echo get_bloginfo("template_url")?>/img/proizv.jpg" controls="controls">
   			<source src="<?php echo get_bloginfo("url"); ?>/manuf_szrt.mp4"  type='video/mp4;'>
   		</video>
	</div>
</section>

<section class="potencial main-catalog">
	<div class="container">
		<div class="main-catalog__item main-catalog__item-odd">
	        <div class="main-catalog__photo">
	        	<h2 class="main-catalog__text-title"><?_e("Конвейерная лента","rubex");?></h2>
	        	<p><?_e("70 лет опыта в производстве конвейерных лент. Единственный в ЕАЭС производитель резинотросовой ленты и лент шириной до 2400 мм","rubex");?></p>
	        	<h3 class="potencial-item-title"><?_e("Текущие мощности: 1,5 миллиона квадратных метров конвейерной ленты","rubex");?></h3>
	        	<p><?_e("Выпуск конвейерной ленты шириной до 2400 мм, толщиной до 50 мм, длинной до 500 погонных метров с характеристиками на уровне лучших мировых стандартов","rubex");?>.</p>
				<div class = "trueButton_wraper">
					<a href="<?echo Catalog_BELT;?>" class="main-catalog__photo-link trueButton"><?_e("Каталог","rubex");?></a>
	        		<a href="<? echo get_the_permalink(21031);?>" class="main-catalog__photo-link trueButton"><?_e("Производство","rubex");?></a>
				</div>
			</div>
	        <div class="main-catalog__text" style="background-image: url(<?php echo get_template_directory_uri();?>/img/potencial-1.png);">
	        </div>
      </div>
      <div class="main-catalog__item">
        <div class="main-catalog__text" style="background-image: url(<?php echo get_template_directory_uri();?>/img/potencial-hoses.jpg">
        </div>
        <div class="main-catalog__photo">
	        	<h2 class="main-catalog__text-title"><?_e("Промышленные рукава","rubex");?></h2>
	        	<p><?_e("60 лет опыта в производстве промышленных рукавов. Производство напорных и напорно-всасывающих рукавов","rubex");?></p>
	        	<h3 class="potencial-item-title"><?_e("Текущие мощности: 40 миллионов метров рукавов","rubex");?></h3>
	        	<p><?_e("Производство резиновых рукавов от 4 до 325 мм, с рабочим давлением до 100 Бар, устойчивых к агрессивным средам, абразивному износу, экстремальным температурам для ключевых отраслей промышленности.","rubex");?></p>
	        	<a href="<?echo Catalog_HOSE;?>" class="main-catalog__photo-link"><?_e("Каталог","rubex");?></a>
        </div>
      </div>
		<div class="main-catalog__item main-catalog__item-odd">
	        <div class="main-catalog__photo">
	        	<h2 class="main-catalog__text-title"><?_e("Рукава высокого давления","rubex");?></h2>
	        	<p><?_e("20+ лет опыта в производстве РВД по международным стандартам. Собственные разработки и привлечение зарубежных специалистов для создания наиболее эффективных конструкций РВД","rubex");?></p>
	        	<h3 class="potencial-item-title"><?_e("Текущие мощности: 4 миллиона метров рукавов высокого давления (РВД)","rubex");?></h3>
	        	<p><?_e("Производство рукавов высокого давления диаметром от 5 до 51 мм, с рабочим давлением до 445 Бар. 100% соответствие и превосходство стандартов EN и SAE Тестирование на циклическую прочность всех производимых партий рукавов","rubex");?></p>
	        	<a href="<?echo Catalog_RVD;?>" class="main-catalog__photo-link"><?_e("Каталог","rubex");?></a>
	        </div>
	        <div class="main-catalog__text" style="background-image: url(<?php echo get_template_directory_uri();?>/img/potencial-3.png">
	        </div>
      </div>
	</div>
</section>
<section class="about-test our-advant">
	<div class="container">
		<h2 class="section-title"><?_e("Наши преимущества","rubex");?></h2>
	</div>
	<div class="container">
		<div class="about-test__block about-test__block-1">
			<div class="about-test__item about-test__item-red">
				<div class="about-test__item-title"><?_e("Ведущий производитель конвейерной ленты и промышленных рукавов в России","rubex");?></div>
			</div>
			<div class="about-test__item about-test__item-last">
				<div class="about-test__item-text">
					<?_e("Наши потребители крупнейшие металлургические и энергетические компании России и зарубежных стран, агропромышленные холдинги, производители автомобилей и инженерных систем.","rubex");?>
				</div>
			</div>
		</div>
		<div class="about-test__block about-test__block-2">
			<div class="about-test__item-wrap-2">
				<div class="about-test__item about-test__item-min">
					<?_e("Полная технологическая цепочка производства, начиная от изготовления резиновых смесей и заканчивая выпуском готовой продукции для всех отраслей промышленности и сельского хозяйства.","rubex");?>
				</div>
			</div>
			<div class="about-test__item about-test__item-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/advanteg.png);"></div>
		</div>
		<div class="about-test__block about-test__block-3">
			<div class="about-test__item about-test__item-min">
				<?_e("Производство продукции в соответствии с ГОСТ, а также по международным стандартам (DIN, SAE)","rubex");?>
			</div>
			<div class="about-test__item about-test__item-min">
				<?_e("Контроль входного сырья и готовой продукции в аккредитированном испытательном центре.","rubex");?>
			</div>
			<div class="about-test__item about-test__item-min about-test__item-last">
				<?_e("Наличие торговых представительств в промышленных центрах","rubex");?>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('template-parts/price-block');?>
<?php
get_footer();