<?php  
	ob_start();
	session_start();

	if(isset($_GET['q']))
		$q = $_GET['q'];
	else
		$q = "home";

	if(isset($_GET['search']))
		$q = 'search';

	if(!isset($_SESSION['username']))
		header('location:../login/index.php');	

	if($q == "logout")
    {
    	unset($_SESSION['username']);
    	unset($_SESSION['id']);
		header('location:../login/index.php');	
    }
?>
<?php require_once('../lib/dbCon.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php  
				switch ($q) {
					case 'all':
						if(isset($_GET['page']))
							echo "Manager | All Post | Page ".$_GET["page"];
						else
							echo "Manager | All Post";
						break;

					case 'edit':
						echo "Manager | Edit Post";
						break;
						
					case 'post':
						echo "Manager | Create Post";
						break;

					case 'search':
						echo "Manager | Search Post";
						break;

					default:
						echo "Manager | Your Account";
						break;
				}
			?>
		</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="../them/favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<div id="w-main">
			<div id="header">
				<a class="logo" href="index.php"><img src="../them/logo.png"></a>
				<input class="ckb" type="checkbox" id="btn-menu">
				<label class="bt-menu" for="btn-menu"><img src="../them/menu.png"></label>
				<nav class="menu">
					<ul>
						<li><a href="../index.php" target="_blank">HOME PAGE</a></li>
						<li><a href="index.php?q=home" style="<?php if($q == "home") echo 'background: #ddd; color: #000;'; ?>">YOUR ACCOUNT</a></li>
						<li><a href="index.php?q=post" style="<?php if($q == "post") echo 'background: #ddd; color: #000;'; ?>">CREATE POST</a></li>
						<li><a href="index.php?q=all" style="<?php if($q == "all") echo 'background: #ddd; color: #000;'; ?>">ALL POST</a></li>
						<li><a href="index.php?q=type" style="<?php if($q == "type") echo 'background: #ddd; color: #000;'; ?>">TYPE POST</a></li>
						<?php  
							if($_SESSION['id'] == 0){
								for ($i=0; $i < 1; $i++) 
								{ 
						?>
						<li><a href="index.php?q=download" style="<?php if($q == "download") echo 'background: #ddd; color: #000;'; ?>">NUM OF DOWNLOAD</a></li>
						<?php }} ?>
						<li>
							<a href="index.php?q=logout" style="text-transform: uppercase;">log out (<?php echo $_SESSION['username']; ?>)</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="cls"></div>
	<!-- 		<div id="search">
				<form>
					<input type="text" name="search" placeholder="Enter to find...">
					<img src="../them/search.png">
				</form>
			</div>
			<div class="cls"></div>
			<div class="split"></div> -->
			<div id="main">
				<?php  
					switch ($q) {
						case 'all':
							require_once('blocks/all.php');
							break;

						case 'edit':
							require_once('blocks/edit.php');
							break;

						case 'post':
							require_once('blocks/post.php');
							break;

						case 'type':
							require_once('blocks/type.php');
							break;

						case 'search':
							require_once('blocks/search.php');
							break;

						case 'download':
							require_once('blocks/download.php');
							break;
						
						default:
							require_once('blocks/home.php');
							break;
					}
				?>

			</div>
			<div class="cls"></div>
			<div class="split"></div>
			<div id="footer">
				<div id="copy-left">Copyright © 2013-2020 | All Rights Reserved</div>
				<div id="copy-right">
					<a href="#" target="_blank"><img class="footer-icon" src="../them/google.png"></a>
					<a href="#" target="_blank"><img class="footer-icon" src="../them/facebook.png"></a>
					<a href="#" target="_blank"><img class="footer-icon" src="../them/youtube.png"></a>
				</div>
			</div>
		</div>
	</body>
</html>