<?php

if ( ! class_exists( 'WPDM_Email_Notice_Admin' ) ) {
class WPDM_Email_Notice_Admin {

	public function __construct( ) {
		
		add_action('admin_menu', array( $this, "wpdm_file_sweeper_plugin_menu"));
	}

	/**
	* Description       : creates a menu
	*/
	public function wpdm_file_sweeper_plugin_menu() {
		add_menu_page(
			'Email Notification', 
			'Email Notification', 
			'manage_options', 
			'wpdm-email-notice', 
			array(
				$this,
				'display_page_form'
			));
	}

	function display_page_form(){?>
        <div class="wrap">
            <h1>Email Notification</h1>
        </div>
        <?php
	}

}

}