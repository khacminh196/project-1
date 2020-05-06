<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="thong_ke_doanh_thu">
<?php 
		$date = date("Y-m-01");
		$doanh_thu_hom_nay = 0;
		$doanh_thu_thang_nay = 0;
		$strQuery = "select * from hoa_don where ngay_dh >= '$date' and tinh_trang_hd=2";
		$result = mysqli_query($con, $strQuery);
		if(mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) {
				$doanh_thu_thang_nay += $row['tong_tien'];
				if($row['ngay_dh'] == date("Y-m-d")) {
					$doanh_thu_hom_nay += $row['tong_tien'];
				}
			}
?>
		<p class="thong_bao_thong_ke">Doanh thu hôm nay là: <?php echo $doanh_thu_hom_nay; ?></p>
		<p class="thong_bao_thong_ke">Doanh thu tháng này là: <?php echo $doanh_thu_thang_nay; ?></p>
<?php
		}
		else {
?>
		<p class="thong_bao_thong_ke">Tháng này hiện chưa có doanh thu</p>
<?php
		}
?>
	</div>
	<div id="thong_ke_san_pham">
<?php 
	
?>
	</div>
</body>
</html>