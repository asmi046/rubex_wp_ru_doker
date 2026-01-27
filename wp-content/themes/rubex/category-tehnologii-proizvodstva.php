<?php
/**
 * Категория - Стандарты производства
 */
$current_cat_ID = get_query_var('cat');
$active = '';
get_header('page');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<div class="container">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>
		<h1 class="page-title"><?_e("Технологии производства","rubex");?></h1>
		<? echo category_description()?>
	</div>
  
  
	<section id = "peredel">
		<div class="container">
		
			<div class="main-catalog__item main-catalog__item-odd peredel_item">
				<div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/belt-tech.jpg)"></div>
				
				<div class="main-catalog__text">
				<h2 class="main-catalog__text-title"><? echo sprintf(__("Производство %sконвейерных лент","rubex"),"<br/>");?></h2>
				<ul class="ul-clean">
					<?php 
						$galery = carbon_get_post_meta(get_the_ID(), 'blog_sod');
						foreach($galery as $gl) {
					?>
						<li><a href="<?echo get_the_permalink( 21881 ).$gl["blog_photo_lnk"]?>"><?echo $gl["blog_photo_text"]?></a></li>
					<?
						}
					?>
				</ul>
				<a href="<?php echo get_the_permalink( 21881 )?>" class="trueButton"><?_e("Читать полностью","rubex");?></a>
				</div>
			</div>
	   
		</div>
	</section>
  
  <?php get_template_part('template-parts/price-block');?>
  <?php get_template_part('template-parts/articles');?>

	</div>
	</main>
</div>

<?php
get_footer();