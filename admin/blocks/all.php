<?php  
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else
		$page = 1;
?>

<div id="search">
	<form>
		<input type="text" name="search" placeholder="Enter to find post...">
		<img src="../them/search.png">
	</form>
</div>

<div class="cls"></div>
<div class="split"></div>

<div id="srot-link-story">
	<span><a href="index.php">Manager</a></span> <span>/</span>
	<span><a href="#">All Post</a></span>
</div>

<div id="all-post">
	<?php  
		if($_SESSION['id'] == 1)
		{
			$user = $_SESSION['username'];

			$qr_bai = "SELECT `id_post` FROM `post` WHERE username = '$user'";
			$res_bai = $con->query($qr_bai);

			$post_1_trang = 10;
			$tong_so_post = mysqli_num_rows($res_bai);
			$sotrang = ceil($tong_so_post/$post_1_trang);
			$form = (($page-1) * $post_1_trang);

			$qr = "SELECT `id_post`, `title` FROM `post` WHERE username = '$user' ORDER BY date_update DESC limit $form, $post_1_trang";
			$res = $con->query($qr);

			while ( $post = $res->fetch_array(MYSQLI_ASSOC) ) 
			{

	?>
	<div class="all-post-bh1 cls">
		<label class=""><a href="../index.php?q=post&id=<?php echo $post['id_post']; ?>" target="_blank"><?php echo $post['title']; ?></a></label>
		<div class="mt-2 split">
			<a href="index.php?q=edit&id=<?php echo $post['id_post']; ?>">EDIT</a>
			<label class="btn_DEL" style="background: red;width: 79px;height: 33px;padding: 7px;color: #fff;border-radius: 5px;border:none; font-family: Times New Roman !important;font-size: 17px;font-weight: 300;" for="DEL">DELETE</label>
			<input style="display: none;" id="DEL" type="checkbox" name="ckb_DEL" value="<?php echo $post['id_post']; ?>" onclick="xoa();">
		</div>
		<div class="cls"></div>
		<div class="split"></div> 		
	</div>
	<?php }} ?>

	<?php  
		if($_SESSION['id'] == 2)
		{
			$user = $_SESSION['username'];

			$qr_bai = "SELECT `id_post` FROM `post` WHERE username = '$user'";
			$res_bai = $con->query($qr_bai);

			$post_1_trang = 10;
			$tong_so_post = mysqli_num_rows($res_bai);
			$sotrang = ceil($tong_so_post/$post_1_trang);
			$form = (($page-1) * $post_1_trang);

			$qr = "SELECT `id_post`, `title` FROM `post` WHERE username = '$user' ORDER BY date_update DESC limit $form, $post_1_trang";
			$res = $con->query($qr);

			while ( $post = $res->fetch_array(MYSQLI_ASSOC) ) 
			{

	?>
	<div class="all-post-bh1 cls">
		<label class=""><a href="../index.php?q=post&id=<?php echo $post['id_post']; ?>" target="_blank"><?php echo $post['title']; ?></a></label>
		<div class="mt-2 split">
			<a href="index.php?q=edit&id=<?php echo $post['id_post']; ?>">EDIT</a>
		</div>
		<div class="cls"></div>
		<div class="split"></div>
	</div>
	<?php }} ?>

	<?php  
		if($_SESSION['id'] == 0)
		{
			$qr_bai = "SELECT `id_post` FROM `post`";
			$res_bai = $con->query($qr_bai);

			$post_1_trang = 10;
			$tong_so_post = mysqli_num_rows($res_bai);
			$sotrang = ceil($tong_so_post/$post_1_trang);
			$form = (($page-1) * $post_1_trang);

			$qr = "SELECT `id_post`, `title` FROM `post` ORDER BY date_update DESC limit $form, $post_1_trang";
			$res = $con->query($qr);

			while ( $post = $res->fetch_array(MYSQLI_ASSOC) ) 
			{

	?>
	<div class="all-post-bh1 cls">
		<label class=""><a href="../index.php?q=post&id=<?php echo $post['id_post']; ?>" target="_blank"><?php echo $post['title']; ?></a></label>
		<div class="mt-2 split">
			<a href="index.php?q=edit&id=<?php echo $post['id_post']; ?>">EDIT</a>
			<label class="btn_DEL" style="background: red;width: 79px;height: 33px;padding: 7px;color: #fff;border-radius: 5px;border:none; font-family: Times New Roman !important;font-size: 17px;font-weight: 300;" for="DEL">DELETE</label>
			<input style="display: none;" id="DEL" type="checkbox" name="ckb_DEL" value="<?php echo $post['id_post']; ?>" onclick="xoa();">
		</div>
		<div class="cls"></div>
		<div class="split"></div>
	</div>
	<?php }} ?>

<?php 
	if($sotrang >= 1) 
	{
		for ($i=0; $i < 1 ; $i++) { 

?>

	<div class="pre">
		<a class="fist-page" href="index.php?q=all&page=1"><img style="width: 15px; height: 15px; margin-top: 10px;" src="https://1.bp.blogspot.com/-WexwwFYi2ZA/XtBf7xLFpAI/AAAAAAAAAXk/kWQINBIFbnAiEzb_ognJtsOUiakvVV9kACLcBGAsYHQ/s1600/prve.png"></a>
		<div class="pre-prev"><a href="index.php?q=all&page=<?php 
			if($page <= 1)
				echo 'index.php?q=all&page=1';
			else
				echo 'index.php?q=all&page='.($page-1);
		?>">← Prev</a></div>
		<div class="pre-of"><?php echo $page; ?> of <?php echo $sotrang; ?></div>
		<div class ="pre-prev"><a href="index.php?q=all&page=<?php  
			if($page < $sotrang)
				echo 'index.php?q=all&page='.($page+1);
			else if($page == $sotrang)
			echo 'index.php?q=all&page='.$sotrang;
			else if($page > $sotrang)
			echo 'index.php?q=all&page=1';
		?>">Next →</a></div>
		<a class="last-page" href="index.php?q=all&page=<?php echo $sotrang; ?>"><img style="width: 15px; height: 15px; margin-top: 10px; margin-left: 5px;" src="https://1.bp.blogspot.com/-yAfvFHidYCo/XtBf73xEYiI/AAAAAAAAAXg/rxvbdOPARZQqs6fHTTqOQAKqfJxoHULpwCLcBGAsYHQ/s1600/next.png"></a>
	</div>

<?php }} ?>

</div>

<script type="text/javascript">

	function xoa(){
		if(confirm("Do You Want To Delete Post?") == true)
		{
			var checkbox = document.getElementsByName("ckb_DEL");

            for (var i = 0; i < checkbox.length; i++)
                if (checkbox[i].checked == true)
                    window.location="process/delete_post.php?id="+checkbox[i].value;
		}
		else
			return;
		
	}
</script>