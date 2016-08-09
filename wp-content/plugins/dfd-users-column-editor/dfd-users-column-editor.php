<?php 
    /*
    Plugin Name: Users Column Editor
    Description: Hide columns of users table.
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
    	$options_exploded = explode(',',$options['column_header']);

    	foreach ($options_exploded as $value) {
    		unset($column_headers[$value]);
    	}
        
        return $column_headers;
    }
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
            'column_headers', // ID
            'Column Name', // Title 
            array( $this, 'column_headers_callback' ), // Callback
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
        if( isset( $input['column_header'] ) )
            $new_input['column_header'] = sanitize_text_field( $input['column_header'] );

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
    public function column_headers_callback()
    {
        printf(
            '<input type="text" id="column_header" name="dfd_upe_option_name[column_header]" value="%s" />',
            isset( $this->options['column_header'] ) ? esc_attr( $this->options['column_header']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new DFDUsersColumnEditor();