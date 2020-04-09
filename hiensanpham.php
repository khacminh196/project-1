<?php 
	include "open.php";
    include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$strQuery = "select * from san_pham where id_loai_san_pham = '$id'";
		$result = mysqli_query($con, $strQuery);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
?>
                <div class="div_sp"> 
                	<a href="chitietsanpham=<?php echo $row['id_sp']; ?>"><img src="imgsp/<?php echo $row["hinh_anh"]; ?>" height="200px" /> <br />
                    <?php echo $row["ten_sp"]; ?><br /></a>
                </div>
<?php
			}
		}
		else{
			echo "Không có mặt hàng tương ứng với loại sản phẩm này";
		}
	}
	else{
		echo "Xảy ra lỗi";
	}
?>
<?php 
    include "close.php";
    include "footer.php";
?>