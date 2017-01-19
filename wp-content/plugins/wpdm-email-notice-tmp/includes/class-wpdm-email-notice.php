<?php
if ( ! class_exists( 'WPDM_Email_Notice' ) ) {

	class WPDM_Email_Notice {

		public function __construct() {
			$this->load_dependencies();
			$this->load_class_dependencies();
		}

		private function load_dependencies() {

			require_once(ABSPATH . 'wp-content/custom/library/general_helper_function.php');
			require_once(ABSPATH . 'wp-content/custom/library/function.php');
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpdm-email-notice-admin.php';
			// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'email/class-wpdm-file-monitor.php';
			// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'email/class-wpdm-notification-trigger.php';
		}

		private function load_class_dependencies(){
			$admin_dash = new WPDM_Email_Notice_Admin( );	
			// $file_monitor = new WPDM_File_Monitor( );	
			// add_action('email_notice_event', array($file_monitor, 'dianne_test' ));

			// $notification_trigger = new WPDM_Notification_Trigger( );
			// $notification_trigger->trigger_email_notification_checker();
			// add_action('email_notice_event', array($notification_trigger,'trigger_email_notification_checker'));

			// $notification_trigger = new WPDM_Notification_Trigger( );
			// add_action('email_notice_event', $notification_trigger,'trigger_email_notification_checker');
		}
	}
}
