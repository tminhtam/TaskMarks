<?php 
	include('../../lib/dbCon.php'); 
	$user = $_GET['user'];
	$num = $_GET['num'];
	$qr = "UPDATE `user` SET `num_of_download`= num_of_download + $num WHERE username = '$user'";
	$con->query($qr);
	header('location:../index.php?q=download');
?>