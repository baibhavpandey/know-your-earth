<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<?php
			echo form_open('enter/latilong');
			echo validation_errors();
		?>
		<table>
			<tr>
				<td>Location</td>
				<td><?php
						echo form_input(array(
							'name' => 'location'
							
						));
					?></td>
			</tr>
			<tr>
				<td>Latitude</td>
				<td><?php
						echo form_input(array(
							'name' => 'latitude',
							
						));
					?></td>
			</tr>
			<tr>
				<td>Longitude</td>
				<td><?php
						echo form_input(array(
							'name' => 'longitude'
							
						));
					?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_submit(array(
					'name' => 'submit',
					'value' => 'Enter'
				));?></td>
			</tr>
		</table>
		<?php
			echo form_close();
		?>
	</body>
</html>