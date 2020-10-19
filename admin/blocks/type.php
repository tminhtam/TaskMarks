<div id="srot-link-story">
	<span><a href="index.php">Manager</a></span> <span>/</span>
	<span><a href="#">All Tag Type</a></span>
</div>

<div id="all-post">
	<?php  
		if($_SESSION['id'] == 0)
		{
			$user = $_SESSION['username'];

			$qr = "SELECT `id_type`, `title` FROM `type`";
			$res = $con->query($qr);

			while ( $post = $res->fetch_array(MYSQLI_ASSOC) ) 
			{

	?>
	<div class="all-post-bh1 cls">
		<label class=""><a href="#" target="_blank"><?php echo $post['title']; ?></a></label>
		<div class="mt-2 split">
			<a href="#">EDIT</a>
			<a style="background: red;" href="#">DELETE</a>
		</div>
		<div class="cls"></div>
		<div class="split"></div>
	</div>
	<?php }} ?>
</div>
<?php  
	if($_SESSION['id'] != 0){
		echo '<div style="padding: 6px;
							background: gold;
							border-radius: 5px;
							text-align: center;
							font-size: 20px;
							font-weight: 700;
							margin-top: 5px;width:90%; margin: 0 auto;">
								<a style="padding: 6px;
								background: none;
								border-radius: 5px;
								text-align: center;
								font-size: 20px;
								font-weight: 700;
								color: #171519;
								display: block;" href="#" target="_blank">YOU HAVE NO RIGHT TO SEE THIS SECTION!</a>
							</div><br/><br/>
						';
	}
?>