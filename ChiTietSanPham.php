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
    <link rel="stylesheet" type="text/css" href="./style/ChiTietSanPham.css">
    
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
        <script>
        function openNav() {
            document.getElementById("cart-sidebar").style.right = "0";
        }

        function closeNav() {
            document.getElementById("cart-sidebar").style.right = "-320px";
        }
        </script>
    <!-- giỏ hàng -->
        
        <div class="cart-sidebar-btn">
            <a style="display:block; height:100%;" href="GioHang.php">Xem chi tiết</a>
        </div>

    </div>


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
        <h2 style="text-align:center;margin-bottom:50px">Chi tiết sản phẩm</h2>
        <div class="product-layout">
        <?php
            $_ID = $_GET["ID"];
            $conn = mysqli_connect("localhost", "root","","webnoithat");
            if($conn == true){
                $query = "select * from tblSanPham where ID = '".$_ID."'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){                

                    $row = mysqli_fetch_assoc($result);
                        echo '<div class="product-detail-media" style="width:35%;">';
                        echo '<div class="product-detail-img">';
                        echo '<img width="100%" src="'.$row["DuongDanAnh"].'" alt="">';
                        echo '</div>';
                        
                        echo '</div>';
                        echo '<div class="product-detail-info" style="width:65%;">';
                        echo '<div class="product-detail-name">';
                        echo '<h2>'.$row["TenSanPham"].'</h2>';
                        echo '</div>';
                        echo '<div class="product-detail-star">';
                        echo '<i class="fas fa-star" style="color: #eec317;"></i>';
                        echo '<i class="fas fa-star" style="color: #eec317;"></i>';
                        echo '<i class="fas fa-star" style="color: #eec317;"></i>';
                        echo '<i class="fas fa-star" style="color: #eec317;"></i>';
                        echo '<i class="fas fa-star" style="color: #eec317;"></i>';
                        echo '</div>';
                        echo '<div class="product-detail-description">';
                        echo '<span>'.$row["MoTaSanPham"].'</span>';
                        echo '</div>';
                        echo '<div class="product-detail-price">';
                        echo '<h4>Giá sản phẩm</h4>';
                        echo '<h5>'.number_format($row["GiaKhuyenMai"], 0, '', ',').' ₫</h5>';
                        echo '</div>';
                        echo '<div class="product-detail-controler">';
                            echo '<div >';
                            echo '<form action="" method="post" style="width: 70%; ;display:flex; align-items: center;">';
                            echo '<input class="form-control" type="number" id="quantity" value="1" name="quantity" min="1" placeholder="Nhập số lượng" style="width:40%">';
                            echo '<button class="btn-them" name="btn-addToCart" type="submit">Thêm vào giỏ hàng</button>';
                            echo '</form>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="social-media" style="margin-top:12px">';
                        echo '<a class="social-media-link" href=""><i class="fab fa-facebook-f"></i></a>';
                        echo '<a class="social-media-link" href=""><i class="fab fa-instagram" style="margin: 0 16px"></i></a>';
                        echo '<a class="social-media-link" href=""><i class="fab fa-linkedin-in"></i></a>';
                            
                        echo '</div>';
                    echo '</div>';
                    

                }
                else{
                    echo "data empty";
                }
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-addToCart'])){
                    $_SoLuong = $_POST["quantity"];

                    $query1 = "SELECT * FROM tblgiohang WHERE TenSanPham ='".$row["TenSanPham"]."' AND EmailUser ='" . $_SESSION['userName'] . "'";
                    $result1 = mysqli_query($conn, $query1);
                    if($result1 != null && mysqli_num_rows($result1) > 0){                
                        $query2 = "update tblGioHang set SoLuong= SoLuong+".$_SoLuong." where TenSanPham ='".$row["TenSanPham"]."' AND EmailUser ='" . $_SESSION['userName'] . "'";
                        $result2 = mysqli_query($conn, $query2);
                        if($result2 == true){                
                            // header('Location: ' . $_SERVER['HTTP_REFERER']);
                            echo '<meta http-equiv="refresh" content="0">';

                            echo "<script type='text/javascript'>";
                            echo "alert('Thêm vào giỏ hàng thành công!');";
                            //echo "window.location.href='index.php';";
                            echo "</script>";
                            // header("Refresh:0");
                        }
                        else{
                            echo "data empty";
                        }
                    }
                    else{
                        $query3 = "insert into tblGioHang values ('', '".$_SESSION['userName']."', '".$row["TenSanPham"]."', ".$row["GiaKhuyenMai"].", ".$_SoLuong.")";
                        $result3 = mysqli_query($conn, $query3);
                        if($result3 == true){                
                            // header('Location: ' . $_SERVER['HTTP_REFERER']);
                            echo '<meta http-equiv="refresh" content="0">';
                            echo "alert('Thêm vào giỏ hàng thành công!');";
                            //echo "window.location.href='index.php';";
                            echo "</script>";
                        }
                        else{
                            echo "data empty";
                        }
                    }
                }
            }
            else{
                echo "Connect error: " . mysqli_connect_error();
            }
        ?>
            
            
        </div>
    </div>



    <footer class="foot">
        <div class="footer-line">
            <h3 style="margin-bottom: 0;color: #fff;">Cảm ơn bạn đã ghé thăm</h3>
            <div class="goodbye"><a class="goodbye-link" href=""> Hẹn gặp lại!   </a> </div>
        </div>
        <div class="footer-info">
            <div class="footer-logo">
                <a href="index.php" class="heading-icon-link">
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