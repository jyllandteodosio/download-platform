<?php


namespace WPDM\libs;


class FileList
{
    /**
     * @usage Callback function for [file_list] tag
     * @param $file
     * @param bool|false $play_only
     * @return string
     */
    public static function Table($file, $play_only = false)
    {
        global $current_user;

//    $files = \WPDM\Package::getFiles($file['ID']);
//
//    $template = new \WPDM\Template();
//    return $template->Assign('files', $files)
//        ->Assign('package_id', $file['ID'])
//        ->Assign('fileinfo', $file['fileinfo'])
//        ->Assign('package_dir', $file['package_dir'])
//        ->Assign('password_lock', $file['password_lock'])
//        ->Fetch('file-list.php');

        $file['files'] = maybe_unserialize($file['files']);
        $permalink = get_permalink($file['ID']);
        $sap = strpos($permalink, '?')?'&':'?';
        $fhtml = '';
        $idvdl = \WPDM\Package::isSingleFileDownloadAllowed($file['ID']);  //isset($file['individual_file_download']) ? $file['individual_file_download'] : 0;
        $pd = isset($file['publish_date'])&&$file['publish_date']!=""?strtotime($file['publish_date']):0;
        $xd = isset($file['expire_date'])&&$file['expire_date']!=""?strtotime($file['expire_date']):0;

        $nodl = $play_only?'style="display: none"':"";

        $cur = is_user_logged_in()?$current_user->roles:array('guest');

        if(($xd>0 && $xd<time()) || ($pd>0 && $pd>time()))  $idvdl = 0;

        $dir = isset($file['package_dir'])?$file['package_dir']:'';
        $dfiles = array();
        if($dir!=''){
            $dfiles = wpdm_get_files($dir);

        }

        $file['access'] = wpdm_allowed_roles($file['ID']);

        if (count($file['files']) > 0 || count($dfiles) > 0) {
            $fileinfo = isset($file['fileinfo']) ? $file['fileinfo'] : array();
            $pwdlock = isset($file['password_lock']) ? $file['password_lock'] : 0;

            //Check if any other lock option applied for this package
            $olock = wpdm_is_locked($file['ID']) ? 1 : 0;
            $swl = 0;
            if(!isset($file['quota'])||$file['quota']<=0) $file['quota'] = 9999999999999;
            if(is_user_logged_in()) $cur[] = 'guest';
            if(!isset($file['access']) || count($file['access'])==0 || !wpdm_user_has_access($file['ID']) || wpdm_is_download_limit_exceed($file['ID']) || $file['quota'] <= $file['download_count']) $olock = 1;
            $pwdcol = $dlcol = '';

            if ($pwdlock && $idvdl) $pwdcol = "<th>".__("Password","wpdmpro")."</th>";
            if ($idvdl && ($pwdlock || !$olock)) { $dlcol = "<th>".__("Action","wpdmpro")."</th>"; $swl = 1; }
            $allfiles = is_array($file['files'])?$file['files']:array();

            //$allfiles = array_merge($allfiles, $dfiles);
            $fhtml = "<audio controls preload='auto' style='width: 100%;display: none' id='audio-player-{$file['ID']}'></audio><table id='wpdm-filelist-{$file['ID']}' class='wpdm-filelist table table-hover'><thead><tr><th>".__("File","wpdmpro")."</th>{$pwdcol}{$dlcol}</tr></thead><tbody>";
            if (is_array($allfiles)) {
                $pc = 0;
                foreach ($allfiles as $fileID => $sfile) {

                    $individual_file_actions = '';
                    $individual_file_actions = apply_filters("individual_file_action", $individual_file_actions, $file['ID'], $sfile, $fileID);

                    $ind = \WPDM_Crypt::Encrypt($sfile);
                    $pc++;

                    if (!isset($fileinfo[$sfile]) || !@is_array($fileinfo[$sfile])) $fileinfo[$sfile] = array();
                    if (!@is_array($fileinfo[$fileID])) $fileinfo[$fileID] = array();

                    $filePass = isset($fileinfo[$sfile]['password'])?$fileinfo[$sfile]['password']:(isset($fileinfo[$fileID]['password'])?$fileinfo[$fileID]['password']:'');
                    $fileTitle = isset($fileinfo[$sfile]['title']) && $fileinfo[$sfile]['title'] != '' ? $fileinfo[$sfile]['title']:(isset($fileinfo[$fileID]['title']) && $fileinfo[$fileID]['title'] != '' ? $fileinfo[$fileID]['title']:preg_replace("/([0-9]+)_/", "",wpdm_basename($sfile)));

                    if ($swl) {
                        $mp3 = explode(".", $sfile);
                        $mp3 = end($mp3);
                        $mp3 = strtolower($mp3);
                        $play = $mp3 == 'mp3'?"<a rel='nofollow' class='btn btn-success btn-xs wpdm-btn-play song-{$file['ID']}-{$pc}' data-song-index='song-{$file['ID']}-{$pc}' id='song-{$file['ID']}-{$pc}' data-state='stop' href='#' data-player='audio-player-{$file['ID']}' data-song='" . wpdm_download_url($file) . "&ind=" . $ind . "'><i style='margin-top:0px' class='fa fa-play'></i></a>":"";

                        if ($filePass == '' && $pwdlock) $filePass = $file['password'];

                        $fhtml .= "<tr><td>{$fileTitle}</td>";
                        if ($pwdlock)
                            $fhtml .= "<td width='110' class='text-right'><input  onkeypress='jQuery(this).removeClass(\"input-error\");' size=10 type='password' value='' id='pass_{$file['ID']}_{$ind}' placeholder='".__('Password','wpdmpro')."' name='pass' class='form-control input-sm inddlps' /></td>";
                        if ($filePass != '' && $pwdlock)
                            $fhtml .= "<td width=150><button class='inddl btn btn-primary btn-sm' data-pid='{$file['ID']}' data-file='{$fileID}' rel='" . $permalink.$sap."wpdmdl={$file['ID']}" . "&ind=" . $ind . "' data-pass='#pass_{$file['ID']}_{$ind}'><i class='fa fa-download'></i>&nbsp;".__("Download","wpdmpro")."</button>&nbsp;{$individual_file_actions}</td></tr>";
                        else
                            $fhtml .= "<td style='width: 150px;white-space: nowrap;'  class='text-right'><a rel='nofollow' class='btn btn-primary btn-xs' {$nodl} href='" . wpdm_download_url($file) . "&ind=" . $ind . "'><i class='fa fa-download'></i> &nbsp;".__("Download","wpdmpro")."</a>&nbsp;{$play}&nbsp;{$individual_file_actions}</td></tr>";
                    } else {
                        $fhtml .= "<tr><td>{$fileTitle}</td></tr>";
                    }
                }

            }

            if (is_array($dfiles)) {

                foreach ($dfiles as $ind => $sfile) {

                    $individual_file_actions = '';
                    $individual_file_actions = apply_filters("individual_file_action", $individual_file_actions, $file['ID'], $sfile, $ind);

                    $ind = str_replace($dir, "", $sfile);

                    $ind = \WPDM_Crypt::Encrypt($sfile);


                    if (!isset($fileinfo[$sfile]) || !@is_array($fileinfo[$sfile])) $fileinfo[$sfile] = array();
                    if(!isset($fileinfo[$sfile]['password'])) $fileinfo[$sfile]['password'] = "";
                    if ($idvdl == 1 && ($pwdlock || !$olock)) {

                        $mp3 = explode(".", $sfile);
                        $mp3 = end($mp3);
                        $mp3 = strtolower($mp3);
                        $play = $mp3 == 'mp3'?"<a rel='nofollow' class='btn btn-success btn-xs wpdm-btn-play' href='#' data-player='audio-player-{$file['ID']}' data-song='" . wpdm_download_url($file) . "&ind=" . $ind . "'><i style='margin-top:0px' class='fa fa-play'></i></a>":"";

                        if ($fileinfo[$sfile]['password'] == '' && $pwdlock) $fileinfo[$sfile]['password'] = $file['password'];
                        $ttl = isset($fileinfo[$sfile]['title']) && $fileinfo[$sfile]['title']!="" ? $fileinfo[$sfile]['title'] :  str_replace('/', " <i class='fa fa-angle-right text-primary'></i> ",str_replace($dir, "", $sfile));
                        $fhtml .= "<tr><td>{$ttl}</td>";
                        $fileinfo[$sfile]['password'] = $fileinfo[$sfile]['password'] == '' ? $file['password'] : $fileinfo[$sfile]['password'];
                        if ($fileinfo[$sfile]['password'] != '' && $pwdlock)
                            $fhtml .= "<td width='110'  class='text-right'><input  onkeypress='jQuery(this).removeClass(\"input-error\");' size=10 type='password' value='' id='pass_{$file['ID']}_{$ind}' placeholder='".__('Password','wpdmpro')."' name='pass' class='form-control input-sm inddlps' /></td>";
                        if ($fileinfo[$sfile]['password'] != '' && $pwdlock)
                            $fhtml .= "<td width=150><button class='inddl btn btn-primary btn-sm' data-pid='{$file['ID']}' data-file='{$sfile}' rel='" . wpdm_download_url($file) . "&ind=" . $ind . "' data-pass='#pass_{$file['ID']}_{$ind}'><i class='fa fa-download'></i> &nbsp;".__('Download','wpdmpro')."</button>&nbsp;{$individual_file_actions}</td></tr>";
                        else
                            $fhtml .= "<td style='width: 150px;white-space: nowrap;'  class='text-right'><a rel='nofollow' class='btn btn-primary btn-xs' href='" . wpdm_download_url($file) . "&ind=" . $ind . "'><i class='fa fa-download'></i> &nbsp;".__('Download','wpdmpro')."</a>{$play}&nbsp;{$individual_file_actions}</td></tr>";
                    } else {
                        $ttl = isset($fileinfo[$sfile]['title']) && $fileinfo[$sfile]['title']!="" ? $fileinfo[$sfile]['title'] :  str_replace('/', " <i class='fa fa-angle-right text-primary'></i> ",str_replace($dir, "", $sfile));
                        $fhtml .= "<tr><td>{$ttl}</td></tr>";
                    }
                }

            }
            $fhtml .= "</tbody></table>";
            $siteurl = home_url('/');




        }


        return $fhtml;

    }


