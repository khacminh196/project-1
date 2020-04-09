<?php 
	session_start();
	include "../open.php";
	$id_kh = $_GET['id_kh'];
	$strQueryMK = "select mat_khau_kh from khach_hang where id_kh = '$id_kh'";
	$resultMK = mysqli_query($con, $strQueryMK);
	$rowMK = mysqli_fetch_array($resultMK);
	$pass_old = $rowMK['mat_khau_kh'];
	$pass_old2 = $_POST['pass_old'];
	$pass_old2_mh = md5($pass_old2);
	$pass_new = $_POST['pass_new'];
	$pass_new2 = md5($pass_new);
	if ($pass_old == $pass_old2_mh) {
		$strQuery = "update khach_hang set mat_khau_kh = '$pass_new2' where id_kh = '$id_kh'";
		mysqli_query($con, $strQuery);
		$_SESSION['thongbaothaydoimatkhau'] = "Đổi mật khẩu thành công";
		header("location:../trangchu.php?class=thongtin&case_kh=doi_mk");
	}
	else {
		$_SESSION['thongbaothaydoimatkhau'] = "Nhập sai mật khẩu cũ";
		header("location:../trangchu.php?class=thongtin&case_kh=doi_mk");
	}
?>
<?php 
	include "../close.php";
?>