(function( $ ) {
   /* Mega Menu
   ----------------------------------*/
   $( '.mega-menu, #featured-menu' ).hover( function() {
      $( '#featured-menu' ).removeClass( 'hide' );
   }, function() {
      $( '#featured-menu' ).addClass( 'hide' );
   });

   /* Swipers
   ----------------------------------*/
	var homeSwiper = new Swiper( '#featured-slideshow', {
		speed: 1000,
		autoHeight: true,
		autoplay: 4000,
		effect: 'fade',
		pagination: '.swiper-pagination',
		paginationClickable: true,	
		loop: true,
	});

	var todaySlideShow = new Swiper( '#today-slideshow', {
		slidesPerView: 4,
		spaceBetween: 6,
		nextButton: '.today-nav.swiper-button-next',
      prevButton: '.today-nav.swiper-button-prev',
            breakpoints: {
            	640: {
            		slidesPerView: 1
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
      nextButton: '.other-shows-nav.swiper-button-next',
      prevButton: '.other-shows-nav.swiper-button-prev',
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

   var latestSlideShow = new Swiper( '#latest-episodes-slideshow', {
      slidesPerView: 2, 
      slidesPerColumn: 2,
      spaceBetween: 10,
      nextButton: '.latest-episodes-nav.swiper-button-next',
      prevButton: '.latest-episodes-nav.swiper-button-prev',
      breakpoints: {
         1199: {
            slidesPerView: 1
         },
      }
   });

   homeVideoPlayer = new Swiper( '#home-video-player .video-playlist', {
      slidesPerView: 4,
      nextButton: '.video-player-nav.swiper-button-next',
      prevButton: '.video-player-nav.swiper-button-prev',
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

   $( '.content-area .fixed-height' ).mCustomScrollbar({
      axis: 'y',
      'theme': 'red'
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

   $( window ).on( 'resize', function() { try { 
      if( $('.video-playlist').length >= 1 ) {
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
      } }catch(e){}
   });


   /* Video Player
   ----------------------------------*/
   if( $( '.video-player' ).length >= 1 ) {
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
   }

   $( '.show-banner .watch-video' ).on( 'click', function(e) {
      e.preventDefault();
      $( '.show-banner-video-container' ).removeClass( 'hide' );
   });

   $( '.close-video' ).on( 'click', function() {
      $( '.show-banner-video-container' ).addClass( 'hide' );
   });
})( jQuery );
