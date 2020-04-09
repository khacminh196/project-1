<?php 
	include "../open.php";
?>
<div style="width: 100%; height: 100px; text-align: center;">
	<h1>Quản lý sản phẩm</h1>
	<a href="admin.php?show=add" title="Thêm sản phẩm" style="position: absolute; width: 50px; right: 60px; top: 160px;" ><i class="fa fa-plus fa-2x"></i></a>
<div style="width: 100%; height: 775px;">
<?php 
	$strQuery = "select * from san_pham inner join loai_san_pham on san_pham.id_loai_san_pham = loai_san_pham.id_loai_san_pham inner join nha_san_xuat on san_pham.id_nha_san_xuat = nha_san_xuat.id_nha_san_xuat";
	if(isset($_GET['search_sp'])) {
		$search_sp = $_GET['search_sp'];
		$strQuery .= " where ten_sp like '%$search_sp%'";
	}
	$result = mysqli_query($con, $strQuery);
	$so_sp = mysqli_num_rows($result);
	if ($so_sp > 0) {
		$sphien = 8;
        $sotrang = ceil($so_sp/$sphien);
        $strang = ($sotrang - 1) * $sphien;
        $trang = 1;
        if (isset($_GET['trang'])) {
            $trang = $_GET['trang'];
        }
        else{
            $trang = 1;
        }                           
            $start = ($trang - 1) * $sphien;
            $sql_phan_trang = $strQuery . ' LIMIT ' . $start . ',' .$sphien;
            $result_phan_trang = mysqli_query($con,$sql_phan_trang);
?>
	<form action="update_sl_sp.php" method="get">
		<table border="1px" align="center" style="font-size: 25px;" width="100%">
			<tr>
				<th>Hình ảnh</th>
				<th>Tên</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Loại</th>
				<th>Nhà sản xuất</th>
				<th colspan="3">Thao tác</th>
			</tr>
<?php
		while ($row = mysqli_fetch_array($result_phan_trang)) {
							$id_sp = $row['id_sp'];
?>
			<tr>
				<td><img src="../imgsp/<?php echo $row['hinh_anh']; ?>" width="60x"></td>
				<td><?php echo $row['ten_sp']; ?></td>
				<td><?php echo $row['gia_sp']; ?></td>
				<td><input style="width: 50px; height: 30px; text-align: center; font-size: 22px;" type="number" min="0" value="<?php echo $row['so_luong_sp']; ?>" name="sl[<?php echo $row['id_sp']; ?>]"></td>
				<td><?php echo $row['ten_loai_san_pham']; ?></td>
				<td><?php echo $row['ten_nha_san_xuat']; ?></td>
				<td><a href="xoa_sp.php?id=<?php echo $row['id_sp']; ?>">Xoá</a></td>
			</tr>
<?php
		}
?>
		</table>
		<p><button type="submit" style="width: 100px; height: 40px; border-radius: 5px; background: grey; color: white;">Update</button></p>
	</form>
<?php 
	}
	else{
		echo "Không tìm thấy sản phẩm nào";
	}
?>
</div>
<div style="font-size: 30px">
		<?php 
        if(isset($sotrang)){
            for($i = 1;$i <= $sotrang;$i++){
    ?>
                    <a href="?case=1&&trang=<?php echo $i;?>" title="Trang <?php echo $i;?> "><?php echo $i;?> </a>
    <?php
            }
        }else{
            echo "";
        }
?>

</div>