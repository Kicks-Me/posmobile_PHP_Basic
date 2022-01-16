

<div style="width: 100%; margin-top: 44px;">
	<div id="empinfo">
		<table width="100%" height="40">
			<tr>
				<td><h3>Incoming Info</h3></td>
				<td align="right" width="60"><button class="btn btn-success" style="width:100%;" type="button" onclick="ajax('incoming_form','showDetail');">New</button></td>
				<td align="right" width="60"><button class="btn btn-primary" style="width:100%; margin-left:10px;" type="button" onclick="ajax('incoming_list','showDetail');">List</button></td>
			</tr>
		</table>
	</div>

	<div id="showDetail" style="padding-top: 40px; margin-bottom: 15px;">
		<?php include('incoming_list.php'); ?>
	</div>
</div>