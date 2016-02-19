<?php

class WPEdenOptionFields {

    /**
     * @usage Generate DropDown Field
     * @param $params
     * @return string
     */
    public static function Dropdown($params){
        $html = "<select name='{$params['name']}'  id='{$params['id']}' >";
        foreach($params['options'] as $value => $label){

            $html .= "<option value='{$value}' ".selected($params['selected'],$value,false).">$label</option>";
        }
        $html .= "</select>";
        return $html;
    }

    /**
     * @usage Generate Layout Type Dropdown
     * @param $params
     * @return string
     */
    public static function LayoutType($params){
        $html = "<select  name='{$params['name']}' id='{$params['id']}' style='width: 100px'>";
        $html .= "<option value=''>Select</option>";
        $html .= "<option value='wide'".($params['selected']=='wide'?'selected=selected':'').">Wide</option>";
        $html .= "<option value='boxed'".($params['selected']=='boxed'?'selected=selected':'').">Boxed</option>";
        $html .= "<option value='framed'".($params['selected']=='framed'?'selected=selected':'').">Framed</option>";
        $html .= "</select>";
        return $html;
    }

    /**
     * @usage Generate Media Picker
     * @param $params
     * @return string
     */
    public static function MediaPicker($params){
        extract($params);

        $html = "<div class='input-group' style='max-width: 450px'><input class='form-control {$id}' type='text' name='{$name}' id='{$id}_image' value='{$selected}' /><span class='input-group-btn'><button style='margin-left: 5px' rel='#{$id}_image' class='btn btn-default btn-media-upload' type='button'><i class='tn-plus'></i></button></span></div>";
        $html .="<div style='clear:both'></div>";
        return $html;
    }

    /**
     * @usage Generat Revolution Slider Selection DropDown
     * @param $params
     * @return string
     */
    public static function RevolutionSlider($params){
        global $wpdb;
        $data = $wpdb->get_results("select * from {$wpdb->prefix}revslider_sliders");
        $html = "<select name='$params[name]'>";
        foreach($data as $d){
            $html .= "<option value='{$d->alias}' ".selected($params['selected'], $d->alias, false).">{$d->title}</option>";
        }
        $html .= "</select>";
        return $html;
    }

    /**
     * @usage Generate Color Picker
     * @param $params
     * @return string
     */
    public static function ColorPicker($params){
        extract($params);
        $html = '<input class="'.$id.' colorpicker input-small span2" type="text" name="'.$name.'" id="'.$id.'" size=10 placeholder="Color" value="'.$value.'" />';
        return $html;
    }

    /**
     * @usage Generate Portfolio Style Selection DropDown
     * @param $params
     * @return string
     */
    public static function PortfolioStyle($params){
        extract($params);
        $html = "<select name='{$name}' id='{$id}'>";
        $html .= "<option value='1' ".($selected=='1'?'selected=selected':'').">Style 1</option>";
        $html .= "<option value='2' ".($selected=='2'?'selected=selected':'').">Style 2</option>";
        $html .= "<option value='3' ".($selected=='3'?'selected=selected':'').">Style 3</option>";
        $html .= "<option value='4' ".($selected=='4'?'selected=selected':'').">Style 4</option>";
        $html .= "<option value='5' ".($selected=='5'?'selected=selected':'').">Style 5</option>";
        $html .= "<option value='6' ".($selected=='6'?'selected=selected':'').">Style 6</option>";
        $html .= "</select>";
        return $html;
    }

    /**
     * @usage Portfolio Page Column DropDown
     * @param $params
     * @return string
     */
    public static function PortfolioCols($params){
        extract($params);
        $html = "<select name='{$name}' id='{$id}'>";
        $html .= "<option value='6' ".($selected=='6'?'selected=selected':'').">2 Cols</option>";
        $html .= "<option value='4' ".($selected=='4'?'selected=selected':'').">3 Cols</option>";
        $html .= "<option value='3' ".($selected=='3'?'selected=selected':'').">4 Cols</option>";
        $html .= "</select>";
        return $html;
    }

