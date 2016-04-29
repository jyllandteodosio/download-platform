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

   //* Loading this with screen width of 992px and above inside the condition doesn't work because of weird vimeo error. 
   var videoPlayer = new Swiper( '.video-playlist', {
      slidesPerView: 4,
      nextButton: '.video-playlist-container .swiper-button-next',
      prevButton: '.video-playlist-container .swiper-button-prev',
      breakpoints: {
         767: {
            slidesPerView: 3
         },
         479: {
            slidesPerView: 2
         },
         359: {
            slidesPerView: 1
         }
      }
   });
   videoPlayer.destroy( false, true );

   if( $( window ).innerWidth() >= 992 ) { 
      $( '.video-playlist-side' ).removeClass( 'swiper-container' );
      $( '.video-playlist-side .video-show-container' ).removeClass( 'swiper-wrapper' );
      $( '.video-playlist-side .video-show' ).removeClass( 'swiper-slide' );
      $( '.video-playlist' ).mCustomScrollbar({
         theme: 'dark',
      });
   }

   $( window ).on( 'resize', function() {
      if( $( window ).innerWidth() < 992 ) {
         $( '.video-playlist-side' ).addClass( 'swiper-container' );
         $( '.video-playlist-side .video-show-container' ).addClass( 'swiper-wrapper' );
         $( '.video-playlist-side .video-show' ).addClass( 'swiper-slide' );
         $('.swiper-wrapper').removeAttr('style');
         $('.swiper-slide').removeAttr('style');
         if( typeof videoPlayer == 'undefined' ) {
            videoPlayer = new Swiper( '.video-playlist', {
               slidesPerView: 4,
               nextButton: '.video-playlist-container .swiper-button-next',
               prevButton: '.video-playlist-container .swiper-button-prev',
               breakpoints: {
                  767: {
                     slidesPerView: 3
                  },
                  479: {
                     slidesPerView: 2
                  },
                  359: {
                     slidesPerView: 1
                  }
               }
            });
            
         } else {
            videoPlayer.attachEvents();
         }
         videoPlayer.update();
         $( '.video-playlist' ).mCustomScrollbar( 'destroy' )
      } else {
         if( videoPlayer ) videoPlayer.destroy( false, true );
         $( '.video-playlist-side' ).removeClass( 'swiper-container' );
         $( '.video-playlist-side .video-show-container' ).removeClass( 'swiper-wrapper' );
         $( '.video-playlist-side .video-show' ).removeClass( 'swiper-slide' );
         $( '.video-playlist' ).mCustomScrollbar({
            theme: 'dark',
         });
      }
   });


   /* Video Player
   ----------------------------------*/
   var playerId = 'vimeoplayer'
   var player = $f( document.getElementById( playerId ) );
      player.addEvent('ready', function() {
      player.api('play');
   });

   $( '.video-show' ).on( 'click', function() {
      $( '.video-show' ).removeClass( 'active' );
      $( this ).addClass( 'active' );
      var vimeoId = $(this).data('vimeo-id');
      var src = '//player.vimeo.com/video/' + vimeoId + '?api=1&player_id=' + playerId;  
      $( '#' + playerId ).prop( 'src', src);
   });
})( jQuery );
