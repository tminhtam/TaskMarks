<?php 
	include('../../lib/dbCon.php');
	$user = $_POST["user"];
	$title = $_POST["title"];
	$urlHinh = $_POST["url_image"];
	$download = $_POST["download"];

	$tom_tat = str_replace("\n", "<br/>", $_POST["summary"]);

	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$ngay_update = date("Y-m-d H:i:s");

	$qr_numpost = "SELECT id_post FROM post ORDER BY id_post DESC LIMIT 0, 1";
	$res_nump = $con->query($qr_numpost);
	$so_post = $res_nump->fetch_array(MYSQLI_ASSOC);
	$id = $so_post['id_post'] + 1;


	if(isset($_POST["save_post"]))
	{
		if($download == null)
		{
			if(isset($_POST["ckb_hot"]))
			{
				$qr = "INSERT INTO `post`(`id_post`, `title`, `url_image`, `content`, `download`, `view`, `date_post`, `date_update`, `hot`, `username`) VALUES ('$id', '$title', '$urlHinh', '$tom_tat', null, 0, '$ngay_update', '$ngay_update', 1, '$user')";
				$con->query($qr);

				for ($i=1; $i <= 7; $i++) { 
					if(isset($_POST["ckb"."$i"]))
					{
						$tit = $_POST["ckb"."$i"];
						$qr2 = "INSERT INTO `type_post`(`id_type`, `id_post`, `title`) VALUES (null, '$id', '$tit')";
						$con->query($qr2);
					}
				}

				$link = "location:../index.php?q=all";
				header($link);
			}
			else
			{
				$qr = "INSERT INTO `post`(`id_post`, `title`, `url_image`, `content`, `download`, `view`, `date_post`, `date_update`, `hot`, `username`) VALUES ('$id', '$title', '$urlHinh', '$tom_tat', null, 0, '$ngay_update', '$ngay_update', 0, '$user')";
				$con->query($qr);

				for ($i=1; $i <= 7; $i++) { 
					if(isset($_POST["ckb"."$i"]))
					{
						$tit = $_POST["ckb"."$i"];
						$qr2 = "INSERT INTO `type_post`(`id_type`, `id_post`, `title`) VALUES (null, '$id', '$tit')";
						$con->query($qr2);
					}
				}

				$link = "location:../index.php?q=all";
				header($link);
			}
		}
		else
		{
			if(isset($_POST["ckb_hot"])){
				$qr = "INSERT INTO `post`(`id_post`, `title`, `url_image`, `content`, `download`, `view`, `date_post`, `date_update`, `hot`, `username`) VALUES ('$id', '$title', '$urlHinh', '$tom_tat', '$download', 0, '$ngay_update', '$ngay_update', 1, '$user')";
				$con->query($qr);

				for ($i=1; $i <= 7; $i++) { 
					if(isset($_POST["ckb"."$i"]))
					{
						$tit = $_POST["ckb"."$i"];
						$qr2 = "INSERT INTO `type_post`(`id_type`, `id_post`, `title`) VALUES (null, '$id', '$tit')";
						$con->query($qr2);
					}
				}

				$link = "location:../index.php?q=all";
				header($link);
			}
			else
			{
				$qr = "INSERT INTO `post`(`id_post`, `title`, `url_image`, `content`, `download`, `view`, `date_post`, `date_update`, `hot`, `username`) VALUES ('$id', '$title', '$urlHinh', '$tom_tat', '$download', 0, '$ngay_update', '$ngay_update', 0, '$user')";
				$con->query($qr);

				for ($i=1; $i <= 7; $i++) { 
					if(isset($_POST["ckb"."$i"]))
					{
						$tit = $_POST["ckb"."$i"];
						$qr2 = "INSERT INTO `type_post`(`id_type`, `id_post`, `title`) VALUES (null, '$id', '$tit')";
						$con->query($qr2);
					}
				}

				$link = "location:../index.php?q=all";
				header($link);
			}
			
		}
		
	}
	
?>

