<?php 
    session_start();
    include "../open.php";
    if(!isset($_SESSION['id_ad'])) {
    	header("location:login_admin.php");
    }
    $id_ad = $_SESSION['id_ad'];
    $strQueryAD = "select * from admin where id_ad = '$id_ad'";
    $resultAD = mysqli_query($con, $strQueryAD);
    $rowAD = mysqli_fetch_array($resultAD);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../Css/adminCss.css">
</head>
<body>
	<div id="container_admin">
		<div id="div_admin_1"><a href="admin.php">Welcome Admin</a></div>
		<div id="div_admin_2">
			<div id="div_admin_2_1">
				<div id="thong_tin_admin">
					<div id="img_admin">
<?php 
			if($rowAD['anh_ad'] == null) {
?>
				<img src="../img/iconad.jpg" width="80px" style="border-radius: 100%;">
<?php
			}else {
?>
				<img src="../img/<?php echo $rowAD['anh_ad']; ?>" width="80px" style="border-radius: 100%;">
<?php
			}
?>
					</div>
					<div id="name_admin">Admin : <br><span id="span_name_ad"><?php echo $rowAD['ho_ten_ad']; ?></span><br><br>
						<span><a href="admin.php?show=update">Chỉnh sửa</a></span>
					</div>
					<button id="button_thong_tin"><a href="../dangxuat.php">Đăng xuất</a></button>
				</div>
				<div id="search_admin">
					<form id="form_search_admin">
						<input type="text" name="search_sp" placeholder="Search..">
						<button>Tìm sản phẩm</button>
					</form>
				</div>
				<div id="menu_admin">
					<div id="menu_admin_1" class="menu_admin_mini"><a href="admin.php">Sản phẩm</a></div>
					<div id="menu_admin_2" class="menu_admin_mini"><a href="admin.php?show=1">Quản lý</a></div>
					<div id="menu_admin_3" class="menu_admin_mini"><a href="admin.php?show=2">Thống kê</a></div>
					<div id="menu_admin_4" class="menu_admin_mini"><a href="admin.php?show=3">Khách hàng</a></div>
					<div id="menu_admin_5" class="menu_admin_mini"><a href="admin.php?show=4">Đơn hàng</a></div>
				</div>
			</div>
			<div id="div_admin_2_2">
<?php 
	if (isset($_GET['show'])) {
		$show = $_GET['show'];
		switch ($show) {
			case 1:
				include "nhom_sp.php";
				break;
			case 2:	
				include "thongke.php";
				break;
			case 3:
				include "quan_ly_kh.php";
				break;
			case 4:
				include "quanlydonhang.php";
				break;
			case 'add':
				include "them_sp.php";
				break;
			case 'update':
				include "update_admin.php";
				break;
			default:
				# code...
				break;
		}
	}
	else {
		include "quan_ly_sp.php";
	}
?>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
    include "../close.php";
?>