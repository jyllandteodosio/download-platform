<?php

class MetaBoxes
{

    private $MetaData;
    private $MetaBoxs;

    function __construct()
    {

        global $post;
        if(! empty($post))
        $this->MetaData = maybe_unserialize(get_post_meta($post->ID, 'wpeden_post_meta', true));
        $this->Actions();

    }

    function Actions()
    {
        add_action('admin_init', array($this, 'LoadMetaBoxes'), 0);
        add_action('save_post', array($this, 'SavePostMeta'), 10, 2);
    }

    function LoadMetaBoxes()
    {
        $this->MetaBoxs = array(
            'wpeden-page-subhp' => array('title' => 'Sub Heading', 'callback' => array($this, 'SubHeading'), 'position' => 'normal', 'priority' => 'core', 'post_type' => 'post'),
            'wpeden-page-subh' => array('title' => 'Sub Heading', 'callback' => array($this, 'SubHeading'), 'position' => 'normal', 'priority' => 'core', 'post_type' => 'page'),
            'wpeden-icons' => array('title' => 'Featured Icon', 'callback' => array($this, 'Icons'), 'position' => 'side', 'priority' => 'core', 'post_type' => 'page'),
            'wpeden-post-settings' => array('title' => 'Post Format Settings', 'callback' => array($this, 'PostFormatSettings'), 'position' => 'normal', 'priority' => 'core', 'post_type' => 'post'),
            'wpeden-page-settings' => array('title' => 'Page Settings', 'callback' => array($this, 'PageSettings'), 'position' => 'normal', 'priority' => 'core', 'post_type' => 'page'),
            'wpeden-wpdmpro-settings' => array('title' => 'Page Settings', 'callback' => array($this, 'PageSettings'), 'position' => 'normal', 'priority' => 'core', 'post_type' => 'wpdmpro'),
            'wpeden-page-css' => array('title' => 'Page CSS', 'callback' => array($this, 'PageCss'), 'position' => 'normal', 'priority' => 'core', 'post_type' => 'page'),
            //'wpeden-megamenu'=>array('title'=>__('Megamenu Settings',"properfect"),'callback'=>'wpeden_meta_box_megamenu_settings','position'=>'side','priority'=>'core','post_type'=>'megamenu')
        );


        $this->MetaBoxs = apply_filters("TheNext_MetaBox", $this->MetaBoxs);

        foreach ($this->MetaBoxs as $ID => $MetaBox) {
            extract($MetaBox);
            add_meta_box($ID, $title, $callback, $post_type, $position, $priority);
        }
    }


    /**
     * @usage Custom page css
     * @param $post
     */
    function PageCss($post)
    {
        if(!is_array($this->MetaData))
            $this->MetaData = maybe_unserialize(get_post_meta($post->ID, 'wpeden_post_meta', true));

        ?>

        <textarea style="font-family: courier;height: 200px;width: 100%;padding: 20px"
                  name="wpeden_post_meta[page_css]"><?php echo isset($this->MetaData['page_css'])?$this->MetaData['page_css']:''; ?></textarea>

    <?php

    }

    /**
     * @usage Custom page sub heading
     * @param $post
     */
    function SubHeading($post)
    {
        if(!is_array($this->MetaData))
            $this->MetaData = maybe_unserialize(get_post_meta($post->ID, 'wpeden_post_meta', true));

        ?>

        <input type="text" style="font-size: 12pt;width: 100%;padding: 10px" name="wpeden_post_meta[sub_heading]" value="<?php echo isset($this->MetaData['sub_heading'])?$this->MetaData['sub_heading']:''; ?>" >

    <?php

    }


    /**
     * @usage Apply Page CSS
     */
    function ApplyPageCss()
    {
        wp_reset_query();

        ?>
        <!-- custom page css -->
        <style>
            <?php echo $this->MetaData['page_css']; ?>
        </style>
        <!-- // custom page css -->
    <?php

    }

