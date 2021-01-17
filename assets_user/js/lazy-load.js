"use strict";

document.addEventListener("DOMContentLoaded", function () {
	var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
	var active = false;


	lazyImages.forEach(function (lazyImage) {
		lazyImage.style.maxHeight = lazyImage.height + 'px';
	})


	var lazyLoad = function lazyLoad() {
		if (active === false) {
			active = true;
			setTimeout(function () {
				lazyImages.forEach(function (lazyImage) {
					if (lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0 && getComputedStyle(lazyImage).display !== "none") {
						lazyImage.src = lazyImage.dataset.src;
						lazyImage.style.maxHeight = lazyImage.height + 'px';
						setTimeout(function() {
							lazyImage.style.maxHeight = null;
						}, 250)

						lazyImage.classList.remove("lazy");
						lazyImages = lazyImages.filter(function (image) {
							return image !== lazyImage;
						});

						if (lazyImages.length === 0) {
							document.removeEventListener("scroll", lazyLoad);
						}
					}
				});
				active = false;
			}, 200);
		}
	};
	document.addEventListener("scroll", lazyLoad);
});