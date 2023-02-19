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
            <h5 style="color: #fff;">Chào, Huy</h5>
        </div>
        <div class="menu">
            <ul class="menu-list">
                <li class="menu-item">
                    <a class="menu-item-link" href="admin.php">Tổng quan</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiDonHang.php">Quản lí đơn hàng</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiSanPham.php">Quản lí sản phẩm</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiDanhMuc.php">Quản lí danh mục</a>
                </li>
                <li class="menu-item" style="background-color: rgba(255,255,255, 0.1);">
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

            <div class="main-header">
                <h3 style="margin-bottom: 30px;">Tư vấn thiết kế</h3>
                <div class="main-header-btn">
                    <!-- <button type="submit" form="formDanhMuc" name="btnSave" class="add-new">+ Thêm mới</button> -->
                    <a class="export-file" href=""><i class="fas fa-file-download"></i></a>
                </div>
            </div>
<!-- lấy số liệu -->
<?php 
            $conn = mysqli_connect("localhost", "root", "", "webnoithat");
            if (!$conn) {
                die("Kết nối thất bại" . mysqli_connect_error());
            }
            $_TatCa = "SELECT count(*) as 'TatCa' from tblDatLichTuVan";
            $_TatCa = mysqli_query($conn, $_TatCa);

            if (mysqli_num_rows($_TatCa)) {
                $row_TatCa = mysqli_fetch_assoc($_TatCa);
                    $_TatCa = $row_TatCa["TatCa"];
            }

            $_ChuaTuVan = "SELECT count(*) as 'ChuaTuVan' from tblDatLichTuVan where TrangThai = N'chưa tư vấn'";
            $_ChuaTuVan = mysqli_query($conn, $_ChuaTuVan);

            if (mysqli_num_rows($_ChuaTuVan)) {
                $row_ChuaTuVan = mysqli_fetch_assoc($_ChuaTuVan);
                    $_ChuaTuVan = $row_ChuaTuVan["ChuaTuVan"];
            }

            $_TuVanThanhCong = "SELECT count(*) as 'TuVanThanhCong' from tblDatLichTuVan where TrangThai = N'tư vấn thành công'";
            $_TuVanThanhCong = mysqli_query($conn, $_TuVanThanhCong);

            if (mysqli_num_rows($_TuVanThanhCong)) {
                $row_TuVanThanhCong = mysqli_fetch_assoc($_TuVanThanhCong);
                    $_TuVanThanhCong = $row_TuVanThanhCong["TuVanThanhCong"];
            }

            $_TuVanThatBai = "SELECT count(*) as 'TuVanThatBai' from tblDatLichTuVan where TrangThai = N'tư vấn thất bại'";
            $_TuVanThatBai = mysqli_query($conn, $_TuVanThatBai);

            if (mysqli_num_rows($_TuVanThatBai)) {
                $row_TuVanThatBai = mysqli_fetch_assoc($_TuVanThatBai);
                    $_TuVanThatBai = $row_TuVanThatBai["TuVanThatBai"];
            }
             
