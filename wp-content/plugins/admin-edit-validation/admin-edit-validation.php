<?php 
/*Plugin Name: Admin Edit Validations
Description:Validate posts specified fields before saving data.  If there are changes, it will prompt. If none, it will do nothing.
*/



add_action('admin_enqueue_scripts', 'admin_edit_validation');



function admin_edit_validation($hook) {
    $options = get_option( 'aev_settings_config', false );
	if( $hook != 'post.php')     
		return;    	
    
    
    if($options['field_ids_0']){ ?>
     <script>
     aevtovalidate ='<?php echo $options['field_ids_0'];?>';
     dialogclasses ='<?php echo $options['dialog_class_1'];?>';
    </script>  
        
<?php 
    
        wp_enqueue_script( 'aev-confirm', plugin_dir_url( __FILE__ ) . 'assets/jquery-confirm.js' , array('jquery') );
        wp_enqueue_style( 'aev-confirm-css', plugin_dir_url( __FILE__ ) . 'assets/jquery-confirm.css' );
        wp_enqueue_script( 'aev-bootstrap-js', plugin_dir_url( __FILE__ ) . 'assets/bootstrap.min.js' , array('jquery') );
        wp_enqueue_style( 'aev-bootstrap-css', plugin_dir_url( __FILE__ ) . 'assets/bootstrap.min.css' );
        wp_enqueue_script( 'aev', plugin_dir_url( __FILE__ ) . 'assets/aev.js' , array('jquery') );
        wp_enqueue_style( 'aev-css', plugin_dir_url( __FILE__ ) . 'assets/aev.css' );

    }
    
    
}




class AEVSettings {
	private $aev_settings_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'aev_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'aev_settings_page_init' ) );
	}

	public function aev_settings_add_plugin_page() {
		add_options_page(
			'AEV Settings', // page_title
			'Admin Edit Validation', // menu_title
			'manage_options', // capability
			'admin_edit_validation', // menu_slug
			array( $this, 'aev_settings_create_admin_page' ) // function
		);
	}

	public function aev_settings_create_admin_page() {
		$this->aev_settings_options = get_option( 'aev_settings_config' ); ?>

		<div class="wrap">
			<h2>AEV Settings</h2>
			<p>Please indicate IDs of post fields to be validated. Add multiple IDs separated by comma. IE: item-content,item-title,custom-field-1. Please take note that these IDs are CSS ID of the field.</p>
			

			<form method="post" action="options.php">
				<?php
					settings_fields( 'aev_settings_option_group' );
					do_settings_sections( 'aev-settings-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function aev_settings_page_init() {
		register_setting(
			'aev_settings_option_group', // option_group
			'aev_settings_config', // option_name
			array( $this, 'aev_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'aev_settings_setting_section', // id
			'Settings', // title
			array( $this, 'aev_settings_section_info' ), // callback
			'aev-settings-admin' // page
		);

		add_settings_field(
			'field_ids_0', // id
			'Field IDs:', // title
			array( $this, 'field_ids_callback' ), // callback
			'aev-settings-admin', // page
			'aev_settings_setting_section' // section
		);

		add_settings_field(
			'dialog_class_1', // id
			'Dialog Class', // title
			array( $this, 'dialog_class_1_callback' ), // callback
			'aev-settings-admin', // page
			'aev_settings_setting_section' // section
		);
	}

	public function aev_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['field_ids_0'] ) ) {
			$sanitary_values['field_ids_0'] = sanitize_text_field( $input['field_ids_0'] );
		}

		if ( isset( $input['dialog_class_1'] ) ) {
			$sanitary_values['dialog_class_1'] = sanitize_text_field( $input['dialog_class_1'] );
		}

		return $sanitary_values;
	}

	public function aev_settings_section_info() {
		
	}

	public function field_ids_callback() {
		printf(
			'<input class="regular-text" type="text" name="aev_settings_config[field_ids_0]" id="field_ids_0" value="%s">',
			isset( $this->aev_settings_options['field_ids_0'] ) ? esc_attr( $this->aev_settings_options['field_ids_0']) : ''
		);
	}

	public function dialog_class_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="aev_settings_config[dialog_class_1]" id="dialog_class_1" value="%s">',
			isset( $this->aev_settings_options['dialog_class_1'] ) ? esc_attr( $this->aev_settings_options['dialog_class_1']) : ''
		);
	}

}
if ( is_admin() )
	$aev_settings = new AEVSettings();

/* 
 * 
 * $aev_settings_options = get_option( 'aev_settings_config' ); // Array of All Options
 * $field_ids_0 = $aev_settings_options['field_ids_0']; // Field IDs:
 * $dialog_class_1 = $aev_settings_options['dialog_class_1']; // Dialog Class
 */








?>