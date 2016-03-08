<?php include_once( WPPB_PLUGIN_DIR.'/admin/assign-operator-access.php' ); ?>

<div class="wrap">
	<h1 id="add-new-user">Assign Operator Access</h1>
	<p>Assign channels per operator group.</p>
	<div id="message" class="updated notice is-dismissible hidden" ><p>Saved Successfully. </p></div>

	<form id="form_operator_access" method="post">
		<table class="form-table">
			<tbody>
				<tr><th scope="row"><label ><h2>Select Operator</h2></label></th></tr>
				<tr class="form-field">
					<th scope="row"><label for="country">Country Group</label></th>
					<td>
						<select name="country" id="country">
							<option value="">- Select country -</option>
							<?php $default_country_array = array_filter(wppb_country_select_options( 'back_end' ));
								foreach( $default_country_array as $iso_country_code => $country_name ):?>
									<option value="<?php echo $iso_country_code;?>"><?php echo $country_name;?></option>
							<?php endforeach;?>
						</select>
					</td>
				</tr>
				<tr class="form-field">
					<th scope="row"><label for="operator_group">Operator Group</label></th>
					<td>
						<select name="operator_group" id="operator_group">
							<option value="">- Select Operator group -</option>
							<?php $operator_group_array = array_filter(custom_get_operator_groups());
							foreach( $operator_group_array as $options => $labels ):?>
								<option value="<?php echo $options;?>"><?php echo $labels;?></option>
							<?php endforeach;?>
						</select>
					</td>
				</tr>
				<tr><th scope="row"><label ><h2>Assign Access</h2></label></th></tr>
				<tr>
					<th scope="row">RTL CBS channel</th>
					<td>
						<?php $rtl_channels = custom_get_rtl_channels();
						$count = 0;
						foreach ($rtl_channels as $key => $value): ?>
							<input type="checkbox" id="channel-access-<?php echo $count;?>" name="channel-access[<?php echo $count++;?>]" value="<?php echo $key;?>"><?php echo $value;?><br>
						<?php endforeach;?>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" class="button button-primary" value="Save">
			<input type="reset" class="button button-default"  value="Cancel">
		</p>
	</form>
</div>

<script>
	jQuery(document).ready(function(){
		/**
		 * Catch form submit event. Then save to database.
		 * @param  {String} event)             
		 */
        jQuery('#form_operator_access').submit(function(event) {
            event.preventDefault();
            var cartnonce = "<?php echo wp_create_nonce('__rtl_assign_operator_access__');?>";
            var form = jQuery(this);
            jQuery.post(
                ajaxurl, 
                {	'action'    : 'process_operator_access',
                    'data'      : form.serialize(),
                    'cartnonce' : cartnonce
                },function(response) {
                    jQuery("#message").removeClass("hidden");
                    jQuery("#message p").text(response);
                }
            );
        });

        /**
         * Catch on change of country and operator group select box.
         */
        jQuery( "#country" ).change(function() {
			var chosenOperatorGroup = jQuery( "#operator_group" ).val();
			if(chosenOperatorGroup == ""){
				jQuery( "#operator_group" ).change(function() {
	        		var form = jQuery("#form_operator_access");
					console.log("operator was chosen 2nd");
					disableChannelCheckbox();
					getMatchingOperatorAccess(form);
				});
			}else {
				var form = jQuery("#form_operator_access");
				console.log("operator was chosen first");
				disableChannelCheckbox();
				getMatchingOperatorAccess(form);	
			}
		});

        /**
         * Display a notification message and disables channel checkbox while processing.
         */
		function disableChannelCheckbox(){
			jQuery("#message").removeClass("hidden");
            jQuery("#message p").text("Checking channels...");
			jQuery("#channel-access-0").prop("disabled",true);
			jQuery("#channel-access-1").prop("disabled",true);
		}

		/**
		 * Enable channel checkbox after ajax data fetching
		 */
		function enableChannelCheckbox(){
			jQuery("#message").addClass("hidden");
			jQuery("#channel-access-0").prop("disabled",false);
			jQuery("#channel-access-1").prop("disabled",false);
		}

		/**
		 * Check for exisiting database entry based on chosen country and operator group.
		 * @param form 	
		 */
		function getMatchingOperatorAccess(form){
        	var cartnonce = "<?php echo wp_create_nonce('__rtl_get_matching_operator_access__');?>";
			jQuery.post( 
						ajaxurl, 
						{
							'action'			: 'get_matching_operator_access',
							'data'      		: form.serialize(),
							'cartnonce' 		: cartnonce
						},
						function( response ) {
							var parsedData = JSON.parse(response);
							var entertainment = parsedData["channel-access[0]"];
							var extreme= parsedData["channel-access[1]"];

							if(entertainment != undefined && entertainment != ''){
								jQuery('#channel-access-0').attr('checked', true);
							}else{
								jQuery('#channel-access-0').attr('checked', false);
							}

							if(extreme != undefined && extreme != ''){
								jQuery('#channel-access-1').attr('checked', true);
							}else{
								jQuery('#channel-access-1').attr('checked', false);
							}
							enableChannelCheckbox();
						}
					);
		}
    });
</script>