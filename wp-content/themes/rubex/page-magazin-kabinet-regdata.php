<?php
if (isset($_REQUEST["imOut"]))
{
		SetCookie('RPlogin2', "", -3600, "/", "rubexgroup.ru");
		header( 'Refresh: 0; url='.get_permalink(20700)  );	
}

/*
* Template Name: Магазин РТИ - Личный кабинет - регистрационные данные
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
		$(document).ready(function() {
			
			
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
			
				<div style = "min-height: 700px;" id = "sek1"  class = "lineSek line linePad">			
					<div class = "lineCenter">
						<div class = "magazSectionInMenu">
						<?php include("template-parts/magazin-Menu2.php");?>

							<?php 		
								if ($rez)
								{
									$submitData=isset($_POST['submitData'])?$_POST['submitData']:null;
									$submitPass=isset($_POST['submitPass'])?$_POST['submitPass']:null;
									$checedFild = "";
									$errors = true;
									
									
									if (isset($submitPass)){
										$RPPasword = isset($_POST['RPPasword'])?$_POST['RPPasword']:"";
										if ($RPPasword == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Пароль обязательное для заполнения</span>";		
										}
										
										$RPPasword2 = isset($_POST['RPPasword2'])?$_POST['RPPasword2']:"";
										if ($RPPasword2 == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Пароль должно быть заполненно дважды.</span>";		
										}
										
										if ($RPPasword2 != $RPPasword)
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Пароли не совпадают.</span>";		
										}
										
										if	(!$errors)
										{
											echo "<span class = 'RMrtext'>При заполнении формы резистрации Вами допущенны следующие ошибки:</span><br/>";
											echo "<div class = 'RMerrs'>".$checedFild."</div>";
										} else { 
											global $wpdb; 
											$rezinput = $wpdb->update(
															"wp_rubex_price",
															array (
																"RPPasword" => $RPPasword,
															),
															array ("RPemail" => $_COOKIE['RPlogin']),
															array ('%s'),
															array ('%s')
															
															
														);
														
											if ($rezinput)
											{	
												echo "<div class = 'shopMsg'><h2>Пароль успешно изменен!</h2><br/>";
												echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Перейти в магазин</a>';
												echo "</div>";
											}
											else
											{
												echo "<div class = 'shopMsg shopMsgErr'><h2>!</h2><br/>";
												echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Перейти в магазин</a>';
												echo "</div>";
											}
										}
										
									}
										
									
									
									if(isset($submitData)) 
									{	
										$RPname = isset($_POST['RPname'])?$_POST['RPname']:"";
										if ($RPname == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Имя обязательное для заполнения.</span>";		
										}
										
										$RPsname = isset($_POST['RPsname'])?$_POST['RPsname']:"";	
										if ($RPsname == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Фамилия обязательное для заполнения.</span>";		
										}
										
										$RPfname = isset($_POST['RPfname'])?$_POST['RPfname']:"";
									
										$RPorg = isset($_POST['RPorg'])?$_POST['RPorg']:"";
										if ($RPorg == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Организация обязательное для заполнения.</span>";		
										}
										
										$RPinn = isset($_POST['RPinn'])?$_POST['RPinn']:"";
										if ($RPinn == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле ИНН обязательное для заполнения.</span>";		
										}
									
										
										$RPotr = isset($_POST['RPotr'])?$_POST['RPotr']:"";	
										$RPdolg = isset($_POST['RPdolg'])?$_POST['RPdolg']:"";	
										if ($RPdolg == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Должность обязательное для заполнения.</span>";		
										}				

										$RPstrana = isset($_POST['RPstrana'])?$_POST['RPstrana']:"";	
										$RPregion = isset($_POST['RPregion'])?$_POST['RPregion']:"";	
											
										$RPphone = isset($_POST['RPphone'])?$_POST['RPphone']:"";
										if ( $RPphone == "")
										{
											$errors = false;
											$checedFild = $checedFild."<span class = 'RMerr RMerrCenter2'>Поле Телефон обязательное для заполнения.</span>";		
										}
										
										if	(!$errors)
										{
											echo "<div class = 'shopMsg shopMsgErr'><h2>Допущены следующие ошибки:</h2><br/>";
											echo $checedFild;
											echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Перейти в магазин</a>';
											echo "</div>";
											
										} else { 
											global $wpdb; 
											$rezinput = $wpdb->update(
															"wp_rubex_price",
															array (
																"RPname" => $RPname,
																"RPsname" => $RPsname,
																"RPfname" => $RPfname,
																"RPorg" => $RPorg,
																"rezerv" => $RPinn,
																"RPotr" => $RPotr,
																"RPdolg" => $RPdolg,
																"RPstrana" => $RPstrana,
																"RPregion" => $RPregion,
																"RPphone" => $RPphone,
																
															),
															array ("RPemail" => getSalerData("mail")),
															array ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'),
															array ('%s')
															
															
														);
														
														
														//$wpdb->show_errors(); // включит показ ошибок
														//$wpdb->print_error();
														//$wpdb->hide_errors(); // выключит показ ошибок
														
											if ($rezinput)
											{	
												echo "<div class = 'shopMsg'><h2>Данные успешно сохранены!</h2><br/>";
												echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Перейти в магазин</a>';
												echo "</div>";
											}
											else
											{
												echo "<div class = 'shopMsg shopMsgErr'><h2>Произошла ошибка попробуйте позднее!</h2><br/>";
												echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Перейти в магазин</a>';
												echo "</div>";
											}	
										}
										
									}
									global $wpdb; 		
									$rezMas = $wpdb->get_row("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".getSalerData("mail")."'", ARRAY_A);				
							?>
								<div class = "magContent">				
									<h2 class = "restorePassSpan registerSpan">Данные пользователя</h2>
 
									<div class = "marketLoginFormWriper marketKabinetFormWriper">
										 <form class = "RMarketLoginForm RMarketRegForm" name = "RMformS" action="" method="post" >

												
												<label class="blaclLabel" for = "RPsname">Фамилия<span class="color-red">*</span></label>
												<input type="text" id="RPsname" name="RPsname" value = "<?php echo $rezMas['RPsname']; ?>" />
												
												<label class="blaclLabel" for = "RPname">Имя<span class="color-red">*</span></label>
												<input type="text" id="RPname" name="RPname" value = "<?php echo $rezMas['RPname']; ?>" />
												
												<label class="blaclLabel" for = "RPfname">Отчество</label>
												<input type="text" id="RPfname" name="RPfname" value = "<?php echo $rezMas['RPfname']; ?>" />
												
												<label class="blaclLabel" for = "RPorg">Организация<span class="color-red">*</span></label>
												<input type="text" id="RPorg" name="RPorg" value = "<?php echo stripcslashes (htmlspecialchars ($rezMas['RPorg'],ENT_QUOTES)); ?>" />
												
												<label class="blaclLabel" for = "RPorg">ИНН<span class="color-red">*</span></label>
												<input type="text" id="RPinn" name="RPinn" value = "<?php echo $rezMas['rezerv']; ?>" />
												
												<label class="blaclLabel" for = "RPotr">Отрасль</label>
												<input type="text" id="RPotr" name="RPotr" value = "<?php echo stripcslashes (htmlspecialchars ($rezMas['RPotr'],ENT_QUOTES)); ?>" />
												
												<label class="blaclLabel" for = "RPdolg">Должность<span class="color-red">*</span></label>
												<input type="text" id="RPdolg" name="RPdolg"  value = "<?php echo stripcslashes (htmlspecialchars ($rezMas['RPdolg'],ENT_QUOTES)); ?>"/>
												
												<label class="blaclLabel" for = "RPstrana">Страна</label>
												<input type="text" id="RPstrana" name="RPstrana" value = "<?php echo $rezMas['RPstrana']; ?>" />
												
												<label class="blaclLabel" for = "RPregion">Регион</label>
												<input type="text" id="RPregion" name="RPregion" value = "<?php echo $rezMas['RPregion']; ?>" />
												
												<label class="blaclLabel" for = "RPphone">Телефон<span class="color-red">*</span></label>
												<input type="text" id="RPphone" name="RPphone" value = "<?php echo $rezMas['RPphone']; ?>" />
															


												<div class="RMarketLoginFormLine">
												<span class = 'RMrtext'><span class="color-red">*</span>Поля обязательные для заполнения</span><br/>
												<input class = "trueButton" type="submit" name="submitData" id="submit" value="Изменить">
												</div>
												
															
										</form>
									</div>
										
									<h2 class = "restorePassSpan kabinetSpan">Сменить пароль</h2>

									<div class = "marketLoginFormWriper marketKabinetFormWriper">
										<form class = "RMarketLoginForm RMarketRegForm" name = "RMformS" action="" method="post" >
											<label class="blaclLabel" for = "RPPasword">Пароль<span class="color-red">*</span></label>
											<input type="password" id="RPPasword" name="RPPasword" value = "" />
											<label class="blaclLabel" for = "RPPasword2">Повторите пароль<span class="color-red">*</span></label>
											<input type="password" id="RPPasword2" name="RPPasword2" value = "" />
											<input class = "trueButton" type="submit" name="submitPass" id="submit" value="Изменить">
										</form>
									</div>	
									<p class="note-form">Нажимая на кнопку "Изменить", вы соглашаетесь с условиями <a href="<?php echo get_permalink(18041);?>" target="_blank">обработки персональных данных</a>.</p>
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
