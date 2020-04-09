<?php 
 	session_start();
 	include "../open.php";
 	$id_hd = $_GET['id_hd'];
 	$tinh_trang = $_GET['tinhtrang'];
 	$strQueryUpdate = "update hoa_don set tinh_trang_hd = '$tinh_trang' where id_hd = '$id_hd'";
 	mysqli_query($con, $strQueryUpdate) or die("Có lỗi xảy ra");
 	if ($tinh_trang == 3) {
 		$strQueryHDCT = "select id_sp, so_luong_mua from hoa_don_chi_tiet where id_hd = '$id_hd'";
 		$resultHDCT =  mysqli_query($con, $strQueryHDCT);
 		while ($row = mysqli_fetch_array($resultHDCT)) {
 			$id_sp = $row['id_sp'];
 			$so_luong_mua = $row['so_luong_mua'];
 			$strQueryUpdateSL = "update san_pham set so_luong_sp = so_luong_sp + $so_luong_mua where id_sp = '$id_sp'";
 			mysqli_query($con, $strQueryUpdateSL);
 		}
 	}
 	header("location:admin.php?show=4");
 	include "../close.php";
 ?>