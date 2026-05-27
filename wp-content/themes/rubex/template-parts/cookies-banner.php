<div id="cookies-banner" class="cookies-banner" aria-live="polite" role="region" aria-label="Уведомление о файлах cookie" hidden>
	<h3>На сайте используются файлы cookie</h3>
	<p>
		Оставаясь на сайте, вы выражаете свое
		<a href="/soglasie-na-obrabotku-personalnyh-dannyh" target="_blank" rel="noopener noreferrer">согласие</a>
		на обработку персональных данных в соответствии c
		<a href="/politika-konfidenczialnosti-i-obrabotki-personalnyh-dannyh" target="_blank" rel="noopener noreferrer">плитика конфиденциальности</a>
	</p>
	<p>
		Подробнее о файлах
		<a href="/about-cookie-files" target="_blank" rel="noopener noreferrer">cookies</a>
	</p>
	<button class="accept-button" type="button">Принять</button>
</div>

<script>
	(function () {
		var COOKIE_NAME = 'rubex_cookie_consent';
		var COOKIE_VALUE = 'accepted';
		var COOKIE_DAYS = 365;

		function getCookie(name) {
			var escapedName = name.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
			var match = document.cookie.match(new RegExp('(?:^|; )' + escapedName + '=([^;]*)'));
			return match ? decodeURIComponent(match[1]) : null;
		}

		function setCookie(name, value, days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + date.toUTCString() + '; path=/; SameSite=Lax';
		}

		function initCookiesBanner() {
			var banner = document.getElementById('cookies-banner');
			if (!banner) {
				return;
			}

			if (getCookie(COOKIE_NAME) === COOKIE_VALUE) {
				banner.hidden = true;
				return;
			}

			banner.hidden = false;

			var acceptButton = banner.querySelector('.accept-button');
			if (acceptButton) {
				acceptButton.addEventListener('click', function () {
					setCookie(COOKIE_NAME, COOKIE_VALUE, COOKIE_DAYS);
					banner.hidden = true;
				});
			}
		}

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initCookiesBanner);
		} else {
			initCookiesBanner();
		}
	})();
</script>
