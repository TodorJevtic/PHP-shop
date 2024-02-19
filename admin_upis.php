<?php

include "db_conn.php";
echo "hello";
if(isset($_POST['add_product)'])){
	$p_name = $_POST['p_name'];
	$p_price = $_POST['p_price'];
	$p_image = $_FILES['p_image']['name'];
	$p_image_tpm_name = $_FILES['p_image']['tmp_name'];
	$p_image_folder = 'uploaded_img/'.$p_image;
	
	$insert_query = "INSERT INTO proizvod(naziv, cena, slika) VALUES('$p_name','$p_price','$p_imag')";
	if($insert_query){
		move_uploaded_file($p_image_tpm_name, $p_image_folder);
		$message[] = 'Uspesno dodat proizvod';
	}else{
		$message[] = 'Nije moguce dodati proizvod';
	}
}
?>