<?php 
	include "../open.php";
	$idnsx = $_GET['id_nhasx'];
	$strQuery = "delete from nha_san_xuat where id_nha_san_xuat = '$idnsx'";
	mysqli_query($con, $strQuery);
	header("location:admin.php?show=1");
?>