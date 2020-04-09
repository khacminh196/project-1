	<h3>Quản lý các đơn hàng</h3>
	<table border="1px" style="font-size: 20px;" align="center" width="90%">
<?php 	
		$stt = 0;
		$strQueryHD = "select * from hoa_don";
		$resultHD = mysqli_query($con, $strQueryHD);
		if (mysqli_num_rows($resultHD) > 0) {
			if (isset($_GET['id_hd'])) {
				$id_hd = $_GET['id_hd'];
				$stt = 0;
				$tongtien = 0;
?>
		<table border="1px" style="font-size: 20px;" align="center" width="90%">
			<tr>
				<th>Stt</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng mua</th>
				<th>Giá sản phẩm</th>
			</tr>			
<?php
				$strQueryHDCT = "select * from hoa_don_chi_tiet where id_hd = '$id_hd'";
				$resultHDCT = mysqli_query($con, $strQueryHDCT);
				while ($rowHDCT = mysqli_fetch_array($resultHDCT)) {
?>
			<tr>
				<td><?php echo $stt++; ?></td>
				<td><?php 
					$id_sp = $rowHDCT['id_sp'];
					$strQuerySP = "select ten_sp, gia_sp from san_pham where id_sp = '$id_sp'";
					$resultSP = mysqli_query($con, $strQuerySP);
					$rowSP = mysqli_fetch_array($resultSP);
					echo $rowSP['ten_sp'];
				?></td>
				<td><?php echo $rowHDCT['so_luong_mua']; ?></td>
				<td><?php echo $rowSP['gia_sp']; 
					$tongtien += $rowHDCT['so_luong_mua'] * $rowSP['gia_sp'];
				?></td>
			</tr>
<?php
				}
?>
			<tr>
				<td colspan="4">Tổng số tiền thanh toán: <?php echo $tongtien; ?></td>
			</tr>
		</table><br>
<!-- 	<form action="xulytinhtrang.php?id_hd=<?php echo $id_hd; ?>" method="post">
		<p style="font-size: 24px;">Update tình trạng đơn hàng: <select name="tinh_trang">
			<option value="0">Vừa đặt</option>
			<option value="1">Đang giao hàng</option>
			<option value="2">Đã giao hàng</option>
		</select><br>
		<input type="submit" value="Update">
	</p> -->		
	</form>
<?php
			}
			else{
?>
			<p style="font-size: 25px;">Lưu ý: <span style="font-size: 25px; color: red;"> Các đơn hàng đã được giao và bị huỷ không thể thay đổi tình trạng </span></p>
			<tr>
				<td>Mã đơn</td>
				<td>Tên khách hàng</td>
				<td>Số điện thoại</td>
				<td>Ngày đặt hàng</td>
				<td>Tình trạng (click để thay đổi)</td>
				<td>Chi tiết</td>
				<td>Tác động</td>
			</tr>
<?php
		while ($rowHD = mysqli_fetch_array($resultHD)) {
?>
			<tr>
				<td><?php echo $rowHD['id_hd']; ?></td>
				<td><?php 
					$id_hd = $rowHD['id_hd'];
					$strQueryKH_HD = "select * from hoa_don inner join khach_hang on hoa_don.id_kh = khach_hang.id_kh where id_hd = '$id_hd'";
					$resultKH_HD = mysqli_query($con, $strQueryKH_HD);
					$rowKH_HD = mysqli_fetch_array($resultKH_HD);
					echo $rowKH_HD['ten_kh'];
				 ?></td>
				<td><?php echo $rowKH_HD['sdt_kh']; ?></td>
				<td><?php echo $rowKH_HD['ngay_dh']; ?></td>
				<td><?php
					if ($rowKH_HD['tinh_trang_hd'] == "0") {
?>
						<a href="xulytinhtrang.php?id_hd=<?php echo $id_hd ?>&tinhtrang=1">Chưa xử lý</a>
<?php
					}
					elseif ($rowKH_HD['tinh_trang_hd'] == "1") {
?>
						<a href="xulytinhtrang.php?id_hd=<?php echo $id_hd ?>&tinhtrang=2">Đang giao hàng</a>					
<?php
					}
					elseif ($rowKH_HD['tinh_trang_hd'] == "2") {
						echo "Đã giao hàng";
					}
					elseif ($rowKH_HD['tinh_trang_hd'] == "3") {
						echo "Đã huỷ";
					}
				?></td>
				<td><a href="?show=4&id_hd=<?php echo $id_hd; ?>">Xem</a></td>
				<td><?php 
					if ($rowKH_HD['tinh_trang_hd'] == "0" || $rowKH_HD['tinh_trang_hd'] == "1") {
?>
					<a href="xulytinhtrang.php?id_hd=<?php echo $id_hd; ?>&tinhtrang=3">Huỷ đơn hàng</a>
<?php
					}else {
?>
					<a href="xoa_hoa_don.php?id_hd=<?php echo $id_hd; ?>">Xoá</a>
<?php
					}
				?></td>
			</tr>
<?php
				}				
			}
		}
		else {
			echo "Không tìm thấy đơn hàng nào !!!";
		}
?>
	</table>
