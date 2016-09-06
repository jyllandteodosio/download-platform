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
    private static $prefix_list = array(
                                    /* PREFIX FOR SHOW IMAGES*/
                                    'key_art'           => 'key', 
                                    'episodic_stills'   => 'epi', 
                                    'gallery'           => 'gallery', 
                                    'logos'             => 'logo',
                                    'others'            => 'oth',
                                    /* PREFIX FOR CHANNEL MATERIALS IMAGE*/
                                    'channel_logos'     => 'logo', 
                                    'channel_elements'  => 'elements', 
                                    'channel_others'    => 'cm_oth', 
                                    /* PREFIX FOR SHOW DOCUMENTS */
                                    'synopses'          => 'synopsis',
                                    'transcripts'       => 'trans',
                                    'fact_sheet'        => 'fact',
                                    'fonts'             => 'font',
                                    'document_others'   => 'doth',
                                    /* PROMO */
                                    'promos'            => 'promo',
                                    /* PREFIX FOR CHANNEL MATERIALS DOCUMENT */
                                    'channel_epg'       => 'epg',
                                    'channel_highlights'=> 'highlights',
                                    'channel_brand'     => 'brand',
                                    'channel_boiler'    => 'boiler',
                                    'channel_catchup'   => 'catch'
                                    );
    private static $operator_prefix_list = array(
                                    /* PREFIX FOR SHOW IMAGES*/
                                    // 'singtel'           => 'Singtel', 
                                    // 'starhub'           => 'StarHub', 
                                    // 'nowtv'             => 'nowTV', 
                                    // 'leeco'             => 'LeEco',
                                    // 'truevisions'       => 'TrueVisions',
                                    // 'hypptv'            => 'HyppTV',
                                    // 'kvisions'          => 'K-Visions',
                                    // 'skycable'          => 'SKYCable',
                                    'affiliate'         => 'Affiliate'
                                    );
    private static $specific_thumbs_prefix = 'SPECIFICTHUMBS';

    /**
     * @usage Callback function for [images_key_art] tag
     * @param $file
     * @return string
     * @usage Generate file list with preview - key art images
     */
    public static function CategorizedFileList($allfiles_sorted, $prefix = null, $category = 'show',$file = null, $specific_thumbnails = null, $fileType = null, $fileinfo = null){
        $fhtml = '';
        if (is_array($allfiles_sorted)) {
            foreach ($allfiles_sorted as $fileID => $sfileOriginal) {
                $sfile = $prefix != self::$prefix_list['promos'] ? $sfileOriginal : $sfileOriginal['attached_file'];
                $fileTitle = $prefix != self::$prefix_list['promos'] ? 
                                    isset($fileinfo[$sfile]['title']) && $fileinfo[$sfile]['title'] != '' ? 
                                        $fileinfo[$sfile]['title']:
                                        (isset($fileinfo[$fileID]['title']) && $fileinfo[$fileID]['title'] != '' ? 
                                            $fileinfo[$fileID]['title']:
                                            preg_replace("/([0-9]+)_/", "",wpdm_basename($sfile)))  
                                    :  $sfileOriginal['file_name'];


                $fileID = $prefix != self::$prefix_list['promos'] ? $fileID : $sfileOriginal['id'];
                $thumb = "";
                $ind = \WPDM_Crypt::Encrypt($sfile);
                $operator_group_promo_access = isset($sfileOriginal['operator_group']) ? $sfileOriginal['operator_group'] : 'all';
                $file['ID'] = null;
                $filepath = wpdm_download_url($file) . "&ind=" . $ind;
                $thumb = $prefix != self::$prefix_list['promos'] ? getImageThumbnail($sfile, $specific_thumbnails) : $sfileOriginal['thumbnail'];
                $fhtml .= self::generateFilePanel($sfile, $fileID, $fileTitle, $fileType, $thumb, $file);              
            }
        }

        return $fhtml;
    }

    /**
     * @usage function to generate per panel of file
     * @param $sfile, $fileID, $fileTitle
     * @return html
     * @usage returns html format of displayed file panel
     */
    public static function generateFilePanel($sfile, $fileID, $fileTitle, $fileType, $thumb = null, $file = null) {
        $fhtml = "";
        $postID = get_the_id();
        $userID = get_current_user_id( );
        $channel = $_SESSION['channel'];
        $ind = \WPDM_Crypt::Encrypt($sfile);
        $filepath = $fileType != self::$prefix_list['promos'] ? getFilePath($sfile) : $sfile;
        $absolute_file_path = getFileAbsolutePathByURL($sfile);
        $downloadUrl = $fileType != self::$prefix_list['promos'] ? wpdm_download_url($file).$postID."&ind=".$ind : $sfile;
        $buttonText = !checkFileInCart($fileID) ? __("Add to Cart","wpdmpro") : "Added&nbsp;&nbsp;<i class='fa fa-check'></i>";
        $isFileAdded = !checkFileInCart($fileID) ? "" : "disabled";
        $isFileClickable = !checkFileInCart($fileID) ? "" : "disabled-links";
        $isFileRemovable = !checkFileInCart($fileID) ? "" : "added-to-cart";
        $fileTitleTrimmed = mb_strimwidth($fileTitle, 0, 48, "...");
        
        /* Check if EPG file - will assign a special thumbnail if ever */
        if(contains($sfile,self::$prefix_list['channel_epg'])){
            $thumb_path = getEPGThumbnail($fileTitle);
        }
        else {
            $thumb_path = WPDM_CACHE_DIR.basename($thumb);
        }

        /* Will assign a thumbnail preview for image files */
        if($thumb!= "" && file_exists($thumb_path)){
            $file_thumb = '<img src="'.$thumb.'" alt="'.$fileTitle.'" title="'.$fileTitle.'" />';
        }
        /* Will assign a thumbnail preview For EPG Files */
        else if(contains($sfile,self::$prefix_list['channel_epg']) && file_exists(getFileAbsolutePathByURL($thumb_path))){
            $file_thumb = '<img src="'.$thumb_path.'" alt="'.$fileTitle.'" title="'.$fileTitle.'" />';
        }
        /* Will assign a thumbnail preview for non image files */
        else{
            $ext = strtolower(getFileExtension($sfile));
            $thumb_path =  WPDM_BASE_URL.'assets/file-type-icons/'.$ext.'.png';
            $default_thumb_path =  WPDM_BASE_URL.'assets/file-type-icons/_blank.png';
            $thumb = file_exists(getFileAbsolutePathByURL($thumb_path)) ? $thumb_path : $default_thumb_path;
            $file_thumb = "<img class='file-ico' src='{$thumb}' alt='{$fileTitle}' title='{$fileTitle}' />";
        }

        // FORM : INPUT FIELDS - use by bulk add to cart
        $cart_array['file-id'] = $fileID; 
        $cart_array['file-title'] = $fileTitle; 
        $cart_array['file-path'] = $filepath; 
        $cart_array['download-url'] = urlencode($downloadUrl); 
        $cart_array['post-id'] = $postID; 
        $cart_array['file-type'] = $fileType;
        $cart_array['user-id'] = $userID;
        $cart_array['thumb'] = $thumb;
        $cart_array['channel'] = $channel;
        $cart_data = prepare_cart_data($cart_array);
        $serialized_cart = serialize($cart_data);
        
        // FILE PANEL CONTAINER 
        $fhtml .= "     <div class='item {$fileID} {$isFileRemovable}'>";
        $fhtml .= "         <input type='hidden' name='{$fileID}' value='{$serialized_cart}'>";
        $fhtml .=           "<div class='file-thumb'>".$file_thumb."</div>";
        $fhtml .= "         <div class='show-meta'>";
        $fhtml .= "             <p>{$fileTitleTrimmed}</p>";
        $fhtml .= "             <p class='file-size'>".custom_wpdm_file_size($absolute_file_path,0)."</p>";
        $fhtml .= "             <a href='' class='add-to-cart-btn to-uppercase {$fileID} $isFileClickable'  {$isFileAdded} data-file-id='{$fileID}' data-file-title='{$fileTitle}' data-file-path='{$filepath}' data-download-url='{$downloadUrl}' data-thumb='{$thumb}' data-post-id='{$postID}' data-file-type='{$fileType}' data-user-id='{$userID}' data-channel='{$channel}' >{$buttonText}</a>";
        $fhtml .= "         </div>";
        $fhtml .= "         <span class='close-btn' data-file-id='{$fileID}' data-user-id='{$userID}'><i class='fa fa-lg fa-times'></i></span>";
        $fhtml .= "     </div>";
        $fhtml .= "     ";
       
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
        $cartnonce = wp_create_nonce('__rtl_cart_nonce__');
        $fhtml = '';
        $fhtml .= " <script type='text/javascript' language = 'JavaScript'>
                                jQuery(document).ready(function(){
                                    var ajaxurl = '{$siteurl}';
                                    var cartnonce = '{$cartnonce}';
                                    var addedText = \"Added&nbsp;&nbsp;<i class='fa fa-check'></i>\";
                                    var addText = '".__("Add to Cart","wpdmpro")."';
                                    
                                    populateEpisodeFilter('episodicstills-tab-contents','id', '".self::$prefix_list['episodic_stills']."', 'episode_code');
                                    populateEpisodeFilter('documents-tab-contents', 'id', '".self::$prefix_list['synopses']."', 'document_synopsis_code');
                                    populateEpisodeFilter('synopses-tab-contents', 'id', '".self::$prefix_list['synopses']."', 'synopsis_code');
                            
                                    jQuery('.table-files').submit(function(event) {
                                        event.preventDefault();
                                        var form = jQuery(this);
                                        var form_submitted_id = form.attr('id');
                                        jQuery('#'+form_submitted_id+' .add-to-cart-btn').addClass('disabled-links');
                                        console.log(form.attr('id'));
                                        jQuery.post(
                                            ajaxurl, 
                                            {
                                                'action'    : 'bulk_add_to_cart',
                                                'data'      : form.serialize(),
                                                'cartnonce' : cartnonce
                                            },function(response) {
                                                console.log('the response:');
                                                console.log(response);

                                                if(response == 'success'){
                                                    /* TODO: .prop in span not working */
                                                    jQuery('#'+form_submitted_id+' .show-items > .item ').addClass('added-to-cart');
                                                    jQuery('#'+form_submitted_id+' .add-to-cart-btn').html(addedText);
                                                    updateCartCount();
                                                }else if (response == 'failed') {
                                                    jQuery('#'+form_submitted_id+' .add-to-cart-btn').removeClass('disabled-links');
                                                    console.log('insert failed');
                                                }
                                            }
                                        );
                                    });

                                    jQuery('.add-to-cart-btn').click(function(event){
                                        event.preventDefault();
                                        var button = jQuery(this);
                                        var file_id = jQuery(this).attr('data-file-id');
                                        jQuery('.add-to-cart-btn.'+file_id).addClass('disabled-links').text('Adding..');
                                        jQuery.post(
                                            ajaxurl, 
                                            {   'action': 'add_to_cart',
                                                'file-id'   : file_id,
                                                'file-title': jQuery(this).attr('data-file-title'),
                                                'file-path' : jQuery(this).attr('data-file-path'),
                                                'download-url' : jQuery(this).attr('data-download-url'),
                                                'post-id'   : jQuery(this).attr('data-post-id'),
                                                'file-type' : jQuery(this).attr('data-file-type'),
                                                'user-id'   : jQuery(this).attr('data-user-id'),
                                                'thumb'     : jQuery(this).attr('data-thumb'),
                                                'channel'     : jQuery(this).attr('data-channel'),
                                                'cartnonce'     : cartnonce
                                            },
                                            function(response) {
                                                console.log('add:');
                                                console.log(response);

                                                if(response == 'success'){
                                                    jQuery('.show-items > .'+file_id+'').addClass('added-to-cart');
                                                    jQuery('.add-to-cart-btn.'+file_id).html(addedText);
                                                    updateCartCount();
                                                }else if (response == 'failed') {
                                                    jQuery('.add-to-cart-btn.'+file_id).removeClass('disabled-links').html(addText);
                                                    console.log('add to cart failed');
                                                }
                                            }
                                        );
                                    });

                                    jQuery('.close-btn').click(function(event){
                                        var button = jQuery(this);
                                        var file_id = jQuery(this).attr('data-file-id');
                                        jQuery('.show-items > .'+file_id+'').addClass('disabled-links');
                                        jQuery('.add-to-cart-btn.'+file_id).text('Removing...');
                                        jQuery.post(
                                            ajaxurl, 
                                            {   'action': 'remove_to_cart',
                                                'file-id'   : jQuery(this).attr('data-file-id'),
                                                'user-id'   : jQuery(this).attr('data-user-id'),
                                                'cartnonce'     : cartnonce
                                            },
                                            function(response) {
                                                console.log('remove:');
                                                console.log(response);
                                                if(response == 'success'){
                                                    jQuery('.show-items > .'+file_id+'').removeClass('added-to-cart').removeClass('disabled-links');
                                                    /* Show add button */
                                                    jQuery('.add-to-cart-btn.'+file_id).text('".__("Add to Cart","wpdmpro")."').removeClass('disabled-links');
                                                    updateCartCount();
                                                }else if (response == 'failed') {
                                                    jQuery('.add-to-cart-btn.'+file_id).removeClass('disabled-links').html(addedText);
                                                    jQuery('.show-items > .'+file_id+'').removeClass('disabled-links');
                                                    console.log('delete failed');
                                                }
                                            }
                                        );
                                    });
                                    
                                    function updateCartCount(){
                                       
                                        jQuery.get(
                                            ajaxurl, 
                                            {   'action': 'get_custom_cart_items_count'
                                            },
                                            function(response) {
                                                console.log('count:');
                                                console.log(response);
                                                jQuery('.show-cart span.counter').text(response);
                                            }
                                        );
                                    }

                                    function showAllShowItems(tab_class){
                                        jQuery('.'+tab_class+' .show-items .item').show();
                                    }

                                    function populateEpisodeFilter(tab_class,attribute_type, prefix, filter_id) {
                                        var attr_type = attribute_type == 'id' ? '#' : '.';
                                        var episodes_list = new Array();
                                        var file_title_epi;
                                        var file_title_epi_no;
                                        var text_nodes = jQuery('.'+tab_class+' .show-items .item .show-meta p:first-child')
                                          .contents()
                                          .filter(function() {
                                            return this.nodeType === 3; //Node.TEXT_NODE
                                          });
                                    
                                        jQuery.each(text_nodes, function( index, value ) {
                                            file_title_epi = value.textContent.toLowerCase().split(prefix);  /* will return something like this : '0006' */
                                            if(file_title_epi[1] != undefined){
                                                file_title_epi = file_title_epi[1].split('-');
                                                file_title_epi_no = parseInt(file_title_epi);
                                                console.log(prefix+':'+file_title_epi_no);
                                                if (!isNaN(file_title_epi_no)){
                                                    episodes_list.push(file_title_epi_no);
                                                }
                                            }
                                        });
                                        if(episodes_list.length > 0) {
                                            jQuery.unique(episodes_list);
                                            episodes_list.sort(sortNumber);
                                            jQuery.each(episodes_list, function( index, value ) {
                                                jQuery(attr_type+filter_id)
                                                     .append(jQuery('<option></option>')
                                                                .attr('value',value)
                                                                .text('Episode '+value)); 
                                            })
                                            console.log( 'Episodes - '+ episodes_list);   
                                        } 
                                        addSelectFilterListener(tab_class,attribute_type,filter_id,prefix);
                                    }

                                    function addSelectFilterListener(tab_class,attribute_type,select_filter_id,prefix){
                                        var attr_type = attribute_type == 'id' ? '#' : '.';
                                        /* Make contains search case insensitive */
                                        jQuery.expr[':'].contains = jQuery.expr.createPseudo(function(arg) {
                                            return function( elem ) {
                                                return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                                            };
                                        });
                                        jQuery( attr_type+select_filter_id )
                                          .change(function () {
                                            var str = '';
                                            jQuery( attr_type+select_filter_id+' option:selected' ).each(function() {
                                              str += jQuery( this ).val();
                                            });
                                            if(str == 'all') {
                                                showAllShowItems(tab_class);
                                                console.log('show all');
                                            }else {
                                                showAllShowItems(tab_class);
                                                console.log('prefix : '+prefix);
                                                var search_results_not = '';
                                                var search_results = '';
                                                var search_result_countdown = 4;
                                                while(search_results.length == 0 && search_result_countdown > 0){
                                                    console.log('search result countdown:'+ search_result_countdown);
                                                    var search_string = prefix+pad(str,search_result_countdown--);
                                                    search_results = jQuery('.'+tab_class+' .show-items .item:contains(\"'+search_string+'\")');
                                                    search_results_not = jQuery('.'+tab_class+' .show-items .item:not(:contains(\"'+search_string+'\"))');
                                                    console.log('search length : '+search_results.length);
                                                    if(search_results.length > 0){
                                                        search_results_not.hide();
                                                        console.log('Search String : '+search_string);
                                                    }
                                                    
                                                }
                                                
                                            }
                                        });
                                    }

                                    function pad (str, max) {
                                      str = str.toString();
                                      return str.length < max ? pad('0' + str, max) : str;
                                    }

                                    function sortNumber(a,b) {
                                        return a - b;
                                    }


                                });
                            </script>";
        return $fhtml;
    }

    /**
     * @usage function to get searchform template
     * @return string
     * @usage returns html
     */
    public static function getSearchForm(){
        $fhtml = '';
        ob_start();
        get_template_part('searchform');
        $fhtml = ob_get_contents();
        ob_end_clean();

        return $fhtml;
    }
}
