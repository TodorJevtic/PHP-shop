<?php
session_start();
include "db_conn.php";
if(isset($_POST['uname'])&& isset($_POST['password'])){
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	
	if(empty($uname)){
		header("Location: loginn.php?error=Username je obavezan");
		exit();
	}elseif(empty($pass)){
		header("Location: loginn.php?error=Password je obavezan");
		exit();
	}else{
		$pass = md5($pass);
		$sql = "SELECT * FROM korisnik WHERE username='$uname' AND password='$pass'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if($row['username'] ===$uname && $row['password']===$pass)
				$_SESSION['username'] = $row['username'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['korisnik_id'] = $row['korisnik_id'];
			header("Location: home.php");
			exit();
		}else{
			header("Location: loginn.php?error=Pogresan username ili password");
			exit();
		}
	}
}else{	
	header("Location: loginn.php");
	exit();
}
?>