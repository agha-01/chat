<?php 
require 'conf.php';
if (@$_POST["email"]==null) {
	echo "Bir email girin";
}
else{
	$email=$_POST["email"];
	$pass=md5($_POST["pass"]);
	$login=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
	if (mysqli_num_rows($login)==0) {
		echo "Bele istifadeci yoxdur";
	}
	else{
		$row=mysqli_fetch_assoc($login);
		if ($row["pass"]!=$pass) {
			echo "parol sehvdir";
		}
		else{
			echo "Xos geldiniz";
			$_SESSION["email"]=$email;
			require "home.php";
		}
	}
}











 ?>