<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class WpmpR_Overview{
    private static $instance;
    private $var,$currency;
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self;
            self::$instance->var = array();
            self::$instance->currency = get_option('_wpmp_curr_sign','$');
            self::$instance->actions();
            
        }
        return self::$instance;
    }
    
    private function actions(){
        $this->calculateStatics();
        // $this->calculateCoupons();
        // $this->overviewDivs();
        $this->mainDivs();
        $this->otherDivs();
    }
    
    private function calculateStatics(){
        global $wpdb;
       /* $wpdb->show_errors();
        //calculate total order count
        $this->var['total_orders'] = 0;
        $sql = "SELECT count(*) FROM `{$wpdb->prefix}ahm_orders` WHERE 1";
        $this->var['total_orders'] = $wpdb->get_var($sql);
        
        //calculate total sale
        $this->var['total_sales'] = 0;
        $sql = "SELECT sum(total) FROM `{$wpdb->prefix}ahm_orders` WHERE payment_status='Completed'";
        $this->var['total_sales'] = $wpdb->get_var($sql);
        
        //calculate total products
        $this->var['total_products'] = 0;
        $sql = "SELECT count(*) FROM `{$wpdb->prefix}posts` WHERE `post_status`='publish' and `post_type`='wpmarketplace'";
        $this->var['total_products'] = $wpdb->get_var($sql);
        
        //calculate total categories
        $this->var['total_categories'] = 0;
        $this->var['total_categories'] = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->term_taxonomy WHERE taxonomy = 'ptype'");
        
        //total user
        $this->var['total_customer'] = 0;
        $sql = "SELECT count(*) FROM `{$wpdb->prefix}users`";
        $this->var['total_customer'] = $wpdb->get_var($sql);
        
        //$wpdb->show_errors();
        //$wpdb->print_error();
        
        //todays
        date_default_timezone_set('UTC');
        $yesterdays = strtotime(date('Y-m-d'));
        $date = date("Y-m-d H:i:s", $yesterdays);
        
        //total orders
        $this->var['total_orders_t'] = 0;
        $sql = "SELECT count(*) FROM `{$wpdb->prefix}ahm_orders` WHERE date>=$yesterdays";
        $this->var['total_orders_t'] = $wpdb->get_var($sql);
        
        //total sale
        $this->var['total_sales_t'] = 0;
        $sql = "SELECT sum(total) FROM `{$wpdb->prefix}ahm_orders` WHERE payment_status='Completed' and date>='$yesterdays'";
        $this->var['total_sales_t'] = $wpdb->get_var($sql);
        
        //new customer
        $this->var['total_customer_t'] = 0;
        $sql = "SELECT count(*) FROM `{$wpdb->prefix}users` WHERE `user_registered` >= '$date'";
        $this->var['total_customer_t'] = $wpdb->get_var($sql);
        */
        
        //check top 5
        
        //top 5 customer
        $this->var['top_customers'] = array();
        // $sql = "SELECT uid, count(*) as cnt, sum(total) as total FROM `{$wpdb->prefix}ahm_orders` group by uid limit 5";
        $sql = "SELECT user_id as uid,count(*) as sum FROM `rtl21016_custom_reports` GROUP BY user_id ORDER BY sum DESC LIMIT 0,5";
        $this->var['top_customers'] = $wpdb->get_results($sql,ARRAY_A);
        
        //top 5 products
        $this->var['top_products'] = array();
        $sql = "SELECT post_id as pid,count(*) as sum FROM `rtl21016_custom_reports` GROUP BY post_id ORDER BY sum DESC LIMIT 0,5";
        $results = $wpdb->get_results($sql,ARRAY_A);
        if($results){
            foreach ($results as $row):
            $this->var['top_products'][$row['pid']] = array(
                'title' => get_the_title($row['pid']),
                'amount' => $row['sum']
            );
            endforeach;
        }
        
        /*
        //top 5 payment method
        // $this->var['top_payment_methods'] = array();
        // $sql = "SELECT `payment_method`,count(*) as cnt, sum(total) as total FROM `{$wpdb->prefix}ahm_orders` group by `payment_method` order by total desc limit 5";
        // $this->var['top_payment_methods'] = $wpdb->get_results($sql,ARRAY_A);
        
        //count order status
        // $this->var['order_status'] = array();
        // $sql = "SELECT `payment_status`,count(*) as cnt, sum(total) as total FROM `{$wpdb->prefix}ahm_orders` group by `payment_status` order by total desc";
        // $this->var['order_status'] = $wpdb->get_results($sql,ARRAY_A);
        */
        
        /////////main div content/////////////////////////
        //$now = date()
        $now = date('Y-m',strtotime('-1 year'));
        $now .= '-01';
        $month = strtotime($now);

        $month = strtotime('next month', $month);

        //by month sql quries
        $this->var['bymonth'] = array();
        for ($i = 1; $i <= 12; $i++) {
            $month_date = date('Y-m-d', $month);

            $month2 = strtotime('next month', $month);
            $month2_date = date('Y-m-d',$month2);
            $sql = "SELECT count(*) FROM `rtl21016_custom_reports` WHERE created_at BETWEEN '".$month_date."' AND '".$month2_date."'";
            $idx = date('M-y',$month);
            $this->var['bymonth'][$idx] = $wpdb->get_var($sql);
            // $wpdb->print_error();
            
            $month = $month2;
        }
        
        //by day sql queries
        $this->var['byDays'] = array();
        $lastMonth = strtotime(date('Y-m-d',strtotime('last month')));
        $lastMonth_date = date('Y-m-d', $lastMonth);
        $tmp = strtotime('+1 day',$lastMonth);
        $today = strtotime(date('Y-m-d'));
        while($tmp<=$today){
            $idx = date('M d',$tmp);
            $this->var['byDays'][$idx] = 0;
            $tmp = strtotime('+1 day', $tmp);
        }

        $now = date('Y-m-d');
        $startTime = strtotime( $lastMonth_date.' 12:00' );
        $endTime = strtotime( $now.' 12:00' );

        for ( $i = $startTime; $i <= $endTime; $i = $i + 86400 ) {
            $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
            $sql = "SELECT created_at,count(*) as total FROM `rtl21016_custom_reports` WHERE created_at >= '".$lastMonth_date."' AND created_at LIKE '".$thisDate."%'";
            $results = $wpdb->get_results($sql, ARRAY_A);
            $wpdb->print_error();
            if($results) {
                foreach ($results as $row):
                    $day = date('M d',strtotime($row['created_at']));
                    $this->var['byDays'][$day] = $row['total'];
                endforeach;
            }
        }
        array_pop($this->var['byDays']);
        
        //by week
        $this->var['byWeeks'] = array();
        $lastWeek = strtotime(date('Y-m-d',strtotime('-1 week')));
        $lastWeek_date = date('Y-m-d', $lastWeek);
        $temp = $lastWeek;
        for($i = 1; $i <= 7; $i++) {
            $idx = date('D', $temp);
            $this->var['byWeeks'][$idx] = 0;
            $temp = strtotime('next day',$temp);
        }
        $now = date('Y-m-d');
        $startTime = strtotime( $lastWeek_date.' 12:00' );
        $endTime = strtotime( $now.' 12:00' );

        for ( $i = $startTime; $i < $endTime; $i = $i + 86400 ) {
            $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
            $sql = "SELECT created_at,count(*) as total FROM `rtl21016_custom_reports` WHERE created_at >= '".$lastMonth_date."' AND created_at LIKE '".$thisDate."%'";
            $results = $wpdb->get_results($sql,ARRAY_A);
            $wpdb->print_error();
            if($results){
                foreach($results as $row):
                    if($row['created_at'] == '') continue;
                    $idx = date('D',strtotime($row['created_at']));
                    $this->var['byWeeks'][$idx] = $row['total'];
                endforeach;
            }
        }
    }
    
    private function calculateCoupons(){
        // global $wpdb;
        // $copuons = array();
        // $this->var['total_coupon_amount'] = 0;
        // $this->var['total_coupon'] = 0;
        // $this->var['total_coupon_amount_t'] = 0;
        // $this->var['total_coupon_t'] = 0;
        // date_default_timezone_set('UTC');
        // $yesterdays = strtotime("-1 days");
        
        
        // //all coupons count
        // $sql = "SELECT `cart_data`,`date` FROM `{$wpdb->prefix}ahm_orders` WHERE 1";
        // $results = $wpdb->get_results($sql,ARRAY_A);
        // //echo "<pre>";
        // if($results) {
        //     foreach($results as $row):
        //         $cart_data = maybe_unserialize($row['cart_data']);
        //             if(is_array($cart_data)):
        //             foreach($cart_data as $pid => $data):
        //                 if(isset($data['coupon']) && trim($data['coupon']) != ''):
        //                     //print_r($data);
        //                     if(isset($data['item']) && is_array($data['item'])) {
        //                         foreach($data['item'] as $key => $item):
        //                             if(isset($copuons[$pid][$data['coupon']])) {
        //                                 $copuons[$pid][$data['coupon']] += $item['coupon_amount'];
        //                                 $this->var['total_coupon_amount'] += $item['coupon_amount'];

        //                                 //today check
        //                                 if(strtotime($row['date']) >= $yesterdays) {
        //                                     $this->var['total_coupon_amount_t'] += $item['coupon_amount'];
        //                                 }
        //                             }
        //                             else {
        //                                 $copuons[$pid][$data['coupon']] = $item['coupon_amount'];
        //                                 $this->var['total_coupon_amount'] += $item['coupon_amount'];
        //                                 $this->var['total_coupon']++;

        //                                 //today check
        //                                 if(strtotime($row['date']) >= $yesterdays) {
        //                                     $this->var['total_coupon_amount_t'] += $item['coupon_amount'];
        //                                     $this->var['total_coupon_t']++;
        //                                 }
        //                             }
        //                         endforeach;
        //                     }
        //                 else {
        //                     if(isset($copuons[$pid][$data['coupon']])) {
        //                         $copuons[$pid][$data['coupon']] += $data['coupon_amount'];
        //                         $this->var['total_coupon_amount'] += $data['coupon_amount'];

        //                         //check for today
        //                         if(strtotime($row['data']) >= $yesterdays){
        //                             $this->var['total_coupon_amount_t'] += $data['coupon_amount'];
        //                         }
        //                     }
        //                     else {
        //                         $copuons[$pid][$data['coupon']] = $data['coupon_amount'];
        //                         $this->var['total_coupon_amount'] += $data['coupon_amount'];
        //                         $this->var['total_coupon']++;

        //                         //check for today
        //                         if(strtotime($row['data']) >= $yesterdays){
        //                             $this->var['total_coupon_amount_t'] += $data['coupon_amount'];
        //                             $this->var['total_coupon_t']++;
        //                         }
        //                     }
        //                 }
        //         endif;
        //     endforeach;
        //             endif;
        // endforeach;
        // }
        
        //echo "</pre>";
        // $this->var['coupons'] = $copuons;
       // echo "<pre>"; print_r($this->var['coupons']); echo "</pre>";
        
    }
    
    private function overviewDivs(){
        ?>
<!--<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Total Orders Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_orders']; ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Total Sales Count</div>
            <div class="panel-body">
                <h4><?php echo $this->currency . number_format($this->var['total_sales'],2,".",""); ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Total Customer Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_customer']; ?></h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Total Products Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_products']; ?></h4>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Total Categories Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_categories']; ?></h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Total Coupons Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_coupon']; ?></h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Total Coupons Amount</div>
            <div class="panel-body">
                <h4><?php echo number_format($this->var['total_coupon_amount'],2,".",""); ?></h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Todays Total Order Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_orders_t']; ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Todays Total Sale</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_sales_t'] !='' ? number_format($this->var['total_sales_t'],2,".","") : '0'; ?></h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Todays New Customer Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_customer_t']; ?></h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Todays Total Coupon Count</div>
            <div class="panel-body">
                <h4><?php echo $this->var['total_coupon_t']; ?></h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Todays Total Coupon Amount</div>
            <div class="panel-body">
                <h4><?php echo number_format($this->var['total_coupon_amount_t'],2,".",""); ?></h4>
            </div>
        </div>
    </div>
    
