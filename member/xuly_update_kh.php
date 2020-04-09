<?php 
	session_start();
	include "../open.php";
	if (isset($_GET['id_kh'])) {
		$id_kh = $_GET['id_kh'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$img = $_POST['img_kh'];
		$strQuery = "update khach_hang set ten_kh = '$name', dia_chi_kh = '$address', sdt_kh = '$phone', anh_kh = '$img' where id_kh = '$id_kh'";
		mysqli_query($con, $strQuery);
		$_SESSION['thongbaothaydoithongtinkhachhang'] = "Thay đổi thông tin thành công";
		header("location:../trangchu.php?class=thongtin");
	}else{
		header("location:../trangchu.php");
	}
?>
<?php 
	include "../close.php";
?>