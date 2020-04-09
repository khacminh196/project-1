<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Thông tin cá nhân của bạn</h3>
	<table>
		<form action="./member/xuly_update_kh.php?id_kh=<?php echo $id_kh; ?>" method="post">
			<tr>
				<td>Họ tên: </td>
				<td><input type="text" name="name" value="<?php echo $rowKH['ten_kh']; ?>"></td>
			</tr>
			<tr>
				<td>Số điện thoại: </td>
				<td><input type="text" name="phone" value="<?php echo $rowKH['sdt_kh']; ?>"></td>
			</tr>
			<tr>
				<td>Địa chỉ: </td>
				<td><input type="text" name="address" value="<?php echo $rowKH['dia_chi_kh']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Thay đổi"></td>
			</tr>
		</form>
	</table>
</body>
</html>