    /**
     * @usage Callback function for [file_list_extended] tag
     * @param $file
     * @return string
     * @usage Generate file list with preview
     */
    public static function Box($file)
    {
        global $current_user;
        $file['files'] = maybe_unserialize($file['files']);
        $fhtml = '';
        $idvdl = \WPDM\Package::isSingleFileDownloadAllowed($file['ID']); //isset($file['individual_file_download']) ? $file['individual_file_download'] : 0;
        $pd = isset($file['publish_date'])&&$file['publish_date']!=""?strtotime($file['publish_date']):0;
        $xd = isset($file['expire_date'])&&$file['expire_date']!=""?strtotime($file['expire_date']):0;

        $cur = is_user_logged_in()?$current_user->roles:array('guest');

        $_SESSION['wpdmfilelistcd_'.$file['ID']] = 1;

        if(($xd>0 && $xd<time()) || ($pd>0 && $pd>time()))  $idvdl = 0;

        $dir = isset($file['package_dir'])?$file['package_dir']:'';
        $dfiles = array();
        if($dir!=''){
            $dfiles = wpdm_get_files($dir, false);

        }

        $file['access'] = wpdm_allowed_roles($file['ID']);

        if (count($file['files']) > 0 || count($dfiles) > 0) {

            $fileinfo = isset($file['fileinfo']) ? $file['fileinfo'] : array();
            $pwdlock = isset($file['password_lock']) ? $file['password_lock'] : 0;

            //Check if any other lock option apllied for this package
            $olock = wpdm_is_locked($file['ID']) ? 1 : 0;
            $swl = 0;
            if(!isset($file['quota'])||$file['quota']<=0) $file['quota'] = 9999999999999;
            if(is_user_logged_in()) $cur[] = 'guest';
            if(!isset($file['access']) || count($file['access'])==0 || !wpdm_user_has_access($file['ID']) || wpdm_is_download_limit_exceed($file['ID']) || $file['quota'] <= $file['download_count']) $olock = 1;
            $pwdcol = $dlcol = '';
            if ($pwdlock && $idvdl) $pwdcol = "<th>".__("Password","wpdmpro")."</th>";
            if ($idvdl && ($pwdlock || !$olock)) { $dlcol = "<th align=center>".__("Download","wpdmpro")."</th>"; $swl = 1; }
            $allfiles = is_array($file['files'])?$file['files']:array();


            //$allfiles = array_merge($allfiles, $dfiles);
            $fhtml = "<div class='row' id='xfilelist'>";
            if (is_array($allfiles)) {

                foreach ($allfiles as $fileID => $sfile) {
                    $fhtml .= "<div class='col-md-4 col-sm-6 col-xs-6'><div class='panel panel-default'>";
                    $ind = \WPDM_Crypt::Encrypt($sfile);

                    if (!isset($fileinfo[$sfile]) || !@is_array($fileinfo[$sfile])) $fileinfo[$sfile] = array();
                    if (!@is_array($fileinfo[$fileID])) $fileinfo[$fileID] = array();

                    $filePass = isset($fileinfo[$sfile]['password'])?$fileinfo[$sfile]['password']:(isset($fileinfo[$fileID]['password'])?$fileinfo[$fileID]['password']:'');
                    $fileTitle = isset($fileinfo[$sfile]['title']) && $fileinfo[$sfile]['title'] != '' ? $fileinfo[$sfile]['title']:(isset($fileinfo[$fileID]['title']) && $fileinfo[$fileID]['title'] != '' ? $fileinfo[$fileID]['title']:preg_replace("/([0-9]+)_/", "",wpdm_basename($sfile)));


                    if ($filePass == '' && $pwdlock) $filePass = $file['password'];

                    $fhtml .= "<div class='panel-heading ttip' title='{$fileTitle}'>{$fileTitle}</div>";

                    $imgext = array('png','jpg','jpeg', 'gif');
                    $ext = explode(".", $sfile);
                    $ext = end($ext);
                    $ext = strtolower($ext);
                    $filepath = file_exists($sfile)?$sfile:UPLOAD_DIR.$sfile;
                    $thumb = "";

                    if($ext == '' || !file_exists(WPDM_BASE_DIR.'assets/file-type-icons/'.$ext.'.png')) $ext = '_blank';

                    if(in_array($ext, $imgext))
                        $thumb = wpdm_dynamic_thumb($filepath, array(88, 88));
                    if($thumb)
                        $fhtml .= "<div class='panel-body text-center'><img class='file-thumb' src='{$thumb}' alt='{$fileTitle}' /></div><div class='panel-footer footer-info'>".wpdm_file_size($sfile)."</div><div class='panel-footer'>";
                    else
                        $fhtml .= "<div class='panel-body text-center'><img class='file-ico' src='".WPDM_BASE_URL.'assets/file-type-icons/'.$ext.'.png'."' alt='{$fileTitle}' /></div><div class='panel-footer footer-info'>".wpdm_file_size($sfile)."</div><div class='panel-footer'>";


                    if ($swl) {

                        if ($filePass != '' && $pwdlock)
                            $fhtml .= "<div class='input-group'><input  onkeypress='jQuery(this).removeClass(\"input-error\");' size=10 type='password' value='' id='pass_{$file['ID']}_{$ind}' placeholder='Password' name='pass' class='form-control input-sm inddlps' />";
                        if ($filePass != '' && $pwdlock)
                            $fhtml .= "<span class='input-group-btn'><button class='inddl btn btn-primary btn-sm' file='{$sfile}' rel='" . wpdm_download_url($file) . "&ind=" . $ind . "' pass='#pass_{$file['ID']}_{$ind}'><i class='fa fa-download'></i></button></span></div>";
                        else
                            $fhtml .= "<a class='btn btn-primary btn-sm btn-block' href='" . wpdm_download_url($file) . "&ind=" . $ind . "'><span class='pull-left'><i class='fa fa-download'></i></span>&nbsp;".__("Download","wpdmpro")."</a>";
                    }


                    $fhtml .= "</div></div></div>";
                }

            }

            if (is_array($dfiles)) {

                foreach ($dfiles as $ind => $sfile) {

                    $ind = \WPDM_Crypt::Encrypt($sfile);

                    $fhtml .= "<div class='col-md-4 col-sm-6 col-xs-6'><div class='panel panel-default'>";
                    if (!isset($fileinfo[$sfile]) || !@is_array($fileinfo[$sfile])) $fileinfo[$sfile] = array();
                    if(!isset($fileinfo[$sfile]['password'])) $fileinfo[$sfile]['password'] = "";

                    if ($fileinfo[$sfile]['password'] == '' && $pwdlock) $fileinfo[$sfile]['password'] = $file['password'];
                    $ttl = isset($fileinfo[$sfile]['title']) && $fileinfo[$sfile]['title']!="" ? $fileinfo[$sfile]['title'] : preg_replace("/([0-9]+)_/", "", wpdm_basename($sfile));

                    $cttl = (is_dir($sfile))?"<a href='#' class='wpdm-indir' data-dir='{$ttl}' data-pid='{$file['ID']}'>{$ttl}/</a>": $ttl;

                    $fhtml .= "<div class='panel-heading ttip' title='{$ttl}'>{$cttl}</div>";

                    $imgext = array('png','jpg','jpeg', 'gif');
                    $ext = explode(".", $sfile);
                    $ext = end($ext);
                    $ext = strtolower($ext);
                    if(is_dir($sfile)) { $ext = 'folder'; }
                    $filepath = file_exists($sfile)?$sfile:UPLOAD_DIR.$sfile;
                    $thumb = "";
                    $showt = 1;
                    if(in_array($ext, $imgext) && apply_filters('file_list_extended_show_thumbs', $showt))
                        $thumb = wpdm_dynamic_thumb($filepath, array(88, 88));

                    $fticon = WPDM_BASE_URL.'assets/file-type-icons/'.$ext.'.png';

                    if(!file_exists(WPDM_BASE_DIR.'assets/file-type-icons/'.$ext.'.png'))
                        $fticon = WPDM_BASE_URL.'assets/file-type-icons/ini.png';

                    if($thumb)
                        $fhtml .= "<div class='panel-body text-center'><img class='file-thumb' src='{$thumb}' alt='{$ttl}' /></div><div class='panel-footer footer-info'>".wpdm_file_size($sfile)."</div><div class='panel-footer'>";
                    else
                        $fhtml .= "<div class='panel-body text-center'><img class='file-ico' src='".$fticon."' alt='{$ttl}' /></div><div class='panel-footer footer-info'>".wpdm_file_size($sfile)."</div><div class='panel-footer'>";


                    if ($swl) {
                        $fileinfo[$sfile]['password'] = $fileinfo[$sfile]['password'] == '' ? $file['password'] : $fileinfo[$sfile]['password'];
                        if ($fileinfo[$sfile]['password'] != '' && $pwdlock  && !is_dir($sfile))
                            $fhtml .= "<div class='input-group'><input  onkeypress='jQuery(this).removeClass(\"input-error\");' size=10 type='password' value='' id='pass_{$file['ID']}_{$ind}' placeholder='Password' name='pass' class='form-control input-sm inddlps' />";
                        if ($fileinfo[$sfile]['password'] != '' && $pwdlock  && !is_dir($sfile))
                            $fhtml .= "<span class='input-group-btn'><button class='inddl btn btn-primary btn-sm' file='{$sfile}' rel='" . wpdm_download_url($file) . "&ind=" . $ind . "' pass='#pass_{$file['ID']}_{$ind}'><i class='fa fa-download'></i></button></span></div>";
                        else  if(!is_dir($sfile))
                            $fhtml .= "<a class='btn btn-primary btn-sm btn-block' href='" . wpdm_download_url($file) . "&ind=" . $ind . "'><span class='pull-left'><i class='fa fa-download'></i></span>&nbsp;".__("Download","wpdmpro")."</a>";
                        else
                            $fhtml .= "<a class='btn btn-primary btn-sm btn-block wpdm-indir' href='#'  data-dir='{$ttl}' data-pid='{$file['ID']}'><span class='pull-left'><i class='fa fa-folder'></i></span> &nbsp;".__("Browse","wpdmpro")."</a>";

                    }


                    $fhtml .= "</div></div></div>";
                }

            }
            $fhtml .= "</div>";
            $siteurl = home_url('/');
            $fhtml .= "<script type='text/javascript' language='JavaScript'> jQuery('.inddl').click(function(){ var tis = this; jQuery.post('{$siteurl}',{wpdmfileid:'{$file['ID']}',wpdmfile:jQuery(this).attr('file'),actioninddlpvr:1,filepass:jQuery(jQuery(this).attr('pass')).val()},function(res){ res = res.split('|'); var ret = res[1]; if(ret=='error') jQuery(jQuery(tis).attr('pass')).addClass('input-error'); if(ret=='ok') location.href=jQuery(tis).attr('rel')+'&_wpdmkey='+res[2];});}); </script> ";


        }


        return $fhtml;

    }


