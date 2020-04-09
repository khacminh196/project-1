<!-- <div>Doanh thu
	Thang nay, hom nay
</div>
<div>Thong ke
	San pham ban chay thang nay
</div>
<div>Thong bao
	Don hang vua dat
</div> -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#thong_ke_1 {
			width: 100%;
			height: 50px;
			background: red;
			margin-top: 30px;
		}
		.thong_ke_mini {
			font-size: 30px;
			float: left;
			width: 50%;
			line-height: 50px;
		}
	</style>
</head>
<body>
	<div id="container_thongke">
		<div id="thong_ke_1">
			<div class="thong_ke_mini"><a href="?show=2">Thống kê</a></div>
			<div class="thong_ke_mini"><a href="?show=2&thongke=1">Thông báo</a></div>
		</div>
		<div id="thong_ke_2">
<?php 
		if(isset($_GET['thongke'])) {
			$thongke = $_GET['thongke'];
			switch($thongke) {
				case 1:
					include "./thong_bao.php";
					break;
				default:
					break;
			}
		}
		else {
			include "./thongke_donhang.php";
		}
?>
		</div>
	</div>
</body>
</html>