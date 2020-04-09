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
	<style type="text/css">
		* {
			box-sizing: border-box;
		}
		a {
			text-decoration: none;
		}
		#container_admin {
			margin: 20px;
		}
		#div_admin_1 {
			width: 100%;
			height: 100px;
			background: black;
			font-size: 50px;
			font-weight: bold;
			padding: 30px;
		}
		#div_admin_1 a {
			color: white;
			text-decoration: none;
		}
		#div_admin_2 {
			width: 100%;
			height: 900px;
		}
		#div_admin_2_1 {
			width: 20%;
			height: 100%;
			float: left;
		}
		#thong_tin_admin {
			width: 100%;
			height: 20%;
			background: #e0e0eb;
			position: relative;
			border-bottom: 1px solid;
		}
		#img_admin {
			width: 80px;
			height: 80px;
			border: 1px;
			border-radius: 100%;
			position: absolute;
			top: 25px;
			left: 10px;
		}
		#name_admin {
			width: 100px;
			height: 50px;
			position: absolute;
			left: 125px;
			top: 20px;
		}
		#span_name_ad {
			color: red;
			font-size: 18px;
			font-weight: bold;
		}
		#button_thong_tin {
			position: absolute;
			width: 90px;
			height: 30px;
			left: 90px;
			bottom: 20px;
		}
		#search_admin {
			width: 100%;
			height: 20%;
			background:  #e0e0eb;
		}
		#form_search_admin {
			padding-top: 50px;
			text-align: center;
		}
		#form_search_admin input {
			width: 80%;
			height: 40px;
			margin-bottom: 20px; 
			font-size: 25px;
			border-radius: 5px;
		}
		#form_search_admin button {
			color: white;
			font-size: 20px;
			width: 150px;
			height: 40px;
			background: grey;
			border-radius: 10px;
		}
		#menu_admin {
			width: 100%;
			height: 60%;
			background: #e0e0eb;
		}
		#div_admin_2_2 {
			width: 80%;
			height: 100%;
			float: left;		
			background: #f9ecf2;
			text-align: center;
		}
		.menu_admin_mini a {
			background: grey;
			color: white;
			display: block;
			width: 100%;
			height: 100px;
			padding-top: 20px;
			border: 1px solid;
			font-size: 30px;
			padding-left: 10px;
			line-height: 50px;
		}
		.menu_admin_mini a:hover {
			background: black;
			transition: 2s;
		}
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#search_sp').keydown(function(){
				search_sp = this.value;
				$.get("quan_ly_sp.php", { 'search_sp' : search_sp } , function(data){
					$('#div_admin_2_2').html(data);
				});
			});
		});	
	</script>


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
						<input type="text" id="search_sp" name="search_sp" placeholder="Search..">
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