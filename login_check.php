<?php include("config.php"); ?>
<DOCTYPE html>
<?php
	$pwd = base64_encode(trim($_POST['password']));
	$qry = $conn->query("SELECT*FROM USERS WHERE U_USERNAME='".trim($_POST['username'])."' AND U_PASSWORD='".$pwd."' AND U_STATUS = 1");

	if(mysqli_num_rows($qry) < 1 ){
		alertDiv("Password is incorrect !","errtxt");
		exit();
	}

	$rs = mysqli_fetch_object($qry);
	$usrtype = $rs->u_type;
	$usrname = $rs->u_name;
	$usrid = $rs->u_id;

	setcookie('usrid', $usrid, time()+3600*24); //set cookie for 1 day (can use *365 for 1 year)
	setcookie('usrname', $usrname, time()+3600*24);
	setcookie('usrtype', $usrtype, time()+3600*24);
	echo "<script>window.parent.location='".$url."';</script>";
?>