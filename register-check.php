<?php
session_start();
include "db_conn.php";
$unmae= "root";
if(isset($_POST['uname']) && isset($_POST['password'])
	&& isset($_POST['email']) && isset($_POST['re_password'])){
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$email = validate($_POST['email']);
	$datumR = date("Y-m-d H:i:s");
	
	$user_data = 'uname='. $unmae. '&email='. $email;
	
	
	if(empty($email)){
		header("Location: register.php?error=E-mail je obavezan&$user_data");
		exit();
	}elseif(empty($uname)){
		header("Location: register.php?error=Username je obavezan&$user_data");
		exit();
	}elseif(empty($pass)){
		header("Location: register.php?error=Password je obavezan&$user_data");
		exit();
	}elseif(empty($re_pass)){
		header("Location: register.php?error=Ponovite vasu sifru&$user_data");
		exit();
	}elseif($pass !== $re_pass){
		header("Location: register.php?error=Lozinke se ne poklapaju&$user_data");
		exit();
	}else{
		$pass = md5($pass);
		$sql = "SELECT * FROM korisnik WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) > 0){
			header("Location: register.php?error=Username je zauzet&$user_data");
			exit();
		}else{
			$sql2 = "INSERT INTO korisnik(username, email, password, datum_registracije) VALUES('$uname','$email','$pass','$datumR')";
			$result2 = mysqli_query($conn, $sql2);
			if($result2){
				header("Location: register.php?success=Uspesno ste se registrovali&$user_data");
				exit();
			}else{
				header("Location: register.php?error=Greska u registraciji&$user_data");
				exit();
			}
		}


	}
}else{	
	header("Location: register.php");
	exit();
}
?>