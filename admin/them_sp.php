<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #div_mini input[type=text] {
            margin: 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            resize: none;
        }
        #div_mini textarea {
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            resize: none;
        }
        select {
            font-size: 20px;
            width: 100%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
            }
    </style>
</head>
<body>
        <div id="div_mid">
            <div id="div_mini">
<?php 
            if (isset($_SESSION['thongbaothemsanpham'])) {
                echo $_SESSION['thongbaothemsanpham'];
                unset($_SESSION['thongbaothemsanpham']);
            }
?>
                <h1>Xin vui lòng điền thông tin sản phẩm</h1>
                <table style="font-size: 20px; margin-left: 100px;" width="100%" height="450px">
                    <form action="xulythem_sp.php" method="post">             
                        <tr>
                            <td style="width: 30%;">Tên sản phẩm: </td>
                            <td style="width: 25%;"><input type="text" name="ten"></td>
                            <td style="width: 45%;"><span></span></td>
                        </tr>
                        <tr>
                            <td>Mô tả: </td>
                            <td><textarea name="mota"></textarea></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td>Giá sản phẩm: </td>
                            <td><input type="text" name="gia"></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh: </td>
                            <td><input type="file" name="hinh_anh"></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td>Số lượng bán: </td>
                            <td><input type="text" name="so_luong"></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td>Loại sản phẩm: </td>
                            <td><select name="loai_sp">
    <?php 
                                $strQueryLoaiSP = "select * from loai_san_pham";
                                $resultLoaiSP = mysqli_query($con, $strQueryLoaiSP);
                                if (mysqli_num_rows($resultLoaiSP) > 0) {
                                    while ($rowLoaiSP = mysqli_fetch_array($resultLoaiSP)) {
    ?>  
                                    <option value="<?php echo $rowLoaiSP['id_loai_san_pham']; ?>"><?php echo $rowLoaiSP['ten_loai_san_pham']; ?></option>
    <?php              
                                    }
                                }
    ?>
                            </select>                           
                            </td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td>Nhà sản xuất: </td>
                            <td><select name="nsx_sp">
    <?php 
                                $strQueryNSX = "select * from nha_san_xuat";
                                
                                $resultNSX = mysqli_query($con, $strQueryNSX);
                                if (mysqli_num_rows($resultNSX) > 0) {
                                    while ($rowNSX = mysqli_fetch_array($resultNSX)) {
    ?>  
                                    <option value="<?php echo $rowNSX['id_nha_san_xuat']; ?>"><?php echo $rowNSX['ten_nha_san_xuat']; ?></option>
    <?php              
                                    }
                                }
    ?>
                            </select></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Thêm"></td>
                            <td></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>

</body>
</html>