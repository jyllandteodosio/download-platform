<?php include_once( WPDMR_PLUGIN_DIR.'submenu/wpdm-reports-data.php' ); ?>

<div class="wrap">
	<h1 id="">Reports Data</h1>

	<form id="form_operator_access" method="get">
		<input type="hidden" name="page" value="wpdm-reports-data">
		<table class="form-table">
			<tbody>
				<tr class="form-field">
					<th scope="row"><label for="country">Country Group</label></th>
					<td>
						<select name="country" id="country">
							<option value="">All Country Group</option>
							<?php $default_country_array = array_filter(custom_get_country_groups());
								foreach( $default_country_array as $iso_country_code => $country_name ):
									$selected = $iso_country_code == $form_data['country'] ? "selected" : "";?>
									<option value="<?php echo $iso_country_code;?>" <?php echo $selected;?> ><?php echo $country_name;?></option>
							<?php endforeach;?>
						</select>
					</td>
					<th scope="row"><label for="period">Period</label></th>
					<td>
						<input type="hidden" name="current_period" id="current-period" value="<?php echo $form_data['current_period'] ?>">
						<ul class="subsubsub">
							<li class=""><a href="" id="period-day" class="periods <?php echo $form_data['current_period'] == "period-day" ? "current" : ""?>">Day</a> |</li>
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
								$selected = $options == $form_data['operator_group'] ? "selected" : "";?>
								<option value="<?php echo $options;?>" <?php echo $selected;?> ><?php echo $labels;?></option>
							<?php endforeach;?>
						</select>
					</td>
					<th scope="row"><label for="shows">From</label></th>
					<td><input type="date" name="date_from" id="date_from" value="<?php echo $_GET['date_from'];?>" ></td>
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
					<td><input type="date" name="date_to" id="date_to" value="<?php echo $_GET['date_to'];?>"></td>
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
				</tr>
				
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" class="button button-primary" value="Filter">
			<!-- <input type="reset" class="button button-default"  value="Cancel"> -->
		</p>
	</form>

	<table class="wp-list-table widefat">
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
		
		
		<?php if(isset($reports_data)):
			foreach ($reports_data as $key => $value):
		?>
		<tr>
			<td><?php echo "";?></td>
			<td><?php echo $value['country_group'];?></td>
			<td><?php echo $value['operator_group'];?></td>
			<td><?php echo $value['user_email'];?></td>
			<td><?php echo $value['post_title'];?></td>
			<td><?php echo $value['downloaded_files'];?></td>
		</tr>
		<?php 
			endforeach;
			else: ?>
			<tr><td colspan="6" >No results found</td></tr>
		<?php endif; ?>

		

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

</div>

<script>
console.log('a');
	jQuery(document).ready(function(){
		var curr_date, curr_month, curr_year, firstDay, lastDay;

		jQuery("#period-day").click(function(e){
			e.preventDefault();
		 	firstDay = moment().startOf('day').format("YYYY-MM-DD");
		 	lastDay = moment().endOf('day').format("YYYY-MM-DD");
			
			setActiveDatePeriod(jQuery(this).attr('id'));
			setDatePeriod(firstDay, lastDay);
		});

		jQuery("#period-week").click(function(e){
			e.preventDefault();
		 	firstDay = moment().startOf('week').format("YYYY-MM-DD");
		 	lastDay = moment().endOf('week').format("YYYY-MM-DD");

			setActiveDatePeriod(jQuery(this).attr('id'));
			setDatePeriod(firstDay, lastDay);
		});

		jQuery("#period-month").click(function(e){
			e.preventDefault();
		    firstDay = moment().startOf('month').format("YYYY-MM-DD");
			lastDay = moment().endOf('month').format("YYYY-MM-DD");

			setActiveDatePeriod(jQuery(this).attr('id'));
			setDatePeriod(firstDay, lastDay);
		});

		jQuery("#period-year").click(function(e){
			e.preventDefault();
			firstDay = moment().startOf('year').format("YYYY-MM-DD");
		 	lastDay = moment().endOf('year').format("YYYY-MM-DD");

			setActiveDatePeriod(jQuery(this).attr('id'));
			setDatePeriod(firstDay, lastDay);
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
    });
</script>
