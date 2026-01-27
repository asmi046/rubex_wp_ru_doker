<?php

	$tovLnk = $tovarPage.'?ukrnam='.urlencode($ukrnam).'&gost='.urlencode($tovar["gost"]).'&namID='.urlencode($tovar["id"]);

?>
<div class = "magTovarElem magTovarElem2">
	<div class = "teGeo">
		<?php echo $tovar["ukrnam"]; ?>
	</div>
	
	<a href = "<?php echo $tovLnk;?>">
	<div class = "teImg">
		<?php 
		if ($tovar["images_lnk"] != NULL)
		{
		$size = getimagesize(get_bloginfo("template_url")."/img/magazin/tovar/".$tovar["images_lnk"]); ?>
		
		<?php 
			// if ($size[1]< 150)
			if (false)
			{
		?>
			<img style = "top:50%; margin-top:-<?php echo $size[1] / 2;?>px;" width = "<?php echo $size[0]; ?>" height = "<?php echo $size[1]; ?>" src = "<?php echo get_bloginfo("template_url")."/img/magazin/tovar/".$tovar["images_lnk"]; ?>"/>
		
		<?php
			} else {
		?>
			<img width = "<?php echo $size[0]; ?>" height = "<?php echo $size[1]; ?>" src = "<?php echo get_bloginfo("template_url")."/img/magazin/tovar/".$tovar["images_lnk"]; ?>"/>
		
		<?php
			}
		} else {
			?>
				<div class = "nophotoBlkMag">
					<img src = "<?php echo get_bloginfo("template_url")."/img/magazin/tovar/no-photo.png" ?>"/>
				</div>
			<?php
		}
		
		?>
	</div>
	</a>
	<div class = "teName">
		<a style = "text-decoration: none;" href = "<?php echo $tovLnk;?>"><h2><?php echo $tovar["gost"];?></h2></a>
	</div>
	
	<div class = "trBtns">
		<a class = "trBtn" href = "<?php echo $tovLnk;?>"><?_e("Интернет магазин","rubex");?></a>
		<!--<a class = "trBtn" target="_blank" href = "<?php //echo get_bloginfo("url").'/price/'.$tovar["sale_file"]; ?>"><?php //pll_e("Скидки"); ?></a>-->
	</div>
</div>