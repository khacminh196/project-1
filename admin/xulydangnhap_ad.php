<?php 
	session_start();
	include "../open.php";	
		if (isset($_SESSION['id_kh'])) {
			$_SESSION['thongbaodangnhap'] = "Đăng xuất tài khoản khách hàng trước khi đăng nhập Admin";
			header("location:login_admin.php");
		}
		$acount = $_POST['tai_khoan'];
		$pass = $_POST['mat_khau'];
		$strQueryAD = "select * from admin where tai_khoan_ad = '$acount' and mat_khau_ad = '$pass'";
		$resultAD = mysqli_query($con, $strQueryAD);
		if (mysqli_num_rows($resultAD) > 0) {
			$rowAD = mysqli_fetch_array($resultAD);
			$_SESSION['id_ad'] = $rowAD['id_ad'];
			$_SESSION['ten_ad'] = $rowAD['ho_ten_ad'];
			header("location:admin.php");
		}else{
			$_SESSION['thongbaodangnhap'] = "Sai tài khoản hoặc mật khẩu. Vui lòng kiểm tra lại";
			header("location:login_admin.php");
		}
?>
<?php 
	include "../close.php";
?>