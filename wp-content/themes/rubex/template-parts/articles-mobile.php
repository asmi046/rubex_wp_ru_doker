  <section class="articles">
    <div class="container">
      <?php get_template_part('template-parts/mobile-app');?>
      <a href="<?php echo get_permalink(20283);?>" class="articles-item articles-item-1" style="background-image: url(<?php echo get_template_directory_uri();?>/img/about-art-1.png)">
        <div class="articles-item__block">
          <div class="articles-item__title"><?_e("Карьера в RubEx Group","rubex");?></div>
          <span href="#" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></span>
        </div>
      </a>
      <div class="articles-wrapper">
        <a href="<?php echo get_permalink(19795);?>" class="articles-min">
          <div class="articles-min__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/art-4.png)"></div>
          <div class="articles-min__content bg-red-block">
            <div class="articles-min__title"><?_e("Реквизиты и документы","rubex");?></div>
            <span href="#" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></span>
          </div>
        </a>
        <a href="<?php echo get_permalink(28);?>"  class="articles-min">
          <div class="articles-min__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/art-5.png)"></div>
          <div class="articles-min__content">
            <div class="articles-min__title"><?_e("Отдел закупок","rubex");?></div>
            <span href="#" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></span>
          </div>
        </a>
      </div>
      <div class="articles-wrapper__bottom">
        <a href="<?php echo get_permalink(19522);?>" class="articles-min">
          <div class="articles-min__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/Flexco.jpg)"></div>
          <div class="articles-min__content">
            <div class="articles-min__title"><?_e("Сервисный центр","rubex");?></div>
            <span href="<?php echo get_permalink(19522);?>" class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></span>
          </div>
        </a>
        <a href="<?php echo get_permalink(19419);?>" class="articles-min">
          <div class="articles-min__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/img/art-5.jpg)"></div>
          <div class="articles-min__content">
            <div class="articles-min__title"><?_e("Испытательный центр","rubex");?></div>
            <span class="main-catalog__link"><?_e("Перейти в раздел","rubex");?></span>
          </div>
        </a>
      </div>
    </div>
  </section>