<?php 
	include('../../lib/dbCon.php'); 
	$user = $_GET['user'];
	$qr = "UPDATE `user` SET `num_of_download`= 0 WHERE username = '$user'";
	$con->query($qr);
	header('location:../index.php?q=download');
?>