<?php 
    /*
    Plugin Name: Users Column Editor
    Description: Add or remove columns of users table.
    Dianne Katherine Delos Reyes
    Version: 1.0
    */
   


if( !function_exists('remove_user_name_column') ){
    /**
     * Remove Name column in users list table
     */
    add_action('manage_users_columns','remove_user_name_column');
    
    function remove_user_name_column($column_headers) {
    	$options = get_option( 'dfd_upe_option_name', false );
    	$options_exploded = explode(',',$options['remove_column_header']);

    	foreach ($options_exploded as $value) {
    		unset($column_headers[$value]);
    	}
        
        return $column_headers;
    }
}

if (!function_exists('new_modify_user_table')){
    /**
     * Add custom column to Users table
     */
    function new_modify_user_table( $column ) {
        $options = get_option( 'dfd_upe_option_name', false );
        $additional_options_exploded_name = explode(',',$options['additional_column_fields_name']);
        $additional_options_exploded_label = explode(',',$options['additional_column_fields_label']);

        $counter = 0;
        foreach ($additional_options_exploded_name as $value) {
            $column[$value] = $additional_options_exploded_label[$counter];
            $counter++;
        }
        return $column;
    }
    add_filter( 'manage_users_columns', 'new_modify_user_table' );
}

if(!function_exists('new_modify_user_table_row')){
    /**
     * Populate custom column in Users table
     */
    function new_modify_user_table_row( $val, $column_name, $user_id ) {
        $user = get_userdata( $user_id );
        switch ($column_name) {
            case 'country_group' :
                return get_country_name(get_user_meta($user_id, 'country_group', true));
                break;
            default:
                return get_user_meta($user_id, $column_name, true) != "" ? get_user_meta($user_id, $column_name, true) : "None";
                break;
        }
        return $return;
    }
    add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );

}


class DFDUsersColumnEditor
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
           'Users Column Editor',
			'Users Column Editor',
			'manage_options',
			'dfd_user_column_editor',
			array(
				$this,
				'create_admin_page'
			)
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'dfd_upe_option_name' );
        ?>
        <div class="wrap">
            <h1>Users Column Editor</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'dfd_upe_option_group' );
                do_settings_sections( 'dfd-upe-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'dfd_upe_option_group', // Option group
            'dfd_upe_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'dfd-upe-setting-admin' // Page
        );  

        add_settings_field(
            'remove_column_headers', // ID
            'Columns To Remove', // Title 
            array( $this, 'remove_column_headers_callback' ), // Callback
            'dfd-upe-setting-admin', // Page
            'setting_section_id' // Section           
        ); 

        add_settings_field(
            'additional_column_fields_name', // ID
            'Additional Column Custom Field Name', // Title 
            array( $this, 'additional_column_fields_name_callback' ), // Callback
            'dfd-upe-setting-admin', // Page
            'setting_section_id' // Section           
        );  

         add_settings_field(
            'additional_column_fields_label', // ID
            'Additional Column Label', // Title 
            array( $this, 'additional_column_fields_label_callback' ), // Callback
            'dfd-upe-setting-admin', // Page
            'setting_section_id' // Section           
        );         
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['remove_column_header'] ) )
            $new_input['remove_column_header'] = sanitize_text_field( $input['remove_column_header'] );

        if( isset( $input['additional_column_fields_name'] ) )
            $new_input['additional_column_fields_name'] = sanitize_text_field( $input['additional_column_fields_name'] );

        if( isset( $input['additional_column_fields_label'] ) )
            $new_input['additional_column_fields_label'] = sanitize_text_field( $input['additional_column_fields_label'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter a comma separated list of field names you want to hide. e.g. (name,email) :';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function remove_column_headers_callback()
    {
        printf(
            '<input type="text" id="remove_column_header" name="dfd_upe_option_name[remove_column_header]" value="%s" />',
            isset( $this->options['remove_column_header'] ) ? esc_attr( $this->options['remove_column_header']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function additional_column_fields_name_callback()
    {
        printf(
            '<input type="text" id="additional_column_fields_name" name="dfd_upe_option_name[additional_column_fields_name]" value="%s" />',
            isset( $this->options['additional_column_fields_name'] ) ? esc_attr( $this->options['additional_column_fields_name']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function additional_column_fields_label_callback()
    {
        printf(
            '<input type="text" id="additional_column_fields_label" name="dfd_upe_option_name[additional_column_fields_label]" value="%s" />',
            isset( $this->options['additional_column_fields_label'] ) ? esc_attr( $this->options['additional_column_fields_label']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new DFDUsersColumnEditor();