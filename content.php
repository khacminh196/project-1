
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="./Css/cssTrangchu.css" type="text/css" />
<style type="text/css">
    #div_menu{
        width: 95%;
        height: 60px;
        background: grey;
        float: left;
        display: none;
    }
    #div_show {
        width: 5%;
        height: 60px;
        background: pink;
        border: 1px solid;
        box-sizing: border-box;
        float: left;
    }
    #ul_loai_sp {
        list-style-type: none;
    }
    #ul_loai_sp li a {
        color: white;
        font-size: 25px;
        text-decoration: none;
        display: block;
        float: left;
        padding: 0px;
        height: 35px;
        margin-top: -20px;
        margin-right: 10px; 
    }
    #ul_loai_sp li a:hover {
        color: pink;
        transition: 1.5s;
    }
    #span_menu {
        margin-left: -650px; 
    }
</style>
</head>

<body>
    <div id="mid_tong"> 
    	<div id="mid_left">
        </div>
        <div id="mid_mid" align="center">
<?php 
        // if (isset($_GET['search'])) {
        // 	$search = $_GET['search'];
        //     $strQuerySearch = "select * from san_pham where ten_sp like '%$search%'";
        //     $resultSearch = mysqli_query($con, $strQuerySearch);
        //     $dem = mysqli_num_rows($resultSearch);
        //     if ($dem > 0) {
        //     	echo "Tìm được " . $dem . " sản phẩm <br>";
        //     }else{
        //     	echo "Không tìm thấy mặt hàng nào";
        //     }
        // }else{
        	if (isset($_GET['class'])) {
                $class = $_GET['class'];
                switch ($class) {
                    case 'thongtin':
                        include "./member/thongtincanhan.php";
                        break;
                    case 'dangky' :
                        include "./member/dangky_tk.php";
                    default:
                        # code...
                        break;
                }
            }
            else{
                if (isset($_GET['show'])) {
                    $show = $_GET['show'];
                    switch ($show) {
                        case 'giohang' :
                            include "./member/giohang2.php";
                            break;
                        case 'chitiet' :
                            include "chitietsanpham.php";
                            break;
                        default:
                             
                            break;
                    }
                }else{
                    $strQuerySP = "select * from san_pham";
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $strQuerySP .= " where ten_sp like '%$search%'";
                    }
                    if(isset($_GET['loaisp'])) {
                        $loaisp = $_GET['loaisp'];
                        $strQuerySP .= " where id_loai_san_pham = '$loaisp'";
                    }
                    $resultSP = mysqli_query($con,$strQuerySP);
                    $so_sp = mysqli_num_rows($resultSP);
                    
                    if ($so_sp > 0) {
                        $strQueryLoaiSP = "select * from loai_san_pham";
                        $resultLoaiSP = mysqli_query($con, $strQueryLoaiSP);     
                        $sphien = 9;
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
                            $sql_phan_trang = $strQuerySP . ' LIMIT ' . $start . ',' .$sphien;
                            $result_phan_trang = mysqli_query($con,$sql_phan_trang);
    ?>
        <h1 class="thongbao" style="text-align: center; margin-top: 50px;">Danh sách sản phẩm</h1>
                    <div id="div_menu">
                        <ul id="ul_loai_sp">
    <?php 
                        while ($rowLoaiSP = mysqli_fetch_array($resultLoaiSP)) {
    ?>
                            <li><a href="?loaisp=<?php echo $rowLoaiSP['id_loai_san_pham']; ?>"><?php echo $rowLoaiSP['ten_loai_san_pham']; ?></a></li>
    <?php
                        }
    ?>
                        </ul>
                    </div>
                    <div id="div_show"><i class="fa fa-bars" style="margin-top: 10px;"></i></div><span id="span_menu"> <----- click me </span>
                <div class="sp2">
    <?php 
                while($rowSP = mysqli_fetch_array($result_phan_trang)) {
                        $img = $rowSP['hinh_anh'];
    ?>
                        
                        <!-- <div class="div_sp">
                            <a href="#"><img src="imgsp/<?php echo $img; ?>" height="280px"></a><br>
                                <?php echo $rowSP['ten_sp'] . "<br> Giá sản phẩm: " . $rowSP['gia_sp'] . "<br>"; ?>
                                Số lượng còn: <?php echo $rowSP['so_luong_sp']; ?><br>
                                <a href="themgiohang.php?id_sp=<?php echo $rowSP['id_sp']; ?>">Add to cart</a>
                        </div> -->


                        <div class="div_sp">
                            <img src="./imgsp/<?php echo $img; ?>" width="300px" height="300px">
                            <div class="xuly">
                                <?php echo $rowSP['ten_sp'] . "<br> Giá sản phẩm: " . $rowSP['gia_sp'] . "<br>"; ?>
                                <?php
                                    if($rowSP['so_luong_sp'] == 0){
                                        echo "Hết hàng";
                                    }else{
                                        echo "Số lượng còn : " . $rowSP['so_luong_sp']; 
                                    }
                                ?><br><br>
                                <a href="./member/themgiohang2.php?id_sp=<?php echo $rowSP['id_sp']; ?>">Thêm vào giỏ</a><br><a href="?show=chitiet&id_sp=<?php echo $rowSP['id_sp']; ?>">Chi tiết</a></div>
                        </div>
    <?php
                    }
                }
                    else{
                        echo "Không tìm thấy sản phẩm nào";
                    }
                }
                
            } 
    ?>          
        </div>
        <div style="background: #F0D6D6">
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
    </div>
</body>
</html>
