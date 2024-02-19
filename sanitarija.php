<?php

@include "db_conn.php";

if(isset($_POST['kupi'])){
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_image = $_POST['product_image'];
	$product_quantity = 1;
	
   $select_cart = mysqli_query($conn, "SELECT * FROM `korpa` WHERE naziv = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'Proizvod vec postoji u korpi';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `korpa`(naziv, cena, slika, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'Uspesno ste dodali proizvod u korpu';
   }
}

?>
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
	<?php
	
	if(isset($message)){
		foreach($message as $message){
			echo '<div class="message"><span>'.$message.'</span> <i id="iks" class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
		}
	}
	
	?>
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
			<div class="box-container">
				<?php
							 
				$select_products = mysqli_query($conn, "SELECT * FROM `proizvod` WHERE proizvod.vrsta='sanitarija'");
					if(mysqli_num_rows($select_products) > 0){
						while($fetch_product = mysqli_fetch_assoc($select_products)){
				?>
				<form action="" method="post">
					<div class="okvir">
					<div class="kartica">
						<div class="img">
							<img src="uploads/<?php echo $fetch_product['slika']; ?>" alt="">
						</div>
						<div class="nazivispod">
							<h3><?php echo $fetch_product['naziv']; ?></h3></br>
							<h2 class="cena"><?php echo $fetch_product['cena']; ?> rsd</h2></br>
							<input type="hidden" name="product_name" value="<?php echo $fetch_product['naziv']; ?>">
							<input type="hidden" name="product_price" value="<?php echo $fetch_product['cena']; ?>">
							<input type="hidden" name="product_image" value="<?php echo $fetch_product['slika']; ?>">
							<input class="kupi" type="submit" value="kupi" name="kupi">
						</div>
					</div>
					</div>
				</form>
				
				
				<?php
					};
				};
				?>
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