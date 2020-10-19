<?php  
	$id = $_GET['id'];
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else
		$page = 1;
?>
<div id="new-update">

	<div class="femt-title">
		<h2 class="title-notice">
			<?php  
				$qr_title = "SELECT `title` FROM `type` WHERE id_type = $id";
				$res_titl = $con->query($qr_title);
				$title_filter = $res_titl->fetch_array(MYSQLI_ASSOC);
				$key = $title_filter['title'];
				echo $key;
			?>
		</a></h2>
	</div>


	<?php  
		$qr_bai = "SELECT p.id_post FROM post p, type_post t WHERE p.id_post = t.id_post AND t.title = '$key' and hide != 0";
		$res_bai = $con->query($qr_bai);

		$post_1_trang = 9;
		$tong_so_post = mysqli_num_rows($res_bai);
		$sotrang = ceil($tong_so_post/$post_1_trang);
		$form = (($page-1) * $post_1_trang);

		$qr = "SELECT p.id_post, p.title, p.url_image FROM post p, type_post t WHERE p.id_post = t.id_post AND t.title = '$key' and hide != 0 ORDER BY date_post DESC limit $form, $post_1_trang";
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
<?php 
	if($sotrang > 0)
	{
		for ($i=0; $i < 1; $i++)
		{
?>
<br>
<div class="pre">
	<a class="fist-page" href="index.php?q=filter&id=<?php echo $id; ?>&page=1"><img style="width: 15px; height: 15px; margin-top: 10px;" src="https://1.bp.blogspot.com/-WexwwFYi2ZA/XtBf7xLFpAI/AAAAAAAAAXk/kWQINBIFbnAiEzb_ognJtsOUiakvVV9kACLcBGAsYHQ/s1600/prve.png"></a>
	<div class="pre-prev"><a href="index.php?q=filter&id=<?php echo $id; ?>&page=<?php 
		if($page <= 1)
			echo '1';
		else
			echo ($page-1);
	?>">← Prev</a></div>

	<div class="pre-of"><?php echo $page; ?> of <?php echo $sotrang; ?></div>

	<div class ="pre-prev"><a href="index.php?q=filter&id=<?php echo $id; ?>&page=<?php  
		if($page < $sotrang)
			echo ($page+1);
		else if($page == $sotrang)
		echo $sotrang;
		else if($page > $sotrang)
		echo '1';
	?>">Next →</a></div>
	<a class="last-page" href="index.php?q=filter&id=<?php echo $id; ?>&page=<?php echo $sotrang; ?>"><img style="width: 15px; height: 15px; margin-top: 10px; margin-left: 5px;" src="https://1.bp.blogspot.com/-yAfvFHidYCo/XtBf73xEYiI/AAAAAAAAAXg/rxvbdOPARZQqs6fHTTqOQAKqfJxoHULpwCLcBGAsYHQ/s1600/next.png"></a>
</div>
<?php }} ?>
<div class="cls"></div>
<div class="split"></div>