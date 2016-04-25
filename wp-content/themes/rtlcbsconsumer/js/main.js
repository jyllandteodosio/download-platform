(function( $ ) {
	var homeSwiper = new Swiper( '#featured-slideshow', {
		speed: 1000,
		autoHeight: true,
		//autoplay: 5000,
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
      breakpoints: {
      	320: {
      		slidesPerView: 1
      	},
      	640: {
      		slidesPerView: 2
      	},
      	768: {
      		slidesPerView: 3
      	}, 
      	992: {
      		slidesPerView: 4
      	}
      }
	});

})( jQuery );
