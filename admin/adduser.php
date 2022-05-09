<?php
	include_once("_connect.php");
	$email = $_POST("email");
	$password = $_POST("password");
	$fname = $_POST("fname");
	$lname = $_POST("lname");
	$accesstype = $_POST("acceslevel");

	$sql="INSERT INTO `tblUsers` (`email`, `password`, `fname`, `lname`, `access`) VALUES ($email, $password, $fname, $lname, $accesstype)";
	$run = mysqli_query($db_connect, $sql);
	echo(json_encode("statusCode", "200"));
?>