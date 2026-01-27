<?php 
/*
* Template Name: Вакансии
*/
get_header();
?>

<div class="container">
<?php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
?>
</div>
<section class="career-section career-section__vac">
	<div class="container">
		<div class="career-content">
			<h1 class="page-title">ВАКАНСИИ в RubEx Group</h1>
			<div class="career-text">
				<p>Уважаемые соискатели! Здесь вы можете подобрать интерсующую вас вакансию по виду деятельности и региональной принадлежности. Размещенные предложения доступны в 6 регионах (Москва, Курск, Саранск, Санкт-Петербург, Кемерово, Екатеринбург) по трем направлениям - производство, продажи, прочие. Если по каким-либо причинам на данный момент мы не можем предложить Вам сотрудничество с нашей компанией, просим заполнить анкету. Мы просматриваем все приходящие заявки без исключения и ваша анкета будет внесена в кадровый резерв соискателей.</p>
				<div class="career-btn">
					<a href="#v_vak" class="button main-catalog__photo-link">Выбрать вакансию</a>
					<a href="#" class="button main-catalog__photo-link">Заполнить анкету</a>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
    <form action="" method = "get" name = "vakRegSel" class="vacancy-filter">
        <h2 id = "v_vak">Выберите направление и региональную принадлежность вакансии</h2>
        <div class="form-block30 form-block">
					<div class="form-block">
						<span class="buisnesArea">
							<div class="label"><span>Направления</span><span class="color-red">*</span></div>
							<div class = "select-wrap select-wrap-gray-border">								<select onchange="document.forms['vakRegSel'].submit()" name="buisnesArea" id="vac-direction">
									<option <?php if (empty($_REQUEST["buisnesArea"])||($_REQUEST["buisnesArea"] == "%")) echo "selected"; ?>  value="%">Все направления</option>
									<option <?php if (isset($_REQUEST["buisnesArea"]) && $_REQUEST["buisnesArea"] === "Производство") echo "selected"; ?> value="Производство">Производство</option>
									<option <?php if (isset($_REQUEST["buisnesArea"]) && $_REQUEST["buisnesArea"] === "Продажи") echo "selected"; ?> value="Продажи">Продажи</option>
									<option <?php if (isset($_REQUEST["buisnesArea"]) && $_REQUEST["buisnesArea"] === "Другие направления") echo "selected"; ?> value="Другие направления">Другие направления</option>
								</select>							</div>
						</span>
					</div>
				<div class="form-block">
					<span class="buisnesArea">
						<div class="label"><span>Регион</span><span class="color-red">*</span></div>
						<div class = "select-wrap select-wrap-gray-border">							<select onchange="document.forms['vakRegSel'].submit()" name="vacancy_region" id="vac-region">
								<option <?php if (empty($_REQUEST["vacancy_region"])||($_REQUEST["vacancy_region"] == "%")) echo "selected"; ?> value="%">Все регионы</option>
								<option <?php if (isset($_REQUEST["vacancy_region"]) && $_REQUEST["vacancy_region"] === "Москва") echo "selected"; ?> value="Москва">Москва</option>
								<option <?php if (isset($_REQUEST["vacancy_region"]) && $_REQUEST["vacancy_region"] === "Курск") echo "selected"; ?> value="Курск">Курск</option>
								<option <?php if (isset($_REQUEST["vacancy_region"]) && $_REQUEST["vacancy_region"] === "Саранск") echo "selected"; ?> value="Саранск">Саранск</option>
								<option <?php if (isset($_REQUEST["vacancy_region"]) && $_REQUEST["vacancy_region"] === "Кемерово") echo "selected"; ?> value="Кемерово">Кемерово</option>
								<option <?php if (isset($_REQUEST["vacancy_region"]) && $_REQUEST["vacancy_region"] === "Екатеринбург") echo "selected"; ?> value="Екатеринбург">Екатеринбург</option>
								<option <?php if (isset($_REQUEST["vacancy_region"]) && $_REQUEST["vacancy_region"] === "Санкт-Петербург") echo "selected"; ?> value="Санкт-Петербург">Санкт-Петербург</option>
							</select>						</div>
					</span>
				</div>
			<div class="form-block">
				<div class="label"><span></span><span class="color-red" style="color: transparent;">Выбрать </span></div>
				<input type = "submit" name = "vakSubmit" class="trueButton osinContact" value = "Показать вакансии">
			</div>
		</div>
    </form>

    <div class="vacancy-block">
            <?php 
            if (isset($_REQUEST["buisnesArea"])||isset($_REQUEST["vacancy_region"])||isset($_REQUEST["vakSubmit"]))
            {   
                $arr_vak = carbon_get_post_meta(get_the_ID(), 'complex_vakansy');
                if($arr_vak) {
            ?>
                <div class="vacancy-item">
                        <div class="vacancy-item__title vacancy-item__h">Вакансия</div>
                        <div class="vacancy-item__region vacancy-item__h">Регион</div>
                        <div class="vacancy-item__direction vacancy-item__h">Направление</div>
                        <div class="vacancy-item__link vacancy-item__h">Управление</div>
                </div>
            <?php
                $counter = 0;
                foreach($arr_vak as $vak){?>
                    <?php if (empty($vak['cv_is_show_vacancy'])) continue;  ?>
                    <?php 
                        if ($_REQUEST['buisnesArea'] !== "%") { 
                            if ($vak['cv_vac_direction'] !== $_REQUEST["buisnesArea"]) continue; 
                        } 
                    ?>
                    
                    <?php 
                        if ($_REQUEST['vacancy_region'] !== "%") {
                            if ($vak['cv_vac_region'] !== $_REQUEST["vacancy_region"]) continue;
                        }  
                    ?>
                    <div class="vacancy-item">
                        <div class="vacancy-item__title vacancy-item__blk"><?php echo $vak['cv_vac_vacancy']; ?></div>
                        <div class="vacancy-item__region vacancy-item__blk"><?php echo $vak['cv_vac_region']; ?></div>
                        <div class="vacancy-item__direction vacancy-item__blk"><?php echo $vak['cv_vac_direction']; ?></div>
                        <div class="vacancy-item__link vacancy-item__blk"><div class = "trueButton" data-indexelem = "<?php echo $counter;?>">Подробнее</div></div>
                        <div class="hide_vakansy_info" id="hide_vakansy_info<?php echo $counter;?>" data-indexelem = "<?php echo $counter;?>">
                            <div class="hide_vakansy_info_collumn hide_vakansy_info_obiazannosti">
                                <h4>Обязанности</h4>
                                <?php echo $vak['cv_vac_dities']; ?>
                            </div>
                            
                            <div class="hide_vakansy_info_collumn hide_vakansy_info_trebovania">
                                <h4>Требования</h4>
                                <?php echo $vak['cv_vac_requirements']; ?>
                            </div>
                            
                            <div class="hide_vakansy_info_collumn hide_vakansy_info_uslovia">
                                <h4>Условия</h4>
                                <?php echo $vak['cv_vac_conditions']; ?>
                            </div>
                            
                            <div class = "hide_vakansy_info_rool">
                                <span class = "trueButton redBtnFull zAnketa" data-vakansytext = "<?php echo $vak['cv_vac_vacancy']; ?>" >Откликнуться</span>
                            </div>
                        </div>
                        
                        <?php 
                            $counter++;
                        ?>
                    </div>
                <?php }
                    if ($counter == 0) echo "<p><strong>По данному запросу вакансии не найдены. Просим заполнить анкету для внесения в кадровый резерв соискателей.</strong></p>";
                ?>
                
                
            <?php } ?>
        <?php }?>
    </div>
</div>
<?php
get_footer();