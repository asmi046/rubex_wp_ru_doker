    <section class="callback-form">
    	<div class="container">
    		<h2 class="section-title"><?_e("Обратная связь","rubex");?></h2>
    		<form action="">
    			<div class="form-block">
    				<input type="text" name="cont_name" placeholder="<?_e("Имя","rubex");?>*">
    				<input type="tel" name="cont_tel" placeholder="<?_e("Контактный телефон","rubex");?>*">
    				<input type="text" name="cont_email" placeholder="<?_e("e-mail","rubex");?>*">
    				
					<div class="select-wrap">
							<select name="napravl" id="">
								<option value="Общие вопросы"><?_e("Общие вопросы","rubex");?></option>
								<option value="Приобретение продукции Rubex"><?_e("Приобретение продукции Rubex","rubex");?></option>
								<option value="Предложение сырья и материалов"><?_e("Предложение сырья и материалов","rubex");?></option>
								<option value="Карьера"><?_e("Карьера","rubex");?></option>
							</select>
					</div>
					
					<div class="select-wrap">
							<select name="stait" disabled id="">
								<?php get_template_part('template-parts/contact-stait');?>
							</select>
					</div>
					
					
    			</div>
    			<div class="form-block">
    				
					
					
					
					
					
					
					<div class="select-wrap">
						<select name="region" disabled id="">
							<?php get_template_part('template-parts/contact-region');?>
						</select>
					</div>

    				<textarea name="cont_message" id="message" cols="30" rows="10" placeholder="Сообщение"></textarea>
    				<!-- <div class="callback-note snoska"><?_e('Нажимая на кнопку "Отправить", вы соглашаетесь с',"rubex");?> <a class="tdu" href="<?php echo get_permalink(19641);?>"><?_e("условиями обработки персональных данных","rubex");?></a>.</div> -->
					<?php get_template_part('template-parts/callback-note');?>
					<a href="#" class="main-catalog__photo-link callback-btn protected-button"><?_e("Отправить","rubex");?></a>
    				
    			</div>
    		</form>
    	</div>
    </section>