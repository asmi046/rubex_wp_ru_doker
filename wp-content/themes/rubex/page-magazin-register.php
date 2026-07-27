<?php
/*
* Template Name: Магазин РТИ - Регистрация в сервисе
*/

// обновление цен
// header( 'Refresh: 0; url='.get_permalink( 22202 ) );
// return;
?>


<?
get_header();
?>


<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", () => { 
			submitGetINN.addEventListener("click", function (e) { 
				
				RMerrs.innerHTML = ""

				var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party";
				var token = "<?php echo defined('DADATA_TOKEN') ? DADATA_TOKEN : ""; ?>";

				var xhr = new XMLHttpRequest();
                
				xhr.open("POST", url, true);
				
				xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("Accept", "application/json");
                xhr.setRequestHeader("Authorization", "Token " + token);

                xhr.onload = function () {
                    console.log("SEND!")
					let result = JSON.parse(xhr.response);
                    console.log(result)



					RPinn.value = result.suggestions[0].data.inn
					
					RPorg.value = result.suggestions[0].unrestricted_value

					
					if (result.suggestions[0].data.type == "INDIVIDUAL") {
						RPsname.value = result.suggestions[0].data.fio.surname
						RPname.value = result.suggestions[0].data.fio.name
						RPfname.value = result.suggestions[0].data.fio.patronymic
						document.querySelector(".shovedKpp").style.display = "none"
						RPtypeul.value = 'individ'
					}	else {
						let nameFull = result.suggestions[0].data.management.name.split(' ')
						
						RPsname.value = nameFull[0]
						RPname.value = nameFull[1]
						RPfname.value = nameFull[2]

						RPkpp.value = result.suggestions[0].data.kpp
						document.querySelector(".shovedKpp").style.display = "block"
						RPtypeul.value = 'corp'
					}
					
					RPtypeul.value = result.suggestions[0].data.type
					
					document.querySelector(".imRegForm").style.display = "block"
                };

                xhr.send(JSON.stringify({query: SerchInn.value}));
			})
	})
		
		jQuery(document).ready(function($){
	   
		   $("#imRegistrButton").click(function() { 
				$("#RMerrs").html("");
				$(".fa-spinner-reg").css("display","inline-block");
				
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'add_im_user',
						nonce: allAjax.nonce,
						RPemail: $("#RPemail").val(),
						RPsname: $("#RPsname").val(),
						RPname: $("#RPname").val(),
						RPfname: $("#RPfname").val(),
						RPdolg: $("#RPdolg").val(),
						RPPasword: $("#RPPasword").val(),
						RPPasword2: $("#RPPasword2").val(),
						RPinn: $("#RPinn").val(),
						RPkpp: $("#RPkpp").val(),
						RPorg: $("#RPorg").val(),
						RPotr: $("#RPotr").val(),
						RPstrana: $("#RPstrana").val(),
						RPregion: $("#RPregion").val(),
						RPphone: $("#RPphone").val(),
						RPtypeul: $("#RPtypeul").val(),
						RPrezident: $("#RPrezident").val(),
						
						RPcapsha: $("#RPcapsha").val(),
						CHPrefix: $("#CHPrefix").val()
					}
				);
				
						
				jqXHR.done(function (responce) {
					$("#RMerrs").html("<h2>"+responce+"</h2> ");
					$(".imRegForm").hide();
					$(".fa-spinner-reg").hide();
					$(".rezidentForm").hide();
					$(".serchFoINN").hide();
					$("#imReturnBtn").show();
				});

				
				jqXHR.fail(function (responce) {
					console.log(responce);
					$("#RMerrs").html("<span class = 'RMerr RMerrCenter2'>"+responce.responseText+"</span>");
					$(".fa-spinner-reg").hide();
					$("#RPcapsha").val("");
					var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
						{
							action: 'new_capcha',
							nonce: allAjax.nonce
						}
					).done(function(responce) {
						rez = responce.split("|");
						$("#CHPrefix").val(rez[1]);
						$("#RMchImg").attr('src', rez[0]);
					}) ;
				});
				
		   });
		   
		   
		//    $("#submitGetINN").click(function() { 
		// 		$("#RMerrs").html("");
		// 		$(".fa-spinner-inn").css("display","inline-block");
				
		// 		var  jqXHR = jQuery.post(
		// 			allAjax.ajaxurl,
		// 			{
		// 				action: 'get_inn_info',
		// 				nonce: allAjax.nonce,
		// 				SerchInn: $("#SerchInn").val()
		// 			}
		// 		);
				
				
				
		// 		// Обработка успешного запроса
		// 		jqXHR.done(function (responce) {
		// 			console.log(responce);
		// 			var innresrez = JSON.parse(responce);
		// 			$("#RPsname").val(innresrez["F"]);
		// 			$("#RPname").val(innresrez["I"]);
		// 			$("#RPfname").val(innresrez["O"]);
		// 			$("#RPinn").val(innresrez["inn"]);
		// 			$("#RPkpp").val(innresrez["kpp"]);
		// 			$("#RPorg").val(innresrez["name"]);
					
		// 			if (innresrez["type"] == "individ") {
		// 				$(".shovedKpp").hide();
		// 			}	else {
		// 				$(".shovedKpp").show();
		// 			}
					
		// 			$("#RPtypeul").val(innresrez["type"]);
					
		// 			$(".imRegForm").show();
		// 			$(".fa-spinner-inn").hide();
		// 		});

		// 		// Обработка запроса с ошибкой
		// 		jqXHR.fail(function (responce) {
		// 			$("#RMerrs").html("<span class = 'RMerr RMerrCenter2'>"+responce.responseText+"</span>");
		// 			$(".fa-spinner-inn").hide();
		// 		});
		//    });
		   
		   $(".rezidentRadio").click(function() {
			   $("#RPrezident").val( $("input:radio:checked").val() );
			   
			   if ($("input:radio:checked").val() == "yes")
			   {
				   $(".serchFoINN").show();
				   $(".imRegForm").hide();
			   } else {
				   $(".imRegForm").show();
				   $(".serchFoINN").hide();
			   }
			   
			
			   
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
				
				<p>Приветствуем Вас в сервисе по оптовой продаже РТИ производства RubEx Group. Обращаем Ваше внимание, в нашем сервисе могут зарегистрированы только юридические&nbsp; лица (в том числе&nbsp; ИП). Указывайте при регистрации только действительный ИНН это позволит быстрее идентифицировать Вас как клиента.</p>
				
				<div class="marketFormZone marketRegFormZone">
					<div class="rezidentForm">
						<h2>Вы являетесь резидентом Российской Федерации?</h2>
						<form class="rezidentForm">
							
							 
							<div class="radio-wrapper">
								<input class="rezidentRadio" id="rezidentRadioYes" type="radio" name="rezident" value="yes"> 
								<label for="rezidentRadioYes"  class="radioLabel">Да</label>  
							</div>
							
							<div class="radio-wrapper">
								<input id="rezidentRadioNo" class="rezidentRadio" type="radio" name="rezident" value="no" style="margin-left:30px;"> 
								<label for="rezidentRadioNo" class="radioLabel">Нет</label>
							</div>
							
						</form>
					</div>
				
					<div class="serchFoINN">
						<form action="" method="post">
							<div class = "form-block">
								<label for = "SerchInn" class = "blaclLabel" >Введите ИНН для поиска</label>
								<input type="text" id="SerchInn" name="SerchInn" placeholder="ИНН" value="">
							</div>
							<div class = "button-wrapper">
								<input class="trueButton" type="button" name="submitGetINN" id="submitGetINN" value="Найти контрагента"> <i class="spinner-inn"></i>
							</div>
						</form>
					</div>
				
				<div id="RMerrs" class="RMerrs"> </div>
				
					
				
				 <div class="imRegForm">
				 
				 <div class="marketLoginFormWriper marketRegFormWriper" style="width:100%;">
					 <form class="form2side" name="RMformS" action="" method="post">
							<!-- Скрытый элемент для резерва -->
							<input type="hidden" id="RPrezident" name="RPrezident" value="">
							<input type="hidden" id="RPtypeul" name="RPtypeul" value="">
							
							<div class="formSide formSideLeft">
								<h3 class="registerFormTrunc">Данные пользователя</h3><br>
								
								<div class = "form-block">
									<label for="RPemail"  class = "blaclLabel" >e-mail<span class="color-red">*</span></label>
									<input type="text" id="RPemail" name="RPemail" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPsname"  class = "blaclLabel" >Фамилия<span class="color-red">*</span></label>
									<input type="text" id="RPsname" name="RPsname" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPname"  class = "blaclLabel" >Имя<span class="color-red">*</span></label>
									<input type="text" id="RPname" name="RPname" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPfname"  class = "blaclLabel" >Отчество</label>
									<input type="text" id="RPfname" name="RPfname" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPdolg"  class = "blaclLabel" >Должность</label>
									<input type="text" id="RPdolg" name="RPdolg" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPPasword"  class = "blaclLabel">Пароль<span class="color-red">*</span></label>
									<input type="password" id="RPPasword" name="RPPasword" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPPasword2"  class = "blaclLabel">Повторите пароль<span class="color-red">*</span></label>
									<input type="password" id="RPPasword2" name="RPPasword2" value="">
								</div>
							</div>
							

							<div class="formSide formSideRight">
								<h3 class="registerFormTrunc">Данные организации</h3><br>
								
								<div class = "form-block">
									<label for="RPorg" class = "blaclLabel">ИНН<span class="color-red">*</span></label>
									<input type="text" id="RPinn" name="RPinn" value="">
								</div>
								
								<div class="shovedKpp">
									<div class = "form-block">
										<label for="RPkpp" class = "blaclLabel">КПП<span class="color-red">*</span></label>
										<input type="text" id="RPkpp" name="RPkpp" value="">
									</div>
								</div>
								
								<div class = "form-block">
									<label for="RPorg" class = "blaclLabel">Организация<span class="color-red">*</span></label>
									<input type="text" id="RPorg" name="RPorg" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPotr" class = "blaclLabel">Отрасль</label>
									<input type="text" id="RPotr" name="RPotr" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPstrana" class = "blaclLabel">Страна</label>
									<input type="text" id="RPstrana" name="RPstrana" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPregion" class = "blaclLabel">Регион</label>
									<input type="text" id="RPregion" name="RPregion" value="">
								</div>
								
								<div class = "form-block">
									<label for="RPphone" class = "blaclLabel">Телефон<span class="color-red">*</span></label>
									<input type="text" id="RPphone" name="RPphone" value="">
								</div>
							</div>

										
					
						<div class = "RMarketLoginFormCapBox">
							<?php
								
								// $captcha_instance = new ReallySimpleCaptcha();
								// $captcha_instance->bg = array( 255, 255, 255 );
								// $word = $captcha_instance->generate_random_word();
								
								// $prefix = mt_rand();
								// echo "<label for = 'RPcapsha' class = 'RMrtext blaclLabel'>Введите текст с картинки</label><br/><br/>";
								// echo "<img id = 'RMchImg' src = '".get_site_url()."/wp-content/plugins/really-simple-captcha/tmp/".$captcha_instance->generate_image( $prefix, $word )."'/>";
								// echo '<div class = "form-block">';
								// echo '<input placeholder = "Капча" type="text" id="RPcapsha" name="RPcapsha" />';
								// echo '</div>';
								
								// echo '<input id = "CHPrefix" type="hidden" name="CHPrefix" value="'.$prefix.'"/>';
								
							?>
						</div>
					
					
					<div class="RMarketLoginFormLine">
						
						<span class="RMrtext note">*Поля обязательные для заполнения</span><br>

						<input class="trueButton" type="button" name="imRegistrButton" id="imRegistrButton" value="Регистрация"> <i class="fa-spinner-reg fa fa-spinner fa-pulse fa-3x fa-fw"></i>
					</div>
					<p class="note-form">Нажимая на кнопку "Регистрация", вы соглашаетесь с условиями <a href="https://rubexgroup.ru/policy/" target="_blank">обработки персональных данных</a>.</p>
										
					</form>
				</div>

				</div>			
			</div>
				<?php 

						$showForm = true;
					
						if(isset($_POST['submit'])) 
						{
							$showForm = false;

							if	($errors)
							{
								echo "<span class = 'RMrtext'>".pll__("При заполнении формы резистрации Вами допущенны следующие ошибки").":</span><br/>";
								echo "<div class = 'RMerrs'>".$checedFild."</div>";
								$showForm = true;
							} else {
							
							$personalSale = 0;
							$personalSaleSZRT = 0;
							$conragent_id = "";
							
							  $db = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD); 
							  mysql_select_db(DB_NAME ,$db);
							 
							  mysql_query("SET NAMES 'utf8'"); 
							  mysql_query("SET CHARACTER SET 'utf8'");
							  mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
							 
							  $sql = mysql_query("INSERT INTO `wp_rubex_price` (`moderate`, `regdata`, `RPlogin`, `RPPasword`, `RPname`, `RPsname`, `RPfname`, `RPorg`, `RPotr`, `RPdolg`, `RPstrana`, `RPregion`, `RPphone`, `RPemail`, `personalSale`, `conragent_id`, `personalSaleSZRT`, `rezerv`)".
												" VALUES ('0', CURRENT_TIMESTAMP, '".$RPlogin."', '".$RPPasword."', '".$RPname."', '".$RPsname."', '".$RPfname."', '".$RPorg."', '".$RPotr."', '".$RPdolg."', '".$RPstrana."', '".$RPregion."', '".$RPphone."', '".$RPemail."', '".$personalSale."', '".$conragent_id."', '".$personalSaleSZRT."', '".$RPinn."');" ,$db);
							  
							  if (!$sql) {
									echo "<span class = 'RMrtext'>К сожалению регистрация невозможна:</span><br/>";
									echo "<div class = 'RMerrs'><span class = 'RMerr RMerrCenter2'>".pll__("Пользователь с электронной почтой")." ".$RPemail." ".pll__("уже зарегистрирован в системе")."!</span></div>";
									
									$showForm = true;
							  } else {
								  
								  $headers = 'From: Холдинг RubEx Group <RubExGroup@yandex.ru>' . "\r\n";
								  $mailContent = "В системе зарегистрировался:<br/>".
								  "<strong>".$RPsname." ".$RPname." ".$RPfname."</strong><br/>".
								  "<strong>Ник: </strong>".$RPlogin."<br/>".
								  "<strong>Пароль: </strong>".stripcslashes($RPPasword)."<br/>".
								  "<strong>Организация: </strong>".$RPorg."<br/>".
								  "<strong>ИНН: </strong>".$RPinn."<br/>".
								  "<strong>Отрасль: </strong>".$RPotr."<br/>".
								  "<strong>Должность: </strong>".$RPdolg."<br/>".
								  "<strong>Страна: </strong>".$RPstrana."<br/>".
								  "<strong>Регион: </strong>".$RPregion."<br/>".
								  "<strong>Контактный терефон: </strong>".$RPphone."<br/>".
								  "<strong>e-mail: </strong>".$RPemail."<br/><br/><br/>".
								  "Для активации пользователя в системе перейдите по ссылке:<br/> <a href = 'http://rubexgroup.ru/?p=15828&mail=".$RPemail."&typeOfSaler=1'>Активировать как прямого потребителя</a><br/>".
								  "<a href = 'http://rubexgroup.ru/?p=15828&mail=".$RPemail."&typeOfSaler=2'>Активировать как посредника</a>";
								  
								  add_filter( 'wp_mail_content_type', 'set_html_content_type' );
								  
								  
								 // wp_mail(array("asmi046@gmail.com","vorobevav@rubexgroup.ru","frolov@rubexgroup.ru"), 'Новый пользователь в системе RubEx Price', $mailContent, $headers);
								  wp_mail(array("asmi046@gmail.com","vorobevav@rubexgroup.ru","V.Garbuzov@rubexgroup.ru"), 'Новый пользователь в системе RubEx Price', $mailContent, $headers);
								  
								  $headers2 = 'From: RubEx Group <contact@rubexgroup.ru>' . "\r\n";
								  $mailContent2 = "Уважаемый пользователь сервиса Rubex Price,<br/>".
								  "Ваша заявка на подключение к сервису Rubex Price получена.".
								  "После ее рассмотрения и утверждения модератором мы Вам вышлем подтверждение на почту.<br/><br/>".
								  "С уважением, <br/>".
								  "компания RubexGroup<br/>".
								  '<a href = "http://rubexgroup.ru">rubexgroup.ru</a><br/><br/>'.
								  '<img src = "http://rubexgroup.ru/wp-content/themes/rgn/images/logo.png" />';
								  
								  $sabj = "Заявка на подключение сервиса Rubex Price принята";
								  
								  if (pll_current_language() == "en") {
										$mailContent2 = "Dear user of Rubex Price service,<br/>".
														  "Your request for connection to the service Rubex Price is received.".
														  "After its examination and approval by the moderator, we will send you a confirmation email.<br/><br/>".
														  "Best regards, <br/>".
														  "RubexGroup<br/>".
														  '<a href = "http://rubexgroup.ru/en">rubexgroup.ru</a><br/><br/>'.
														  '<img src = "http://rubexgroup.ru/wp-content/themes/rgn/images/logo.png" />';
														  
														  $sabj = "Request for Rubex Price service is received";
								  }

								  wp_mail(array($RPemail), $sabj, $mailContent2, $headers2);
								  
								  echo "<div class = 'RMcongratulation RMcongratulationMoMargin RMcongratulationLong'><h2 class = 'longH2'>Поздравляем, Вы успешно зарегистрировались в системе RubEx Price!</h2><br/>";
								  echo "Заявка на регистрацию отправлена модератору. Информация о подтверждении доступа к системе Rubex Price будет выслана Вам на почту.</div>";	
								  echo '<a class = "RMRegister RMRegisterBig RMRegisterRform" href = "'.trans_get_the_permalink( 16271 ).'"><div class = "redBtn redBtnCenter">Об интернет магазине</div></a>';
							  } 
							  
							 
							  mysql_close($db);
								
							}
						} 
				  ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
