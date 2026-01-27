document.addEventListener("DOMContentLoaded", () => {
var xhr = new XMLHttpRequest()

var params = new URLSearchParams()
params.append('action', 'get_cantry')
params.append('nonce', allAjax.nonce)

xhr.onload = function (e) {
    

    if (document.getElementById("allWinState")) allWinState.innerHTML = xhr.response;
    if (document.getElementById("allWinState2")) allWinState2.innerHTML = xhr.response;
}

xhr.onerror = function () {
    error(xhr, xhr.status);
};

xhr.open('POST', allAjax.ajaxurl, true);
xhr.send(params);

// Загрузка городов

let xhr2 = new XMLHttpRequest()

let params2 = new URLSearchParams()
params2.append('action', 'get_city')
params2.append('nonce', allAjax.nonce)

xhr2.onload = function (e) {

    if (document.getElementById("allWinCity")) allWinCity.innerHTML = xhr2.response;
    if (document.getElementById("allWinCity2")) allWinCity2.innerHTML = xhr2.response;
}

xhr2.onerror = function () {
    error(xhr, xhr.status);
};

xhr2.open('POST', allAjax.ajaxurl, true);
xhr2.send(params2);

});