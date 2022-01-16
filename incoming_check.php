<?php include('config.php'); ?>
<!DOCTYPE html>
<meta charset="utf-8">
<?php 
	$docid = $_POST["docid"];

	if($docid < 1){
		$sql = "INSERT INTO docs SET doc_type='IN',
			doc_no='".$_POST["doc_no"]."',
			doc_date='".$_POST["doc_date"]."',
			doc_suplier='".$_POST["doc_suplier"]."',
			doc_status=1";

		$conn->query($sql);

		$docid = $conn->insert_id;
		alertDiv('Data Save successfully !','errtxt','O');

		echo "<script>window.parent.ajax('incoming_form&docid=".$docid."','showDetail');</script>";	
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