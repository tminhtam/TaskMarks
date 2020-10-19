<?php 
	$db_host = "fdb22.awardspace.net";
	$db_name = "3382003_dbtruyen";
	$db_user = "3382003_dbtruyen";
	$db_pass = "tam123456";

	// $db_host = "localhost";
	// $db_name = "taskmarks";
	// $db_user = "root";
	// $db_pass = "";

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    mysqli_set_charset($con, 'UTF8');
?>