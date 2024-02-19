<?php

@include "db_conn.php";

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `korpa` SET quantity = '$update_value' WHERE korpa_id = '$update_id'");
   if($update_quantity_query){
      header('location:korpa.php');
   };
};
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `korpa` WHERE korpa_id = '$remove_id'");
   header('location:korpa.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `korpa`");
   header('location:korpa.php');
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
			<div id="korpaa">
				<div class="shopping-cart">
					<table>
						<thead>
							<th>slika</th>
							<th>naziv</th>
							<th>cena</th>
							<th>quantity</th>
							<th>konacno</th>
							<th>-</th>
						</thead>
						<tbody>
							<?php
							
							$select_cart = mysqli_query($conn, "SELECT * FROM `korpa`");
							$grand_total = 0;
							
							if(mysqli_num_rows($select_cart) > 0){
							   while($fetch_cart = mysqli_fetch_assoc($select_cart)){
							?>
							
							<tr>
								<td><img src="uploads/<?php echo $fetch_cart['slika']; ?>" height="80" alt=""></td>
								<td><?php echo $fetch_cart['naziv']; ?></td>
								<td><?php echo $fetch_cart['cena']; ?> rsd</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['korpa_id']; ?>">
										<input type="number" min="1" name="update_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
										<input type="submit" value="osvezi" name="update_update_btn">
									</form>
								</td>
								<td><?php echo $sub_total =$fetch_cart['cena'] * $fetch_cart['quantity']; ?> rsd</td>
								<td><a href="korpa.php?remove=<?php echo $fetch_cart['korpa_id']; ?>" onclick="return confirm('Da li zelite da uklonite proizvod?')" class="delete-btn"><i class="fas fa-trash"></i>izbrisati</a></td>
							</tr>
							<?php
								$grand_total += (int)$sub_total;
							   };
							};
							?>
							<tr class="table-bottom">
								<td><a href="alati.php" class="option-btn" style="margin-top:0px;">nastaviti kupovinu</a> </td>
								<td colspan="3">UKUPNO</td>
								<td><?php echo $grand_total; ?> rsd</td>
								<td><a href="korpa.php?delete_all" onclick="return confirm('Da li ste sigurni da hocete da izbrisete sve iz korpe?');" class="delete-btn"><i class="fas fa-trash"></i>izbrisati sve</a></td>
						</tbody>
					</table>
					<div class="checkout-btn">
						<a href="porucivanje.php" class="checkout_btn">Poruciti ovde</a>
					</div>
				</div>
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