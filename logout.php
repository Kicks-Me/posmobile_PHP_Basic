<?php 
	include('config.php');

	setcookie("usrid","",time()-3000);
	setcookie("usrname","",time()-3000);
	setcookie("usrtype","",time()-3000);
	echo "<script>window.parent.location='".$url."';</script>"
?>
