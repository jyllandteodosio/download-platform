<?php 
    /*
    Plugin Name: WPDM Leftover Files Remover
    Description: Permanently delete the leftover files from wp download manager.
    Author: Dianne Katherine Delos Reyes
    Version: 1.0
    */

/**
* Class to remove leftover files of wp download manager
*/
class DFDLeftoverFilesRemover
{
	/**
     * Holds the values to be used in the fields callbacks
     */
	private $options;
	private $leftover_files;
	private $upload_dir;
    private $user_dirname;
	private $help_text = array(
							'section_info' => 'Some instructions here',
							'success_message' => ' Leftover files deleted successfully.'
						);
	
	public function __construct()
	{
		$this->upload_dir = wp_upload_dir();
    	$this->user_dirname = $this->upload_dir['basedir'].'/download-manager-files/';
		$this->detect_leftover_files();

		add_action('admin_menu', array( $this, "wpdm_file_sweeper_plugin_menu"));
		// add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Description       : creates a submenu
	 */
	public function wpdm_file_sweeper_plugin_menu() {
		add_submenu_page(
			'edit.php?post_type=wpdmpro', 
			'File Sweeper', 
			'File Sweeper', 
			'manage_options', 
			'wpdm-file-sweeper', 
			array(
				$this,
				'display_page_form'
			));
	}

	/**
	 *
	 */
	function display_page_form(){?>
        <div class="wrap">
            <h1>Leftover Files Remover</h1>
            <p>Number of leftover files : <?php echo count($this->leftover_files); ?></p>
            <form method="post" action="edit.php?post_type=wpdmpro&page=wpdm-file-sweeper">
            <?php
                submit_button('Permanently Delete Leftover Files');
            ?>
            </form>
        </div>
        <?php
	}

	function display_success_message(){?>
		<div id="message" class="updated notice notice-success is-dismissible">
			<p><?php echo count($this->leftover_files).$this->help_text['success_message']?></p>
			<button type="button" class="notice-dismiss">
				<span class="screen-reader-text">Dismiss this notice.</span>
			</button>
		</div>
	<?php
	}


    public function detect_leftover_files(){
    	global $wpdb;

        $query_string = "   SELECT p.post_title, pm.meta_value
                            FROM $wpdb->posts p
                            JOIN $wpdb->postmeta pm ON p.id = pm.post_id
                            WHERE p.post_type='wpdmpro'
                            AND pm.meta_key = '__wpdm_files'
                            ";
        $wpdm_raw_db_files = $wpdb->get_results($query_string, ARRAY_A);

        $file_lists = array();
        $unserialized_files = array();
        foreach ($wpdm_raw_db_files as $key => $value) {
            $unserialized_files = unserialize($value['meta_value']);
            foreach ($unserialized_files as $key => $value) {
                array_push($file_lists, $value);
            }
        }

        $directory_file_lists = array();
        foreach(glob($this->user_dirname.'/*.*') as $file) {
            array_push($directory_file_lists,basename($file));
        }

        $this->leftover_files = array_diff($directory_file_lists,$file_lists);
    }

    public function remove_leftover_files(){
    	foreach ($this->leftover_files as $value) {
            unlink($this->user_dirname.$value);
        }
    }
}

if( is_admin() )
	$file_sweeper = new DFDLeftoverFilesRemover();


if(isset($_POST['submit'])){ 
	$file_sweeper->remove_leftover_files();
	$file_sweeper->display_success_message();
} 
