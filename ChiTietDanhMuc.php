<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="./font/fontawesome-free-5.15.4-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="./style/ChiTietDanhMuc.css">
    
    <title>Sản phẩm</title>
</head>
<body>
    <header class="heading">
    <?php
    session_start();
    if(isset($_SESSION['ID'])){
        
        // $_ID = $_GET["ID"];
        $conn = mysqli_connect("localhost", "root", "", "webnoithat");
        if (!$conn) {
            die("Kết nối thất bại" . mysqli_connect_error());
        }

        $query = "SELECT * from tblDangNhap where ID ='" . $_SESSION['ID'] . "'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {

            $row = mysqli_fetch_assoc($result);
            echo '<div class="user-name">';
            echo '<span>'.$row["TenHienThi"].'</span>';
            echo '<a href="DangXuat.php">(Đăng xuất)</a>';
            echo '</div>';
        }
    }   
    ?>
        <div class="heading-icon">
            <a href="index.php" class="heading-icon-link">
                <img src="./img/bii_store_auto_x2__1_-removebg-preview (2).png" width="38%" alt="">
            </a>
        </div>
        <div class="heading-search">
            <form class="txtSearch" action="post">
                <input type="text" class="heading-search-input" placeholder="Nhập từ khóa tìm kiếm">
                <button class="btn-search" type="submit" >
                    Tìm
                    <i class="fas fa-search" style="margin-left:4px"></i>
                </button>
            </form>
        </div>
        <div class="heading-btn">
            <div class="heading-btn-link login-dropdown-show">
                <i class="far fa-user"></i>
                <div class="login-dropdown">
                    <a href="DangKi.php">Đăng kí</a>
                    <a href="DangNhap.php">Đăng nhập</a>
                    <a href="">Đăng xuất</a>
                </div>
            </div>
            <div class="heading-btn-link" onclick="openNav()">
                <i class="fas fa-shopping-cart"></i>
                <?php
                    // session_start();
                    if(isset($_SESSION['userName'])){
                        
                        // $_ID = $_GET["ID"];
                        $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                        if (!$conn) {
                            die("Kết nối thất bại" . mysqli_connect_error());
                        }

                        $query = "SELECT COUNT(TenSanPham) as 'count' FROM tblgiohang where EmailUser ='" . $_SESSION['userName'] . "'";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result)) {

                            $row = mysqli_fetch_assoc($result);
                            echo '<div class="cart-quantity">'.$row["count"].'</div>';
                        }
                    }else{
                        echo '<div class="cart-quantity">0</div>';
                    }   
                ?>
                
            </div>
    </header>
    <!-- giỏ hàng -->
    <div id="cart-sidebar" class="cart-sidebar">
        <div style="overflow-y: auto;">
            <div class="cart-sidebar-header">
                <h3>Chi tiết giỏ hàng</h3>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            </div>
        <div>
            <?php
                // session_start();
                if(isset($_SESSION['userName'])){
                    
                    // $_ID = $_GET["ID"];
                    $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                    if (!$conn) {
                        die("Kết nối thất bại" . mysqli_connect_error());
                    }

                    $query = "SELECT tblgiohang.*, tblsanpham.DuongDanAnh FROM tblgiohang,tblSanPham WHERE tblgiohang.TenSanPham = tblsanpham.TenSanPham AND tblgiohang.EmailUser ='" . $_SESSION['userName'] . "'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result)) {

                        while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="cart-sidebar-item">';
                        echo '<div class="cart-img">';
                        echo '<img width="100%" src="'.$row["DuongDanAnh"].'" alt="">';
                        echo '</div>';
                        echo '<div class="cart-item-info">';
                            echo '<div>';
                            echo '<h5 class="cart-item-name">'.$row["TenSanPham"].'</h5>';
                            echo '<span class="cart-item-price">'.number_format($row["DonGia"], 0, '', ',').' <span>x '.$row["SoLuong"].'</span></span>';
                            echo '</div>';
                            
                            echo '<a class="cart-delete-item" href="#">x</a>';
                        echo '</div>';
                        
                        echo '</div>';
                        }
                    }
                }   
            ?>
        </div>
            
            </div>
            
            <div class="cart-sidebar-btn">
                <a style="display:block; height:100%;" href="GioHang.php">Xem chi tiết</a>
            </div>
    
        </div>
        <script>
        function openNav() {
            document.getElementById("cart-sidebar").style.right = "0";
        }

        function closeNav() {
            document.getElementById("cart-sidebar").style.right = "-320px";
        }
        </script>
    <!-- giỏ hàng -->

    <div class="nav-bar">
        <ul class="nav-bar-list">
            <li class="nav-bar-list nav-bar-item">
                    
                <a class="nav-bar-item-link" href="#">
                    <i class="fas fa-home" style="font-size: 20px;"></i>
                    Trang chủ

                </a>
            </li>
        </ul>
    </div>
    
    
    <div class="main-control">
        <div class="category-layout">
            <div class="filter-product">
                <div class="filter-header">
                    <h4>Lọc sản phẩm</h4>
                </div>
                <div class="filter-controler">
                    <form action="" method="post" style="width:100%">
                        <div class="rdo-category">
                            <h5>Danh mục sản phẩm</h5>
                            <?php
                                $_ID = $_GET["ID"];
                                // get value
                                $conn = mysqli_connect("localhost", "root","","webnoithat");
                                if($conn == true){
                                    $query = "select * from tblDanhMuc";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($result) > 0){                

                                        while($row = mysqli_fetch_assoc($result)){
                                            echo '<div class="rdo-row">';
                                            if($_ID == $row["ID"]){
                                                echo '<input class="form-check-input rdo" type="radio" value="'.$row["ID"].'" name="rdoDanhMuc" checked>';

                                            }else{
                                            echo '<input class="form-check-input rdo" type="radio" value="'.$row["ID"].'" name="rdoDanhMuc">';

                                            }
                                            echo '<span style="margin: 8px 0 0 12px;">'.$row["TenDanhMuc"].'</span>';
                                            echo '</div>';
                                        }

                                    }
                                    else{
                                        echo "data empty";
                                    }
                                }
                                else{
                                    echo "Connect error: " . mysqli_connect_error();
                                }
                            ?>
                            
                            <!-- <div class="rdo-row">
                                <input class="form-check-input rdo" type="radio" value="" name="rdo">
                                <span style="margin: 8px 0 0 12px;">Ghế</span>
                            </div>
                            <div class="rdo-row">
                                <input class="form-check-input rdo" type="radio" value="" name="rdo">
                                <span style="margin: 8px 0 0 12px;">Ghế</span>
                            </div>
                            <div class="rdo-row">
                                <input class="form-check-input rdo" type="radio" value="" name="rdo">
                                <span style="margin: 8px 0 0 12px;">Ghế</span>
                            </div> -->
                        </div>
                        <h5 style="margin: 12px ;">Giá</h5>
                        <div class="filter-price">
                            
                            <div class=" from-price">
                                <span>Từ</span>
                                <input name="txtGiaTu" class="form-control from-price-input" type="text">
                                <span style="position: absolute;top: 31px;right: 24px;">VND</span>
                            </div>
                            <div class="to-price">
                                <span>Đến</span>
                                <input name="txtGiaDen" class="form-control to-price-input" type="text">
                                <span style="position: absolute;top: 31px;right: 24px;">VND</span>
                            </div>
                            
                        </div>
                        <button name="btnLoc" type="submit" class="btn-filter">Lọc</button>
                    </form>
                    
                </div>
            </div>
