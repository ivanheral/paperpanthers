/**
 * Paper Panthers - Bilingual Switcher
 */
(function() {
	'use strict';

	function setLang(lang) {
		var isEn = (lang === 'en');
		if (document.body) {
			document.body.classList.toggle('en', isEn);
		}
		document.documentElement.lang = lang;

		var btnEsList = document.querySelectorAll('.pp-btn-es, #btn-es');
		var btnEnList = document.querySelectorAll('.pp-btn-en, #btn-en');

		btnEsList.forEach(function(btn) {
			btn.classList.toggle('active', !isEn);
			btn.setAttribute('aria-pressed', !isEn ? 'true' : 'false');
		});

		btnEnList.forEach(function(btn) {
			btn.classList.toggle('active', isEn);
			btn.setAttribute('aria-pressed', isEn ? 'true' : 'false');
		});

		try {
			localStorage.setItem('paper_panthers_lang', lang);
		} catch (e) {}
	}
	window.setLang = setLang;

	function init() {
		var savedLang = 'es';
		try {
			savedLang = localStorage.getItem('paper_panthers_lang') || 'es';
		} catch (e) {
			savedLang = 'es';
		}
		setLang(savedLang);

		document.addEventListener('click', function(e) {
			var target = e.target.closest('[data-switch-lang]');
			if (target) {
				e.preventDefault();
				var lang = target.getAttribute('data-switch-lang');
				setLang(lang);
			}
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
