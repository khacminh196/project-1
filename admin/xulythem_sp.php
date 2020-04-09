<?php 
	session_start();
	include "../open.php";
	$ten = $_POST['ten'];
	$mota = $_POST['mota'];
	$gia = $_POST['gia'];
	$hinh_anh = $_POST['hinh_anh'];
	$sl = $_POST['so_luong'];
	$loai = $_POST['loai_sp'];
	$nsx = $_POST['nsx_sp'];
	$strQuery = "insert into san_pham (ten_sp, mo_ta_sp, gia_sp, hinh_anh, so_luong_sp, id_loai_san_pham, id_nha_san_xuat) values ('$ten','$mota','$gia','$hinh_anh','$sl','$loai','$nsx')";
	mysqli_query($con, $strQuery) or die("Có lỗi xảy ra trong quá trình thêm sản phẩm");
	// $_SESSION['thongbaothemsanpham'] = "Đăng bán sản phẩm thành công";
	header("location:admin.php?");
?>
<?php 
	include "../close.php";
?>