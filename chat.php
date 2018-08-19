<?php 
require "conf.php";
// require "add.php";
if (isset($_SESSION["email"])) {
	$userId=$_SESSION["email"]; 
	$denetle=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM chat"));
	if ($denetle!=0) {
		$sorgu=mysqli_query($conn,"SELECT * FROM chat");
		while ($row=mysqli_fetch_assoc($sorgu)) {
			// $urow=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM"))
			echo "<div class='list'>".$row['user_id'].'(<small>'.$row["mesaj_tarihi"].'</small>) <br>'.$row["mesaj"]."</div>";
		}
	}
	else{
		echo "<div class='list'>Henuz mesaj yok</div>";
	}

if ($_POST) {
	$mesaj=strip_tags($_POST["mesaj"]);
	if ($mesaj=="") {
		echo "Mesaj bos olmaz";
	}
	else{
		$esql=mysqli_query($conn,"INSERT INTO `chat`(`user_id`, `mesaj`, `mesaj_tarihi`) VALUES ('$userId','$mesaj','".date("Y-m-d")."')");
		if ($esql) {
			header("Location:chat.php");
		}
		else{
			echo "<div class='list'>Mysqli hatasi</div>";
		}
	}
}




	echo '<form action="#" method="POST">
 	<div class="list">
 		<textarea rows="5" name="mesaj"></textarea>
 		<br>
 		<br>
 		<input type="submit" value="gonder">
 	</div>
 </form>';
}
else{
	echo "Giris yapmadan chat olmaz";
}

 ?>
 <a href="exit.php">cixis</a>