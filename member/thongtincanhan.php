<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript">
    function kt_img() {
      var img = document.getElementById('file_img').value;
      var cir = document.getElementById('circle');
      cir.innerHTML = img;
    }
  </script>
  <style type="text/css">
    #container {
      font-size: 20px;
      margin: 2.5%;
      width: 95%;
      height: 95%;
    }
    .div_mini {
      float: left;
    }
    #div1{
      width: 35%;
      height: 100%;
    }
    .p_thongbao {
      font-size: 25px;
      padding: 50px 100px;
    }
    #div2{
      width: 65%;
      height: 100%;
      background: grey;
    }
    .circle_img {
      width: 50px;
      height: 50px;
      background: #E4E8CE;
      text-align: center;
      padding: 10px;
      margin-left: -150px;
      margin-top: 30px;
      color: #fff;
      -moz-border-radius: 50px;
      -webkit-border-radius: 50px;
      border-radius: 50px;
    }
    ul {
      list-style-type: none;
    }
    #menu li {
      margin: 15px;
      padding: 0px;
    }
  </style>
</head>
<body>
<?php
  if (isset($_SESSION['id_kh'])) {
    $id_kh = $_SESSION['id_kh'];
    $strQueryKH = "select  * from khach_hang where id_kh = '$id_kh'";
    $resultKH = mysqli_query($con, $strQueryKH);
    $rowKH = mysqli_fetch_array($resultKH);
  }
  else {
    header("location:../trangchu.php");
  }
?>
  <div id="container">
    <div id="div1" class="div_mini">
      <div class="circle_img">
        <img src="<?php echo $rowKH['anh_kh']; ?>" width="50px">
      </div>
      <input type="file" name="img_kh">
      <div style="border-bottom: 1px solid;">
        Xin chào <?php echo $rowKH['ten_kh']; ?>
      </div>
      <div style="margin-top: 40px;">
        <ul id="menu">
          <li><a href="?class=thongtin&case_kh=ho_so">Hồ sơ của bạn</a></li>
          <li><a href="?class=thongtin&case_kh=doi_mk">Đổi mật khẩu</a></li>
        </ul>
      </div>
    </div>
    <div id="div2" class="div_mini">
      <div style="width: 100%; height: 150px; background: red;">
<?php 
    if(isset($_SESSION['thongbaothaydoithongtinkhachhang'])){
      echo "<p class='p_thongbao'>" . $_SESSION['thongbaothaydoithongtinkhachhang'] . "</p>";
      unset($_SESSION['thongbaothaydoithongtinkhachhang']);
    }
?>
      </div>
      <div>
<?php 
      if(isset($_GET['case_kh'])){
        $case_kh = $_GET['case_kh'];
        switch ($case_kh) {
          case 'ho_so':
            include './member/hosokhachhang.php';
            break;
          
          case 'doi_mk':
            include "./member/doi_mk.php";
            break;

          default:
            
            break;
        }
      }

?>
      </div>  
    </div>
  </div>
</body>
</html>