<?php 
	session_start();
	include "../open.php";
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$img = $_POST['img'];
	$acount = $_POST['acount'];
	$pass = $_POST['pass'];
	$passnew = md5($pass);
	$strQueryCheck = "select tai_khoan_kh from khach_hang";
	$resultCheck = mysqli_query($con, $strQueryCheck);
	while ($rowCheck = mysqli_fetch_array($resultCheck)) {
		if ($acount == $rowCheck['tai_khoan_kh']) {
			$_SESSION['thongbaothemthanhvien'] = "<p>Đã tồn tại tài khoản này. Vui lòng thay đổi tên đăng nhập !!!</p>";
			header("location:../trangchu.php?class=dangky");
			die();
		}
	}
		$strQuery = "insert into khach_hang (ten_kh, dia_chi_kh, sdt_kh, anh_kh, tai_khoan_kh, mat_khau_kh) values ('$name','$address','$phone','$img','$acount','$passnew')";
		mysqli_query($con, $strQuery);
		$_SESSION['thongbaothemthanhvien'] = "Đăng ký tài khoản thành công !!!";
		header("location:../trangchu.php");
?>
<?php 
	include "../close.php";
?>