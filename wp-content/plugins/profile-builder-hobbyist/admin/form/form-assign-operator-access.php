<?php
include_once( WPPB_PLUGIN_DIR.'/admin/assign-operator-access.php' ); 
?>

<h1>Assign Operator Access</h1>

<form id="form_operator_access" method="post">
	<!--Country List-->
	<h2>Select Operator</h2>
	Country Group
	<select name="country">
		<option value="">-----Select country-----</option>
		<?php $default_country_array = array_filter(wppb_country_select_options( 'back_end' ));
		foreach( $default_country_array as $iso_country_code => $country_name ):?>
			<option value="<?php echo $iso_country_code;?>"><?php echo $country_name;?></option>
		<?php endforeach;?>
	</select>
	<br>
	<!--Operator Group-->
	Operator Group
	<select name="operator_group">
		<option value="">-----Select Operator group-----</option>
		<?php $operator_group_array = array_filter(custom_get_operator_groups());
		foreach( $operator_group_array as $options => $labels ):?>
			<option value="<?php echo $options;?>"><?php echo $labels;?></option>
		<?php endforeach;?>
	</select>
	<br><br>
	
	<h2>Assign Access</h2>
	RTL CBS channel <br>
	<?php 
	$rtl_channels = custom_get_rtl_channels();
	foreach ($rtl_channels as $key => $value): ?>
		<input type="checkbox" name="channel-access[]" value="<?php echo $key;?>"><?php echo $value;?><br>
	<?php endforeach;?>
	<br><br>

	<input type="submit" value="Save">
	<input type="reset" value="Cancel">
</form>


<script>
	jQuery(document).ready(function(){
		var cartnonce = "<?php echo wp_create_nonce('__rtl_assign_operator_access__');?>";

        jQuery('#form_operator_access').submit(function(event) {
            event.preventDefault();
            var form = jQuery(this);
            console.log(form.serialize());
            jQuery.post(
                ajaxurl, 
                {
                	'action'    : 'process_operator_access',
                    'data'      : form.serialize(),
                    'cartnonce' : cartnonce
                },function(response) {
                    console.log('the response:');
                    console.log(response);
                }
            );
        });

    });
</script>