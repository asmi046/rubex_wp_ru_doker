<?
			if (userVeryfy()) {
?>
				<section class = "magazin_menu">
					<div class = "container">
						<div class = 'flexCommerceMenu'>
						<div class = 'imInfoInHead'>
							<span class = 'imName'>Добрый день: <? echo getSalerData("obr"); ?></span></br>
							
							<div class = 'authMenu '>
								<div class = 'UppLine'>
									<div class = 'rolAuth'></div>
								</div>
							
							<div class = 'lnk'>
									<a href = '<? echo get_permalink (20700);?>' class = 'lnkInHeadM inMagHead'>Магазин РТИ</a>
									<a href = '<? echo get_permalink (20738);?>' class = 'lnkInHeadM inMagHead'>Личный кабинет</a>
									<a href = '<? echo get_permalink (20744);?>' class = 'lnkInHeadM inMagHead'>История заказов</a>
									<a href = '?imOut=imdislog' class = 'lnkInHeadM disLogHead'>Выйти</a>
							</div>
								
							</div>
						</div>
						<div class = 'hSelContragentBlk' title = 'Выбранный контрагент' ><i style = 'color:white' class='fa fa-user' aria-hidden='true'></i> <span class= 'hSelContragent'><? echo stripcslashes (htmlspecialchars (getContragentData("org"),ENT_QUOTES))?></span> - <? echo getContragentData("psale"); ?>%</div>
						<div class = 'bascetInHead'><a href = '<?echo get_permalink(17121);?>'>Моя корзина</a></div>
					</div>
					</div>
				</section>
<?				
			}
?>