<?php
/*
* Template Name: Медиа-центр
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
	
	<h1 class="section-title"><?_e("Добро пожаловать в медиацентр Rubex Group","rubex");?> </h1>    
	
	<p><?_e("В данном разделе Вы найдете все необходимые промо-материалы по продукции, выпускаемой нашим Холдингом.","rubex");?></p>	  
  </div>
 <section class="brochure">
    <div class="container">
      <div class="brochure-header">
        <h2 class="section-title"><?_e("Каталоги","rubex");?></h2>
        <!-- <a href="#" class="main-catalog__photo-link more-catalog">Смотреть все</a> -->
      </div>
      <?php $arr_rvd = carbon_get_the_post_meta('catalog_media');
      if($arr_rvd):
        $inc = 0;
        $slide = '';
        $slide_class = '';
        $arr_const = get_defined_constants();?>
      <div class="brochure-wrapper">
          <?php foreach($arr_rvd as $item):
            if($inc >= 5):
              $slide_class = 'item-slide';
              $slide = 'display:none;';
            endif;?>
            <div class="brochure-item <?php echo $slide_class;?>" style="<?php echo $slide;?>">
              <a href="<?php echo $arr_const[$item['text_const']]?>" target="_blank" class="brochure-item__photo" style="background-image: url(<?php echo wp_get_attachment_image_src($item['img'], 'full')[0]?>);"></a>
              <div class="brochure-item__title"><?php echo $item['name']?></div>
              <a href="<?php echo $arr_const[$item['text_const']]?>" target="_blank" class="main-catalog__photo-link"><?_e("Скачать","rubex");?></a>
            </div>
          <?php $inc++; $slide=''; endforeach;?>
      </div>
      <?php endif;?>
      <!-- <a href="#" class="main-catalog__photo-link more-catalog">Смотреть все</a> -->
    </div>
</section>
<section class="brochure graySection">
    <div class="container">
      <div class="brochure-header">
        <h2 class="section-title"><?_e("Брошюры","rubex");?></h2>
      </div>
      <?php $arr_rvd = carbon_get_the_post_meta('brochure_media');
      if($arr_rvd):
        $inc = 0;
        $slide = '';
        $slide_class = '';?>
        <div class="brochure-wrapper">
          <?php foreach($arr_rvd as $item):
            if($inc >= 5):
              $slide_class = 'item-slide';
              $slide = 'display:none;';
            endif;?>
            <div class="brochure-item <?php echo $slide_class;?>" style="<?php echo $slide;?>">
              <a href="<?php echo $arr_const[$item['text_const']]?>" target="_blank" class="brochure-item__photo" style="background-image: url(<?php echo wp_get_attachment_image_src($item['img'], 'full')[0]?>);"></a>
              <div class="brochure-item__title"><?php echo $item['name']?></div>
              <a href="<?php echo $arr_const[$item['text_const']]?>" target="_blank" class="main-catalog__photo-link"><?_e("Скачать","rubex");?></a>
            </div>
          <?php $inc++; $slide=''; endforeach;?>
        </div>
      <?php endif;?>
      <a href="#" class="main-catalog__photo-link more-catalog"><?_e("Смотреть все","rubex");?></a>
    </div>
</section>
<section class="industry">
    <div class="container">
      <div class="brochure-header">
        <h2 class="section-title"><?_e("Отраслевые решения","rubex");?></h2>
      </div>
      <?php $arr_rvd = carbon_get_the_post_meta('industry_media');
      if($arr_rvd):
        $inc = 0;
        $slide = '';
        $slide_class = '';?>
      <div class="brochure-wrapper">
          <?php foreach($arr_rvd as $item):
            if($inc >= 5):
              $slide_class = 'item-slide';
              $slide = 'display:none;';
            endif;?>
            <div class="brochure-item <?php echo $slide_class;?>" style="<?php echo $slide;?>">
              <a href="<?php echo $arr_const[$item['text_const']]?>" target="_blank" class="brochure-item__photo" style="background-image: url(<?php echo wp_get_attachment_image_src($item['img'], 'full')[0]?>);"></a>
              <div class="brochure-item__title"><?php echo $item['name']?></div>
              <a href="<?php echo $arr_const[$item['text_const']]?>" target="_blank" class="main-catalog__photo-link"><?_e("Скачать","rubex");?></a>
            </div>
          <?php $inc++; $slide=''; endforeach;?>
      </div>
      <?php endif;?>
      <a href="#" class="main-catalog__photo-link more-catalog"><?_e("Смотреть все","rubex");?></a>
    </div>
</section>

<section class="brand graySection">
    <div class="container">
      <h2 class="section-title"><?_e("Фотобанк","rubex");?></h2>
      <?php $arr_photo = carbon_get_the_post_meta('photo_media');
      if($arr_photo):
        $inc = 0;
        $slide = '';
        $slide_class = '';?>
      <div class="brand-wrapper photo-wrapper">
        <?php foreach($arr_photo as $item):
          if($inc > 4):
            $slide = 'display: none';
            $slide_class = 'item-slide';
          endif;		?>
        <div class="brand-item <?php echo $slide_class;?>" style="<?php echo $slide;?>">
          <div class="brand-item__photo" style="background-image: url(<?php echo wp_get_attachment_image_src($item['img'], 'medium')[0];?>)"></div>
          <div class="brand-item__text brand-item__text-photo"><?php echo $item['name']?></div>
          <div class="brand-item__text brand-item__text_size"><?php echo $item['size']?></div>
          <div class="brand-item__text brand-item__text_param"><?php echo $item['paremeters']?></div>
          <a target="_blank" href="<?php echo $item['file']?>" class="main-catalog__photo-link"><?_e("Скачать","rubex");?></a>
        </div>
        <?php if($inc === 5):?>
          <!-- <div class="more-link__wrapper">
            <a href="#" class="main-catalog__photo-link more-link">Показать еще</a>
          </div> -->
        <?php endif;?>
      <?php $slide = ''; $inc++; endforeach;?>
    </div>
    <?php endif;?>
      <a href="#" class="main-catalog__photo-link more-catalog"><?_e("Смотреть все","rubex");?></a>
    </div>
</section><section class="video-section">	  <div class="container">	  	<h2 class="section-title"><?_e("Видео","rubex");?></h2>      

<?php $arr_video = carbon_get_the_post_meta('video_media');      if($arr_video):        $inc = 0;        $slide = '';        $slide_class = '';?>    <div class="container">  	  	<div class="video-wrapper">          <?php foreach($arr_video as $item):            if($inc == 3):              $slide_class = 'item-slide';              $slide = 'display:none;';            endif;?>    	  		<div class="video-item <?php echo $slide_class;?>" style="<?php echo $slide;?>">    	  			<?php echo $item['iframe']?>    	  			<div class="video-item__title"><?php echo $item['title']?></div>    	  		</div>          <?php $inc++; endforeach;?>  	  	</div>  	  	<a href="#" class="main-catalog__photo-link video-more">Все видео</a>    </div>      <?php endif;?>	</div></section>
<section class="brand">
  	<div class="container">
  		<h2 class="section-title"><?_e("Бренд","rubex");?></h2>
  		<div class="">
  			<p><?_e("Название «Rubex Group» наиболее полно отражает функции Холдинга, как управляющей компании, отражает отраслевую принадлежность и выраженную миссию предприятия.","rubex");?></p>
  			<p><?_e("«Rubex» Group образовано от англ. rubber (резина) и excellent (совершенство, совершенная). Отдельно часть названия Холдинга означает «король» (от лат. bex), а приставка «ru» воспринимается как общепринятое сокращение – «Российская Федерация». Таким образом, бренд компании отражает наше стремление производить совершенный резинотехнический продукт для максимального удовлетворения требований наших клиентов.","rubex");?></p>
  		</div>
      <?php $arr_logo = carbon_get_the_post_meta('logo_media');
      if($arr_logo):
        $inc = 0;
        $slide = '';?>
  		<div class="brand-wrapper">
        <?php foreach($arr_logo as $item): ?>
  			<div class="brand-item" style="<?php echo $slide;?>">
  				<div class="brand-item__photo" style="background-image: url(<?php echo wp_get_attachment_image_src($item['logo'], 'full')[0];?>)"></div>
  				<div class="brand-item__text_logo"><a target="_blank" href="<?php echo wp_get_attachment_image_src($item['jpeg'], 'full')[0];?>">JPEG</a> / <a target="_blank" href="<?php echo wp_get_attachment_image_src($item['png'], 'full')[0];?>">PNG</a> / <a href="<?php echo wp_get_attachment_image_src($item['tif'], 'full')[0];?>">TIF</a></div>
  				<a target="_blank" href="<?php echo wp_get_attachment_image_src($item['jpeg'], 'full')[0];?>" class="main-catalog__photo-link"><?_e("Скачать","rubex");?></a>
  			</div>
      <?php $slide = ''; $inc++; endforeach;?>
  		</div>
    <?php endif;?>
  	</div>
  </section>
<?php
get_footer();