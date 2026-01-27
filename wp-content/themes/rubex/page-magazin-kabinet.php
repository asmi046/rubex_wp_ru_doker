<?php
if (isset($_REQUEST["imOut"]))
{
		SetCookie('RPlogin2', "", -3600, "/", "rubexgroup.ru");
		header( 'Refresh: 0; url='.get_permalink(20700)  );	
}

/*
* Template Name: Магазин РТИ - Личный кабинет
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
		
			jQuery("#slatNeSlat").change(function(){
				jQuery("#phone").attr("disabled",!jQuery("#phone").attr("disabled"));
				
				if (jQuery("#phone").attr("disabled")) {
					jQuery("#phone").val("");
					jQuery("#saveSetings").click();
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
			
				
	<?php 
		$tovarGroup = isset($_GET["tovarGroup"])?$_GET["tovarGroup"]:"";
	?>
	
	<div style = "min-height: 700px;" id = "sek1"  class = "lineSek line linePad">			
		<div class = "lineCenter">
			<div class = "magazSectionInMenu">
			<?php include("template-parts/magazin-Menu2.php");?>


			
			<div class = "magContent">
				
						<div class = "magazLnk">
							<a class = "kabinetBtn2a" id = "regDataBtn"  href = "<?php echo get_permalink(20748);?>">Регистрационные данные</a>
							<a class = "kabinetBtn2a" id = "contragentBtn" href = "<?php echo get_permalink(20746);?>">Мои контрагенты</a>
							<a class = "kabinetBtn2a" id = "zakhistoryBtn" href = "<?php echo get_permalink(20744);?>">История заказов</a>
						</div>
						
						
						<?php 		
							if ($rez)
							{
								global $wpdb;
								if (isset($_POST["saveSetings"]))
								{
									// ------ сохранение настроек
									$wpdb->delete( 'wp_im_salesetings', array( 'RPemail' => getSalerData("mail") ) );
									$wpdb->insert( 'wp_im_salesetings', 
													array( 
														'RPemail' => getSalerData("mail"), 
														'defaultSklad' => $_REQUEST["sklad"],
														'defaultKontragent' => $_REQUEST["contragentsList"],
														'sms_number' => (empty($_REQUEST["smsphone"]))?"":$_REQUEST["smsphone"],
													) 
												);
									//$wpdb->show_errors(); // включит показ ошибок
									//$wpdb->print_error();
									//$wpdb->hide_errors(); // выключит показ ошибок
									
									echo "<div class = 'shopMsg'><h2>Данные успешно сохранены!</h2><br/>";
									echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Перейти в магазин</a>';
									echo "</div>";
								}
								
								
								$allRez = $wpdb->get_results("SELECT * FROM `wp_im_salesetings` WHERE `RPemail` = '".getSalerData("mail")."'", ARRAY_A);
								$defCa = isset($allRez[0]["defaultKontragent"])?$allRez[0]["defaultKontragent"]:"";
								$defSkl = isset($allRez[0]["defaultSklad"])?$allRez[0]["defaultSklad"]:"";
								$sms_number = isset($allRez[0]["sms_number"])?$allRez[0]["sms_number"]:"";
						?>
						
						
						<form id = "interfaceSetings" name = "interfaceSetings" method = "post">
							<div style = "display:none;">
							<h2 style = "display: inline-block; width:100%;">SMS рассылка</h2>
							<input style = "width:30%;" id="phone" name="smsphone" value="<?php echo $sms_number;?>" type="text" <?php if (empty($sms_number)) echo "disabled"; ?> > 
							<input style = "margin-top: 0!important; margin-left: 10px; height: 37px;" class = "redBtn" id = "saveSetings" type = "submit" name = "saveSetings" value = "Сохранить">
							<div style = "width:100%; float:left;">
								<input style = "width:1.8%; margin-right: 1%;" id="slatNeSlat" type="checkbox" name = "slatNeSlat" <?php if (!empty($sms_number)) echo "checked"; ?> > <label style = "width:90%; line-height: 40px; " for = "slatNeSlat"> Я даю согласие на SMS информирование по заказам из личного кабинета</label>
								
							</div>
							</div>
							<h2 style = "display: inline-block; width:100%;">Настройки интерфейса магазина</h2>
							<div class = "form-block">
								<label for = "sklad" class = "blaclLabel" style = "width:100%;">Склад по умолчанию</label>
								<div style = "" class = "selectorWhiperInForm select-wrap">
											<select id = "sklad" name = "sklad" >
												<?php
													$sklads = $wpdb->get_results("SELECT * FROM `wp_im_sklad_transfer` ", ARRAY_A);
													foreach ($sklads as $sklad) {
													?>
														<option value = "<?php echo $sklad["name"]; ?>" <?php if ($sklad["name"] === $defSkl) echo "selected"; ?>><?php echo $sklad["name"]; ?></option>
													<?php
													}
												?>
											</select>
											<div class = "selectBtn"></div>
								</div>
							</div>
							<div class = "form-block">
								<label for = "contragentsList"  class = "blaclLabel" style = "width:100%;">Контрагент по умолчанию</label>
								<div style = "" class = "selectorWhiperInForm select-wrap">
										<select id = "contragentsList" name = "contragentsList" >
											<?php
												$kontragent = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".getSalerData("mail")."'", ARRAY_A);
												foreach ($kontragent as $ktr) {
												?>
													<option value = "-1" <?php if ($defCa == -1) echo "selected"; ?>><?php echo stripcslashes (htmlspecialchars ($ktr["RPorg"],ENT_QUOTES)); ?> (Основной)</option>
												<?php
												}
												
												$kontragents = $wpdb->get_results("SELECT * FROM `wp_im_contragent` WHERE `RPemail`='".getSalerData("mail")."'", ARRAY_A);
												foreach ($kontragents as $ktr) {
												?>
													<option <?php echo (($ktr["moderate"] == 0)?"disabled":"" );?> value = "<?php echo $ktr["id"]; ?>" <?php if ($ktr["id"] == $defCa) echo "selected"; ?>><?php echo stripcslashes (htmlspecialchars ($ktr["RPorg"],ENT_QUOTES)); ?></option>
												<?php
												}
											?>
										</select>
										<div class = "selectBtn"></div>
									
									</div>
								</div>
								
								<div class = "formButtonLine">	
									<input class = "trueButton" type = "submit" name = "saveSetings" value = "Сохранить">
								</div>
						</form>
								
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
