<?php
global $current_user, $wpdb;
?><div class="row">
    <div class="col-md-4">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading"><?php _e('User Level','wpdmpro'); ?></div>
            <div class="panel-body">
                <h3><?php
                    $val = get_option( 'wp_user_roles' );
                    $level = $val[$current_user->roles[0]]['name'];
                    echo apply_filters("wpdm_udb_user_level",$level); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading"><?php _e('Total Downloads','wpdmpro'); ?></div>
            <div class="panel-body">
                <h3><?php echo number_format($wpdb->get_var("select count(*) from {$wpdb->prefix}ahm_download_stats where uid = '{$current_user->ID}'"),0,'.',','); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default dashboard-panel">
            <div class="panel-heading"><?php _e("Today's Download",'wpdmpro'); ?></div>
            <div class="panel-body">
                <h3><?php echo number_format($wpdb->get_var("select count(*) from {$wpdb->prefix}ahm_download_stats where uid = '{$current_user->ID}' and `year` = YEAR(CURDATE()) and `month` = MONTH(CURDATE()) and `day` = DAY(CURDATE())"),0,'.',','); ?></h3>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default dashboard-panel">
    <div class="panel-heading"><?php _e('Recommended Downloads','wpdmpro'); ?></div>
    <div class="panel-body">
        <div class="panel-row">
            <?php
            $q = new WP_Query(array(
                'post_type' => 'wpdmpro',
                'posts_per_page' => 3,
                'orderby' => 'rand',
                'meta_query' => array()
            ));
            while($q->have_posts()){ $q->the_post();
                ?>
                <div class="col-md-4">
                    <div class="card">


                        <?php wpdm_post_thumb(array(400, 300)); ?>
                        <a href="<?php the_permalink(); ?>" class="card-footer">
                            <?php the_title(); ?>
                        </a>
                    </div>
                </div>

                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<div class="panel panel-default dashboard-panel">
    <div class="panel-heading"><?php _e('Last 5 Downloads','wpdmpro'); ?></div>
    <table class="table">
        <thead>
        <tr>
            <th><?php _e('Package Name','wpdmpro'); ?></th>
            <th><?php _e('Download Time','wpdmpro'); ?></th>
            <th><?php _e('IP','wpdmpro'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $res = $wpdb->get_results("select p.post_title,s.* from {$wpdb->prefix}posts p, {$wpdb->prefix}ahm_download_stats s where s.uid = '{$current_user->ID}' and s.pid = p.ID order by `timestamp` desc limit 0,5");
        foreach($res as $stat){
            ?>
            <tr>
                <td><a href="<?php echo get_permalink($stat->pid); ?>"><?php echo $stat->post_title; ?></a></td>
                <td><?php echo date(get_option('date_format')." H:i",$stat->timestamp); ?></td>
                <td><?php echo $stat->ip; ?></td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
