<?php include_once( WPDMR_PLUGIN_DIR.'submenu/wpdm-reports-data.php' ); ?>

<div class="wrap">
	<h1 id="">Reports Data</h1>
	<?php
	if(isset($form_data['message'])){
		$validation_message = $form_data['message'];
		$class_hidden = "";
		$form_invalid = "form-invalid";
	}else{
		$validation_message = "";
		$class_hidden = "hidden";
		$form_invalid = "";
	}
	?>
	<div id="message" class="error <?php echo $class_hidden;?>" ><p><?php echo $validation_message;?></p></div>
	
		<form id="form_operator_access" method="get">
			<p class="submit">
				<input type="submit" class="button button-primary" value="Show Report">
				<!-- <input type="reset" class="button button-default"  value="Cancel"> -->
			</p>
			
			<input type="hidden" name="page" value="wpdm-reports-data">
			<input type="hidden" name="filter" value="filtered">
			
			<div class="wpdmr-table-header">Filter:</div>
			<div class="wpdmr-table-content-filter">
				<table class="form-table">
					<tbody>
						<tr class="form-field">
							<th scope="row"><label for="country">Country Group</label></th>
							<td>
								<select name="country" id="country">
									<option value="">All Country Group</option>
									<?php $default_country_array = array_filter(custom_get_country_groups());
										foreach( $default_country_array as $iso_country_code => $country_name ):
											if ($iso_country_code != ''):
												$selected = $iso_country_code == $form_data['country'] ? "selected" : "";?>
												<option value="<?php echo $iso_country_code;?>" <?php echo $selected;?> ><?php echo $country_name;?></option>
									<?php 	endif;
										endforeach;
									?>
								</select>
							</td>
							<th scope="row"><label for="period">Period</label></th>
							<td>
								<?php 
								// echo $form_data['current_period'];
								$default_period = !isset($form_data['current_period']) || $form_data['current_period'] == '' ? 'current' : '';?>
								<input type="hidden" name="current_period" id="current-period" value="<?php echo $default_period != '' ? 'period-day' : $form_data['current_period'] ?>">
								<ul class="subsubsub">
									<li class=""><a href="" id="period-day" class="periods <?php echo $default_period != '' ? $default_period : ($form_data['current_period'] == "period-day" ? "current" : "");?>">Day</a> |</li>
									<li class=""><a href="" id="period-week" class="periods <?php echo $form_data['current_period'] == "period-week" ? "current" : ""?>">Week</a> |</li>
									<li class=""><a href="" id="period-month" class="periods <?php echo $form_data['current_period'] == "period-month" ? "current" : ""?>">Month</a> |</li>
									<li class=""><a href="" id="period-year" class="periods <?php echo $form_data['current_period'] == "period-year" ? "current" : ""?>">Year</a></li>
								</ul>
							</td>
						</tr>
						<tr class="form-field">
							<th scope="row"><label for="operator_group">Operator Group</label></th>
							<td>
								<select name="operator_group" id="operator_group">
									<option value="">All Operator group</option>
									<?php $operator_group_array = array_filter(custom_get_operator_groups());
									foreach( $operator_group_array as $options => $labels ):
										if ($options != ''):
											$selected = $options == $form_data['operator_group'] ? "selected" : "";?>
											<option value="<?php echo $options;?>" <?php echo $selected;?> ><?php echo $labels;?></option>
									<?php endif;
									endforeach;?>
								</select>
							</td>
							<th scope="row"><label for="shows">From</label></th>
							<td class="<?php echo $form_invalid;?>"><input type="date" name="date_from" id="date_from" class="date_from" value="<?php echo $_GET['date_from'];?>" ></td>
						</tr>
						<tr class="form-field">
							<th scope="row"><label for="operator_account">Operator Account</label></th>
							<td>
								<select name="operator_account" id="operator_account">
									<option value="">All Operator Accounts</option>
									<?php $operator_accounts_array = array_filter(custom_get_operator_accounts());
									foreach( $operator_accounts_array as $options => $labels ):
										$selected = $options == $form_data['operator_account'] ? "selected" : "";?>
										<option value="<?php echo $options;?>" <?php echo $selected;?> ><?php echo $labels;?></option>
									<?php endforeach;?>
								</select>
							</td>
							<th scope="row"><label for="shows">To</label></th>
							<td  class="<?php echo $form_invalid;?>">
								<input type="date" name="date_to" id="date_to" value="<?php echo $_GET['date_to'];?>">

							</td>
						</tr>
						<tr class="form-field">
							<th scope="row"><label for="shows">Shows</label></th>
							<td>
								<select name="shows" id="shows">
									<option value="">All Shows</option>
									<?php $shows_array = array_filter(custom_get_shows());
									foreach( $shows_array as $options => $labels ):
										$selected = $options == $form_data['shows'] ? "selected" : "";?>
										<option value="<?php echo $options;?>" <?php echo $selected;?> ><?php echo $labels;?></option>
									<?php endforeach;?>
								</select>
							</td>
							<th scope="row"><label for="result_type">Result Type</label></th>
							<td>
								<select name="result_type" id="result_type">
									<option value="list" <?php echo $form_data['result_type'] == 'list' ? "selected" : "" ;?> >List of downloaded files</option>
									<option value="sum" <?php echo $form_data['result_type'] == 'sum' ? "selected" : "" ;?>>Sum of downloaded files</option>
								</select>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>

		</form>
	
	<div class="wpdmr-inline-block wid-6">
		<p><?php echo $form_data['msg_dl_range'];?></p>
		<p>
			<?php
				// todo:clean
				if ($form_data['filter']) {
					echo $form_data['country'] != '' ? get_country_name($form_data['country'])." | " : "All Country Group | "; 
					echo $form_data['operator_group'] != '' ? $form_data['operator_group']." | " : "All Operator Group | "; 
					echo $form_data['operator_account'] != '' ? get_user_info($form_data['operator_account'],'email')." | " : "All Operator Accounts | "; 
					echo $form_data['shows'] != '' ? get_the_title($form_data['shows']) : "All Shows";
				}

			?>
		</p>
	</div>
	<div class="wpdmr-inline-block wpdmr-btn-export">
		<?php 
			$disabled = $form_data['filter'] && !empty($reports_data) ? "" : "disabled";
			$title = $form_data['filter'] && !empty($reports_data) ? "" : "Click 'Show Report' first before exporting.";
			$export_button_visibility = 'style="display:none"';
		?>
		
		<input type="button" value=" Export Report" id="export_sum" class="button" <?php echo $disabled?> title="<?php echo $title;?>" <?php echo $_GET['result_type'] != 'sum' ? $export_button_visibility : '';?> onclick="window.open('?page=exports-reports&amp;report=3&amp;action=export&amp;export_type=csv&amp;export_source=custom_reports_data','temp_report_window');">
		<input type="button" value=" Export Report" id="export_list" class="button" <?php echo $disabled?> title="<?php echo $title;?>" <?php echo !isset($_GET['result_type']) ? '' : (($_GET['result_type'] != 'list' ) ? $export_button_visibility : '');?> onclick="window.open('?page=exports-reports&amp;report=4&amp;action=export&amp;export_type=csv&amp;export_source=custom_reports_data','temp_report_window');">
		<!-- <input type="button" value=" Export Report " id="auto_report" class="button" style="display:block" onclick="window.open('?page=exports-reports&amp;report=4&amp;action=export&amp;export_type=csv&amp;export_source=custom_monthly_reports','temp_report_window');"> -->
		
		<iframe name="temp_report_window" id="temp_report_window" class="temp_report_window"></iframe>
		
		<script>
			// jQuery('#auto_report').trigger('click');
		</script>
	</div>
	<table class="wpdmr-reports-data wp-list-table striped widefat">
		<thead>
		<tr>
			<th>Period</th>
			<th>Country Group</th>
			<th>Operator Group</th>
			<th>Operator Account</th>
			<th>Show</th>
			<th>Downloaded Files</th>
		</tr>
		</thead>

		<tbody id="the-list">
		
		
		<?php
		if(isset($reports_data) && !empty($reports_data)):
			foreach ($reports_data as $key => $value):
				// echo "<pre>";print_r($reports_data);echo "</pre>";
		?>
		<tr>
			<td><?php 
				echo $value['period'];
				if($form_data['current_period'] == 'period-week') echo " - ".date('m/d/Y',strtotime($value['max_created_date']));
				?>
			</td>
			<td><?php echo $value['country_group'] != '' && $value['country_group'] != NULL ? get_country_name($value['country_group']) : 'Admin' ;?></td>
			<td><?php echo $value['operator_group'] != '' && $value['operator_group'] != NULL ? $value['operator_group'] : 'Admin' ;?></td>
			<!-- <td><?php //echo $value['operator_group'];?></td> -->
			<td><?php echo $value['user_email'];?></td>
			<td><?php echo $value['post_title'];?></td>
			<td><?php echo $value['downloaded_files'];?></td>
		</tr>
		<?php 
			endforeach;
			else: ?>
			<tr><td colspan="6" >No results</td></tr>
		<?php endif; ?>

		</tbody>

		<tfoot>
			<tr>
				<th>Period</th>
				<th>Country Group</th>
				<th>Operator Group</th>
				<th>Operator Account</th>
				<th>Show</th>
				<th>Downloaded Files</th>
			</tr>
		</tfoot>

	</table>
	
	<div class="tablenav">
		<div class="tablenav-pages">
			<?php 
				if ($reports_per_page != 0 || $reports_per_page != NULL){
					echo paginate_links( array(
					    'base' => add_query_arg( 'cpage', '%#%' ),
					    'format' => '',
					    'prev_text' => __('&laquo;'),
					    'next_text' => __('&raquo;'),
					    'total' => ceil($total_reports_count / $reports_per_page),
					    'current' => $page
					));
				}
			?>
		</div>
	</div>

