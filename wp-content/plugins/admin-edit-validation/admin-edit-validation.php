<?php 
/*Plugin Name: Admin Edit Validations
Description:Validate posts specified fields before saving data.  If there are changes, it will prompt. If none, it will do nothing.
*/



add_action('admin_enqueue_scripts', 'admin_edit_validation');

function admin_edit_validation($hook) {
    
	if( $hook != 'post.php' ) 
		return;
    $options = get_option( 'aev_settings', false );
    
    
    if($options['aev_text_field_0']){ ?>
     <script>
     aevtovalidate ='<?php echo $options['aev_text_field_0'];?>';
    </script>  
        
<?php 
    
	wp_enqueue_script( 'aev-confirm', plugin_dir_url( __FILE__ ) . 'assets/jquery-confirm.js' , array('jquery') );
    wp_enqueue_style( 'aev-confirm-css', plugin_dir_url( __FILE__ ) . 'assets/jquery-confirm.css' );
    wp_enqueue_script( 'aev-bootstrap-js', plugin_dir_url( __FILE__ ) . 'assets/bootstrap.min.js' , array('jquery') );
    wp_enqueue_style( 'aev-bootstrap-css', plugin_dir_url( __FILE__ ) . 'assets/bootstrap.min.css' );
	wp_enqueue_script( 'aev', plugin_dir_url( __FILE__ ) . 'assets/aev.js' , array('jquery') );
    }
}



add_action( 'admin_menu', 'aev_add_admin_menu' );
add_action( 'admin_init', 'aev_settings_init' );


function aev_add_admin_menu(  ) { 

	add_options_page( 'Admin Edit Validation', 'Admin Edit Validation', 'manage_options', 'admin_edit_validation', 'aev_options_page' );

}


function aev_settings_init(  ) { 

	register_setting( 'pluginPage_aev', 'aev_settings' );

	add_settings_section(
		'aev_pluginPage_aev_section', 
		__( 'Settings', 'wordpress' ), 
		'aev_settings_section_callback', 
		'pluginPage_aev'
	);

	add_settings_field( 
		'aev_text_field_0', 
		__( 'Field IDs', 'wordpress' ), 
		'aev_text_field_0_render', 
		'pluginPage_aev', 
		'aev_pluginPage_aev_section' 
	);


}


function aev_text_field_0_render(  ) { 

	$options = get_option( 'aev_settings' );
	?>
	<input type='text' name='aev_settings[aev_text_field_0]' value='<?php echo $options['aev_text_field_0']; ?>'>
	<?php

}


function aev_settings_section_callback(  ) { 

	echo __( 'Please indicate IDs of post fields to be validated. Add multiple IDs separated by comma. IE: item-content,item-title,custom-field-1. Please take note that these IDs are CSS ID of the field.', 'wordpress' );

}


function aev_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Admin Edit Validation</h2>

		<?php
		settings_fields( 'pluginPage_aev' );
		do_settings_sections( 'pluginPage_aev' );
		submit_button();
		?>

	</form>
	<?php

}






?>