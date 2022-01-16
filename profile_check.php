<?php include("config.php"); ?>
<DOCTYPE html>
<?php
	if($_POST['password'] != $_POST['repassword']){
		alertDiv('Password not matched !','errtxt',"W");
		exit();
	}

	$sql = $conn->query("SELECT * FROM USERS WHERE U_USERNAME='".trim($_POST["username"])."' AND U_ID !='".$_COOKIE["usrid"]."'");
	if(mysqli_num_rows($sql) < 0){
		alertDiv('This profile is used by another user !','errtxt',"W");
		exit();
	}

	$pwd = base64_encode(trim($_POST['password']));
	$qry = $conn->query("UPDATE SET U_NAME='".trim($_POST["name"])."', U_USERNAME='".trim($_POST["username"])."', U_PASSWORD='".$pwd."' WHERE U_ID='".$_COOKIE["usrid"]."'");

	$rs = mysqli_fetch_object($qry);
	$usrname = $rs->u_name;

	setcookie('usrname', $usrname, time()+3600*24);//set cookie for 1 day (can use *365 for 1 year)
	alertDiv('Edit profile successfully !','errtxt',"O");
?>