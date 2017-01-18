<?php
if ( ! class_exists( 'WPDM_Email_Notice' ) ) {

	class WPDM_Email_Notice {

		public function __construct() {
			$this->load_dependencies();
			$this->start_admin_dash();
			// $this->start_notification_trigger();
			// $this->start_file_monitor();
		}

		private function load_dependencies() {

			require_once(ABSPATH . 'wp-content/custom/library/general_helper_function.php');
			require_once(ABSPATH . 'wp-content/custom/library/function.php');
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpdm-email-notice-admin.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'email/class-wpdm-file-monitor.php';
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'email/class-wpdm-notification-trigger.php';
		}

		private function start_admin_dash(){
			$admin_dash = new WPDM_Email_Notice_Admin( );
			// $notification_trigger = new WPDM_Notification_Trigger( );	
			$file_monitor = new WPDM_File_Monitor( );	
			


			// $notification_trigger->trigger_email_notification_checker();

		}

		// private function start_file_monitor(){
		// 	$file_monitor = new WPDM_File_Monitor( );	
		// }

		// private function start_notification_trigger(){
		// 	$notification_trigger = new WPDM_Notification_Trigger( );	
		// }

	}
}
