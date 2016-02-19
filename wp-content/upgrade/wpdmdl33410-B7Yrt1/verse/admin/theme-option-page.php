<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/fonts/icons/icons.css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<div class="wrap wpeden-theme-options w3eden">
    <div class="container-fluid">
        <div class="row-fluid theader">
            <div class="span12">

                <h2 class="thm_heading"><img src="<?php echo get_template_directory_uri(); ?>/admin/images/logo-min.png" /></h2>
            </div>

        </div>
        <div class="row-fluid">
            <div class="span12">

                <div class=" tabbable tabs-left">
                    <div class="left-sidebar pull-left">
                        <!-- Theme Option Sections -->
                        <ul class="nav nav-tabs nav-tabs-vertical smn">                        
                            <?php
                            $tbc = 0;
                            foreach($settings_sections as $section_id => $section_name){ 
                                $settings_sections_tmp[$section_id] = $section_name; ?>
                                <li class="<?php echo $section_id; echo $section == $section_id ? 'active' : ''; ?>">
                                    <a href="#<?php echo $section_id; ?>" id="tab_<?php echo ++$tbc;?>" data-toggle='tab'>
                                        <i class="<?php echo $settings_icons[$section_id]?$settings_icons[$section_id]:'tn-settings' ?>"></i>&nbsp; <?php echo $section_name; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- Theme Option Sections Ends -->
                    </div>

                    <!-- Theme Option Fields for section # -->
                    <div class="tab-content">

                        <?php foreach($settings_sections_tmp as $section_id => $section_name){ ?>
                            <div class="tab-pane <?php echo $section_id == $section ? 'active' : ''; ?>" id="<?php echo $section_id; ?>">

                                <form id="theme-admin-form-<?php echo $section_id; ?>"  class="wpeden-theme-opt-form" action="options.php" method="post" enctype="multipart/form-data">
                                    <div class="xbtn pull-right">
                                        <button type="submit" class="btn btn-submit btn-large" id="<?php echo $section_id; ?>-submit" name="form_submit"><i class="tn-save"></i> &nbsp; Save Changes</button>
                                    </div>
                                    <div class="xbtn pull-right" style="margin-right: 140px">
                                        <button type="button" onclick="if(confirm('Are you sure?')) location.href='themes.php?_wtodr_nonce=<?php echo wp_create_nonce('wpeden-reset-data'); ?>';" class="btn btn-submit btn-large" id="<?php echo $section_id; ?>-submit" name="form_submit"><i class="tn-reload"></i> &nbsp; Reset to Default</button>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <td>
                                            <?php
                                                settings_fields( $section_id );
                                                self::DoSettingsFields( 'wpeden-themeopts',$section_id );
                                            ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="clear"></div>
                                </form>
                            </div>
                        <?php } ?>

                    </div>
                    <!-- Theme Option Fields for section # Ends -->
                </div>
            </div>
            <script>
                jQuery('.ttip').tooltip({placement:'right',animation:false, container:'ul.nav-pills'});
                jQuery('.nav-pills a').click(function(e){
                    e.preventDefault();
                    jQuery('.nav-tabs li').slideUp();
                    jQuery(jQuery(this).attr('rel')).slideDown(); 
                });
            </script>
        </div>
    </div>

</div>
