<?php
/*
* Template Name: Учебный центр
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

<div class="container" style="margin-bottom: 40px;">
  	<h1 class="page-title"><?php the_title();?></h1>
    <div class="side_format">
		<div class="side_content">
			<?php 
				the_content();
			?>
		</div>
		
		<div class="side_bar">
			<h3>Контакты учебного центра ООО «Рабэкс Трэйд»</h3>
			<p>Тел.: <a href="tel:+74712381860">+7 4712 38-18-60</a></p>
			<p>E-mail: <a href="mailto:pogozihvv@rubexgroup.ru">pogozihvv@rubexgroup.ru</a></p>
			<p>г. Курск, пр-т Ленинского Комсомола, д. 2, пом. I, каб. 312</p>
			<h3>Погожих Виктория Викторовна</h3>
			<p class="dolg">руководитель отдела обучения и развития корпоративной культуры</p>
			<img src="<?php echo get_template_directory_uri();?>/img/pogozgih.jpg" alt="руководитель учебного центра RubEx">
			<p>
				<a href="?special_version=Y" class="slv_login bvi-open">Версия для слабовидящих</a>
			</p>

			<h3>Сведения об образовательной организации</h3>

			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Устав RubEx Trade</div>						
						<a href="<?php echo uc_ustav;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>

			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Положение о порядке организации образовательной деятельности</div>						
						<a href="<?php echo uc_pol_por;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>
			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Положение об итоговой атттестации</div>						
						<a href="<?php echo uc_pol_ats;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>
			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Положение об организации обучения лиц с ограниченными возможностями</div>						
						<a href="<?php echo uc_pol_uch;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>
			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Лицензия на ведение образовательной деятельности</div>						
						<a href="<?php echo uc_lic;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>
			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Положение об Учебном центре</div>						
						<a href="<?php echo uc_pol_uc;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>
			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Положение о порядке оказания платных образовательных услуг</div>						
						<a href="<?php echo uc_pol_ok;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>
			<div class="req-wrapper_uc">					
					<div class="data-item">						
						<div class="data-item__text">Правила внутреннего распорядка слушателей</div>						
						<a href="<?php echo uc_rasp;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
			</div>
		</div>
	</div>
	
</div>

<section class="data-section">
			<div class="container">
				<div class="data-wrapper">
				
					<div class="data-wrapper__item data-wrapper__item-max">
						<h2 class="data-wrapper__title"><? echo sprintf(__("Документы учебного%s центра","rubex"),"<br/>");?></h2>
						<div class="data-wrapper__max">
							
                            <?php if($arr_slide = carbon_get_the_post_meta('rg_teach_center_docs')):?>
                                <?php foreach($arr_slide as $sert):?>
                                    <div class="data-item">						
                                        <div class="data-item__text"><?php echo $sert['title']; ?></div>						
                                        <a target="_blank" href="<?php echo $sert['file']; ?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
                                    </div>		
                                <?php endforeach;?>
                            <?php endif;?>
						</div>
					</div>
				</div>
			</div>
</section>


<section class="articles">
    <div class="container">
      
		<?
			$posts = get_posts( array( 
					'numberposts' => 1,
					'category'    => 173,
					'order'       => 'DESC'
			));
			
		?>
	  
	  <!-- <div class="articles-wrapper articles-wrapper-news"> -->
      <!-- <div class = "shadow_layer"></div> -->
      <a class="articles-wrapper articles-wrapper-news" href = "<? echo get_the_permalink($posts[0]->ID); ?>">
			  <div class="articles-item" >
        <!-- style="background-image: url(<?php echo get_the_post_thumbnail_url( $posts[0]->ID, "full" );?>)" -->
          <div class = "shadow_layer"></div>
          <img src="<?php echo get_the_post_thumbnail_url( $posts[0]->ID, "full" );?>" alt="<? echo $posts[0]->post_title; ?>">

          <div class="articles-item__block">
				    <h2 class="articles-item__title"><? echo $posts[0]->post_title; ?></h2>
				    <span class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></span>
				  </div>
			  </div>
		  </a>
	  <!-- </div> -->
	  
      <div class="articles-wrapper articles-wrapper-razdels">
        <a href = "<? echo get_the_permalink(19513); ?>">
          <div class="articles-min articles-min-marginbottom">
            <div class="articles-min__photo">
              <img src="<?php echo get_template_directory_uri();?>/img/art-2.jpg" alt="Медиацентр RubEx Group">
            </div>
            <div class="articles-min__content">
              <h2 class="articles-min__title"><?_e("Медиа","rubex");?></h2>
              <div class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></div>
            </div>
          </div>
		    </a>
		    
        <a href = "<?php echo get_category_link(248);?>">
          <div class="articles-min">
            <div class="articles-min__photo">
              <img src="<?php echo get_template_directory_uri();?>/img/cat-item-3.jpg" alt="Проекты осуществленные специалистами RubEx">
            </div>
            <div class="articles-min__content">
              <h2 class="articles-min__title"><?_e("Осуществленные проекты","rubex");?></h2>
              <div class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></div>
            </div>
          </div>
		    </a>
        
      </div>
    </div>
  </section>




  
<?php
get_footer();