<?php
/*
* Template Name: Магазин РТИ - Страница товара
*/

// обновление цен
// header( 'Refresh: 0; url='.get_permalink( 22202 ) );
// return;
?>


<?
	get_header();
	$rez = userVeryfy();
?>


	<?php 
		$ukrnam = urldecode($_REQUEST["ukrnam"]);
		$namID = urldecode($_GET["namID"]);
		
		$geoTrend = getDefGeo($_REQUEST["gost"]);
		
		$defGeo = ($geoTrend > -1)?"СЗРТ":""; 
		$defGeo = ($geoTrend >= 1)?"КРТ":$defGeo; 
		
		$defGeo = !empty($_REQUEST["geo"])?$_REQUEST["geo"]:$defGeo;
		
		
		$geo = (!isset($_REQUEST["geoPer"]))?$defGeo:urldecode($_REQUEST["geoPer"]);
		
		//$geo = empty(urldecode($_REQUEST["geoPer"]))?$defGeo:urldecode($_REQUEST["geoPer"]);
		$gost = empty(urldecode($_REQUEST["gost"]))?"":urldecode($_REQUEST["gost"]);
		
		$skladText = !isset($_REQUEST["sklad"])?$_COOKIE["RPdefSkl"]:urldecode($_REQUEST["sklad"]);
		
	
		global $wpdb;
		$rezSclad = $wpdb->get_results("SELECT * FROM `wp_im_sklad_transfer`");
		
		foreach ($rezSclad as $rs) {
			$Allpriceup[$rs->name] = $rs->priceup;
		}
		
		$skladPriceup["КРТ"] = $Allpriceup; $skladPriceup["КРТ"]["Склады КРТ"] = 0;
		$skladPriceup["СЗРТ"] = $Allpriceup; $skladPriceup["СЗРТ"]["Склады СЗРТ"] = 0;
		
		//echo "<pre>";
		//	print_r($skladPriceup);
		//echo "</pre>";
	?>
	
	<script type="text/javascript">
				
		jQuery(document).ready(function($) {
			sumsCalculateNew(false);
			
			$(".timerCloseSklad").click(function() {
				$('.tfonSklad').hide();
			});
			
			
			$(".cartBtn").click(function() { 
				var idElem = $(this).data('id');
				if ($("#cartBtn"+idElem).hasClass("inCartBtn")) return;
				console.log("idElem "+idElem);
				$("#bable"+idElem).hide();
				
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'add_bascet',
						nonce: allAjax.nonce,
						name:$("#trName"+idElem).html().replace(new RegExp("&nbsp;",'g'), " "),
						cherecter:$("#trRgCherecter"+idElem).html().replace(new RegExp("&nbsp;",'g'), " "),
						rgNumber:$("#trRgNumber"+idElem).html().replace(new RegExp("&nbsp;",'g'), " "),
						price:$("#trPrice"+idElem).html(),
						count:$("#trCount"+idElem).val(),
						sale:trueFloat($("#trSaleLine"+idElem).html()),
						salePrice:trueFloat($("#trPriceLine"+idElem).html()),
						summPos:trueFloat($("#trSummLine"+idElem).html()),
						nal:$("#trNal"+idElem).text(),
						minPrice:$("#trMinPrice"+idElem).html(),
						inskl:$("#trInskl"+idElem).text(),
						sklad:$("#trSkladName"+idElem).html(),
						geo:$("#trGeo"+idElem).html(),
						gost: $("#trGost"+idElem).html(),
						idElem:idElem
					}
				);
				
				console.log(trueFloat($("#trSaleLine"+idElem).html()));
				console.log(trueFloat($("#trPriceLine"+idElem).html()));
				console.log(trueFloat($("#trSummLine"+idElem).html()));
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
					$("#cartBtn"+idElem).addClass("inCartBtn");
					$("#trCount"+idElem).attr('disabled','disabled');
					sumsCalculateNew(false);
					console.log(responce);
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {
					console.log(responce);
				});
				
			
			});
			
			$(".tableInput").keyup(function(){
				var idElem = $(this).data('id');
				
				$("#trSaleLine"+idElem).html("");
				$("#trPriceLine"+idElem).html("");
				$("#trSummLine"+idElem).html("");
			
				if ($(this).val() == "") return;
				if ($(this).val() == 0) return;
				
				if ($("#cartBtn"+idElem).hasClass("inCartBtn")) return;
				
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'get_price',
						nonce: allAjax.nonce,
						count: $(this).val(),
						price: $("#trPrice"+idElem).html(),
						minprice: $("#trMinPrice"+idElem).html(),
						gost: '<?php echo $gost; ?>',
						name: $(this).data("name"),
						carecter: $(this).data("carecter"),
						sklad: $("#trInskl"+idElem).html()
					}
				);
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
					
					mas = JSON.parse(responce, function(key, value) {
							  
							  if (key == 'sale') { $("#trSaleLine"+idElem).html(accounting.formatNumber(value, 2, " ", ",")); return new Date(value);}
							  if (key == 'pricesale') {$("#trPriceLine"+idElem).html(accounting.formatNumber(value, 2, " ", ",")); return new Date(value);}
							  if (key == 'sumsale') {$("#trSummLine"+idElem).html(accounting.formatNumber(value, 2, " ", ",")); return new Date(value);}
							  if (key == 'nal') { $("#trNal"+idElem).html(value); return new Date(value);}
							  return value;
							});
					
				
					
					$(".bable").hide();
					$("#bable"+idElem).show();
					
					console.log(responce);
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {
					$("#bable"+idElem).hide();
					$("#trSaleLine"+idElem).html("");
					$("#trPriceLine"+idElem).html("");
					$("#trSummLine"+idElem).html("");
					
					//console.log(responce);
				});
			});
		});
	</script>
	

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
				<?php
				while ( have_posts() ) :
					the_post();

					//get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			
			<header class="entry-header">
				<h1 class="entry-title"><? echo isset($_GET["tovarGroup"])?$_GET["tovarGroup"]." / ":""; echo $gost; ?></h1>	
			</header>
			
			<div style = "min-height: 700px;" id = "sek1"  class = "lineSek line linePad">			
			<div class = "lineCenter">
			<?php 
				if (true) { 				
				if ($rez && !empty($gost) && !empty($geo))
				{
				  $tovarGroup = isset($_GET["tovarGroup"])?$_GET["tovarGroup"]:"";
				  
			?>
			
			
		
			
				
					<div class = "imTovarPageHead2">
						<?php
							$tovarDescr = $wpdb->get_results("SELECT * FROM `wp_im_product_info` where `product` = '".$gost."'", ARRAY_A);
						?>
						<div class = "imTovarPageZon">
							<div class = "imgElement">
								<?php if (!empty($tovarDescr[0]["images_lnk"])):?>
									<img src = "<?php echo get_bloginfo("template_url")."/img/magazin/tovar/".$tovarDescr[0]["images_lnk"]; ?>" title = "<?php echo $tovarGroup." ".$namName; ?>" />	
								<?php endif;?>
							</div>
							<?php 
								$postDesct = get_post($tovarDescr[0]["inform_elem_id"], ARRAY_A)
							?>
							<div class = "textDescrElem">
								<?php 
									if (!empty($postDesct["post_content"]))
									{	
										echo apply_filters('the_content', $postDesct["post_content"]);
										
									}
									else 
										echo "Описание продукта отсутствует.";
								?>
							</div>
							
							<div class = "tableDescrElem">
								<?php 
									if ($tovarDescr[0]["product_type"] === "РВД") {
								?>

								<table class = 'imDescrTable'>
									<tr>
										<td><span class="color-red"><?_e("Внутренний слой","rubex");?></span> / Tube</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'rvd_vnutr');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Внешний слой","rubex");?></span> / Cover</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'rvd_vnesh');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Прокладка","rubex");?></span> / Reinforcement</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'rvd_prok');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Температура","rubex");?></span> / Temperature range</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'rvd_temp');?></td>
									</tr>
								</table>
								<?}?>

								<?php 
									if ($tovarDescr[0]["product_type"] === "Промышленные") {
								?>

								<table class = 'imDescrTable'>
									<tr>
										<td><span class="color-red"><?_e("Внутренний слой","rubex");?></span> / Tube</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'prom_vnutr');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Внешний слой","rubex");?></span> / Cover</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'prom_vnesh');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Прокладка","rubex");?></span> / Reinforcement</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'prom_prok');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Температура","rubex");?></span> / Temperature range</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'prom_temp');?></td>
									</tr>
									<tr>
										<td><span class="color-red"><?_e("Предел прочности","rubex");?></span> / Ultimate strength</td>
										<td><?php echo carbon_get_post_meta($tovarDescr[0]["inform_elem_id"], 'prom_pred');?></td>
									</tr>
								</table>
								<?}?>


							</div>
							
						</div>
						
						<div class = "sessionInformer sessionInformer2">
							<div class = "informZon">
								<div class = "Elem ElemL">
									<span class = "elemHead">Сумма заказа без НДС с учетом скидки</span>
									<span class = "elemZakSum elemSumm">0 р.</span>
									<span class = "elemHead">Сумма заказа с НДС с учетом скидки</span>
									<span class = "elemZakSum2 elemSumm">0 р.</span>
									<span class = "elemHead elemHeadNDS">В том числе НДС:</span>
									<span class = "elemNDS elemSumm elemSummNDS">0 р.</span>
								</div>
								
								<div class = "Elem ElemR">
									<span class = "elemHead">Сумма скидки</span>
									<span class = "elemSaleSum elemSumm">0 р.</span>
								</div>
							</div>
							
							<div class = "informSmf">
								Скидка за объем закупки в натуральном и стоимостном выражении. 
							</div>
							
							<a class = "redBtn imToBsacetLabel" href = "<?php echo get_permalink(20736);?>">Перейти в корзину</a>
						</div>
						
						<?php if (($_REQUEST["ukrnam"] !== "Рукава высокого давления")
								&&($_REQUEST["gost"] !== "EN 853")
								&&($_REQUEST["gost"] !== "SAE J 517-2013")
								&&($_REQUEST["gost"] !== "ГОСТ 28618-90")
								
								&&($_REQUEST["gost"] !== "ГОСТ 6286-2017")
								&&($_REQUEST["gost"] !== "ТУ 2554-059-00149334-2008/ EN 853")
								&&($_REQUEST["gost"] !== "ТУ 2554-321-00149245-2013")	
						): ?>
						
						<div class = "imFilterTovar" >
							<form method = "get">
								<input type = "hidden" name = "ukrnam" value = "<?php echo $_REQUEST["ukrnam"];?>" >
								<input type = "hidden" name = "gost" value = "<?php echo $_REQUEST["gost"];?>" >
								<input type = "hidden" name = "namID" value = "<?php echo $_REQUEST["namID"];?>" >
								<input type = "hidden" name = "geo" value = "<?php echo $geo;?>" >
								
								<?php if ($geoTrend >= 1):?>
									<button id = "krtImBtn" class = "geoBtn <?php echo ($geo === "КРТ")?"geoBtnSel":""; ?>" type = "submit" name = "geoPer" value = "КРТ">КРТ</button>
								<?php endif;?>
								
								<?php if (($geoTrend == 0)||($geoTrend == 2)):?>
									<button id = "szrtImBtn" class = "geoBtn <?php echo ($geo === "СЗРТ")?"geoBtnSel":""; ?>" type = "submit" name = "geoPer" value = "СЗРТ">СЗРТ</button>
								<?php endif;?>
								
								
								
								<div class = "filterRightSide">
									
									<div class = "selectorWhiperInForm select-wrap">
										<select id = "sklad" name = "sklad" onchange="this.form.submit();">
											<?php
												$sklads = $wpdb->get_results("SELECT * FROM `wp_im_sklad_transfer` ", ARRAY_A);
												foreach ($sklads as $sklad) {
												?>
													<option value = "<?php echo $sklad["name"]; ?>" <?php if ($sklad["name"] === $skladText) echo "selected"; ?>><?php echo $sklad["name"]; ?></option>
												<?php
													if ($sklad["name"] === $skladText) {
														$sklAdres = $sklad["adres"];
														$sklKoord = $sklad["geoposition"];
													}
												}
											?>
										</select>
										<div class = "selectBtn"></div>
									</div>
									
									<span id = "shovSckadinfo"><i style = "color:#bf1e2e" class="fa fa-info"></i> Информация о складе</span>
								</div>
							</form>
						</div>
						<?php endif; ?>
						
						<div class="tfonSklad"  >
							<div style = "position:relative; width:100%;" class="tfonWindow tfonWindowSklad">
								<div style = "position: absolute; z-index: 100;" class = "timerCloseSklad btnRghtr"></div>
								<h2><?php echo $skladText;?></h2>
								<h3>Адрес склада:</h3>
								<?php echo $sklAdres;?>
								<div id = "mapSkld">
								</div>
								
								<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
								
								<script>	
						var myMap,
						myPlacemark;

						// Дождёмся загрузки API и готовности DOM.
						ymaps.ready(init);

						function init () {
							// Создание экземпляра карты и его привязка к контейнеру с
							// заданным id ("map").
							myMap = new ymaps.Map('mapSkld', {
								center: [<?php echo $sklKoord ;?>], 
								zoom: 14,
								class: "myMap11",
								controls: ['zoomControl', 'routeButtonControl', 'geolocationControl', 'typeSelector']
							}, {
								//searchControlProvider: 'yandex#search'
							});
							
							myMap.controls.add('zoomControl');
							
						
							
							myPlacemark40 = new ymaps.Placemark([<?php echo $sklKoord ;?>], {
							balloonContent: '<b>Адрес:</b> <?php echo $sklAdres;?>',
							id: 1},
							{preset:'islands#blueDotIcon'}
							);

							myMap.geoObjects.add(myPlacemark40); 

							
							
							
						}

								</script>
							</div>
						</div> 	
						
						
					</div>
					<?php 
					
						if (strcmp($tovarGroup, "Полимерные рукава")== 0)
							echo "<div class = 'polimerDopText'>Цены представленные в данном разделе не являюся конечными. Возможны скидки в зависимости от объема закупки.</div>";
					
					?>
					
					<?php 
						// if ((($_REQUEST["ukrnam"] !== "Рукава высокого давления")
						// &&($_REQUEST["gost"] !== "EN 853")
						// &&($_REQUEST["gost"] !== "SAE J 517-2013")
						// &&($_REQUEST["gost"] !== "ГОСТ 28618-90")
						
						// &&($_REQUEST["gost"] !== "ГОСТ 6286-2017")
						// &&($_REQUEST["gost"] !== "ТУ 2554-059-00149334-2008/ EN 853")
						// &&($_REQUEST["gost"] !== "ТУ 2554-321-00149245-2013"))
						// )
						if (true)	
					{ ?>
					<div class = "imTovarTables">
						<table class = "imAssortimentTable product-main__table" cellspacing="0" >
							<tr class="t-head-dark thead-img">
								<th>Номенклатура</th>
								<th>Цена</th>
								<th>Наличие</th>
								<th class = "trMinPrice" >Мин. Цена</th>
								<th class = "trInskl" >КНС</th>
								<th class = "trSkladName" >Склад</th>
								<th class = "trGeo" >Завод</th>
								<th class = "trGost" >Гост</th>
								<th class = "trRgNumber" >Номер</th>
								<th class = "trRgCherecter" >Характеристика</th>
								<th>Количество</th>
								<th>Ваша скидка</th>
								<th>Цена со скидкой</th>
								<th>Сумма со скидкой</th>
							</tr>
							<tr class="t-head-light thead-inits">
								<th>наименование</th>
								<th>руб., без НДС</th>
								<th>на складе</th>
								<th class = "trInskl">инскл</th>
								<th class = "trMinPrice" >руб., без НДС</th>
								<th class = "trSkladName" >наим.</th>
								<th class = "trGeo" >пр.</th>
								<th class = "trGost" >Гост</th>
								<th class = "trRgNumber" >RubEx</th>
								<th class = "trRgCherecter" >Наменклатуры</th>
								<th><?php if (isset($tovarGroup) && (strcmp($tovarGroup, "Техническая пластина") == 0)) echo " "; else echo "п.м";?></th>
								<th>%</th>
								<th>руб., без НДС</th>
								<th>руб., без НДС</th>
							</tr>
							<?php
							
								
								$wpdb->query("SET SQL_BIG_SELECTS=1");
								
								$tovarNam = $wpdb->get_results(
									"(SELECT `wp_im_product_transfer`.*, `wp_im_ostatki_transfer`.`count` AS InScladCOunt, `wp_im_ostatki_transfer`.`skladname`".
									"FROM `wp_im_product_transfer` LEFT JOIN `wp_im_ostatki_transfer` ".
									"ON (".
									"`wp_im_product_transfer`.`rgNumber` = `wp_im_ostatki_transfer`.`rgNumber` AND".
									"`wp_im_product_transfer`.`name` = `wp_im_ostatki_transfer`.`name` AND".
									"`wp_im_product_transfer`.`geo` = `wp_im_ostatki_transfer`.`geo` AND".
									"`wp_im_product_transfer`.`namCharecter` = `wp_im_ostatki_transfer`.`namCharecter` AND".    
									"`wp_im_ostatki_transfer`.`skladname` = '".$skladText."'".    
									") WHERE ". 
									"`wp_im_product_transfer`.`gost` = '".$gost."' AND".
									"`wp_im_product_transfer`.`geo` = '".$geo."' AND".
									
									
									//"(`wp_im_product_transfer`.`ukrnam` <> 'Техпластина') AND".
									
									//"`wp_im_product_transfer`.`price` != 0 ORDER BY `wp_im_product_transfer`.`name` ASC".
									"`wp_im_product_transfer`.`price` != 0 )".
									
									" UNION ALL (SELECT `wp_im_product_transfer_no`.*, `wp_im_ostatki_transfer`.`count` AS InScladCOunt, `wp_im_ostatki_transfer`.`skladname`".
									"FROM `wp_im_product_transfer_no` LEFT JOIN `wp_im_ostatki_transfer` ".
									"ON (".
									"`wp_im_product_transfer_no`.`rgNumber` = `wp_im_ostatki_transfer`.`rgNumber` AND".
									"`wp_im_product_transfer_no`.`name` = `wp_im_ostatki_transfer`.`name` AND".
									"`wp_im_product_transfer_no`.`geo` = `wp_im_ostatki_transfer`.`geo` AND".
									"`wp_im_product_transfer_no`.`namCharecter` = `wp_im_ostatki_transfer`.`namCharecter` AND".    
									"`wp_im_ostatki_transfer`.`skladname` = '".$skladText."'".    
									") WHERE ". 
									"`wp_im_product_transfer_no`.`gost` = '".$gost."' AND".
									"`wp_im_product_transfer_no`.`geo` = '".$geo."' AND".
									
									
									//"(`wp_im_product_transfer_on`.`ukrnam` <> 'Техпластина') AND".
									
									"`wp_im_product_transfer_no`.`price` != 0)  ORDER BY `name` ASC"
									
									
									
									, ARRAY_A);
									
								
									
		
								for ($i = 0; $i < count($tovarNam); $i++)
								{
							?>
									<tr id = 'tr<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>'>
										<td id = 'trName<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>'><?php echo $tovarNam[$i]["name"].((!empty($tovarNam[$i]["namCharecter"]))?" (".$tovarNam[$i]["namCharecter"].")":""); ?></td>
										<td id = 'trPrice<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>'><?php echo priceup($tovarNam[$i]["price"], $skladPriceup[$geo][$skladText]); ?></td>	
										<td id = 'trNal<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>'><?php echo ostatokView(0,$tovarNam[$i]["InScladCOunt"]);?></td>
										<td class = "trMinPrice" id = "trMinPrice<?php echo $tovarNam[$i]["id"].translit_m($skladText);?>" ><?php echo mencode2($tovarNam[$i]["min_price"], "herli");?></td>
										<td class = "trInskl" id = "trInskl<?php echo $tovarNam[$i]["id"].translit_m($skladText);?>" ><?php $co1 = (empty($tovarNam[$i]["InScladCOunt"]))?"0":(string)$tovarNam[$i]["InScladCOunt"];  echo mencode2($co1, "herli");?></td>
										<td class = "trSkladName" id = "trSkladName<?php echo $tovarNam[$i]["id"].translit_m($skladText);?>" ><?php echo $skladText;?></td>
										<td class = "trGeo" id = "trGeo<?php echo $tovarNam[$i]["id"].translit_m($skladText);?>" ><?php echo $geo;?></td>
										<td class = "trGost" id = "trGost<?php echo $tovarNam[$i]["id"].translit_m($skladText);?>" ><?php echo $gost;?></td>
										<td class = "trRgNumber" id = "trRgNumber<?php echo $tovarNam[$i]["id"].translit_m($skladText);?>" ><?php echo $tovarNam[$i]["rgNumber"];?></td>
										<td class = "trRgCherecter" id = "trRgCherecter<?php echo $tovarNam[$i]["id"].translit_m($skladText);?>" ><?php echo $tovarNam[$i]["namCharecter"];?></td>
										<td>
											<div class ='cartEditWraper'>
												<input 
												data-name = "<?php echo $tovarNam[$i]["name"]; ?>"
												data-carecter = "<?php echo $tovarNam[$i]["namCharecter"];?>"
												id = "trCount<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>" data-id = "<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>" class = "trCount tableInput" type="text" value="" name="tovarCount<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>">
												<div  
													data-id = '<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>' 
													class = 'cartBtn' 
													id = 'cartBtn<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>'
													data-name = "<?php echo $tovarNam[$i]["name"]; ?>"
													data-carecter = "<?php echo $tovarNam[$i]["namCharecter"];?>"
												>
												</div>
												<p id = 'bable<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>' class = 'bable'>Добавьте товар в корзину</p>
											</div>
										</td>
										
										<td id = "trSaleLine<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>"></td>
										<td id = "trPriceLine<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>"></td>
										<td id = "trSummLine<?php echo $tovarNam[$i]["id"].translit_m($skladText); ?>"></td>
									</tr>
							<?php
								}
							?>
							
						</table>
					</div>
				<?php } else { ?>
					<h3>Сервис в разделе временно не доступен.</h3>

					<p>Приносим извинения за доставленные неудобства.</p>

					<p>По вопросам приобретения рукавов высокого давления просим обращаться по адресу: <a href ="mailto:ryndin@rubexgroup.ru">ryndin@rubexgroup.ru</a></p>
				<?php } ?>
					<div class = "franko">
						<span>Представленные цены на сайте на условиях франко-завод (ex work price)</span>
					</div>	
			<?php
				} else {
					echo "<div class = 'shopMsg shopMsgErr'><h2>Вы не авторизованы!</h2><br/>";
					echo "Сервис RubEx Price доступен только зарегистрированным пользователям.<br/><br/>";
					echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Авторизация в сервисе</a>';
					echo "</div>";
				}
			} else {
			?>
				<h2>Уважаемые клиенты!</h2> 
				<p>Сервис Rubex Price по техническим причинам временно недоступен. Приносим свои извинения.</p>
			<?}?>
		</div>
	</div>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
