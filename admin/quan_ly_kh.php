        <div id="div_mid">
            <div style="font-size: 20px;" style="margin-top: 50px; ">
<?php           
                $strQueryKH = "select * from khach_hang";
                $resultKH = mysqli_query($con, $strQueryKH);
                if (mysqli_num_rows($resultKH) > 0) {
?>
                <h2 align="center">Thông tin của tất cả khách hàng</h2>
                    <table align="center" style="margin: 50px; font-family: Arial, Helvetica, sans-serif; text-align: center;" width="90%" border="1px solid">
                        <tr style="font-weight: bold;">
                            <td>ID</td>
                            <td>Tên khách hàng</td>
                            <td>SĐT khách hàng</td>
                            <td>Tài khoản</td>
                            <td>Tình trạng</td>
                        </tr>
<?php
                while ($rowKH = mysqli_fetch_array($resultKH)) {
?>
                        <tr style="height: 40px;">
                            <td><?php echo $rowKH['id_kh']; ?></td>
                            <td><?php echo $rowKH['ten_kh']; ?></td>
                            <td><?php echo $rowKH['sdt_kh']; ?></td>
                            <td><?php echo $rowKH['tai_khoan_kh']; ?></td>
                            <td><a href="block_kh.php?id_kh=<?php echo $rowKH['id_kh']; ?>"><?php 
                                if ($rowKH['tinh_trang_kh'] == "0") {
                                    echo '<i class="fa fa-unlock fa-2x"></i>';
                                }else{
                                    echo '<i class="fa fa-lock fa-2x"></i>';
                                }
                            ?></a></td>
                        </tr>
<?php
                    }
                echo "</table>";
                }
                else{
                    echo "<h4>Không tìm thấy khách hàng nào !!!</h4>";
                }

?>
            </div>
        </div>