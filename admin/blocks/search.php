<?php  
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else
		$page = 1;

	$key = $_GET['search'];
?>

<div class="cls"></div>
<div class="split"></div>

<div id="srot-link-story">
	<span><a href="index.php">Manager</a></span> <span>/</span>
	<span><a href="#">Search Post</a></span> <span>/</span>
	<span><a href="#"><?php echo $key; ?></a></span>
</div>

<div id="all-post">
	<?php  
		if($_SESSION['id'] == 2)
		{
			$user = $_SESSION['username'];

			$qr = "SELECT id_post, title FROM post WHERE title REGEXP '$key' and username = '$user' order by date_update DESC";
			$res = $con->query($qr);

			while ( $post = $res->fetch_array(MYSQLI_ASSOC) ) 
			{

	?>
	<div class="all-post-bh1 cls">
		<label class=""><a href="../index.php?q=post&id=<?php echo $post['id_post']; ?>" target="_blank"><?php echo $post['title']; ?></a></label>
		<div class="mt-2 split">
			<a href="index.php?q=edit&id=<?php echo $post['id_post']; ?>">EDIT</a>
			<!-- <a style="background: red;" href="#">DELETE</a> -->
		</div>
		<div class="cls"></div>
		<div class="split"></div>
	</div>
	<?php }} ?>

	<?php  
		if($_SESSION['id'] == 1)
		{
			$user = $_SESSION['username'];

			$qr = "SELECT id_post, title FROM post WHERE title REGEXP '$key' and username = '$user' order by date_update DESC";
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
		if($_SESSION['id'] == 0)
		{
			$qr = "SELECT `id_post`, `title` FROM `post` WHERE title REGEXP '$key' ORDER BY date_post DESC";
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