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
    <link rel="stylesheet" href="./style/admin.css" type="text/css">
    <link rel="stylesheet" href="./style/QuanLiSanPham.css" type="text/css">

</head>
<body>
    <div class="sidebar-menu">
        <div class="sidebar-menu-logo">
            <a href="admin.php" class="heading-icon-link">
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
                <li class="menu-item" style="background-color: rgba(255,255,255, 0.1);">
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
        <div class="QuanLiSP">
        <?php 
            if(isset($_GET["ID"]) && isset($_GET["Controler"]) && $_GET["Controler"] == 'update'){
                    $_ID = $_GET["ID"];
                    $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                    if (!$conn) {
                        die("Kết nối thất bại" . mysqli_connect_error());
                    }

                    $query1 = "SELECT tblSanPham.*, tblDanhMuc.ID, tblDanhMuc.TenDanhMuc from tblSanPham, tblDanhMuc where tblSanPham.ID =" . $_ID . " and tblSanPham.IdDanhMuc=tblDanhMuc.ID";
                    $result1 = mysqli_query($conn, $query1);

                    if (mysqli_num_rows($result1)) {

                        $row1 = mysqli_fetch_assoc($result1);
                            $_TenSanPham = $row1["TenSanPham"];
                            $_IdDanhMuc = $row1['IdDanhMuc'];
                            $_TenDanhMuc = $row1["TenDanhMuc"];
                            $_DuongDanAnh = $row1["DuongDanAnh"];
                            $_GiaGoc = $row1['GiaGoc'];
                            $_GiaKhuyenMai = $row1['GiaKhuyenMai'];
                            $_MoTa = $row1["MoTaSanPham"];
                        
                    
                }
            }
            else{
                
                $_TenSanPham = '';
                $_IdDanhMuc = '';
                $_TenDanhMuc = '---------Chọn danh mục---------';
                $_DuongDanAnh = '';
                $_GiaGoc = '';
                $_GiaKhuyenMai = '';
                $_MoTa = '';
            }
        ?>
            <form action="" method="post">
            <div class="main-header">
                <h3 style="margin-bottom: 30px;">Quản lí sản phẩm</h3>
                <div class="main-header-btn">
                    <a class="export-file" href=""><i class="fas fa-undo-alt"></i></a>
                    <button type="submit" class="add-new" name="btnSave">Ghi dữ liệu</button>
                    
                </div>
            </div>

            <div class="input-layout" >
                <div class="product-layout-left">
                    <h5>Thông tin sản phẩm</h5>
                    <div class="row" style="margin: 16px 0;">
                        <span class="col form-input">
                            <label for="">Tên sản phẩm *</label>
                            <input class="form-control" value="<?php echo $_TenSanPham ?>" type="text" name="txtTenSanPham" placeholder="Nhập tên sản phẩm" required>
                        </span>     
                    </div>
                    <div class="row" style="margin: 16px 0;">
                        <span class="col form-input">
                            <label for="">Danh mục *</label>
                            <select class="form-control" name="txtDanhMuc">

                                <option  value="<?php echo $_IdDanhMuc ?>"> <?php echo $_TenDanhMuc ?> </option>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                                if (!$conn) {
                                    die("Kết nối thất bại" . mysqli_connect_error());
                                }

                                $query_DanhMuc = "SELECT * from tblDanhMuc";
                                $result_DanhMuc = mysqli_query($conn, $query_DanhMuc);

                                if (mysqli_num_rows($result_DanhMuc)) {

                                    while ($row_DanhMuc = mysqli_fetch_assoc($result_DanhMuc)) {
                                        echo '<option value='.$row_DanhMuc["ID"].'>'.$row_DanhMuc["TenDanhMuc"].'</option>';
                                    }
                                }
                                ?>
                                
                            </select>
                        </span>     
                    </div>
                    <div class="row" style="margin: 16px 0;">
                        <span class="col form-input">
                            <label for="">Mô tả sản phẩm *</label>
                            <textarea class="form-control" name="txtMoTa" id="" rows="13" required> <?php echo $_MoTa ?> </textarea>
                        </span>     
                    </div>
                </div>
                <div class="product-layout-right">
                    <div class="layout-price">
                        <h5>Giá</h5>
                        <div class="row" style="margin-bottom:16px;">
                        <span class="col form-input">
                            <label for="">Giá gốc *</label>
                            <input class="form-control" type="text" value="<?php echo $_GiaGoc ?>" name="txtGiaGoc" placeholder="Nhập tên sản phẩm" required>
                        </span>     
                        </div>
                        <div class="row" style="margin-bottom:16px;">
                        <span class="col form-input">
                            <label for="">Giá khuyến mãi *</label>
                            <input class="form-control" type="text" value="<?php echo $_GiaKhuyenMai ?>" name="txtGiaKhuyenMai" placeholder="Nhập tên sản phẩm" required>
                        </span>     
                    </div>
                    </div>
                    <div class="layout-image">
                        <h5>Hình ảnh</h5>
                        <div class="row" style="margin-bottom:16px;">
                        <span class="col form-input">
                            <input type="file" class="form-control-file" name="txtDuongDanAnh" id="">
                        </span>   
                        </div>
                        <img src=".<?php echo $_DuongDanAnh ?>" alt="" width="100%" height="75%">
                </div>
                        
            </div>
            </form>
        
        <!-- thêm -->
        <?php
        if(isset($_GET["Controler"]) && $_GET["Controler"] == 'insert'){
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btnSave"])){

                $TenSanPham = $_POST["txtTenSanPham"];
                $DanhMuc = $_POST["txtDanhMuc"];
                $DuongDanAnh = './img/'.$_POST["txtDuongDanAnh"];
                $GiaGoc = $_POST["txtGiaGoc"];
                $GiaKhuyenMai = $_POST["txtGiaKhuyenMai"];
                $MoTa = $_POST["txtMoTa"];

                $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                if (!$conn) {
                    die("Kết nối thất bại" . mysqli_connect_error());
                }else{
                    $query = "insert into tblSanPham values ('', '".$TenSanPham."', '".$DanhMuc."', '".$DuongDanAnh."', '".$GiaGoc."', '".$GiaKhuyenMai."', '".$MoTa."')";
                    $result = mysqli_query($conn, $query);

                    if ($result == true) {
                        echo "<script type='text/javascript'>";
                        echo "alert('Thêm mới sản phẩm thành công!');";
                        echo "window.location.href='QuanLiSanPham.php';";
                        echo "</script>";
                    }else{
                        echo 'thất bại';
                    }
                }

            }  
            
        }
        
        ?>
