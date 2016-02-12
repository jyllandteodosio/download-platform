<?php
include_once( WPPB_PLUGIN_DIR.'/front-end/register.php' ); 
echo wppb_front_end_register_handler(array (  ));
?>


<script>
var prefix_password = "rtl_";
	jQuery("#username").keyup(function () {
      var value = jQuery(this).val();
      jQuery("#email").val(value);
      jQuery("#passw1").val(prefix_password+value);
    }).keyup();
</script>