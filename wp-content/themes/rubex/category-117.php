<?php
$current_cat_ID = get_query_var('cat');
get_header('page');
?><div id="primary" class="content-area">
	<main id="main" class="site-main">
  <section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_term_meta($current_cat_ID, 'term_banner_img'), 'full')[0];?>)"></section>
  <div class="container">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>
	<?php
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	?>
  </div>
	<section class="tenders">
		<div class="container">
			<div class="wrapper">
				<div class="tabs">
					<span class="tab tab-year active">2020</span>
					<span class="tab tab-year">2019</span>
					<span class="tab tab-year">2018</span>
					<span class="tab tab-year">2017</span>
					<span class="tab tab-year">2016</span>
					<span class="tab tab-year">2015</span>
					<span class="tab tab-year">2014</span>
					<span class="tab tab-year">2013</span>
				</div>
				<div class="tab_content">
					<div id="tab_item" class="tab_item">
						<?php 
						function filter_where( $where = '' ) {
							$where .= " AND post_date >= '".date("Y")."-01-01' AND post_date < '".date("Y")."-12-31'";
							return $where;
						}
						add_filter( 'posts_where', 'filter_where' );
						$posts = new WP_Query( array("posts_per_page" => 5, "cat" => "117"));
						remove_filter( 'posts_where', 'filter_where' );						
						while($posts->have_posts()) {
								$posts->the_post();
								echo "<div class = 'tenders-item'>";								
									echo "<div class = 'tenders-item__title'>".get_the_title()."</div>";
									echo "<div class = 'tenders-item__text'>".get_the_excerpt()."</div>";
									echo "<a href = '".get_the_permalink()."' class='data-item__link'>Подробнее</a>";
								echo "</div>";	
							}
							wp_reset_postdata();
						?>
						<a href="#" class="data-more-link"><?_e("Смотреть еще","rubex");?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
	</main>
</div>

<?php
get_footer();