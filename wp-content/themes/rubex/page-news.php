<?php

/*
* Template Name: Новости
*/

get_header();
?>
  <section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
  <div class="container">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
		?>
  </div>
  <div class="container">
    <div class="category-wrapper">
      <div class="category-wrapper__cat">Каталог</div>
		<?php get_template_part('template-parts/sidebar-news');?>
	    <div class="product-main">
	    	<div class="news-item">
	    		<div class="news-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/news-2.png);"></div>
	    		<div class="news-item__content">
	    			<div class="news-item__title">Производство футеровок нового типа</div>
	    			<div class="news-item__date">22.04.2020</div>
	    			<div class="news-item__text">
	    				ОАО «Курскрезинотехника» начало производство футеровок для рудоизмельчительных мельниц «Волновой» конструкции.
	    			</div>
	    			<a href="#" class="main-catalog__photo-link">Читать далее</a>
	    		</div>
	    	</div>
	    	<div class="news-item">
	    		<div class="news-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/cat-item-2.jpg);"></div>
	    		<div class="news-item__content">
	    			<div class="news-item__title">Успешные испытания шламовых рукавов</div>
	    			<div class="news-item__date">16.03.2020</div>
	    			<div class="news-item__text">
	    				ООАО «Курскрезинотехника» успешно завершила приемочные испытания шламовых рукавов на базе АО «Олкон»
	    			</div>
	    			<a href="#" class="main-catalog__photo-link">Читать далее</a>
	    		</div>
	    	</div>
	    	<div class="news-item">
	    		<div class="news-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/news-2.png);"></div>
	    		<div class="news-item__content">
	    			<div class="news-item__title">Производство футеровок нового типа</div>
	    			<div class="news-item__date">22.04.2020</div>
	    			<div class="news-item__text">
	    				ОАО «Курскрезинотехника» начало производство футеровок для рудоизмельчительных мельниц «Волновой» конструкции.
	    			</div>
	    			<a href="#" class="main-catalog__photo-link">Читать далее</a>
	    		</div>
	    	</div>
	    	<div class="news-item">
	    		<div class="news-item__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/cat-item-2.jpg);"></div>
	    		<div class="news-item__content">
	    			<div class="news-item__title">Успешные испытания шламовых рукавов</div>
	    			<div class="news-item__date">16.03.2020</div>
	    			<div class="news-item__text">
	    				ООАО «Курскрезинотехника» успешно завершила приемочные испытания шламовых рукавов на базе АО «Олкон»
	    			</div>
	    			<a href="#" class="main-catalog__photo-link">Читать далее</a>
	    		</div>
	    	</div>
	    	<a href="#" class="load-more">Показать еще</a>
		</div>
      </div>
    </div>
  <?php get_template_part('template-parts/price-block');?>
  <?php get_template_part('template-parts/articles');?>
<?php
get_footer();