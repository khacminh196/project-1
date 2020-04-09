<?php 
    session_start();
    include "../open.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
<?php
    $tenloai_sp = $_POST['loai_sp'];
    $strQuery = "insert into loai_san_pham (ten_loai_san_pham) values ('$tenloai_sp')";
    mysqli_query($con, $strQuery) or die("Không thêm mới được loại sản phẩm");
    $_SESSION['themloaisanpham'] = "Thêm mới loại sản phẩm thành công";
    header("location:admin.php?show=1");
?>
<?php 
    include "../close.php";
?>

</body>
</html>