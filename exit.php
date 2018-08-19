<?php 
require "conf.php";
session_unset();
session_destroy();

 ?>
<script>
	setTimeout(function(){
		location.replace("index.php");
	});
</script>