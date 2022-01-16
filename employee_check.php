<?php include("config.php"); ?>
<DOCTYPE html>
<?php

	$id = $_POST['uid'];
	$isSave = false;
	$pwd = base64_encode(trim($_POST['password']));

	if($id < 1){
		$sql = $conn->query("SELECT * FROM USERS WHERE TRIM(U_USERNAME)='".trim($_POST["username"])."''");
		if(mysqli_num_rows($sql) > 0){
			alertDiv('This username is in used !','errtxt',"W");
			exit();
		}

		$conn->query("INSERT INTO USERS SET u_type='EMP',u_name='".$_POST['name']."', u_username='".$_POST['username']."', u_password='".$pwd."', u_status=1");
		$isSave = true;
		
	}else{

		$sql = $conn->query("SELECT*FROM users WHERE u_username='".$_POST["username"]."' AND u_id !='".$id."'");
		if(mysqli_num_rows($sql) > 0){
			alertDiv('User Id is invalid to update !','errtxt','W');
			exit();
		}

		$conn->query("UPDATE users SET u_name='".$_POST['name']."', u_username='".$_POST['username']."', u_password='".$pwd."' WHERE U_ID='".$id."'");

		$isSave = true;
	}

	if($isSave){
		echo "<script>window.parent.location='".$url."?mode=employee';</script>";
		alertDiv('Data Save successfully !','errtxt',"O");
	}
?>