<?php
	$docid = $_REQUEST["docid"];
	$id = $_REQUEST["id"];
	$qry = $conn->query("SELECT * FROM items WHERE id='".$id."'");
	$rs = mysqli_fetch_object($qry);
?>

<div class="btn-group" style="width:100%">
	<input type="number" name="qty<?php echo $id; ?>" id="qty<?php echo $id; ?>" style="width:30%; text-align:center; font-size:small; padding:1px !important" placeholder="Qty" autocomplete="off" value="<?php echo $rs->qty; ?>">
	<button class="btn" style="padding:3px; width:10%">x</button>
	<input type="number" name="cost<?php echo $id; ?>" id="cost<?php echo $id; ?>" style="width:45%; text-align:center; font-size:small; padding:1px !important" placeholder="Qty" autocomplete="off" value="<?php echo $rs->cost; ?>">
	<button class="btn btn-success" style="padding:3px; width:15%" onclick="ajax('itemUpdate&docid=<?php echo $docid; ?>&id=<?php echo $id; ?>&qty='+document.getElementById('qty<?php echo $id; ?>').value+'&cost='+document.getElementById('cost<?php echo $id; ?>').value,'ed<?php echo $id; ?>');"><i class="fas fa-check-double"></i></button>
</div>