    // Added by Dianne D.R. - custom functions
    private static $html_div_outer_container = "<div class='row' id='xfilelist'>";
    private static $html_div_panel_container = "<div class='col-md-4 col-sm-6 col-xs-6'>";
    private static $html_div_panel = "<div class='panel panel-default'>";
    private static $html_div_close = "</div>";
    private static $prefix_list = array(
                                    /* PREFIX FOR SHOW IMAGES*/
                                    'key_art'           => 'key', 
                                    'episodic_stills'   => 'epi', 
                                    'gallery'           => 'gal', 
                                    'logos'             => 'log',
                                    'others'            => 'oth',
                                    /* PREFIX FOR SHOW DOCUMENTS */
                                    'synopses'          => 'syn',
                                    'transcripts'       => 'epk',
                                    'fact_sheet'        => 'fac',
                                    'fonts'             => 'fon',
                                    'document_others'   => 'doth'
                                    );

    /**
     * @usage Callback function for [images_key_art] tag
     * @param $file
     * @return string
     * @usage Generate file list with preview - key art images
     */
    public static function CategorizedFileList($file, $prefix = null){
        $file['files'] = maybe_unserialize($file['files']);
        $fhtml = '';

        if(self::checkPackageDownloadAvailability($file['publish_date'], $file['expire_date'])){
            if (count($file['files']) > 0) {
                $fileinfo = isset($file['fileinfo']) ? $file['fileinfo'] : array();
                $allfiles = $prefix != "promo" ? is_array($file['files']) ? $file['files'] : array() : get_field( "add_promo_files" );
      
                // Start structuring the container html of file list
                if (is_array($allfiles)) {
                    foreach ($allfiles as $fileID => $sfileOriginal) {
                        $fileTitle = $prefix != "promo" ? isset($fileinfo[$sfile]['title']) && $fileinfo[$sfile]['title'] != '' ? $fileinfo[$sfile]['title']:(isset($fileinfo[$fileID]['title']) && $fileinfo[$fileID]['title'] != '' ? $fileinfo[$fileID]['title']:preg_replace("/([0-9]+)_/", "",wpdm_basename($sfile)))  :  $sfileOriginal['file_name'];
                        $sfile = $prefix != "promo" ? $sfileOriginal : $sfileOriginal['attached_file'];
                        $thumb = "";
                        if(checkFileType($sfile, 'image') && $prefix != "promo"){
                            $filepath = getFilePath($sfile);
                            $thumb = wpdm_dynamic_thumb($filepath, array(150, 88));

                            //KEY
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['key_art']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'image', $thumb);
                            }

                            //EPI
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['episodic_stills']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'image', $thumb);
                            }

                            // GAL
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['gallery']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'image', $thumb);
                            }