    /**
     * @usage Sidebar Width Selection DropDown
     * @param $params
     * @return string
     */
    public static function SidebarWidth($params){
        extract($params);
        $html = "<select name='{$name}' id='{$id}'>";
        $html .= "<option value='3' ".($selected=='3'?'selected=selected':'').">Small (1/4)</option>";
        $html .= "<option value='4' ".($selected=='4'?'selected=selected':'').">Regular (1/3)</option>";
        $html .= "<option value='5' ".($selected=='5'?'selected=selected':'').">Large (5/12)</option>";
        $html .= "</select>";
        return $html;
    }

    /**
     * @usage Generate Post sharing control option
     * @param $params
     * @return string
     */
    public static function PostSharing($params){
        extract($params);
        $sns = array('icon-facebook'=>'Facebook',
            'icon-twitter'=>'Twitter',
            'icon-fontello-delicious'=>'Delicious',
            'icon-fontello-yahoo'=>'Yahoo',
            'icon-fontello-quora'=>'Quora',
            'icon-fontello-digg'=>'Digg',
            'icon-fontello-reddit'=>'Reddit',
            'icon-fontello-xing'=>'Xing',
            'icon-fontello-flickr'=>'Flickr',
            'icon-fontello-evernote'=>'Evernote',
            'icon-fontello-stumbleupon'=>'Stumble Upon',
            'icon-fontello-mixi'=>'Mixi',
            'icon-pinterest'=>'Pinterest',
            'icon-googleplus'=>'Google+',
            'icon-linkedin'=>'LinkedIn',
            'icon-fontello-instagram'=>'Instagram',
            'icon-fontello-yelp'=>'Yelp',
            'icon-fontello-myspace'=>'My Space',
            'icon-fontello-skype'=>'Skype',
            'icon-envelope'=>'Email'
        );
        $html = "<ul class='post-sharing'>";
        foreach($sns as $icon => $label){
            $checked = in_array($icon, $selected)?'checked=checked':''; // checked() is not usable here as 1 parameter is array
            $html .= "<li><label><input type='checkbox' name='{$name}[]' value='{$icon}' ".$checked." /> {$label}</label></li>";
        }
        $html .= "</ul>";
        return $html;
    }

    /**
     * @usage Generate Post Type Selection Checkboxes
     * @param $params
     * @return string
     */
    public static function PostTypeCheckboxes($params){
        extract($params);

        $post_types = get_post_types('','objects');

        $html = "<ul class='post-types'>";
        foreach($post_types as $post_type => $post_type_obj){
            $checked = in_array($post_type, $selected)?'checked=checked':''; // checked() is not usable here as 1 parameter is array
            $html .= "<li><label><input type='checkbox' name='{$name}[]' value='{$post_type}' ".$checked." /> {$post_type_obj->labels->name}</label></li>";
        }
        $html .= "</ul>";
        return $html;
    }

    public static function PackageInfo($params){
        extract($params);
        $sns = array(
            'version'=>'Version',
            'file_size'=>'File Size',
            'view_count'=>'View Count',
            'download_count'=>'Download Count',
            'create_date'=>'Create Date',
            'update_date'=>'Update Date'

        );
        $html = "<ul>";

        foreach($sns as $icon => $label){
            $checked = is_array($selected) && in_array($icon, $selected)?'checked=checked':''; // checked() is not usable here as 1 parameter is array
            $html .= "<li><label><input type='checkbox' name='{$name}[]' value='{$icon}' ".$checked." /> {$label}</label></li>";
        }
        $html .= "</ul>";
        return $html;
    }

    function CategoryLayout($params){
        extract($params);
        $html = "<select name='{$name}' id='{$id}'>";
        $html .= "<option value='archive-layout-1' ".selected($selected, 'archive-layout-1', false).">Archive Layout 1</option>";
        $html .= "<option value='archive-layout-2' ".selected($selected, 'archive-layout-2', false).">Archive Layout 2</option>";
        $html .= "<option value='archive-layout-3' ".selected($selected, 'archive-layout-3', false).">Archive Layout 3</option>";
        $html .= "<option value='archive-layout-4' ".selected($selected, 'archive-layout-4', false).">Archive Layout 4</option>";
        $html .= "</select>";
        return $html;
    }

