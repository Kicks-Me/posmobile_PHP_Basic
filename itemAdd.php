<?php 
	include('config.php');
	$docid = $_POST['docid'];
	$newid = $_POST['newid'];
	$newqty = $_POST['newqty'];
	$newcost = $_POST['newcost'];
	// $newamount = $_POST['newamount'];


	if($newqty < 0.1) {$newqty = 1;}


	$qry = $conn->query("SELECT * FROM items WHERE doc_id='".$docid."' AND pdid='".$newid."'");


	if(mysqli_num_rows($qry) > 0){
		$rs = mysqli_fetch_object($qry);
		$newqty = $newqty + $rs->qty;

		// echo "<script type='text/javascript'>alert('go to update!! !'+$newid+' '+$docid);</script>";

		$sql = "UPDATE items SET  qty='".$newqty."', cost='".$_POST['newcost']."' WHERE doc_id='".$docid."' AND pdid='".$newid."'";
		$conn->query($sql);
	
	
	}else{

		$conn->query("INSERT INTO items SET doc_id='".$docid."',pdid='".$newid."', qty='".$newqty."', cost='".$newcost."'");
	}

	//Update doc_total
	$qryy = $conn->query("SELECT SUM(qty * cost) As total FROM items WHERE doc_id='".$docid."'");
	$rss = mysqli_fetch_object($qryy);

	// echo "<script type='text/javascript'>alert('doc total is $rss->total => $docid');</script>";
	$conn->query("UPDATE docs SET doc_total='".$rss->total."' WHERE doc_id='".$docid."'");

    cutStock($newid);
    // echo "<script type='text/javascript'>alert('doc item add is '+$docid);</script>";
	echo "<script>window.parent.ajax('itemList&docid=".$docid."','showItem');</script>";

?>
