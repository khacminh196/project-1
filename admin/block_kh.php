<?php 
	session_start();
	include "../open.php";	
	$id_kh = $_GET['id_kh'];
	$strQuery = "select tinh_trang_kh from khach_hang where id_kh = '$id_kh'";
	$result = mysqli_query($con, $strQuery);
	$row = mysqli_fetch_array($result);
	if ($row['tinh_trang_kh'] == '0') {
		$strQueryUpdate = "update khach_hang set tinh_trang_kh = '1' where id_kh = '$id_kh'";
	}
	else {
		$strQueryUpdate = "update khach_hang set tinh_trang_kh = '0' where id_kh = '$id_kh'";
	}
	mysqli_query($con, $strQueryUpdate);
	header("location:admin.php?show=3");
?>
<?php 
	include "../close.php";
?>