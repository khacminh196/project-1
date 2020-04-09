<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		* {
			box-sizing: border-box;
		}
		#container_login_admin {
			width: 100%;
			height: 625px;
			background: url("./img_content3.jpg") no-repeat;
			background-size: 100% 625px; 
			position: relative;
			text-align: center;
		}
		#thong_bao_admin {
			width: 100%;
			height: 50px;
			font-size: 40px;
			color: white;
		}
		#login_admin {
			border-radius: 10px;
			background: grey;
			width: 250px;
			height: 350px;
			position: absolute;
			left: 517px;
			top: 150px;
			text-align: center;
			opacity: 0.8;
		}
		#p_login {
			font-size: 35px;
		}
		#login_admin form input {
			margin-top: 20px;
			width: 90%;
			height: 35px;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div id="container_login_admin">
		<div id="thong_bao_admin"><marquee>
			<?php 
				if (isset($_SESSION['id_kh'])) {
                    $_SESSION['thongbaochuadangxuatkhachhang'] = "Bạn cần đăng xuất tài khoản khách hàng để đăng nhập tài khoản Admin";
                    header("location:../index.php");
                }
                if (isset($_SESSION['id_ad'])) {
                    header("location:admin.php");
                }
				if (isset($_SESSION['thongbaodangnhap'])) {
						echo $_SESSION['thongbaodangnhap'];
						unset($_SESSION['thongbaodangnhap']);
				}
			?>
		</marquee></div>
		<div id="login_admin">
				<p id="p_login">Login Admin</p>
			<form action="xulydangnhap_ad.php" method="post">
				<input type="text" name="tai_khoan" placeholder="Username..."><br>
				<span></span><br>
				<input type="password" name="mat_khau" placeholder="Password..."><br>
				<span></span><br>
				<input type="submit" value="Đăng nhập">
			</form>
		</div>
	</div>
</body>
</html>