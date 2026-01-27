<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rubex
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

  <div class="main-bnr__wrapper">
    <?php if($arr_slide = carbon_get_theme_option('main_slider')):?>
      <div class="main-bnr__slider">
        
		<?php $i = 0; foreach($arr_slide as $slide):?>

		  
			<div class="main-bnr__slider-item slide-n<?echo $i;?>" style="background-image: url(<?php echo wp_get_attachment_image_src($slide['image'], 'full')[0]?>)">
				<div class = "sepFilter">
					
					
				</div>
				
				<div class = "sepText">
					<div class = "baner_title">
						<?php echo $slide['banner_title']; ?>
					</div>
					
					<div class = "baner_sub_title">
						<?php echo $slide['banner_sub_title']; ?>
					</div>
				</div>
			</div>
		  
        <?php 
        $i++;
        endforeach;?>
      </div>
    <?php endif;?>


	<div class="main-bnr__informer">
	</div>

	
  </div>
  <section class="main-catalog">
    <div class="container">
      <div class="main-catalog__item">
        <div class="main-catalog__text">
          <h2 class="main-catalog__text-title"><?php echo carbon_get_theme_option('main_catalog_title_1');?></h2>
          <ul class="ul-clean">
            <?php 
              $id_cat = carbon_get_theme_option('main_catalog_id_1');
              $args = array(
                'parent' => $id_cat,
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
            <!-- <li><a href="#">Износостойкая</a></li>
            <li><a href="#">Кислощелочестойкая</a></li>
            <li><a href="#">Маслостойкая</a></li>
            <li><a href="#">Шахтные</a></li>
            <li><a href="#">Общего назначения</a></li> -->
          <?php endif;?>
          </ul>
          <a href="<?php echo get_category_link( $id_cat )?>" class="main-catalog__link"><?_e("Еще","rubex");?></a>
        </div>
        <div class="main-catalog__photo" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_theme_option('main_catalog_img_1'), 'full')[0]?>)">
          <a href="<?php echo Catalog_BELT;?>" class="main-catalog__photo-link"><?_e("Скачать каталог","rubex");?></a>
        </div>
      </div>
      <div class="main-catalog__item main-catalog__item-odd">
        <div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/cat-item-2.jpg)">
          <a href="<?php echo Catalog_RVD;?>" class="main-catalog__photo-link"><?_e("Скачать каталог","rubex");?></a>
        </div>
        <div class="main-catalog__text">
          <h2 class="main-catalog__text-title"><?php echo carbon_get_theme_option('main_catalog_title_2');?></h2>
          <ul class="ul-clean">
            <?php 
              $id_cat = carbon_get_theme_option('main_catalog_id_2');
              $args = array(
                'parent' => $id_cat,
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
          <a href="<?php echo get_category_link( $id_cat )?>" class="main-catalog__link"><?_e("Еще","rubex");?></a>
        </div>
      </div>
      <div class="main-catalog__item">
        <div class="main-catalog__text">
          <h2 class="main-catalog__text-title"><?php echo carbon_get_theme_option('main_catalog_title_3');?></h2>
          <ul class="ul-clean">
            <?php 
              $id_cat = carbon_get_theme_option('main_catalog_id_3');
              $args = array(
                'parent' => $id_cat,
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
          <a href="<?php echo get_category_link( $id_cat )?>" class="main-catalog__link"><?_e("Еще","rubex");?></a>
        </div>
        <div class="main-catalog__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/cat-item-3.jpg)">
          <a href="<?php echo Catalog_HOSE;?>" class="main-catalog__photo-link"><?_e("Скачать каталог","rubex");?></a>
        </div>
      </div>
    </div>
  </section>
  <section class="contacts-block">
    <div class="container">
      <div class="contacts-block__item">
        <div class="contacts-block__item-block">
          <h2 class="contacts-block__title"><?_e("Отдел закупок","rubex");?></h2>
          <div class=""><?_e("Узнайте больше о закупках проводимых RubEx Group","rubex");?></div>
          <a href="<?php echo get_permalink(28);?>" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></a>
        </div>
        <div class="contacts-block__item-block contacts-block__item-last">
          <h2 class="contacts-block__title"><?_e("Реквизиты и документы","rubex");?></h2>
          <div class=""><?_e("Все необходимые документы для оформления договоров","rubex");?></div>
          <a href="<?php echo get_permalink(19795);?>" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></a>
        </div>
      </div>
      <div class="contacts-block__item">
        <div class="contacts-block__item-block">
          <h2 class="contacts-block__title"><?_e("Служба персонала","rubex");?></h2>
          <div class=""><?_e("Узнайте больше о практике и карьере в RubEx Group","rubex");?></div>
          <a href="<?php echo get_permalink(20283);?>" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></a>
        </div>
        
      </div>
      <div class="contacts-block__item contacts-block__item-contact">
        <div class="contacts-block__item-block">
          <h2 class="contacts-block__title"><?_e("Контакт - центр","rubex");?></h2>
          <div class=""><?_e("Позвоните нам на бесплатную горячую линию и мы оперативно ответим на все ваши вопросы","rubex");?>.</div>
        </div>
        <div class="contacts-block__item-block">
          <a href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>" class="contacts-block__phone"><?php echo carbon_get_theme_option('as_phone');?></a>
          <a id = "zvonok_btn" href="<?php echo get_permalink(20);?>" class="main-catalog__photo-link b210"><?_e("Заказать звонок","rubex");?></a>
			<div class="contacts-block__item-block contacts-block__callback">
				<a id = "obrahenie_btn" href="#" class="main-catalog__photo-link b210"><?_e("Отправить сообщение","rubex");?></a>
			</div>
        </div>
      </div>
    </div>
  </section>
  <section class="stat">
    <div class="container">
      <div class="stat-item__min">
        <div class="stat-item__block-mini bg-red">
          <h2><? echo sprintf(__("RubEx Group %sв цифрах и%s фактах","rubex"),"<br/>" ,"<br/>");?></h2>
        </div>
        <div class="stat-item__block-max facts_mission">
          <div class = "">
            <!-- <div class="stat-item__number">1</div> -->
            <h2 class="color-red"><?_e("Rubex – движущая сила Вашего бизнеса","rubex");?></h2>
            <p><?_e("Мы способствуем развитию промышленности и сельского хозяйства, благодаря качеству и надежности резинотехнической продукции, работе высококвалифицированных специалистов и непрерывному внедрению новых технологий","rubex");?>.</p>
            <h2 class="color-red"><?_e("Наша миссия","rubex");?>:</h2>
            <p><?_e("Делать бизнес наших клиентов эффективнее за счет предложения продуктов, обеспечивающих гарантированную транспортировку сред и пород, находясь в постоянном совершенствовании и развитии","rubex");?>.</p>
          </div>
        </div>
      </div>
      <div class="stat-item__max">
        <div class="stat-item__max-block">
          <div class="stat-item__block-mini">
            <div>
              <div class="stat-item__number"><? echo sprintf(__("1 %sместо%s","rubex"),"<span>" ,"</span>");?></div>
              <span class = "podtext"><?_e("среди производителей РТИ в России","rubex");?></span><br/>
			  <span class = "snoska"><?_e("по итогам 2022 года среди производителей РТИ в России без учета производителей шин","rubex");?></span>
            </div>
          </div>
          <div class="stat-item__block-max">
            <div>
              <div class="stat-item__number"><? echo sprintf(__("3 000 %sчеловек%s","rubex"),"<span>" ,"</span>");?></div>
              <span class = "podtext"><?_e("штат квалифицированных специалистов","rubex");?></span>
            </div>
          </div>
        </div>
        <div class="stat-item__max-block">
          <div class="stat-item__block-max">
              <img src="<?php echo get_template_directory_uri();?>/img/shutterstock.jpg" alt="Холдинг RubEx Group в цифрах и фактах">
          </div>
          <div class="stat-item__block-mini bg-gray">
            <div>
              <div class="stat-item__number"><? echo sprintf(__("5 000 %sтонн%s","rubex"),"<span>" ,"</span>");?> </div>
              <span class = "podtext"><?_e("производственные мощности в месяц","rubex");?></span>
            </div>
          </div>
        </div>

        <div class="stat-item__max-block">
          <div class="stat-item__block-mini bg-lightgray">
            <div>
              <div class="stat-item__number"><? echo sprintf(__("35 %sстран%s","rubex"),"<span>" ,"</span>");?></div>
              <span class = "podtext"><?_e("импортеров нашей продукции, доставка во все регионы РФ","rubex");?></span>
            </div>
          </div>
          <div class="stat-item__block-max">
            <div>
              <div class="stat-item__number"><? echo sprintf(__("20 000 %sединиц%s","rubex"),"<span>" ,"</span>");?></div>
              <span class = "podtext"><?_e("ассортимент выпускаемой продукции","rubex");?></span>
            </div>
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
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
