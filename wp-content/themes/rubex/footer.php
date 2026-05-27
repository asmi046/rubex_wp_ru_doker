<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rubex
 */

?>

	</div><!-- #content -->

  <footer class="footer">
    <div class="container">
      <div class="logo" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_theme_option('as_logo_white'), 'full')[0];?>)"></div>
      <?php footer_menu();?>
      <a href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>" class="footer-phone"><?php echo carbon_get_theme_option('as_phone');?></a>
      <div class="footer-contacts">
        <ul class="footer-lang">
          <?php //pll_the_languages(array('show_flags'=>0,'show_names'=>1, 'hide_if_empty' =>0, 'display_names_as' => 'slug'));?>
        </ul>
        <div class="footer-soc">

          <a href="<?php echo carbon_get_theme_option('as_vk');?>" target="_blank" style="background-image: url(<?php echo get_template_directory_uri();?>/img/vk.svg)"></a>
        </div>
      </div>
    </div>
  </footer>
  <section class="footer-bottom">
      
    <div class="container">
    <hr>  
    <a href="<?php echo get_permalink(19641);?>">Политика в отношении обработки персональных данных и обеспечения конфиденциальности</a>
      <br>
      <a href="<?php echo get_permalink(23478);?>">СОГЛАСИЕ НА ОБРАБОТКУ ПЕРСОНАЛЬНЫХ ДАННЫХ</a>
    </div>
  </section>
</div><!-- #page -->
<div class="footer-fixed__menu">
  <a onclick="javascript:history.back(); return false;" href="#">
    <span class="footer-fixed__menu-img" style="background-image: url(<?php echo get_template_directory_uri();?>/img/back-1.svg);"></span>
    <span class="footer-fixed__menu-text"><?_e("Назад","rubex");?></span>
  </a>
  <a href="#" class="top-btn">
    <span class="footer-fixed__menu-img" style="background-image: url(<?php echo get_template_directory_uri();?>/img/arrow-top.svg);"></span>
    <span class="footer-fixed__menu-text"><?_e("Наверх","rubex");?></span>
  </a>
  <a href="<?php echo get_permalink(19795);?>">
    <span class="footer-fixed__menu-img" style="background-image: url(<?php echo get_template_directory_uri();?>/img/home-run.svg);"></span>
    <span class="footer-fixed__menu-text"><?_e("Реквизиты","rubex");?></span>
  </a>
  <a href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>">
    <span class="footer-fixed__menu-img" style="background-image: url(<?php echo get_template_directory_uri();?>/img/phone-menu.svg);"></span>
    <span class="footer-fixed__menu-text"><?_e("Звонок","rubex");?></span>
  </a>
  <a href="#" class="open-menu-link">
    <span class="footer-fixed__menu-img" style="background-image: url(<?php echo get_template_directory_uri();?>/img/menu-1.svg);"></span>
    <span class="footer-fixed__menu-text"><?_e("Меню","rubex");?></span>
  </a>
</div>

  <script>
	//alert("ID: <?php echo $post->ID;?>");
</script>

<?php 
  get_template_part('template-parts/cookies', 'banner');
?>
 
<?php wp_footer(); ?>

</body>
</html>
