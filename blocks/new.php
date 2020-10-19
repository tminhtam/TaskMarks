<div id="new-update">
	<div class="femt-title">
		<h2 class="title-notice">new post</a></h2>
	</div>

	<?php  
		$qr = "SELECT `id_post`, `url_image`,`title` FROM `post` ORDER BY date_update DESC LIMIT 0, 54";
		$result = $con->query($qr);
		while ( $post = $result->fetch_array(MYSQLI_ASSOC) )
		{
	?>

	<div class="frame-content">
		<a href="post/<?php echo $post['id_post']; ?>">
			<img src="<?php echo $post['url_image']; ?>">
			<span><?php echo $post['title']; ?></span>
		</a>
	</div>

	<?php } ?>
	
</div>

<div class="cls"></div>
<div class="split"></div>