?>
            <div class="today-status">
            <a href="TuVanThietKe.php" class="today-status-item">
                <div class="today-status-item-icon">
                <i class="fas fa-users"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Tất cả</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_TatCa ?></span>
                </div>
            </a>
            <a href="TuVanThietKe.php?TrangThai=ChuaTuVan" class="today-status-item">
                <div class="today-status-item-icon">
                    <i class="fas fa-phone-slash"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Chưa tư vấn</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_ChuaTuVan ?></span>
                </div>
            </a>
            <a href="TuVanThietKe.php?TrangThai=TuVanThanhCong" class="today-status-item">
                <div class="today-status-item-icon">
                <i class="fas fa-check"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Tư vấn thành công</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_TuVanThanhCong ?></span>
                </div>
            </a>
            <a href="TuVanThietKe.php?TrangThai=TuVanThatBai" class="today-status-item">
                <div class="today-status-item-icon">
                <i class="fas fa-times"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Tư vấn thất bại</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_TuVanThatBai ?></span>
                </div>
            </a>
        </div>

            <div class="search-btn" style="position: relative;margin-top:30px">
                <form method="post">
                    <input type="text" class="search-input" name="txtSearch" id="inputSearch" placeholder="Nhập từ khóa" value="<?php if (isset($_POST['txtSearch'])) echo $_POST['txtSearch']; ?>">
                    <a style="position: absolute;top:4px;left:180px;" href=""><i class="fas fa-times"></i></a>
                    
                    <button class="btn-search" type="submit" name="btnSearch">
                        Tìm
                    <i class="fas fa-search" style="margin-left:4px"></i>
                </button>
                </form>
            </div>
        <!-- <h5 style="color: #75ab38;">Tổng quan hôm nay</h5> -->
        
        <div class="order-layout" style="margin:0;position:relative;width:70%;margin-top:30px">
        <table class="table" style="font-size: 14px;">
            <thead>
                <tr>
                <th scope="col"><input type="checkbox" class="form-check-input checkbox1" id="select-all"></th>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Trạng thái</th>
                <!-- <th scope="col">Thao tác</th> -->

                </tr>
            </thead>
            <!-- <tbody> -->
                <?php
                    echo '<tbody id="tBodyMain">';
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r ";
                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                $KeyWord = $_POST['txtSearch'];
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or TenKhachHang like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%'";
                            }
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>';
                                        echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                        echo '<td>'.$row["STT"].'</td>';
                                        
                                        echo '<td>'.$row["TenKhachHang"].'</td>';
                                        echo '<td>'.$row["SDT"].'</td>';
                                        
                                        echo '<td>';
                                        if($row["TrangThai"] == 'chưa tư vấn'){
                                            echo '<span class="status">'.$row["TrangThai"].'</span>';
                                        }
                                        elseif($row["TrangThai"] == 'tư vấn thành công'){
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
                    echo '</tbody>'
                ?>
                <!-- chưa tư vấn -->
                <?php
                        echo '<tbody id="tBodyMain">';
                        if(isset($_GET["TrangThai"]) && $_GET["TrangThai"] == 'ChuaTuVan'){
                        echo '<form method="post">';
                        echo '<button type="submit" onclick="return confirm(\'Xác nhận tư vấn thành công?\')" name="btn-ChuyenTuVanThanhCong" class="add-new" style="position:absolute;top:-60px;right:130px;">Tư vấn thành công</button>';
                        echo '<button type="submit" onclick="return confirm(\'Xác nhận tư vấn thất bại?\')" name="btn-ChuyenTuVanThatBai" class="add-new" style="position:absolute;top:-60px;right:-10px;">Tư vấn thất bại</button>';
                        
                        echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                            $conn = mysqli_connect("localhost", "root","","webnoithat");
                            if($conn == true){
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r where TrangThai = N'chưa tư vấn'";
                                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                    $KeyWord = $_POST['txtSearch'];
                                    $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or TenKhachHang like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%'";
                                }
                                $result = mysqli_query($conn, $query);
                                if(mysqli_num_rows($result) > 0){          
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<tr>';
                                            echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                            echo '<td>'.$row["STT"].'</td>';
                                            
                                            echo '<td>'.$row["TenKhachHang"].'</td>';
                                            echo '<td>'.$row["SDT"].'</td>';
                                            
                                            echo '<td>';
                                            if($row["TrangThai"] == 'chưa tư vấn'){
                                                echo '<span class="status">'.$row["TrangThai"].'</span>';
                                            }
                                            elseif($row["TrangThai"] == 'tư vấn thành công'){
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
                            // chuyển tư vấn thành công
                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-ChuyenTuVanThanhCong'])){
                                if(isset($_POST['ckb']) && $_POST['ckb'] != null){
                                    foreach ($_POST['ckb'] as $checked_ID) {
                                        $query_ChuyenTuVanThanhCong = "update tblDatLichTuVan set TrangThai = N'tư vấn thành công' where ID = '".$checked_ID."'";
                                        $result_ChuyenTuVanThanhCong = mysqli_query($conn, $query_ChuyenTuVanThanhCong);
                                        if($result_ChuyenTuVanThanhCong == true){
        
                                        }
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    echo "<script type='text/javascript'>";
                                    echo "alert('Cập nhật thành công');";
                                    // echo "<meta http-equiv='refresh' content='0'>";
                                    echo "</script>";
                                }else{
                                    echo "<script type='text/javascript'>";
                                    echo "alert('Chưa có khách hàng nào được chọn!');";
                                    // echo "window.location.reload();";
                                    echo "</script>";
                                }
                                
                                
                            }
                            // chuyển tư vấn thất bại
                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-ChuyenTuVanThatBai'])){
                                if(isset($_POST['ckb']) && $_POST['ckb'] != null){
                                    foreach ($_POST['ckb'] as $checked_ID) {
                                        $query_ChuyenTuVanThatBai = "update tblDatLichTuVan set TrangThai = N'tư vấn thất bại' where ID = '".$checked_ID."'";
                                        $result_ChuyenTuVanThatBai = mysqli_query($conn, $query_ChuyenTuVanThatBai);
                                        if($result_ChuyenTuVanThatBai == true){
        
                                        }
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    echo "<script type='text/javascript'>";
                                    echo "alert('Cập nhật thành công');";
                                    // echo "<meta http-equiv='refresh' content='0'>";
                                    echo "</script>";
                                }else{
                                    echo "<script type='text/javascript'>";
                                    echo "alert('Chưa có khách hàng nào được chọn!');";
                                    // echo "window.location.reload();";
                                    echo "</script>";
                                }
                                
                                
                            }
                        echo '</form>';
                        echo '</tbody>';
                    }
                ?>

                <!-- tư vấn thành công -->
                <?php
                        echo '<tbody id="tBodyMain">';
                        if(isset($_GET["TrangThai"]) && $_GET["TrangThai"] == 'TuVanThanhCong'){
                        echo '<form method="post">';
                        
                        echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                            $conn = mysqli_connect("localhost", "root","","webnoithat");
                            if($conn == true){
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r where TrangThai = N'tư vấn thành công'";
                                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                    $KeyWord = $_POST['txtSearch'];
                                    $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or TenKhachHang like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%'";
                                }
                                $result = mysqli_query($conn, $query);
                                if(mysqli_num_rows($result) > 0){          
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<tr>';
                                            echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                            echo '<td>'.$row["STT"].'</td>';
                                            
                                            echo '<td>'.$row["TenKhachHang"].'</td>';
                                            echo '<td>'.$row["SDT"].'</td>';
                                            
                                            echo '<td>';
                                            if($row["TrangThai"] == 'chưa tư vấn'){
                                                echo '<span class="status">'.$row["TrangThai"].'</span>';
                                            }
                                            elseif($row["TrangThai"] == 'tư vấn thành công'){
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
                    }
                ?>

                <!-- tư vấn thất bại -->
                <?php
                        echo '<tbody id="tBodyMain">';
                        if(isset($_GET["TrangThai"]) && $_GET["TrangThai"] == 'TuVanThatBai'){
                        echo '<form method="post">';
                        
                        echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                            $conn = mysqli_connect("localhost", "root","","webnoithat");
                            if($conn == true){
                                $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r where TrangThai = N'tư vấn thất bại'";
                                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                                    $KeyWord = $_POST['txtSearch'];
                                    $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDatLichTuVan t, (SELECT @row := 0) r where ID like N'%".$KeyWord."%' or TenKhachHang like N'%".$KeyWord."%' or SDT like N'%".$KeyWord."%'";
                                }
                                $result = mysqli_query($conn, $query);
                                if(mysqli_num_rows($result) > 0){          
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<tr>';
                                            echo '<td scope="col"><input type="checkbox" class="form-check-input checkbox1" name="ckb[]" value="'.$row["ID"].'"></td>';
                                            echo '<td>'.$row["STT"].'</td>';
                                            
                                            echo '<td>'.$row["TenKhachHang"].'</td>';
                                            echo '<td>'.$row["SDT"].'</td>';
                                            
                                            echo '<td>';
                                            if($row["TrangThai"] == 'chưa tư vấn'){
                                                echo '<span class="status">'.$row["TrangThai"].'</span>';
                                            }
                                            elseif($row["TrangThai"] == 'tư vấn thành công'){
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
                    }
                ?>
        </table>
        </div>
        
</body>
</html>