    /**
     * @usage Page Icons
     * @param $post
     */
    function Icons($post)
    {

        if(!is_array($this->MetaData))
            $this->MetaData = maybe_unserialize(get_post_meta($post->ID, 'wpeden_post_meta', true));

        $icons = wpeden_all_icons();
        $icon = isset($this->MetaData['icon']) ? $this->MetaData['icon'] : '';

        ?>
            <style>
                .dicon {
                    float: left;
                    width: 16px;
                    height: 16px;
                    text-align: center;
                    line-height: 16px;
                    font-size: 14px;
                    padding: 5px;
                    margin: 5px;
                    display: block;
                    border: 1px solid #dddddd;
                    border-radius: 2px;
                    transition: all 0.3s ease-in-out;
                }

                .dicon:hover {
                    border: 1px solid #1E8CBE;
                    transition: all 0.3s ease-in-out;
                }

                .dicon.active {
                    border: 1px solid #1E8CBE;
                    background: #1E8CBE;
                    color: #ffffff;
                    transition: all 0.3s ease-in-out;
                }
            </style>
            <script>
                jQuery(function ($) {
                    $('.dicon').click(function () {
                        $('.dicon').removeClass('active');
                        $(this).addClass('active');
                    });
                });
            </script>
            <div style="max-height: 200px;overflow: auto">
                <link href="<?php echo get_template_directory_uri() . '/fonts/icons/icons.css'; ?>" rel="stylesheet"
                      type="text/css"/>
                <?php

                echo "<label class='dicon active' title='{$icon}'><input style='display:none;' type=radio name='wpeden_post_meta[icon]' value='{$icon}' checked=checked ><i class='{$icon}'></i></label>";
                foreach ($icons as $class => $title) {
                    if ($class != $icon) echo "<label title='{$title}' class='dicon " . ($class == $icon ? 'active' : '') . "'><input style='display:none;' type=radio name='wpeden_post_meta[icon]' value='{$class}' " . checked($class, $icon, false) . "><i class='{$class}'></i></label>";
                } ?>
                <div style="clear: both;"></div>
            </div>
        <?php

    }

    /**
     * @usage Post format settings
     * @param $post
     */
    function PostFormatSettings($post)
    {
        ?>
        <div class="pfset" id="post-format-link-settings">
            <label for="spro"><b>Link URL</b></label><br/>
            <input type="text" style="width:100%" name="wpeden_post_meta[linkurl]" type="text"
                   value="<?php echo isset($this->MetaData['linkurl']) ? $this->MetaData['linkurl'] : ''; ?>"/><br/>
        </div>
        <div class="pfset" id="post-format-video-settings">
            <label for="spro"><b>Video URL</b></label><br/>
            <input type="text" style="width:100%" id="spro" name="wpeden_post_meta[videourl]" type="text"
                   value="<?php echo isset($this->MetaData['videourl']) ? $this->MetaData['videourl'] : ''; ?>"/><br/>
        </div>
        <script>
            jQuery(function ($) {
                $('#post-formats-select input[type=radio]').click(function () {
                    var id = '#' + this.id + '-settings'
                    $('.pfset').hide();
                    $(id).show();
                });
                $('.pfset').hide();
                $('#post-format-<?php echo get_post_format(); ?>-settings').show();
            });
        </script>
    <?php
    }


    /**
     * @usage Page settings
     * @param $post
     */
    function PageSettings($post)
    {
        if(!is_array($this->MetaData))
            $this->MetaData = maybe_unserialize(get_post_meta($post->ID, 'wpeden_post_meta', true));
        $pagebg = isset($this->MetaData['pagebg'])?$this->MetaData['pagebg']:'';
        $pagelayout = isset($this->MetaData['pagelayout'])?$this->MetaData['pagelayout']:'';
        $nav_header = isset($this->MetaData['nav_header'])?$this->MetaData['nav_header']:'';
        $page_header_style = isset($this->MetaData['page_header_style'])?$this->MetaData['page_header_style']:'';
        $left_sidebar = isset($this->MetaData['left_sidebar'])?$this->MetaData['left_sidebar']:'';
        $left_sidebar_width = isset($this->MetaData['left_sidebar_width'])?$this->MetaData['left_sidebar_width']:'';
        $right_sidebar = isset($this->MetaData['right_sidebar'])?$this->MetaData['right_sidebar']:'';
        $right_sidebar_width = isset($this->MetaData['right_sidebar_width'])?$this->MetaData['right_sidebar_width']:'';
        ?>

        <style>
            hr {
                margin: 10px 0 !important;
            }
            .chzn-container{ width: 150px; }
            #page_header_dd, #nav_header_dd {
                width: 150px;
            }
            .tooltip{
                font-family: 'Open Sans', san-serif;
            }
            .panel-heading{ font-weight: 900; }

