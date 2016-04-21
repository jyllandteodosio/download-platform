(function( $ ) {
	var homeSwiper = new Swiper( '#featured-slideshow', {
		speed: 1000,
		autoplay: 5000,
		effect: 'fade',
		pagination: '.swiper-pagination',
		paginationClickable: true,	
		loop: true,
	});

	var todaySlideShow = new Swiper( '#today-slideshow', {
		slidesPerView: 4,
		spaceBetween: 6,
		nextButton: '.swiper-button-next',
       prevButton: '.swiper-button-prev',
	});

})( jQuery );
