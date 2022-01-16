<table class="table" width="100%" style="font-size: small; background-color:rgb(244, 248, 252); overflow-y: scroll;">
	<tr style="border: 1px 0 solid rgb(110, 183, 255);">
		<td align="left" width="12%"><b>No</b></td>
		<td><b>Items</b></td>
		<td align="right"><b>Price</b></td>
	</tr>
	<?php 
	   //  $d = $_REQUEST['docid'];
    // echo "<script type='text/javascript'>alert('doc itemList is '+$d);</script>";

		if($_REQUEST['docid'] > 0) {
			$docid = $_REQUEST['docid'];
			$docqry = $conn->query("SELECT * FROM docs WHERE doc_id='".$docid."'");
			$docrs = mysqli_fetch_object($docqry);
			$doctype = $rs->doc_type;
		}

		if($_REQUEST["delid"] > 0){
			$qry = $conn->query("SELECT * FROM items  WHERE id='".$_REQUEST['delid']."'");
			$rs = mysqli_fetch_object($qry);
			$pid = $rs->pdid;
			$conn->query("DELETE FROM items WHERE id='".$_REQUEST["delid"]."'");
			// echo "<script type='text/javascript'>alert('Hi $d');</script>";
			cutStock($rs->pdid);

		}

		
		$sql ="SELECT * FROM items a JOIN products b ON a.pdid = b.pd_id WHERE a.doc_id='".$docid."' ORDER BY a.id DESC";
		$qry = $conn->query($sql);
		$q = 0;
		$total = 0;
		while($rs = mysqli_fetch_object($qry)){
		$q ++;
		$amount = $rs->qty * $rs->cost;
		$total = $total + $amount;
	?>
	<tr>
		<td><?php  echo $q; ?></td>
		<td> 
			<b><?php  echo  $rs->pd_code; ?></b><br>
			<?php echo $rs->pd_name; ?><br>
			<div id="ed<?php echo $rs->id; ?>">(<?php echo $rs->qty." x ".number_format($rs->cost); ?>) <i class="fas fa-edit" style="cursor: pointer;" onclick="ajax('itemEdit&docid=<?php echo $docid; ?>&id=<?php echo $rs->id; ?>','ed<?php echo $rs->id; ?>');"></i>
			</div>
		</td>
		<td align="right" id="tt<?php echo $rs->id; ?>"><?php  echo  $amount < 0.1 ? 'Free': number_format($amount);?></td>
		<td align="right">
			<button class="btn btn-danger" style="padding:0px; margin: 0px;" onclick="if(confirm('Do you want to delete this item ?')) ajax('itemList&docid=<?php echo $rs->doc_id; ?>&delid=<?php echo $rs->id ?>','showItem');"><i class="fas fa-minus-circle"style="margin: .2rem; cursor: pointer; color: #fff;"></i></button>
		</td>
	</tr>
	<?php } ?>
</table>

<iframe src="" style="display: none;" onload="document.getElementById('totalAmount').innerHTML='<?php echo number_format($total) ." Kip"; ?>';">	
</iframe>

<form action="itemAdd.php" method="post" target="xData">
<div style="position: fixed; left: 0px; bottom:0px; height: 120px; width:100%; background-color: #333; color: white; padding: 7px;">
	<input type="hidden" name="docid" id="docid" value="<?php echo $docid; ?>">
	<input type="hidden" name="newid" id="newid" value="0">
	<div class="row">
		<div class="col-3" style="margin-top:5px;">ProductID</div>
		<div class="col-9"><input type="text" name="newcode" id="newcode" placeholder="Search Item" autocomplete="off" required class="form-control" onkeyup="ajax('itemSearch&doctype=<?php echo $doctype; ?>&txt='+ this.value,'showData');">
			<div id="showData" style="font-size: small; color:yellow; height:20px; width: 100%; overflow: hidden;">
				xxxx
			</div>
		</div>
	</div>
	<div class="row" style="display: flex; justify-items: center; margin-top: 5px; padding: 0 15px;">
		<div class="col-3" style="padding: 0 2px;">
			<input type="number" name="newqty" id="newqty" class="form-control" placeholder="Qty" autocomplete="off" required onkeyup="getAmount(this.value, document.getElementById('newcost').value, 'newamount')" style="text-align:center; font-size: small;">
		</div>
		<div class="col-3" style="padding: 0 2px;">
			<input type="number" name="newcost" id="newcost" class="form-control" placeholder="Cost" autocomplete="off" required onkeyup="getAmount(document.getElementById('newqty').value, this.value, 'newamount')" style="text-align:center; font-size: small;">
		</div>
		<div class="col-3" style="padding: 0 2px;">
			<input type="text" name="newamount" id="newamount" class="form-control" placeholder="Amount" readonly required style="text-align:center; font-size: small;">
		</div>
		<div class="col-3" style="padding: 0 2px;" align="center">
			<button id="btnAdd" class="btn btn-primary" style="padding: 4px 20px;">Add</button>
		</div>
	</div>
</div>
</form>
<iframe src="" style="display: none;" onload="document.getElementById('newcode').focus();"></iframe>