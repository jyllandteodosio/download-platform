<?php get_header();
$pack['ID'] = get_the_ID();
$pack['post_title'] = get_the_title();
$pack['post_content'] = get_the_content();
$pack['post_excerpt'] = get_the_excerpt();
$pack = wpdm_setup_package_data($pack);
$sidebarw = WPEdenThemeEngine::GetOption('sitebar_width',3);
$bodyw = 12-$sidebarw;

$_wpdm_hide_all = get_option('_wpdm_hide_all', 0);


?>

<div class="container">
<?php if(wpdm_user_has_access(get_the_ID()) || !$_wpdm_hide_all){ ?>

<div class="row">
<div class="col-md-<?php echo $bodyw; ?>">
<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>         
<?php 

while(have_posts()): the_post(); ?>
 
<div  <?php post_class('post'); ?>>

<div class="clear"></div>


    <?php wpeden_post_thumb(array(900,0), true, array('class'=>'thumbnail')); ?>
    <?php
    $previews = get_post_meta(get_the_ID(),'__wpdm_additional_previews', true);
     if(is_array($previews)&&count($previews)>0){ ?>
    <div class="well">
        <div class="pull-left more-previews">
            <?php
                foreach($previews as $preview){
                    echo "<a class='more_previews_a wpdm-lightbox' href='{$preview}'><img src='".wpdm_dynamic_thumb($preview, array(40,40))."' /></a> ";
                }
            ?>
            <div class="clear"></div>
        </div>

        <div class="clear"></div>
    </div>
    <?php } ?>

<div class="entry-content">
    <div class="btn-group btn-block visible-xs">
        <?php if( function_exists('wpdm_acf') && ( $demourl = wpdm_acf(get_the_ID(),'Demo/demourl') ) !=''){ ?>
            <a class="btn col-xs-6 btn-info" target="_blank" href="http://scripteden.com/demo/?preview=<?php echo get_the_ID(); ?>"><i class="fa fa-desktop" style="margin-right: 10px;"></i> Live Preview</a>
        <?php } ?>
        <?php if(!isset($pack['base_price'])||$pack['base_price']==0){ ?>
                <?php echo str_replace(array("[btnclass]","<i class=''></i>"),array("btn btn-inverse col-xs-6",'<i class="fa fa-download" style="margin-right: 10px;"></i>'),$pack['download_link']); ?>
        <?php } ?>

    </div>
    <span itemprop="description">
    <?php echo $pack['description']; ?>
    </span>
    <hr/>
    <h3 class="widget-heading widget-title">Attached Files</h3>
    <?php echo \WPDM\libs\FileList::Table($pack); ?>



</div>


<?php wp_link_pages( ); ?>





</div>
 <div class="mx_comments"> 
<?php comments_template(); ?>
</div>
<?php endwhile; ?>
</div>
</div>
<div class="col-md-<?php echo $sidebarw;?>">
<div class="sidebar">
    <?php if( function_exists('wpdm_acf') && ( $demourl = wpdm_acf(get_the_ID(),'Demo/demourl') ) !=''){ ?>
    <a class="btn btn-lg btn-block btn-info" target="_blank" href="http://scripteden.com/demo/?preview=<?php echo get_the_ID(); ?>"><i class="fa fa-desktop" style="margin-right: 10px;"></i>Live Preview</a><Br/>
    <?php } ?>
    <?php if(isset($pack['base_price'])&&$pack['base_price']>0){ ?>
        <div class="widget widget-theme">
            <h3 class="widget-heading widget-title"><?php _e("Purchase","wpdmtheme"); ?></h3>
            <div class="widget-body-wpdm">
                <?php echo str_replace("btn-primary","flat-primary btn-flat",$pack['download_link']); ?>
            </div>
        </div>
    <?php } ?>
    <div class="widget widget-theme">
    <h3 class="widget-heading widget-title"><?php _e('Package Info','thenext'); ?></h3>
        <div class="widget-body-wpdm wpdm-package-info">


            <?php
            $sns = array(
                'version'=>'Version',
                'file_size'=>'File Size',
                //'view_count'=>'View Count',
                'download_count'=>'Download Count',
                'create_date'=>'Create Date',
                'update_date'=>'Update Date'

            );
            $ico = array(
                'version'=>'align-justify',
                'file_size'=>'harddrive',
                'view_count'=>'eye',
                'download_count'=>'download',
                'create_date'=>'calendar',
                'update_date'=>'alarm-clock'

            );
            $pinfo = WPEdenThemeEngine::GetOption("package_info", array());
            $pack['create_date'] = get_the_date();
            $pack['update_date'] = get_the_modified_date();
            foreach($sns as $info => $label){
            ?>
                <div class="media">
                    <div class="pull-left">
                        <i class="tn-<?php echo $ico[$info]; ?>"></i>
                    </div>
                    <div class="media-body">
                        <h4><?php echo $label; ?></h4>
                        <?php echo $pack[$info]; ?>
                    </div>
                </div>
            <?php } ?>


        <?php if(!isset($pack['base_price'])||$pack['base_price']==0){ ?>
        <div class="text-center">
            <?php echo str_replace(array("[btnclass]", "btn-success","<i class=''></i>"),array("btn btn-inverse btn-lg btn-block","btn btn-inverse btn-lg btn-block",'<i class="fa fa-download" style="margin-right: 10px;"></i>'),$pack['download_link']); ?>
        </div>
        <?php } ?>
        </div>
    </div>

    <div class="widget widget-theme">
        <h3 class="widget-heading widget-title"><?php _e('Share','thenext'); ?></h3>
        <div class="widget-body share">
            <a target="_blank" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink(get_the_ID()));?>" class="btn btn-primary"><i class="fa fa-facebook white"></i></a>
            <a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink(get_the_ID()));?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn btn-danger"><i class="fa fa-google-plus white"></i></a>
            <a href="https://twitter.com/intent/tweet?text=<?php urlencode(the_title()); ?>&url=<?php echo urlencode(get_permalink(get_the_ID()));?>"  class="btn btn-primary"><i class="fa fa-twitter white"></i></a>
            <a href="http://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink(get_the_ID()));?>&text=<?php urlencode(the_title()); ?>&media=<?php echo urlencode(wpeden_post_thumb_url(array(900,0)));?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn btn-danger"><i class="fa fa-pinterest white"></i></a>
           <div class="clear"></div>
        </div>
    </div>

    <div class="widget widget-theme">
        <h3 class="widget-heading widget-title"><?php _e('Author','thenext'); ?></h3>

        <div class="media widget-body">
            <div class="pull-left">
                <a href="<?php  echo function_exists('bp_core_get_user_domain')?bp_core_get_user_domain( get_the_author_meta('ID') ):'#'; ?>"><?php echo get_avatar( get_the_author_meta('ID'), 60 ); ?></a>
            </div>
            <div class="media-body">
             <h3 class="media-heading"><?php echo ucwords(get_the_author_meta('display_name')); ?></h3>
             <?php if(function_exists('bp_core_get_user_domain')){ ?>
             <a class="btn btn-xs flat-success" href="<?php echo bp_core_get_user_domain( get_the_author_meta('ID') ); ?>"><i class="fa fa-desktop"></i> &nbsp; <?php _e('Profile','thenext'); ?></a>
             <?php } ?>
            </div>
        </div>

        </div>


    <div class="wid">

        <?php $ppost = get_previous_post(); $npost = get_next_post(); ?>

        <?php if(is_object($ppost)){ ?>
        <a class="btn btn-flat flat-warning" style="width: 48%" href="<?php echo get_permalink($ppost->ID); ?>"><i class="fa fa-long-arrow-left"></i> <?php _e('Previous','thenext');?></a>
        <?php } if(is_object($npost)){ ?>
        <a class="btn btn-flat flat-inverse pull-right" style="width: 48%" href="<?php echo get_permalink($npost->ID); ?>"><?php _e('Next','thenext');?> <i class="fa fa-long-arrow-right"></i></a>
        <?php } ?>

        <div class="clear"></div>
    </div>




<br/>
<?php dynamic_sidebar('Single Package '); ?>
</div>
</div>
</div>

<?php } else { ?>

<div class="row">
    <div class="col-md-12">
        <?php echo stripslashes(get_option('wpdm_permission_msg')); ?>
    </div>
</div>

<?php }  ?>

</div>


<style>
    .white{
        color: #ffffff !important;
    }
</style>
<?php get_footer(); ?>
