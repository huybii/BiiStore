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
    
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
        
    </script>
    <title>Bii Store</title>
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
            echo '<span>Xin chào, '.$row["TenHienThi"].'</span>';
            // echo '<a href="DangXuat.php">(Đăng xuất)</a>';
            echo '</div>';
        }
    }   
    ?>
        
        <div class="heading-icon">
            <a href="#" class="heading-icon-link">
                <img src="./img/bii_store_auto_x2__1_-removebg-preview (2).png" width="38%" alt="">
            </a>
        </div>
        <div class="heading-search">
            <form class="txtSearch" action="#" method="post">
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
                <?php
                    if(isset($_SESSION['ID'])){
                        echo '<a href="DoiMatKhau.php">Đổi mật khẩu</a>';
                        echo '<a href="DangXuat.php">Đăng xuất</a>';
                    }else{
                        echo '<a href="DangKi.php">Đăng kí</a>';
                        echo '<a href="DangNhap.php">Đăng nhập</a>';
                    }
                ?>
                    <!-- <a href="DangKi.php">Đăng kí</a>
                    <a href="DangNhap.php">Đăng nhập</a>
                    <a href="">Đăng xuất</a> -->
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
            <li class="nav-bar-list nav-bar-item">  
                <a class="nav-bar-item-link" href="#category-slider">
                    Danh mục
                </a>
            </li>
            <li class="nav-bar-list nav-bar-item">  
                <a class="nav-bar-item-link" href="#main">
                   Sản phẩm
                </a>
            </li>
            <li class="nav-bar-list nav-bar-item">  
                <a class="nav-bar-item-link" href="DatLichTuVan.php">
                    Tư vấn thiết kế
                </a>
            </li>
            <li class="nav-bar-list nav-bar-item">  
                <a class="nav-bar-item-link" href="#category-slider">
                    Bài viết
                </a>
            </li>
            <li class="nav-bar-list nav-bar-item">  
                <a class="nav-bar-item-link" href="https://www.messenger.com/t/100030070126057/" target="_blank">
                    Liên hệ
                </a>
            </li>
        </ul>
    </div>
    <!-- slider -->
    <div id="carouselExampleControls" class="carousel slide slider-head" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/main-slider-banner/7.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/main-slider-banner/8.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://loopinfosol.in/themeforest/ekka-html-v2/ekka-html/assets/images/main-slider-banner/9.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" >
          <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #142f41;"></span>
          <span class="visually-hidden" >Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #142f41;"></span>
          <span class="visually-hidden">Next</span>
        </button>
        <div class="slider-info">
            <h4>Phong cách thời thượng</h4>
            <h1>Hàng mới về</h1>
            <p style="max-width: 500px; color: #777; font-size: 18px; margin-top: 24px;">
            Các kiến trúc sư trẻ của chúng tôi liên tục trình làng những bộ sưu tập mới nhất phù hợp xu hướng đương đại. Tất cả được chụp ảnh kỹ lưỡng từng góc cạnh giúp người tiêu dùng dễ lựa chọn sản phẩm cho mình.
            </p>
            <h3>Còn chần chờ gì nữa!</h3>
            <a class="btn btn-secondary" href="">Mua sắm ngay</a>
        </div>
    </div>
    <!-- end slider -->

    <!-- category slider -->
    <div class="category-slider" id="category-slider">
        <div class="category-slider-header">
            <h2>Danh mục sản phẩm</h2>
            <p>Dễ dàng lựa chọn theo sở thích của bạn</p>
        </div>
        <div class="category-slider-container">
        <?php
        $conn = mysqli_connect("localhost", "root","","webnoithat");
        if($conn == true){
            $query = "select * from tblDanhMuc";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0){                

                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="category-slider-item" style="background-image: url('.$row["DuongDanAnh"].');background-position: center; background-repeat: no-repeat; background-size: cover;">';
                    echo '<div class="category-slider-btn">';
                    echo '<a href="ChiTietDanhMuc.php?ID='.$row["ID"].'" class="category-slider-item-link">'.$row["TenDanhMuc"].'</a>';
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
            
        </div>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="slick-1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript">
            $('.category-slider-container').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            dots:true
            });
        </script>
    
    
    </div>
    <!-- end category slider -->
    <div class="main" id="main">
        <div class="main-heading">
            <h2>Lựa chọn hàng đầu</h2>
            <p>Định hình phong cách của bạn</p>
        </div>
        <div class="category">
            <ul class="category-list">
            <?php
                $conn = mysqli_connect("localhost", "root","","webnoithat");
                if($conn == true){
                    $query = "select * from tblDanhMuc";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0){                

                        while($row = mysqli_fetch_assoc($result)){
                            echo '<li class="category-item">';
                            echo '<a class="category-item-link" >'.$row["TenDanhMuc"].'</a>';
                            echo '<a class="category-item-viewAll" href="ChiTietDanhMuc.php?ID='.$row["ID"].'" >Xem tất cả >></a>';
                            $query1 = "select * from tblSanPham where IdDanhMuc = '".$row["ID"]."' limit 4";
                            $result1 = mysqli_query($conn, $query1);
                            if(mysqli_num_rows($result1) > 0){
                                echo '<div class="row products-row">';
                                while($row1 = mysqli_fetch_assoc($result1)){
                                    echo '<div class="col products-col">';
                                        echo '<div class="product-view">';
                                            echo '<div class="product-img">';
                                            echo '<a href="" class="product-link">';
                                            echo '<img class="main-img" width="100%" src="'.$row1["DuongDanAnh"].'" alt="">';
                            
                                            echo '</a>';
                                            echo '</div>';
                                            echo '<div class="product-btn">';
                                            if(isset($_SESSION['userName'])){
                                                echo '<a onclick="return confirm(\'Bạn có muốn thêm vào giỏ hàng không?\')" href="GioHangControler.php?TenSanPham='.$row1["TenSanPham"].'&controler=addNew&DonGia='.$row1["GiaKhuyenMai"].'" class="product-btn-link product-btn-cart" ><i class="fas fa-shopping-cart"></i></a>';
                                            }else{
                                                echo '<a onclick="return confirm(\'Vui lòng đăng nhập trước khi mua hàng\')" href="DangNhap.php" class="product-btn-link product-btn-cart"><i class="fas fa-shopping-cart" ></i></a>';

                                            }
                                            echo '<a href="ChiTietSanPham.php?ID='.$row1["ID"].'" class="product-btn-link product-btn-view"><i class="far fa-eye"></i></a>';
                                            echo '</div>';
                                            echo '<div class="product-info">';
                                            echo '<h5 class="product-name">';
                                            echo '<a href="" class="product-link">'.$row1["TenSanPham"].'</a>';
                                            echo '</h5>';

                                            // echo "<script type='text/javascript'>";
                                            // echo "alert('Thêm vào giỏ hàng thành công!');";
                                            // //echo "window.location.href='index.php';";
                                            // echo "</script>";

                                            echo '<span class="price-main">'.number_format($row1["GiaGoc"], 0, '', ',').'</span>';
                                            echo '<span class="price-sale">'.number_format($row1["GiaKhuyenMai"], 0, '', ',').' ₫</span>';
                                            // echo '<span class="price-sale">₫</span>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                }
                                echo '</div>';
                            }else{
                                echo "data empty";
                            }
                            echo '</li>';
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

            </ul>
        </div>
    </div>

    <!-- scroll to top -->
    <button id="top-btn" class="btn-scrollToTop" onclick="topFunction()"><i class="fas fa-arrow-up"></i></button>
    <script>
        //Get the button
        var mybutton = document.getElementById("top-btn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
    </script>
    <!--  -->
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
                <form action="#" method="post" style="position: relative;">
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