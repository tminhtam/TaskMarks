<?php  
	$user = $_SESSION['username'];
	$qr = "SELECT gr_user, num_of_download FROM user WHERE username = '$user'";
	$res = $con->query($qr);
	$getID = $res->fetch_array(MYSQLI_ASSOC);
?>
<div id="srot-link-story">
	<span><a href="index.php">Manager</a></span> <span>/</span>
	<span><a href="#">Your Account</a></span>
</div>

<div id="info-account">
	<form method="post" name="f-user">
		<ul>
		<li>Username: </li>
		<li><input style="text-transform: uppercase;" type="text" name="user" maxlength="100" value="<?php echo $_SESSION['username']; ?>" placeholder="Your Username" disabled></li>

		<li>DisplayName: </li>
		<li><input style="text-transform: uppercase;" type="text" name="displayname" maxlength="100" value="<?php echo $_SESSION['displayname']; ?>" placeholder="Your DisplayName"></li>

		<li>Password: </li>
		<li><input type="Password" name="pass" maxlength="100" value="" placeholder="Your Password"></li>

		<li>Comfirm Password: </li>
		<li><input type="Password" name="comfirm_pass" maxlength="100" value="" placeholder="Comfirm Password"></li>

		<li>Group User: </li>
		<li><input type="text" maxlength="1" value="<?php echo $getID['gr_user']; ?>" placeholder="Your Group" disabled></li>

		<hr>
		<br>
		<?php  
			$qr_post = "SELECT `id_post` FROM `post` WHERE username = '$user'";
			$res_post = $con->query($qr_post);
			$post = $res_post->fetch_array(MYSQLI_ASSOC);
		?>
		<li>Total Your Post: </li>
		<li><input style="text-transform: uppercase;" type="text" name="total_post" maxlength="100" value="<?php echo $num_post = mysqli_num_rows($res_post); ?> post" placeholder="Your Username" disabled></li>

		<li>Num of Download: </li>
		<li><input style="text-transform: uppercase;" type="text" name="total_post" maxlength="100" value="<?php echo $getID['num_of_download']; ?>" placeholder="Your Username" disabled></li>

	</ul>
	<br>
	<button class="btn" name="btnUpdate">Update Password</button>
	<br><br>
	</form>
</div>