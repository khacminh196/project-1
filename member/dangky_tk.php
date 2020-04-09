<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
<?php 
		if(isset($_SESSION['thongbaothemthanhvien'])){
			echo $_SESSION['thongbaothemthanhvien'];
			unset($_SESSION['thongbaothemthanhvien']);
		}
?>
			<table height="400px;">
				<form action="./member/xulydangky_tk.php" method="post">
					<tr>
						<th colspan="3" align="center">Mời nhập thông tin khách hàng</th>
					</tr>
					<tr>
						<td>Họ tên: </td>
						<td><input type="text" name="name"></td>
						<td><span id="err_name"></span></td>
					</tr>
					<tr>
						<td>Địa chỉ: </td>
						<td><input type="text" name="address"></td>
						<td><span id="err_address"></span></td>
					</tr>
					<tr>
						<td>Số điện thoại: </td>
						<td><input type="text" name="phone"></td>
						<td><span id="err_phone"></span></td>
					</tr>
					<tr>
						<td>Ảnh đại diện: </td>
						<td><input type="file" name="img"></td>
						<td><span id="err_img"></span></td>
					</tr>
					<tr>
						<td>Tài khoản: </td>
						<td><input type="text" name="acount"></td>
						<td><span id="err_acount"></span></td>
					</tr>
					<tr>
						<td>Mật khẩu: </td>
						<td> <input type="password" name="pass"></td>
						<td><span id="err_pass"></span></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" value="Đăng ký"></td>
					</tr>
				</form>
			</table>
	</div>
</body>
</html>