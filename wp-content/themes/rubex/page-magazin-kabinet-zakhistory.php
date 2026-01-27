<?php
if (isset($_REQUEST["imOut"]))
{
		SetCookie('RPlogin2', "", -3600, "/", "rubexgroup.ru");
		header( 'Refresh: 0; url='.get_permalink(20700)  );	
}

/*
* Template Name: Магазин РТИ - Личный кабинет - история заказов
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
		jQuery(document).ready(function() {
			
			$(".zacTogel").click(function() { 
				var zakid = $(this).data("zakid");
				$("#zd"+zakid).toggle("clip", function () {
			
					if ($("#zd"+zakid).css("display") == "none")
						$("#zt"+zakid).html("Подробнее");
					else
						$("#zt"+zakid).html("Свернуть");
				});
			});
			
			$(".zacPodr").click(function() {
				var zakid = $(this).data("zakid");
				var zakidmag = $(this).data("zakidmag");
				
				var id1c = $(this).data("id1c");
				var caid = $(this).data("caid");
				
				console.log(id1c);
				console.log(caid);
				
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'get_zak_detale',
						nonce: allAjax.nonce,
						magZakId:zakidmag,
					}
				);
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
						$("#zd"+zakid+" .zdTable").html(responce);
						$("#zd"+zakid).show("clip");
						$("#za"+zakid).hide();
						$("#zt"+zakid).show();
						
						var  jqXHR = jQuery.post(
							allAjax.ajaxurl,
							{
								action: 'get_zak_newinfo_dok',
								nonce: allAjax.nonce,
								id1c:id1c,
								ca_id:caid,
							}
						);

						jqXHR.done(function (responce) {
							
							$("#zd"+zakid+" .zdInfo").html(responce);	
						});

						jqXHR.fail(function (responce) {console.log(responce);});
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {
					console.log(responce);
				});
			
			
			
			});
			
			$(".zacCalc").click(function() {
				var zakid = $(this).data("zakid");
				var zakidmag = $(this).data("zakidmag");

				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'get_zak_newinfo',
						nonce: allAjax.nonce,
						magZakId:zakidmag,
						infoType:0
					}
				);

				jqXHR.done(function (responce) {
					console.log(zakid);
					console.log(responce);
					$("#zd"+zakid+" .zdTable").html(responce);	
					
					
						
					});

				jqXHR.fail(function (responce) {console.log(responce);});
				
				
				

			});
			
			$(".zacRep").click(function() {
				var zakid = $(this).data("zakid");
				var zakidmag = $(this).data("zakidmag");
			
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'get_zak_newinfo',
						nonce: allAjax.nonce,
						magZakId:zakidmag,
						infoType:1
					}
				);

				jqXHR.done(function (responce) {
					console.log(zakid);
					console.log(responce);
					$("#zd"+zakid+" .zdTable").html(responce);	
				});

				jqXHR.fail(function (responce) {console.log(responce);});
		
			});
		});
	</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		  <section class="header-bnr header-magaz" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('page_banner'), 'full')[0];?>)"></section>
			<?get_template_part( 'template-parts/magazin', 'menu' );?>
			
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
			
					<?php 
						$tovarGroup = isset($_GET["tovarGroup"])?$_GET["tovarGroup"]:"";
					?>
					
					<div style = "min-height: 700px;" id = "sek1"  class = "lineSek line linePad">			
						<div class = "lineCenter">
							<div class = "magazSectionInMenu">
							<?php include("template-parts/magazin-Menu2.php");?>
							
							<div class = "magContent">
								
								
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
										<?php the_content(); ?>
									<?php endwhile;?>
								<?php endif; ?>
								
								<?php 		
									if ($rez)
									{
								?>
													
													
									<div class = "zakHIstory">
										<div class ="zakHIstoryElem zakHIstoryElemH">
														<div class = "cell zID">Заказ</div>
														<div class = "cell zSTATUS">Статус</div>
														<div class = "cell zDATE">Дата и время</div>
														<div class = "cell zGEO">Склад</div>
														<div class = "cell zSUM">Сумма заказа</div>
														<!--<div class = "cell zSALE">Скидка</div>-->
														<!--<div class = "cell zNDS">НДС</div>-->
														<div class = "cell zDO">Действие</div>
										</div>
										<?php
											global $wpdb;
											$zaks = $wpdb->get_results("SELECT * FROM `wp_im_zakaz_transfer` WHERE `ca_mail` LIKE '".getSalerData("mail")."' GROUP BY `magZakId` ORDER BY `wp_im_zakaz_transfer`.`data` DESC" ,OBJECT);
											
											foreach ($zaks as $zak) {
												?>
													<div class ="zakHIstoryElem" id = "zh<?php echo $zak->id; ?>" data-zakid = "<?php echo $zak->id; ?>">
														<div class = "cell zID"><?php echo $zak->magZakId; ?></div>
														<div class = "cell zSTATUS"><?php echo $zak->status; ?></div>
														<div class = "cell zDATE"><?php echo $zak->data; ?></div>
														<div id = "zGEO<?php echo $zak->id; ?>" class = "cell zGEO"><?php echo $zak->sklad; ?></div>
														<div class = "cell zSUM"><?php echo $zak->zak_summ; ?></div>
														<!--<div class = "cell zSALE"><?php echo $zak->zak_sale; ?></div>-->
														<!--<div class = "cell zNDS"><?php //echo $zak->summ_nds; ?></div>-->
														<div class = "cell zDO">
															<span id = "za<?php echo $zak->id; ?>" data-zakid = "<?php echo $zak->id; ?>" data-zakidmag = "<?php echo $zak->magZakId; ?>" data-id1c = "<?php echo $zak->id1c; ?>" data-caid = "<?php echo $zak->ca_id; ?>" class = "zacAction zacPodr trueButton">Подробнее</span>
															<span id = "zt<?php echo $zak->id; ?>" data-zakid = "<?php echo $zak->id; ?>" data-zakidmag = "<?php echo $zak->magZakId; ?>" class = "zacAction zacTogel trueButton">Свернуть</span>
														</div>
													</div>
													<div id = "zd<?php echo $zak->id; ?>" data-zakid = "<?php echo $zak->id; ?>" class = "zakDetales">
														<div class = "zdTable">
														
														</div>
											
														<div class = "zdBtn formButtonLine">
															<span id = "zcalc<?php echo $zak->id; ?>" data-zakid = "<?php echo $zak->id; ?>" data-zakidmag = "<?php echo $zak->magZakId; ?>" class = "zacAction zacCalc trueButton">Пересчитать</span>&nbsp;
															<span id = "zrep<?php echo $zak->id; ?>" data-zakid = "<?php echo $zak->id; ?>" data-zakidmag = "<?php echo $zak->magZakId; ?>" class = "zacAction zacRep trueButton">Повторить</span>
														</div>
														
														<div class = "zdInfo">
															
														</div>
														
													</div>
												<?php
											}						
											
										?>
									</div>
												
								<?php
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
					</div>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
