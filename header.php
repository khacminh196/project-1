<?php 
    session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Đồ Gia Dụng Đức GTO </title>
<link rel="stylesheet" type="text/css" href="./Css/Css.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
</head>

<body>
	<div id="div_tong"> 
    	<div id="div_top"> 
            <div id="div_top2" align="center"> 
            	<marquee onmouseover="this.stop()" onmouseout="this.start()" behavior="alternate" id="mr"> <p id="the_p"> <font color="#FFFFFF" size="+4"> <a href="trangchu.php"> Welcome to GTO Shop - Chuyên đồ gia dụng Đức </a> </font> </p></marquee> 
            </div>
        </div>
        <div id="div_top_bot">
        	<div id="div_top_bot1">
            	<a href="trangchu.php"><div id="div_top_bot_11" align="center"> Trang Chủ </div></a>
                <a href="?show=giohang"><div id="div_top_bot_12" align="center"> Giỏ <span style="color: red;">( 
<?php
                 if(isset($_SESSION['dem'])){
                        echo $_SESSION['dem'];
                } else{
                    echo "0";
                }; 
?>
                )</span></div></a>
                <a href="#"><div id="div_top_bot_13" align="center"> Liên Hệ </div></a>
                <a href="#"><div id="div_top_bot_14" align="center"> Tin Tức </div></a>
            </div>
        	<a href="trangchu.php"><div id="div_top_bot2"> 
        	</div></a>
            <div id="div_top_bot3"> 
            	<div id="div_top_bot31" align="center"> 
                	<form action="" method="get"> 
                    	<i class="fa fa-search fa-2x"></i> <input type="text" name="search" id="timkiem" placeholder="Search on GTO..." />
                    </form>
                </div>
                <div id="div_top_bot32" align="center"> 
<?php 
						if(isset($_SESSION['ten_kh'])){
                            echo "<br> Welcome " . $_SESSION['ten_kh'] . "<br>";
                            $id_kh = $_SESSION['id_kh'];
                            if (isset($_SESSION['thongbaochuadangxuatkhachhang'])) {
                                echo "<b>" . $_SESSION['thongbaochuadangxuatkhachhang'] . "</b><br>";
                                unset($_SESSION['thongbaochuadangxuatkhachhang']);
                            }
?>
                            <a href="?class=thongtin">Thông tin <i class="fa fa-user"></i></a><br>
                            <a href='dangxuat.php'>Đăng xuất</a>
<?php
                        }
                        elseif(isset($_SESSION['ten_ad'])){
                            echo "<br> Welcome Admin " . $_SESSION['ten_ad'] . "<br>";
                            echo "<a href='dangxuat.php'>Đăng xuất</a>";
                        }
						else{
                            if (isset($_SESSION['thongbaodangnhapsaikh'])) {
                                echo $_SESSION['thongbaodangnhapsaikh'];
                                unset($_SESSION['thongbaodangnhapsaikh']);
                            }
?>
                            	<form action="./member/xulydangnhap_kh.php" method="post">
                                    Username:<input type="text" id="user" name="acount_dn" placeholder="Username..." /></br>
                                    Password:<input type="password" id="pass" name="pass_dn" placeholder="Password" /></br>
                                    <input type="submit" value="Đăng Nhập" name="submit_dn" /><br>
                    			</form>
                                <span style="color: red">Bạn chưa có tài khoản? <a href="?class=dangky">Đăng ký</a> ngay!!!</span>
<?php                        
						}
?>
                	
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>