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
		<h1 class="page-title"><?_e("Стандарты производства","rubex");?></h1>
		<? echo category_description()?>
	</div>
  
  
	<section id = "peredel">
		<div class="container">
		
	
	   
		</div>
	</section>
  
  <?php get_template_part('template-parts/price-block');?>
  <?php get_template_part('template-parts/articles');?>

	</div>
	</main>
</div>

<?php
get_footer();