<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#div_sua_thong_tin {
			font-size: 25px;
		}
		#div_sua_thong_tin input {
			height: 40px;
			font-size: 22px;
		}
	</style>
</head>
<body>
	<div id="div_sua_thong_tin">
		<h2 align="center">Mời bạn thay đổi thông tin</h2>
		<table align="center" style="width: 500px; height: 400px;">
			<form action="xuly_update_admin.php?id_ad=<?php echo $id_ad; ?>" method="post">
				<tr>
					<td>Tên: </td>
					<td><input type="text" name="name" value="<?php echo $rowAD['ho_ten_ad']; ?>"></td>
				</tr>
				<tr>
					<td>SĐT: </td>
					<td><input type="text" name="phone" value="<?php echo $rowAD['sdt_ad']; ?>"></td>
				</tr>
				<tr>
					<td>Địa chỉ: </td>
					<td><input type="text" name="address" value="<?php echo $rowAD['dia_chi_ad']; ?>"></td>
				</tr>
				<tr>
					<td>Tài khoản: </td>
					<td><input type="text" name="acount" value="<?php echo $rowAD['tai_khoan_ad']; ?>"></td>
				</tr>
				<tr>
					<td>Mật khẩu: </td>
					<td><input type="password" name="pass" value="<?php echo $rowAD['mat_khau_ad']; ?>"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Update"></td>
				</tr>
			</form>
		</table>
	</div>
</body>
</html>