<!-- sửa -->
        <?php
        if(isset($_GET["ID"]) && isset($_GET["Controler"]) && $_GET["Controler"] == 'update'){
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btnSave"])){
                $_ID_update = $_GET["ID"];

                $TenSanPham_update = $_POST["txtTenSanPham"];
                $DanhMuc_update = $_POST["txtDanhMuc"];
                $DuongDanAnh_update = './img/'.$_POST["txtDuongDanAnh"];
                $GiaGoc_update = $_POST["txtGiaGoc"];
                $GiaKhuyenMai_update = $_POST["txtGiaKhuyenMai"];
                $MoTa_update = $_POST["txtMoTa"];

                    $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                    if (!$conn) {
                        die("Kết nối thất bại" . mysqli_connect_error());
                    }

                    $query2 = "update tblSanPham set TenSanPham = '".$TenSanPham_update."', IdDanhMuc='".$DanhMuc_update."', DuongDanAnh='".$DuongDanAnh_update."', GiaGoc='".$GiaGoc_update."', GiaKhuyenMai='".$GiaKhuyenMai_update."',MoTaSanPham='".$MoTa_update."' where ID = ".$_ID_update."";
                    $result2 = mysqli_query($conn, $query2);

                    if ($result2 == true) {
                        echo "<script type='text/javascript'>";
                        echo "alert('Sửa sản phẩm thành công!');";
                        echo "window.location.href='QuanLiSanPham.php';";
                        echo "</script>";
                }
            }
        }
        ?>

        <!-- xóa -->
        <?php
        if(isset($_GET["ID"]) && isset($_GET["Controler"]) && $_GET["Controler"] == 'delete'){
                $_ID_delete = $_GET["ID"];

                    $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                    if (!$conn) {
                        die("Kết nối thất bại" . mysqli_connect_error());
                    }

                    $query2 = "delete from tblSanPham where ID = ".$_ID_delete."";
                    $result2 = mysqli_query($conn, $query2);

                    if ($result2 == true) {
                        echo "<script type='text/javascript'>";
                        echo "alert('Xóa sản phẩm thành công!');";
                        echo "window.location.href='QuanLiSanPham.php';";
                        echo "</script>";
                }
            }
        
        ?>
    </div>
    </div>
</body>
</html>