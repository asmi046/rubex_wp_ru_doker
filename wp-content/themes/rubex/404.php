<?php
/*
* Template Name: Страница благодарности
*/
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		  <section class="header-bnr" style="background-image: url(<?echo get_template_directory_uri();?>/img/404.jpg)"></section>
			
			<div class="container">
				
				  <div class="container">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
				  </div>
					<h1>404</h1>
					<p><?_e("К сожалению эта страница не найдена","rubex");?>.</p>
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
