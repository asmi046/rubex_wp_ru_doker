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
					<a href="#ank-blk" class="button main-catalog__photo-link to-anket">Заполнить анкету</a>
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
		<div class="form-block" id = "ank-blk">
			<a href="#"  class="trueButton trueButtonGray show-anket">Заполнить анкету</a>
		</div>
		<form action="" style = "display:none;" class="vacancy">
				
				<div class="form-block30">
					<div class="form-block">
						<label for = "name" class = "blaclLabel">ФИО<span class="color-red">*</span></label>
						<input type="text" name="name" value="" id="name">
					</div>
					
					<div class="form-block">
						<label for = "born" class = "blaclLabel">Дата рождения<span class="color-red">*</span></label>
						<input type="text" name="born" value="" id="born">
					</div>
					
					<div class="form-block">
						<label for = "tel" class = "blaclLabel">Номер телефона<span class="color-red">*</span></label>
						<input type="tel" name="tel" value="" id="tel">
					</div>
				</div>
				
				<div class="form-block30">
					
					<div class="form-block">
						<label for = "city" class = "blaclLabel">Город проживания<span class="color-red">*</span></label>
						<input type="text" name="city" value="" id="city">
					</div>
					
					<div class="form-block">
						<label for = "country" class = "blaclLabel">Гражданство<span class="color-red">*</span></label>
						<input type="text" name="country" value="" id="country">
					</div>
					
					<div class="form-block">
						<label for = "family" class = "blaclLabel">Семейное положение<span class="color-red">*</span></label>
						<input type="text" name="family" value="" id="family">
					</div>
				</div>
				
				<div class="form-block">
					<div class="formHead">Цель заполнения анкеты:<span class="color-red">*</span></div>
					
					<div class="radio-wrapper">
						<input type="radio" name="goal" id="goal" value="Отбор на вакансию"><label for="goal"  class = "radioLabel">Отбор на вакансию</label>
					</div>
					
					<div class="form-block form-block-hidden">
						<label for = "vacancy_name" class = "blaclLabel">Название вакансии</label>
						<input type="text" name="vacancy_name" value="" id="vacancy_name">
					</div>
					
					<div class="radio-wrapper">
						<input type="radio" name="goal" id="stag" value="Отбор на стажировку"><label for="stag" class = "radioLabel">Отбор на стажировку</label>
					</div>
					
					<div class="form-block form-block-hidden">
						<label for = "company_name" class = "blaclLabel">Предприятие и подразделение, в котором вы хотели бы пройти стажировку</label>
						<input type="text" name="company_name" value="" id="company_name">
					</div>
					
					<div class="radio-wrapper">
						<input type="radio" name="goal" id="resume" value="Направить резюме без вакансии"><label for="resume" class = "radioLabel">Направить резюме без вакансии</label>
					</div>
				</div>
				
				<div class="form-block">
					<div class="formHead">Ваше образование<span class="color-red">*</span></div>
					
					<div class="radio-wrapper">
						<input type="radio" name="education" id="education_1" required value="Высшее"><label for="education_1" class = "radioLabel">Высшее</label>
					</div>
					
					<div class="form-block form-block-hidden-ed">
						<div class="form-block">
							
							<div class="formHead">Уровень 1-го высшего образования:</div>
							<div class="radio-wrapper">
								<input type="radio" name="education_vo_level_1" id="education_vo_level_1_1" value="бакалавриат"><label for="education_vo_level_1_1" class = "radioLabel">бакалавриат</label>
							</div>
							<div class="radio-wrapper">
								<input type="radio" name="education_vo_level_1" id="education_vo_level_1_2" value="специалитет"><label for="education_vo_level_1_2" class = "radioLabel">специалитет</label>
							</div>
							<div class="radio-wrapper">
								<input type="radio" name="education_vo_level_1" id="education_vo_level_1_3" value="магистратура"><label for="education_vo_level_1_3" class = "radioLabel">магистратура</label>
							</div>
							<div class="radio-wrapper">
								<input type="radio" name="education_vo_level_1" id="education_vo_level_1_4" value="аспирантура"><label for="education_vo_level_1_4" class = "radioLabel">аспирантура</label>
							</div>
							
							<div class="form-block">
								<label for = "university_vo_1" class = "blaclLabel">Название учебного заведения (без сокращений)*</label>
								<input type="text" name="university_vo_1" value="" id="university_vo_1">
							</div>
							<div class="form-block">
								<label for = "specialty_vo_1" class = "blaclLabel">Специальность по диплому</label>
								<input type="text" name="specialty_vo_1" value="" id="specialty_vo_1">
							</div>
							<div class="form-block">
								<label for = "university_year_vo_1" class = "blaclLabel">Год окончания (если вы еще не завершили образование, укажите ожидаемый год окончания)<span class="color-red">*</span></label>
								<input type="text" name="university_year_vo_1" value="" id="university_year_vo_1">
							</div>
							
							<div class="trueButton add-vobr" onclick = "jQuery('#vo_2_blk').toggle();">+ Добавить 2-е высшее</div>
							
							<div class = "vo_blk" id = "vo_2_blk">
								
								<div class="formHead">Уровень 2-го высшего образования:</div>
								
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_2" id="education_vo_level_2_1" value="бакалавриат"><label for="education_vo_level_2_1" class = "radioLabel" >бакалавриат</label>
								</div>
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_2" id="education_vo_level_2_2" value="специалитет"><label for="education_vo_level_2_2" class = "radioLabel" >специалитет</label>
								</div>
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_2" id="education_vo_level_2_3" value="магистратура"><label for="education_vo_level_2_3" class = "radioLabel" >магистратура</label>
								</div>
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_2" id="education_vo_level_2_4" value="аспирантура"><label for="education_vo_level_2_4" class = "radioLabel" >аспирантура</label>
								</div>
								
								<div class="form-block">
									<label for = "university_vo_2" class = "blaclLabel">Название учебного заведения (без сокращений)*</label>
									<input type="text" name="university_vo_2" value="" id="university_vo_2">
								</div>
								<div class="form-block">
									<label for = "specialty_vo_2" class = "blaclLabel">Специальность по диплому</label>
									<input type="text" name="specialty_vo_2" value="" id="specialty_vo_2">
								</div>
								<div class="form-block">
									<label for = "university_year_vo_2" class = "blaclLabel">Год окончания (если вы еще не завершили образование, укажите ожидаемый год окончания)<span class="color-red">*</span></label>
									<input type="text" name="university_year_vo_2" value="" id="university_year_vo_2">
								</div>
							</div>
							
							<div class="trueButton add-vobr" onclick = "jQuery('#vo_3_blk').toggle();">+ Добавить 3-е высшее</div>
							
							<div class = "vo_blk" id = "vo_3_blk">
								<div class="formHead">Уровень 3-го высшего образования:</div>
								
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_3" id="education_vo_level_3_1" value="бакалавриат"><label for="education_vo_level_3_1" class = "radioLabel" >бакалавриат</label>
								</div>
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_3" id="education_vo_level_3_2" value="специалитет"><label for="education_vo_level_3_2" class = "radioLabel" >специалитет</label>
								</div>
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_3" id="education_vo_level_3_3" value="магистратура"><label for="education_vo_level_3_3" class = "radioLabel" >магистратура</label>
								</div>
								<div class="radio-wrapper">
									<input type="radio" name="education_vo_level_3" id="education_vo_level_3_4" value="аспирантура"><label for="education_vo_level_3_4" class = "radioLabel" >аспирантура</label>
								</div>
								
								<div class="form-block">
									<label for = "university_vo_3" class = "blaclLabel">Название учебного заведения (без сокращений)*</label>
									<input type="text" name="university_vo_3" value="" id="university_vo_3">
								</div>
								<div class="form-block">
									<label for = "specialty_vo_3" class = "blaclLabel">Специальность по диплому</label>
									<input type="text" name="specialty_vo_3" value="" id="specialty_vo_3">
								</div>
								<div class="form-block">
									<label for = "university_year_vo_3" class = "blaclLabel">Год окончания (если вы еще не завершили образование, укажите ожидаемый год окончания)<span class="color-red">*</span></label>
									<input type="text" name="university_year_vo_3" value="" id="university_year_vo_3">
								</div>
							</div>
							
						</div>
					</div>
					<div class="radio-wrapper">
						<input type="radio" name="education" id="education_2" value="Среднее"><label for="education_2" class = "radioLabel">Среднее</label>
					</div>
					<div class="form-block form-block-hidden-ed">
						<div class = "form-block">
							<label for = "profession_so_name_1" class = "blaclLabel">Наличие рабочей профессии (для технических специальностей):</label>
							<input type="text" name="profession_so_name_1" value="" id="profession_so_name_1">
						</div>
						
						<div class="trueButton add-sobr" onclick = "jQuery('#so_2_blk').toggle();">+ Добавить 2-ю рабочую специальность</div>
						
						<div class = "so_blk" id = "so_2_blk">
							<div class = "form-block">
								<label for = "profession_so_name_2" class = "blaclLabel">Наличие 2-й рабочей профессии (для технических специальностей):</label>
								<input type="text" name="profession_so_name_2" value="" id="profession_so_name_2">
							</div>
						</div>
						
						<div class="trueButton add-sobr" onclick = "jQuery('#so_3_blk').toggle();">+ Добавить 3-ю рабочую специальность</div>
						
						<div class = "so_blk" id = "so_3_blk">
							<div class = "form-block">
								<label for = "profession_so_name_3" class = "blaclLabel">Наличие 3-й рабочей профессии (для технических специальностей):</label>
								<input type="text" name="profession_so_name_3" value="" id="profession_so_name_3">
							</div>
						</div>
					</div>
					
					<div class="radio-wrapper">
						<input type="radio" name="education" id="education_3" value="2"><label for="education_3" class = "radioLabel">Среднеспециальное</label>
					</div>
					
					<div class="form-block form-block-hidden-ed">
						<div class="form-block">
							<label for = "university_so_1" class = "blaclLabel">Название учебного заведения (без сокращений)*</label>
							<input type="text" name="university_so_1" value="" id="university_so_1">
						</div>
						
						<div class="form-block">
							<label for = "specialty_so_1" class = "blaclLabel">Специальность по диплому</label>
							<input type="text" name="specialty_so_1" value="" id="specialty_so_1">
						</div>
						
						<div class="form-block">
							<label for = "university_year_so_1" class = "blaclLabel">Год окончания (если вы еще не завершили образование, укажите ожидаемый год окончания)<span class="color-red">*</span></label>
							<input type="text" name="university_year_so_1" value="" id="university_year_so_1">
						</div>
						
						<div class="trueButton add-ssbr" onclick = "jQuery('#ss_2_blk').toggle();">+ Добавить 2-е среднеспециальное</div>
						
						<div class = "ss_blk" id = "ss_2_blk">
							<div class="form-block">
								<label for = "university_year_so_1" class = "blaclLabel">Название учебного заведения (без сокращений)*</label>
								<input type="text" name="university_so_2" value="" id="university_so_2">
							</div>
							
							<div class="form-block">
								<label for = "specialty_so_2" class = "blaclLabel">Специальность по диплому</label>
								<input type="text" name="specialty_so_2" value="" id="specialty_so_2">
							</div>
							
							<div class="form-block">
								<label for = "university_year_so_2" class = "blaclLabel">Год окончания (если вы еще не завершили образование, укажите ожидаемый год окончания)<span class="color-red">*</span></label>
								<input type="text" name="university_year_so_2" value="" id="university_year_so_2">
							</div>
						</div>
						
						<div class="trueButton add-ssbr" onclick = "jQuery('#ss_3_blk').toggle();">+ Добавить 3-е среднеспециальное</div>
						
						<div class = "ss_blk" id = "ss_3_blk">
							<div class="form-block">
								<label for = "university_so_3" class = "blaclLabel">Название учебного заведения (без сокращений)*</label>
								<input type="text" name="university_so_3" value="" id="university_so_3">
							</div>
							
							<div class="form-block">
								<label for = "specialty_so_3" class = "blaclLabel">Специальность по диплому</label>
								<input type="text" name="specialty_so_3" value="" id="specialty_so_3">
							</div>
							
							<div class="form-block">
								<label for = "university_year_so_3" class = "blaclLabel">Год окончания (если вы еще не завершили образование, укажите ожидаемый год окончания)<span class="color-red">*</span></label>
								<input type="text" name="university_year_so_3" value="" id="university_year_so_3">
							</div>
						</div>
					</div>
				</div>
				
				<div class="form-block">
					<div class="formHead">Владение языками:</div>
					
					<div class="radio-wrapper">
						<input type="checkbox" class="form-lang" name="eng" id="lang_1" value="Английский"><label for="lang_1" class = "checkboxLabel">Английский</label>
					</div>
					
					<div class="radio-wrapper">
						<input type="checkbox" class="form-lang" name="fr" id="lang_2" value="Французский"><label for="lang_2"  class = "checkboxLabel">Французский</label>
					</div>
					
					<div class="radio-wrapper">
						<input type="checkbox" class="form-lang" name="de" id="lang_3" value="Немецкий"><label for="lang_3"  class = "checkboxLabel">Немецкий</label>
					</div>
					
					<div class="radio-wrapper">
						<input type="checkbox" class="form-lang" name="spain" id="lang_4" value="Испанский"><label for="lang_4"  class = "checkboxLabel">Испанский</label>
					</div>
					
					<div class="radio-wrapper">
						<input type="checkbox" class="form-lang" name="ch" id="lang_5" value="Китайский"><label for="lang_5"  class = "checkboxLabel">Китайский</label>
					</div>
					
					<div class="radio-wrapper">
						<input type="checkbox" name="lang" id="lang_6" value="свой вариант ответа"><label for="lang_6"  class = "checkboxLabel">свой вариант ответа</label>
					</div>
					<div class="form-block form-block-hidden-lang">
						<input type="text" name="lang_name" value="" id="lang_name">
					</div>
				</div>
				
				<div class="form-block">
					<div class="formHead">Владение ПК</div>
					<div class="radio-wrapper">
						<input type="radio" name="pc" id="pc_yes" value="Да"><label for="pc_yes" class = "radioLabel">Да</label>
					</div>
					<div class="form-block form-block-hidden-pc">
						<label for = "programms" class = "blaclLabel">Программное обеспечение:</label>
						<textarea name="programms" id="programms"></textarea>
					</div>
					<div class="radio-wrapper">
						<input type="radio" name="pc" id="pc_no" value="Нет"><label for="pc_no" class = "radioLabel">Нет</label>
					</div>
				</div>
				
				<div class="form-block">
					<div class="formHead">Имеется ли у Вас опыт работы?</div>
					
					<div class="radio-wrapper">
						<input type="radio" name="m_work" id="m_work_yes" value="Да"><label for="m_work_yes" class = "radioLabel">Да</label>
					</div>
					
					<div class="form-block-hidden-work">
						<div class="form-block">
							<label for = "company_work_1" class = "blaclLabel">Компания:</label>
							<input type="text" name="company_work_1" value="" id="company_work_1">
						</div>
						<div class="form-block">
							<label for = "period_work_1" class = "blaclLabel">Период работы:</label>
							<input type="text" name="period_work_1" value="" id="period_work_1">
						</div>
						<div class="form-block">
							<label for = "work_project_1" class = "blaclLabel">Задачи:</label>
							<textarea name="work_project_1" id="work_project_1"></textarea>
						</div>
						
						<div class="trueButton add-work" onclick = "jQuery('#work_2_blk').toggle();">+ Добавить 2-е место работы</div>
						
						<div class = "work_blk" id = "work_2_blk">
							<div class="form-block">
								<label for = "company_work_2" class = "blaclLabel">Компания:</label>
								<input type="text" name="company_work_2" value="" id="company_work_2">
							</div>
							<div class="form-block">
								<label for = "period_work_2" class = "blaclLabel">Период работы:</label>
								<input type="text" name="period_work_2" value="" id="period_work_2">
							</div>
							<div class="form-block">
								<label for = "work_project_2" class = "blaclLabel">Задачи:</label>
								<textarea name="work_project_2" id="work_project_2"></textarea>
							</div>
						</div>
						
						<div class="trueButton add-work" onclick = "jQuery('#work_3_blk').toggle();">+ Добавить 3-е место работы</div>
						
						<div class = "work_blk" id = "work_3_blk">
							<div class="form-block">
								<label for = "period_work_2" class = "blaclLabel">Компания:</label>
								<input type="text" name="company_work_3" value="" id="company_work_3">
							</div>
							<div class="form-block">
								<label for = "period_work_2" class = "blaclLabel">Период работы:</label>
								<input type="text" name="period_work_3" value="" id="period_work_3">
							</div>
							<div class="form-block">
								<label for = "period_work_2" class = "blaclLabel">Задачи:</label>
								<textarea name="work_project_3" id="work_project_3"></textarea>
							</div>
						</div>
						
					</div>
					
					<div class="radio-wrapper">
						<input type="radio" name="m_work" id="m_work_no" value="Нет"><label for="m_work_no" class = "radioLabel">Нет</label>
					</div>

				</div>
				
				
				
				
				<div class="form-block">
					<div class="formHead">Готовы ли вы к командировкам?</div>
					<div class="radio-wrapper">
						<input type="radio" name="trip" id="trip_1" value="Да"><label for="trip_1" class = "radioLabel">Да</label>
					</div>
					<div class="radio-wrapper">
						<input type="radio" name="trip" id="trip_2" value="Нет"><label for="trip_2" class = "radioLabel">Нет</label>
					</div>
				</div>
				<div class="form-block">
					<div class="formHead">Ваши зарплатные ожидания (в рублях, в месяц, до налогообложения):</div>
					<input type="text" name="salary" value="" id="salary">
				</div>
				<div class="form-block">
					<div class="formHead">Здесь напишите то, что могли бы добавить о себе:</div>
					<textarea name="about" id="about"></textarea>
				</div>
				
				<div class="form-block">
					<div class="formHead">Ваш e-mail:</div>
					<input type="text" name="semail" value="" id="semail">
				</div>
				
				<?php get_template_part('template-parts/callback-note');?>
				<div class="trueButton osinContact" id="vacancySubmit">Отправить</div>
				<br>
				<br>
				<!-- <p class="note-form">Нажимая на кнопку "Отправить", вы соглашаетесь с условиями <a class = "color-red" href="<?php echo get_permalink(19641);?>" target="_blank">обработки персональных данных</a>.</p> -->
			</form>
	
	</div>
<?php
get_footer();