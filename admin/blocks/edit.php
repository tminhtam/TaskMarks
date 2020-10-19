<?php  
	$id = $_GET['id'];

	$qr = "SELECT `url_image`, `content`, `download`, `title`, `hot` FROM `post` WHERE id_post = $id";
	$res = $con->query($qr);
	$post = $res->fetch_array(MYSQLI_ASSOC);
	$content = str_replace("<br/>", "\n", $post["content"]);
?>
<div id="srot-link-story">
	<span><a href="index.php">Manager</a></span> <span>/</span>
	<span><a href="index.php?q=all">All Post</a></span> <span>/</span>
	<span><a href="../index.php?q=post&id=<?php echo $id; ?>"><?php echo $post['title']; ?></a></span> <span>/</span>
	<span>Edit</span> 
</div>

<form name="f" method="post" action="process/edit_post.php">
	<div class="form-content">
		<h1 class="f-title"><?php echo $post['title']; ?></h1>
		<div class="cont-h1">
			<label class="tit-x">Title</label> <br>
			<input class="nhap" type="text" name="title" maxlength="300" placeholder="Your title..." value="<?php echo $post['title']; ?>">
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Url Image</label> <br>
			<input class="nhap" type="text" name="url_image" maxlength="1200" placeholder="Your link image..." value="<?php echo $post['url_image']; ?>">
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Type Post</label> <br><br>
			<?php  
				$qr_arr = "SELECT `title` FROM `type_post` WHERE id_post = $id";
				$res_arr = $con->query($qr_arr);
				$arr = array(); $numaaa = 0;
				while ( $ty_arr = $res_arr->fetch_array(MYSQLI_ASSOC) ) {
					$arr[$numaaa] = $ty_arr['title'];
					$numaaa++;
				}
			?>
			<?php  
				$qr1 = "SELECT id_type, title FROM `type`";
				$res = $con->query($qr1);
				while ( $type = $res->fetch_array(MYSQLI_ASSOC) ) 
				{
			?>
			<span style="border: 1px solid #ccc; padding: 5px;display: inline-block;margin-bottom: 5px;border-radius: 4px;background: #fff;">
				<label class="tit-x" style="background: none;" for="ckb<?php echo $type['id_type']; ?>"><?php echo $type['title']; ?></label> &#160;
				<input id="ckb<?php echo $type['id_type']; ?>" style="background: none;" type="checkbox" name="ckb<?php echo $type['id_type']; ?>" value="<?php echo $type['title']; ?>" <?php 
					foreach ($arr as $arr_con){ 
				        if($type['title'] == $arr_con)
				        	echo "checked";
				    }
				?>>&#160;
			</span>
			<?php } ?>
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Content</label> <br><br>
			<textarea class="conten-nhap"  maxlength="6000" name="summary" placeholder="Your content..." rows="10"><?php echo $content; ?></textarea>
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">Link Download</label> <br><br>
			<textarea class="y-link" maxlength="1000" name="download" placeholder="Your link..." rows="2"><?php echo $post['download']; ?></textarea>
		</div>
		<br>
		<div class="cont-h1">
			<label class="tit-x">HOT</label>
			<input type="checkbox" name="ckb_hot" <?php if($post['hot'] == 1) echo 'checked'; ?>>
		</div>
		<div class="cont-h1" style="display: none;">
			<label class="tit-x">ID Post</label> <br>
			<input class="nhap" type="text" name="id" maxlength="300" placeholder="Your title..." value="<?php echo $id; ?>">
		</div>
		<br>
		<div class="cont-h1">
			<input class="btnSubmit" type="submit" name="save_post" value="Save Post">
		</div>
	</div>
</form>