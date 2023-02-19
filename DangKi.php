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
    <link rel="stylesheet" type="text/css" href="./style/DangKi.css">
    
    <title>Bii Store</title>
</head>
<body>
    <header class="heading">
        <div class="heading-icon">
            <a href="index.php" class="heading-icon-link">
                <img src="./img/bii_store_auto_x2__1_-removebg-preview (2).png" width="38%" alt="">
            </a>
        </div>
        <div class="heading-search">
            <form class="txtSearch" action="">
                <input type="text" class="heading-search-input" placeholder="Nhập từ khóa tìm kiếm">
                <button class="btn-search" type="submit" >
                    Tìm
                    <i class="fas fa-search" style="margin-left:4px"></i>
                </button>
            </form>
        </div>
        <div class="heading-btn">
            <a class="heading-btn-link" href=""><i class="far fa-user"></i></a>
            <a class="heading-btn-link" href=""><i class="fas fa-shopping-cart"></i></a>
            
        </div>
    </header>
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
        <div class="DangKi-controler" style="margin-bottom: 100px;">
            <div class="DangKi-header">
                <h2>Đăng kí</h2>
            </div>
            <div class="form-DangKi">
                <form class="form-control" action="DangKi.php" method="post" style="width: 100%">
                    <div class="row form-DangKi-row">
                        <span class="col form-input">
                            <label for="">Họ và Tên *</label>
                            <input class="form-control" name="txtHoTen" type="text" placeholder="Nhập tên của bạn" required>
                        </span>
                        <span class="col form-input">
                            <label for="">Email *</label>
                            <input class="form-control" name="txtEmail" type="text" placeholder="Nhập email của bạn" required>
                        </span>
                        
                    </div>
                    
                    <div class="row form-DangKi-row">
                        <span class="col form-input">
                            <label for="">Mật khẩu *</label>
                            <input class="form-control" name="txtPass" type="password" placeholder="Nhập mật khẩu" required>
                        </span>
                        <span class="col form-input">
                            <label for="">Nhập lại mật khẩu *</label>
                            <input class="form-control" name="txtRePass" type="password" placeholder="Xác nhận mật khẩu" required>
                        </span>
                    </div>
                    <div class="row form-DangKi-row" style="width: 30%">
                        <span class="col form-input">
                            <label for="">Số điện thoại *</label>
                            <input class="form-control" name="txtSDT" type="text" placeholder="Nhập tên của bạn" required>
                        </span>
                        
                    </div>
                    <!-- <div class="row form-DangKi-row">
                        <span class="col form-input">
                            <label for="">Địa chỉ *</label>
                            <input class="form-control" name="txtDiaChi" type="text" placeholder="Nhập tên của bạn" required>
                        </span>
                        
                    </div> -->
                    <button class="btn-dang-ki" name="btnDangKi" type="submit">Đăng kí</button>
                </form>
            </div>
        </div>
        <!--đăng kí  -->
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnDangKi'])){        
            DangKi();
        }
        function DangKi(){
            $_HoTen = $_POST['txtHoTen'];
            $_Email = $_POST['txtEmail'];
            $_Pass = $_POST['txtPass'];
            $_RePass = $_POST['txtRePass'];
            $_SDT = $_POST['txtSDT'];
            $conn = mysqli_connect("localhost", "root", "", "webnoithat");
			if (!$conn) {
				die("Kết nối thất bại" . mysqli_connect_error());
			} else {
                if($_Pass != $_RePass){
                    echo "<script type='text/javascript'>";
                    echo "alert('Mật khẩu xác nhận chưa khớp!');";
                    echo "</script>";
                }
                else{
				$query = "INSERT INTO tblDangNhap values('','" . $_Email . "','" . $_RePass . "', '" . $_HoTen . "', '" . $_SDT . "', N'customer', CURRENT_DATE(), N'hoạt động')";
				$result = mysqli_query($conn, $query);
				if ($result == true) {
					echo "<script type='text/javascript'>";
                    echo "alert('Đăng kí thành công!');";
                    echo "window.location.href='DangNhap.php';";
                    echo "</script>";
				} else {
					echo "Ghi Thất bại";
				}
            }
			}
			mysqli_close($conn);
            } 
        ?>


        

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