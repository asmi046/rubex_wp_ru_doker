<?php

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
		    <div class="category-wrapper">
		      <div class="product-main">

			    <h1 class="page-title"><?php the_title();?></h1>
				<?php while(have_posts()):
					the_post();?>
					<div class="product-main__descr universal_text_style">
						<?php the_content();?>
					</div>
				<?php endwhile;?>
				</div>
		      </div>
		    </div>
<?php
get_footer();	