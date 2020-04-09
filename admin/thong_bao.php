<?php 
	$strQuery = "select * from hoa_don where tinh_trang_hd = 0";
	$result = mysqli_query($con, $strQuery);
	if(mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
?>
		<p class="thong_bao_thong_ke">Đơn hàng <?php echo $row['id_hd']; ?> chưa được xử lý !</p>
<?php
		}
	}
	else{
		echo "Không có đơn hàng nào cần xử lý";
	}
?>