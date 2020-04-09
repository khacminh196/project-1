<?php 
	include "../open.php";
	$id_loaisp = $_GET['id_loaisp'];
	$strQuery = "delete from loai_san_pham where id_loai_san_pham = '$id_loaisp'";
	mysqli_query($con, $strQuery);
	header("location:admin.php?show=1");
?>