                            // LOG
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['logos']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'image', $thumb);
                            }
                            // OTHERS
                            if( !contains($fileTitle, self::$prefix_list['key_art']) && !contains($fileTitle, self::$prefix_list['episodic_stills']) && !contains($fileTitle, self::$prefix_list['gallery']) && !contains($fileTitle, self::$prefix_list['logos']) && $prefix == self::$prefix_list['others']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'image', $thumb);
                            }
                            
                        }
                        else if ( $prefix == "promo" ){
                            $thumb = $sfileOriginal['thumbnail'];
                            $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'promo', $thumb);
                        }
                        else{
                            // SYN
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['synopses']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'document');
                            }
                            // EPK
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['transcripts']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'document');
                            }
                            // FAC
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['fact_sheet']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'document');
                            }
                            // FON
                            if( contains($fileTitle, $prefix) && $prefix == self::$prefix_list['fonts']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'document');
                            }
                            // DOTH
                            if( !contains($fileTitle, self::$prefix_list['synopses']) && !contains($fileTitle, self::$prefix_list['transcripts']) && !contains($fileTitle, self::$prefix_list['fact_sheet']) && !contains($fileTitle, self::$prefix_list['fonts']) && $prefix == self::$prefix_list['document_others']){
                                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, 'document');
                            }
                        }
                    }
                }
            }
        }else{
            $fhtml .= "This package is not available for download";
        }
        return $fhtml;
    }

    /**
     * @usage function to generate per panel of file
     * @param $sfile, $fileID, $fileTitle
     * @return html
     * @usage returns html format of displayed file panel
     */
    public static function generateFilePanel($sfile, $fileID, $fileTitle, $fileType, $thumb = null) {
        $fhtml = "";
        $postID = get_the_id();
        $userID = get_current_user_id( );
        $filepath = $fileType != "promo" ? getFilePath($sfile) : $sfile;

        if($thumb){
            $file_thumb = "<div class='panel-body text-center'><img class='file-thumb' src='{$thumb}' alt='{$fileTitle}' /></div>";
        }else{
            $ext = getFileExtension($sfile);
            $file_thumb = "<div class='panel-body text-center'><img class='file-ico' src='".WPDM_BASE_URL.'assets/file-type-icons/'.$ext.'.png'."' alt='{$fileTitle}' /></div>";
        }
                                    
        $fhtml .= self::$html_div_panel_container;
            $fhtml .= self::$html_div_panel ;
            // To update when front-end design is final
            $fhtml .= "<div class='panel-heading ttip' title='{$fileTitle}'>{$fileTitle}</div>";
            $fhtml .= $file_thumb;
            $fhtml .= "<div class='panel-footer'>";
            $fhtml .= "<button class='btn btn-primary btn-sm btn-block btn-add-to-cart' data-file-id='{$fileID}' data-file-path='{$filepath}' data-thumb='{$thumb}' data-post-id='{$postID}' data-file-type='{$fileType}' data-user-id='{$userID}' href='#'>".__("Add to Cart","wpdmpro")."</button></div>";
            $fhtml .= "<button class='btn btn-primary btn-sm btn-block btn-remove-to-cart' data-file-id='{$fileID}' data-user-id='{$userID}' href='#'>Remove</button></div>";
        $fhtml .= self::$html_div_close;
        return $fhtml;
    }

    /**
     * @usage function to generate show custom script
     * @param none
     * @return html script
     * @usage returns html script format
     */
    public static function getScriptFile(){
        $siteurl = admin_url('/admin-ajax.php');
        $fhtml .= " <script type='text/javascript' language = 'JavaScript'>
                                jQuery(document).ready(function(){
                                    var ajaxurl = '{$siteurl}';

                                    jQuery('.btn-add-to-cart').click(function(event){
                                        var button = jQuery(this);
                                        jQuery.post(
                                            ajaxurl, 
                                            {   'action': 'add_to_cart',
                                                'file-id'   : jQuery(this).attr('data-file-id'),
                                                'file-path' : jQuery(this).attr('data-file-path'),
                                                'post-id'   : jQuery(this).attr('data-post-id'),
                                                'file-type' : jQuery(this).attr('data-file-type'),
                                                'user-id'   : jQuery(this).attr('data-user-id'),
                                                'thumb'     : jQuery(this).attr('data-thumb')
                                            },
                                            function(response) {
                                                if(response == 'success'){
                                                    button.text('ADDED');
                                                    button.prop('disabled',true);
                                                }else if (response == 'failed') {
                                                    console.log('insert failed');
                                                }
                                            }
                                        );
                                    });

                                    jQuery('.btn-remove-to-cart').click(function(event){
                                        var button = jQuery(this);
                                        jQuery.post(
                                            ajaxurl, 
                                            {   'action': 'remove_to_cart',
                                                'file-id'   : jQuery(this).attr('data-file-id'),
                                                'user-id'   : jQuery(this).attr('data-user-id')
                                            },
                                            function(response) {
                                                if(response == 'success'){
                                                    //button.addClass('hidden');
                                                }else if (response == 'failed') {
                                                    console.log('delete failed');
                                                }
                                            }
                                        );
                                    });

                                });
                            </script>";
        return $fhtml;
    }

    /**
     * @usage function to check if package is available for download through the publish and expire field
     * @param $file
     * @return bool
     * @usage returns 1 if file is available for download, otherwise 0
     */
    public static function checkPackageDownloadAvailability($start_date, $end_date){
        $pd = isset($start_date)&&$start_date!=""?strtotime($start_date):0;
        $xd = isset($end_date)&&$end_date!=""?strtotime($end_date):0;
        return !($xd>0 && $xd<time()) && !($pd>0 && $pd>time()) ? 1 : 0;
    }

}