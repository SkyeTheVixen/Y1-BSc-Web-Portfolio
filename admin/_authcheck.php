<?php
	session_start();
	if (!isset($_SESSION['userid'])){
		header("Location: login.php?e=1");
		exit($_SESSION['userid']);
	}
	else if (isset($_COOKIE["remember"]) && !isset($_SESSION['userid'])){
		$userid = decryptCookie($_COOKIE['remember']);
		$sql = "SELECT count(*) AS cntUser FROM `tblUsers` WHERE `ID` = '$userid'";
  		$run = mysqli_query($db_connect, $sql);
  		$row = mysqli_fetch_assoc($run);

		  $count = $row['cntUser'];

		  if( $count > 0 ){
			 $_SESSION['userid'] = $userid; 
			 exit;
		  }

	}
	// Decrypt cookie
	function decryptCookie( $ciphertext ) {
   		$cipher = "aes-256-cbc";
		list($encrypted_data, $iv,$key) = explode('::', base64_decode($ciphertext));
   		return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);

	}


?>