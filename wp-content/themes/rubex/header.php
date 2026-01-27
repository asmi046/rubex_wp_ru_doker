<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rubex
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <meta name="yandex-verification" content="33e5bc9305e0e0c9" />

  <link rel="icon" type="image/png" sizes="256x256" href="<?php echo get_template_directory_uri();?>/img/favicon/icon256.png">
  <link rel="icon" type="image/png" sizes="128x128" href="<?php echo get_template_directory_uri();?>/img/favicon/icon128.png">
  <link rel="icon" type="image/png" sizes="64x64" href="<?php echo get_template_directory_uri();?>/img/favicon/icon64.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/img/favicon/icon32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/img/favicon/icon16.png">
	<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-33788440-3', 'auto');
  ga('send', 'pageview');

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(23226475, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/23226475" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<?include ("modal-win.php");?>

<?php wp_body_open(); ?>
<div id="page" class="site">
  <div class="mobile-menu__wrapper">
    <div class="mobile-menu__overlay"></div>
    <div class="mobile-menu">  
      <?php mobile_menu();?>
    </div>
  </div>
  
  
  <header class="header">
    <div class="header-top">
      <div class="container">
        <div class="mobile_gray_header">
			<a class = "shop" href = "<? echo carbon_get_theme_option('as_link_shop'); ?>"><?_e("Магазин РТИ","rubex");?></a>	<a class = "phone" href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>"><?php echo carbon_get_theme_option('as_phone');?></a>
		</div>
        <?php main_menu();?>
      </div>
    </div>
	
    <div class="header-bottom">
      <div class="container">
        <a href="<?php echo home_url('/');?>" class="logo" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_theme_option('as_logo'), 'full')[0];?>)"></a>
        <div class="header-phone__wrap">
          <a href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', carbon_get_theme_option('as_phone'))?>" class="header-phone"><?php echo carbon_get_theme_option('as_phone');?></a>
          <div class="header-free"><?_e("Бесплатный звонок по России","rubex");?></div>
        </div>
        <ul class="header-lang ul-clean">
          <?php //pll_the_languages(array('show_flags'=>0,'show_names'=>1, 'hide_if_empty' =>0, 'display_names_as' => 'slug'));?>
			<li><a href="#">Ru</a></li>
		  
		  <?php if((is_home() || is_front_page()) && carbon_get_theme_option('site_en')):?>
            <li class="dark-lang"><a href="<?php echo carbon_get_theme_option('site_en');?>">En</a></li>
          <?php elseif(carbon_get_the_post_meta('page_en')):?>
            <li class="dark-lang"><a href="<?php echo carbon_get_the_post_meta('page_en');?>">En</a></li>
          <?php else:?>
            <li class="dark-lang"><a href="#">En</a></li>
          <?php endif;?>
        
		</ul>
      </div>
    </div>
  </header>

  <?php get_template_part('template-parts/menu');?>


