<?php  
	if(isset($_GET['id']))
		$id = $_GET['id'];
	else
		$id = 1;
?>

<?php  
	$qr = "SELECT `id_post`, `title`, `url_image`, `content`, download, `view`, `date_post`, `date_update`, username FROM `post` WHERE id_post = $id";
	$res = $con->query($qr);
	if(mysqli_num_rows($res) <= 0)
		header('location:index.php');
	$post = $res->fetch_array(MYSQLI_ASSOC);
	$user_post = $post['username'];

?>

<?php  
	$qr_up = "UPDATE `post` SET `view`= view + 1 WHERE id_post = $id";
	$con->query($qr_up);
?>

<?php  
	$qr_user = "SELECT `displayName` FROM `user` WHERE username = '$user_post'";
	$res_us = $con->query($qr_user);
	$user_dis = $res_us->fetch_array(MYSQLI_ASSOC);
?>

<div id="srot-link-story">
	<span><a href="index.php">Home</a></span> <span>/</span>
	<span><?php echo $post['title']; ?></span>
</div>

<div id="post" style="width: 100%;">
	<div class="info" style="padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-bottom: 1px solid #ccc;">
		<span><b>Post: </b>
			<?php 
				$date_post = date_create($post["date_post"]);
				echo date_format($date_post,"d/m/Y H:i:s");
			?>
		</span> 
		<span>→</span>
		<span><b>Views: </b><?php echo $post['view']; ?></span>
	</div>

	<div id="content-post">
		<img src="<?php echo $post['url_image']; ?>">
		<br>
		<?php echo $post['content']; ?>	
		<br>

		<?php 
			if($post['download'] != null)
			{
				if(isset($_SESSION['username']))
				{
					$se_user = $_SESSION['username'];
					$qr_n_down = "SELECT `num_of_download` FROM `user` WHERE username = '$se_user'";
					$res_nu_down = $con->query($qr_n_down);
					$num_down = $res_nu_down->fetch_array(MYSQLI_ASSOC);
					$num_downs = $num_down['num_of_download'];
						
					if($_SESSION['displayname'] == $user_dis['displayName'])
					{

						echo '<div><a href="'.$post['download'].'" target="_blank">DOWNLOAD</a></div>';
					}
					else
					{					
						if($num_downs == "NO LIMIT")
							echo '<div><a href="'.$post['download'].'" target="_blank">DOWNLOAD</a></div>';
						else if($num_downs <= 0)
							echo '<br/><div style="padding: 6px;
								background: gold;
								border-radius: 5px;
								text-align: center;
								font-size: 20px;
								font-weight: 700;
								margin-top: 5px;"><a style="padding: 6px;
								background: none;
								border-radius: 5px;
								text-align: center;
								font-size: 20px;
								font-weight: 700;
								color: #171519;
								display: block;" href="#">YOU DONT HAVE PERMISSION TO DOWNLOAD THIS FILE!</a></div>
							';
						else
							echo '<div><a href="index.php?q=next&id='.$id.'&num='.$num_downs.'">DOWNLOAD</a></div>';
					}
				}
				else
					echo '<br/><div style="padding: 6px;
							background: #03a9f4;
							border-radius: 5px;
							text-align: center;
							font-size: 20px;
							font-weight: 700;
							margin-top: 5px;"><a style="padding: 6px;
							background: #03a9f4;
							border-radius: 5px;
							text-align: center;
							font-size: 20px;
							font-weight: 700;
							color: #fff;
							display: block;" href="login/index.php?id='.$id.'">LOGIN TO DOWNLOAD</a></div>
						';
			}
		?>
		<br>
	</div>


	<div class="info" style="padding-left: 15px; padding-top: 5px; padding-bottom: 5px; border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;">
		<b>Tag: </b>
		<?php  
			$qr_ty = "SELECT t.title, t1.id_type FROM type_post t, type t1 WHERE id_post = $id AND t.title = t1.title";
			$res_ty = $con->query($qr_ty);
			$num_ty = mysqli_num_rows($res_ty);
			$tmp = 1;
			while ( $type = $res_ty->fetch_array(MYSQLI_ASSOC) ) 
			{
		?>
		<span><a href="type/<?php echo $type['id_type']; ?>"><?php echo $type['title']; ?></a></span> 
		<?php if($tmp < $num_ty) echo ","; ?>
		<?php $tmp++;} ?>
		<br>
		<span><b>Update: </b>
			<?php 
				$date_update = date_create($post["date_update"]);
				echo date_format($date_update,"d/m/Y H:i:s");
			?>
		</span> 
		<br>
		<b>Post by: </b>
		<span style="text-transform: uppercase;">
		<?php 
			echo $user_dis['displayName'];
		?>	
		</span>
	</div>
	
</div>

<div class="ah-pif-footer">
    <div class="fb-comments" data-href="http://taskmarks.atwebpages.com/<?php echo $id; ?>" data-numposts="5" data-order-by="reverse_time" colorscheme="light" data-colorscheme="light" data-width="100%" width="100%"></div>      
</div>

<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=527870361017285&autoLogAppEvents=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));
</script>