<?php
/*
* Template Name: Осуществленный проект
* Template Post Type: post
*/ 
get_header();
?><div id="content" class="site-content">
		  <div class="container">
		    <?php
				if ( function_exists('yoast_breadcrumb') ) {
				  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>
		  </div>
		  <div class="container">
				<?php while(have_posts()):
					the_post();?>
					<div class="single-news__content">
						<div class="single-news__text">
						    <h1 class="page-title"><?php the_title();?></h1>
						    <div class="date"><?php echo get_the_date('d.m.Y');?></div>
							<?php the_content();?>
						</div>
						
					</div>
				<?php endwhile;?>

		  </div>
<?php
get_footer();	