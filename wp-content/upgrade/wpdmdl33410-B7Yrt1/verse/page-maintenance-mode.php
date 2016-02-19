<?php
if (!defined('ABSPATH')) exit;
global $post;
$post = get_post(WPEdenThemeEngine::GetOption('offline_page'));
setup_postdata($post);

define('HIDE_PAGE_HEADER', 1);
define('wide_page', 1);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
        <title><?php wp_title('-'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css"/>

        <?php wp_head(); ?>

        <script>
            new WOW().init();
        </script>
        <style>
            body{
                font-family: 'Open Sans';
                background: #333333;
                }
            h1,h2, h3,h4,h5{
                font-family: 'Montserrat';
                }
            #mainframe{
                margin-top: auto;
                margin-bottom: auto;
                }
        </style>
    </head>
    <body <?php body_class('w3eden'); ?>>
        <div id="mainframe" class="framed animated fadeInUp">
            <div class="entry-content container"><br/><br/>

                <div id="countdown-timer" class="text-center">
                    <a class="brand" href="<?php echo home_url('/'); ?>"><?php WPEdenThemeEngine::SiteLogo(); ?></a>
                    <hr/>
                    <h2 class="text-center"><?php echo get_the_title(get_post(WPEdenThemeEngine::GetOption('offline_page'))); ?></h2>
                    <hr/>
                    <br/><br/>
                    <center>
                        <?php
                            $s = get_option('__mmode_time');
                            $e = time() - $s;
                            $p = WPEdenThemeEngine::GetOption('maintenenance_time') * 60;
                            $r = $p - $e;
                            echo WPEdenThemeEngine::NextCountdownTimer(array('time' => $r));
                        ?>
                    </center>
                    <div class="clear"><br/><br/></div>
                    <hr/>
                        <?php
                        $post = get_post(WPEdenThemeEngine::GetOption('offline_page'));
                        setup_postdata($post);
                        the_content();
                        ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <?php wp_footer(); ?>
        <script>
            jQuery(function ($) {
                var mt = parseInt($(window).height() - $('#mainframe').height());
                mt = mt / 2;

                if (mt > 0)
                    $('#mainframe').css('margin-top', mt + 'px');
                $('#mainframe').removeClass('hide').addClass('fadeInUp');
            });
        </script>
    </body>
</html>
