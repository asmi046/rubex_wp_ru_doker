<?php
// обновление цен
// header( 'Refresh: 0; url='.get_permalink( 22202 ) );
// return;

if (isset($_REQUEST["imOut"]))
{
		SetCookie('RPlogin2', "", -3600, "/", "rubexgroup.ru");
		header( 'Refresh: 0; url='.get_permalink(20700)  );	
}

/*
* Template Name: Магазин РТИ - Товарная группа
*/


?>


<?
	get_header();
	$rez = userVeryfy();
?>


	<?php 
		$ukrnam = (!empty($_GET["ukrnam"]))?$_GET["ukrnam"]:"Все товары";
		$ukrnamReq = ((!empty($_GET["ukrnam"]))&&(strcmp($_GET["ukrnam"],"Все товары")!=0))?$_GET["ukrnam"]:"%";
		
		$gost = (!empty($_GET["gost"]))?$_GET["gost"]:"";
		$gostReq = (!empty($_GET["gost"]))?$_GET["gost"]:"%";
		
		$tovarPage = get_permalink(20740);
	?>
	

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
			
			<div style = "min-height: 700px;" id = "sek1"  class = "lineSek line linePad magazCatLine">			
				<div class = "lineCenter">
					<div class = "magazSectionInMenu">
						<?php 
							if ($rez) {
							include("template-parts/magazin-Menu2.php");
						?>
						
						<div class = "magContent">
						
						
						
						
						<?php 			
							//$tovars = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` LEFT JOIN `wp_im_product_group` ON (`wp_im_product_group`.`tovar_nam` = `wp_im_product_transfer`.`gost` AND `wp_im_product_group`.`geo` = `wp_im_product_transfer`.`geo`) where `ukrnam` LIKE '".$ukrnamReq."' AND `gost` LIKE '".$gostReq."' AND `price`>0  GROUP BY `gost`", ARRAY_A);
							$tovars = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` LEFT JOIN `wp_im_product_info` ON (`wp_im_product_info`.`product` = `wp_im_product_transfer`.`gost`) where `ukrnam` LIKE '".$ukrnamReq."' AND `gost` LIKE '".$gostReq."' AND `price`>0  GROUP BY `gost` "
							." UNION ALL (SELECT * FROM `wp_im_product_transfer_no` LEFT JOIN `wp_im_product_info` ON (`wp_im_product_info`.`product` = `wp_im_product_transfer_no`.`gost`) where `ukrnam` LIKE '".$ukrnamReq."' AND `gost` LIKE '".$gostReq."' AND `price`>0  GROUP BY `gost`)", ARRAY_A);
							//echo "SELECT * FROM `wp_im_product_transfer` LEFT JOIN `wp_im_product_info` ON (`wp_im_product_info`.`product` = `wp_im_product_transfer`.`gost`) where `ukrnam` LIKE '".$ukrnamReq."' AND `gost` LIKE '".$gostReq."' AND `price`>0  GROUP BY `gost` "
							//." UNION ALL (SELECT * FROM `wp_im_product_transfer_no` LEFT JOIN `wp_im_product_info` ON (`wp_im_product_info`.`product` = `wp_im_product_transfer_no`.`gost`) where `ukrnam` LIKE '".$ukrnamReq."' AND `gost` LIKE '".$gostReq."' AND `price`>0  GROUP BY `gost`)";
								
							
						?>
							<div class = "magTovarElems">
							<?php			
							foreach ($tovars as $tovar) 
							{
								if (empty($tovar["gost"]) || empty($tovar["ukrnam"])) continue;		
							?>
								
								<?php 
									include( 'template-parts/magazin-TovarPriv2.php' );										
								?>
							

							<?php 	
							}	
							?>				
							</div>
						
										
						
						
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
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
