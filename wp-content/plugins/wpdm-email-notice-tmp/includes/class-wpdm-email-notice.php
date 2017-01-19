<?php
/* Not used */
if ( ! class_exists( 'WPDM_Email_Notice' ) ) {

	class WPDM_Email_Notice {

		public function __construct() {
			$this->load_dependencies();
			$this->load_class_dependencies();
		}

		private function load_dependencies() {

			// require_once(ABSPATH . 'wp-content/custom/library/general_helper_function.php');
			// require_once(ABSPATH . 'wp-content/custom/library/function.php');
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpdm-email-notice-admin.php';
		}

		private function load_class_dependencies(){
			$admin_dash = new WPDM_Email_Notice_Admin( );	
		}
	}
}