</div>

<script>
	jQuery(document).ready(function(){
		var curr_date, curr_month, curr_year, firstDay, lastDay;

		jQuery("#period-day").click(function(e){
			e.preventDefault();
			setActiveDatePeriod(jQuery(this).attr('id'));
		});

		jQuery("#period-week").click(function(e){
			e.preventDefault();
			setActiveDatePeriod(jQuery(this).attr('id'));
		});

		jQuery("#period-month").click(function(e){
			e.preventDefault();
			setActiveDatePeriod(jQuery(this).attr('id'));
		});

		jQuery("#period-year").click(function(e){
			e.preventDefault();
			setActiveDatePeriod(jQuery(this).attr('id'));
		});

		function setDatePeriod(firstDay, lastDay){
			jQuery("#date_from").val(firstDay);
			jQuery("#date_to").val(lastDay);
		}

		function setActiveDatePeriod(current){
			jQuery(".periods").removeClass('current');
			jQuery("#"+current).addClass('current');
			jQuery("#current-period").val(current);
		}

		jQuery('#date_from').datepicker({ dateFormat: 'yy-mm-dd' });	
		jQuery('#date_to').datepicker({ dateFormat: 'yy-mm-dd' });	

		jQuery( "#result_type" ).change(function() {
			var result_type = jQuery( "#result_type" ).val();
			console.log(result_type);
			if (result_type == 'list') {
				jQuery('#export_sum').hide();
				jQuery('#export_list').show();

			}else if (result_type == 'sum') {
				jQuery('#export_list').hide();
				jQuery('#export_sum').show();
			}
		});
    });
</script>
