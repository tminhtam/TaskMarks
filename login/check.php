<?php  
	session_start();

	include('../lib/dbCon.php');

	$user = $_POST['username'];
	$pass = $_POST['password'];

    $qr = "SELECT username, gr_user, displayName FROM user where username = '$user' and password = '$pass'";

    $result = mysqli_query($con, $qr);

    $num = mysqli_num_rows($result);
    settype($num, "int");
    $res = $result->fetch_array(MYSQLI_ASSOC);

    if($num == 1){
    	$_SESSION['username'] = $user;
        $_SESSION['id'] = $res['gr_user'];
        $_SESSION['displayname'] = $res['displayName'];
    	
        if($_POST['idpost'] != "no"){
            $a = $_POST['idpost'];
            $tmp = "location:../index.php?q=post&id=$a";
            header($tmp);
        }
        else
            header('location:../admin');
    }
    else
    {
    	header('location:index.php');
    }
?>