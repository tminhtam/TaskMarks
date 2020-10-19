<div id="top-view">
	<div class="femt-title">
		<h2 class="title-notice">hot post</h2>

	</div>
	<?php  
		$qr_hot = "SELECT `id_post`, `url_image`, `title`FROM `post` WHERE hot = 1 ORDER BY date_update DESC";
		$res_hot = $con->query($qr_hot);
		while ( $hot = $res_hot->fetch_array(MYSQLI_ASSOC) ) 
		{
	?>
	<div class="frame-content">
		<a href="post/<?php echo $hot['id_post']; ?>">
			<img src="<?php echo $hot['url_image']; ?>">
			<span><?php echo $hot['title']; ?></span>
		</a>
	</div>
	<?php } ?>
</div>

<div class="cls"></div>
<div class="split"></div>