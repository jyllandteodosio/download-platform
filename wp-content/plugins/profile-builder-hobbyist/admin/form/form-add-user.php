<div class="wrap">
  <h1 id="add-new-user">Add New Operator User</h1>

  <?php
  include_once( WPPB_PLUGIN_DIR.'/front-end/register.php' ); 
  echo wppb_front_end_register_handler(array (  ));
  ?>
</div>


<script>
	var prefix_password = "";
	
    jQuery("#email").keyup(function () {
      var value = jQuery(this).val();
      jQuery("#username").val(value);
      jQuery("#passw1").val(prefix_password+value);
    }).keyup();

    jQuery("#username").keyup(function () {
      var value = jQuery(this).val();
      jQuery("#passw1").val(prefix_password+value);
    }).keyup();
</script>