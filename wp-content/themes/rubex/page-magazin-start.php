<?php
/*
* Template Name: Магазин РТИ
*/

// обновление цен
// header( 'Refresh: 0; url='.get_permalink( 22202 ) );
// return;

if (userVeryfy()) 
{									
	header( 'Refresh: 0; url='.get_permalink(20717)  );
}

if(isset($_POST['submit'])) 
	{
		
		$submit=$_POST['submit'];
		
		$mail=$_POST['RPma'];
		$pasword=$_POST['RPPs'];	
		
		global $wpdb;
		$fivesdrafts = $wpdb->get_results("SELECT * FROM `wp_rubex_price` WHERE `RPemail`='".$mail."'", ARRAY_A);		
		
		$rez = false;
		$rezMas = null;
		
		if ($fivesdrafts[0]["moderate"] > 0)
		{	
			if ($fivesdrafts[0]["passHeshes"])
			{
				if	($fivesdrafts[0]["RPPasword"] == md5(stripcslashes($pasword)."mainsalt"))
				{
					$rez = true;
					$rezCookie = json_encode(array("mail"=>$fivesdrafts[0]["RPemail"], "p"=>$fivesdrafts[0]['RPPasword'], "type"=>$fivesdrafts[0]['moderate'], "passType" => $fivesdrafts[0]["passHeshes"], "psale" => $fivesdrafts[0]["personalSale"], "rezident" => $fivesdrafts[0]["Rezedent"], "obr" => $fivesdrafts[0]["RPname"]." ".$fivesdrafts[0]["RPfname"] ));
				}
			} else {
				if	($fivesdrafts[0]["RPPasword"] == stripcslashes($pasword))
				{
					$rez = true;
					$rezCookie = json_encode(array("mail"=>$fivesdrafts[0]["RPemail"],  "p"=>$fivesdrafts[0]['RPPasword'], "type"=>$fivesdrafts[0]['moderate'], "passType" => $fivesdrafts[0]["passHeshes"], "psale" => $fivesdrafts[0]["personalSale"], "rezident" => $fivesdrafts[0]["Rezedent"], "obr" => $fivesdrafts[0]["RPname"]." ".$fivesdrafts[0]["RPfname"]));
				}
			}
		}

		if ($rez) {
			SetCookie('RPlogin2', $rezCookie, 0, "/", "rubexgroup.ru");
			$allRez = $wpdb->get_results("SELECT * FROM `wp_im_salesetings` WHERE `RPemail` = '".$fivesdrafts[0]["RPemail"]."'", ARRAY_A);
			$defCa = isset($allRez[0]["defaultKontragent"])?$allRez[0]["defaultKontragent"]:"";
			$defSkl = isset($allRez[0]["defaultSklad"])?$allRez[0]["defaultSklad"]:"";
			
			if (!empty($defSkl))
				SetCookie('RPdefSkl', $defSkl, 0, "/", "rubexgroup.ru");
			else
				SetCookie('RPdefSkl', "Склады КРТ", 0, "/", "rubexgroup.ru");
			
			if (!empty($defCa))
				setSelContragent($defCa,$fivesdrafts[0]["RPemail"]);
			else setSelContragent(-1,$fivesdrafts[0]["RPemail"]);
			
			header( 'Refresh: 0; url='.get_permalink(20717)  );
			
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
						<form class="RMarketLoginForm magazinForm" name="RPformL" action="" method="post">
							<h2 class="RMarketLoginFormBoxH">Для работы с Rubex Price введите имя и пароль</h2>
							<div class = "form-block">
								<label for="RPma" class = "blaclLabel">E-mail</label>
								<input type="text" id="RPma" name="RPma" placeholder="">
							</div>
							
							<div class = "form-block">
								<label for="RPPs" class = "blaclLabel">Пароль</label>
								<input type="password" id="RPPs" name="RPPs" placeholder="">
							</div>
							
							<div class="formButtonLine">
								<input type="submit" name="submit" id="submit" class="trueButton" value="Вход">
								<a class="trueButton" href="<? echo get_the_permalink(20722); ?>" class="RMremPas">Регистрация!</a>
								<a class="trueButton grayButton" href="<? echo get_the_permalink(20715); ?>" class="RMremPas">Напомнить пароль</a>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
