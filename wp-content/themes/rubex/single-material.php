<?php
/*
* Template Name: Текстовый материал - блог
* Template Post Type: post, page
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
		<div class="container blog_page">
			
			<div class="blog_sidebar blog_sidebar_left">
				<strong>Содержание</strong>
				<ul class = "blog_sod">
				<?php 
					$galery = carbon_get_the_post_meta( 'blog_sod');
					foreach($galery as $gl) {
				?>
					<li><a href="<?echo $gl["blog_photo_lnk"]?>"><?echo $gl["blog_photo_text"]?></a></li>
				<?
					}
				?>

				</ul>
			</div>

			<div class="blog_content">
				<h1 class="page-title"><?php the_title();?></h1>
				<?php while(have_posts()):
					the_post();?>
					<div class="product-main__descr universal_text_style">
						<?php the_content();?>
					</div>
				<?php endwhile;?>
			</div>

			<div class="blog_sidebar blog_sidebar_right">
			
			<?php 
				$galery = carbon_get_the_post_meta( 'blog_photo');
				foreach($galery as $gl) {
			?>
				<div class="gal_element">
					<a data-lightbox="Gal1" data-title="<?echo $gl["blog_photo_text"]?>" href="<?php echo wp_get_attachment_image_src($gl["blog_photo_img"], 'full')[0];?>"> 
						<img  src="<?php echo wp_get_attachment_image_src($gl["blog_photo_img"], 'full')[0];?>" alt="<?echo $gl["blog_photo_text"]?>">
					</a>
					
					<p class="gal_comment">
						<?echo $gl["blog_photo_text"]?>
					</p>
				</div>
			<?
				}
			?>
			</div>
		
		</div>
<?php
get_footer();	