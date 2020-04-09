<?php 
	session_start();
	include "../open.php";
	$date = date("Y/m/d");
	if (isset($_SESSION['id_kh'])) {
		$id_kh = $_SESSION['id_kh'];
		if(isset($_SESSION['cart'])){
			$tongtien = $_GET['tongtien'];
			$strQueryAddHD = "insert into hoa_don(id_kh, ngay_dh, tong_tien, tinh_trang_hd) values ('$id_kh', '$date', '$tongtien', '0')";
			mysqli_query($con, $strQueryAddHD) or die("Tạo đơn hàng không thành công. Vui lòng kiểm tra lại");
			$strQueryMax = "select MAX(id_hd) as max from hoa_don";
			$resultMax = mysqli_query($con, $strQueryMax);
			$rowMax = mysqli_fetch_array($resultMax);
			$max_hd = $rowMax['max'];
			foreach ($_SESSION['cart'] as $id_sp => $value) {
				foreach ($_SESSION['cart'][$id_sp] as $key => $sl) {
				$strQueryHDCT = "insert into hoa_don_chi_tiet values ('$max_hd','$id_sp','$sl')";
				mysqli_query($con, $strQueryHDCT);
				$strQueryUpdate = "update san_pham set so_luong_sp = so_luong_sp - '$sl' where id_sp = '$id_sp'";
				mysqli_query($con, $strQueryUpdate);
				}
			}
			echo "Tạo đơn hàng thành công. Về <a href='../trangchu.php'>Trang chủ</a>";
			unset($_SESSION['cart'], $_SESSION['dem']);
		}
	}
	else{
		$_SESSION['thongbaomuahang'] = "Vui lòng đăng nhập để mua hàng";
		header("location:../trangchu.php");
	}
?>
<?php 
	include "../close.php";
?>