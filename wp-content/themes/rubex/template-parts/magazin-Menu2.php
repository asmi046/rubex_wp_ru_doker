<div class = "magMenu">
				<div class = 'magMenuItems'>
				<?php 
					global $wpdb;
					$tovarsCount = $wpdb->get_results("SELECT  `id`, `ukrnam`, COUNT(`ukrnam`) FROM `wp_im_product_transfer` WHERE `price` > 0 AND `ukrnam` != '' AND `gost` != '' GROUP BY `ukrnam` UNION ALL (SELECT  `id`, `ukrnam`, COUNT(`ukrnam`) FROM `wp_im_product_transfer_no` WHERE `price` > 0 AND `ukrnam` != '' AND `gost` != '' GROUP BY `ukrnam`)", ARRAY_A);
					$razdelPage = get_permalink (17037);
					foreach ($tovarsCount as $tablerows) 
						{
								if (empty($tablerows["ukrnam"])) continue;
								
								if (!isset($tablerows["ukrnam"])&&($tablerows["ukrnam"] === $ukrnamReq))	
								{
									$Hstyle = "magMenuItemSelect";
									$SubStyle = "magSubMenuItemsSelect";
								}
								else {
									$Hstyle = "";
									$SubStyle = "";
								}
								
							
								
									$tovars = $wpdb->get_results("SELECT * FROM `wp_im_product_transfer` where `ukrnam` LIKE '".$tablerows["ukrnam"]."' AND `price` > 0 GROUP BY `gost` UNION ALL (SELECT * FROM `wp_im_product_transfer_no` where `ukrnam` LIKE '".$tablerows["ukrnam"]."' AND `price` > 0 GROUP BY `gost`)", ARRAY_A);
									//echo "SELECT * FROM `wp_im_product_transfer` where `ukrnam` LIKE '".$tablerows["ukrnam"]."' AND `price` > 0 GROUP BY `gost`";
									echo "<div class = 'magMenuItem ".$Hstyle."'>";
										echo "<a href = '".$razdelPage."?ukrnam=".$tablerows["ukrnam"]."'>";
											echo $tablerows["ukrnam"]." <span class = 'count'>(".count($tovars).")</span>";
											
										echo "</a>";
										
										echo "<img data-id = '".$tablerows["id"]."' class = 'authMeuRol' src = '". get_bloginfo('template_url')."/img/arrow-mag.svg' />";
									echo "</div>";
									
									echo "<div id = 'mSi".$tablerows["id"]."' class = 'magSubMenuItems ".$SubStyle."'>";
											
											
											foreach ($tovars as $tovar) {
												$tovarInfo = $wpdb->get_results("SELECT * FROM `wp_im_product_info` where `product` = '".$tovar["gost"]."'", ARRAY_A);
												if (!empty($tovarInfo))
													$elemTitle = 'title = "'.$tovarInfo[0]["plane_text"].'"';
												
												if (isset($tovarNamReq)&&($tovar["gost"] === $tovarNamReq))	
													$NamStyle = "namRazdSelect";
												else $NamStyle = "";
												
												echo '<a '.$elemTitle.' class = "namRazd '.$NamStyle.'" href = "'.$razdelPage.'?ukrnam='.urlencode($tablerows["ukrnam"]).'&gost='.urlencode($tovar["gost"]).'&namID='.urlencode($tablerows["id"]).'">'.$tovar["gost"].'</a>';
											}
									echo "</div>";
							
						}
				?>
				</div>
			</div>