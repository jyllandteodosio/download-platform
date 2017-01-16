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
		autoHeight: false,
		autoplay: 4000,
		effect: 'fade',
		pagination: '.swiper-pagination',
		paginationClickable: true,	
		loop: true,
        preventClicks: false, 
        preventClicksPropagation: true,
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
            },
        preventClicks: false, 
        preventClicksPropagation: true,
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
      },
       preventClicks: false, 
        preventClicksPropagation: true,
   });

   var latestSlideShow = new Swiper( '#latest-episodes-slideshow', {
      slidesPerView: 2, 
      slidesPerColumn: 2,
      spaceBetween: 10,
      nextButton: '.latest-episodes-nav.swiper-button-next',
      prevButton: '.latest-episodes-nav.swiper-button-prev',
      breakpoints: {
         500: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            slidesPerColumn: 1
         },
      },
       preventClicks: false, 
        preventClicksPropagation: true,
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
      },
       preventClicks: false, 
        preventClicksPropagation: true,
   });

   var scheduleSlideShow = new Swiper( '#schedule-slideshow', {
      slidesPerView: 4,
      spaceBetween: 0,
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
            },
        preventClicks: false, 
        preventClicksPropagation: true,
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
                  },
                   preventClicks: false, 
        preventClicksPropagation: true,
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
   
   // $('#other-shows-slideshow .show-details').matchHeight();
   // $('.swiper-description').matchHeight();
   $('.spotlight-details').matchHeight();
   $('.show-details .show-description').matchHeight();
   $('.spotlight-show-container .spotlight-excerpt').matchHeight();

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


   /* Match Height 
   ----------------------------------*/
   $('.swiper-description').matchHeight();
   $('.spotlight-title').matchHeight();




  /* Show files lazy loading ==============================================================================================================*/
  var ajaxurl = my_ajax_object.ajax_url;

  /* Check if page is schedule page */
  if ( $( '.calendar-area' ).length > 0 ){
      var schedule_slider_container = $( "#schedule-stubs-container" );
      var schedule_slider = $( ".schedule-stubs" );
      var date_range = [];

      /* Get date range from schedule slider data attribute */
      date_range = get_attributes_from_elements( schedule_slider, 'data-date' );
      
      /* Fetch the sorted list of schedule time. Used for horizontal alignment of schedule times */
      // var time_list_rebased = [];
      // $.post(
      //      ajaxurl, 
      //      {   'action'       : 'get_tribe_events_unique_start_time_ajax',
      //          'date_range'   : date_range,
      //          'channel'      : $(schedule_slider_container).attr('data-channel'),
      //          'schednonce'     : my_ajax_object.ajax_sched_nonce
      //      },function(response) {
      //          if(response != '' && response != 'false'){
      //             var response_array = $.parseJSON(response);
      //             console.log( 'response_array.length', response_array.length );
      //             if( response_array.length > 0 ){
      //                time_list_rebased = response_array;
      //             }
      //          }
      //      }
      // );

      if( $('.schedule-shows.no-preview').length == 0){
         trigger_lazy_loading();
      }

      /* Fetching of schedules through lazy loading */
      var last_scroll_top = 0;
      $(window).scroll(function() {
         var scroll_top = $(window).scrollTop();
         if (scroll_top > last_scroll_top){

           if( ($(this).scrollTop() + $(this).height()) >= ($(document).height() - 150) ) {

            if( !schedule_slider_container.hasClass('loading') ){

               trigger_lazy_loading();

            }else{
               console.log( 'loading....' );
            }// End of "!schedule_slider_container.hasClass('loading')"
            
           }
         }
         last_scroll_top = scroll_top;

      }); // End of "$(window).scroll"
    
  } // End of " $( '.calendar-area' ).length > 0 "

  function trigger_lazy_loading(){
   schedule_slider_container.addClass('loading');
   $( '.loading-bar' ).show();
   console.log('lazy loading');

   var offset = parseInt( $(schedule_slider_container).attr('data-offset') );
   var limit = parseInt( $(schedule_slider_container).attr('data-limit') );
   $.post(
     ajaxurl, 
     {   'action'       : 'get_tribe_events_ajax',
         'date_range'   : date_range,
         'channel'      : $(schedule_slider_container).attr('data-channel'),
         'offset'       : offset,
         'limit'        : limit,
         'schednonce'   : my_ajax_object.ajax_sched_nonce
     },function(response) {
         console.log($.parseJSON(response));
         if(response != '' && response != 'false' && isJSON(response) ){
            var response_array = $.parseJSON(response);
            /** The response array looks like this
               [ 2017-01-01 ] => {
                     [0] => { // fetched show details }, [1] => { // fetched show details }  },
               [ 2017-01-02 ] => {
                     [0] => { // fetched show details }  }
             */
            if( !$.isEmptyObject( response_array ) ){ 

               $.each( response_array, function( event_date, event_list ){
                  if( event_list.length > 0 ){
                     var show_date = event_date;
                     var show_counter = 0;
                     var div_stub_id = '#stub-'+show_date;

                     $.each( event_list, function(event_list_key, event_list_content) {
                        var show_counter = $( div_stub_id ).attr( 'data-show-counter') != undefined ? $( div_stub_id ).attr( 'data-show-counter') : 0;
                        var show_time = moment(event_list_content.EventStartDate).format('HH:mm');
                        var next_skip = true;
                        var stub_element = generate_show_stub_html( event_list_content );

                        $(div_stub_id).append( stub_element );
                        show_counter++;

                        /* Used for horizontal alignment of schedule times */
                        /*while( next_skip == true ){
                           if( time_list_rebased[ show_counter ] === show_time ){
                              next_skip = false;
                              var stub_element = generate_show_stub_html( event_list_content );
                           }else{
                              var stub_element = '<div class="schedule-shows no-preview '+show_counter+'"></div>';
                           }
                           $(div_stub_id).append( stub_element );
                           show_counter++;
                        }*/

                        $( div_stub_id ).attr( 'data-show-counter', show_counter );
                     });
                  }
               });
           
               $( schedule_slider_container ).attr('data-offset', offset + limit );

            }else{
               $( '.loading-bar' ).remove();
               console.log('no more schedules');
            }

         }else{
            console.log('Invalid return value');
         }

         schedule_slider_container.removeClass('loading');
         $( '.loading-bar' ).hide();
         regenerate_sticky_kit();

     } // End of ajax function

   ); // End of "$.post"
  }
  /* End of Show files lazy loading ======================================================================================================*/

   function get_attributes_from_elements( elem, attribute ){
      var contents = [];
      $.each( elem, function( elem_key, elem_content ){
          var values = $(elem_content).attr(attribute);
          contents[elem_key] = values;
      });
      return contents;
   }

   function regenerate_sticky_kit( ){
      $("#custom-slider-sticky").stick_in_parent()
        .on("sticky_kit:stick", function(e) {
          console.log("has stuck!");
          $('.schedule-slideshow-button').addClass('is_stuck');
        })
        .on("sticky_kit:unstick", function(e) {
          console.log("has unstuck!");
          $('.schedule-slideshow-button').removeClass('is_stuck');
        });
   }

   function generate_show_stub_html( post ){
      var stub_element = '<a href="'+my_ajax_object.site_url+'/'+post.main_post_name+'" title="'+post.post_title+'">'+
                           '<div class="schedule-shows no-preview ">'+
                              '<div class="time">'+
                                 '<span class="timeslot">'+moment(post.EventStartDate).format('HH:mm A')+'</span>'+
                                 '<span class="timezone"> ('+post.post_content+' JKT/BKK)</span>'+
                                 '<h3>'+post.post_title.trunc(45)+'</h3>'+
                          '</div></div></a>';
      return stub_element;
   }

   /* Truncates string if limit reaches, adds ellipses */
   String.prototype.trunc = String.prototype.trunc ||
      function(n){
          return (this.length > n) ? this.substr(0,n-1)+'&hellip;' : this;
      };

   /* Check if the given string is a valid json */
   function isJSON (jsonString){
       try {
           var o = $.parseJSON(jsonString);
           if (o && typeof o === "object") {
               return true;
           }
       }
       catch (e) { }
       return false;
   };

})( jQuery );
