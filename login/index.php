<?php  
	session_start();

    if(isset($_SESSION['username']))
        header('location:../admin/');
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="icon" href="../icon/favico.png"/>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="container">
			<h1>LOG IN</h1>
			<form action="check.php" method="post">
				<div class="tbox">
					<input type="text" placeholder="Username" name="username" value="">
				</div>
				<div class="tbox">
					<input type="Password" placeholder="Password" name="password" value="">
				</div>
				<div class="tbox" style="display: none;">
					<input type="text" placeholder="" name="idpost" value="<?php if(isset($_GET['id'])) echo $_GET['id']; else echo "no"; ?>">
				</div>
				<a href="admin.php"><input class="btn" type="submit" name="" value="Login"></a>
			</form>
		</div>
</body>
</html>