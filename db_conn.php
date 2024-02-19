<?php

$conn = new mysqli('localhost:4306','todor','root','todor');
if(!$conn){
	echo "Nije uspela konekcija";
}
setcookie("username", $username, time()+(84600*30),"/");

?>