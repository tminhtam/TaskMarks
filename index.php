<?php  
	if(isset($_GET['q']))
		$q  = $_GET['q'];
	else
		$q = 'home';
	if(isset($_GET['search']))
		$q = 'search';
?>
<?php session_start(); ?>
<?php require_once('lib/dbCon.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php  
				if($q == 'filter')
				{
					$id_ti = $_GET['id'];
					$qr_title = "SELECT `title` FROM `type` WHERE id_type = $id_ti";
					$res_titl = $con->query($qr_title);
					$title_filter = $res_titl->fetch_array(MYSQLI_ASSOC);
					echo "Task Marks | ".$title_filter['title'];
				}
				else if(isset($_GET['search']))
					echo "Task Marks | Search";
			
				else if($q == "post")
				{
					$idp = $_GET['id'];
					$qr1 = "SELECT `title` FROM `post` WHERE id_post = $idp";
					$res1 = $con->query($qr1);
					$post1 = $res1->fetch_array(MYSQLI_ASSOC);
					echo "Task Marks | ".$post1['title'];
				}
				else if($q == "next"){
					echo "Task Marks | Chuyển Hướng Trang...";
				}
				else if($q == "hot"){
					echo "Task Marks | HOT POST";
				}
				else if($q == "new"){
					echo "Task Marks | NEW POST";
				}
				else
					echo "Task Marks";
			?>

		</title>
		<base href="http://taskmarks.atwebpages.com/">
		<meta charset="utf-8">
		<link rel="shortcut icon" href="them/favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta property="fb:app_id" content="361231344504986" />
		<meta property="fb:admins" content="100035917283116" />
		<meta name="robots" content="index, follow">
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript">
	        $(document).keypress(function (e) {

		        if (e.which == 13 || event.keyCode == 13) {

		            if(f.search.value == ''){
		            	alert('Không được bỏ trống!');
		            	event.preventDefault();
		            }

		            var content = f.search.value;
		            var erro = "'";
		            var err0_1 = "-";

		            if(content.includes(erro) || content.includes(err0_1)){
						alert('Không được chứa ký tự đặc biệt!');
		            	event.preventDefault();
		            }
		        }

	        });
		</script>
	</head>
	<body>
		<div id="w-main">
			<div id="header">
				<a class="logo" href="home"><img src="them/logo.png"></a>
				<input class="ckb" type="checkbox" id="btn-menu">
				<label class="bt-menu" for="btn-menu"><img src="them/menu.png"></label>
				<nav class="menu">
					<ul>
						<?php  
							$qr_ty = "SELECT `id_type`, `title` FROM `type`";
							$res_ty = $con->query($qr_ty);
							while ( $types = $res_ty->fetch_array(MYSQLI_ASSOC) ) 
							{
						?>
						<li><a href="type/<?php echo $types['id_type']; ?>"><?php echo $types['title']; ?></a></li>
						<?php } ?>
						<li>
							<a href="login/" style="text-transform: uppercase;">
								<?php  
									if(isset($_SESSION['username']))
										echo 'WELCOME '.$_SESSION['username'];
									else
										echo 'LOGIN';
								?>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="cls"></div>
			<div id="search">
				<form name="f">
					<input type="text" name="search" placeholder="Enter to find...">
					<img src="them/search.png">
				</form>
			</div>
			<div class="cls"></div>
			<div class="split"></div>
			<div id="main">
				<?php  
					switch ($q) {
						case 'post':
							require_once('blocks/post.php');
							break;
						case 'filter':
							require_once('blocks/filter.php');
							break;
						case 'search':
							require_once('blocks/search.php');
							break;
						case 'next':
							require_once('blocks/next_download.php');
							break;
						case 'hot':
							require_once('blocks/hot.php');
							break;
						case 'new':
							require_once('blocks/new.php');
							break;
						case 'erro':
							require_once('blocks/erro.php');
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
					<a href="#" target="_blank"><img class="footer-icon" src="them/google.png"></a>
					<a href="#" target="_blank"><img class="footer-icon" src="them/facebook.png"></a>
					<a href="#" target="_blank"><img class="footer-icon" src="them/youtube.png"></a>
				</div>
			</div>
		</div>
	</body>
</html>