    public static function HeaderStyles($params){
        WP_Filesystem();
        global $wp_filesystem; 
        extract($params);
        $default = !isset($params['default']) ? 1 : $params['default'];

        $navheads = scandir(get_template_directory().'/templates/headers/');
        if(file_exists(get_stylesheet_directory().'/templates/headers/'))
        $navheads = array_merge($navheads,  scandir(get_stylesheet_directory().'/templates/headers/'));

        $html = "<select name='{$name}' id='{$id}' style='width: 150px'><option value='{$default}'>Default</option>";
        $navheads = array_unique($navheads);
        foreach($navheads as $navhead){
            if(strpos($navhead, '.php') && (file_exists(get_template_directory().'/templates/headers/'.$navhead) || file_exists(get_stylesheet_directory().'/templates/headers/'.$navhead) )){
                $tmpdata = file_exists(get_stylesheet_directory().'/templates/headers/'.$navhead) ? $wp_filesystem->get_contents(get_stylesheet_directory().'/templates/headers/'.$navhead) : $wp_filesystem->get_contents(get_template_directory().'/templates/headers/'.$navhead);
                $navhead = str_replace(".php", "", $navhead);
                if(preg_match("/Nav[\s]*Header[\s]*Template[\s]*:([^\-\->]+)/",$tmpdata, $matches)){
                    $htitle = $matches[1];
                } else $htitle = $navhead;
                $html .= "<option value='{$navhead}' ".selected($selected,$navhead,false).">{$htitle}</option>";
            }
        }

        $html .= "</select>";
        return $html;
    }

    public static function PageHeaderStyles($params){
        //WP_Filesystem();
        global $wp_filesystem; 
        extract($params);
        $pageheads = scandir(get_template_directory().'/page-headers/');
        if(file_exists(get_stylesheet_directory().'/page-headers/'))
        $pageheads = array_merge($pageheads,  scandir(get_stylesheet_directory().'/page-headers/'));        
        $pageheads = array_unique($pageheads);
        
        $html = "<select name='{$name}' id='{$id}'><option value=''>Default</option>";
        
        foreach($pageheads as $pagehead){
            if(strpos($pagehead, '.php') && (file_exists(get_template_directory().'/page-headers/'.$pagehead) || file_exists(get_stylesheet_directory().'/page-headers/'.$pagehead) )){
                $tmpdata = file_exists(get_stylesheet_directory().'/page-headers/'.$pagehead) ? $wp_filesystem->get_contents(get_stylesheet_directory().'/page-headers/'.$pagehead) : $wp_filesystem->get_contents(get_template_directory().'/page-headers/'.$pagehead);
                $pagehead = str_replace(".php", "", $pagehead);
                if(preg_match("/Page[\s]*Header[\s]*Template[\s]*:([^\-\->]+)/",$tmpdata, $matches)){
                    $html .= "<option value='{$pagehead}' ".selected($selected,$pagehead,false).">{$matches[1]}</option>";
                }
            }
        }
        $html .= "</select>";
        return $html;
    }

