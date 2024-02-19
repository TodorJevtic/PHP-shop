<?php

@include "db_conn.php";

if(isset($_POST['order_btn'])){
	
	$name = $_POST['ime'];
    $lname = $_POST['prezime'];	
	$number = $_POST['telefon'];   
	$email = $_POST['email'];    
	$address = $_POST['adresa'];
	$state = $_POST['opstina'];
	$city = $_POST['grad'];
    $method = $_POST['method'];
	$price_total=0;
	
	$cart_query = mysqli_query($conn, "SELECT * FROM `korpa`");
	if(mysqli_num_rows($cart_query) > 0){
		while($product_item = mysqli_fetch_assoc($cart_query)){
			$product_name[] = $product_item['naziv'] .' ('. $product_item['quantity'] .') ';
			$product_price = ($product_item['cena'] * $product_item['quantity']);
			$price_total += (int)$product_price;
        };
    };
	
	$total_product = implode(', ',$product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `porudzbenica`(ime, prezime, email, telefon, adresa, opstina, grad, nacin_placanja, ukupno_proizvoda, ukupna_cena) VALUES('$name','$lname','$email','$number','$address','$state','$city','$method','$total_product','$price_total')") or die('query failed');
	
	if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Hvala na saradnji</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Ukupno : ".$price_total." rsd  </span>
         </div>
         <div class='customer-details'>
            <p> Vase ime : <span>".$name."</span> </p>
			<p> Vase prezime : <span>".$lname."</span> </p>
            <p> Vas broj : <span>".$number."</span> </p>
            <p> Vas email : <span>".$email."</span> </p>
            <p> Vasa adresa : <span>".$address."</span> </p>
            <p> Nacin placanja : <span>".$method."</span> </p>
         </div>
            <a href='alati.php' class='option-btn'>nastaviti kupovinu</a>
         </div>
      </div>
      ";
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
			<section id="checkout-form">
				<h2>Popunite podatke</h2>
				<form action="" method="post">
					<div class="flex">
						<div class="inputBox">
							<span>Vase ime</span>
							<input type="text" placeholder="Unesite vase ime" name="ime" required>
						</div>
						<div class="inputBox">
							<span>Vase prezime</span>
							<input type="text" placeholder="Unesite vase prezime" name="prezime" required>
						</div>
						<div class="inputBox">
							<span>Vas e-mail</span>
							<input type="email" placeholder="Unesite vas e-mail" name="email" required>
						</div>
						<div class="inputBox">
							<span>Vas telefon</span>
							<input type="number" placeholder="Unesite vas broj telefona" name="telefon" required>
						</div>	
						<div class="inputBox">
							<span>Adresa</span>
							<input type="text" placeholder="Unesite vasu adresu" name="adresa" required>
						</div>
						<div class="inputBox">
							<span>Opstina</span>
							<input type="text" placeholder="Unesite opstinu" name="opstina" required>
						</div>
						<div class="inputBox">
							<span>Grad</span>
							<input type="text" placeholder="Unesite grad" name="grad" required>
						</div>
						<div class="inputBox">
							<span>Opcije placanja</span>
							<select name="method">
								<option value="visa">Visa</option>
								<option value="master">Master card</option>
								<option value="paypal">Paypal</option>
								<option value="pouzecem">Pouzecem</option>
							</select>
						</div>
					</div>
					<input type="submit" value="narucite" name="order_btn" class="checkout_btn">
				</form>
			</section>
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