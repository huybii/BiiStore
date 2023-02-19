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
    <link rel="stylesheet" href="./style/QuanLiDanhMuc.css" type="text/css">
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
            <h5 style="color: #fff;">Chào, Huy</h5>
        </div>
        <div class="menu">
            <ul class="menu-list">
                <li class="menu-item">
                    <a class="menu-item-link" href="admin.php">Tổng quan</a>
                </li>
                <li class="menu-item" style="background-color: rgba(255,255,255, 0.1);">
                    <a class="menu-item-link" href="QuanLiDonHang.php">Quản lí đơn hàng</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiSanPham.php" >Quản lí sản phẩm</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiDanhMuc.php">Quản lí danh mục</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="TuVanThietKe.php">Tư vấn thiết kế</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="ThongKe.php">Thống kê doanh thu</a>
                </li>
                <!-- <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiNhanVien.php">Quản lí nhân viên</a>
                </li> -->
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiNguoiDung.php">Quản lí người dùng</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">Đăng xuất</a>
                </li>
                <!-- <li class="menu-item">
                    <a class="menu-item-link" href="">Tổng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">Tổng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">Tổng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">Tổng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">Tổng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">Tổng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="">Tổng quan</a>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="QuanLiDonHang">
            <!-- lấy số lượng đơn -->
            <?php 
                    $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                    if (!$conn) {
                        die("Kết nối thất bại" . mysqli_connect_error());
                    }
                    $_tatca = "SELECT count(*) as 'TatCa' from tblDonHang";
                    $_tatca = mysqli_query($conn, $_tatca);

                    if (mysqli_num_rows($_tatca)) {
                        $_tatca = mysqli_fetch_assoc($_tatca);
                            $_tatca = $_tatca["TatCa"];
                    }

                    $query_choxacnhan = "SELECT count(*) as 'ChoXacNhan' from tblDonHang where TrangThai = N'chờ xác nhận'";
                    $result_choxacnhan = mysqli_query($conn, $query_choxacnhan);

                    if (mysqli_num_rows($result_choxacnhan)) {
                        $row_choxacnhan = mysqli_fetch_assoc($result_choxacnhan);
                            $_choxacnhan = $row_choxacnhan["ChoXacNhan"];
                    }
                    $query_danggiao = "SELECT count(*) as 'DangGiao' from tblDonHang where TrangThai = N'đang giao'";
                    $result_danggiao = mysqli_query($conn, $query_danggiao);

                    if (mysqli_num_rows($result_danggiao)) {
                        $row_danggiao = mysqli_fetch_assoc($result_danggiao);
                            $_danggiao = $row_danggiao["DangGiao"];
                    }

                    $query_dagiao = "SELECT count(*) as 'DaGiao' from tblDonHang where TrangThai = N'đã giao'";
                    $result_dagiao = mysqli_query($conn, $query_dagiao);

                    if (mysqli_num_rows($result_dagiao)) {
                        $row_dagiao = mysqli_fetch_assoc($result_dagiao);
                            $_dagiao = $row_dagiao["DaGiao"];
                    }

                    $_hoanhang = "SELECT count(*) as 'HoanHang' from tblDonHang where TrangThai = N'đã hủy' or TrangThai = N'giao thất bại'";
                    $_hoanhang = mysqli_query($conn, $_hoanhang);

                    if (mysqli_num_rows($_hoanhang)) {
                        $_hoanhang = mysqli_fetch_assoc($_hoanhang);
                            $_hoanhang = $_hoanhang["HoanHang"];
                    }
                ?>
        <h5 style="color: #75ab38;">Quản lí đơn hàng</h5>
        <div class="today-status">
            <a href="QuanLiDonHang.php" class="today-status-item" style="width: 19.5%;">
                <div class="today-status-item-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Tất cả</h5>
                
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_tatca ?></span>
                </div>
            </a>
            <a href="QuanLiDonHang.php?TrangThai=ChoXacNhan" class="today-status-item" style="width: 19.5%;">
                <div class="today-status-item-icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Chờ xác nhận</h5>
                
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_choxacnhan ?></span>
                </div>
            </a>
            <a href="QuanLiDonHang.php?TrangThai=DangGiao" class="today-status-item" style="width: 19.5%;">
                <div class="today-status-item-icon">
                <i class="fas fa-truck"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Đang giao</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_danggiao ?></span>
                </div>
            </a>
            <a href="QuanLiDonHang.php?TrangThai=DaGiao" class="today-status-item" style="width: 19.5%;">
                <div class="today-status-item-icon">
                <i class="fas fa-check"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Đã giao</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_dagiao ?></span>
                </div>
            </a>
            <a href="QuanLiDonHang.php?TrangThai=ThatBai" class="today-status-item" style="width: 19.5%;">
                <div class="today-status-item-icon">
                <i class="fas fa-times"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Thất bại</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_hoanhang ?></span>
                </div>
            </a>
        </div>
        <!-- btn tìm kiếm-->
            <div class="main-header" style="margin: 30px 0;">
            <div class="search-btn" style="position: relative;">
                <form method="post">
                    <input type="text" class="search-input" name="txtSearch" id="inputSearch" placeholder="Tìm theo ID, tên, SĐT" value="<?php if (isset($_POST['txtSearch'])) echo $_POST['txtSearch']; ?>">
                    <a style="position: absolute;top:4px;left:180px;" href=""><i class="fas fa-times"></i></a>
                    
                    <button class="btn-search" type="submit" name="btnSearch">
                        Tìm
                    <i class="fas fa-search" style="margin-left:4px"></i>
                </button>
                </form>
                
            </div>
                <!-- <div class="main-header-btn">
                    <button type="submit" form="formDanhMuc" name="btnSave" class="add-new">+ Thêm mới</button>
                    <a class="export-file" href=""><i class="fas fa-file-download"></i></a>
                </div> -->
            </div>

            

            <!-- đơn hàng -->
        <div class="order-layout" style="margin:0;position:relative;">
        <table class="table" style="font-size: 14px;">
            <thead>
                <tr>
                <th scope="col"><input type="checkbox" class="form-check-input checkbox1" id="select-all"></th>
                <th scope="col">STT</th>
                <th scope="col">Sản phẩm</th>

                <th scope="col">Tên người nhận</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ nhận hàng</th>
                <th scope="col">Tổng thanh toán</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Trạng thái</th>
                <!-- <th scope="col">Thao tác</th> -->

                </tr>
            </thead>
            <!-- <tbody> -->
                <?php
                    echo '<tbody id="tBodyMain">';
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r order by NgayDat desc";
                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                $KeyWord = $_POST['txtSearch'];
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or TenNguoiNhan like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%'";
                            }
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    $DiaChiDatHang = $row["DiaChiChiTiet"]."-".$row["Xa"]."-".$row["Huyen"]."-".$row["ThanhPho"];
                                    echo '<tr>';
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                        echo '<td>'.$row["STT"].'</td>';
                                        echo '<td style="position: relative;">';
                                        echo '<a href="" class="order-item">sản phẩm</a>';
                                        echo '<div class="order-item-detail">';
                                        echo '<table class="table" style="width:100%">';
                                        echo '<thead class="thead-dark">';
                                                            echo '<tr>';
                                                            echo '<th scope="col">Sản phẩm</th>';
                                                            echo '<th scope="col">đơn giá</th>';
                                                            echo '<th scope="col" style="min-width:100px">số lượng</th>';
                                                            echo '</tr>';
                                                            echo '</thead>';
                                                            echo '<tbody>';
                                                            $query1 = "SELECT tblDaDatHang.*, tblsanpham.DuongDanAnh FROM tblDaDatHang,tblSanPham WHERE tblDaDatHang.TenSanPham = tblsanpham.TenSanPham AND tblDaDatHang.EmailUser = '".$row["EmailUser"]."' and IdDonHang ='" . $row["ID"] . "'";
                                                            $result1 = mysqli_query($conn, $query1);
                                                            if(mysqli_num_rows($result1) > 0){          
                                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                            echo '<tr>';
                                                            echo '<th scope="row" style="max-width:280px;text-align: left;">';
                                                                echo '<a class="cart-product" style="width:280px;">';
                                                                    echo '<img width="20%" src=".'.$row1["DuongDanAnh"].'" alt="">';
                                                                    echo $row1["TenSanPham"];
                                                                        echo '</a>';
                                                                    echo '</th>';
                                                                echo '<td>'.number_format($row1["DonGia"], 0, '', ',').'</td>';
                                                                echo '<td>'.$row1["SoLuong"].'</td>';
                                                            echo '</tr>';
                                                                }
                                                            }else{
                                                                echo 'data empty';
                                                            }
                                                            echo '</tbody>';
                                                        echo '</table>';
                                                    echo '</div>';
                                            
                                                    echo '</td>';
                                        echo '<td>'.$row["TenNguoiNhan"].'</td>';
                                        echo '<td>'.$row["SDT"].'</td>';
                                        echo '<td>'.$DiaChiDatHang.'</td>';
                                        echo '<td>'.number_format($row["TongTien"], 0, '', ',').'</td>';
                                        echo '<td>'.$row["NgayDat"].'</td>';
                                        echo '<td>';
                                        if($row["TrangThai"] == 'chờ xác nhận'){
                                            echo '<span class="status">'.$row["TrangThai"].'</span>';
                                        }else if($row["TrangThai"] == 'đang giao'){
                                            echo '<span class="status" style="background-color:#03a9f3;">'.$row["TrangThai"].'</span>';
                                        }elseif($row["TrangThai"] == 'đã hủy' || $row["TrangThai"] == 'giao thất bại'){
                                            echo '<span class="status" style="background-color:#e46a76;">'.$row["TrangThai"].'</span>';
                                        }
                                        else{
                                            echo '<span class="status" style="background-color:#00c292;">'.$row["TrangThai"].'</span>';
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
                    echo '</tbody>'
                ?>
                
                <!-- chờ xác nhận -->
                <?php
                    echo '<tbody id="tBodyMain">';
                    if(isset($_GET["TrangThai"]) && $_GET["TrangThai"] == 'ChoXacNhan'){
                    echo '<form method="post">';
                    echo '<button type="submit" onclick="return confirm(\'Xác nhận sẵn sàng giao?\')" name="btn-ChuyenSanSangGiao" class="add-new" style="position:absolute;top:-60px;right:-10px;">Chuyển sẵn sàng giao</button>';
                    
                    echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where TrangThai = N'chờ xác nhận'";
                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                $KeyWord = $_POST['txtSearch'];
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or TenNguoiNhan like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%' and TrangThai = N'chờ xác nhận'";
                            }
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    $DiaChiDatHang = $row["DiaChiChiTiet"]."-".$row["Xa"]."-".$row["Huyen"]."-".$row["ThanhPho"];
                                    echo '<tr>';
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                        echo '<td>'.$row["STT"].'</td>';
                                        echo '<td style="position: relative;">';
                                        echo '<a href="" class="order-item">sản phẩm</a>';
                                        echo '<div class="order-item-detail">';
                                        echo '<table class="table" style="width:100%">';
                                        echo '<thead class="thead-dark">';
                                                            echo '<tr>';
                                                            echo '<th scope="col">Sản phẩm</th>';
                                                            echo '<th scope="col">đơn giá</th>';
                                                            echo '<th scope="col" style="min-width:100px">số lượng</th>';
                                                            echo '</tr>';
                                                            echo '</thead>';
                                                            echo '<tbody>';
                                                            $query1 = "SELECT tblDaDatHang.*, tblsanpham.DuongDanAnh FROM tblDaDatHang,tblSanPham WHERE tblDaDatHang.TenSanPham = tblsanpham.TenSanPham AND tblDaDatHang.EmailUser = '".$row["EmailUser"]."' and IdDonHang ='" . $row["ID"] . "'";
                                                            $result1 = mysqli_query($conn, $query1);
                                                            if(mysqli_num_rows($result1) > 0){          
                                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                            echo '<tr>';
                                                            echo '<th scope="row" style="max-width:280px;text-align: left;">';
                                                                echo '<a class="cart-product" style="width:280px;">';
                                                                    echo '<img width="20%" src=".'.$row1["DuongDanAnh"].'" alt="">';
                                                                    echo $row1["TenSanPham"];
                                                                        echo '</a>';
                                                                    echo '</th>';
                                                                echo '<td>'.number_format($row1["DonGia"], 0, '', ',').'</td>';
                                                                echo '<td>'.$row1["SoLuong"].'</td>';
                                                            echo '</tr>';
                                                                }
                                                            }else{
                                                                echo 'data empty';
                                                            }
                                                            echo '</tbody>';
                                                        echo '</table>';
                                                    echo '</div>';
                                            
                                                    echo '</td>';
                                        echo '<td>'.$row["TenNguoiNhan"].'</td>';
                                        echo '<td>'.$row["SDT"].'</td>';
                                        echo '<td>'.$DiaChiDatHang.'</td>';
                                        echo '<td>'.number_format($row["TongTien"], 0, '', ',').'</td>';
                                        echo '<td>'.$row["NgayDat"].'</td>';
                                        echo '<td>';
                                        if($row["TrangThai"] == 'chờ xác nhận'){
                                            echo '<span class="status">'.$row["TrangThai"].'</span>';
                                        }else if($row["TrangThai"] == 'đang giao'){
                                            echo '<span class="status" style="background-color:#03a9f3;">'.$row["TrangThai"].'</span>';
                                        }elseif($row["TrangThai"] == 'đã hủy' || $row["TrangThai"] == 'giao thất bại'){
                                            echo '<span class="status" style="background-color:#e46a76;">'.$row["TrangThai"].'</span>';
                                        }
                                        else{
                                            echo '<span class="status" style="background-color:#00c292;">'.$row["TrangThai"].'</span>';
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
                        // chuyển sẵn sàng giao
                        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-ChuyenSanSangGiao'])){
                            if(isset($_POST['ckb']) && $_POST['ckb'] != null){
                                foreach ($_POST['ckb'] as $checked_ID) {
                                    $query_ChuyenSSG = "update tblDonHang set TrangThai = N'đang giao' where ID = '".$checked_ID."'";
                                    $result_ChuyenSSG = mysqli_query($conn, $query_ChuyenSSG);
                                    if($result_ChuyenSSG == true){
    
                                    }
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                                echo "<script type='text/javascript'>";
                            echo "alert('Cập nhật thành công');";
                            // echo "<meta http-equiv='refresh' content='0'>";
                            echo "</script>";
                            }else{
                                echo "<script type='text/javascript'>";
                                echo "alert('Chưa có đơn hàng nào được chọn!');";
                                // echo "window.location.reload();";
                                echo "</script>";
                            }
                            
                            
                        }
                    }
                    echo '</form>';
                    echo '</tbody>';
                ?>

                <!-- đang giao -->
                <?php 
                echo '<tbody id="tBodyMain">';
                    if(isset($_GET["TrangThai"]) && $_GET["TrangThai"] == 'DangGiao'){
                    echo '<form method="post">';
                    echo '<button type="submit" onclick="return confirm(\'Xác nhận đã giao?\')" name="btn-ChuyenDaGiao" class="add-new" style="position:absolute;top:-60px;right:155px;">Chuyển đã giao</button>';
                    echo '<button type="submit" onclick="return confirm(\'Xác nhận giao thất bại?\')" name="btn-ChuyenGiaoThatBai" class="add-new" style="position:absolute;top:-60px;right:-10px;">Chuyển giao thất bại</button>';
                    
                    echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where TrangThai = N'đang giao'";
                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                $KeyWord = $_POST['txtSearch'];
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or TenNguoiNhan like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%' and TrangThai = N'đang giao'";
                            }
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    $DiaChiDatHang = $row["DiaChiChiTiet"]."-".$row["Xa"]."-".$row["Huyen"]."-".$row["ThanhPho"];
                                    echo '<tr>';
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                        echo '<td>'.$row["STT"].'</td>';
                                        echo '<td style="position: relative;">';
                                        echo '<a href="" class="order-item">sản phẩm</a>';
                                        echo '<div class="order-item-detail">';
                                        echo '<table class="table" style="width:100%">';
                                        echo '<thead class="thead-dark">';
                                                            echo '<tr>';
                                                            echo '<th scope="col">Sản phẩm</th>';
                                                            echo '<th scope="col">đơn giá</th>';
                                                            echo '<th scope="col" style="min-width:100px">số lượng</th>';
                                                            echo '</tr>';
                                                            echo '</thead>';
                                                            echo '<tbody>';
                                                            $query1 = "SELECT tblDaDatHang.*, tblsanpham.DuongDanAnh FROM tblDaDatHang,tblSanPham WHERE tblDaDatHang.TenSanPham = tblsanpham.TenSanPham AND tblDaDatHang.EmailUser = '".$row["EmailUser"]."' and IdDonHang ='" . $row["ID"] . "'";
                                                            $result1 = mysqli_query($conn, $query1);
                                                            if(mysqli_num_rows($result1) > 0){          
                                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                            echo '<tr>';
                                                            echo '<th scope="row" style="max-width:280px;text-align: left;">';
                                                                echo '<a class="cart-product" style="width:280px;">';
                                                                    echo '<img width="20%" src=".'.$row1["DuongDanAnh"].'" alt="">';
                                                                    echo $row1["TenSanPham"];
                                                                        echo '</a>';
                                                                    echo '</th>';
                                                                echo '<td>'.number_format($row1["DonGia"], 0, '', ',').'</td>';
                                                                echo '<td>'.$row1["SoLuong"].'</td>';
                                                            echo '</tr>';
                                                                }
                                                            }else{
                                                                echo 'data empty';
                                                            }
                                                            echo '</tbody>';
                                                        echo '</table>';
                                                    echo '</div>';
                                            
                                                    echo '</td>';
                                        echo '<td>'.$row["TenNguoiNhan"].'</td>';
                                        echo '<td>'.$row["SDT"].'</td>';
                                        echo '<td>'.$DiaChiDatHang.'</td>';
                                        echo '<td>'.number_format($row["TongTien"], 0, '', ',').'</td>';
                                        echo '<td>'.$row["NgayDat"].'</td>';
                                        echo '<td>';
                                        if($row["TrangThai"] == 'chờ xác nhận'){
                                            echo '<span class="status">'.$row["TrangThai"].'</span>';
                                        }else if($row["TrangThai"] == 'đang giao'){
                                            echo '<span class="status" style="background-color:#03a9f3;">'.$row["TrangThai"].'</span>';
                                        }elseif($row["TrangThai"] == 'đã hủy' || $row["TrangThai"] == 'giao thất bại'){
                                            echo '<span class="status" style="background-color:#e46a76;">'.$row["TrangThai"].'</span>';
                                        }
                                        else{
                                            echo '<span class="status" style="background-color:#00c292;">'.$row["TrangThai"].'</span>';
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
                        // chuyển đã giao
                        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-ChuyenDaGiao'])){
                            if(isset($_POST['ckb']) && $_POST['ckb'] != null){
                                foreach ($_POST['ckb'] as $checked_ID) {
                                    $query_ChuyenDaGiao = "update tblDonHang set TrangThai = N'đã giao' where ID = '".$checked_ID."'";
                                    $result_ChuyenDaGiao = mysqli_query($conn, $query_ChuyenDaGiao);
                                    if($result_ChuyenDaGiao == true){
    
                                    }
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                                echo "<script type='text/javascript'>";
                                echo "alert('Cập nhật thành công');";
                                // echo "<meta http-equiv='refresh' content='0'>";
                                echo "</script>";
                            }else{
                                echo "<script type='text/javascript'>";
                                echo "alert('Chưa có đơn hàng nào được chọn!');";
                                // echo "window.location.reload();";
                                echo "</script>";
                            }
                            
                            
                        }
                        // chuyển giao thất bại
                        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-ChuyenGiaoThatBai'])){
                            if(isset($_POST['ckb']) && $_POST['ckb'] != null){
                                foreach ($_POST['ckb'] as $checked_ID) {
                                    $query_ChuyenGiaoThatBai = "update tblDonHang set TrangThai = N'giao thất bại' where ID = '".$checked_ID."'";
                                    $result_ChuyenGiaoThatBai = mysqli_query($conn, $query_ChuyenGiaoThatBai);
                                    if($result_ChuyenGiaoThatBai == true){
    
                                    }
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                                echo "<script type='text/javascript'>";
                                echo "alert('Cập nhật thành công');";
                                // echo "<meta http-equiv='refresh' content='0'>";
                                echo "</script>";
                            }else{
                                echo "<script type='text/javascript'>";
                                echo "alert('Chưa có đơn hàng nào được chọn!');";
                                // echo "window.location.reload();";
                                echo "</script>";
                            }
                            
                            
                        }
                    }
                    
                    echo '</form>';
                    echo '</tbody>';
                ?>

                <!-- đã giao -->
                <?php 
                echo '<tbody id="tBodyMain">';
                    if(isset($_GET["TrangThai"]) && $_GET["TrangThai"] == 'DaGiao'){
                    echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where TrangThai = N'đã giao' order by NgayDat desc";
                        
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    $DiaChiDatHang = $row["DiaChiChiTiet"]."-".$row["Xa"]."-".$row["Huyen"]."-".$row["ThanhPho"];
                                    echo '<tr>';
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                        echo '<td>'.$row["STT"].'</td>';
                                        echo '<td style="position: relative;">';
                                        echo '<a href="" class="order-item">sản phẩm</a>';
                                        echo '<div class="order-item-detail">';
                                        echo '<table class="table" style="width:100%">';
                                        echo '<thead class="thead-dark">';
                                                            echo '<tr>';
                                                            echo '<th scope="col">Sản phẩm</th>';
                                                            echo '<th scope="col">đơn giá</th>';
                                                            echo '<th scope="col" style="min-width:100px">số lượng</th>';
                                                            echo '</tr>';
                                                            echo '</thead>';
                                                            echo '<tbody>';
                                                            $query1 = "SELECT tblDaDatHang.*, tblsanpham.DuongDanAnh FROM tblDaDatHang,tblSanPham WHERE tblDaDatHang.TenSanPham = tblsanpham.TenSanPham AND tblDaDatHang.EmailUser = '".$row["EmailUser"]."' and IdDonHang ='" . $row["ID"] . "'";
                                                            $result1 = mysqli_query($conn, $query1);
                                                            if(mysqli_num_rows($result1) > 0){          
                                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                            echo '<tr>';
                                                            echo '<th scope="row" style="max-width:280px;text-align: left;">';
                                                                echo '<a class="cart-product" style="width:280px;">';
                                                                    echo '<img width="20%" src=".'.$row1["DuongDanAnh"].'" alt="">';
                                                                    echo $row1["TenSanPham"];
                                                                        echo '</a>';
                                                                    echo '</th>';
                                                                echo '<td>'.number_format($row1["DonGia"], 0, '', ',').'</td>';
                                                                echo '<td>'.$row1["SoLuong"].'</td>';
                                                            echo '</tr>';
                                                                }
                                                            }else{
                                                                echo 'data empty';
                                                            }
                                                            echo '</tbody>';
                                                        echo '</table>';
                                                    echo '</div>';
                                            
                                                    echo '</td>';
                                        echo '<td>'.$row["TenNguoiNhan"].'</td>';
                                        echo '<td>'.$row["SDT"].'</td>';
                                        echo '<td>'.$DiaChiDatHang.'</td>';
                                        echo '<td>'.number_format($row["TongTien"], 0, '', ',').'</td>';
                                        echo '<td>'.$row["NgayDat"].'</td>';
                                        echo '<td>';
                                        if($row["TrangThai"] == 'chờ xác nhận'){
                                            echo '<span class="status">'.$row["TrangThai"].'</span>';
                                        }else if($row["TrangThai"] == 'đang giao'){
                                            echo '<span class="status" style="background-color:#03a9f3;">'.$row["TrangThai"].'</span>';
                                        }elseif($row["TrangThai"] == 'đã hủy' || $row["TrangThai"] == 'giao thất bại'){
                                            echo '<span class="status" style="background-color:#e46a76;">'.$row["TrangThai"].'</span>';
                                        }
                                        else{
                                            echo '<span class="status" style="background-color:#00c292;">'.$row["TrangThai"].'</span>';
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
                    }
                    echo '</tbody>';
                ?>

                <!-- hoàn hàng -->
                <?php 
                echo '<tbody id="tBodyMain">';
                    if(isset($_GET["TrangThai"]) && $_GET["TrangThai"] == 'ThatBai'){
                    echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where TrangThai = N'đã hủy' or TrangThai = N'giao thất bại'  order by NgayDat desc";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    $DiaChiDatHang = $row["DiaChiChiTiet"]."-".$row["Xa"]."-".$row["Huyen"]."-".$row["ThanhPho"];
                                    echo '<tr>';
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                        echo '<td>'.$row["STT"].'</td>';
                                        echo '<td style="position: relative;">';
                                        echo '<a href="" class="order-item">sản phẩm</a>';
                                        echo '<div class="order-item-detail">';
                                        echo '<table class="table" style="width:100%">';
                                        echo '<thead class="thead-dark">';
                                                            echo '<tr>';
                                                            echo '<th scope="col">Sản phẩm</th>';
                                                            echo '<th scope="col">đơn giá</th>';
                                                            echo '<th scope="col" style="min-width:100px">số lượng</th>';
                                                            echo '</tr>';
                                                            echo '</thead>';
                                                            echo '<tbody>';
                                                            $query1 = "SELECT tblDaDatHang.*, tblsanpham.DuongDanAnh FROM tblDaDatHang,tblSanPham WHERE tblDaDatHang.TenSanPham = tblsanpham.TenSanPham AND tblDaDatHang.EmailUser = '".$row["EmailUser"]."' and IdDonHang ='" . $row["ID"] . "'";
                                                            $result1 = mysqli_query($conn, $query1);
                                                            if(mysqli_num_rows($result1) > 0){          
                                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                            echo '<tr>';
                                                            echo '<th scope="row" style="max-width:280px;text-align: left;">';
                                                                echo '<a class="cart-product" style="width:280px;">';
                                                                    echo '<img width="20%" src=".'.$row1["DuongDanAnh"].'" alt="">';
                                                                    echo $row1["TenSanPham"];
                                                                        echo '</a>';
                                                                    echo '</th>';
                                                                echo '<td>'.number_format($row1["DonGia"], 0, '', ',').'</td>';
                                                                echo '<td>'.$row1["SoLuong"].'</td>';
                                                            echo '</tr>';
                                                                }
                                                            }else{
                                                                echo 'data empty';
                                                            }
                                                            echo '</tbody>';
                                                        echo '</table>';
                                                    echo '</div>';
                                            
                                                    echo '</td>';
                                        echo '<td>'.$row["TenNguoiNhan"].'</td>';
                                        echo '<td>'.$row["SDT"].'</td>';
                                        echo '<td>'.$DiaChiDatHang.'</td>';
                                        echo '<td>'.number_format($row["TongTien"], 0, '', ',').'</td>';
                                        echo '<td>'.$row["NgayDat"].'</td>';
                                        echo '<td>';
                                        if($row["TrangThai"] == 'chờ xác nhận'){
                                            echo '<span class="status">'.$row["TrangThai"].'</span>';
                                        }else if($row["TrangThai"] == 'đang giao'){
                                            echo '<span class="status" style="background-color:#03a9f3;">'.$row["TrangThai"].'</span>';
                                        }elseif($row["TrangThai"] == 'đã hủy' || $row["TrangThai"] == 'giao thất bại'){
                                            echo '<span class="status" style="background-color:#e46a76;">'.$row["TrangThai"].'</span>';
                                        }
                                        else{
                                            echo '<span class="status" style="background-color:#00c292;">'.$row["TrangThai"].'</span>';
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
                    }
                    echo '</tbody>';
                ?>
            <!-- </tbody> -->
            </table>
        </div>
    <!-- đơn hàng -->
        </div>
    </div>
    
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>