<?php 
	$txt = $_REQUEST["txt"];
	$doctype = $_REQUEST['doctype'];
	// echo "c = ".$doctype;
	// echo "<script type='text/javascript'>alert($doctype);</script>";

	if(strlen($txt) > 2){
		$qry = $conn->query("SELECT*FROM products WHERE UPPER(pd_code) LIKE '".strtoupper($txt)."%'");

		if(mysqli_num_rows($qry) == 1){
			$rs = mysqli_fetch_object($qry);
			echo  $rs->pd_code." ".$rs->pd_name;
			if($doctype == 'OUT')
			{
				if(getStock($rs->pd_id) > 0){
					echo " => (Remain ". getStock($rs->pd_id).")";
					echo "<iframe style=\"display:none;\" onload=\"document.getElementById('newqty').removeAttribute('readonly');
						document.getElementById('newcost').removeAttribute('readonly');
						document.getElementById('btnAdd').disabled=false;\"></iframe>";
				}else{
					echo " => (Remain 0)";
					echo "<iframe style=\"display:none;\" onload=\"document.getElementById('newqty').setAttribute('readonly', true);
						document.getElementById('newqty').value='';
						document.getElementById('newcost').setAttribute('readonly', true);
						document.getElementById('newcost').value='';
						document.getElementById('btnAdd').setAttribute('disabled', 'disabled');\"></iframe>";
						exit();
				}
			}

			//Search price to cost textbox
			$cost = '';
			$sh = $conn->query("SELECT * FROM items a JOIN docs b ON a.doc_id=b.doc_id WHERE a.pdid='".$rs->pd_id."' AND b.doc_type='".$doctype."' ORDER BY a.id DESC");
			if(mysqli_num_rows($sh) > 0){
				$row = mysqli_fetch_object($sh);
				$cost = $row->cost;
			}


			echo "<iframe style=\"display:none;\" onload=\"document.getElementById('newid').value='".$rs->pd_id."';
				document.getElementById('newcost').value='".$cost."';\"></iframe>";
		}else{
			echo "No Item Found";
			echo "<iframe style=\"display:none;\" onload=\"document.getElementById('newid').value='0';
				document.getElementById('newcost').value='';\"></iframe>";
		}

	}
?>