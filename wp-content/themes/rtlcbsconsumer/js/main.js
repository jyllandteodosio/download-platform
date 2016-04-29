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

   var otherSlideShow = new Swiper( '#other-shows-slideshow', {
      slidesPerView: 3,
      spaceBetween: 20,
      slidesPerGroup: 3,
      nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
      breakpoints: {
         639: {
         slidesPerView: 1,
         slidesPerGroup: 1
         },
         991: {
            slidesPerView: 2,
            slidesPerGroup: 2
         }
      }
   });

   homeVideoPlayer = new Swiper( '#home-video-player .video-playlist', {
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

   $( '.content-scroll .simplebar' ).simplebar({
      autoHide: false
   });

   var videoPlayer;
   if( $( window ).innerWidth() < 992 ) {
      videoPlayer = new Swiper( '.video-playlist-side-container .video-playlist', {
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
      $( '.video-playlist-side' ).removeClass( 'swiper-container' );
      $( '.video-playlist-side .video-show-container' ).removeClass( 'swiper-wrapper' );
      $( '.video-playlist-side .video-show' ).removeClass( 'swiper-slide' );
      $( '.video-playlist' ).mCustomScrollbar({
         theme: 'dark',
      });
   }

   $( window ).on( 'resize', function() {
      if( $( window ).innerWidth() < 992 ) {
         $( '.video-playlist' ).mCustomScrollbar( 'destroy' );
         $( '.video-playlist-side' ).addClass( 'swiper-container' );
         $( '.video-playlist-side .video-show-container' ).addClass( 'swiper-wrapper' );
         $( '.video-playlist-side .video-show' ).addClass( 'swiper-slide' );
         if (typeof videoPlayer == 'undefined' ) {
            console.log('define videoplayer');
            videoPlayer = new Swiper( '.video-playlist-side-container .video-playlist', {
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
         }
         videoPlayer.update();
         videoPlayer.attachEvents();
      } else {
         if( videoPlayer ) videoPlayer.destroy( false, true );
         $( '.video-playlist-side' ).removeClass( 'swiper-container' );
         $( '.video-playlist-side .video-show-container' ).removeClass( 'swiper-wrapper' );
         $( '.video-playlist-side .video-show' ).removeClass( 'swiper-slide' );
         $( '.video-playlist-side-container .video-playlist' ).mCustomScrollbar({
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
