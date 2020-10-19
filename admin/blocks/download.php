<?php  
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else
		$page = 1;
?>

<div class="cls"></div>
<div class="split"></div>

<div id="srot-link-story">
	<span><a href="index.php">Manager</a></span> <span>/</span>
	<span><a href="#">Num of Download</a></span>
</div>

<div id="all-post">
	<?php  
		$user = $_SESSION['username'];

		$qr = "SELECT `username`, `num_of_download` FROM `user` WHERE gr_user != 0";
		$res = $con->query($qr);

		while ( $post = $res->fetch_array(MYSQLI_ASSOC) ) 
		{

	?>
	<div class="all-post-bh1 cls">
		<label style="text-transform: uppercase;"><?php echo $post['username']; ?></label>
		<div class="mt-2 split">
			<a href="process/add_download.php?user=<?php echo $post['username']; ?>&num=1">ADD x1</a>
			<a href="process/add_download.php?user=<?php echo $post['username']; ?>&num=3">ADD x3</a>
			<a href="process/add_download.php?user=<?php echo $post['username']; ?>&num=5">ADD x5</a>
			<a href="process/add_download.php?user=<?php echo $post['username']; ?>&num=10">ADD x10</a>
			<br>
			<br>
			<a style="background: red;" href="process/del_download.php?user=<?php echo $post['username']; ?>">DELETE</a>
		</div>
		<div class="cls"></div>
		<div class="split"></div>
	</div>
	<?php } ?>

</div>

