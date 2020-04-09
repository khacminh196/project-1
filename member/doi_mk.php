<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		#div_doi_mk {
			width: 100%;
			font-size: 20px;
		}
		span{
			color: red;
		}
		table{
			width: 80%;
		}
		#td1{
			width: 25%;
		}
		#td2{
			width: 25%;
		}
		#td3{
			width: 50%;
		}
	</style>
</head>
<body>
	<div id="div_doi_mk">
<?php 
		if(isset($_SESSION['thongbaothaydoimatkhau'])){
			echo $_SESSION['thongbaothaydoimatkhau'];
			unset($_SESSION['thongbaothaydoimatkhau']);
		}
?>
		<h4>Thay đổi mật khẩu của bạn</h4>
		<table align="center">
			<form action="./member/xulydoi_mk.php?id_kh=<?php echo $id_kh; ?>" method="post">
				<tr>
					<td id="td1">Mật khẩu cũ: </td>
					<td id="td2"><input type="password" name="pass_old" id="passold"></td>
					<td id="td3"><span id="err_mk_old"></span></td>
				</tr>
				<tr>
					<td>Mật khẩu mới: </td>
					<td><input type="password" name="pass_new" id="passnew"></td>
					<td><span id="err_mk_new"></span></td>
				</tr>
				<tr>
					<td>Nhập lại mật khẩu mới: </td>
					<td><input type="password" name="pass_new2"id="passnew2"></td>
					<td><span id="err_mk_new2"></span></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Đổi mật khẩu"></td>
				</tr>
			</form>
		</table>
	</div>
</body>
</html>