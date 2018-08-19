<?php 
require 'conf.php';
if ($_POST["email"]==null) {
	echo "bir email girin";
}
else{
	$email=$_POST["email"];
	$uname=$_POST["uname"];
	$pass=md5($_POST["pass"]);
	$repass=md5($_POST["repass"]);
	$radio=$_POST["radio"];
	$confirm=$_POST["confirm"];
	if ($pass!=$repass) {
		echo "parol eyni deyil";
	}
	else{
		$esql=mysqli_num_rows(mysqli_query($conn,"SELECT email FROM users WHERE email='$email'"));
		if ($esql!=0) {
			echo "bu email qeydiyyatdan kecib";
		}
		else{
			$sql=mysqli_query($conn,"INSERT INTO `users`(`name`, `email`, `pass`, `radio`, `confirm`) VALUES ('$uname','$email','$pass','$radio','$confirm')");
			if (!$sql) {
				echo "error";
			}
			else{
				$_SESSION["email"]=$email;
				require 'home.php';
				echo "Ugurla kecdiniz";
			}
		}
	}
}












 ?>