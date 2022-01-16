<?php 
	if($_REQUEST['id'] > 0){
		$id = $_REQUEST['id'];
		$docid = $_REQUEST['docid'];
		$conn->query("UPDATE items SET qty='".$_REQUEST['qty']."', cost='".$_REQUEST['cost']."' WHERE id='".$id."'");
	}

	if($docid < 1){
		alertDiv('No found document No.','errtxt');
		// echo "<script>window.parent.ajax('incoming_list','showDetail');</script>";
	}
?> 

(<?php echo $_REQUEST['qty']." x ".number_format($_REQUEST['cost']); ?>)
<i class="fas fa-edit" onmouseover="this.style.color='red'" onmouseleave="this.style.color='#679969'" style="cursor: pointer; color: #679969; padding: 10px;" onclick="ajax('itemEdit&id=<?php echo $id; ?>','ed<?php echo $id; ?>');"></i>

<?php 
	$amount = $_REQUEST['qty'] * $_REQUEST['cost'];
	echo "<iframe style=\"display:none;\" onload=\"document.getElementById('tt".$id."').innerHTML='".number_format($amount)."';\"></iframe>";

	//update stock; 
	$qry = $conn->query("SELECT*FROM items WHERE id='".$id."'");
	$rs = mysqli_fetch_object($qry);
	cutStock($rs->pdid);


	//Update doc_total
	$qryy = $conn->query("SELECT SUM(qty * cost) As total FROM items WHERE doc_id='".$docid."'");
	$rss = mysqli_fetch_object($qryy);

	// echo "<script type='text/javascript'>alert('doc total is $rss->total => $docid');</script>";
	$conn->query("UPDATE docs SET doc_total='".$rss->total."' WHERE doc_id='".$docid."'");

?>

<iframe src="" style="display: none;" onload="document.getElementById('totalAmount').innerHTML='<?php echo number_format($rss->total) ." Kip"; ?>';">	
</iframe>