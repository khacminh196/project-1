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
    $nsx = $_POST['nsx'];
    $strQuery = "insert into nha_san_xuat (ten_nha_san_xuat) values ('$nsx')";
    mysqli_query($con, $strQuery) or die("Không thêm mới được nhà sản xuất");
    $_SESSION['themnhasanxuat'] = "Thêm mới nhà sản xuất thành công";
    header("location:admin.php?show=1");
?>
<?php 
    include "../close.php";
?>

</body>
</html>