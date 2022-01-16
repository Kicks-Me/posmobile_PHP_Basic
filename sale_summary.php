<?php 
	if(isset($_REQUEST['d1']) && isset($_REQUEST['d2'])){
		$sd_sql = "doc_date between ('".$_REQUEST['d1']."' and '".$_REQUEST['d2']."')";
	}

	$sql = "SELECT SUM(doc_total) as saleprice FROM docs WHERE doc_type='OUT' AND doc_status > 0 AND ".$sd_sql;

	// echo $sql;
	$qry = $conn->query($sql);
	$rs = mysqli_fetch_object($qry);
	echo  number_format($rs->saleprice);
	
?>