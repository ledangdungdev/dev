<?php 
	$lddata_connect = mysqli_connect("localhost", "root", "") or die("Unable to connect database!");
	mysqli_select_db($lddata_connect, "ledangdung");
?>