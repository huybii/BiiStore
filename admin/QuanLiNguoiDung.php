<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Bii store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="../font/fontawesome-free-5.15.4-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/GioHang.css" type="text/css">
    <link rel="stylesheet" href="./style/admin.css" type="text/css">
    <link rel="stylesheet" href="./style/QuanLiSanPham.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        $('#select-all').click(function(event) {  //on click
            if(this.checked) { // check select status
                $('.checkbox1').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"            
                });

            }else{
                $('.checkbox1').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                    
                });      
            }
        });

        });
    </script>
</head>
<body>
    <div class="sidebar-menu">
        <div class="sidebar-menu-logo">
            <a href="index.html" class="heading-icon-link">
                <img src="../img/bii_store__1__auto_x2-removebg-preview.png" width="100%" alt="">
            </a>
        </div>
        <div class="admin-info">
            <img src="../img/34f657b7c4abf0fb76d23b2a48fc89c3 (1).png" width="50%" alt="" >
            <h5 style="color: #fff;">Ch??o, Huy</h5>
        </div>
        <div class="menu">
            <ul class="menu-list">
                <li class="menu-item">
                    <a class="menu-item-link" href="admin.php">T???ng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiDonHang.php">Qu???n l?? ????n h??ng</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiSanPham.php">Qu???n l?? s???n ph???m</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiDanhMuc.php">Qu???n l?? danh m???c</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="TuVanThietKe.php">T?? v???n thi???t k???</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="ThongKe.php">Th???ng k?? doanh thu</a>
                </li>
                <!-- <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiNhanVien.php">Qu???n l?? nh??n vi??n</a>
                </li> -->
                <li class="menu-item" style="background-color: rgba(255,255,255, 0.1);">
                    <a class="menu-item-link" href="QuanLiNguoiDung.php">Qu???n l?? ng?????i d??ng</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">????ng xu???t</a>
                </li>
                <!-- <li class="menu-item">
                    <a class="menu-item-link" href="">T???ng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">T???ng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">T???ng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">T???ng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">T???ng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">T???ng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">T???ng quan</a>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="main">

            <div class="main-header">
                <h3 style="margin-bottom: 30px;">Qu???n l?? ng?????i d??ng</h3>
                <div class="main-header-btn">
                    <!-- <button type="submit" form="formDanhMuc" name="btnSave" class="add-new">+ Th??m m???i</button> -->
                    <a class="export-file" href=""><i class="fas fa-file-download"></i></a>
                </div>
            </div>

            

            <div class="search-btn" style="position: relative;margin-top:30px">
                <form method="post">
                    <input type="text" class="search-input" name="txtSearch" id="inputSearch" placeholder="Nh???p t??? kh??a" value="<?php if (isset($_POST['txtSearch'])) echo $_POST['txtSearch']; ?>">
                    <a style="position: absolute;top:4px;left:180px;" href=""><i class="fas fa-times"></i></a>
                    
                    <button class="btn-search" type="submit" name="btnSearch">
                        T??m
                    <i class="fas fa-search" style="margin-left:4px"></i>
                </button>
                </form>
            </div>
        <!-- <h5 style="color: #75ab38;">T???ng quan h??m nay</h5> -->
        
        <div class="order-layout" style="margin:0;position:relative;margin-top:30px">
        <table class="table" style="font-size: 14px;">
            <thead>
                <tr>
                <th scope="col"><input type="checkbox" class="form-check-input checkbox1" id="select-all"></th>
                <th scope="col">STT</th>
                <th scope="col">Email</th>
                <th scope="col">M???t kh???u</th>
                <th scope="col">T??n hi???n th???</th>
                <th scope="col">S??? ??i???n tho???i</th>
                <th scope="col">Ph??n quy???n</th>
                <th scope="col">Ng??y t???o</th>
                <th scope="col">S??? l???n bom</th>
                <th scope="col">Tr???ng th??i</th>
                <!-- <th scope="col">Thao t??c</th> -->

                </tr>
            </thead>
            <!-- <tbody> -->
                <?php
                    echo '<tbody id="tBodyMain">';
                    echo '<form method="post">';
                    echo '<button type="submit" onclick="return confirm(\'X??c nh???n ch???n ng?????i d??ng?\')" name="btn-Chan" class="add-new" style="position:absolute;top:-60px;right:130px;">Ch???n</button>';
                    echo '<button type="submit" onclick="return confirm(\'X??c nh???n b??? ch???n ng?????i d??ng?\')" name="btn-BoChan" class="add-new" style="position:absolute;top:-60px;right:-10px;">B??? ch???n</button>';
                        
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDangNhap t, (SELECT @row := 0) r ";
                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                $KeyWord = $_POST['txtSearch'];
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDangNhap t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or Email like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%'";
                            }
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    $query_bom = "select count(*) as 'bom' from tblDonHang where EmailUser = N'".$row["Email"]."' and TrangThai = N'giao th???t b???i'";
                                    $result_bom = mysqli_query($conn, $query_bom);
                                    $row_bom = mysqli_fetch_assoc($result_bom);
                                    echo '<tr>';
                                    if($row["PhanQuyen"] == 'admin'){
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'" disabled></td>';
                                    }else{
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                    }
                                        echo '<td>'.$row["STT"].'</td>';
                                        echo '<td>'.$row["Email"].'</td>';
                                        echo '<td>'.$row["MatKhau"].'</td>';
                                        echo '<td>'.$row["TenHienThi"].'</td>';
                                        echo '<td>'.$row["SDT"].'</td>';
                                        echo '<td>'.$row["PhanQuyen"].'</td>';
                                        echo '<td>'.$row["NgayTao"].'</td>';
                                        echo '<td>'.$row_bom["bom"].'</td>';
                                        echo '<td>';
                                        if($row["TrangThai"] == 'ho???t ?????ng'){
                                            echo '<span class="status" style="background-color:#00c292;">'.$row["TrangThai"].'</span>';
                                        }else{
                                            echo '<span class="status" style="background-color:#e46a76;">'.$row["TrangThai"].'</span>';

                                        }
                                        
                                        echo '</td>';
                                    
                                    echo '</tr>';
                                }
                                
                            }
                            else{
                                echo "data empty";
                            }
                        }
                        else{
                            echo "Connect error: " . mysqli_connect_error();
                        }
                    echo '</form>';
                    echo '</tbody>';
                ?>
                <!-- ch???n ng?????i d??ng -->
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-Chan'])){
                        if(isset($_POST['ckb']) && $_POST['ckb'] != null){
                            foreach ($_POST['ckb'] as $checked_ID) {
                                $query_ChuyenTuVanThanhCong = "update tblDangNhap set TrangThai = N'ch???n' where ID = '".$checked_ID."'";
                                $result_ChuyenTuVanThanhCong = mysqli_query($conn, $query_ChuyenTuVanThanhCong);
                                if($result_ChuyenTuVanThanhCong == true){

                                }
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                            echo "<script type='text/javascript'>";
                            echo "alert('Ch???n ng?????i d??ng th??nh c??ng');";
                            // echo "<meta http-equiv='refresh' content='0'>";
                            echo "</script>";
                        }else{
                            echo "<script type='text/javascript'>";
                            echo "alert('Ch??a c?? ng?????i d??ng n??o ???????c ch???n!');";
                            // echo "window.location.reload();";
                            echo "</script>";
                        }
                        
                        
                    }
                ?>

                <!-- b??? ch???n ng?????i d??ng -->
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-BoChan'])){
                        if(isset($_POST['ckb']) && $_POST['ckb'] != null){
                            foreach ($_POST['ckb'] as $checked_ID) {
                                $query_ChuyenTuVanThanhCong = "update tblDangNhap set TrangThai = N'ho???t ?????ng' where ID = '".$checked_ID."'";
                                $result_ChuyenTuVanThanhCong = mysqli_query($conn, $query_ChuyenTuVanThanhCong);
                                if($result_ChuyenTuVanThanhCong == true){

                                }
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                            echo "<script type='text/javascript'>";
                            echo "alert('B??? ch???n ng?????i d??ng th??nh c??ng');";
                            // echo "<meta http-equiv='refresh' content='0'>";
                            echo "</script>";
                        }else{
                            echo "<script type='text/javascript'>";
                            echo "alert('Ch??a c?? ng?????i d??ng n??o ???????c ch???n!');";
                            // echo "window.location.reload();";
                            echo "</script>";
                        }
                        
                        
                    }
                ?>
        </table>
        </div>
        
</body>
</html>