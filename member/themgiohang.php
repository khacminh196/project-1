<?php 
	session_start();
	include "../open.php";
	if (isset($_GET['id_sp'])) {
		$id_sp = $_GET['id_sp'];
		$strQuery = "select * from san_pham where id_sp = '$id_sp'";
		$result = mysqli_query($con, $strQuery);
		$row = mysqli_fetch_array($result);
		if ( $row['so_luong_sp'] > $_SESSION['cart'][$id_sp]['sl']) {			
				if ($row['so_luong_sp'] > 0) {
					$_SESSION['cart'][$id_sp]['sl'] += 1;
					$_SESSION['thongbaothemgiohang'] = "Thêm sản phẩm vào giỏ thành công !!!";
					$_SESSION['dem'] += 1;
					header("location:../trangchu.php");
				}
				else{
					$_SESSION['thongbaothemgiohang'] = "Mặt hàng này đã hết. Vui lòng chọn loại khác !!!";
					header("location:../trangchu.php");
				}
		}
		else{
			$_SESSION['thongbaothemgiohang'] = "Bạn chỉ thêm được tối đa " . $row['so_luong_sp'] . " sản phẩm vào giỏ ";
			header("location:../trangchu.php");
		}		
	}
	else{
		header("location:../trangchu.php");
	}
?>
<?php 
	include "../close.php";
?>