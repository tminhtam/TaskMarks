<?php  
	include('../../lib/dbCon.php');
	$id = $_GET['id'];
	
	$qr = "DELETE FROM `type_post` WHERE id_post =  $id";
	$qr2 = "DELETE FROM `post` WHERE id_post =  $id";

	$con->query($qr);
	$con->query($qr2);
	header('location:../index.php?q=all');
?>