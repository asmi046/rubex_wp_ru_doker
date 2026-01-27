<?php
/*
* Template Name: Страница благодарности
*/
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		  <section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
			
			<div class="container">
				
				  <div class="container">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
				  </div>
					<h1><?_e("Благодарим за обращение","rubex");?></h1>
					<p><?_e("Ваша заявка принята мы свяжемся с Вами в ближайшее время!","rubex");?></p>
					<br/>
					<br/>
					<br/>
				<?php
				while ( have_posts() ) :
					
					the_post();

					//get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
			
			<?php get_template_part('template-parts/price-block');?>
			<?php get_template_part('template-parts/articles');?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
