<?php 
/*
* Template Name: Карьера
*/
get_header();
?>

<div class="container">
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
    ?>
</div>
<section class="career-section">	
	<div class="container">		
	<div class="career-content">			
	
	<h1 class="page-title">Работа в RubEx Group</h1>			<div class="career-text">				<p>Мы рады видеть Вас на странице, посвященной работе и карьере в компании RubEx Group. Здесь Вы сможете ознакомится со свежими вакансиями нашей компании, отправить резюме или узнать контакты отдела кадров.</p>				<p>В нашей компании работают целеустремленные и талантливые люди. Мы не только привлекаем квалифицированные кадры, но и помогаем нашим сотрудникам в обучении, обеспечивая лучшим достойный карьерный рост.</p>				<div class="career-btn">					<a href="<?php echo get_permalink(20514);?>" class="button main-catalog__photo-link">Молодым специалистам</a>					<a href="<?php echo get_permalink(20387);?>" class="button main-catalog__photo-link">Вакансии</a>				</div>			</div>		</div>	</div></section>

<?php get_template_part('template-parts/kariera-contacts');?><?php get_template_part('template-parts/kariera-info');?>

<?php
get_footer();