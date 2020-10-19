<div id="top-view">
	<div class="femt-title">
		<h2 class="title-notice">hot post <a class="see-more" href="hot">See more >></a></h2>

	</div>
	<?php  
		$qr_hot = "SELECT `id_post`, `url_image`, `title`FROM `post` WHERE hot = 1 ORDER BY date_update DESC LIMIT 0, 6";
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

<div id="new-update">
	<div class="femt-title">
		<h2 class="title-notice">new post <a class="see-more" href="new">See more >></a></h2>
	</div>

	<?php  
		$qr = "SELECT `id_post`, `url_image`,`title` FROM `post` where hide != 0 ORDER BY date_update DESC LIMIT 0, 12";
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