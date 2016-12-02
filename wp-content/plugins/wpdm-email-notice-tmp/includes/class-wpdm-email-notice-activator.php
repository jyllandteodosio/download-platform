<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class WPDM_Email_Notice_Activator {

	/**
	 * Function to create and update wpdm email notifier DB table upon plugin activation.
	 *
	 * @since    1.0.0
	 */

	public static function activate() {
		global $wpdb;
		global $wea_db_version;

		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

		$db_table_name = $wpdb->prefix . 'wpdm_email';
		$db_table_name_logs = $wpdb->prefix . 'wpdm_email_logs';

		/* Create a table if not yet existing */
		if( $wpdb->get_var( "SHOW TABLES LIKE '$db_table_name'" ) != $db_table_name ) {
			if ( ! empty( $wpdb->charset ) )
				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
			if ( ! empty( $wpdb->collate ) )
				$charset_collate .= " COLLATE $wpdb->collate";
	 
			$sql = "CREATE TABLE $db_table_name (
				  id bigint(20) NOT NULL AUTO_INCREMENT,
				  date_emailed datetime DEFAULT '0000-00-00 00:00:00',
				  data_new longtext,
				  data_old longtext,
				  status varchar(55) DEFAULT 'pending',
				  post_id bigint(20),
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY  (id)
				) $charset_collate;

				CREATE TABLE $db_table_name_logs (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  status varchar(100),
				  recipient longtext,
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  PRIMARY KEY  (id)
				) $charset_collate;

				";
			dbDelta( $sql );

			add_option( 'wea_db_version', $wea_db_version );
		}

		/* Update table if there's a new plugin version */
		$installed_ver = get_option( "wea_db_version" );
		if ( $installed_ver != $wea_db_version ) {

			$sql = "CREATE TABLE $db_table_name (
				  id bigint(20) NOT NULL AUTO_INCREMENT,
				  date_emailed datetime DEFAULT '0000-00-00 00:00:00',
				  data_new longtext,
				  data_old longtext,
				  status varchar(55) DEFAULT 'pending',
				  post_id bigint(20),
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  updated_at timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY  (id)
				) $charset_collate;

				CREATE TABLE $db_table_name_logs (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  status varchar(100),
				  recipient longtext,
				  created_at datetime DEFAULT '0000-00-00 00:00:00',
				  PRIMARY KEY  (id)
				) $charset_collate;
				";

			dbDelta( $sql );

			update_option( "wea_db_version", $wea_db_version );
		}
	}

}
