<?php  
	$key = $_GET['search'];
	if($key == "'" || $key == "" || $key == "-" || $key == "--")
		header('location: index.php?q=erro');
?>
<div id="new-update">
	<div class="femt-title">
		<h2 class="title-notice">Search</h2>
	</div>

	<?php  
		$qr = "SELECT * FROM `post` WHERE title REGEXP '$key' and hide != 0 order by date_post DESC";
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