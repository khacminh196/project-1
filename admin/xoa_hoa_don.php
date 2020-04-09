<?php 
	include "../open.php";
	if(isset($_GET['id_hd'])) {
		$id_hd = $_GET['id_hd'];
		$strQuery = "delete from hoa_don_chi_tiet where id_hd = '$id_hd'";
		$strQuery2 = "delete from hoa_don where id_hd = '$id_hd'";
		mysqli_query($con, $strQuery);
		mysqli_query($con, $strQuery2);
		header("location:admin.php?show=4");
	}



	include "../close.php";
?>