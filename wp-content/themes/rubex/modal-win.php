<div style="display: none;">
    <div class="box-modal" id="messgeModal">
        <div class="box-modal_close arcticmodal-close"><?_e("закрыть","rubex");?></div>
        <div class = "modalline" id = "lineIcon">
    </div>
    
    <div class = "modalline" id = "lineMsg">
    </div>
    </div>
</div>

<div style="display: none;">
    <div class="box-modal" id="vac-modal">
        <div class="box-modal_close arcticmodal-close"><?_e("закрыть","rubex");?></div>
        <div class = "modalline" id = "lineIcon">
      <form action="" method="POST" class="" enctype="multipart/form-data">
        <h2><?_e("Отправить резюме","rubex");?></h2>
        <input type="text" name="vakansy" placeholder="<?_e("Вакансия","rubex");?>">
        <input type="tel" name="tel" placeholder="<?_e("Телефон","rubex");?>">
        <div class="input-file-wrap">
          <input type="file" name="file" id="file" class="inputfile" >
          <label for="file"><?_e("Выбрать файл","rubex");?></label>
        </div>
        <input type="hidden" class="file-path">
        <textarea name="comment" placeholder="Комментарий"></textarea>
		
		<?php get_template_part('template-parts/callback-note');?>
        
		<button type="submit" class="trueButton uniSendBtn"><?_e("Отправить","rubex");?></button>
      </form>
    </div>
    
    <div class = "modalline" id = "lineMsg">
    </div>
    </div>
</div>

<div style="display: none;">
    <div class="box-modal zvonok-modal-wrapper" id="obrashenie-modal" >
        <div class="box-modal_close arcticmodal-close"><?_e("закрыть","rubex");?></div>
        <div class = "modal_win_wraper">
			<h2><?_e("Отправить сообщение","rubex");?></h2>
			<!--<p><?_e("Уважаемые клиенты, партнеры и коллеги! В данном разделе вы можете отправить свое сообщение лично Генеральному директору компании ООО «Рабэкс Групп». Ваше обращение будет рассмотрено в течение 2-х рабочих дней","rubex");?>.</p>-->
		
			<form action = "post" class = "obrashenie_form">
				<div class="form-block">
					<!--<label for="obr_name" class="blaclLabel">Ф.И.О.<span class="color-red">*</span></label>-->
					<input type="text" name="obr_name" value="" placeholder = "<?_e("Ф.И.О.","rubex");?>" id="obr_name">
				</div>
				
				<div class="form-block">
					<!--<label for="obr_phone" class="blaclLabel">Контактный телефон<span class="color-red">*</span></label>-->
					<input type="tel" name="obr_phone" value="" placeholder = "<?_e("Контактный телефон","rubex");?>" id="obr_phone">
				</div>
				
				<div class="form-block">
					<!--<label for="obr_mail" class="blaclLabel">e-mail<span class="color-red">*</span></label>-->
					<input type="email" name="obr_mail" value="" placeholder = "<?_e("e-mail","rubex");?>" id="obr_mail">
				</div>
				
				<div class="form-block">
					<div class="select-wrap">
							<select name="napravl" id="">
								<option value="Общие вопросы"><?_e("Общие вопросы","rubex");?></option>
								<option value="Приобретение продукции Rubex"><?_e("Приобретение продукции Rubex","rubex");?></option>
								<option value="Предложение сырья и материалов"><?_e("Предложение сырья и материалов","rubex");?></option>
								<option value="Карьера"><?_e("Карьера","rubex");?></option>
							</select>
					</div>
    			</div>
				
				<div class="form-block form-block-stait"  >
					<div class="select-wrap">
							<select id = "allWinState" name="stait" disabled id="">
								<?php //get_template_part('template-parts/contact-stait');?>
							</select>
					</div>
    			</div>
				
				
				<div class="form-block form-block-region">
					<div class="select-wrap">
						<select  id = "allWinCity" name="region" disabled id="">
							<?php //get_template_part('template-parts/contact-region');?>
						</select>
					</div>
    			</div>
				
				
				<!--
				<div class="form-block">
					<input type="text" name="obr_subject" placeholder = "<?_e("Тема сообщения","rubex");?>" value="" id="obr_subject">
				</div>
				-->
				
				<div class="form-block">
					<!--<label for="obr_msg" class="blaclLabel">Сообщение<span class="color-red">*</span></label>-->
					<textarea name="obr_msg" id="obr_msg" placeholder = "<?_e("Сообщение*","rubex");?>" ></textarea>
				</div>

				<!-- <div class="callback-note snoska"><?_e('Нажимая на кнопку "Отправить", вы соглашаетесь с',"rubex");?> <a class="tdu" href="<?php echo get_permalink(19641);?>"><?_e("условиями обработки персональных данных","rubex");?></a>.</div> -->
				<?php get_template_part('template-parts/callback-note');?>
				
				<div class="form-block">
					<button class="trueButton protected-button" id="obrashenieSubmit"><?_e("Отправить","rubex");?></button>
				</div>
			</form>
		</div>
		
		<div class="modal_win_wraper_photo"></div>
    </div>
