<div id="srot-link-story">
	<span><a href="index.php">Manager</a></span> <span>/</span>
	<span>Create Post</span> 
</div>

<form method="post" action="process/create_post.php">
	<div class="form-content">
		<div class="cont-h1">
			<label class="tit-x">Title</label> <br>
			<input class="nhap" type="text" name="title" value="" placeholder="Your title...">
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Url Image</label> <br>
			<input class="nhap" type="text" name="url_image" value="" placeholder="Your link image...">
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Type Post</label> <br><br>
			<?php  
				$qr1 = "SELECT id_type, title FROM `type`";
				$res = $con->query($qr1);
				while ( $type = $res->fetch_array(MYSQLI_ASSOC) ) 
				{
			?>
			<span style="border: 1px solid #ccc; padding: 5px;display: inline-block;margin-bottom: 5px;border-radius: 4px;background: #fff;">
				<label class="tit-x" style="background: none;" for="ckb<?php echo $type['id_type']; ?>"><?php echo $type['title']; ?></label> &#160;
				<input id="ckb<?php echo $type['id_type']; ?>" style="background: none;" type="checkbox" name="ckb<?php echo $type['id_type']; ?>" value="<?php echo $type['title']; ?>">&#160;
			</span>
			<?php } ?>
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Content</label> <br><br>
			<textarea class="conten-nhap"  maxlength="6000" name="summary" placeholder="Your content..." rows="10"></textarea>
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Link Download</label> <br><br>
			<textarea class="y-link" maxlength="1000" name="download" placeholder="Your link..." rows="2"></textarea>
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x" for="post-hot">HOT</label>
			<input id="post-hot" type="checkbox" name="ckb_hot" value="tam">
		</div>
		<div class="cont-h1" style="display: none;">
			<label class="tit-x">User</label> <br>
			<input class="nhap" type="text" name="user" value="<?php echo $_SESSION['username']; ?>" placeholder="user">
		</div>
		<br>
		<div class="cont-h1">
			<input class="btnSubmit" type="submit" name="save_post" value="Post Now">
		</div>
	</div>
</form>