<?php
/*
* Template Name: Магазин РТИ - Корзина
*/

// обновление цен
// header( 'Refresh: 0; url='.get_permalink( pll_get_post(16390, pll_current_language()) ) );
?>


<?
get_header();
$rez = userVeryfy();
?>

	<script type="text/javascript">
				
		jQuery(document).ready(function() {
			sumsCalculateNew(true);
			
			$(".tableInput").keyup(function(){ 
			
			jQuery(".oformZakBtn").removeClass("redBtnDisabled");
			
			if (($(this).val() == "")||($(this).val() == "0")) {
				jQuery(".oformZakBtn").addClass("redBtnDisabled");
				return;
			}
			
				var idElem = $(this).data('id');
				updateBascet(idElem);
				console.log( idElem);
			});
			
			$(".refrashBtn").click(function(){
				var idElem = $(this).data('id');
				updateBascet(idElem);
			});
			
			$("#contragentsList").change(function(){ 
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'contragent_reload',
						nonce: allAjax.nonce,
						contragentID: $(this).val(),
					}
				);
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
					document.location.reload(true);
					var  jqXHR = jQuery.post(
						allAjax.ajaxurl,
						{
							action: 'recalc_bascet',
							nonce: allAjax.nonce,
						}
					);
					
				
					jqXHR.done(function (responce) {
						//document.location.reload(true);
						console.log(responce);
					});
					
					jqXHR.fail(function (responce) {

						//console.log(responce);
					});
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {

					//console.log(responce);
				});
			});
			
			$(".clearBtn").click(function(){ 
				jQuery(".oformZakBtn").removeClass("redBtnDisabled");
				var idElem = $(this).data('id');
				$("#tr"+idElem).addClass("dellet");
				$("#tr"+idElem).remove();
				dellBascet(idElem) 
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

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			
				
				<div style = "min-height: 700px;" id = "sek1"  class = "lineSek line linePad">			
		<div class = "lineCenter">
			<?php
				
			
				if ($rez)
				{
					
					global $wpdb;
					$tovarNam = $wpdb->get_results("SELECT * FROM `wp_im_basket` WHERE `email` = '".getSalerData("mail")."'", ARRAY_A);
					if (!empty($tovarNam)){
			?>
				
			
					
					<div class = "product-main__table  imTovarTables">
						<table class = "imAssortimentTable" cellspacing="0" >
							<tr class="t-head-dark thead-img">
								<th>Номенклатура</th>
								<th>Цена</th>
								<th>Наличие</th>
								<th class = "trMinPrice" >Мин. Цена</th>
								<th class = "trInskl" >КНС</th>
								<th class = "trSkladOtgr" >Склад</th>
								<th class = "trGeo" >Завод</th>
								<th class = "trGost" >Гост</th>
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
								<th class = "trSkladOtgr" >отгрузки</th>
								<th class = "trGeo" >произв</th>
								<th class = "trGost" >Гост</th>
								<th><?php if (isset($tovarGroup) && (strcmp($tovarGroup, "Техническая пластина") == 0)) echo " "; else echo "п.м";?></th>
								<th>%</th>
								<th>руб., без НДС</th>
								<th>руб., без НДС</th>
							</tr>
							<?php
								//$tovarNam = json_decode(stripcslashes($_COOKIE['imTovar2']),true);
								
								
								$summ = 0;
								$summZakSale = 0;
								$summZakSale = 0;
								$summZakNoSale = 0;
								
								for ($i = 0; $i < count($tovarNam); $i++)
								{
									
									
							?>
									<tr id = 'tr<?php echo $tovarNam[$i]["idElem"]; ?>'>
										<td id = 'trName<?php echo $tovarNam[$i]["idElem"]; ?>'><?php echo $tovarNam[$i]["name"].((!empty($tovarNam[$i]["namCharecter"]))?" (".$tovarNam[$i]["namCharecter"].")":""); ?></td>
										<td id = 'trPrice<?php echo $tovarNam[$i]["idElem"]; ?>'><?php echo $tovarNam[$i]["price"]; ?></td>	
										<td id = 'trNal<?php echo $tovarNam[$i]["idElem"]; ?>'><?php echo ostatokGetView($tovarNam[$i]["nal"]);?></td>
										<td class = "trMinPrice" id = "trMinPrice<?php echo $tovarNam[$i]["idElem"];?>" ><?php echo mencode2($tovarNam[$i]["minPrice"], "herli");?></td>
										<td class = "trInskl" id = "trInskl<?php echo $tovarNam[$i]["idElem"];?>" ><?php echo mencode2($tovarNam[$i]["inskl"], "herli");?></td>
										<td class = "trSkladOtgr" id = "trSkladOtgr<?php echo $tovarNam[$i]["idElem"];?>" ><?php echo $tovarNam[$i]["sklad"];?></td>
										<td class = "trGeo" id = "trGeo<?php echo $tovarNam[$i]["idElem"];?>" ><?php echo $tovarNam[$i]["geo"];?></td>
										<td class = "trGost" id = "trGost<?php echo $tovarNam[$i]["idElem"];?>" ><?php echo $tovarNam[$i]["gost"];?></td>
										<td>
											<div class ='cartEditWraper'>
												<input id = "trCount<?php echo $tovarNam[$i]["idElem"]; ?>" data-id = "<?php echo $tovarNam[$i]["idElem"]; ?>" class = "trCount tableInput" type="text" value="<?php echo $tovarNam[$i]["count"]; ?>" name="tovarCount<?php echo $tovarNam[$i]["idElem"]; ?>">
												<div  data-id = "<?php echo $tovarNam[$i]["idElem"]; ?>" class = 'imTableBtn clearBtn' id = "clearBtn<?php echo $tovarNam[$i]["idElem"]; ?>"></div>
											</div>
										</td>
										
										<td id = "trSaleLine<?php echo $tovarNam[$i]["idElem"]; ?>"><?php echo number_format ($tovarNam[$i]["sale"],2,",", " "); ?></td>
										<td id = "trPriceLine<?php echo $tovarNam[$i]["idElem"]; ?>"><?php echo number_format ($tovarNam[$i]["salePrice"],2,",", " "); ?></td>
										<td id = "trSummLine<?php echo $tovarNam[$i]["idElem"]; ?>"><?php echo number_format ($tovarNam[$i]["summPos"],2,",", " "); ?></td>
									</tr>
							<?php
								$summ+=$tovarNam[$i]["summPos"];
								$summZakSale = $summZakSale+$tovarNam[$i]["summPos"];
								$summZakNoSale = $summZakNoSale + ($tovarNam[$i]["price"]*$tovarNam[$i]["count"]);
								}
							?>
							
						</table>
					</div>
					
					
					
						
						
						
						<div class = 'imItogo'>
						
							<?php
								$rezident = getContragentData("rezident");
								
								if ($rezident == 1)
									$summ = $summZakSale * 1.20;
								else $summ = $summZakSale;
								
								if ($rezident == 1)
									$nds = $summ * (1 - 1 / 1.20);
								else $nds = 0;
								
								
								
								//$summ = $summZakSale * 1.18;
								//$nds = $summ * (1 - 1 / 1.18);
								$sale = $summZakNoSale-$summZakSale;
							?>
							Сумма заказа без НДС,с учетом скидки: <span class = 'itogPrice2'><?php echo number_format ($summZakSale,2,",", " ");?></span> р.</br>
							Сумма скидки: <span class = 'itogSale'><?php echo number_format ($sale,2,",", " ");?></span> р.</br>
							Сумма заказа c НДС,с учетом скидки: <span class = 'itogPrice'><?php echo number_format ($summ,2,",", " ");?></span> р.</br>
							В том числе НДС: <span class = 'itogNDS'><?php echo number_format ($nds,2,",", " ");?></span> р.</br>
							
						</div>
						<h2>Выберите контрагента для оформления заказа</h2>
						<span>Вы можете оформить заказ выбрав любого из контрагентов зарегистрированных по Вашей учетной записью. При необходимости Вы можете добавить контрагента в соотвествующем разделе личного кабинета.</span>
						<div class = "contragentSelectBlk">
							
								<div class = "form-block select-wrap form-block">
									<select id = "contragentsList" name = "contragentsList" >
										<?php
											$kontragent = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".getSalerData("mail")."'", ARRAY_A);
											foreach ($kontragent as $ktr) {
											?>
												<option value = "-1" <?php if (getContragentData("caId") == -1) echo "selected"; ?>><?php echo stripcslashes (htmlspecialchars ($ktr["RPorg"],ENT_QUOTES))  ; ?> (Основной)</option>
											<?php
											}
											
											$kontragents = $wpdb->get_results("SELECT * FROM `wp_im_contragent` WHERE `RPemail`='".getSalerData("mail")."'", ARRAY_A);
											foreach ($kontragents as $ktr) {
											?>
												<option <?php echo (($ktr["moderate"] == 0)?"disabled":"" );?> value = "<?php echo $ktr["id"]; ?>" <?php if ($ktr["id"] == getContragentData("caId")) echo "selected"; ?>><?php echo stripcslashes (htmlspecialchars ($ktr["RPorg"],ENT_QUOTES)); ?></option>
											<?php
											}
										?>
									</select>
									<div class = "selectBtn"></div>
								</div>
							
							<div class = "salesInputBlk">
								 
								<?php 
									//echo getContragentData("psale");
									$loyality = getContragentData("psale");
									if (!empty($loyality)) echo "Скидка: ".$loyality."%,";
								?> 
								
								<?php echo empty(getContragentData("rezident"))?"Не резидент РФ":"Резидент РФ"; ?>
							</div>
							
						</div>
						
						<div class = 'imItogoBtn'>
							<a class = "trueButton oformZakBtn <?php if ($summ == 0) echo "redBtnDisabled" ?>" href = "<?php echo get_permalink(20742); ?>">Оформить заказ</a>
							<a class = "trueButton" href = "<?php echo get_permalink(20700); ?>">Добавить товар</a>
						</div>
					</div>
											
						<?php
					} else {
							echo "<div class = 'shopMsg'><h2>Ваша корзина пуста!</h2><br/>";
							echo "Выберите товары из нашего каталога.<br/><br/>";
							echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">К каталогу продукции</a>';
							echo "</div>";
					}
				} else {
					echo "<div class = 'shopMsg shopMsgErr'><h2>Вы не авторизованы!</h2><br/>";
					echo "Сервис RubEx Price доступен только зарегистрированным пользователям.<br/><br/>";
					echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Авторизация в сервисе</a>';
					echo "</div>";
				}
			?>
			</div>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
