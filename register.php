<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Metal Rasa</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="images/logo.png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Sora:wght@800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Montserrat+Subrayada:wght@700&family=Oswald:wght@700&family=Quicksand:wght@500&display=swap" rel="stylesheet">
	</head>
	<body>
		<section class="wrapper">
			<header>
				<h1>Gvožđara Metal Raša</h1>
			</header>
			<div id="glavni">
				<header>
					<nav id="navigation">
						<ul>
							<li class="active"><a href="index.html">Pocetna</a></li>
							<li><a href="o nama.html">O nama</a></li>
							<li><a href="alati.php">Alati</a></li>
							<li><a href="rasveta.php">Rasveta</a></li>
							<li><a href="sanitarija.php">Sanitarija</a></li>
							<li><a href="kontakt.html">kontakt</a></li>	
							<nav class="logo">
								<a href="loginn.php"><img src="images/user.png" alt="" width = "33" height = "27"></a>
								<a href="korpa.php"><img src="images/bag.png" alt="" width = "33" height = "27"></a>
							</nav>
						</ul>
					</nav>
				</header>
			</div>
			<div id="formalogin">
				<form id="loginforma" action="register-check.php" method="post">
					<h2>REGISTRACIJA</h2>
					<?php if (isset($_GET['error'])) { ?>
						<p class="error"><?php echo $_GET['error']; ?></p>
					<?php } ?>
					
					<?php if (isset($_GET['success'])) { ?>
						<p class="success"><?php echo $_GET['success']; ?></p>
					<?php } ?>
					<label>E-mail</label>
					<input type="email" name="email">
					<label>Username</label>
					<input type="text" name="uname">
					<label>Password</label>
					<input type="password" name="password">
					<label>Re-password</label>
					<input type="password" name="re_password">
					<button type="submit">REGISTER</button>
					<div class="para-2">
						Imate account? Login se <a href="loginn.php">ovde</a>
					</div>
				</form>
			</div>
			<footer>
				<div class="social">
					 <a href="https://www.facebook.com/profile.php?id=100009135678164"><i class="fab fa-facebook-f"></i></a>
					 <a href="https://twitter.com/home?lang=sr"><i class="fab fa-twitter"></i></a>
					 <a href="https://en.wikipedia.org/wiki/Google%2B"><i class="fab fa-google-plus-g"></i></a>
					 <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
					 <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
				</div>
				<p>&copy; Mp3 Shop doo 2021.Sva prava zadržana.</p>
			</footer>
		</section>		
	</body>
</html>