jQuery(function(){
    
    jQuery(document).ajaxStop(jQuery.unblockUI);

    jQuery('.wpeden-theme-opt-form').submit(function(e){

        e.preventDefault();

        jQuery('div.wpeden-theme-options').block({
            css: {
                border: 'none',
                padding: '15px',
                margin: '-100px 0 0 50px',
                backgroundColor: 'rgba(0,0,0,0.4)',
                '-webkit-border-radius': '5px',
                '-moz-border-radius': '5px',
                'border-radius': '5px',
                color: '#fff',
                'font-size' : '10pt',
                'font-weight' : '700'
            }
        });

        jQuery(this).ajaxSubmit({
            success: function(res){
                jQuery('div.wpeden-theme-options').unblock();
                jQuery.growlUI('Done', 'Options Updated Successfully!',10000);
            }
        });
    });

    // Uploading files
    var file_frame, dfield;

    jQuery('body').on('click', '.btn-media-upload' , function( event ){
        event.preventDefault();
        dfield = jQuery(jQuery(this).attr('rel'));

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery( this ).data( 'uploader_title' ),
            button: {
                text: jQuery( this ).data( 'uploader_button_text' )
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();
            dfield.val(attachment.url);

        });

        // Finally, open the modal
        file_frame.open();
    });

    jQuery('.w3eden select').chosen();
           
    jQuery('.typocb').click(function(){
          var cbid = '#'+this.id+"-x";
          if(!jQuery(this).hasClass('active')) jQuery(cbid).val(1);
          else jQuery(cbid).val(0); 
    });
     
    jQuery('body').on('click','.prebg', function(){
         jQuery('#cpb_image').val(jQuery(this).attr('data-url'));
         preview_cbg(jQuery(this).attr('data-rel'));
    });
    
    jQuery('.colorpicker').wpColorPicker();
 
    jQuery('a[data-toggle="tab"]').on('click', function (e) {
        //save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', jQuery(e.target).attr('id'));
    });

    //go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        jQuery('#'+lastTab).tab('show');
    }
});

 
  function mediaupload(id){
      var id = '#'+id;
      tb_show('Upload Image','media-upload.php?TB_iframe=1&width=640&height=624');
      window.send_to_editor = function(html) {           
              var imgurl = jQuery('img',"<p>"+html+"</p>").attr('src');                                    
              jQuery(id).val(imgurl);
              tb_remove();
              }     
    }
  
  function preview_cbg(id){
      jQuery('#hfp').css('background-image',"url('"+jQuery('#'+id+'_image').val()+"')")
                    .css('background-position',jQuery('#'+id+'_position_h').val()+" "+jQuery('#'+id+'_position_v').val())
                    .css('background-repeat',jQuery('#'+id+'_repeat').val())
                    .css('background-attachment',jQuery('#'+id+'_attachment').val())
                    .css('background-color',jQuery('#'+id+'_color').val());
  }

function convertHex(hex,opacity){
    var hex1 = hex.replace('#','');
    r = parseInt(hex1.substring(0,2), 16);
    g = parseInt(hex1.substring(2,4), 16);
    b = parseInt(hex1.substring(4,6), 16);

    result = 'rgba('+r+','+g+','+b+','+opacity+')';
    return result;
}
