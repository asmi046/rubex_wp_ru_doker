
//------------------------------------------приобразование из формата вывода в таблицу

function trueFloat(str) {  
	var VRegExp = new RegExp(/^(\s|\u00A0)+/g);  
	var VResult = str.replace(/\s/g, '');  
	//var VResult = str.replace(' ', '');  
return VResult.replace(/,/, '.');  
}

//------------------------------------------Вывод окрашенных статусов
	function ostatokGetView(nal) { 
		if (nal == "Под заказ") return "<span class = 'nalShdat'>Под заказ</span>";
		if (nal == "В наличии") return "<span class = 'nalEst'>В наличии</span>";
		return "<span class = 'nalNehv'>"+nal+"</span>";
	}


//-----------------------------------------Новые функции для магазина
function sumsCalculateNew(bascetInp)
{
	
	
	cookie_value = jQuery.cookie('imTovarBascetItog');
	
	
	if (cookie_value != null) {

		var massRez = cookie_value.split('|');
		
		var sale = massRez[1];
		var summ = massRez[0];
		var summZakSale = massRez[3];
		var nds = massRez[2];
		
		$(".elemSaleSum").html(sale); 
		$(".elemSaleSum").html(accounting.formatNumber($(".elemSaleSum").html(), 2, " ", ",")+" р.");

		$(".elemZakSum2").html(summ); 
		$(".elemZakSum2").html(accounting.formatNumber($(".elemZakSum2").html(), 2, " ", ",")+" р.");
		
		$(".elemZakSum").html(summZakSale); 
		$(".elemZakSum").html(accounting.formatNumber($(".elemZakSum").html(), 2, " ", ",")+" р.");
		
		$(".elemSummNDS").html(nds); 
		$(".elemSummNDS").html(accounting.formatNumber($(".elemSummNDS").html(), 2, " ", ",")+" р.");
		
		if (bascetInp) {
			$(".itogPrice2").html(summZakSale); 
			$(".itogPrice2").html(accounting.formatNumber($(".itogPrice2").html(), 2, " ", ","));
			
			$(".itogSale").html(sale); 
			$(".itogSale").html(accounting.formatNumber($(".itogSale").html(), 2, " ", ","));
			
			$(".itogPrice").html(summ); 
			$(".itogPrice").html(accounting.formatNumber($(".itogPrice").html(), 2, " ", ","));
			
			$(".itogNDS").html(nds); 
			$(".itogNDS").html(accounting.formatNumber($(".itogNDS").html(), 2, " ", ","));
		}
	
	}
	
	var  jqXHR = jQuery.post(
		allAjax.ajaxurl,
		{
			action: 'get_bascet_info',
			nonce: allAjax.nonce,
		}
	);
	
	
	
	// Обработка успешного запроса
	jqXHR.done(function (responce) {
			console.log(responce);
				var massRez = responce.split('|');
			
				for (i = 0; i < massRez.length; i++ ) {
						massRez1 = massRez[i].split(';');
						if (!bascetInp) {
							$("#cartBtn"+massRez1[0]).addClass("inCartBtn");
							$("#trCount"+massRez1[0]).attr('disabled','disabled');
						}
						
						$("#trCount"+massRez1[0]).val(massRez1[1]);
						$("#trSaleLine"+massRez1[0]).html(massRez1[2]);
						$("#trSaleLine"+massRez1[0]).html(accounting.formatNumber($("#trSaleLine"+massRez1[0]).html(), 2, " ", ","));
						
						$("#trPriceLine"+massRez1[0]).html(massRez1[3]);
						$("#trPriceLine"+massRez1[0]).html(accounting.formatNumber($("#trPriceLine"+massRez1[0]).html(), 2, " ", ","));
						
						$("#trSummLine"+massRez1[0]).html(massRez1[4]);
						$("#trSummLine"+massRez1[0]).html(accounting.formatNumber($("#trSummLine"+massRez1[0]).html(), 2, " ", ","));
						
						$("#trNal"+massRez1[0]).html(ostatokGetView(massRez1[5]));
				}
	});

	// Обработка запроса с ошибкой
	jqXHR.fail(function (responce) {
		console.log(responce);
	});
	
	

}


function dellBascet(idElem) {
	if ($("#trCount"+idElem).val() == "") return;
	var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'delete_in_bascet',
						nonce: allAjax.nonce,
						idElem:idElem
					}
				);
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
					sumsCalculateNew(true);
					//if (0 == responce)
					if (jQuery.cookie('imTovarBascet') == null)
					{
						jQuery(".oformZakBtn").addClass("redBtnDisabled");
					}
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {
				
				
					//console.log(responce);
				});
}	

function updateBascet(idElem) {
	if ($("#trCount"+idElem).val() == "") return;
				
				var  jqXHR = jQuery.post(
					allAjax.ajaxurl,
					{
						action: 'update_bascet',
						nonce: allAjax.nonce,
						count: $("#trCount"+idElem).val(),
						price: $("#trPrice"+idElem).html(),
						minprice: $("#trMinPrice"+idElem).html(),
						gost: $("#trGost"+idElem).html(),
						sklad: $("#trInskl"+idElem).html(),
						idElem:idElem
					}
				);
				
				
				
				// Обработка успешного запроса
				jqXHR.done(function (responce) {
					mas = JSON.parse(responce, function(key, value) {
							  if (key == 'sale') { $("#trSaleLine"+idElem).html(accounting.formatNumber(value, 2, " ", ",")); return new Date(value);}
							  if (key == 'pricesale') { $("#trPriceLine"+idElem).html(accounting.formatNumber(value, 2, " ", ",")); return new Date(value);}
							  if (key == 'sumsale') { $("#trSummLine"+idElem).html(accounting.formatNumber(value, 2, " ", ",")); return new Date(value);}
							  if (key == 'nal') { $("#trNal"+idElem).html(value); return new Date(value);}
							  return value;
							});
					
					sumsCalculateNew(true);
					
					
					
					//console.log(responce);
				});

				// Обработка запроса с ошибкой
				jqXHR.fail(function (responce) {
				
				
					//console.log(responce);
				});
}	


jQuery(document).ready(function($) {
		$(".magMenuItem img").click(function() { 
				var zakid = $(this).data("id");
				$("#mSi"+zakid).toggle("clip");
				
		});

		
  $('#shovSckadinfo').click(function() {
    if ($('.tfonSklad').is(":visible"))
		$('.tfonSklad').css("display","none");
	else 
		$('.tfonSklad').css("display","flex");
  });
  $('.timerCloseSklad').click(function() {
    $('.tfonSklad').hide();
  });
});



