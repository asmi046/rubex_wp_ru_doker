<?php
/*
* Template Name: Магазин РТИ - Оформление заказа
*/

// обновление цен
// header( 'Refresh: 0; url='.get_permalink( 22202 ) );
// return;
?>


<?
	get_header();
	$rez = userVeryfy();
?>


	<script type="text/javascript">
		
		function isNumber(n) {
			  return !isNaN(parseFloat(n)) && isFinite(n);
		}
		
		jQuery(document).ready(function() {
			
			
			$(".podtverditZak").click(function(){ 
				
				$(".RMerrs").html("");
				if (($("#innClient").val().length < 8)||($("#innClient").val() == "0")||(!isNumber($("#innClient").val())))
				{
					$(".RMerrs").html($(".RMerrs").html()+'<span class="RMerr RMerrCenter2">Поле ИНН заполнено некорректно.</span>');
					jQuery('html, body').animate({scrollTop: "0px"},1000,function() {$(".top-button").stop().hide();});
					return;
				}
				
				var deliveryVal =  jQuery('#deliveryList').val();
				

				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'oformlenie_z',
						nonce: allAjax.nonce,
						fio:$("#fioClient").val(),
						dolg:$("#dolgClient").val(),
						org:$("#orgClient").val(),
						inn:$("#innClient").val(),
						kpp:$("#kppClient").val(),
						srtM:$("#strClient").val(),
						reg:$("#regClient").val(),
						phone:$("#phoneClient").val(),
						mail:$("#mailClient").val(),
						conragent_id:$("#conragent_id").val(),
						rezedent:$("#rezedent").val(),
						comment:$("#comment").val(), 
						delivery:deliveryVal
					}
				);
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
					console.log(responce);
					$(".imTovarTables").css("display","none");
					
					$(".imRezMessages").html("<span class = 'zakOk'>Ваши заказы успешно оформлен, в ближайшее время с вами свяжется менеджер.</span>"+responce);
					
					$.cookie("imTovarBascetItog", "1", {expires: -1, path: '/'});
					
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {
					console.log(responce);
				});
			});
			
			$(".otmenitZak").click(function(){ 
				$(".imTovarTables").css("display","none");

				$(".imRezMessages").html("<span class = 'zakNo'>Ваш заказ был удален.</span>"+
										'<a class = "RMRegister RMRegisterBig RMRegisterRform" href = "<?php echo the_permalink(20700);?>"><div class = "trueButton redBtnCenter">Оформить новый заказ</div></a>');
				
				
				$.cookie("imTovar2", "1", {expires: -1, path: '/'});
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
						
							
							<div class="RMerrs"></div>
							
							
								<div class = "imTovarTables">
									
									<?php 		
										$zakCount = 0;
										if ($rez)
										{
											global $wpdb;
											$bascetElems = $wpdb->get_results("SELECT * FROM `wp_im_basket` WHERE `email` = '".getSalerData("mail")."'", ARRAY_A);
											
											/*
											$bascetElems = $wpdb->get_results("SELECT `wp_im_basket`.*, 
												   `wp_im_tk_param_transfer`.`obves`,
												   `wp_im_tk_param_transfer`.`ves` 
											FROM `krtiru_site2015`.`wp_im_basket` LEFT JOIN `krtiru_site2015`.`wp_im_tk_param_transfer` ON 
												(`wp_im_basket`.`name` = `wp_im_tk_param_transfer`.`name`) AND  
												(`wp_im_basket`.`rgNumber` = `wp_im_tk_param_transfer`.`rgNumber`) AND 
												(`wp_im_basket`.`cherecter` = `wp_im_tk_param_transfer`.`namCharecter`)
											WHERE `wp_im_basket`.`email` = 'asmi-work046@yandex.ru'", ARRAY_A);
											*/
											
											if (!empty($bascetElems))
											{
												
												$zaks = gesZakStruk($bascetElems);
												
												
												foreach($zaks as $key => $value)
												{
												
										
									?>
									
										<h2>Закза на: <?php echo $key; ?></h2>
										<table class = "imAssortimentTable imAssortimentTableBig product-main__table" cellspacing="0" >
											<tr class="t-head-dark thead-img">
												<th>Номенклатура</th>
												<th>Количество</th>
												<th>Сумма со скидкой</th>
											</tr>
											<tr class="t-head-light thead-inits">
												<th>наименование</th>
												<th>п.м</th>
												<th>руб., без НДС</th>

											</tr>
											<?php
													$summ = 0;
													
													$summZakSale = 0;
													$summZakNoSale = 0;
													
													$summObves = 0;
													$summVes = 0;
													
													for ($i = 0; $i < count($value); $i++)
													{
														?>
														<tr data-id = '<?php echo $value[$i]["idElem"];?>' class= 'tRow' id = 'tr<?php echo $value[$i]["idElem"];?>'>
															<td class = 'trName' id = 'trName<?php echo $value[$i]["idElem"];?>'><?php echo $value[$i]["name"];?></td>
																<td>
																	<div class ='cartEditWraper cartEditWraperBig'>
																		<?php echo $value[$i]["count"];?>
																	</div>
															</td>
															<td class = "trSummLine" id = "trSummLine<?php echo $value[$i]["idElem"];?>"><?php echo  number_format ($value[$i]["summPos"],2,",", " ");?></td>
														</tr>
													<?php
															$summ+=$value[$i]["summPos"];
															$summZakSale = $summZakSale+$value[$i]["summPos"];
															$summZakNoSale = $summZakNoSale + ($value[$i]["price"]*$value[$i]["count"]);
															
															$summObves += isset($value[$i]["obves"])?$value[$i]["obves"]*$value[$i]["count"]:0;
															$summVes += isset($value[$i]["ves"])?$value[$i]["ves"]*$value[$i]["count"]:0;
													}
													
												
												
											?>
										</table>
										
										<div class = 'imItogo'>
											<?php
												$rezident = getContragentData("rezident");
												
												if ($rezident == 1)
													$summ = $summZakSale * 1.20;
												else $summ = $summZakSale;
												
												if ($rezident == 1)
													$nds = $summ * (1 - 1 / 1.20);
												else $nds = 0;
												
										
												$sale = $summZakNoSale-$summZakSale;
											?>
											Сумма заказа: <span class = 'itogPrice'><?php echo number_format ($summ,2,",", " ");?></span> р.</br>
											В том числе НДС: <span class = 'itogNDS'><?php echo number_format ($nds,2,",", " ");?></span> р.</br>
											Сумма скидки: <span class = 'itogSale'><?php echo number_format ($sale,2,",", " ");?></span> р.</br>
											<span style = "display:none" class ="allObves"><?php echo $summObves; ?></span>
											<span style = "display:none" class ="allVes"><?php echo $summVes; ?></span>
										</div>
										
										<?php
											$zakCount++;
										}
										?>
										
										
										<div class = "zakazClientInfo zakazClientInfo2">
											<h2>Данные для оформления заказа</h2> 
											<div class = "oformFormWriper">
												<div class = "zakFormWriper">
												<?php
													$zakClient = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail` LIKE '".getSalerData("mail")."';", ARRAY_A);
													echo '<label class="firstSpan">Ф. И. О.</label></br>';
													echo '<input disabled id = "fioClient"  type="text" value="'.getContragentData("obr").'" name="fioClient"></br>';
													echo '<label class="firstSpan">Должность</label></br>';
													echo '<input disabled id = "dolgClient"  type="text" value="'.$zakClient[0]["RPdolg"].'" name="dolgClient"></br>';
													echo '<label class="firstSpan">Организация</label></br>';
													echo '<input disabled id = "orgClient"  type="text" value="'.stripcslashes (htmlspecialchars (getContragentData("org"),ENT_QUOTES)).'" name="orgClient"></br>';
													echo '<label class="firstSpan">ИНН*</label></br>';
													echo '<input disabled id = "innClient"  type="text" value="'.getContragentData("inn").'" name="innClient"></br>';
													echo '<label class="firstSpan">КПП</label></br>';
													echo '<input disabled id = "kppClient"  type="text" value="'.getContragentData("kpp").'" name="kppClient"></br>';
													echo '<label class="firstSpan">Страна</label></br>';
													echo '<input disabled id = "strClient"  type="text" value="'.$zakClient[0]["RPstrana"].'" name="strClient"></br>';
													echo '<label class="firstSpan">Регион</label></br>';
													echo '<input disabled id = "regClient"  type="text" value="'.$zakClient[0]["RPregion"].'" name="regClient"></br>';
													echo '<label class="firstSpan">Телефон</label></br>';
													echo '<input disabled id = "phoneClient"  type="text" value="'.$zakClient[0]["RPphone"].'" name="phoneClient"></br>';
													echo '<label class="firstSpan">e-mail</label></br>';
													echo '<input disabled id = "mailClient"  type="text" value="'.$zakClient[0]["RPemail"].'" name="mailClient"></br>';
													echo '<input id = "conragent_id"  type="hidden" value="'.getContragentData("caid").'" name="conragent_id">';
													echo '<input disabled id = "rezedent"  type="hidden" value="'.getContragentData("rezident").'" name="rezedent">';
												?>
												</div>
												<div class = "zakFormWriper zakFormWriper2">
													<?php
														if (getSalerData("mail") === "asmi-work046@yandex.ru") {
													?>
													
														<label class="firstSpan" >Доставка</label>
														<div class = "selectorWhiperInForm selectorWhiperInFormDelivery">
															<select id = "deliveryList" name = "deliveryList" >
																<option value = "Самовывоз">Самовывоз</option>
																<option value = "Уточнить">Уточнение стоимости и деталей доставки у менеджера</option>
																
																<?php if ($zakCount == 1):?>
																	<option value = "Рассчитать">Автоматический расчет стоимости и оформление доставки DPD</option>
																<?php endif;?>
															</select>
															<div class = "selectBtn"></div>
														</div>	
													<?php
														}
													?>
													<label class="firstSpan" >Комментарий к заказу</label></br>
													<textarea id = "comment"> </textarea>
												</div>
											</div>
											
										</div>
										
										<div class = 'imItogoBtn'>
											<div class = "podtverditZak trueButton">Подтвердить заказ</div>
											<div class = "otmenitZak trueButton grayButton">Отменить заказ</div>
										</div>
										
									</div>
								
									<div class = "imRezMessages">
									
									</div>
											
							<?php
								} else {
									//echo "<span class = 'zakOk'>Ваш заказ успешно оформлен, в ближайшее время с вами свяжется менеджер.</span>";
									//echo '<a class = "RMRegister RMRegisterBig RMRegisterRform" href = "'.trans_get_the_permalink(17037).'"><div class = "redBtn redBtnCenter">'.pll__("Оформит новый заказ").'</div></a>';
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
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
