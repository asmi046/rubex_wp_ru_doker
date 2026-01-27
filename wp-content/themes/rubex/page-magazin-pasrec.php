<?php
/*
* Template Name: Магазин РТИ - Восстановление пароля
*/

// обновление цен
// header( 'Refresh: 0; url='.get_permalink( 22202 ) );
// return;
	
	$rez = false;
	
	if(isset($_POST['submit'])) 
	{
		$mail=$_POST['RPmaResp'];
		
		global $wpdb;
		$rezInBas = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".$mail."'");
		if	((!empty($rezInBas))&&(mb_strtoupper($rezInBas[0]->RPemail) == mb_strtoupper($mail))&&(!empty($mail)))
		{
				$rez = true;
				$newPass = generate_password(9);
				$newpassrez = $wpdb->get_results( "UPDATE `wp_rubex_price` SET `RPPasword` = md5('".$newPass."mainsalt') WHERE `wp_rubex_price`.`RPemail` = '".$mail."';");
				$newpassrez = $wpdb->get_results( "UPDATE `wp_rubex_price` SET `passHeshes` = 1 WHERE `wp_rubex_price`.`RPemail` = '".$mail."';");
		}
	}
?>


<?
get_header();
?>

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
				<div class = "old_picture_blk">
					<div class = "picture" style = "background-image: url(<?php echo get_template_directory_uri(); ?>/img/magazin/start.jpg)"></div>
					<div class = "form">
						<form class="RMarketLoginForm magazinForm " name="RMformL" action="" method="post">
							<h2 class="restorePassSpan" >Для восстановления пароля к Rubex Price введите Ваш e-mail</h2>
							<div class = "form-block">
								<label for = "RPmaResp" class="RMresponzePassword blaclLabel">E-mail</label>
								<input type="text" id="RPmaResp" name="RPmaResp">
							</div>
							
							<div class="formButtonLine">
								<input class="RMRegisterMrLeft trueButton" type="submit" name="submit" id="submit" value="Восстановить">
								<a class="trueButton grayButton" href="<? echo get_the_permalink(20700); ?>" class="RMremPas">Вернуться в RubEx Price</a>
							</div>
						</form>
					</div>
				</div>
				
				<?php 
					if(isset($_POST['submit'])) {
					if ($rez){
							$headers = 'From: Холдинг RubEx Group <RubExGroup@yandex.ru>' . "\r\n";
								$mailContent = "Уважаемый (ая) <strong>".$rezInBas[0]->RPname." ".$rezInBas[0]->RPfname."</strong> (".$rezInBas[0]->RPemail."), Ваш пароль для доступа к сервису Rubex Price: <strong>".$newPass."</strong><br/><br/>".
								  "С уважением,<br/>компания RubExGroup<br/>".
								  "<a href = 'http://rubexgroup.ru'>RubExGroup.ru</a><br/><br/>".
								  "<img width = '128'   src = '".get_template_directory_uri()."/img/favicon/icon128.png'/><br/><br/><br/><br/>".
								  "Dear <strong>".$rezInBas[0]->RPname." ".$rezInBas[0]->RPfname."</strong> (".$rezInBas[0]->RPemail."), Your password to access the service Rubex Market: <strong>".$newPass."</strong><br/><br/>".
								  "Yours sincerely,<br/>RubExGroup  company<br/>".
								  "<a href = 'http://rubexgroup.ru'>RubExGroup.ru</a><br/><br/>".
								  "<img width = '128'  src = '".get_template_directory_uri()."/img/favicon/icon128.png'/>";
								
								  
								  add_filter( 'wp_mail_content_type', 'set_html_content_type' );	
									
								wp_mail($mail, 'Пароль для доступа к сервису Rubex Price', $mailContent, $headers);
						
						
							echo "<div class = 'shopMsg'><h2>Пароль успешно восстановлен</h2><br/>";
							echo "Уважаемый(ая) <strong>".$rezInBas[0]->RPname." ".$rezInBas[0]->RPfname."</strong>, письмо с паролем высланно на указанный Вами e-mail.<br/><br/>";
							echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Воспользоваться сервисом</a>';
							echo "</div>";
							
						} 
						else 
						{
							echo "<div class = 'shopMsg shopMsgErr'><h2>Произошла ошибка!</h2><br/>";
							echo "Возможно пользователь с таким e-mail не зарегистрирован в системе.<br/><br/>";
							echo '<a class = "RMRegister trueButton" href = "'.get_permalink( 20700 ).'">Воспользоваться сервисом</a>';
							echo "</div>";
				
						}	
					} 
			?>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
