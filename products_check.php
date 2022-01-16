<?php include('config.php'); ?>
<!DOCTYPE html>
<meta charset="utf-8">
<?php
	$isSave = false;
	$pdid = $_POST['pdid'];

	if($pdid < 1){
		$sql = "INSERT INTO products SET 
				pd_catid='".$_POST['pd_catid']."',
				pd_code='".$_POST['pcode']."',
				pd_name='".$_POST['pname']."',
				pd_price='".$_POST['pprice']."'";

		$conn->query($sql);
		$pdid = $conn->insert_id;
		$isSave = true;
	}else{
		$sql = "UPDATE products SET 
				pd_catid='".$_POST['pd_catid']."',
				pd_code='".$_POST['pcode']."',
				pd_name='".$_POST['pname']."',
				pd_price='".$_POST['pprice']."' WHERE pd_id='".$pdid."'";

		$conn->query($sql);
		$isSave = true;
	}

// Upload รูปประกอบ
	$fold = "uploads";

	// ตรวจสอบประเภทไฟล์
	$len = strlen($_FILES["pict"]["name"]);
	$filetype =  strtolower(substr($_FILES["pict"]["name"],$len-3,3));
	$uploadedfile = $_FILES['pict']['tmp_name'];
	if($filetype=="jpg" || $filetype=="peg" || $filetype=="jpe"){
		$pict = imagecreatefromjpeg($uploadedfile);
	} elseif($filetype=="gif"){
		$pict = imagecreatefromgif($uploadedfile);
	} elseif($filetype=="png"){
		$pict = imagecreatefrompng($uploadedfile);
	} else {
		$pict = imagecreatefromwbmp($uploadedfile);
	}

	if($_FILES['pict']['size']>100){
		//เปลี่ยนชื่อใหม่
		$tmname = str_replace("-","",$endate).str_replace(":","",$times."_".rand_int(5)).$r;
		$newname = $fold."/".$pdid.$tmname.strstr($_FILES["pict"]["name"],".");
		
			// เปลี่ยนขนาดรูป ===============================================
				list($width, $height) = getimagesize($_FILES['pict']['tmp_name']);
				$newwidth=800; // บังคับขนาด
				$newheight=($height/$width)*$newwidth;

				$tmp = imagecreatetruecolor($newwidth, $newheight);
				imagecopyresized($tmp, $pict, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	 }
	
	//=========================================================
	//สร้างรูปใหม่
	if(imagejpeg($tmp, $newname,100)) {
		$sql = "update products set pd_image='".$newname."' where pd_id='".$pdid."'";
		$conn->query($sql);
		if(is_file($_POST["old_pict"])) unlink($_POST["old_pict"]);

		//ล้าง Temp ออก
		imagedestroy($pict);
		imagedestroy($tmp);
		imagedestroy($tmpmini);
	}


	if ($isSave) {
		alertDiv('Save successfully !','errtxt','O');
	}

	echo "<script>window.parent.document.getElementById('pdid').value='".$pdid."';</script>";
?>