<!-- lọc sản phẩm -->
<?php
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnLoc'])){
                filter();
                
            }
            function filter(){

                // echo "<script type='text/javascript'> var Main = document.getElementById('tblMain'); Main.innerHTML='';</script>";
                $DanhMuc = $_POST['rdoDanhMuc'];
                $GiaTu = $_POST['txtGiaTu'];
                $GiaDen = $_POST['txtGiaDen'];
                // echo "<script type='text/javascript'> var txtsearch = document.getElementById('txtsearch'); txtsearch.innerHTML=".$KeyWord." </script>";

                $conn = mysqli_connect("localhost", "root","","webnoithat");
                if($conn != true){
                    echo "Connect error: " . mysqli_connect_error();
                    
                }
                else{
                    $query = "select * from tblSanPham where IdDanhMuc = '".$DanhMuc."'";
                    
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    if($result != null && mysqli_num_rows($result) > 0){
                        echo "<script type='text/javascript'>";
                        // echo "alert('xóa dữ liệu thành công!');";
                        echo "window.location.href='ChiTietDanhMuc.php?ID=".$row["IdDanhMuc"]."&GiaTu=".$GiaTu."&GiaDen=".$GiaDen."';";
                        echo "</script>";
                    }
                    else{
                        echo "data is empty";
                    }
                }
            }
            
            
    ?>

            <div class="category-products">
                <div class="category-products-header">
                <?php
                    if(isset($_GET['GiaTu']) || isset($_GET['GiaDen'])){
                        
                        $_GiaTu = $_GET["GiaTu"];
                        $_GiaDen = $_GET["GiaDen"];
                    }
                    $_ID = $_GET["ID"];
                    $conn = mysqli_connect("localhost", "root","","webnoithat");
                    if($conn == true){
                        $query = "select * from tblDanhMuc where ID = '".$_ID."'";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0){  
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h4>Danh mục: '.$row["TenDanhMuc"].'</h4>';
                            }
                        }
                        else{
                            echo "data empty";
                        }
                    }
                    else{
                        echo "Connect error: " . mysqli_connect_error();
                    }
                
                    
                ?>
                </div>
                <div class="products-on-category">
                    <div class="row products-row">
                    <?php
                        $_ID = $_GET["ID"];
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            if(isset($_GET['GiaTu']) || isset($_GET['GiaDen'])){
                                if($_GiaTu == "" && $_GiaDen == ""){
                                    $query = "select * from tblSanPham where IdDanhMuc = '".$_ID."'";
                                }else{
                                    $query = "select * from tblSanPham where IdDanhMuc = '".$_ID."' and GiaKhuyenMai between '".$_GiaTu."' and '".$_GiaDen."'";
                                }
                            }else{
                                $query = "select * from tblSanPham where IdDanhMuc = '".$_ID."'";

                            }
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){                

                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<div class="col products-col" style="min-width:22%; max-width: 22%;">';
                                    echo '<div class="product-view" style="width:100%">';
                                        echo '<div class="product-img">';
                                           echo '<a href="" class="product-link">
                                                <img class="main-img" width="100%" src="'.$row["DuongDanAnh"].'" alt="">
                        
                                            </a>';
                                        echo '</div>';
                                        echo '<div class="product-btn">';
                                           echo '<a href="GioHangControler.php?TenSanPham='.$row["TenSanPham"].'&controler=addNew&DonGia='.$row["GiaKhuyenMai"].'" class="product-btn-link product-btn-cart"><i class="fas fa-shopping-cart"></i></a>';
                                           echo '<a href="ChiTietSanPham.php?ID='.$row["ID"].'" class="product-btn-link product-btn-view"><i class="far fa-eye"></i></a>';
                                        echo '</div>';
                                        echo '<div class="product-info">';
                                        echo '<h5 class="product-name">';
                                               echo '<a href="" class="product-link">'.$row["TenSanPham"].'</a>';
                                        echo '</h5>';
                    
                                        echo '<span class="price-main">'.number_format($row["GiaGoc"], 0, '', ',').'</span>';
                                        echo '<span class="price-sale">'.number_format($row["GiaKhuyenMai"], 0, '', ',').' ₫</span>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                }

                            }
                            else{
                                echo "data empty";
                            }
                        }
                        else{
                            echo "Connect error: " . mysqli_connect_error();
                        }
                    ?>
                        
                        <!-- <div class="col products-col" style="min-width:22%; max-width: 22%;">
                            <div class="product-view" style="width:100%">
                                <div class="product-img">
                                    <a href="" class="product-link">
                                        <img class="main-img" width="100%" src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/product-image/19_1.jpg" alt="">
                
                                    </a>
                                </div>
                                <div class="product-btn">
                                    <a href="" class="product-btn-link product-btn-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="ChiTietSanPham.html" class="product-btn-link product-btn-view"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">
                                        <a href="" class="product-link">Ghế sofa</a>
                                    </h5>
            
                                    <span class="price-main">1.500.000</span>
                                    <span class="price-sale">1.000.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col products-col" style="min-width:22%; max-width: 22%;">
                            <div class="product-view" style="width:100%">
                                <div class="product-img">
                                    <a href="" class="product-link">
                                        <img class="main-img" width="100%" src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/product-image/19_1.jpg" alt="">
                
                                    </a>
                                </div>
                                <div class="product-btn">
                                    <a href="" class="product-btn-link product-btn-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="ChiTietSanPham.html" class="product-btn-link product-btn-view"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">
                                        <a href="" class="product-link">Ghế sofa</a>
                                    </h5>
            
                                    <span class="price-main">1.500.000</span>
                                    <span class="price-sale">1.000.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col products-col" style="min-width:22%; max-width: 22%;">
                            <div class="product-view" style="width:100%">
                                <div class="product-img">
                                    <a href="" class="product-link">
                                        <img class="main-img" width="100%" src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/product-image/19_1.jpg" alt="">
                
                                    </a>
                                </div>
                                <div class="product-btn">
                                    <a href="" class="product-btn-link product-btn-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="ChiTietSanPham.html" class="product-btn-link product-btn-view"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">
                                        <a href="" class="product-link">Ghế sofa</a>
                                    </h5>
            
                                    <span class="price-main">1.500.000</span>
                                    <span class="price-sale">1.000.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col products-col" style="min-width:22%; max-width: 22%;">
                            <div class="product-view" style="width:100%">
                                <div class="product-img">
                                    <a href="" class="product-link">
                                        <img class="main-img" width="100%" src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/product-image/19_1.jpg" alt="">
                
                                    </a>
                                </div>
                                <div class="product-btn">
                                    <a href="" class="product-btn-link product-btn-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="ChiTietSanPham.html" class="product-btn-link product-btn-view"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">
                                        <a href="" class="product-link">Ghế sofa</a>
                                    </h5>
            
                                    <span class="price-main">1.500.000</span>
                                    <span class="price-sale">1.000.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col products-col" style="min-width:22%; max-width: 22%;">
                            <div class="product-view" style="width:100%">
                                <div class="product-img">
                                    <a href="" class="product-link">
                                        <img class="main-img" width="100%" src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/product-image/19_1.jpg" alt="">
                
                                    </a>
                                </div>
                                <div class="product-btn">
                                    <a href="" class="product-btn-link product-btn-cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="ChiTietSanPham.html" class="product-btn-link product-btn-view"><i class="far fa-eye"></i></a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">
                                        <a href="" class="product-link">Ghế sofa</a>
                                    </h5>
            
                                    <span class="price-main">1.500.000</span>
                                    <span class="price-sale">1.000.000</span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    


    <footer class="foot">
        <div class="footer-line">
            <h3 style="margin-bottom: 0;color: #fff;">Cảm ơn bạn đã ghé thăm</h3>
            <div class="goodbye"><a class="goodbye-link" href=""> Hẹn gặp lại!   </a> </div>
        </div>
        <div class="footer-info">
            <div class="footer-logo">
                <a href="#" class="heading-icon-link">
                    <img src="./img/bii_store_auto_x2__1_-removebg-preview (2).png" width="30%" alt="">
                </a>
                <div class="address">
                    <h4>Địa chỉ</h4>
                    <p>54 Triều Khúc, Thanh Xuân, Hà Nội</p>
                </div>
                <div class="social-media">
                    <a class="social-media-link" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="social-media-link" href=""><i class="fab fa-instagram" style="margin: 0 16px"></i></a>
                    <a class="social-media-link" href=""><i class="fab fa-linkedin-in"></i></a>
                    
                </div>
            </div>
            <div class="footer-send-email">
                <h4>Đăng kí nhận thông báo</h4>
                <p>Nhận thông báo về các sản phẩm, chính sách, mã giảm giá mới nhất!</p>
                <form action="post" style="position: relative;">
                    <input class="input-email" type="text" placeholder="Nhập email của bạn">
                    <button class="btn-send" type="submit"><i class="far fa-paper-plane" style="color: #fff;"></i></button>
                </form>
            </div>
            <div class="Account">
                <h4>Tài khoản</h4>
                <p>Tài khoản của tôi</p>
                <p>Lịch sử mua hàng</p>
                <p>Danh sách yêu thích</p>
            </div>
            <div class="Service">
                <h4>Dịch vụ</h4>
                <p>Chính sách hoàn tiền</p>
                <p>Lịch sử mua hàng</p>
                <p>Danh sách yêu thích</p>
            </div>
            <div class="Service">
                <h4>Thông tin về chúng tôi</h4>
                <p>Chính sách hoàn tiền</p>
                <p>Lịch sử mua hàng</p>
                <p>Danh sách yêu thích</p>
            </div>
        </div>
        <div class="footer-copyright">
            <span><a href="" class="copyright-link">Copyright © 2021 Bii Store</a> </span>
        </div>
    </footer>
</body>
</html>