<?php 
	session_start();
	include "../open.php";
	$id_ad = $_GET['id_ad'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$acount = $_POST['acount'];
	$pass = $_POST['pass'];
	$strQueryAD = "select * from admin where id_ad != '$id_ad'";
	$resultAD = mysqli_query($con, $strQueryAD);
	$row = mysqli_fetch_array($resultAD);
	if ($acount == $row['tai_khoan_ad']) {
		$_SESSION['thongbaocapnhatthongtinadkhongthanhcong'] = "Tên tài khoản này đã có người sử dụng !!!";
		header("location:admin.php");	
	}else{
		$strQuery = "update admin set ho_ten_ad = '$name', dia_chi_ad = '$address', sdt_ad = '$phone', tai_khoan_ad = '$acount', mat_khau_ad = '$pass' where id_ad = '$id_ad'";
		mysqli_query($con, $strQuery);
		$_SESSION['thongbaocapnhatthongtinad'] = "Cập nhật thông tin thành công !!!";
		header("location:admin.php");
	}
?>
<?php 
	include "../close.php";
?>