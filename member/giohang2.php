<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		* {
			box-sizing: border-box;
		}
		#container_giohang {
			width: 80%;
			margin-top: 50px;
			font-size: 20px;
		}
		#div_giohang {
			width: 75%;
			float: left;
			border: 1px solid;
			background: #E0FFFF;
		}
		#div_giohang td {
			padding: 20px 10px;
		}
		#div_giohang td input {
			width: 50px;
			height: 30px;
			font-size: 20px;
			text-align: center; 
		}
		#remove_cart {
			height: 50px;
			line-height: 50px;
			border-bottom: 1px solid;
		}
		#div_thanhtoan {
			width: 25%;
			height: 350px;
			float: left;
			background: #DCDCDC;
			border: 1px solid;
		}
		#div_thanhtoan button {
			width: 80%;
			height: 40px;
			margin-top: 20px;
			font-size: 25px;
			font-weight: bold;
		}
		#span_cart_1 {
			float: left;
			padding-left: 10px;
		}
		#span_cart_2 {
			float: right;
			padding-right: 10px;
		}
	</style>
</head>
<body>
<?php 
	if(!isset($_SESSION['cart'])) {
?>
		<div id="cart_thongbao">Không có sản phẩm trong giỏ</div>
<?php
	}
	else{
		$tongtien = 0;
?>
	<div id="container_giohang">
		<div id="div_giohang">
			<div id="remove_cart">
				<span id="span_cart_1">Giỏ hàng của bạn</span>
				<span id="span_cart_2"> Xoá giỏ hàng <a href="./member/xuly_xoa_cart.php?xoa=all"><i class="fa fa-times fa-2x"></i></a></span>
			</div>
			<div>
				<form action="./member/xuly_update_cart.php" method="post">
				<table width="100%">
<?php 
		foreach ($_SESSION['cart'] as $id_sp => $value) {
			$strQuerySP = "select * from san_pham where id_sp = '$id_sp'";
			$resultSP = mysqli_query($con, $strQuerySP);
			$rowSP = mysqli_fetch_array($resultSP);
			foreach ($_SESSION['cart'][$id_sp] as $key => $sl) {
?>
					<tr>
						<td><a href="./member/xuly_xoa_cart.php?id_sp=<?php echo $rowSP['id_sp']; ?>"><i class="fa fa-trash fa-2x"></i></a></td>
						<td><img src="./imgsp/<?php echo $rowSP['hinh_anh']; ?>" width="100px"></td>
						<td><?php echo $rowSP['ten_sp']; ?><br>
							<?php echo $rowSP['gia_sp']; ?> Đ
						</td>
						<td><input type="number" min="0" max="<?php echo $rowSP['so_luong_sp']; ?>" value="<?php echo $sl; ?>" name="soluong[<?php echo $rowSP['id_sp']; ?>]"></td>
						<td><?php echo $sl * $rowSP['gia_sp']; ?> Đ</td>
<?php 
						$tongtien += $rowSP['gia_sp'] * $sl;
?>
					</tr>
<?php
			}
		}
?>
				</table>
			</div>
		</div>
		<div id="div_thanhtoan">
			<p>Kiểm tra và thanh toán</p><hr>
			<p>Số sản phẩm: <?php echo $_SESSION['dem']; ?></p>
			<p>Tổng tiền: <?php echo $tongtien; ?> Đ</p>
			<button type="submit">Update</button><br>
			<button><a href="./member/xulythanhtoan.php?tongtien=<?php echo $tongtien; ?>">Thanh toan</a></button>
		</div>
		</form>
	</div>
<?php
	}
?>
</body>
</html>