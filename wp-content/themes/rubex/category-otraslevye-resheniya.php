<?php
/**
 */
$current_cat_ID = get_query_var('cat');
$active = '';
get_header('page');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_term_meta($current_cat_ID, 'term_banner_img'), 'full')[0];?>)"></section>
	<div class="container">
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>
		<h1 class="page-title"><?_e("Отраслевые решения для промышленности","rubex");?></h1>
		<p><?_e("Комплексные решения для различных отраслей промышленности от RubEx Group. Наша компания практикует комплексный подход и старается закрыть потребности в комплектующих и материалах для различных отраслей промышленности.","rubex");?></p>
		<p>Мы заботимся об удобстве наших покупателей.</p>
	</div>
  
  
	<section id = "peredel">
		<div class="container">
		
		<div class="main-catalog__item main-catalog__item-odd peredel_item">
			<div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/peredels/metalurgia.jpg)"></div>
			
			<div class="main-catalog__text">
			  <h2 class="main-catalog__text-title"><? echo sprintf(__("Металургическая %sпромышленность","rubex"),"<br/>");?></h2>
			  <ul class="ul-clean">
				<?php 
				  $args = array(
					'parent' => 281,
					'number' => 4,
					'hide_empty' => 0,
					'orderby' => 'meta_value_num',
					'meta_key' => '_term_position',
				  );
				  $categories = get_categories($args);
				  if($categories):
					foreach( $categories as $cat ):
				?>
				  <li><a href="<?php echo get_category_link( $cat->term_id )?>"><?php echo $cat->name;?></a></li>
				<?php endforeach;?>
			  <?php endif;?>
			  </ul>
			 <a href="<?php echo get_category_link( 281 )?>" class="trueButton"><?_e("Все переделы","rubex");?></a>
			</div>
		</div>
		
		
		<div class="main-catalog__item peredel_item">
			<div class="main-catalog__text">
			  <h2 class="main-catalog__text-title"><? echo sprintf(__("Цементная %sпромышленность","rubex"),"<br/>");?></h2>
			  <ul class="ul-clean">
				<?php 
				  $id_cat = carbon_get_theme_option('main_catalog_id_1');
				  $args = array(
					'parent' => 283,
					'number' => 3,
					'hide_empty' => 0,
					'orderby' => 'meta_value_num',
					'meta_key' => '_term_position',
				  );
				  $categories = get_categories($args);
				  if($categories):
					foreach( $categories as $cat ):
				?>
				  <li><a href="<?php echo get_category_link( $cat->term_id )?>"><?php echo $cat->name;?></a></li>
				<?php endforeach;?>
			 
			  <?php endif;?>
			  </ul>
			  <a href="<?php echo get_category_link( 283 )?>" class="trueButton"><?_e("Все переделы","rubex");?></a>
			</div>
			<div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/peredels/cementnaya.jpg)"></div>
		</div>
		  
		<div class="main-catalog__item main-catalog__item-odd peredel_item">
			<div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/peredels/neftianaya.jpg)"></div>
			
			<div class="main-catalog__text">
			  <h2 class="main-catalog__text-title"><? echo sprintf(__("Нефтяная %sпромышленность","rubex"),"<br/>");?></h2>
			  <ul class="ul-clean">
				<?php 
				  $args = array(
					'parent' => 281,
					'number' => 4,
					'hide_empty' => 0,
					'orderby' => 'meta_value_num',
					'meta_key' => '_term_position',
				  );
				  $categories = get_categories($args);
				  if($categories):
					foreach( $categories as $cat ):
				?>
				  <li><a href="<?php echo get_category_link( $cat->term_id )?>"><?php echo $cat->name;?></a></li>
				<?php endforeach;?>
			  <?php endif;?>
			  </ul>
			 <a href="<?php echo get_category_link( 281 )?>" class="trueButton"><?_e("Все переделы","rubex");?></a>
			</div>
		</div>
		
		
		<div class="main-catalog__item peredel_item">
			<div class="main-catalog__text">
			  <h2 class="main-catalog__text-title"><? echo sprintf(__("Угольная %sпромышленность","rubex"),"<br/>");?></h2>
			  <ul class="ul-clean">
				<?php 
				  $id_cat = carbon_get_theme_option('main_catalog_id_1');
				  $args = array(
					'parent' => 282,
					'number' => 3,
					'hide_empty' => 0,
					'orderby' => 'meta_value_num',
					'meta_key' => '_term_position',
				  );
				  $categories = get_categories($args);
				  if($categories):
					foreach( $categories as $cat ):
				?>
				  <li><a href="<?php echo get_category_link( $cat->term_id )?>"><?php echo $cat->name;?></a></li>
				<?php endforeach;?>
			 
			  <?php endif;?>
			  </ul>
			  <a href="<?php echo get_category_link( 282 )?>" class="trueButton"><?_e("Все переделы","rubex");?></a>
			</div>
			<div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/peredels/ugolnaya.jpg)"></div>
		</div>  
		  
		<div class="main-catalog__item main-catalog__item-odd  peredel_item">
			<div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/peredels/stroitelstvo.jpg)"></div>
			
			<div class="main-catalog__text">
			  <h2 class="main-catalog__text-title"><? echo sprintf(__("Строительная %sпромышленность","rubex"),"<br/>");?></h2>
			  <ul class="ul-clean">
				<?php 
				  $args = array(
					'parent' => 286,
					'number' => 4,
					'hide_empty' => 0,
					'orderby' => 'meta_value_num',
					'meta_key' => '_term_position',
				  );
				  $categories = get_categories($args);
				  if($categories):
					foreach( $categories as $cat ):
				?>
				  <li><a href="<?php echo get_category_link( $cat->term_id )?>"><?php echo $cat->name;?></a></li>
				<?php endforeach;?>
			  <?php endif;?>
			  </ul>
			 <a href="<?php echo get_category_link( 286 )?>" class="trueButton"><?_e("Все переделы","rubex");?></a>
			</div>
		</div>
		
		
		<div class="main-catalog__item peredel_item">
			<div class="main-catalog__text">
			  <h2 class="main-catalog__text-title"><? echo sprintf(__("Сельское %sхозяйство","rubex"),"<br/>");?></h2>
			  <ul class="ul-clean">
				<?php 
				  $id_cat = carbon_get_theme_option('main_catalog_id_1');
				  $args = array(
					'parent' => 285,
					'number' => 3,
					'hide_empty' => 0,
					'orderby' => 'meta_value_num',
					'meta_key' => '_term_position',
				  );
				  $categories = get_categories($args);
				  if($categories):
					foreach( $categories as $cat ):
				?>
				  <li><a href="<?php echo get_category_link( $cat->term_id )?>"><?php echo $cat->name;?></a></li>
				<?php endforeach;?>
			 
			  <?php endif;?>
			  </ul>
			  <a href="<?php echo get_category_link( 285 )?>" class="trueButton"><?_e("Все переделы","rubex");?></a>
			</div>
			<div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/peredels/selhoz.jpg)"></div>
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