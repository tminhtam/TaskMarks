<?php 
	include('../../lib/dbCon.php');

	if(isset($_POST['save_post']))
	{
		$id = $_POST["id"];
		settype($idTruyen, "int");
		$title = $_POST['title'];
		$urlHinh = $_POST['url_image'];
		$download = $_POST['download'];
		$tom_tat = str_replace("\n", "<br/>", $_POST['summary']);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$ngay_update = date("Y-m-d H:i:s");

		if($download != null)
		{
			if(isset($_POST["ckb_hot"])){
				$qr = "UPDATE `post` SET `title`= '$title',`url_image`= '$urlHinh',`content`= '$tom_tat',`download`= '$download',`date_update`= '$ngay_update',`hot`= 1 WHERE id_post = $id";
				$con->query($qr);

				$qr_del = "DELETE FROM `type_post` WHERE id_post = $id";
				$con->query($qr_del);

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
			else{
				$qr = "UPDATE `post` SET `title`= '$title',`url_image`= '$urlHinh',`content`= '$tom_tat',`download`= '$download',`date_update`= '$ngay_update',`hot`= 0 WHERE id_post = $id";
				$con->query($qr);

				$qr_del = "DELETE FROM `type_post` WHERE id_post = $id";
				$con->query($qr_del);

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
				$qr = "UPDATE `post` SET `title`= '$title',`url_image`= '$urlHinh',`content`= '$tom_tat',`download`= null,`date_update`= '$ngay_update',`hot`= 1 WHERE id_post = $id";
				$con->query($qr);

				$qr_del = "DELETE FROM `type_post` WHERE id_post = $id";
				$con->query($qr_del);

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
			else{
				$qr = "UPDATE `post` SET `title`= '$title',`url_image`= '$urlHinh',`content`= '$tom_tat',`download`= null,`date_update`= '$ngay_update',`hot`= 0 WHERE id_post = $id";
				$con->query($qr);

				$qr_del = "DELETE FROM `type_post` WHERE id_post = $id";
				$con->query($qr_del);

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