    public static function PostsDropdown($params) {
        extract($params);
        $post_type_object = get_post_type_object($post_type);
        $label = $post_type_object->label;
        $posts = get_posts(array('post_type'=> $post_type, 'post_status'=> 'publish', 'suppress_filters' => false, 'posts_per_page'=>-1));
        $html = '<select name="'. $name .'" id="'.$id.'">';
        foreach ($posts as $post) {
            $html .= '<option value="'. $post->ID. '"'. selected($selected , $post->ID, false) . '>'. $post->post_title. '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public static function TaxonomiesDropdown($params){
        extract($params);

        $html = "<select id='{$id}' name='{$name}'>";

        global $wpdb;
        $txns = get_terms($params['taxonomy'], 'hide_empty=0');
        if(count($txns)>0){
            foreach($txns as $txn){

                $html .= '<option value="'.$txn->term_id.'" '.selected($selected, $txn->term_id, false ).'>'.$txn->name.'</option>';
            }
        }
        $html .='</select>';
        return $html;
    }

    public static function SidebarDropdown($params){
        $custom_sidebars = WPEdenThemeEngine::GetOption('custom_sidebars', array());
        $html = "<select name ='{$params['name']}'><option value=''>".__('Do Not Apply', 'thenext')."</option>";
        if(is_array($custom_sidebars)){
            foreach($custom_sidebars as $id => $custom_sidebar){
                $html .= "<option ".selected($params['selected'], $id, false)." value='{$id}'>{$custom_sidebar['name']}</option>";
            }
        }
        $html .= "</select>";
        return $html;
    }

    public static function GetFonts(){
        $ini_directory= get_template_directory().'/theme-data/';
        $font_array = parse_ini_file("$ini_directory/fonts.php", true, INI_SCANNER_RAW);
        return $font_array;
    }

    public static function FontDropdown($params = array()){
        extract($params);
        $fonts = self::GetFonts();
        //$id = uniqid();
        $html = '<div class="row-fluid">'
                . '<div class="pull-left font-family" style="min-width:180px">'
                . '<select style="width:99%" id="ff_'.$id.'" class="typography_font_family" name="'.$name.'[family]">'
                . '<option value="">Default</option>';
        foreach($fonts as $key => $font){
            if($sel['family']==$key) { $cff = $font['family']; }
            $html .= '<option value="'.$key.'" '. selected($sel['family'], $key, false).'>'.$font['name'].'</option>';
        }
        $html .= '</select>&nbsp;</div>';

        $html .= '<div class="pull-left" style="min-width:120px">'
                . '<select style="width:70px" id="fs_'.$id.'" class="typography_font_size" name="'.$name.'[size]">'
                . '<option value="">Size</option>';
        for($i = 9; $i <= 200; $i++){
            $html .= '<option value="'.$i.'" '.selected($sel['size'], $i, false).'>'.$i.'</option>';
        }
        $html .= '</select>&nbsp;';

        $html .= '<select  id="fss_'.$id.'" style="width:70px" class="typography_font_size" name="'.$name.'[pxpt]">';
        $html .= '<option value="pt">pt</option><option value="px"'.($sel['pxpt']=='px'?"selected='selected'":'').'>px</option>';
        $html .= '</select></div>';

        $html .= '<div class="pull-left" style="max-width:110px;margin-right:10px;margin-left:10px"><select id="fw_'.$id.'"  style="width:80px" class="typography_font_weight" name="'.$name.'[weight]"><option value="">Weight</option>';
        for($i = 100; $i <= 900; $i += 100){
            $html .= '<option value="'.$i.'" '.selected($sel['weight'], $i, false).'>'.$i.'</option>';
        }
        $html .= '</select></div>';

        $selu = $sel['u']==1?'active':'';
        $seli = $sel['i']==1?'active':'';
        $fnts = $sel['i']==1?'font-style:italic':'';
        $gflink = $sel['family']?"http://fonts.googleapis.com/css?family={$sel['family']}":"";
        
        if(isset($cff)) $ccss = "font-family:$cff;font-weight:{$sel['weight']};font-size:{$sel['size']}{$sel['pxpt']};$fnts";
        else $ccss = '';
        
        $html .= '<div class="pull-left" style="max-width:110px"><input size="12" style="width:90px !important"  type="text" class="colorpicker" id="'.$id.'_color" name="'.$name.'[color]" placeholder="Color" value="'.$sel['color'].'" /></div>';
        $html .= '<div class="span1" style="min-width:80px"><div class="btn-group" data-toggle="buttons-checkbox">
                 <button name="" type="button" class="btn btn-default btn-xs '.$seli.' typocb" id="ib-'.$id.'" style="padding: 3px 10px"><i>Italic</i></button>
                 </div><input id="ib-'.$id.'-x" type="hidden" value="'.$sel['i'].'" name="'.$name.'[i]" /><input id="ub-'.$id.'-x" type="hidden" value="'.$sel['u'].'" name="'.$name.'[u]" /></div></div>';
        $html .= '<div style="display:block;clear:both;"></div><div class="row-fluid"><div class="span12">
                 <link id="lnk_'.$id.'" href="'.$gflink.'" rel="stylesheet" type="text/css">
                 <div id="ptxt_'.$id.'" contenteditable="true" type="text" style="'.$ccss.'">Font Preview Text</div></div></div>
                 <script>
                        jQuery("#ff_'.$id.'").change(function(){ jQuery("#lnk_'.$id.'").attr("href","http://fonts.googleapis.com/css?family="+this.value); jQuery("#ptxt_'.$id.'").css("font-family",jQuery("#ff_'.$id.' option:selected").text()); });
                        jQuery("#fw_'.$id.'").change(function(){ jQuery("#ptxt_'.$id.'").css("font-weight",jQuery(this).val()); });
                        jQuery("#fs_'.$id.'").change(function(){ jQuery("#ptxt_'.$id.'").css("font-size",jQuery(this).val()+jQuery("#fss_'.$id.'").val()); });
                        jQuery("#fss_'.$id.'").change(function(){ jQuery("#ptxt_'.$id.'").css("font-size",jQuery("#fs_'.$id.'").val()+jQuery(this).val()); });
                        jQuery("#'.$id.'_color").change(function(){ jQuery("#ptxt_'.$id.'").css("color",jQuery(this).val()); });
                 </script>';
        return $html;
    }

    public static function SliderDropdown($params = array()){
        extract($params);
        $slider = get_option('aois_sliders', array());
        $html = "<select name='{$name}[native]' id='{$id}' onchange=\"if(this.value=='external') jQuery('#sscode').slideDown(); else jQuery('#sscode').slideUp();\"><option value='none'>Hide Slider</option>";
        foreach ($slider as $sid=>$s) {
            $html .= "<option value='{$sid}' ".($selected['native']==$sid?'selected=selected':'').">{$s[name]}</option>";
        }
        $html = apply_filters("wpeden_slider", $html, $selected);
        $html .= "<option value='external' ".($selected['native']=='external'?'selected=selected':'').">External</option>";
        $html .= "</select><div id='sscode' style='".($selected['native']=='external'?'display:block':'display:none')."' >Enter Slider Short-code</br><input type='text'  name='{$name}[shortcode]' value='{$selected['shortcode']}' /></div>";
        return $html;
    }

    public static function CustomCSS($params){
        ?>
        <textarea style="resize:vertical;max-width: 100% !important;min-width: 100%;height: 600px;font-family: 'courier new';" name="<?php echo $params['name']; ?>" id="<?php echo $params['id']; ?>"><?php echo $params['value']; ?></textarea>
    <?php
    }

    public static function CustomBackground($params){
        extract($params);

        if(!isset($selected) || !is_array($selected) || count($selected)==0) $selected = array('image'=>'','position_h'=>'','position_v'=>'','attachment'=>'','repeat'=>'','color'=>'');
        //$selected['image'] = isset($selected['image'])?$selected['image']:'';

        $html = "<div class='input-group' style='margin-right: 10px;max-width: 500px'><span class='input-group-btn'><button rel='#{$id}_image' class='btn btn-default btn-media-upload' type='button'><i class='tn-image'></i></button></span><input style='min-width: 90%' class='{$id} form-control' type='text' name='{$name}[image]' id='{$id}_image' value='{$selected['image']}' /></div>";
        $html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:90px' onchange='preview_cbg(\"{$id}\")' id='{$id}_position_h' name='{$name}[position_h]'><option value='left'>Left</option><option value='center' ".($selected['position_h']=='center'?'selected=selected':'').">Center</option><option value='right' ".($selected['position_h']=='right'?'selected=selected':'').">Right</option></select></div>";
        $html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:90px' onchange='preview_cbg(\"{$id}\")' id='{$id}_position_v' name='{$name}[position_v]'><option value='top'>Top</option><option value='center' ".($selected['position_v']=='center'?'selected=selected':'').">Center</option><option value='bottom' ".($selected['position_v']=='bottom'?'selected=selected':'').">Bottom</option></select></div>";
        $html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:150px;' onchange='preview_cbg(\"{$id}\")' id='{$id}_repeat' name='{$name}[repeat]'><option value='no-repeat'>No Repeat</option><option value='repeat' ".($selected['repeat']=='repeat'?'selected=selected':'').">Repeat</option><option value='repeat-x' ".($selected['repeat']=='repeat-x'?'selected=selected':'').">Repeat Horizontally</option><option value='repeat-y' ".($selected['repeat']=='repeat-y'?'selected=selected':'').">Repeat Vertically</option><option value='stretched' ".($selected['repeat']=='stretched'?'selected=selected':'').">Stretched</option></select></div>";
        $html .= "<div class='input-group' style='margin-top:9px;margin-right:10px;float:left;'><select class='{$id}' style='width:90px' onchange='preview_cbg(\"{$id}\")' id='{$id}_attachment' name='{$name}[attachment]'><option value='scroll'>Scroll</option><option value='fixed' ".($selected['attachment']=='fixed'?'selected=selected':'').">Fixed</option></select></div>";
        $html .= "<div style='clear:both;'>&nbsp;</div><div id='hfp' title='Monitor Preview' style='width:300px;height:200px;max-width:100%;margin:0 10px 5px 0;float: left;border: 1px solid #555555'></div>";
        $bgs = scandir(TEMPLATEPATH.'/images/bg/');
        $html .= "<div id='prebgs' style='margin:0 0 10px 0px;float:left;width:290px;max-width:100%;height:200px;overflow:auto;background:#555;padding:5px;position: relative'>";
        foreach($bgs as $file){
            if($file!='.'&&$file!='..') {
                $url = get_template_directory_uri().'/images/bg/'.$file;
                $html .="<div data-url='$url' class='prebg' data-rel='{$id}' style='cursor:pointer;background:#fff url($url) center center;height:30px;width:38px;margin:2px;float:left;'></div>";
            }
        }
        $html .="<div style='clear:both'></div></div><div style='clear:both'></div>";
        $params['value'] = $selected['color'];
        $html .= '<input class="'.$id.' colorpicker" type="text" name="'.$name.'[color]" id="'.$id.'_color" size=10 placeholder="Color" value="'.$selected['color'].'" ><script>jQuery(function(){ preview_cbg("'.$id.'");});</script>';
        return $html;
    }

    public static function DynamicSidebars($params){
        ob_start();
        extract($params);
        // Hook for introducing custom sidebar styles from child theme
        $sidebar_styles = apply_filters("thenext_sidebar_styles", array('default' =>array(
            'style_name' => 'Default',
            'before_widget' => '<div class="widget widget-[#widget_style#]">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-heading widget-title">',
            'after_title' => '</h3>'
        )));
        ?>
        <div class="panel-group" id="custom-sidebars" role="tablist" aria-multiselectable="true">
        <?php
        foreach ($params['value'] as $id => $sidebar) {
            ?>
            <div class="panel panel-default clspd" id="panel_<?php echo $id; ?>">
                <div class="panel-heading" id="csh_<?php echo $id; ?>"> <a data-toggle="collapse" data-parent="#custom-sidebars" href="#cs_<?php echo $id; ?>" aria-expanded="true" aria-controls="cs_<?php echo $id; ?>"><?php echo $sidebar['name']; ?></a></div>
                <div id="cs_<?php echo $id; ?>" data-panel="#panel_<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="csh_<?php echo $id; ?>">
                <div class="panel-body">

                        <div class="form-group">
                            <label>Name:</label>
                            <input class="form-control" type="text" value="<?php echo $sidebar['name']; ?>" name="<?php echo $name; ?>[<?php echo $id; ?>][name]">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="<?php echo $name; ?>[<?php echo $id; ?>][description]"><?php echo $sidebar['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Style:</label>
                            <select class="form-control" type="text" name="<?php echo $name; ?>[<?php echo $id; ?>][style]">
                                <?php foreach ( $sidebar_styles as $style => $prop) { ?>
                                    <option <?php selected($sidebar['style'], $style); ?> value="<?php echo $style; ?>"><?php echo isset($prop['style_name'])?$prop['style_name']:$style; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                </div>
                <div class="panel-footer">
                    <div class="dropdown pull-right">
                        <a id="dLabel" data-target="#" href="#" class="btn btn-danger btn-sm" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                            <i class="tn-trash"></i> Delete Sidebar
                        </a>

                        <div class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="padding: 10px 20px 20px;line-height: 30px;text-align: center">
                            Are you sure?<br/>
                            <button class="btn btn-xs btn-danger btn-delete-sidebar" type="button" rel="#panel_<?php echo $id; ?>">Yes, Delete</button>
                            <button class="btn btn-xs btn-info" type="button">No</button>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Create Name Sidebar ( Widget Area )</div>
            <div class="panel-body">

                    <div class="form-group">
                        <label>Name:</label>
                        <input class="form-control" type="text" name="name" id="sbname">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea  class="form-control" name="desc" id="sbdesc"></textarea>
                    </div>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-sm btn-info" id="create-new-sidebar" type="button"><i class="fa fa-plus-circle"></i> Create New Sidebar</button>
            </div>
        </div>
        <script type="text/thenexttemplate" id="customsidebar" class="hide">
                <div class="panel panel-default">
                    <div class="panel-heading">##name##</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="<?php echo $name; ?>[##sbid##][name]" value="##name##">
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="<?php echo $name; ?>[##sbid##][description]" >##desc##</textarea>
                        </div>
                        <div class="form-group">
                            <label>Style:</label>
                            <select type="text" name="<?php echo $name; ?>[##sbid##][style]">
                                <?php foreach ( $sidebar_styles as $style => $prop) { ?>
                                <option value="<?php echo $style; ?>"><?php echo isset($prop['style_name'])?$prop['style_name']:$style; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
        </script>
        <script type="text/javascript">

            function thenext_fetch_template(template, vars){
                return template.replace(/\#\#([a-z]+)\#\#/igm, function(k, v){
                    return vars[v];
                });
            }

            jQuery(function($){
                var sbc = 0, vars = [];
                $('#create-new-sidebar').on('click', function(){
                    vars['sbid'] = "<?php echo uniqid(); ?>"+sbc;
                    vars['name'] = $('#sbname').val();
                    vars['desc'] = $('#sbdesc').val();
                    var data = $('#customsidebar').html();
                    var cdata = thenext_fetch_template(data, vars);
                    $('#custom-sidebars').append(cdata);
                    sbc++;
                });

                $('#custom-sidebars').on('hidden.bs.collapse', function (res) {
                    $($(res.target).data('panel')).addClass('clspd');
                })

                $('#custom-sidebars').on('shown.bs.collapse', function (res) {
                    $($(res.target).data('panel')).removeClass('clspd');
                })

                $('body').on('click','.btn-delete-sidebar', function(){
                    $($(this).attr('rel')).slideUp(function(){
                        $(this).remove();
                    });
                });


            });
        </script>
        <?php
        $data = ob_get_clean();
        return $data;
    }


    public static function SidebarsDropdown($params){
        extract($params);
        $html = '<select name="'. $name .'" id="'.$id.'">';
        foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
            $html .= '<option value="'.$sidebar["id"].'"'.($selected == $sidebar["id"] ? ' selected="selected"' : '').'>'.ucwords( $sidebar["name"] ).'</option>';
        }
        $html .= '</select>';

        return $html;
    }
    
    public static function NextCustomizer($params){
        extract($params);
        $html = '<select name="'. $name .'" id="'.$id.'">';
        $html .= '<option value="active"'.($selected == "active" ? ' selected="selected"' : '').'>'."Active".'</option>';
        $html .= '<option value="inactive"'.($selected == "inactive" ? ' selected="selected"' : '').'>'."Inactive".'</option>';
        $html .= '</select>';

        return $html;
    }

    public static function LayoutSettings($params){
        $selected = $params['selected'];
        $selected['sidebar_layout'] = isset($selected['sidebar_layout']) ? $selected['sidebar_layout'] : '';
        $selected['left_sidebar'] = isset($selected['left_sidebar']) ? $selected['left_sidebar'] : '';
        $selected['right_sidebar'] = isset($selected['right_sidebar']) ? $selected['right_sidebar'] : '';
        ob_start();
        ?>
        <div class="panel panel-default layout-icons" id="layout-icons">
            <div class="panel-heading">Sidebar Layout</div>
            <div class="panel-body" id="lyi-<?php echo $params['id']; ?>">
                <label class="<?php echo $selected['sidebar_layout'] == "no-sidebar" ? 'active' : ''; ?>" ><input type="radio" style="position: absolute;opacity: 0;" name="<?php echo $params['name']; ?>[sidebar_layout]" value="no-sidebar" <?php checked($selected['sidebar_layout'],"no-sidebar"); ?> >
                    <div class="no-sidebar"></div>
                </label>
                <label class="<?php echo $selected['sidebar_layout'] == "left-sidebar-1" ? 'active' : ''; ?>"><input type="radio" style="position: absolute;opacity: 0;" name="<?php echo $params['name']; ?>[sidebar_layout]" value="left-sidebar-1" <?php checked($selected['sidebar_layout'],"left-sidebar-1"); ?> >
                    <div class="left-sidebar"></div>
                </label>
                <label class="<?php echo $selected['sidebar_layout'] == "right-sidebar-1" ? 'active' : ''; ?>"><input type="radio" style="position: absolute;opacity: 0;" name="<?php echo $params['name']; ?>[sidebar_layout]" value="right-sidebar-1" <?php checked($selected['sidebar_layout'],"right-sidebar-1"); ?> >
                    <div class="right-sidebar"></div>
                </label>
                <label class="<?php echo $selected['sidebar_layout'] == "sidebar-2"?'active' : ''; ?>"><input type="radio" style="position: absolute;opacity: 0;" name="<?php echo $params['name']; ?>[sidebar_layout]" value="sidebar-2" <?php checked($selected['sidebar_layout'],"sidebar-2"); ?> >
                    <div class="sidebar-2"></div>
                </label>
                <label class="<?php echo $selected['sidebar_layout'] == "left-sidebar-2"?'active' : ''; ?>"><input type="radio" style="position: absolute;opacity: 0;" name="<?php echo $params['name']; ?>[sidebar_layout]" value="left-sidebar-2" <?php checked($selected['sidebar_layout'],"left-sidebar-2"); ?> >
                    <div class="left-sidebar-2"></div>
                </label>
                <label class="<?php echo $selected['sidebar_layout'] == "right-sidebar-2" ? 'active' : ''; ?>"><input type="radio" style="position: absolute;opacity: 0;" name="<?php echo $params['name']; ?>[sidebar_layout]" value="right-sidebar-2" <?php checked($selected['sidebar_layout'],"right-sidebar-2"); ?> >
                    <div class="right-sidebar-2"></div>
                </label>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Sidebar Settings</div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">

                        <b>Left Sidebar</b><br/>

                        <?php echo WPEdenOptionFields::SidebarDropdown(array('id' => 'cpl', 'name' => $params['name'].'[left_sidebar]', 'selected' => $selected['left_sidebar'])); ?>
                        <select name="<?php echo $params['name']; ?>[left_sidebar_width]">
                            <option value="">Width:</option>
                            <option value="2" <?php selected(2, isset( $selected['left_sidebar_width'])? $selected['left_sidebar_width'] : '' ) ?>>16.66%</option>
                            <option value="3" <?php selected(3, isset( $selected['left_sidebar_width'])? $selected['left_sidebar_width'] : '' ) ?>>25%</option>
                            <option value="4" <?php selected(4, isset( $selected['left_sidebar_width'])? $selected['left_sidebar_width'] : '' ) ?>>33.33%</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <b>Right Sidebar</b><br/>

                        <?php echo WPEdenOptionFields::SidebarDropdown(array('id' => 'cpl', 'name' => $params['name'].'[right_sidebar]', 'selected' => $selected['right_sidebar'])); ?>
                        <select name="<?php echo $params['name']; ?>[right_sidebar_width]">
                            <option value="">Width:</option>
                            <option value="2" <?php selected(2, isset( $selected['left_sidebar_width'])? $selected['right_sidebar_width'] : '' ) ?>>16.66%</option>
                            <option value="3" <?php selected(3, isset( $selected['left_sidebar_width'])? $selected['right_sidebar_width'] : '' ) ?>>25%</option>
                            <option value="4" <?php selected(4, isset( $selected['left_sidebar_width'])? $selected['right_sidebar_width'] : '' ) ?>>33.33%</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <script>
            jQuery(function ($) {
                $('.ttip').tooltip();

                $('#lyi-<?php echo $params['id']; ?> label').on('click', function(){
                    $('#lyi-<?php echo $params['id']; ?> label').removeClass('active');
                    $(this).addClass('active');
                });

            });
        </script>

        <?php
        $data = ob_get_clean();
        return $data;
    }


} 