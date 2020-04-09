<?php 
	session_start();
	include "../open.php";
		$acount_dn = $_POST['acount_dn'];
		$pass = $_POST['pass_dn'];
		$pass2 = md5($pass);
		$strQuery = "select * from khach_hang where tai_khoan_kh = '$acount_dn' and mat_khau_kh = '$pass2'";
		$resultKH = mysqli_query($con, $strQuery);
		if (mysqli_num_rows($resultKH) > 0) {
			$rowKH = mysqli_fetch_array($resultKH);
				if ($rowKH['tinh_trang_kh'] == '0') {
					$_SESSION['id_kh'] = $rowKH['id_kh'];
					$_SESSION['ten_kh'] = $rowKH['ten_kh'];
					header("location:../trangchu.php");
				}
				else{
					$_SESSION['thongbaodangnhapsaikh'] = "Tài khoản của bạn đã bị khoá";
					header("location:../trangchu.php");
				}
			}
		else{
			$_SESSION['thongbaodangnhapsaikh'] = "Sai tên đăng nhập hoặc mật khẩu!!!";
			header("location:../trangchu.php");
		}	
?>

<?php 
	include "../close.php";
?>