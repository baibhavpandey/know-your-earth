<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php
			echo form_open('temperature_info/postin');
			echo validation_errors();
		?>
		<table>
			<tr>
				
			</tr>
			<tr>
				<td>Year</td>
				<td>
					<?php echo form_input(array(
					'name' => 'year'
				));?>
				</td>
			</tr>
			<tr>
				<td>Average Mean Temp.</td>
				<td><?php
					echo form_input(array(
						'name' => 'mean'
					));
					?></td>
			</tr>
			<tr>
				<td>Average Min Temp.</td>
				<td><?php echo form_input(array(
					'name' => 'min'
				));?></td>
			</tr>
			<tr>
				<td>Average Max Temp.</td>
				<td><?php echo form_input(array(
					'name' => 'max'
				));?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_submit('submit', 'submit');?></td>
			</tr>
		</table>
		
		<?php
			echo form_close();
		?>
	</body>
</html>