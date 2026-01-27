<?php
if (isset($_REQUEST["imOut"]))
{
		SetCookie('RPlogin2', "", -3600, "/", "rubexgroup.ru");
		header( 'Refresh: 0; url='.get_permalink(20700)  );	
}

/*
* Template Name: Магазин РТИ - Личный кабинет - Мои контрагенты
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
			$(".dellContragent").click(function() { 
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'dell_im_contragent',
						nonce: allAjax.nonce,
						id: $(this).data("id")
					}
				);
				
						
				jqXHR.done(function (responce) {
					location.reload();
				});

				
				jqXHR.fail(function (responce) {
					$("#RMerrs").html("<span class = 'RMerr RMerrCenter2'>"+responce.responseText+"</span>");
				});
			
			});
			
			$("#imAddContragentButton").click(function() { 
				$("#RMerrs").html("");
				$(".fa-spinner-reg").css("display","inline-block");
				
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'add_im_contragent',
						nonce: allAjax.nonce,
						RPsname: $("#RPsname").val(),
						RPname: $("#RPname").val(),
						RPfname: $("#RPfname").val(),
						RPinn: $("#RPinn").val(),
						RPkpp: $("#RPkpp").val(),
						RPorg: $("#RPorg").val(),
						RPtypeul: $("#RPtypeul").val(),
						RPrezident: $("#RPrezident").val(),
					}
				);
				
						
				jqXHR.done(function (responce) {
					location.reload();
				});

				
				jqXHR.fail(function (responce) {
					$("#RMerrs").html("<span class = 'RMerr RMerrCenter2'>"+responce.responseText+"</span>");
					$(".fa-spinner-reg").hide();
					$(".imKontragentForm").hide();
				   $(".imKontragentForm input[type=text]").attr("readonly");
				});
				
		   });
			

		   
			
			$("#submitGetINN").click(function() { 
				$("#RMerrs").html("");
				$(".fa-spinner-inn").css("display","inline-block");
				
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'get_inn_info',
						nonce: allAjax.nonce,
						SerchInn: $("#SerchInn").val()
					}
				);
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
					console.log(responce);
					var innresrez = JSON.parse(responce);
					$("#RPsname").val(innresrez["F"]);
					$("#RPname").val(innresrez["I"]);
					$("#RPfname").val(innresrez["O"]);
					$("#RPinn").val(innresrez["inn"]);
					$("#RPkpp").val(innresrez["kpp"]);
					$("#RPorg").val(innresrez["name"]);
					
					if (innresrez["type"] == "individ") {
						$(".shovedKpp").hide();
					}	else {
						$(".shovedKpp").show();
					}
					
					$("#RPtypeul").val(innresrez["type"]);
					
					$(".imKontragentForm").show();
					$(".fa-spinner-inn").hide();
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {
					$("#RMerrs").html("<span class = 'RMerr RMerrCenter2'>"+responce.responseText+"</span>");
					$(".fa-spinner-inn").hide();
				});
		   });
			
			$(".rezidentRadio").click(function() {
			   $("#RPrezident").val( $("input:radio:checked").val() );
			   $(".imKontragentForm input[type=text]").val("");
			   
			   
			   if ($("input:radio:checked").val() == "yes")
			   {
				   $(".serchFoINN").show();
				   $(".imKontragentForm").hide();
				   $(".imKontragentForm input[type=text]").attr("readonly");
			   } else {
				   $(".serchFoINN").hide();
				   $(".imKontragentForm").show();
				   $(".imKontragentForm input[type=text]").removeAttr("readonly");
			   }
			    
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
			
					<div style = "min-height: 700px;" id = "sek1"  class = "lineSek line linePad">			
						<div class = "lineCenter">
							<div class = "magazSectionInMenu">
							<?php include("template-parts/magazin-Menu2.php");?>
							
							<div class = "magContent">
								
								
				
								<?php 		
									if ($rez)
									{
								?>
									<h2>Все контрагенты</h2>
									<?php 
										global $wpdb;
										$rez = $wpdb->get_results("SELECT * FROM `wp_im_contragent` WHERE `RPemail` = '".getSalerData("mail")."'");
										
									?>
									
									<div class = "product-main__table">
										<table class = " " >
											<thead>
												<tr class = "t-head-light thead-img">
													<th>Организация</th>
													<th>Контактное лицо</th>
													<th>ИНН</th>
													<th>КПП</th>
													<th>Резидент РФ</th>
													<th >Управление</th>
													
												</tr>
											</thead>
											<tbody>	
												<?php
													$rezOsnContr = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail` = '".getSalerData("mail")."'");
												?>
												<tr style = "background-color:lightgray;" >
														<td><?php echo stripcslashes (htmlspecialchars ($rezOsnContr[0]->RPorg,ENT_QUOTES)); ?></td>
														<td><?php echo $rezOsnContr[0]->RPsname." ".$rezOsnContr[0]->RPname." ".$rezOsnContr[0]->RPfname; ?></td>
														<td><?php echo isset($rezOsnContr[0]->RPinn)?$rezOsnContr[0]->RPinn:""; ?></td>
														<td><?php echo $rezOsnContr[0]->RPkpp; ?></td>
														<td>Да</td>
														<td>Основной</td>
												</tr>
											
												<?php
												foreach ($rez as $r) {
												?>
													
												
													<tr class = "trContragen <?php echo (($r->moderate == 0)?"trContragenNa":"" );?>" title = "<?php echo (($r->moderate == 0)?"Контрагент не активирован":"Контрагент активен" );?>">
														<td><?php echo stripcslashes($r->RPorg); ?></td>
														<td><?php echo $r->RPsname." ".$r->RPname." ".$r->RPfname; ?></td>
														<td><?php echo isset($r->RPinn)?$r->RPinn:""; ?></td>
														<td><?php echo $r->RPkpp; ?></td>
														<td><?php echo empty($r->Rezedent)?"Нет":"Да"; ?></td>
														<td>
															<div data-id="<?php echo $r->id; ?>" class="dellContragent imTableBtn clearBtn" id="clearBtn<?php echo $r->id; ?>"></div>
														</td>
													</tr>								
												<?php
												}
												?>
											</tbody>	
										</table>
									</div>
									
									<h2>Добавить контрагента</h2>
									<div class = "rezidentForm">
										<h4>Вы являетесь резидентом Российской Федерации?</h4>
										<form class = "rezidentForm">
											<div class = "radio-wrapper"> 
												<input <?php if (isset($_POST['RPrezident'])&&($_POST['RPrezident'] == "yes")) echo "checked"; ?>  class = "rezidentRadio" id = "rezidentRadioYes" type="radio" name="rezident" value="yes"> 
												<label for = "rezidentRadioYes" class = "radioLabel" style = "margin-left:5px;">Да</label>  
											</div>
											
											<div class = "radio-wrapper">
												<input <?php if (isset($_POST['RPrezident'])&&($_POST['RPrezident'] == "no")) echo "checked"; ?> id = "rezidentRadioNo" class = "rezidentRadio" type="radio" name="rezident" value="no" style = "margin-left:30px;"> 
												<label for = "rezidentRadioNo"  class = "radioLabel" style = "margin-left:5px;">Нет</label>
											</div>
										</form>
									</div>
									
									
									
									<div class = "serchFoINN">
										<form action="" method="post">
											<input type="text" id="SerchInn" name="SerchInn" placeholder = "Введите ИНН для поиска" value = "<?php echo isset($_POST["SerchInn"])?$_POST["SerchInn"]:""; ?>" />
											<input class = "trueButton" type="button" name="submitGetINN" id = "submitGetINN"  value="Найти контрагента"> <i class="fa-spinner-inn fa fa-spinner fa-pulse fa-3x fa-fw"></i>
										</form>
									</div>
								
									<div style = "display: inline-block;" id = "RMerrs" class = "RMerrs"> </div>
								
									<div style = "display:none;" class = "imKontragentForm">
										 <div class = "marketLoginFormWriper marketKabinetFormWriper">
											 <form class = "kontragentForm RMarketLoginForm RMarketRegForm" name = "RMformS" action="" method="post" >
													
													<input  type="hidden" id="RPrezident" name="RPrezident" value = "" />
													<input  type="hidden" id="RPtypeul" name="RPtypeul" value = "" />
													
													<div class = "form-block">
														<label  class = "blaclLabel" for = "RPsname">Фамилия<span class="color-red">*</span></label>
														<input readonly type="text" id="RPsname" name="RPsname" value = "<?php echo isset($rezMas['RPsname'])?$rezMas['RPsname']:""; ?>" />
													</div>
													
													<div class = "form-block">
														<label  class = "blaclLabel" for = "RPname">Имя<span class="color-red">*</span></label>
														<input readonly type="text" id="RPname" name="RPname" value = "<?php echo $rezMas['RPname']; ?>" />
													</div>
													
													<div class = "form-block">
														<label  class = "blaclLabel" for = "RPfname">Отчество</label>
														<input readonly type="text" id="RPfname" name="RPfname" value = "<?php echo $rezMas['RPfname']; ?>" />
													</div>
													
													<div class = "form-block">
														<label  class = "blaclLabel" for = "RPorg">Организация<span class="color-red">*</span></label>
														<input readonly type="text" id="RPorg" name="RPorg" value = "<?php echo stripcslashes (htmlspecialchars ($rezMas['RPorg'],ENT_QUOTES)); ?>" />
													</div>
													
													<div class = "form-block">
														<label  class = "blaclLabel" for = "RPorg">ИНН<span class="color-red">*</span></label>
														<input readonly type="text" id="RPinn" name="RPinn" value = "<?php echo $rezMas['rezerv']; ?>" />
													</div>
													
													<div class = "form-block">
														<div class = "shovedKpp">
															<label class = "blaclLabel" for = "RPorg">КПП<span class="color-red">*</label></span>
															<input readonly type="text" id="RPkpp" name="RPkpp" value = "<?php echo $rezMas['rezerv']; ?>" />
														</div>
													</div>
													
													<div class="RMarketLoginFormLine">
													<span class = 'RMrtext'><span class="color-red">*</span>Поля обязательные для заполнения</span><br/>
													<input type="button" class = "trueButton" name="submitData" id="imAddContragentButton" value = "Добавить">
													</div>
																
											</form>
										</div>				
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
