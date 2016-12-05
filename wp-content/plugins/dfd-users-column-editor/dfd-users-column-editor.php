<?php 
    /*
    Plugin Name: Users Column Editor
    Description: Remove or add custom field columns in users table.
    Author: Dianne Katherine Delos Reyes
    Version: 1.0
    */
   


if( !function_exists('remove_user_name_column') ){
    /**
     * Remove Name column in users list table
     */
    add_action('manage_users_columns','remove_user_name_column');
    
    function remove_user_name_column($column_headers) {
    	$options = get_option( 'dfd_upe_option_name', false );
    	$options_exploded = array_map('trim', explode(',',$options['remove_column_header']));

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
        $additional_options_exploded_name = array_map('trim', explode(',',$options['additional_column_fields_name']));
        $additional_options_exploded_label = explode(',',$options['additional_column_fields_label']);

        $counter = 0;
        foreach ($additional_options_exploded_name as $value) {
            if($value != '' && $value != null){
                $column[$value] = $additional_options_exploded_label[$counter];
                $counter++;
            }
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
        $column_value = "";
        if ( $column_name == 'ja_user_disabled' ) {
            if ( get_the_author_meta( 'ja_disable_user', $user_id ) == 1 ) {
                $column_value =  __( 'Disabled', 'ja_disable_users' );
            }

        }else if($column_name == 'custom_role'){
            $user_meta=get_userdata($user_id);
            $user_roles=$user_meta->roles;
            $column_value = $user_roles[0];

            if( $column_value == 'operator' ){
                $country_group = get_user_meta($user_id, 'country_group', true);
                $operator_group = get_user_meta($user_id, 'operator_group', true);
                if( function_exists('is_pr_group') ){
                    if( is_pr_group( $operator_group, $country_group ) ){
                        $column_value = "PR Group";
                    }
                }
            }

        }else if ( get_user_meta($user_id, $column_name, true) != "" ){
            if($column_name == 'country_group'){
                if( function_exists('get_country_name') ){
                    $column_value = get_country_name(get_user_meta($user_id, $column_name, true));
                }else{
                    $column_value = get_user_meta($user_id, $column_name, true);
                }

            }else if($column_name == 'operator_group'){
                $column_value = get_user_meta($user_id, $column_name, true);
            }
        }

        return ucwords($column_value);
    }
    add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 11, 3 );
}


class DFDUsersColumnEditor
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;
    private $help_text = array(
                            'section_info'                      => 'Fill out the form below to customize users table.',
                            'remove_column_headers'             => 'Enter a comma separated list of column ID you want to hide. 
                                                                    <br>e.g. (name,email)',
                            'additional_column_fields_name'     => 'Enter a comma separated list of custom field names you want to add. 
                                                                    <br>e.g. (my_custom_field_1, my_custom_field_2)',
                            'additional_column_fields_label'    => 'Enter a comma separated list of custom field labels you want to add (Visible for the user).
                                                                    <br>Should have a corresponding column field name above.
                                                                    <br>e.g. (My Custom Field 1, My Custom Field 2)'
        );

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
            'Users Table Custom Settings', // Title
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
            'Custom Field Names to Add', // Title 
            array( $this, 'additional_column_fields_name_callback' ), // Callback
            'dfd-upe-setting-admin', // Page
            'setting_section_id' // Section           
        );  

         add_settings_field(
            'additional_column_fields_label', // ID
            'Custom Field Labels to Add', // Title 
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
        print $this->help_text['section_info'];
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function remove_column_headers_callback()
    {
        printf(
            '<input type="text" class="regular-text" id="remove_column_header" name="dfd_upe_option_name[remove_column_header]" value="%s" />
            <p class="description">'.$this->help_text['remove_column_headers'].'</p>',
            isset( $this->options['remove_column_header'] ) ? esc_attr( $this->options['remove_column_header']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function additional_column_fields_name_callback()
    {
        printf(
            '<input type="text" class="regular-text" id="additional_column_fields_name" name="dfd_upe_option_name[additional_column_fields_name]" value="%s" />
            <p class="description">'.$this->help_text['additional_column_fields_name'].'</p>',
            isset( $this->options['additional_column_fields_name'] ) ? esc_attr( $this->options['additional_column_fields_name']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function additional_column_fields_label_callback()
    {
        printf(
            '<input type="text" class="regular-text" id="additional_column_fields_label" name="dfd_upe_option_name[additional_column_fields_label]" value="%s" />
            <p class="description">'.$this->help_text['additional_column_fields_label'].'</p>',
            isset( $this->options['additional_column_fields_label'] ) ? esc_attr( $this->options['additional_column_fields_label']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new DFDUsersColumnEditor();