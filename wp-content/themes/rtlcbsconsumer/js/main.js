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

   $( '.content-scroll .simplebar' ).simplebar({
      autoHide: false
   });

   $( '.video-playlist' ).mCustomScrollbar({
      theme: 'dark'
   });

   /* Video Player */

   var playerId = 'vimeoplayer'
   var player = $f( document.getElementById( playerId ) );
      player.addEvent('ready', function() {
      player.api('play');
   })

   $( '.video-show' ).on( 'click', function() {
      $( '.video-show' ).removeClass( 'active' );
      $( this ).addClass( 'active' );
      var vimeoId = $(this).data('vimeo-id');
      var src = '//player.vimeo.com/video/' + vimeoId + '?api=1&player_id=' + playerId;  
      $( '#' + playerId ).prop( 'src', src);
   });
})( jQuery );
