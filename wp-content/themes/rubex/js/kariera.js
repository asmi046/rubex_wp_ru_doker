jQuery(document).ready(function ($) {

	jQuery(".show-anket").click(function (e) {
		e.preventDefault();
		jQuery('.vacancy').toggle();
		if (jQuery('.vacancy').is(":visible")) {
			jQuery(this).html("Скрыть анкету");
		} else {
			jQuery(this).html("Заполнить анкету");
		}
	});

	jQuery(".to-anket").click(function (e) {
		jQuery('.vacancy').show();
		if (jQuery('.vacancy').is(":visible")) {
			jQuery(this).html("Скрыть анкету");
		} else {
			jQuery(this).html("Заполнить анкету");
		}
	});

	jQuery("input[name=m_work]").change(function () {
	});

	jQuery("#m_work_yes").click(function (e) {
		jQuery('.form-block-hidden-work').slideDown()
	});

	jQuery("#m_work_no").click(function (e) {
		jQuery('.form-block-hidden-work').slideUp();
	});

	jQuery(".z_ank").click(function (e) {
		jQuery(".vacancy_show_btn").click();
	});


	jQuery(".vacancy_show_btn").click(function (e) {
		jQuery('form.vacancy').toggle();



		if (jQuery('form.vacancy').is(":visible")) {
			jQuery(this).html("Скрыть анкету");

		} else {
			jQuery(this).html("Заполнить анкету");
		}



	});

	$(".zAnketa").click(function (e) {
		e.preventDefault();

		var vakansytext = $(this).data("vakansytext");

		if ((vakansytext != undefined) && (vakansytext != ""))
			$("#vac-modal input[name=vakansy]").val(vakansytext);

		$("#vac-modal").arcticmodal();
	});

	jQuery("#vac-modal .uniSendBtn").click(function (e) {
		e.preventDefault();
		var formEl = $(this).closest('form');
		var vakansy = $(this).siblings('input[name=vakansy]').val();
		var tel = $(this).siblings('input[name=tel]').val();
		var comment = $(this).siblings('textarea[name=comment]').val();
		var file_path = $(this).siblings('.file-path').val();
		var privacyPolicy = formEl.find('input[name=privacy_policy]');
		var policyAccept = formEl.find('input[name=policy_accept]');
		var form = $(this).parent().serialize();
		$(this).siblings('input[name=tel]').css("background-color", "initial");
		privacyPolicy.css("background-color", "initial");
		policyAccept.css("background-color", "initial");

		if ((tel == "") || (tel.indexOf("_") > 0)) {
			$(this).siblings('input[name=tel]').css("background-color", "#ff91a4");
			return;
		}

		if (privacyPolicy.length && !privacyPolicy.is(':checked')) {
			privacyPolicy.css("background-color", "#ff91a4");
			alert('Для отправки формы необходимо согласиться с политикой конфиденциальности');
			return;
		}

		if (policyAccept.length && !policyAccept.is(':checked')) {
			policyAccept.css("background-color", "#ff91a4");
			alert('Для отправки формы необходимо согласиться на обработку персональных данных');
			return;
		}

		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'resume_send',
				nonce: allAjax.nonce,
				tel: tel,
				vakansy: vakansy,
				comment: comment,
				file: file_path
			}
		);

		jqXHR.done(function (responce) {
			console.log(responce);
			jQuery('#vac-modal').arcticmodal('close');
			jQuery('#messgeModal #lineIcon .goodRez').show();
			jQuery('#messgeModal #lineMsg').html("Ваша заявка принята.");
			$(".uniBigFormSendMail .formLoad").hide();
			jQuery('#messgeModal').arcticmodal();
		});

		jqXHR.fail(function (responce) {
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Произошла ошибка, попробуйте позднее.");
			$(".uniBigFormSendMail .formLoad").hide();
			jQuery('#messgeModal').arcticmodal();
		});
	});


	jQuery('input[type=file]').change(function () {
		var file_data = jQuery(this).prop('files')[0];
		var form_data = new FormData();
		var file_span = $(this).parent().siblings('.file-path');
		form_data.append('file', file_data);
		form_data.append('action', "main_load_file");
		form_data.append('nonce', allAjax.nonce);


		var jqXHR = jQuery.ajax({
			url: allAjax.ajaxurl,
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post'
		});

		jqXHR.done(function (responce) {
			file_span.val(responce);
			elems = responce.split('|');
			// spiner.hide();
			// fnel.html(elems[0]);
			// idel.html(elems[1]);
		});

		jqXHR.fail(function (responce) {
			// spiner.hide();
			if (responce.responseText == "0")
				file_span.html("<span style = 'color:red;'>Большой файл!</span>");
			else
				file_span.html(responce.responseText);
		});
	});

	jQuery('.vacancy-item__link .trueButton').click(function (e) {
		console.log(11);


		if (jQuery('#hide_vakansy_info' + jQuery(this).data("indexelem")).is(":visible")) {

			jQuery('#hide_vakansy_info' + jQuery(this).data("indexelem")).css("display", "none");

			jQuery(this).html("Подробнее");

			$(this).parent().parent().removeClass("selectedRow");

		} else {
			jQuery('#hide_vakansy_info' + jQuery(this).data("indexelem")).css("display", "flex");

			$(this).parent().parent().addClass("selectedRow");

			jQuery(this).html("Скрыть");
		}
	});





	jQuery('#vacancy-filter-submit').click(function (e) {
		e.preventDefault();
		var vac_region = jQuery('#vac-region').val();
		var vac_direction = jQuery('#vac-direction').val();
		console.log(vac_region + ' ' + vac_direction);

		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'vacancy_list',
				nonce: allAjax.nonce,
				vac_region: vac_region,
				vac_direction: vac_direction

			}
		);



		// Обработка успешного запроса
		jqXHR.done(function (responce) {
			console.log(responce);
			$(".vacancy-block").html(responce);
		});

		// Обработка запроса с ошибкой
		jqXHR.fail(function (responce) {
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Произошла ошибка, попробуйте позднее.");
			$(".uniBigFormSendMail .formLoad").hide();
			jQuery('#messgeModal').arcticmodal();

		});

	});


	$("input[name=pc]").change(function () {
		console.log($(this).val());
		$('.form-block-hidden-pc').slideUp();
		$(this).parent().next().slideDown();
	});

	$("input[name=goal]").change(function () {
		console.log($(this).val());
		$('.form-block-hidden').slideUp();
		$(this).parent().next().slideDown();
	});

	$("input[name=education]").change(function () {
		$('.form-block-hidden-ed').slideUp();
		$(this).parent().next('.form-block-hidden-ed').slideDown();
	});
	$("input[name=lang]").change(function () {

		$('.form-block-hidden-lang').slideUp();
		if ($(this).is(":checked")) {
			$(this).parent().next('.form-block-hidden-lang').slideDown();
		}
	});



	$(".add-work").click(function (e) {
		e.preventDefault();
		$(this).parent().parent().next('.form-block-hidden-work').slideDown();
	});

	jQuery("#vacancySubmit").click(function () {
		$("#vacancy input").each(function () {
			$(this).css("background-color", "#fff");
		});
		var privacyPolicy = $("#vacancy input[name=privacy_policy]");
		var policyAccept = $("#vacancy input[name=policy_accept]");
		privacyPolicy.css("background-color", "initial");
		policyAccept.css("background-color", "initial");
		if (($("#name").val() == '') || ($("#name").val() == '')) {
			$("#name").css("background-color", "#f7b3bb");
			$("#name").after('<span class="error-input">Заполните поле</span>');
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Заполните поле ФИО.");
			$("#messgeModal").arcticmodal();
			return;
		}
		if (($("#born").val() == '') || ($("#born").val() == '')) {
			$("#born").css("background-color", "#f7b3bb");
			$("#born").after('<span class="error-input">Заполните поле</span>');
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Заполните поле Дата рождения");
			$("#messgeModal").arcticmodal();
			return;
		}
		if (($("#tel").val() == '') || ($("#tel").val() == '')) {
			$("#tel").css("background-color", "#f7b3bb");
			$("#tel").after('<span class="error-input">Заполните поле</span>');
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Заполните поле Телефон");
			$("#messgeModal").arcticmodal();
			return;
		}
		if (($("#city").val() == '') || ($("#city").val() == '')) {
			$("#city").css("background-color", "#f7b3bb");
			$("#city").after('<span class="error-input">Заполните поле</span>');
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Заполните поле Город проживания");
			$("#messgeModal").arcticmodal();
			return;
		}
		if (($("#country").val() == '') || ($("#country").val() == '')) {
			$("#country").css("background-color", "#f7b3bb");
			$("#country").after('<span class="error-input">Заполните поле</span>');
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Заполните поле Гражданство");
			$("#messgeModal").arcticmodal();
			return;
		}
		if (($("#family").val() == '') || ($("#family").val() == '')) {
			$("#family").css("background-color", "#f7b3bb");
			$("#family").after('<span class="error-input">Заполните поле</span>');
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Заполните поле Семейное положение");
			$("#messgeModal").arcticmodal();
		}
		if (($("#university").val() == '') || ($("#university").val() == '')) {
			$("#university").css("background-color", "#f7b3bb");
			$("#university").after('<span class="error-input">Заполните поле</span>');
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Заполните поле Образование");
			$("#messgeModal").arcticmodal();
		}
		if (privacyPolicy.length && !privacyPolicy.is(':checked')) {
			privacyPolicy.css("background-color", "#ff91a4");
			alert('Для отправки формы необходимо согласиться с политикой конфиденциальности');
			return;
		}
		if (policyAccept.length && !policyAccept.is(':checked')) {
			policyAccept.css("background-color", "#ff91a4");
			alert('Для отправки формы необходимо согласиться на обработку персональных данных');
			return;
		}
		var language = '';
		if ($('#lang_1').is(":checked")) {
			language += ' Английский ';
		}
		if ($('#lang_2').is(":checked")) {
			language += ' Французский ';
		}
		if ($('#lang_3').is(":checked")) {
			language += ' Немецкий ';
		}
		if ($('#lang_4').is(":checked")) {
			language += ' Испанский ';
		}
		if ($('#lang_5').is(":checked")) {
			language += ' Китайский ';
		}

		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'send_form_vacancy',
				nonce: allAjax.nonce,
				name: $("#name").val(),
				born: $("#born").val(),
				tel: $('#tel').val(),
				city: $('#city').val(),
				country: $('#country').val(),
				family: $('#family').val(),
				goal: $('input[name=goal]').val(),
				resume: $('#resume').val(),
				vacancy_name: $('#vacancy_name').val(),
				company_name: $('#company_name').val(),
				education: $('input[name=education]').val(),
				education_level_1: $('input[name=education_vo_level_1]').val(),
				name_univercity_1: $("#university_vo_1").val(),
				specialty_vo_1: $("#specialty_vo_1").val(),
				university_year_vo_1: $("#university_year_vo_1").val(),
				education_vo_level_2: $("input[name=education_vo_level_2").val(),
				university_vo_2: $("#university_vo_2").val(),
				specialty_vo_2: $("#specialty_vo_2").val(),
				university_year_vo_2: $("#university_year_vo_2").val(),
				education_vo_level_3: $("input[name=education_vo_level_3").val(),
				university_vo_3: $("#university_vo_3").val(),
				specialty_vo_3: $("#specialty_vo_3").val(),
				university_year_vo_3: $("#university_year_vo_3").val(),
				profession_name: $('#profession_name').val(),
				profession_so_name_1: $("#profession_so_name_1").val(),
				profession_so_name_2: $("#profession_so_name_2").val(),
				profession_so_name_3: $("#profession_so_name_3").val(),
				university_so_1: $("#university_so_1").val(),
				specialty_so_1: $("#specialty_so_1").val(),
				university_year_so_1: $("#university_year_so_1").val(),
				university_so_2: $("#university_so_2").val(),
				specialty_so_2: $("#specialty_so_2").val(),
				specialty_so_2: $("#university_so_2").val(),
				university_so_3: $("#university_so_3").val(),
				specialty_so_3: $("#specialty_so_3").val(),
				specialty_so_3: $("#university_so_3").val(),
				university_year_so_3: $("#university_year_so_3").val(),
				colleg_name: $('#colleg_name').val(),
				university: $('#university').val(),
				university_year: $('#university_year').val(),
				education_level: $('input[name=education_level]').val(),
				specialty: $('#specialty').val(),
				lang: language,

				lang_name: $('#lang_name').val(),
				pc: $("input[name=pc]").val(),
				programms: $('#programms').val(),
				m_work: $('#work').val(),
				company_work_1: $('#company_work_1').val(),
				period_work_1: $('#period_work_1').val(),
				work_project_1: $('#work_project_1').val(),
				company_work_2: $('#company_work_2').val(),
				period_work_2: $('#period_work_2').val(),
				work_project_2: $('#work_project_2').val(),
				trip: $('input[name=trip]').val(),
				salary: $('#salary').val(),
				about: $('#about').val(),
				semail: $('#semail').val()
			}
		);



		// Обработка успешного запроса
		jqXHR.done(function (responce) {
			console.log(responce);
			$(".uniBigFormSendMail #your-name").val("");
			$(".uniBigFormSendMail #your-email").val("");
			$(".uniBigFormSendMail #your-message").val("");

			jQuery('#messgeModal #lineIcon .goodRez').show();
			jQuery('#messgeModal #lineMsg').html("Ваша заявка принята. Мы свяжемся с Вами в ближайшее время.");
			$(".uniBigFormSendMail .formLoad").hide();
			jQuery('#messgeModal').arcticmodal({
				afterClose: function (data, el) {
					document.location.replace("https://rubexgroup.ru/kariera/vakansii");
				}
			});
		});

		// Обработка запроса с ошибкой
		jqXHR.fail(function (responce) {
			jQuery('#messgeModal #lineIcon .bedRez').show();
			jQuery('#messgeModal #lineMsg').html("Произошла ошибка, попробуйте позднее.");
			$(".uniBigFormSendMail .formLoad").hide();
			jQuery('#messgeModal').arcticmodal();

		});

	});


	// input.addEventListener('focus', function(){ input.classList.add( 'has-focus' ); });
	// input.addEventListener('blur', function(){ input.classList.remove( 'has-focus' ); });
});