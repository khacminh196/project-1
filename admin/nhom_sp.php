        <div id="div_mid" style="font-size: 25px;">
            <div id="div_mid_1"><br>
    <?php 
                if (isset($_SESSION['themloaisanpham'])) {
                    echo $_SESSION['themloaisanpham'] . "<br>";
                    unset($_SESSION['themloaisanpham']);
                }
    ?>
                <form action="xulythemloai_sp.php" method="post">
                    Tên loại sản phẩm: <input type="text" name="loai_sp"><br>
                    <input type="submit" value="Thêm loại mới">
                </form><br>
    <?php 
                $strQueryLoaiSP = "select * from loai_san_pham";
                $resultLoaiSP = mysqli_query($con, $strQueryLoaiSP);
                if (mysqli_num_rows($resultLoaiSP) > 0) {
    ?>  
                    <table align="center">
                        <tr>
                            <td>ID</td>
                            <td>Tên loại sản phẩm </td>
                            <td>Xử lý</td>
                        </tr>
    <?php
                    while ($rowLoaiSP = mysqli_fetch_array($resultLoaiSP)) {
    ?>  
                        <tr>
                            <td><?php echo $rowLoaiSP['id_loai_san_pham']; ?></td>
                            <td><?php echo $rowLoaiSP['ten_loai_san_pham']; ?></td>
                            <td><a href="xoa_loaisp.php?id_loaisp=<?php echo $rowLoaiSP['id_loai_san_pham']; ?>">Xóa</a></td>
                        </tr>
    <?php
                    }
                }else{
                    echo "Không tìm thấy loại sản phẩm nào !!!";
                }
    ?>
                    </table>    
            </div><br><hr><br>
            <div id="div_mid_2">
    <?php 
                if (isset($_SESSION['themnhasanxuat'])) {
                    echo $_SESSION['themnhasanxuat'] . "<br>";
                    unset($_SESSION['themnhasanxuat']);
                }
    ?>
                <form action="xulythemnsx.php" method="post">
                    Tên nhà sản xuất: <input type="text" name="nsx"><br>
                    <input type="submit" value="Thêm nhà sản xuất mới">
                </form><br>
    <?php 
                $strQueryNSX = "select * from nha_san_xuat";
                $resultNSX = mysqli_query($con, $strQueryNSX);
                if (mysqli_num_rows($resultNSX) > 0) {
    ?>  
                    <table align="center">
                        <tr>
                            <td>ID</td>
                            <td>Tên nhà sản xuất </td>
                            <td colspan="2">Xử lý</td>
                        </tr>
    <?php
                    while ($rowNSX = mysqli_fetch_array($resultNSX)) {
    ?>  
                        <tr>
                            <td><?php echo $rowNSX['id_nha_san_xuat']; ?></td>
                            <td><?php echo $rowNSX['ten_nha_san_xuat']; ?></td>
                            <!-- <td><a href="#">Sửa</a></td> -->
                            <td><a href="xoa_nsx.php?id_nhasx=<?php echo $rowNSX['id_nha_san_xuat']; ?>">Xóa</a></td>
                        </tr>
    <?php
                    }
                }else{
                    echo "Không tìm thấy nhà sản xuất nào !!!";
                }
    ?>
                    </table>    
            </div>
        </div>