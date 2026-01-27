<?php
/*
* Template Name: Калькулятор рукавов 
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
  

  
	<div class="container">
		<div class="category-wrapper">	
			<?php get_template_part('template-parts/sidebar-calc-hoses');?>
			<div class="product-main">
				<h1 class="h1-contacts"><?_e("Расчет параметров промышленных рукавов","rubex");?></h1>
				
				<div class="mapLine-wrap " id="mapLine-wrap-1">
					<form id="formRashetProizvod" class="kalkulatorForm RSformPromHosesBig fPrimenenie" name="RSformPromHoses" action="" method="post">
							<label for = "r1Diam" class = "blaclLabel"><?_e("Диаметр рукава (мм)","rubex");?></label>
							<input type="text" id="r1Diam" name = "r1Diam" placeholder="<?_e("Диаметр рукава (мм)","rubex");?>" value="">
							
							<label for = "r1Davl"  class = "blaclLabel"><?_e("Давление (бар)","rubex");?></label>
							<input type="text" id="r1Davl" name = "r1Davl" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r1Rez" class = "blaclLabel"><?_e("Максимальный расход (литров/мин)","rubex");?></label>
							<input disabled id="r1Rez" type="text" name = "r1Rez" class="kalkRezInput" >
							
							<input type="button" name="buttonRachet" id="buttonRashetProizvod" class="trueButton" value="<?_e("Расчет","rubex");?>">
							
							<div class="kalkPrimechanie snoska snoska14">
								<?_e("Примечание: расчетные значения – теоретические,  построены на основании закона Торричелли, шкалы Рейнольдса, формул Альтшуля. Расчет гидропотерь действителен для среды: вода с температурой + 20°C, либо иной жидкой среды с аналогичным коэффициентом вязкости. Значения действительны только для резиновых рукавов и могут отличаться от параметров, полученных экспериментальным путем.","rubex");?>						
							</div>
					</form>		
				</div>
				
				<div class="mapLine-wrap " id="mapLine-wrap-2">
				
					<form id="formRashetNeobhDavl" class="kalkulatorForm RSformPromHosesBig fNtd" name="RSformPromHoses" action="" method="post" style="display: block;">
						<div class="formGray formGrayKalk">
							<label for = "r2Rashod" class = "blaclLabel"><?_e("Максимальный расход (литров/мин)","rubex");?></label>
							<input type="text" name = "r2Rashod" id="r2Rashod" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r2Diametr" class = "blaclLabel"><?_e("Диаметр рукава (мм)","rubex");?></label>
							<input type="text" name = "r2Diametr" id="r2Diametr" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r2Rez" class = "blaclLabel"><?_e("Давление на линии (бар)","rubex");?></label>
							<input disabled="" type="text" class="kalkRezInput" name = "r2Rez" id="r2Rez">
						</div>
		
						<input type="button" name="buttonRachet" id="buttonRashetNeobhDavl" class="trueButton" value="<?_e("Расчет","rubex");?>">
						
						<span class="kalkPrimechanie snoska snoska14">
							<?_e("Примечание: расчетные значения – теоретические,  построены на основании закона Торричелли, шкалы Рейнольдса, формул Альтшуля. Расчет гидропотерь действителен для среды: вода с температурой + 20°C, либо иной жидкой среды с аналогичным коэффициентом вязкости. Значения действительны только для резиновых рукавов и могут отличаться от параметров, полученных экспериментальным путем.","rubex");?>						
						</span>
						
					</form>
				
				</div>
				
				<div class="mapLine-wrap " id="mapLine-wrap-3">
					<form id="formRashetPodhDiam" class="kalkulatorForm RSformPromHosesBig fKonkurent" name="RSformPromHoses" action="" method="post" >
						<div class="formGray formGrayKalk">
							<label for = "r3Rashod" class = "blaclLabel"><?_e("Максимальный расход (литров/мин)","rubex");?></label>
							<input type="text" name = "r3Rashod" id="r3Rashod" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r3Davl" class = "blaclLabel"><?_e("Давление на линии (бар)","rubex");?></label>
							<input type="text" name = "r3Davl" id="r3Davl" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r3Rez" class = "blaclLabel"><?_e("Диаметр рукава (мм)","rubex");?></label>
							<input disabled="" type="text" class="kalkRezInput" name = "r3Rez" id="r3Rez">
						</div>
		
						<input type="button" name="buttonRachet" id="buttonRashetPodhDiam" class="trueButton" value="<?_e("Расчет","rubex");?>">
						
						<span class="kalkPrimechanie  snoska snoska14">
								<?_e("Примечание: расчетные значения – теоретические,  построены на основании закона Торричелли, шкалы Рейнольдса, формул Альтшуля. Расчет гидропотерь действителен для среды: вода с температурой + 20°C, либо иной жидкой среды с аналогичным коэффициентом вязкости. Значения действительны только для резиновых рукавов и могут отличаться от параметров, полученных экспериментальным путем","rubex");?>.						
						</span>
						
					</form>									
				</div>
				
				<div class="mapLine-wrap " id="mapLine-wrap-4">
					<form id="formRashetHidropoter" class="kalkulatorForm RSformPromHosesBig fKonkurent" name="RSformPromHoses" action="" method="post" >
						<div class="formGray formGrayKalk">
							<label for = "r4Diametr" class = "blaclLabel"><?_e("Диаметр рукава (мм)","rubex");?></label>
							<input type="text" name = "r4Diametr" id="r4Diametr" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r4Davl" class = "blaclLabel"><?_e("Давление на линии (бар)","rubex");?></label>
							<input type="text" name = "r4Davl" id="r4Davl" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r4Dlinna" class = "blaclLabel"><?_e("Длина (м)","rubex");?></label>
							<input type="text" name = "r4Dlinna" id="r4Dlinna" placeholder="<?_e("Введите значение","rubex");?>" value="">
							
							<label for = "r4Rez1" class = "blaclLabel"><?_e("Гидравлические потери  (%)","rubex");?></label>
							<input disabled="" type="text" class="kalkRezInput"  name = "r4Rez1" id="r4Rez1">
							
							<label for = "r4Rez2" class = "blaclLabel"><?_e("Давление на выходе (бар)","rubex");?></label>
							<input disabled="" type="text" class="kalkRezInput" name = "r4Rez2" id="r4Rez2">
							
						</div>
		
						<input type="button" name="buttonRachet" id="buttonRashetHidropoter" class="trueButton" value="Расчет">
						
						<span class="kalkPrimechanie   snoska snoska14">
								<?_e("Примечание: расчетные значения – теоретические,  построены на основании закона Торричелли, шкалы Рейнольдса, формул Альтшуля. Расчет гидропотерь действителен для среды: вода с температурой + 20°C, либо иной жидкой среды с аналогичным коэффициентом вязкости. Значения действительны только для резиновых рукавов и могут отличаться от параметров, полученных экспериментальным путем","rubex");?>.						
						</span>
					</form>
				</div>
				
			</div>
		</div>
    </div>

  <?php get_template_part('template-parts/price-block');?>
  <?php get_template_part('template-parts/articles');?>
<?php
get_footer();