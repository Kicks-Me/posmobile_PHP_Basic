<?php include('config.php'); ?>
<!DOCTYPE html>
<meta charset="utf-8">
<?php 
	$docid = $_POST["docid"];

	if($docid < 1){
		//Auto Order number
		$qry = $conn->query("SELECT * FROM docs WHERE doc_type='OUT' AND doc_no LIKE 'OD-".date("Y")."%' ORDER BY doc_id DESC");
		$no=0;
		if(mysqli_num_rows($qry) > 0){
			$rs = mysqli_fetch_object($qry);
			//OD-YYYY-0000;
			$no = substr($rs->doc_no, 8,4);
		}
		$no = ((int)$no) + 1;
		$docno = "OD-".date("Y")."-".generateId($no, 4);


		$sql = "INSERT INTO docs SET doc_type='OUT',
			doc_no='".$docno."',
			doc_date='".$_POST["doc_date"]."',
			doc_suplier='".$_POST["doc_suplier"]."',
			doc_status=1";

		$conn->query($sql);

		$docid = $conn->insert_id;
		alertDiv('Data Save successfully !','errtxt','O');

		echo "<script>window.parent.ajax('withdraw_form&docid=".$docid."','showDetail');</script>";	
		// echo "<script>window.parent.ajax('incoming_form','showDetail');</script>";	

	}else{
		$sql = "UPDATE docs SET 
				doc_date ='".$_POST["doc_date"]."',
				doc_no ='".$_POST["doc_no"]."',
				doc_suplier='".$_POST["doc_suplier"]."'
				WHERE doc_id='".$docid."'";

		$conn->query($sql);
		alertDiv('Update Data successfully!','errtxt','O');
		// echo "<script>window.parent.ajax('incoming_list','showDetail');</script>";	
	}
	
	// echo "<script>window.parent.document.getElementById('docid').value='".$docid."';</script>";
?>