<?php 
	if (isset($_GET['id_sp'])) {
		$id_sp = $_GET['id_sp'];
		$strQuery = "select * from san_pham inner join loai_san_pham on san_pham.id_loai_san_pham = loai_san_pham.id_loai_san_pham inner join nha_san_xuat on san_pham.id_nha_san_xuat = nha_san_xuat.id_nha_San_xuat where id_sp = '$id_sp'";
		$result = mysqli_query($con, $strQuery);
		$row = mysqli_fetch_array($result);	
	}
	else {
		echo "Khong co";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#container_chitietsp { 
			width: 80%;
			height: 1200px;
			box-sizing: border-box;
			font-size: 25px;
		}
		#thong_tin_sp {
			width: 100%;
			height: 40%;
			padding-top: 50px;
		}
		#thong_tin_sp_1 {
			width: 50%;
			height: 100%;
			float: left;
		}
		#thong_tin_sp_2 {
			width: 50%;
			height: 100%;
			float: left;
		}
		#mo_ta_sp {
			width: 100%;
			height: 60%;
			text-align: left;
		}
		#span_ten {
			font-size: 50px;
		}
		#span_gia {
			font-size: 45px;
		}
		#input_sl {
			width: 80px;
			height: 30px;
			font-size: 25px;
		}
		#btn_them_gio {
			width: 180px;
			height: 45px;
			font-size: 25px;
		}
		#thong_tin_sp table {
			height: 100%;
		}
		#p_mo_ta {
			margin: 30px 15px;
		}
	</style>
</head>
<body>
	<div id="container_chitietsp">
		<div id="thong_tin_sp">
			<div id="thong_tin_sp_1">
				<img src="./imgsp/<?php echo $row['hinh_anh']; ?>" height="400px;">
			</div>
			<div id="thong_tin_sp_2">
				<table>
					<form action="./member/themgiohang2.php?id_sp=<?php echo $row['id_sp']; ?>" method="post">
						<tr>
							<td>
								<span id="span_ten"><?php echo $row['ten_sp']; ?></span><br>
							</td>
						</tr>
						<tr>
							<td>
								Giá: <span id="span_gia"><?php echo $row['gia_sp']; ?> VNĐ</span><br>
							</td>
						</tr>
						<tr>
							<td>
								Số lượng: <input id="input_sl" type="number" name="sl_sp" min="0" max="<?php echo $row['so_luong_sp']; ?>"><br>
							</td>
						</tr>
						<tr>
							<td>
								<button id="btn_them_gio" type="submit">Thêm vào giỏ</button>	
							</td>
						</tr>
					</form>
				</table>
			</div>
		</div>
		<div id="mo_ta_sp">
			<p>Chi tiết: </p>
			<p id="p_mo_ta"><?php echo $row['mo_ta_sp']; ?></p>
		</div>
	</div>
	<div style="background: red; height: 300px;">
		Sản phẩm liên quan: 
	</div>
</body>
</html>