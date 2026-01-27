<?php
/*
* Template Name: Реквизиты
*/
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
	
<section class="header-bnr" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
  <div class="container">
    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>
  </div>
    
	<div class="container">
			<h1 class="page-title single-product__title"><?_e("Реквизиты и документы","rubex");?></h1>
	</div>
	
	<div class="container">
    <div class="category-wrapper">
     
				<?php get_template_part('template-parts/sidebar-rekvisit');?>
	    		<div class="product-main">						
				
				<!--<h1 class="h1-contacts">Реквизиты и документы</h1>			-->
			
			<div class="mapLine-wrap documents-wraper" id="mapLine-wrap-1">
				<div class = "reqShare" id = "rgshare">
					<!-- <p><strong><?_e("Генеральный директор","rubex");?>:</strong> <?_e("Бормотов Сергей Николаевич, действующий на основании Устава","rubex");?>.<p/> -->
					<p><strong><?_e("Юридический и фактический адрес","rubex");?>:</strong> 123610, город Москва, Краснопресненская набережная, д. 12, офис 1002<p/>
					<p><strong><?_e("ИНН","rubex");?></strong> 7703787360 <strong><?_e("КПП","rubex");?></strong> 770301001 <p/>				<p><strong><?_e("р/с в рублях","rubex");?>:</strong> <?_e("№40702810200001452663 в ЗАО «Райффайзенбанк» г.Москва","rubex");?>,</p> 
					<p><strong><?_e("БИК","rubex");?></strong> 044525700</p>
					<p><strong><?_e("к/с","rubex");?></strong> 30101810200000000700</p>
					<p><strong><?_e("ОКПО","rubex");?></strong> 17393765</p>				
		    	</div>
				
				<div class = "share_zonn">
					<a href = "#" class = "shareButton" data-shareblkname = "rgshare"> <?_e("Поделиться реквизитами","rubex");?></a>
				</div>
				
				<h2><?_e("Учредительные документы RubEx Group","rubex");?></h2>
		    	<div class="req-wrapper">
			    						<div class="data-item">
						<div class="data-item__text"><?_e("Cвидетельство ИНН ООО Рабэкс Групп","rubex");?></div>
						<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_rg_inn1');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>
					</div>
			    	<div class="data-item">
						<div class="data-item__text"><?_e("Cвидетельство ОГРН ООО Рабэкс Групп","rubex");?></div>
						<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_rg_ogrn');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>
					</div>
			    	<div class="data-item">
						<div class="data-item__text"><?_e("Устав Рабэкс Групп 10 09 2013","rubex");?></div>
						<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_rg_ustav');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>
					</div>
		    	</div>
			</div>
			<div class="mapLine-wrap documents-wraper" id="mapLine-wrap-2">				
				<div class = "reqShare" id = "krtshare">
					<!-- <p><strong><?_e("Заместитель генерального директора-управляющий директор ООО «Рабэкс Групп»","rubex");?>:</strong> <?_e("Маркелов Сергей Владимирович, действующий на основании доверенности  №30юр от 01.01.2020г.","rubex");?><p/>				 -->
					<p><strong><?_e("Юридический и фактический адрес","rubex");?>:</strong> <?_e("305018, РФ, город Курск, проспект Ленинского комсомола, 2","rubex");?><p/>				
					<p><strong><?_e("ИНН","rubex");?></strong> 4632001454 <strong><?_e("КПП","rubex");?></strong> 463201001 <p/>				
					<p><strong><?_e("р/с в рублях","rubex");?>:</strong>40702810418250000406 <?_e("Филиал «Центральный» Банка ВТБ (ПАО) в г. Москве","rubex");?></p> 				
					<p><strong><?_e("БИК","rubex");?></strong> 044525411</p>				<p><strong><?_e("к/с","rubex");?></strong> 30101810145250000411</p>				
					<p><strong><?_e("ОКПО","rubex");?></strong> 00149245</p>						    	
				</div>
				
				<div class = "share_zonn">
					<span class = "shareButton" data-shareblkname = "krtshare"> <?_e("Поделиться реквизитами","rubex");?></span>
				</div>
				
				<h2><?_e('Учредительные документы ОАО "Курскрезинотехника"',"rubex");?></h2>		    	
				<div class="req-wrapper">			    						
				<div class="data-item">						
				<div class="data-item__text"><?_e('Cвидетельство ИНН ОАО "Курскрезинотехника"',"rubex");?></div>						
				<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_krt_inn');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
				</div>			    	
				
				<div class="data-item">						
				<div class="data-item__text"><?_e('Cвидетельство ОГРН ОАО "Курскрезинотехника"',"rubex");?></div>						
				<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_krt_ogrn');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
				</div>			    	
				<div class="data-item">						
				<div class="data-item__text"><?_e('Устав ОАО "Курскрезинотехника"',"rubex");?></div>						
				<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_krt_ustav');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
				</div>		    	
				</div>								
				
				<h2 class="h1-contacts"><?_e('Политика в области качества и сертификаты соответствия ОАО "Курскрезинотехника"',"rubex");?></h2>								
				

				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text"><?_e('Политика в области качества 2020г. ОАО "Курскрезинотехника"',"rubex");?></div>						
						<a href="<?php echo KRT_quality_policy_2020;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>
				

				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text">Политика в области прав человека</div>						
						<a href="<?php echo krt_lib_policy;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>

				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text"><?_e("Сертификат ISO 14001 IQNet (ENG)","rubex");?></div>						
						<a href="<?php echo KRT_ISO_14001_IQNet_ENG; ?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>
				
				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text"><?_e("Сертификат ISO 14001 IQNet (RUS)","rubex");?></div>						
						<a href="<?php echo KRT_ISO_14001_RUS;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>
				
				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text"><?_e("Сертификат по ГОСТ РВ 0015-002-2022","rubex");?></div>						
						<a href="<?php echo KRT_GOST_RV_0015_002_2012;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>
				
				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text"><?_e("Сертификат IQNet","rubex");?></div>						
						<a href="<?php echo krt_iqnet;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>
				
				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text"><?_e("Сертификат ISO 9001 (RUS)","rubex");?></div>						
						<a href="<?php echo krt_iso_9001_rus;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>
				
				<div class="req-wrapper">					
					<div class="data-item">						
						<div class="data-item__text"><?_e("Сертификат ISO 9001 (ENG)","rubex");?></div>						
						<a href="<?php echo krt_iso_9001_eng;?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>		    	
				</div>
				
				
				
			
				
			</div>
			<div class="mapLine-wrap documents-wraper" id="mapLine-wrap-3">								
				<div class = "reqShare" id = "szrtshare">
					<p><strong><?_e("Управляющий директор ООО «Рабэкс Групп»","rubex");?>:</strong> <?_e("Грибанов Юрий Михайлович, действующий на основании доверенности №22 от 01.03.2022г.","rubex");?><p/>				
					<p><strong><?_e("Юридический и фактический адрес","rubex");?>:</strong> <?_e("430031,РФ, Республика Мордовия, город Саранск, Октябрьский район, северо-восточное шоссе, дом 15","rubex");?><p/>				
					<p><strong><?_e("ИНН","rubex");?></strong> 1328028538 <strong><?_e("КПП","rubex");?></strong> 132801001 <p/>				<p><strong><?_e("р/с в рублях","rubex");?>:</strong>40702810439010101023 МОРДОВСКОЕ ОТДЕЛЕНИЕ № 8589 ПАО СБЕРБАНК г. САРАНСК</p> 				
					<p><strong><?_e("БИК","rubex");?></strong> 048952615</p>				<p><strong><?_e("к/с","rubex");?></strong> 30101810100000000615</p>				<p><strong><?_e("ОКПО","rubex");?></strong> 00149334</p>						    	
				</div>
				
				<div class = "share_zonn">
					<span class = "shareButton" data-shareblkname = "szrtshare"><?_e("Поделиться реквизитами","rubex");?></span>
				</div>
				
				<h2><?_e('Учредительные документы ОАО "Cаранский завод "Резинотехника"',"rubex");?></h2>		    	
				<div class="req-wrapper">			    						
				<div class="data-item">						
				<div class="data-item__text"><?_e('Cвидетельство ИНН ОАО "Cаранский завод "Резинотехника"',"rubex");?></div>						
				<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_szrt_inn');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
				</div>			    	
				
				<div class="data-item">						
				<div class="data-item__text"><?_e('Cвидетельство ОГРН ОАО "Cаранский завод "Резинотехника"',"rubex");?></div>						
				<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_szrt_ogrn');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
				</div>			    	<div class="data-item">						<div class="data-item__text"><?_e('Устав ОАО "Cаранский завод "Резинотехника"',"rubex");?></div>						
				<a target="_blank" href="<?php echo carbon_get_the_post_meta('requizit_szrt_ustav');?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
				</div>		    	
				</div>								
				<h2><?_e('Политика в области качества и сертификаты соответствия ОАО "Cаранский завод "Резинотехника"',"rubex");?></h2>								
				<div class="req-wrapper">					
					<?php if($arr_slide = carbon_get_the_post_meta('requizit_szrt_sert_all')):?>
						<?php foreach($arr_slide as $sert):?>
							<div class="data-item">						
								<div class="data-item__text"><?php echo $sert['sert_title']; ?></div>						
								<a target="_blank" href="<?php echo $sert['sert_file']; ?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
							</div>		
						<?php endforeach;?>
					<?php endif;?>
					
					<div class="data-item">						
						<div class="data-item__text"><?_e('Политика в области качества ОАО "Cаранский завод "Резинотехника"',"rubex");?></div>						
						<a target="_blank" href="<?php echo SZRT_quality_policy_2020; ?>" class="data-item__link" target="_blank"><?_e("Скачать","rubex");?></a>					
					</div>
				</div>
			</div>
		</div>
      </div>
    </div>

    </div>
    </div>

  <?php get_template_part('template-parts/callback-form');?>
  <?php get_template_part('template-parts/price-block');?>
  <?php get_template_part('template-parts/articles');?>
<?php
get_footer();