</div>-->

    <?php
    }
    
    private function mainDivs(){
        
        ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading" id="maindiv_heading">Total Downloaded Files For Last Year</div>
            <div class="panel-body">

                <br class="clearfix">
                <br> <br>
                
                <div id="byMonths" class="graph_main"></div>
                
                <script type="text/javascript">
                /////Graph by Month/////////////
                function byMonths(){
                    var byMonth = [<?php 
                        if(isset($this->var['bymonth'])){
                            $cnt = count($this->var['bymonth']);
                            $i = 1;
                            foreach ($this->var['bymonth'] as $key => $val):
                                if($val == "") $val = 0;
                                //$val = intval($val);
                                echo "['$key',$val]";
                                if($i<$cnt) echo ', ';
                                $i++;
                            endforeach;
                        }
                    ?>];
                    jQuery.jqplot.config.enablePlugins = true;
                       plot1 = jQuery.jqplot("byMonths",[byMonth], {
                            //title:'Sales By Month',
                            animate: true,
                            seriesDefaults:{
                                renderer:jQuery.jqplot.BarRenderer,
                                rendererOptions: {
                                    // Set the varyBarColor option to true to use different colors for each bar.
                                    // The default series colors are used.
                                    varyBarColor: true
                                }
                            },
                            axes:{
                                xaxis:{
                                    renderer: jQuery.jqplot.CategoryAxisRenderer
                                }
                            }
                        });
                }

                    jQuery(function($){
                        $('.change_graph').click(function(){
                            $('.graph_main').hide();
                            var id = $(this).attr('for');
                            $('#'+id).fadeIn();
                            //alert(id);
                            var fn = window[id];
                            // is object a function?
                            if (typeof fn === "function") fn();
                            
                            $(this).parent().parent().find('li.active').removeClass('active');
                            $(this).parent().addClass('active');
                            $('#maindiv_heading').html($(this).html());
                            return false;
                        });
                        
                        byMonths();
                        
                    });
                    
                </script>
                
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading" id="maindiv_heading">Total Downloaded Files For Last Month</div>
            <div class="panel-body">
                
                <br class="clearfix">
                <br> <br>
                
                <div id="byDays" class="graph_main" style=""></div>
                
                <script type="text/javascript">
                /////Graph by Month/////////////

                /////Graph by Days/////////////
                function byDays(){
                    var byDays = [<?php 
                        if(isset($this->var['byDays'])){
                            $cnt = count($this->var['byDays']);
                            $i = 1;
                            foreach ($this->var['byDays'] as $key => $val):
                                if($val == "") $val = 0;
                                //$val = intval($val);
                                echo "['$key',$val]";
                                if($i<$cnt) echo ', ';
                                $i++;
                            endforeach;
                        }
                    ?>];
                    jQuery.jqplot.config.enablePlugins = true;
                    plot2 = jQuery.jqplot("byDays",[byDays], {
                        //title:'Sales By Days',
                        animate: true,
                        seriesDefaults:{
                            //renderer:$.jqplot.BarRenderer,
                            rendererOptions: {
                                // Set the varyBarColor option to true to use different colors for each bar.
                                // The default series colors are used.
                                varyBarColor: true
                            }
                        },
                        axes:{
                            xaxis:{
                                renderer: jQuery.jqplot.CategoryAxisRenderer
                            }
                        }
                    });
                }
                 
                     
                    jQuery(function($){
                        $('.change_graph').click(function(){
                            $('.graph_main').hide();
                            var id = $(this).attr('for');
                            $('#'+id).fadeIn();
                            //alert(id);
                            var fn = window[id];
                            // is object a function?
                            if (typeof fn === "function") fn();
                            
                            $(this).parent().parent().find('li.active').removeClass('active');
                            $(this).parent().addClass('active');
                            $('#maindiv_heading').html($(this).html());
                            return false;
                        });
                        
                        byDays();
                        
                    });
                    
                </script>
                
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading" id="maindiv_heading">Total Downloaded Files For Last Week</div>
            <div class="panel-body">
                
                <br class="clearfix">
                <br> <br>
                
                <div id="byWeeks" class="graph_main" style=""></div>
                
                <script type="text/javascript">
                /////Graph by Month/////////////

                /////Graph by Weeks/////////////
                function byWeeks(){
                    var weeks = [<?php 
                        if(isset($this->var['byWeeks'])){
                            $cnt = count($this->var['byWeeks']);
                            $i = 1;
                            foreach ($this->var['byWeeks'] as $key => $val):
                                if($val == "") $val = 0;
                                //$val = intval($val);
                                echo "['$key',$val]";
                                if($i<$cnt) echo ', ';
                                $i++;
                            endforeach;
                        }
                    ?>];
                    jQuery.jqplot.config.enablePlugins = true;
                    plot2 = jQuery.jqplot("byWeeks",[weeks], {
                        //title:'Sales By Week',
                        animate: true,
                        seriesDefaults:{
                            //renderer:jQuery.jqplot.BarRenderer,
                            rendererOptions: {
                                // Set the varyBarColor option to true to use different colors for each bar.
                                // The default series colors are used.
                                varyBarColor: true
                            }
                        },
                        axes:{
                            xaxis:{
                                renderer: jQuery.jqplot.CategoryAxisRenderer
                            }
                        }
                    });
                }
                 
                     
                    jQuery(function($){
                        $('.change_graph').click(function(){
                            $('.graph_main').hide();
                            var id = $(this).attr('for');
                            $('#'+id).fadeIn();
                            //alert(id);
                            var fn = window[id];
                            // is object a function?
                            if (typeof fn === "function") fn();
                            
                            $(this).parent().parent().find('li.active').removeClass('active');
                            $(this).parent().addClass('active');
                            $('#maindiv_heading').html($(this).html());
                            return false;
                        });
                        
                        byWeeks();
                        
                    });
                    
                </script>
                
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-6 col-md-6">
        <?php $this->topProductsPie(); ?>
    </div>
    <div class="col-md-6 col-sm-12">
        <?php $this->topProducts(); ?>
        <?php //$this->orderStatus(); ?>
    </div>
</div>
        <?php
    }
    
    private function otherDivs(){
        
        ?>
<!--<div class="row">
    <div class="col-md-6 col-sm-12">
        <?php //$this->orderSummary(); ?>
    </div>
    
    <div class="col-md-6 col-sm-12">
        <?php //$this->orderStatus(); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <?php //$this->topProducts(); ?>
    </div>
    
    <div class="col-md-6 col-sm-12">
        <?php //$this->topPaymentMethods(); ?>
    </div>
</div>!-->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <?php //$this->recentOrders(); ?>
        <?php $this->topCustomer(); ?>
    </div>
</div>


<!--<div class="row">
    <div class="col-md-6 col-sm-12">
        <?php //$this->topCustomer(); ?>
    </div>
    
    <div class="col-md-6 col-sm-12">
        <?php //$this->topCoupons(); ?>
    </div>
</div>-->
        <?php
        
        
    }
    
    private function orderSummary(){
        // global $wpdb;
        
        // $yesterday = strtotime(date('Y-m-d',strtotime('-1 day')));
        // $today = strtotime(date('Y-m-d'));
        // $sql = "SELECT count(*) as cnt, sum(total) as total FROM `{$wpdb->prefix}ahm_orders` WHERE `date`>=$yesterday and `date`<$today and `payment_status`='Completed'";
        // $yesterday = $wpdb->get_row($sql,ARRAY_A);
        
        
        // $week = strtotime(date('Y-m-d',strtotime('-1 week')));
        // $sql = "SELECT count(*) as cnt, sum(total) as total FROM `{$wpdb->prefix}ahm_orders` WHERE `date`>=$week and `payment_status`='Completed'";
        // $lastWeek = $wpdb->get_row($sql,ARRAY_A);
        
        // $month = strtotime(date('Y-m-d',  strtotime('-1 month')));
        // $sql = "SELECT count(*) as cnt, sum(total) as total FROM `{$wpdb->prefix}ahm_orders` WHERE `date`>=$week and `payment_status`='Completed'";
        // $lastMonth = $wpdb->get_row($sql,ARRAY_A);
        
        // $year = strtotime(date('Y-m-d',  strtotime('-1 year')));
        // $sql = "SELECT count(*) as cnt, sum(total) as total FROM `{$wpdb->prefix}ahm_orders` WHERE `date`>=$year and `payment_status`='Completed'";
        // $lastYear = $wpdb->get_row($sql,ARRAY_A);
        
        ?>
<!--<div class="panel panel-default">
  <div class="panel-heading">Order Summary</div>
  <div class="panel-body">
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Sales Order</th>
                  <th>Order Count</th>
                  <th>Amount</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Today</td>
                  <td><?php echo $this->var['total_orders_t']; ?></td>
                  <td><?php echo $this->currency . number_format($this->var['total_sales_t'],2,".",""); ?></td>
              </tr>
              <tr>
                  <td>Yesterday</td>
                  <td><?php echo $yesterday['cnt']; ?></td>
                  <td><?php echo $this->currency . number_format($yesterday['total'],2,".",""); ?></td>
              </tr>
              <tr>
                  <td>Week</td>
                  <td><?php echo $lastWeek['cnt']; ?></td>
                  <td><?php echo $this->currency . number_format($lastWeek['total'],2,".",""); ?></td>
              </tr>
              <tr>
                  <td>Month</td>
                  <td><?php echo $lastMonth['cnt']; ?></td>
                  <td><?php echo $this->currency . number_format($lastMonth['total'],2,".",""); ?></td>
              </tr>
              <tr>
                  <td>Year</td>
                  <td><?php echo $lastYear['cnt']; ?></td>
                  <td><?php echo $this->currency . number_format($lastYear['total'],2,".",""); ?></td>
              </tr>
          </tbody>
      </table>
              
  </div>
</div>-->

        <?php
    }
    
    private function orderStatus(){
        
        ?>
<!--<div class="panel panel-default">
  <div class="panel-heading">Sales Order Status
        <div class="Icons">
            <a class="Table active" href="#" cls="table"></a>
            <a class="BarChart" href="#" cls="barchart" fn="order_m_chart"></a>
            <a class="PieChart" href="#" cls="piechart" fn="order_m_pie"></a>
        </div>
  </div>
  <div class="panel-body">
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Order Status</th>
                  <th>Order Count</th>
                  <th>Amount</th>
              </tr>
          </thead>
          <tbody>-->
  <?php
       /* if(!empty($this->var['order_status'])) {
            foreach ($this->var['order_status'] as $row){
                $row['total'] = number_format($row['total'],2,".","");
                echo "<tr><td>{$row['payment_status']}</td><td>{$row['cnt']}</td><td>{$this->currency}{$row['total']}</td></tr>";
            }
        }
        else {
            echo "<tr><td colspan='3'>No record found.</td></tr>";
        }*/

  ?>
          <!--</tbody>
      </table>
      
      <div class="barchart" id="orderBar" style="display:none;"></div>
      <div class="piechart" id="orderPie" style="display:none;"></div>
      -->
<!--<script type="text/javascript">
function order_m_chart(){
    var payment = [<?php 
        if(isset($this->var['order_status'])){
            $cnt = count($this->var['order_status']);
            $i = 1;
            foreach ($this->var['order_status'] as $row):
                echo "['{$row['payment_status']}',{$row['total']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    jQuery.jqplot.config.enablePlugins = true;
       plot1 = jQuery.jqplot("orderBar",[payment], {
            //title:'Sales By MOnth',
            animate: true,
            seriesDefaults:{
                renderer:jQuery.jqplot.BarRenderer,
                rendererOptions: {
                    // Set the varyBarColor option to true to use different colors for each bar.
                    // The default series colors are used.
                    varyBarColor: true
                }
            },
            axes:{
                xaxis:{
                    renderer: jQuery.jqplot.CategoryAxisRenderer
                }
            }
        });
}            

function order_m_pie(){
    var payment = [<?php 
        if(isset($this->var['order_status'])){
            $cnt = count($this->var['order_status']);
            $i = 1;
            foreach ($this->var['order_status'] as $row):
                echo "['{$row['payment_status']}',{$row['total']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    jQuery.jqplot.config.enablePlugins = true;
       plot1 = jQuery.jqplot("orderPie",[payment], {
            //title:'Sales By MOnth',
            animate: true,
            seriesDefaults:{ 
                renderer: jQuery.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true
                }
            },
            legend:{ show:true } 
        });
}


</script>      
  </div>
</div>-->

        <?php
    }

    private function topProducts(){
        
        ?>
<div class="panel panel-default">
    <div class="panel-heading">Top 5 Shows All Time
        <div class="Icons">
            <a class="Table active" href="#" cls="table"></a>
            <!-- <a class="BarChart" href="#" cls="barchart" fn="product_bar_chart"></a>
            <a class="PieChart" href="#" cls="piechart" fn="product_pie_chart"></a> -->
        </div>
    </div>
  <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Show Title</th>
                <th>Number of Downloads</th>
            </tr>
        <tbody>
            
            
      <?php
      if(!empty($this->var['top_products'])){
            $count = 1;
          foreach ($this->var['top_products'] as $pid => $data):
              echo "<tr><td>{$count}</td><td>{$data['title']}</td><td>{$data['amount']}</td></tr>";
              $count++;
          endforeach;
      }
      
      else {
          echo "<tr><td colspan='3'>No product found.</td></tr>";
      }
      ?>
        </tbody>
    </table>
      <div class="barchart" style="display: none;" id="product_bar_chart1"></div>
      <!-- <div class="piechart" style="display: none;" id="product_pie_chart1"><script type="text/javascript">product_pie_chart();</script></div> -->
      
<script type="text/javascript">
function product_pie_chart(){
    console.log('pie');
    var topProd = [<?php 
        if(isset($this->var['top_products'])){
            $cnt = count($this->var['top_products']);
            $i = 1;
            foreach ($this->var['top_products'] as $key => $val):
                if($val == "") $val = 0;
                //$val = intval($val);
                echo "['{$val['title']}',{$val['amount']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    //jQuery.jqplot.config.enablePlugins = true;
    plot2 = jQuery.jqplot("product_pie_chart1",[topProd], {
        title:'Top 5 Shows All Time',
        animate: true,
        seriesDefaults:{ 
            renderer: jQuery.jqplot.PieRenderer,
            rendererOptions: {
                showDataLabels: true
            }
        },
        legend:{ show:true } 
    });
}

function product_bar_chart(){
    // var topProd = [<?php 
    //     if(isset($this->var['top_products'])){
    //         $cnt = count($this->var['top_products']);
    //         $i = 1;
    //         foreach ($this->var['top_products'] as $key => $val):
    //             if($val == "") $val = 0;
    //             //$val = intval($val);
    //             echo "['{$val['title']}',{$val['amount']}]";
    //             if($i<$cnt) echo ', ';
    //             $i++;
    //         endforeach;
    //     }
    // ?>];
    // //jQuery.jqplot.config.enablePlugins = true;
    // jQuery.jqplot.config.enablePlugins = true;
    //    plot1 = jQuery.jqplot("product_bar_chart1",[topProd], {
    //         title:'Top 5 Shows All Time',
    //         animate: true,
    //         seriesDefaults:{
    //             renderer:jQuery.jqplot.BarRenderer,
    //             rendererOptions: {
    //                 // Set the varyBarColor option to true to use different colors for each bar.
    //                 // The default series colors are used.
    //                 varyBarColor: true
    //             }
    //         },
    //         axes:{
    //             xaxis:{
    //                 renderer: jQuery.jqplot.CategoryAxisRenderer
    //             }
    //         }
    //     });
}
</script>      
  </div>
</div>

        <?php
    }
    

    private function topProductsPie(){?>
        <div class="panel panel-default">
            <div class="panel-heading">Top 5 Shows All Time
                <div class="Icons">
                    <a class="PieChart active" href="#" cls="piechart" fn="product_pie_chart"></a>
                </div>
            </div>
          <div class="panel-body">
              <div class="piechart"  id="product_pie_chart1" fn="product_pie_chart"></div>
          </div>
        </div>

        <script type="text/javascript">
function product_pie_chart(){
    console.log('pie');
    var topProd = [<?php 
        if(isset($this->var['top_products'])){
            $cnt = count($this->var['top_products']);
            $i = 1;
            foreach ($this->var['top_products'] as $key => $val):
                if($val == "") $val = 0;
                //$val = intval($val);
                echo "['{$val['title']}',{$val['amount']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    //jQuery.jqplot.config.enablePlugins = true;
    plot2 = jQuery.jqplot("product_pie_chart1",[topProd], {
        title:'Top 5 Shows All Time',
        animate: true,
        seriesDefaults:{ 
            renderer: jQuery.jqplot.PieRenderer,
            rendererOptions: {
                showDataLabels: true
            }
        },
        legend:{ show:true } 
    });
}
product_pie_chart();
</script>

        <?php
    }
    


    private function topCustomer(){
        
        ?>
<div class="panel panel-default">
  <div class="panel-heading">Top 5 Most Active Operator Accounts All Time
    <div class="Icons">
      <a class="Table active" href="#" cls="table"></a>
      <!-- <a class="BarChart" href="#" cls="barchart" fn="customer_m_chart"></a>
      <a class="PieChart" href="#" cls="piechart" fn="customer_m_pie"></a> -->
    </div>
  </div>
  <div class="panel-body">
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th></th>
                  <th>Operator Account</th>
                  <th>Number of Downloads</th>
              </tr>
          </thead>
          <tbody>
          <?php
                $forChart = array();
                if($this->var['top_customers']):
                    $count = 1;
                    foreach ($this->var['top_customers'] as $row):
                        $email = get_user_info($row['uid']);
                        echo "<tr><td>{$count}</td><td>{$email}</td><td>{$row['sum']}</td></tr>";
                        $count++;
                    endforeach;
                else:
                    echo "<tr><td colspan='3'>No user found.</td></tr>";
                endif;    
          ?>
          </tbody>
      </table>
      
      <div class="barchart" id="customerBar" style="display: none;"></div>
      <div class="piechart" id="customerPie" style="display: none;"></div>
      
<script type="text/javascript">
function customer_m_chart(){
    // var payment = [<?php 
    //     if(!empty($forChart)){
    //         $cnt = count($forChart);
    //         $i = 1;
    //         foreach ($forChart as $key => $row):
    //             echo "['{$row['name']}',{$row['total']}]";
    //             if($i<$cnt) echo ', ';
    //             $i++;
    //         endforeach;
    //     }
    // ?>];
    // jQuery.jqplot.config.enablePlugins = true;
    //    plot1 = jQuery.jqplot("customerBar",[payment], {
    //         //title:'Sales By MOnth',
    //         animate: true,
    //         seriesDefaults:{
    //             renderer:jQuery.jqplot.BarRenderer,
    //             rendererOptions: {
    //                 // Set the varyBarColor option to true to use different colors for each bar.
    //                 // The default series colors are used.
    //                 varyBarColor: true
    //             }
    //         },
    //         axes:{
    //             xaxis:{
    //                 renderer: jQuery.jqplot.CategoryAxisRenderer
    //             }
    //         }
    //     });
}            

function customer_m_pie(){
    // var payment = [<?php 
    //     if(!empty($forChart)){
    //         $cnt = count($forChart);
    //         $i = 1;
    //         foreach ($forChart as $key => $row):
    //             echo "['{$row['name']}',{$row['total']}]";
    //             if($i<$cnt) echo ', ';
    //             $i++;
    //         endforeach;
    //     }
    // ?>];
    // jQuery.jqplot.config.enablePlugins = true;
    //    plot1 = jQuery.jqplot("customerPie",[payment], {
    //         //title:'Sales By MOnth',
    //         animate: true,
    //         seriesDefaults:{ 
    //             renderer: jQuery.jqplot.PieRenderer,
    //             rendererOptions: {
    //                 showDataLabels: true
    //             }
    //         },
    //         legend:{ show:true } 
    //     });
}

</script>       
      
  </div>
</div>

        <?php
    }
    
    private function topCoupons(){
        // $cnt = 0;
        // $temp = array();
        // $forChart = array();
        // if(!empty($this->var['coupons'])):
        //     foreach($this->var['coupons'] as $key => $coupon):
        //         foreach ($coupon as $a => $b):
        //             if(is_numeric($b))
        //                 $temp[$b][] = $a;
        //         endforeach;
        //     endforeach;
        // endif;
        
        ?>
<!--<div class="panel panel-default">
  <div class="panel-heading">Top 5 Coupons
        <div class="Icons">
            <a class="Table active" href="#" cls="table"></a>
            <a class="BarChart" href="#" cls="barchart" fn="coupon_m_chart"></a>
            <a class="PieChart" href="#" cls="piechart" fn="coupon_m_pie"></a>
        </div>
  </div>
  <div class="panel-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Coupon Code</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
                    -->
        <?php 
        // if(!empty($temp)):
        //     foreach($temp as $price => $coupons):
        //             foreach ($coupons as $key => $c):
        //                 $price = number_format($price,2,".","");
        //                 echo "<tr><td>$c</td><td>". $this->currency ."$price</td></tr>";
        //                 $forChart[] = array('coupon'=>$c, 'amount'=>$price);
        //                 $cnt++;
        //                 if($cnt==5) break;
        //             endforeach;

        //     endforeach;
        // else:
        //     echo "<tr><td colspan='2'>No Coupons found...</td></tr>";
        // endif;
        //print_r($forChart);
        ?>
       <!-- </tbody>
    </table>
      
      <div class="barchart" id="couponChart" style="display:none"></div>
      <div class="piechart" id="couponPie" style="display:none"></div>
      
<script type="text/javascript">
function coupon_m_chart(){
    var payment = [<?php 
        if(!empty($forChart)){
            $cnt = count($forChart);
            $i = 1;
            foreach ($forChart as $key => $row):
                echo "['{$row['coupon']}',{$row['amount']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    jQuery.jqplot.config.enablePlugins = true;
       plot1 = jQuery.jqplot("couponChart",[payment], {
            //title:'Sales By MOnth',
            animate: true,
            seriesDefaults:{
                renderer:jQuery.jqplot.BarRenderer,
                rendererOptions: {
                    // Set the varyBarColor option to true to use different colors for each bar.
                    // The default series colors are used.
                    varyBarColor: true
                }
            },
            axes:{
                xaxis:{
                    renderer: jQuery.jqplot.CategoryAxisRenderer
                }
            }
        });
}            

function coupon_m_pie(){
    var payment = [<?php 
        if(!empty($forChart)){
            $cnt = count($forChart);
            $i = 1;
            foreach ($forChart as $key => $row):
                echo "['{$row['coupon']}',{$row['amount']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    jQuery.jqplot.config.enablePlugins = true;
       plot1 = jQuery.jqplot("couponPie",[payment], {
            //title:'Sales By MOnth',
            animate: true,
            seriesDefaults:{ 
                renderer: jQuery.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true
                }
            },
            legend:{ show:true } 
        });
}

</script>                    
  </div>
</div>-->

        <?php
    }
    
    private function topPaymentMethods(){
        
        ?>
<!--<div class="panel panel-default">
  <div class="panel-heading">Top 5 Payment Methods
        <div class="Icons">
            <a class="Table active" href="#" cls="table"></a>
            <a class="BarChart" href="#" cls="barchart" fn="payment_m_chart"></a>
            <a class="PieChart" href="#" cls="piechart" fn="payment_m_pie"></a>
        </div>
  </div>
  <div class="panel-body">
    <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Payment Method</th>
                  <th>Order Count</th>
                  <th>Amount</th>
              </tr>
          </thead>
          <tbody>-->
  <?php
        // if(!empty($this->var['top_payment_methods'])) {
        //     foreach ($this->var['top_payment_methods'] as $row){
        //         $row['total'] = number_format($row['total'],2,".","");
        //         echo "<tr><td>{$row['payment_method']}</td><td>{$row['cnt']}</td><td>{$this->currency}{$row['total']}</td></tr>";
        //     }
        // }
        // else {
        //     echo "<tr><td colspan='3'>No record found.</td></tr>";
        // }

  ?>
          <!--</tbody>
      </table>
      
      <div class="barchart" id="paymentBar" style="display:none;"></div>
      <div class="piechart" id="paymentPie" style="display:none;"></div>
      
<script type="text/javascript">
function payment_m_chart(){
    var payment = [<?php 
        if(isset($this->var['top_payment_methods'])){
            $cnt = count($this->var['top_payment_methods']);
            $i = 1;
            foreach ($this->var['top_payment_methods'] as $row):
                echo "['{$row['payment_method']}',{$row['total']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    jQuery.jqplot.config.enablePlugins = true;
       plot1 = jQuery.jqplot("paymentBar",[payment], {
            //title:'Sales By MOnth',
            animate: true,
            seriesDefaults:{
                renderer:jQuery.jqplot.BarRenderer,
                rendererOptions: {
                    // Set the varyBarColor option to true to use different colors for each bar.
                    // The default series colors are used.
                    varyBarColor: true
                }
            },
            axes:{
                xaxis:{
                    renderer: jQuery.jqplot.CategoryAxisRenderer
                }
            }
        });
}            

function payment_m_pie(){
    var payment = [<?php 
        if(isset($this->var['top_payment_methods'])){
            $cnt = count($this->var['top_payment_methods']);
            $i = 1;
            foreach ($this->var['top_payment_methods'] as $row):
                
                echo "['{$row['payment_method']}',{$row['total']}]";
                if($i<$cnt) echo ', ';
                $i++;
            endforeach;
        }
    ?>];
    jQuery.jqplot.config.enablePlugins = true;
       plot1 = jQuery.jqplot("paymentPie",[payment], {
            //title:'Sales By MOnth',
            animate: true,
            seriesDefaults:{ 
                renderer: jQuery.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true
                }
            },
            legend:{ show:true } 
        });
}


</script>
  </div>
</div>
-->
        <?php
    }
    
    private function recentOrders(){
        // global $wpdb;
        // $sql = "SELECT order_id,`date`,total,uid,`order_status`,`payment_status` FROM `{$wpdb->prefix}ahm_orders` where order_status='Completed'  ORDER BY `date` desc LIMIT 5";
        // $results = $wpdb->get_results($sql,ARRAY_A);
    ?>
<!--<div class="panel panel-primary">
  <div class="panel-heading">Recent 5 Orders</div>
  <div class="panel-body">
      <?php //echo "<pre>"; print_r($results); echo "</pre>"; ?>
      <div class="table-responsive">
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Billing Email</th>
                  <th>First Name</th>
                  <th>Item Count</th>
                  <th>Total</th>
                  <th>Order Status</th>
                  <th>Payment Status</th>
              </tr>
          </thead>
          <tbody>
          <?php
                // if($results):
                //     foreach ($results as $row):
                //         //$billing = maybe_unserialize($row['billing_shipping_data']);
                //         $user_info = get_userdata($row['uid']);
                //         $fname =  $user_info->last_name;
                //         $email = $user_info->user_email;
                //         $cart_data = maybe_unserialize($row['cart_data']);
                //         $cnt = count($cart_data);
                //         unset($cart_data);
                //         $date = date('Y-m-d H:i:s',$row['date']);
                //         $row['total'] = number_format($row['total'],2,".","");
                //         echo "<tr>
                //             <td>{$row['order_id']}</td>
                //             <td>$date</td>
                //             <td>$email</td>
                //             <td>$fname</td>
                //             <td>$cnt</td>
                //             <td>{$row['total']}</td>
                //             <td>{$row['order_status']}</td>
                //             <td>{$row['payment_status']}</td>
                //                 </tr>
                //             ";
                        
                        
                //     endforeach;
                // else:
                //     echo "<tr><td colspan='8'>No order found.</td></tr>";
                // endif;
          ?>
          </tbody>
      </table>
      </div>
              
  </div>
</div>
-->
        <?php
    }
}

