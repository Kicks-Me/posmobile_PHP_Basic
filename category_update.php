<?php
	$catid = $_REQUEST['catid'];
	$txt = $_REQUEST['txt'];
	$conn->query("UPDATE categories SET cat_name='".$txt."' WHERE cat_id='".$catid."'");
	
?>