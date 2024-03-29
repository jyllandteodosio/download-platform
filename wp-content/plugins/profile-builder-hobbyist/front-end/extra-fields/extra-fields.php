<?php
// include individual modules
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/heading/heading.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/input/input.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/input-hidden/input-hidden.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/checkbox/checkbox.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/checkbox-toa/checkbox-toa.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/radio/radio.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/select/select.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/select-multiple/select-multiple.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/select-country/select-country.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/select-timezone/select-timezone.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/datepicker/datepicker.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/textarea/textarea.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/upload/upload.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/avatar/avatar.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/recaptcha/recaptcha.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/user-role/user-role.php' );
include_once( WPPB_PLUGIN_DIR.'/front-end/extra-fields/wysiwyg/wysiwyg.php' );

// the function to display the custom fields in the back-end
function display_profile_extra_fields_in_admin( $user ){
	$admin_fields = '';
	?>
	<script type="text/javascript">
		var form = document.getElementById('your-profile');
		form.encoding = "multipart/form-data"; //IE5.5
		form.setAttribute('enctype', 'multipart/form-data'); //required for IE6 (is interpreted into "encType")

		function confirmDelete(nonceField, currentUser, customFieldID, customFieldName, returnTo, ajaxurl, what, fileName, text) {
			if (confirm(text)) {
				jQuery.post( ajaxurl ,  { action:"hook_wppb_delete", currentUser:currentUser, customFieldID:customFieldID, customFieldName:customFieldName, what:what, _ajax_nonce:nonceField}, function(response) {
					if(jQuery.trim(response)=="done"){
						if (what == 'avatar'){
							alert( '<?php echo addslashes( __( 'The avatar was successfully deleted!', 'profile-builder' ) );?>' );
						}else{
							alert( '<?php echo addslashes( __( 'The following attachment was successfully deleted:', 'profile-builder' ) );?>'+' '+fileName);
						}
						window.location=returnTo;
					}else{
						alert(response);
					}
				});
			}
		}
		
		jQuery(function(){
			//hover states on the static widgets
			jQuery('#dialog_link, ul#icons li').hover(
				function() { jQuery(this).addClass('ui-state-hover'); }, 
				function() { jQuery(this).removeClass('ui-state-hover'); }
			);
		});
	</script>
	<?php	
	echo '<input type="hidden" name="MAX_FILE_SIZE" value="'.WPPB_SERVER_MAX_UPLOAD_SIZE_BYTE.'" />' . "<!-- set the MAX_FILE_SIZE to the server's current max upload size in bytes -->";
	
	$all_data = get_option( 'wppb_manage_fields' );
	if ( is_array( $all_data ) ){
		foreach ( $all_data as $value ) {

            $display_field = apply_filters( 'wppb_output_display_form_field', true, $value, 'back_end', 'all', $user->ID );

            if( $display_field == false )
                continue;

            $admin_fields .= apply_filters( 'wppb_admin_output_form_field_'.Wordpress_Creation_Kit_PB::wck_generate_slug( $value['field'] ), '', 'back_end', $value, $user->ID, '', $_REQUEST );
        }

	}
	
	echo $admin_fields;
}

// the function to save the values from the custom fields in the back-end
function save_profile_extra_fields_in_admin( $user_id ){
    $global_request = $_REQUEST;
	$all_data = get_option( 'wppb_manage_fields' );
	if ( is_array( $all_data ) ){
		foreach ( $all_data as $field ){
            /* check to see if we have any error for the field. if we do don't save it */
            $error_for_field = apply_filters( 'wppb_check_form_field_'.Wordpress_Creation_Kit_PB::wck_generate_slug( $field['field'] ), '', $field, $global_request, 'back_end' );
			if( empty( $error_for_field ) )
                do_action( 'wppb_backend_save_form_field',  $field, $user_id, $global_request, 'backend-form' );
        }
	}
}

/* the function that checks for field error in the backend */
function wppb_validate_backend_fields( &$errors, $update, &$user ){

    $all_data = get_option( 'wppb_manage_fields' );
    $global_request = $_REQUEST;
    if ( is_array( $all_data ) ){
        foreach ( $all_data as $field ){
            $error_for_field = apply_filters( 'wppb_check_form_field_'.Wordpress_Creation_Kit_PB::wck_generate_slug( $field['field'] ), '', $field, $global_request, 'back_end' );

            if( !empty( $error_for_field ) ){
                $errors->add( $field['id'], '<strong>'. __( 'ERROR', 'profile-builder' ).'</strong> '.$field['field-title'].':'.$error_for_field);
            }
        }
    }
}