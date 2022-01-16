<?php 
	function alertDiv ($msg,$div,$cls = "E") {
		$m ="";
		if(trim(strtoupper($cls)) == "O"){
			$m = "<font color=green><i class=\"fas fa-check-circle\"></i> $msg </font>";
		}elseif (trim(strtoupper($cls)) == "W"){
			$m = "<font color = orange><i class=\"fas fa-exclamation-triangle\"></i> $msg</font>";
		}else{
			$m = "<i class=\"fas fa-times\"> $msg </i>";
		}

		echo "<script>window.parent.document.getElementById('".$div."').innerHTML='".$m."';</script>";
	};

	function rand_txt ($len){
		srand((double)microtime()*10000000);
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$ret_str ="";
		$num = strlen($chars);
		for ($i=0; $i < $len; $i++) { 
			$ret_str .= $chars[rand()%$num];
			$ret_str .="";
		}
		return $ret_str;
	}

	function rand_int($len){
		srand((double)microtime()*10000000);
		$chars ="0123456789";
		$ret_str ="";
		$num = strlen($chars);
		for ($i=0; $i < $len ; $i++) { 
			$ret_str .= $chars[rand()%$num];
			$ret_str .="";
		}
		return $ret_str;
	}

	function newuserId(){
		date_default_timezone_set('Asia/Vientiane');
		$dates = date("ymd");
		// $arr = preg_split("/\-/", $dates); ///split array method 1
		// $str_arr = explode (",", $string); ///split array method 2
		$newusr = $dates.rand_int(3);
		// if(count($arr) > 0){
		// 	for ($i=0; $i < count($arr); $i++) { 
				
		// 	}
		// }

		return $newusr;
	}

	function uiPassword($inpwd){
		$outpwd="null";
		$dpwd = base64_decode($inpwd);
		$len = strlen($dpwd);

		if($len > 0){
			$outpwd = "";

			for ($i = 0; $i < $len; $i++) { 
				if($i < 2){
					$outpwd .= $dpwd[$i];
				}else{

					if($i > $len - 2){
						$outpwd .= $dpwd[$i];
					}else{
						$outpwd .= "**";
					}
				}
			}
		}

		return $outpwd;
	}

	function db2date($temp) {
		// format yyyy-mm-dd
		list($yyyy, $mm, $dd) = explode("-", $temp);
		//$yyyy = $yyyy+543;
		$temp = "$dd/$mm/$yyyy";
		$tts = $yyyy.$mm.$dd;
		$tts = $tts+0;
		if($tts<20151201) { $temp=""; }
		return($temp);
	}

	function generateId($no, $len){
		for ($i=0; $i < $len; $i++) { 
			if(strlen($no) < $len){
				$no ="0".$no;
			}
		}
		return ($no);
	}

	function getStock($pid){
		$conn = $GLOBALS['conn'];

		$qryIn = $conn->query("SELECT sum(a.qty) as qtyin FROM items a JOIN docs b ON a.doc_id = b.doc_id WHERE b.doc_type ='IN' AND a.pdid='".$pid."' AND b.doc_status = 1 ");
		$rsIn = mysqli_fetch_object($qryIn);


		$qryOut = $conn->query("SELECT sum(a.qty) as qtyOut FROM items a JOIN docs b ON a.doc_id = b.doc_id WHERE b.doc_type ='OUT' AND a.pdid='".$pid."'  AND b.doc_status = 1");
		$rsOut = mysqli_fetch_object($qryOut);

		$onhand = $rsIn->qtyin - ($rsOut->qtyOut < 1 ? 0 : $rsOut->qtyOut);
		return $rsIn->qtyin < 0 ? 0 : $onhand < 1 ? 0 : $onhand;
	}

	function cutStock($pid){
		$conn = $GLOBALS['conn'];

		$qryIn = $conn->query("SELECT sum(a.qty) as qtyin FROM items a JOIN docs b ON a.doc_id = b.doc_id WHERE b.doc_type ='IN' AND a.pdid='".$pid."'  AND b.doc_status = 1");
		$rsIn = mysqli_fetch_object($qryIn);


		$qryOut = $conn->query("SELECT sum(a.qty) as qtyOut FROM items a JOIN docs b ON a.doc_id = b.doc_id WHERE b.doc_type ='OUT' AND a.pdid='".$pid."'  AND b.doc_status = 1");
		$rsOut = mysqli_fetch_object($qryOut);

		$onhand = $rsIn->qtyin - ($rsOut->qtyOut < 1 ? 0 : $rsOut->qtyOut);

		// echo "<script type='text/javascript'>alert('qty $onhand pid $pid');</script>";

		$conn->query("UPDATE products SET pd_stock='".$onhand."' WHERE pd_id='".$pid."'");

		return $rsIn->qtyin < 0 ? 0 : $onhand < 1 ? 0 : $onhand;
	}
	
?>