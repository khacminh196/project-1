<?php 
	include "../open.php";
	// print_r($_GET['sl']);
	foreach ($_GET['sl'] as $id_sp => $sl) {
		$strQuery = "update san_pham set so_luong_sp = '$sl' where id_sp = '$id_sp'";
		mysqli_query($con, $strQuery);
	}
	header("location:admin.php");
	include "../close.php";
?>