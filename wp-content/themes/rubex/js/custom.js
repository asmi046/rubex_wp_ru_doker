function isEmail(email) {
	var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return regex.test(email);
}

jQuery(document).ready(function ($) {

	$('.pvc_foto_galery').slick({
		slidesToShow: 1,
		dots: false,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 3000,
	});

	//--------------Кнопка поделиться

	$(".shareButton").click(function (e) {
		e.preventDefault();
		var blk = $(this).data("shareblkname");

		if (navigator.share) {
			navigator.share({
				title: document.title,
				url: window.location.href,
				text: $("#" + blk).text()
			}).then(() => {
				alert('Данные отправленны!');
			}).catch(console.error);
		} else {
			alert('Web Share API не поддерживается');
		}
	});


	var inputmask_phone = {
		"mask": "+7(999)999-99-99"
	};

	jQuery("input[type=tel]").inputmask(inputmask_phone);

	$(".hamburger").click(function () {
		$('.mob-menu').css('bottom', '0');
	});

	lightbox.option({
		'resizeDuration': 200,
		'wrapAround': true,
		'albumLabel': ''
	})
	$('.open-menu-link').click(function (e) {
		if ($(".mobile-menu__wrapper").css("left") == "0px")
			$(".mobile-menu__wrapper").css('left', '100%');
		else
			$(".mobile-menu__wrapper").css('left', '0px');
	});

	$('.mobile-menu .sub-menu').css('display', 'none');

	/*
	$(".menu-item-has-children > a").click(function(e) {
	  
	  if (document.documentElement.clientWidth <= 1050) return;
	  console.log(222);
	  e.preventDefault();
	  $(this).parent().siblings().children('a').next().slideUp();
	  $(this).next().slideToggle();
	});
	*/

	$(".mobile_sidebar_select_label").html($(".catalog_subcategory_list .active").html());

	$(".mobile_sidebar_select a").click(function (e) {
		if (document.documentElement.clientWidth > 450) return;
		if ($(this).data("cattype") != "lnk") e.preventDefault();
		$(this).parent().parent().siblings(".mobile_sidebar_select_label").html($(this).html());
		if ($(this).data("cattype") != "lnk") $(this).parent().parent().slideToggle();
	});

	$(".mobile_sidebar_select .mobile_sidebar_select_label").click(function (e) {
		e.preventDefault();
		$(this).siblings("ul").slideToggle();
	});


	$(".mobile-menu > ul > .menu-item-has-children > a").click(function (e) {
		e.preventDefault();
		$(this).siblings(".sub-menu").slideToggle();
	});


	$("#menu-item-has-children > a").click(function (e) {
		//if (document.documentElement.clientWidth > 1024) return;
		e.preventDefault();
		console.log($(this).siblings(".sub-menu").css("display"));

		if ($(this).siblings(".sub-menu").css("display") == "none") {
			$(this).siblings(".sub-menu").css("display", "flex");

		}
		else {
			$(this).siblings(".sub-menu").css("display", "none");
		}
	});


	$(".close-menu").click(function () {
		$('.mob-menu').css('bottom', '100%');
	});
	$(".category-wrapper__cat").click(function () {
		$('.sidebar').toggleClass('active');
	});
	$(".product-main__legend-btn").click(function () {
		$(this).next().slideToggle();
	});
	$(".cat-item").hide();
	$(".sidebar-cat-parent a").click(function (e) {
		e.preventDefault();
		$(this).next().slideToggle();
	});
	$('.main-bnr__slider').slick({
		slidesToShow: 1,
		dots: true,
		arrows: true,
		prevArrow: '<div class="slider-arrow slider-arrow-prev"></div>',
		nextArrow: '<div class="slider-arrow slider-arrow-next"></div>',
		autoplay: true,
		autoplaySpeed: 15000,
	});
	$('.history-slider__slider').slick({
		slidesToShow: 1,
		dots: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 10000,
		// adaptiveHeight: true,
		onAfterChange: function (slider, index) {
			//   var time = $(slider.$slides.get(index)).data('time');
			// var time = $('.slick-current').attr("data-time");    
			//   console.log($(slider.$slides.get(index)).attr('data-time'))
		}
	});
	$('.history-slider__slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {

		var time = $(slick.$slides.get(nextSlide)).attr('data-time');
		$(this).parent().find('.history-slider__date').text(time);
	});

	$('.top-btn').click(function () {
		$('body, html').animate({
			scrollTop: 0
		}, 1000);
	});

	$('.team-block__hide').css('display', 'none');

	$('.team-btn').click(function (e) {
		e.preventDefault();
		$(this).prev().find('.team-block__hide').slideToggle();
		$(this).toggleClass('bg-gray');
		if ($(this).text() === 'Подробнее') {
			$(this).text('Свернуть');
		} else {
			$(this).text('Подробнее');
		}
	});

	if ($(window).width() > 750) {
		var hegiht_text = 0;
		$('.history-slider__slide-text').each(function () {
			if ($(this).height() > hegiht_text) {
				hegiht_text = $(this).height();
			}
		});
		$('.history-slider__slide-text').height(hegiht_text);

	}

	$('.main-catalog__photo-link.more-link').click(function (e) {
		e.preventDefault();
		$(this).parent().nextAll().slideDown();
		$(this).hide();
	});

	$('.video-more').click(function (e) {
		e.preventDefault();
		$(this).siblings('.video-wrapper').children('.item-slide').slideToggle();
	});

	$('.more-catalog').click(function (e) {
		e.preventDefault();
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).siblings('.brochure-wrapper, .brand-wrapper, .equipment-wrapper').children('.item-slide').slideToggle();
			$(this).text('Смотреть все');
		} else {
			$(this).addClass('active');
			$(this).siblings('.brochure-wrapper, .brand-wrapper, .equipment-wrapper').children('.item-slide').slideToggle();
			$(this).text('Скрыть');
		}
	});

	$(".contacts-map .map").click(function (e) {
		e.preventDefault();
		$('.contacts-map .map').removeClass('active');

		$(this).addClass('active');
		var map = $(this).data('map');

		/*
		var title = $(this).text();
		var address = $(this).data('address');
		var tel = $(this).data('tel');
		var tel_link = tel.split(' ').join('');
		var mail = $(this).data('mail');
		$('.h1-contacts').text(title);
		*/

		// $('.address-mail').attr('href', mail);
		// $('.address-mail').text(mail);
		// $('.address-item').text(address);
		// $('.address-tel').attr('href', tel_link);
		// $('.address-tel').text(tel);
		$('.mapLine-wrap').hide();
		$("#mapLine-wrap-" + map).show();
	});

	var width = $(".video-item").width();
	var height = width * .56;
	$('.video-item iframe').attr({ 'width': width, 'height': height });
	// $(".tab_item").not(":first").hide();
	// $(".wrapper .tab").click(function () {
	//   $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
	//   $(".tab_item").hide().eq($(this).index()).fadeIn()
	// }).eq(0).addClass("active");

	$(".tab-year").click(function () {
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		var year = $(this).text();
		console.log(year);
		$("#tab_item").load(allAjax.ajaxurl,
			{
				action: 'tenders',
				nonce: allAjax.nonce,
				ajaxAction: "getYearTender",
				year: $(this).text(),
			}, function (response, status, xhr) {
				if (status == "error") {
					var msg = "Sorry but there was an error: ";
					alert(msg + xhr.status + " " + xhr.statusText);
				}
				//$(".tenderInput").append('<div class = "eshe">Еще...</div>');
			});
		$(".data-item__link").show();
	});

	$("body").on('click', '.data-more-link', function (e) {
		e.preventDefault();
		$("#tab_item").load(allAjax.ajaxurl,//"<?php bloginfo("template_url")?>/ajaxAction/tenderAjax.php", 
			{
				action: 'tenders',
				nonce: allAjax.nonce,
				ajaxAction: "getYearTenderAll",
				year: $(".tab-year.active").text(),
			}, function (response, status, xhr) {
				if (status == "error") {
					var msg = "Sorry but there was an error: ";
					alert(msg + xhr.status + " " + xhr.statusText);
				}

			});
		$(this).hide();
	});

	$(".sidebar-period a").click(function (e) {
		$(".sidebar-period a").removeClass('active');
		$(this).addClass('active');
		var cat = $('.sidebar-block__news a.active').data('cat');
		var year = $(this).text();
		e.preventDefault();
		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'load_news',
				nonce: allAjax.nonce,
				cat: cat,
				year: year
			}
		);
		jqXHR.done(function (responce) {
			console.log(responce);

			$('.news-wrapper').html(responce);
		});

		jqXHR.fail(function (responce) {
		});
	});
	$('body').on('click', '.load-more', function (e) {
		e.preventDefault();
		$('.news-item__toggle').slideToggle();
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).text('Показать еще');
		} else {
			$(this).addClass('active');
			$(this).text('Скрыть');
		}
	});



	$(".sidebar-block__news a").click(function (e) {
		$(".sidebar-block__news a").removeClass('active');
		$(this).addClass('active');
		var cat = $(this).data('cat');
		var year = $('.sidebar-period a.active').text();
		e.preventDefault();
		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'load_news',
				nonce: allAjax.nonce,
				cat: cat,
				year: year
			}
		);
		jqXHR.done(function (responce) {
			console.log(responce);

			$('.news-wrapper').html(responce);
		});

		jqXHR.fail(function (responce) {
		});
	});

	$(".sidebar-cat-parent1 a").click(function (e) {
		$(".sidebar-cat-parent1 a").removeClass('active');
		$(this).addClass('active');
		var cat = $(this).data('cat');
		var year = $('.sidebar-period a.active').text();
		e.preventDefault();
		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'load_news',
				nonce: allAjax.nonce,
				cat: cat,
				year: year
			}
		);
		jqXHR.done(function (responce) {
			console.log(responce);

			$('.news-wrapper').html(responce);
		});

		jqXHR.fail(function (responce) {
		});
	});
	$(".main-menu").scrollToFixed({
		marginTop: 0,
	});


	//------------Кнопки дозвона
	jQuery("#obrahenie_btn").click(function (e) {
		e.preventDefault();
		jQuery('#obrashenie-modal').arcticmodal();
	});

	jQuery("#zvonok_btn").click(function (e) {
		e.preventDefault();
		jQuery('#zvonok-modal').arcticmodal();
	});

	//------------ Отправка звонка
	jQuery("#zvonokSubmit").click(function (e) {
		e.preventDefault();

		var name = $(this).parent().parent().find('input[name=zvonok_name]').val();
		var phone = $(this).parent().parent().find('input[name=zvonok_phone]').val();
		var mail = $(this).parent().parent().find('input[name=zvonok_mail]').val();

		var napravl = $(this).parent().parent().parent().find('select[name=napravl]').val();
		var stait = $(this).parent().parent().parent().find('select[name=stait]').val();
		var region = $(this).parent().parent().parent().find('select[name=region]').val();

		var privacyPolicy = $(this).parent().parent().find('input[name=privacy_policy]');
		var policyAccept = $(this).parent().parent().find('input[name=policy_accept]');

		$(this).parent().parent().find('input').css("background-color", "initial");
		$(this).parent().parent().find('select').css("background-color", "initial");
		$(this).parent().parent().find('select').css("background-color", "initial");
		privacyPolicy.css("background-color", "initial");
		policyAccept.css("background-color", "initial");

		if (name == "") {
			$(this).parent().parent().find('input[name=zvonok_name]').css("background-color", "#ff91a4");
			return;
		}

		if ((phone == "") || (phone.indexOf("_") > 0)) {
			$(this).parent().parent().find('input[name=zvonok_phone]').css("background-color", "#ff91a4");
			return;
		}


		if ((mail == "") || !isEmail(mail)) {
			$(this).parent().parent().find('input[name=zvonok_mail]').css("background-color", "#ff91a4");
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

		if ((napravl == "Приобретение продукции Rubex") && (stait == null)) {
			$(this).parent().parent().parent().find('select[name=stait]').css("background-color", "#ff91a4");
			return;
		}

		if ((napravl == "Приобретение продукции Rubex") && (stait == "Россия") && (region == null)) {
			$(this).parent().parent().parent().find('select[name=region]').css("background-color", "#ff91a4");
			return;
		}

		$(this).prop('disabled', true);
		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'sen_recall',
				nonce: allAjax.nonce,
				name: name,
				phone: phone,
				mail: mail,
				napravl: napravl,
				stait: stait,
				region: region
			}

		);


		jqXHR.done(function (responce) {
			window.location.href = responce;
			$(this).prop('disabled', false);
		});

		jqXHR.fail(function (responce) {
			jQuery('#messgeModal #lineIcon').html('');
			jQuery('#messgeModal #lineMsg').html("Произошла ошибка! Попробуйте позднее.");
			jQuery('#messgeModal').arcticmodal();
			$(this).prop('disabled', false);
		});

	});

	//------------ Отправка прямого образения
	jQuery("#obrashenieSubmit").click(function (e) {
		e.preventDefault();

		var name = $(this).parent().parent().find('input[name=obr_name]').val();
		var phone = $(this).parent().parent().find('input[name=obr_phone]').val();
		var mail = $(this).parent().parent().find('input[name=obr_mail]').val();

		var napravl = $(this).parent().parent().parent().find('select[name=napravl]').val();
		var stait = $(this).parent().parent().parent().find('select[name=stait]').val();
		var region = $(this).parent().parent().parent().find('select[name=region]').val();

		var privacyPolicy = $(this).parent().parent().find('input[name=privacy_policy]');
		var policyAccept = $(this).parent().parent().find('input[name=policy_accept]');

		var msg = $(this).parent().parent().find('textarea[name=obr_msg]').val();

		$(this).parent().parent().find('input').css("background-color", "initial");
		$(this).parent().parent().find('textarea').css("background-color", "initial");
		$(this).parent().parent().find('select').css("background-color", "initial");
		privacyPolicy.css("background-color", "initial");
		policyAccept.css("background-color", "initial");

		if (name == "") {
			$(this).parent().parent().find('input[name=obr_name]').css("background-color", "#ff91a4");
			return;
		}

		if ((phone == "") || (phone.indexOf("_") > 0)) {
			$(this).parent().parent().find('input[name=obr_phone]').css("background-color", "#ff91a4");
			return;
		}


		if ((mail == "") || !isEmail(mail)) {
			$(this).parent().parent().find('input[name=obr_mail]').css("background-color", "#ff91a4");
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

		console.log(napravl);
		if ((napravl == "Приобретение продукции Rubex") && (stait == null)) {
			$(this).parent().parent().parent().find('select[name=stait]').css("background-color", "#ff91a4");
			return;
		}
		console.log(stait);
		if ((napravl == "Приобретение продукции Rubex") && (stait == "Россия") && (region == null)) {
			$(this).parent().parent().parent().find('select[name=region]').css("background-color", "#ff91a4");
			return;
		}


		if (msg == "") {
			$(this).parent().parent().find('textarea[name=obr_msg]').css("background-color", "#ff91a4");
			return;
		}

		var $button = $(this);
		console.log($button);
		$button.prop('disabled', true);
		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'send_obrashenie',
				nonce: allAjax.nonce,
				name: name,
				phone: phone,
				mail: mail,
				napravl: napravl,
				stait: stait,
				region: region,
				msg: msg
			}

		);


		jqXHR.done(function (responce) {
			//console.log(responce);
			window.location.href = responce;
			$button.prop('disabled', false);
		});

		jqXHR.fail(function (responce) {
			jQuery('#messgeModal #lineIcon').html('');
			jQuery('#messgeModal #lineMsg').html("Произошла ошибка! Попробуйте позднее.");
			jQuery('#messgeModal').arcticmodal();
			$button.prop('disabled', false);
		});

	});

	// jQuery(".uniSendBtn").click(function(e){ 
	// 	e.preventDefault();

	// 	var name = $(this).parent().find('input[name=name]').val();
	// 	var phone = $(this).parent().find('input[name=tel]').val();
	// 	var msg = $(this).data('mailmsg');

	// 	if (name == "") {
	// 		$(this).parent().find('input[name=name]').css("background-color","#ff91a4");
	// 		return;
	// 	}

	// 	if ((phone == "")||(phone.indexOf("_")>0)) {
	// 		$(this).parent().find('input[name=tel]').css("background-color","#ff91a4");
	// 		return;
	// 	}

	// 	var  jqXHR = jQuery.post(
	// 		allAjax.ajaxurl,
	// 		{
	// 			action: 'universal_send',    
	// 			nonce: allAjax.nonce,
	// 			name: name,
	// 			tel: phone,
	// 			msg: msg
	// 		}

	//     );


	//     jqXHR.done(function (responce) {
	//       //console.log(responce);
	// 	  window.location.href = responce;
	//     });

	//     jqXHR.fail(function (responce) {
	//       jQuery('#messgeModal #lineIcon').html('');
	//       jQuery('#messgeModal #lineMsg').html("Произошла ошибка! Попробуйте позднее.");
	//       jQuery('#messgeModal').arcticmodal();
	//     });

	// });


	jQuery(".callback-btn").click(function (e) {
		e.preventDefault();
		var name = $(this).parent().parent().find('input[name=cont_name]').val();
		var phone = $(this).parent().parent().find('input[name=cont_tel]').val();
		var mail = $(this).parent().parent().find('input[name=cont_email]').val();

		var napravl = $(this).parent().parent().parent().find('select[name=napravl]').val();
		var stait = $(this).parent().parent().parent().find('select[name=stait]').val();
		var region = $(this).parent().parent().parent().find('select[name=region]').val();

		var msg = $(this).parent().parent().find('textarea[name=cont_message]').val();

		$(this).parent().parent().find('input').css("background-color", "white");
		$(this).parent().parent().find('textarea').css("background-color", "white");
		$(this).parent().parent().find('select').css("background-color", "white");

		if (name == "") {
			$(this).parent().parent().find('input[name=cont_name]').css("background-color", "#ff91a4");
			return;
		}

		if ((phone == "") || (phone.indexOf("_") > 0)) {
			$(this).parent().parent().find('input[name=cont_tel]').css("background-color", "#ff91a4");
			return;
		}


		if ((mail == "") || !isEmail(mail)) {
			$(this).parent().parent().find('input[name=cont_email]').css("background-color", "#ff91a4");
			return;
		}

		console.log(napravl);
		if ((napravl == "Приобретение продукции Rubex") && (stait == null)) {
			$(this).parent().parent().parent().find('select[name=stait]').css("background-color", "#ff91a4");
			return;
		}
		console.log(stait);
		if ((napravl == "Приобретение продукции Rubex") && (stait == "Россия") && (region == null)) {
			$(this).parent().parent().parent().find('select[name=region]').css("background-color", "#ff91a4");
			return;
		}


		if (msg == "") {
			$(this).parent().parent().find('textarea[name=cont_message]').css("background-color", "#ff91a4");
			return;
		}

		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'send_obrashenie',
				nonce: allAjax.nonce,
				name: name,
				phone: phone,
				mail: mail,
				napravl: napravl,
				stait: stait,
				region: region,
				msg: msg
			}

		);


		jqXHR.done(function (responce) {

			window.location.href = responce;
		});

		jqXHR.fail(function (responce) {
			jQuery('#messgeModal #lineIcon').html('');
			jQuery('#messgeModal #lineMsg').html("Произошла ошибка! Попробуйте позднее.");
			jQuery('#messgeModal').arcticmodal();
		});

		/*    
		var formid = jQuery(this).data("formid");
		  var message = jQuery(this).data("mailmsg");
		  var name = $(this).parent().parent().find('input[name=name]').val();
		  var tel = $(this).parent().parent().find('input[name=tel]').val();
		  var email = $(this).parent().parent().find('input[name=email]').val();
		  var region = $(this).parent().parent().find('input[name=region]').val();
		  var napr = $(this).parent().parent().find('select[name=napravl]').val();
		  var mes = $(this).parent().parent().find('textarea[name=message]').val();
		  
		  if ((name == "")||(name.indexOf("_")>0)) {
			$(this).parent().parent().find('input[name=name]').css("background-color","#ff91a4");
		  } else if((tel == "")||(tel.indexOf("_")>0)) {
			$(this).parent().parent().find('input[name=tel]').css("background-color","#ff91a4");
		  } else if((email == "")||(email.indexOf("_")>0)) {
			$(this).parent().parent().find('input[name=email]').css("background-color","#ff91a4");
		  } else if((region == "")||(region.indexOf("_")>0)) {
			$(this).parent().parent().find('input[name=region]').css("background-color","#ff91a4");
		  } else {
			var  jqXHR = jQuery.post(
			  allAjax.ajaxurl,
			  {
				action: 'contacts_send',    
				nonce: allAjax.nonce,
				msg: message,
				name: name,
				tel: tel,
				email: email,
				region: region,
				napr: napr,
				mes: mes
			  }
			  
			);
		    
		    
			jqXHR.done(function (responce) {
			  
			  jQuery('#messgeModal #lineMsg').html("Ваша заявка принята. Мы свяжемся с Вами в ближайшее время.");
			  jQuery('#messgeModal').arcticmodal();
			  
			});
		    
			jqXHR.fail(function (responce) {
			  jQuery('#messgeModal #lineIcon').html('');
			  jQuery('#messgeModal #lineMsg').html("Произошла ошибка! Попробуйте позднее.");
			  jQuery('#messgeModal').arcticmodal();
			});
		  }
	  */
	});



	$('.main-bnr__wrapper .slick-dots').appendTo('.main-bnr__informer');
	$('.main-bnr__wrapper .slider-arrow').appendTo('.main-bnr__informer');
	//  $("#menu-item-has-children").hover(
	//    function () {
	//      $(".main-menu .container").css('position', 'static');
	//    },
	//    function () {
	//      $(".main-menu .container").css('position', 'relative');
	//    }
	//  );

	// Селекты обратной связи


	$("select[name=napravl]").change(function () {
		console.log($(this).parent().parent().parent().find("select[name=stait]"));
		if ($(this).val() == "Приобретение продукции Rubex") {
			$(this).parent().parent().parent().find("select[name=stait]").removeAttr("disabled");
			//$(this).parent().parent().parent().find("select[name=region]").removeAttr("disabled");
		} else {
			$(this).parent().parent().parent().find("select[name=stait]").attr("disabled", "disabled");
			$(this).parent().parent().parent().find("select[name=region]").attr("disabled", "disabled");
		}
	});

	$("select[name=stait]").change(function () {
		if ($(this).val() != "Россия") {
			$(this).parent().parent().parent().find("select[name=region]").attr("disabled", "disabled");
		} else {
			$(this).parent().parent().parent().find("select[name=region]").removeAttr("disabled");
		}
	});



	// Калькулятор

	$("#buttonRashetProizvod").click(function () {

		if ($("#r1Diam").val() == "") {
			$("#r1Diam").css("border", "2px solid #bf1e2e");
			return;
		}

		if ($("#r1Davl").val() == "") {
			$("#r1Davl").css("border", "2px solid #bf1e2e");
			return;
		}


		var diam = $("#r1Diam").val();
		var davl = $("#r1Davl").val();

		diam = diam / 1000;
		var maxVpot = Math.sqrt(davl);
		var ploshadSech = Math.PI * (Math.pow(diam / 2, 2));
		var maxRashod = maxVpot * ploshadSech;
		var maxRashodLs = maxRashod * 1000;
		var res = maxRashodLs * 60;

		$("#r1Rez").val(res.toFixed(3));
	});

	$("#buttonRashetNeobhDavl").click(function () {

		if ($("#r2Rashod").val() == "") {
			$("#r2Rashod").css("border", "2px solid #bf1e2e");
			return;
		}

		if ($("#r2Diametr").val() == "") {
			$("#r2Diametr").css("border", "2px solid #bf1e2e");
			return;
		}

		var rashod = $("#r2Rashod").val();
		var diametr = $("#r2Diametr").val();

		var v1 = (rashod / 60) / 1000;
		var v2 = diametr / 1000;

		var PlSech = Math.PI * (Math.pow(v2 / 2, 2));

		var res = Math.pow(v1 / PlSech, 2)

		$("#r2Rez").val(res.toFixed(3));
	});


	$("#buttonRashetPodhDiam").click(function () {

		if ($("#r3Rashod").val() == "") {
			$("#r3Rashod").css("border", "2px solid #bf1e2e");
			return;
		}

		if ($("#r3Davl").val() == "") {
			$("#r3Davl").css("border", "2px solid #bf1e2e");
			return;
		}

		var rashod = $("#r3Rashod").val();
		var diametr = $("#r3Davl").val();

		var v1 = (rashod / 60) / 1000;


		var res = (2 * Math.sqrt(v1 / (Math.sqrt(diametr) * Math.PI))) * 1000;

		$("#r3Rez").val(res.toFixed(3));
	});

	function coeficientGidrTreniya(diametrM, chisloReinoldsa) {
		var ecvivalentSher = 0.000015;

		var z1 = 2300;
		var z2 = 4000;
		var z3 = 10 * diametrM / (ecvivalentSher / 1000);
		var z4 = 560 * diametrM / (ecvivalentSher / 1000);

		var textZnach = "";
		var coeficientGidrTr = 0;

		if (chisloReinoldsa < z1) {
			textZnach = "Ламинарный";
			coeficientGidrTr = 64 / chisloReinoldsa;
		}
		else if ((chisloReinoldsa > z1) && (chisloReinoldsa < z2)) {
			textZnach = "Переходный";
			coeficientGidrTr = 0;
		}
		else if ((chisloReinoldsa > z2) && (chisloReinoldsa < z3)) {
			textZnach = "Турбулентный 1";
			coeficientGidrTr = 0.3164 / Math.pow(chisloReinoldsa, 0.25);

		}
		else if ((chisloReinoldsa > z3) && (chisloReinoldsa < z4)) {
			textZnach = "Турбулентный 2";
			coeficientGidrTr = 0.11 * Math.pow(ecvivalentSher / diametrM + 68 / chisloReinoldsa, 0.25);
		}
		else if (chisloReinoldsa > z4) {
			textZnach = "Турбулентный 2";
			coeficientGidrTr = 0.11 * Math.pow(ecvivalentSher / diametrM, 0.25);
		}
		return coeficientGidrTr;
	}

	$("#buttonRashetHidropoter").click(function () {

		if ($("#r4Diametr").val() == "") {
			$("#r4Diametr").css("border", "2px solid #bf1e2e");
			return;
		}

		if ($("#r4Davl").val() == "") {
			$("#r4Davl").css("border", "2px solid #bf1e2e");
			return;
		}

		if ($("#r4Dlinna").val() == "") {
			$("#r4Dlinna").css("border", "2px solid #bf1e2e");
			return;
		}

		var diametr = $("#r4Diametr").val();
		var davlenie = $("#r4Davl").val();
		var dlinna = $("#r4Dlinna").val();
		var viazkost = 1.002;

		var v1 = diametr / 1000;
		var v2 = viazkost / 1000000;


		var maxVpot = Math.sqrt(davlenie);
		var ploshadSech = Math.PI * (Math.pow(v1 / 2, 2));
		var chisloReinoldsa = maxVpot * v1 / v2;

		var gidropotery = (coeficientGidrTreniya(v1, chisloReinoldsa) * (dlinna * Math.pow(maxVpot, 2)) / (v1 * 2 * 9.81)) / 10;

		var gidropoteryProc = (gidropotery / davlenie) * 100;
		var rezPotery = davlenie - gidropotery;




		$("#r4Rez1").val(gidropoteryProc.toFixed(1));
		$("#r4Rez2").val(rezPotery.toFixed(3));
	});

});
