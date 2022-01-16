
<div style="width: 100%; margin-top: 44px;">
	<div id="empinfo">
		<table width="100%" height="40">
			<tr>
				<td><h3>Products Info</h3></td>
				<td align="right" width="60"><button class="btn btn-success" style="width:100%;" type="button" onclick="ajax('products_form','showProductDetail');">New</button></td>
				<td align="right" width="60"><button class="btn btn-primary" style="width:100%; margin-left:10px;" type="button" onclick="ajax('products_list','showProductDetail');">List</button></td>
			</tr>
		</table>           
	</div>
<div class="row" style="padding-top: 50px; margin: 15px 10px 0px;">
	<input type="text" name="txtsearch" id="txtsearch" autocomplete="off" placeholder="Search Product" class="form-control" style="margin-bottom: .5rem; text-align: center;" onkeyup="ajax('products_list&txt='+this.value ,'showProductDetail');">
</div>
	<div id="showProductDetail" style="margin-bottom: 5px;">
		<?php include('products_list.php'); ?>
	</div>
</div>