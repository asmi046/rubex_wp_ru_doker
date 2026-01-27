<?php
/*
* Template Name: Магазин РТИ - Активация пользователя
*/

// обновление цен
// header( 'Refresh: 0; url='.get_permalink( 22202 ) );
// return;
?>


<?
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">

				
				<div class = "products lineCenter thisContent">	
						<?php  
							
								
						?>
							<h1>Активация контрагента E-mail: <?php echo $_REQUEST['mail']; ?> как: <?php echo ($_REQUEST['typeOfSaler'] == 1)?"Потребителя":"Посредника"; ?> </h1>
							<form action = "" method = "get">
								<input type = "hidden" name = "mail" value = "<?php echo $_REQUEST['mail']; ?>"/>
								<input type = "hidden" name = "typeOfSaler" value = "<?php echo $_REQUEST['typeOfSaler']; ?>"/>
								<input style = "margin-bottom: 20px;" type = "text" id = "caID" required name = "caID" placeholder = "ID контрагента а 1C"><br/>
								<input class = "redBtn" type = "submit" name = "addCaToBase"  value = "Добавить контрагента">
							</form>
							<div style = "float:left; width:100%;" >
						<?php
							if(isset($_REQUEST['caID'])) 
							{
								if (isset($_REQUEST['addCaToBase']))
								{
									if (empty($_REQUEST['caID'])) die("Введите ID контрагента из 1C");
										
										$typeOfSaler = 1;
										if (isset($_REQUEST['typeOfSaler']))
											$typeOfSaler = $_REQUEST['typeOfSaler'];	
										
										
										global $wpdb;
										$caInfo = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".$_REQUEST['mail']."' ", ARRAY_A);		
										
										if (!empty($caInfo)) {
											$wpdb->update("wp_rubex_price",
															array(
																	"moderate" => $typeOfSaler,
																	"conragent_id" => $_REQUEST['caID']
																 ),
															array ("RPemail" => $_REQUEST['mail'])
											);
										
											 $headers2 = 'From: RubEx Price <contact@rubexgroup.ru>' . "\r\n";
											  $mailContent2 = "Уважаемый пользовательсервиса Rubex Price,<br/>".
											  "Ваша заявка на нового контрагента одобрена.<br/><br/>".
											  "<h4>Данные контрагента:</h4>.<br/>".
											  "<b>Организация:</b> ".$caInfo[0]["RPorg"].".<br/>".
											  "<b>ИНН:</b> ".$caInfo[0]["RPinn"].".<br/>".
											  "<b>КПП:</b> ".$caInfo[0]["RPkpp"].".<br/>".
											  "<b>Резидент РФ:</b> ".($caInfo[0]["Rezedent"] != 0?"Да":"Нет").".<br/>".
											  "Теперь Вы сможете оформлять заказы в сервисе RubEx Price используя данные этого контрагента".
											 
											 "С уважением, <br/>".
											  "компания RubexGroup<br/>".
											  '<a href = "http://rubexgroup.ru">rubexgroup.ru</a><br/><br/>'.
											  "<img width = '172' height = '73'  src = 'http://rubexgroup.ru/wp-content/themes/rgn/images/rubexMarket/RMlogoSmall.png'/>";
											  
											  $sabj = "Добавлен новый контрагент";
											 
										
										}
										
										
										  
										 

										  add_filter( 'wp_mail_content_type', 'set_html_content_type' );
											
										  
										  wp_mail(array($_REQUEST['mail']), $sabj, $mailContent2, $headers2);							
											
										echo "Активация контрагента прошла успешно!";
								}
									
								} else "Нет никого кого бы можно было активировать!";
							?>
					</div>
				</div>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
