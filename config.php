<?php
	error_reporting(0);

	include("function.php");

	$conn = new mysqli("localhost","root","","pos_db");
	$conn->query("set NAMES utf8");

	date_default_timezone_set('Asia/Vientiane');
	$endate = date("Y-m-d");

	$web_icon = "images/logo.png";
	$web_logo = "images/kicks-me.png";

	$purl = "posmobile/";
	$url = "http://".$_SERVER['HTTP_HOST']."/".$purl;
	
	$mode ="";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}
?>
 