</div>


<div style="display: none;">
    <div class="box-modal" id="zvonok-modal">
        <div class="box-modal_close arcticmodal-close"><?_e("закрыть","rubex");?></div>
        <div class="zvonok-modal-wrapper">
	        <div class = "modal_win_wraper">
				<h2><?_e("Заказать звонок","rubex");?></h2>
				
				<form action = "post" class = "obrashenie_form">
					<div class="form-block">
						<input type="text" name="zvonok_name" value="" placeholder="<?_e("Ф.И.О.","rubex");?>" id="zvonok_name">
					</div>
					
					<div class="form-block">
						<input type="tel" name="zvonok_phone" placeholder="<?_e("Контактный телефон","rubex");?>*" value="" id="zvonok_phone">
					</div>
					
					<div class="form-block">
						<input type="email" name="zvonok_mail" placeholder="<?_e("e-mail","rubex");?>*" value="" id="zvonok_mail">
					</div>
					
					
					<div class="form-block">
						<label class="blaclLabel" for = "zvonok_buisnesArea"><?_e("Направления","rubex");?><span class="color-red">*</span></label>
						<div class="select-wrap">
								<select name="napravl" id="">
									<option value="Общие вопросы"><?_e("Общие вопросы","rubex");?></option>
									<option value="Приобретение продукции Rubex"><?_e("Приобретение продукции Rubex","rubex");?></option>
									<option value="Предложение сырья и материалов"><?_e("Предложение сырья и материалов","rubex");?></option>
									<option value="Карьера"><?_e("Карьера","rubex");?></option>
								</select>
						</div>
					</div>
					
					<div class="form-block form-block-stait"  >
						<div class="select-wrap">
								<select id = "allWinState2" name="stait" disabled id="">
									<?php //get_template_part('template-parts/contact-stait');?>
								</select>
						</div>
					</div>
					
					
					<div class="form-block form-block-region">
						<div class="select-wrap">
							<select id = "allWinCity2" name="region" disabled id="">
								<?php //get_template_part('template-parts/contact-region');?>
							</select>
						</div>
					</div>
					
					
    				<!-- <div class="callback-note snoska"><?_e('Нажимая на кнопку "Отправить", вы соглашаетесь с',"rubex");?> <a class="tdu" href="<?php echo get_permalink(19641);?>"><?_e("условиями обработки персональных данных","rubex");?></a>.</div> -->
					<?php get_template_part('template-parts/callback-note');?>
					<div class="form-block">
						<button class="trueButton protected-button" id="zvonokSubmit"><?_e("Отправить","rubex");?></button>
					</div>
				</form>
			</div>
			<div class="modal_win_wraper_photo"></div>
        </div>
    </div>
</div>