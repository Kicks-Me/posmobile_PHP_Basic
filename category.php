<?php
	if($_COOKIE['usrtype'] !='Admin'){
		echo "<h3 style=\"color:red;\">This page for Admin only !</h3>";
		exit();
	}
?>
<div style="width: 100%; margin-top: 44px;">
	<div id="empinfo">
		<table width="100%" height="40">
			<tr>
				<td><h3>Category</h3></td>
				<!-- <td align="right"><button class="btn btn-primary" type="button" onclick="ajax('category_list','showdetail');">Ajax</button></td> -->
			</tr>
		</table>
	</div>

	<div id="showdetail" style="padding-top: 40px; margin-bottom: 15px;">
		<?php include('Category_list.php'); ?>
	</div>
</div>