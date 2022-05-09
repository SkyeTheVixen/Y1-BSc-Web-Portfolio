<?php
	session_start();
    include_once('../includes/_connect.php');

	if(isset($_POST["email"]) && isset($_POST["password"])){
		$email = mysqli_real_escape_string($db_connect, $_POST["email"]);
		$encPass = mysqli_real_escape_string($db_connect, $_POST["password"]);
		$sql = "SELECT * FROM `tblUsers` WHERE `email` = '$email'";
		$run = mysqli_query($db_connect, $sql);
		$rows = mysqli_num_rows($run);
		$result = mysqli_fetch_assoc($run);
		$uid = $result['ID'];
		if ($rows > 0)
		{

			$passhash = $result["password"];
			$remember = $_POST['remember'];
			if(password_verify($encPass, $passhash)){
				if($_POST['remember'] != "false"){
					$days = 30;
					$value = encryptCookie($result['ID']);
					setcookie("remember", $value, time() + ($days * 24 * 60 * 60 * 1000));
					$_SESSION['userid'] = $uid;
					echo json_encode(array("statusCode"=> 200));
				}
				else{
					$_SESSION['userid'] = $uid;
					echo json_encode(array("statusCode"=> 200));
				}

			}
			else{
				echo json_encode(array("statusCode"=> 201));
			}	
		}
		else{
			echo json_encode(array("statusCode"=> 201));
		}	 
	}
	else{
		echo json_encode(array("statusCode"=> 201));
	}


	// Encrypt cookie
	function encryptCookie( $value ) {
		$hex = openssl_random_pseudo_bytes(4);
   		$key = hex2bin($hex);
   		$cipher = "aes-256-cbc";
   		$ivlen = openssl_cipher_iv_length($cipher);
   		$iv = openssl_random_pseudo_bytes($ivlen);
   		$ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);
   		return( base64_encode($ciphertext . '::' . $iv. '::' .$key) );
	}
?>