            #layout-icons .no-sidebar {
                height: 70px;
                width: 80px;
                border: 1px dashed rgba(0,0,0,0.2);
                margin-left: 10px;
                position: relative;
                display: inline-block;

            }

            #layout-icons .left-sidebar {
                height: 70px;
                width: 60px;
                border: 1px dashed rgba(0,0,0,0.2);
                margin-left: 35px;
                position: relative;
                display: inline-block;

            }
            #layout-icons .left-sidebar:before {
                position: absolute;
                width: 20px;
                height: 70px;
                left: -26px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }
            #layout-icons .right-sidebar {
                height: 70px;
                width: 60px;
                border: 1px dashed rgba(0,0,0,0.2);
                margin-left: 10px;
                margin-right: 25px;
                position: relative;
                display: inline-block;

            }
            #layout-icons .right-sidebar:after {
                position: absolute;
                width: 20px;
                height: 70px;
                right: -26px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }
            #layout-icons .left-sidebar-2 {
                height: 70px;
                width: 40px;
                border: 1px dashed rgba(0,0,0,0.2);
                margin-left: 50px;
                position: relative;
                display: inline-block;

            }
            #layout-icons .left-sidebar-2:before {
                position: absolute;
                width: 15px;
                height: 70px;
                left: -40px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }
            #layout-icons .left-sidebar-2:after {
                position: absolute;
                width: 15px;
                height: 70px;
                left: -21px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }
            #layout-icons .right-sidebar-2 {
                height: 70px;
                width: 40px;
                border: 1px dashed rgba(0,0,0,0.2);
                margin-left: 10px;
                margin-right: 40px;
                position: relative;
                display: inline-block;

            }
            #layout-icons .right-sidebar-2:before {
                position: absolute;
                width: 15px;
                height: 70px;
                right: -40px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }
            #layout-icons .right-sidebar-2:after {
                position: absolute;
                width: 15px;
                height: 70px;
                right: -21px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }
            #layout-icons .sidebar-2 {
                height: 70px;
                width: 40px;
                border: 1px dashed rgba(0,0,0,0.2);
                margin-left: 30px;
                margin-right: 20px;
                position: relative;
                display: inline-block;

            }
            #layout-icons .sidebar-2:before {
                position: absolute;
                width: 15px;
                height: 70px;
                left: -21px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }
            #layout-icons .sidebar-2:after {
                position: absolute;
                width: 15px;
                height: 70px;
                right: -21px;
                margin-top: -1px;
                border: 1px solid #3399ff;
                background:#3399ff;
                content: "";
            }

            #layout-icons label{
                padding: 10px 10px 5px 0;
                border: 1px solid rgba(0,0,0,0.02);
                background: rgba(0,0,0,0.03);
                margin-right: 10px;
                transition: all 0.1s ease-in-out;
            }

            #layout-icons label:hover:not(.active){
                box-shadow: 0 0 2px rgba(0, 0, 0, 0.4);
            }

            #layout-icons label.active{
                border: 1px solid #53cdba;
                box-shadow: 0 0 2px rgba(83, 205, 186, 0.74);
            }


        </style>
        <script>
            jQuery(function ($) {
                $('.ttip').tooltip();

                $('#layout-icons label').on('click', function(){
                    $('#layout-icons label').removeClass('active');
                    $(this).addClass('active');
                });

            });
        </script>
        <div class="w3eden wpeden-theme-options">

            <div class="panel panel-default">
                <div class="panel-heading">Custom Page Background</div>
                <div class="panel-body">
            <?php echo WPEdenOptionFields::CustomBackground(array('id' => 'cpb', 'name' => 'wpeden_post_meta[pagebg]', 'selected' => $pagebg)); ?>
            </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Page Layout & Header Styles</div>
                <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <b>Page Layout Type</b><br/>

                    <?php echo WPEdenOptionFields::LayoutType(array('id' => 'cpl', 'name' => 'wpeden_post_meta[pagelayout]', 'selected' => $pagelayout)); ?>
                </div>
                <div class="col-md-4"><b>Nav Header Style</b><br/>
                    <?php echo WPEdenOptionFields::HeaderStyles(array('id' => 'nav_header_dd', 'name' => 'wpeden_post_meta[nav_header]', 'default' => '', 'selected' => $nav_header)); ?>
                </div>
                <div class="col-md-4">
                    <b>Page Header Style</b><br/>
                    <?php echo WPEdenOptionFields::PageHeaderStyles(array('id' => 'page_header_dd', 'name' => 'wpeden_post_meta[page_header_style]', 'default' => '', 'selected' => $page_header_style)); ?>

                </div>
            </div>
            </div>
            </div>

            <div class="panel panel-default" id="layout-icons">
                <div class="panel-heading">Sidebar Layout</div>
                <div class="panel-body">
                    <label class="<?php echo isset($this->MetaData['sidebar_layout']) && $this->MetaData['sidebar_layout']=="no-sidebar"?'active':''; ?>" ><input type="radio" class="hide" name="wpeden_post_meta[sidebar_layout]" value="no-sidebar">
                        <div class="no-sidebar"></div>
                    </label>
                    <label class="<?php echo isset($this->MetaData['sidebar_layout']) && $this->MetaData['sidebar_layout']=="left-sidebar-1"?'active':''; ?>"><input type="radio" class="hide" name="wpeden_post_meta[sidebar_layout]" value="left-sidebar-1">
                        <div class="left-sidebar"></div>
                    </label>
                    <label class="<?php echo isset($this->MetaData['sidebar_layout']) && $this->MetaData['sidebar_layout']=="right-sidebar-1"?'active':''; ?>"><input type="radio" class="hide" name="wpeden_post_meta[sidebar_layout]" value="right-sidebar-1">
                        <div class="right-sidebar"></div>
                    </label>
                    <label class="<?php echo isset($this->MetaData['sidebar_layout']) && $this->MetaData['sidebar_layout']=="sidebar-2"?'active':''; ?>"><input type="radio" class="hide" name="wpeden_post_meta[sidebar_layout]" value="sidebar-2">
                        <div class="sidebar-2"></div>
                    </label>
                    <label class="<?php echo isset($this->MetaData['sidebar_layout']) && $this->MetaData['sidebar_layout']=="left-sidebar-2"?'active':''; ?>"><input type="radio" class="hide" name="wpeden_post_meta[sidebar_layout]" value="left-sidebar-2">
                        <div class="left-sidebar-2"></div>
                    </label>
                    <label class="<?php echo isset($this->MetaData['sidebar_layout']) && $this->MetaData['sidebar_layout']=="right-sidebar-2"?'active':''; ?>"><input type="radio" class="hide" name="wpeden_post_meta[sidebar_layout]" value="right-sidebar-2">
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

                    <?php echo WPEdenOptionFields::SidebarDropdown(array('id' => 'cpl', 'name' => 'wpeden_post_meta[left_sidebar]', 'selected' => $left_sidebar)); ?>
                    <select name="wpeden_post_meta[left_sidebar_width]">
                        <option value="">Width:</option>
                        <option value="2" <?php selected(2, $left_sidebar_width) ?>>16.66%</option>
                        <option value="3" <?php selected(3, $left_sidebar_width) ?>>25%</option>
                        <option value="4" <?php selected(4, $left_sidebar_width) ?>>33.33%</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <b>Right Sidebar</b><br/>

                    <?php echo WPEdenOptionFields::SidebarDropdown(array('id' => 'cpl', 'name' => 'wpeden_post_meta[right_sidebar]', 'selected' => $right_sidebar)); ?>
                    <select name="wpeden_post_meta[right_sidebar_width]">
                        <option value="">Width:</option>
                        <option value="2" <?php selected(2, $right_sidebar_width) ?>>16.66%</option>
                        <option value="3" <?php selected(3, $right_sidebar_width) ?>>25%</option>
                        <option value="4" <?php selected(4, $right_sidebar_width) ?>>33.33%</option>
                    </select>
                </div>

            </div>
        </div>
        </div>



            </div>
    <?php

    }

    /**
     * @usage Save Post Meta
     * @param $postid
     * @param $post
     */
    function SavePostMeta($postid, $post)
    {
        if (isset($_POST['wpeden_post_meta']) && is_array($_POST['wpeden_post_meta'])) {
            update_post_meta($postid, 'wpeden_post_meta', $_POST['wpeden_post_meta']);
        }
    }


}

new MetaBoxes();
