<?php
/**
 */
get_header('page');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		  <!-- <section class="header-bnr" style="background-image: url(<?php echo get_template_directory_uri();?>/img/R_G_ban.jpg)"></section> -->
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
		  </div>
		  <div class="container">
				<?php the_archive_title( '<h1 class="page-title single-product__title">', '</h1>' );?>
				<div class="category-wrapper">
					<?php get_template_part('template-parts/sidebar-product-cat');?>
				  <div class="category-list">
					<?php 
					include("sortBlk.php");
					while(have_posts()):
						the_post();
						get_template_part('template-parts/products', 'loop');
						?>
					<?php endwhile;?>
				  <?php the_posts_pagination();?>
				  </div>
				</div>
		  </div>
		  <?php get_template_part('template-parts/price-block');?>
		  <?php get_template_part('template-parts/articles');?>
	</main>
</div>

<?php
get_footer();