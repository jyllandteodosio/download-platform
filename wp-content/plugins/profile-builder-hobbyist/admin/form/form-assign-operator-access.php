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
							<?php $default_country_array = array_filter(custom_get_country_groups());
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
					<th scope="row">Blue Ant Media channel</th>
					<td>
						<?php $rtl_channels = custom_get_rtl_channels();
						$count = 0;
						foreach ($rtl_channels as $key => $value): ?>
							<input type="checkbox" id="channel-access-<?php echo $count;?>" name="channel-access[<?php echo $count++;?>]" value="<?php echo $key;?>"><?php echo $value;?><br>
						<?php endforeach;?>
					</td>
				</tr>
				<tr>
					<th scope="row">Capabilities</th>
					<td>
						<input type="checkbox" id="pr-group" name="pr-group" value="yes">No operator group restriction (e.g. PR Agencies)<br>
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

<table class="form_operator_access_table wp-list-table striped widefat">
		<thead>
		<tr>
			<th>Country Group</th>
			<th>Operator Group</th>
			<th>Blue Ant Media Channel</th>
			<th>No operator group restriction</th>
		</tr>
		</thead>

		<tbody id="the-list">
		
		
		<?php
		$operator_access = get_all_operator_access();

		if(isset($operator_access) && !empty($operator_access)):
			foreach ($operator_access as $key => $value):
		?>
		<tr>
			<td><?php echo $value['country_group'] != '' ? get_country_name($value['country_group']) : 'Admin' ;?></td>
			<td><?php echo $value['operator_group'];?></td>
			<td><?php echo $value['meta_access_unserialized'];?></td>
			<td><?php echo $value['is_pr_group'];?></td>
		</tr>
		<?php 
			endforeach;
			else: ?>
			<tr><td colspan="6" >No results</td></tr>
		<?php endif; ?>

		</tbody>

		<tfoot>
			<tr>
				<th>Country Group</th>
				<th>Operator Group</th>
				<th>Blue Ant Media Channel</th>
				<th>No operator group restriction</th>
			</tr>
		</tfoot>

	</table>

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
                	console.log("Response:"+response);
                    jQuery("#message").removeClass("hidden");
                    jQuery("#message p").text(response);
                    location.reload();

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
			jQuery("#pr-group").prop("disabled",true);
		}

		/**
		 * Enable channel checkbox after ajax data fetching
		 */
		function enableChannelCheckbox(){
			jQuery("#message").addClass("hidden");
			jQuery("#channel-access-0").prop("disabled",false);
			jQuery("#channel-access-1").prop("disabled",false);
			jQuery("#pr-group").prop("disabled",false);
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
							console.log('response', response);

							var parsedData = JSON.parse(response);
							console.log('parsedData', parsedData);
							var entertainment = '',extreme= '';
							if(parsedData) {
								var entertainment = parsedData["meta_access"]["channel-access[0]"];
								var extreme= parsedData["meta_access"]["channel-access[1]"];
								var pr_group= parsedData["is_pr_group"];
							}
							
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

							if(pr_group != undefined && pr_group != ''){
								jQuery('#pr-group').attr('checked', true);
							}else{
								jQuery('#pr-group').attr('checked', false);
							}
							enableChannelCheckbox();
						}
					);
		}
    });
</script>