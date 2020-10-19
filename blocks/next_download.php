<?php  
	$id = $_GET['id'];
	$nums = $_GET['num'];
	$nums--;
	$user = $_SESSION['username'];

	$qr_up = "UPDATE user SET num_of_download = $nums WHERE username = '$user'";
	$qr = "SELECT  download FROM `post` WHERE id_post = $id";

	$con->query($qr_up);
	$res = $con->query($qr);
	$down = $res->fetch_array(MYSQLI_ASSOC);
	echo '<div style="padding: 6px; background: red; border-radius: 5px; text-align: center; font-size: 20px; font-weight: 700; margin-top: 5px; width: 98%; margin: auto;">
			<a style="padding: 6px; background: none;
								border-radius: 5px;
								text-align: center;
								font-size: 20px;
								font-weight: 700;
								color: #fff;
								display: block;" href="'.$down['download'].'">DOWNLOAD NOW!</a></div>';
?>