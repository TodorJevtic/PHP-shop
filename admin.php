<?php

@include "db_conn.php";

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_type = $_POST['p_type'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploads/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `proizvod`(naziv, cena, vrsta, slika) VALUES('$p_name', '$p_price', '$p_type', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Proizvod dodat';
   }else{
      $message[] = 'Nije moguce dodati prozvod';
   }
}
if(isset($_GET['delete'])){
	$delete_id = $_GET['delete'];
	$delete_query = mysqli_query($conn, "DELETE FROM `proizvod` WHERE proizvod_id = $delete_id");
	if($delete_query){
		$message[] = 'Proizvod obrisan';
	}else{
		$message[] = 'Nije moguce brisanje proizvoda';
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
			<div id="aforma">
				<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
					<h3>DODAJTE NOVI PROIZVOD</h3>
					<input type="text" name="p_name" placeholder="Unesite ime prozvoda" class="box" required>
					<input type="number" name="p_price" min="0" placeholder="Unesite cenu prozvoda" class="box" required>
					<input type="text" name="p_type" placeholder="Unesite vrstu prozvoda" class="box" required>
					<input type="file" name="p_image" min="0" accept="image/png, image/jpg, image/jpeg" class="box" required>
					<input type="submit" value="DODAJ" name="add_product" class="btn">
				</form>
			</div>
			<div id="display-product-table">
				<table id="formaizmena">
					<thead>
						<th>slika proizvoda</th>
						<th>ime proizvoda</th>
						<th>cena proizvoda</th>
						<th>vrsta proizvoda</th>
						<th>akcija</th>
					</thead>
					<tbody>
						 <?php
						 
							$select_products = mysqli_query($conn, "SELECT * FROM `proizvod`");
							if(mysqli_num_rows($select_products) > 0){
							   while($row = mysqli_fetch_assoc($select_products)){
						 ?>

						 <tr>
							<td><img src="uploads/<?php echo $row['slika']; ?>" height="90" alt=""></td>
							<td><?php echo $row['naziv']; ?></td>
							<td><?php echo $row['cena']; ?>din</td>
							<td><?php echo $row['vrsta']; ?></td>
							<td>
								<a href="admin.php?delete=<?php echo $row['proizvod_id']; ?>" class="delete-btn" onclick="return confirm('Jeste sigurni da zelite da obrisete proizvod');"> <i class="fas fa-trash"></i> delete </a>
								<a href="admin.php?edit=<?php echo $row['proizvod_id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
							</td>
						 </tr>

						 <?php
							};    
							}else{
							   echo "<div class='empty'>Nijedan proizvod nije dodat</div>";
							};
						 ?>
					</tbody>
				</table>
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