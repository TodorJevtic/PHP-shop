<?php
session_start();
if (isset($_SESSION['korisnik_id']) && isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<head>	
	<meta charset="UTF-8">
	<title>Metal Rasa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="images/logo.png">
</head>
<body>
	<div id="home">
		<div id="home1">
			<h1>Zdravo, <?php echo $_SESSION['username'];?></h1>
			<div id="homee">
				<a href="index.html">Pocetna</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}else{
	header("Location: loginn.php");
		exit();
}


?>