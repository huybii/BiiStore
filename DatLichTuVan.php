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
    <link rel="stylesheet" type="text/css" href="./style/DatLichTuVan.css">
    
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
            <form class="txtSearch" action="post">
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
        <div class="head-img">
            <div class="head-img-btn">
                <h1>Thiết kế nội thất</h1>
                <h1>Kiến tạo cảm xúc</h1>
                <p>Chúng tôi tính toán mọi chi tiết để đảm bảo rằng mỗi bản thiết kế nội thất là sự kết nối phù hợp, tối ưu chi phí đem đến sự hài lòng cho khách hàng. 
                    Giải pháp tư vấn, thiết kế & thi công nội thất của Gotrangtri.vn mang lại sự đơn giản mà tinh tế trong không gian trọn vẹn.</p>
                <div style="display: flex;margin-top: 24px;">
                    <div class="main-btn" style="margin-right: 20px;">
                        <a class="DatLich-btn" href="#DienThongTin">Đặt lịch tư vấn</a>
                    </div>
                    <div class="main-btn" style="background-color: #142f41;">
                        <a class="BaoGia-btn" href="#BaoGia">Báo giá thiết kế</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-img">
            <h1>Giải pháp tư vấn</h1>
            <h1>Thiết kế, thi công nội thất</h1>
            <h6>BiiStore.vn công ty thiết kế & sản xuất nội thất, thương hiệu uy tín đã phục vụ nhiều khách hàng & dự án căn hộ trên Toàn Quốc.</h6>
            <div class="phone-number">
                <i class="fas fa-phone" style="margin-right: 8px;"></i>
                0869-086-384
            </div>
            <img src="./img/Capture.PNG" width="100%" alt="" style="margin-top:70px">
        </div>

        <div class="BaoGia" id="BaoGia">
            <h1>Báo giá thiết kế</h1>
            <h6>Miễn phí tiền thiết kế khi quý khách đặt sản xuất đồ nội thất tại BiiStore.vn</h6>
            <div class="GoiDichVu">
                <div class="GoiDichVu-item">
                    <div style="width:100%">
                    <div class="GoiDichVu-item-name">
                        <h2>Gói A</h2>
                    </div>
                    
                    <div class="GoiDichVu-item-price">
                        Miễn phí
                    </div>
                    <ul class="GoiDichVu-list">
                        <li>Tư vấn tại công ty</li>
                        <li>Thiết kế 2D mặt bằng bố trí đồ</li>
                        <li>Báo giá thi công nội thất</li>
                        <li>Diện tích &lt60m2</li>
                    </ul>
                    </div>
                    <div class="GoiDichVu-btn">
                        <a  href="#DienThongTin">Đăng kí</a>
                    </div>
                </div>
                <div class="GoiDichVu-item">
                    <div style="width:100%">
                    <div class="GoiDichVu-item-name">
                        <h2>Gói B</h2>
                    </div>
                    
                    <div class="GoiDichVu-item-price">
                        2,999,000đ
                    </div>
                    <ul class="GoiDichVu-list">
                        <li>Tư vấn tại công trình</li>
                        <li>Thiết kế 2D mặt bằng bố trí đồ</li>
                        <li>Thiết kế 3D không gian</li>
                        <li>Báo giá thi công nội thất</li>
                        <li>Diện tích &lt80m2</li>
                    </ul>
                    </div>
                    <div class="GoiDichVu-btn">
                        <a  href="#DienThongTin">Đăng kí</a>
                    </div>
                </div>
                <div class="GoiDichVu-item">
                    <div style="width:100%">
                    <div class="GoiDichVu-item-name">
                        <h2>Gói C</h2>
                    </div>
                    
                    <div class="GoiDichVu-item-price">
                        4,999,000đ
                    </div>
                    <ul class="GoiDichVu-list">
                        <li>Tư vấn tại công trình</li>
                        <li>Thiết kế 2D mặt bằng bố trí đồ</li>
                        <li>Thiết kế 3D không gian</li>
                        <li>Bóc tác chi tiết thi công</li>
                        <li>Báo giá thi công nội thất</li>
                        <li>Diện tích &lt80m2</li>
                    </ul>
                    </div>
                    <div class="GoiDichVu-btn">
                        <a  href="#DienThongTin">Đăng kí</a>
                    </div>
                </div>
                <div class="GoiDichVu-item">
                    <div style="width:100%">
                    <div class="GoiDichVu-item-name">
                        <h2>Gói D</h2>
                    </div>
                    
                    <div class="GoiDichVu-item-price">
                        6,999,000đ
                    </div>
                    <ul class="GoiDichVu-list">
                        <li>Tư vấn tại công trình</li>
                        <li>Thiết kế 2D mặt bằng bố trí đồ</li>
                        <li>Thiết kế 3D không gian</li>
                        <li>Bóc tác chi tiết thi công</li>
                        <li>Báo giá thi công nội thất</li>
                        <li>Diện tích từ 80m2 ~ 110m2</li>
                    </ul>
                    </div>
                    <div class="GoiDichVu-btn">
                        <a  href="#DienThongTin">Đăng kí</a>
                    </div>
                </div>
                <div class="GoiDichVu-item">
                    <div style="width:100%">
                    <div class="GoiDichVu-item-name">
                        <h2>Gói E</h2>
                    </div>
                    
                    <div class="GoiDichVu-item-price">
                        Liên hệ
                    </div>
                    <ul class="GoiDichVu-list">
                        <li>Tư vấn tại công trình</li>
                        <li>Thiết kế 2D mặt bằng bố trí đồ</li>
                        <li>Thiết kế 3D không gian</li>
                        <li>Bóc tác chi tiết thi công</li>
                        <li>Báo giá thi công nội thất</li>
                        <li>Diện tích &gt110m2</li>
                    </ul>
                    </div>
                    <div class="GoiDichVu-btn">
                        <a  href="#DienThongTin">Đăng kí</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="DatLichTuVan">
            <div class="CamKet">
                <h1>Cam kết</h1>
                <ul>
                    <li>Miễn phí thiết kế</li>
                    <li>Bảo hành 6 năm</li>
                    <li>Hoàn tiền nếu không hài lòng</li>
                    <li>Không phát sinh chi phí</li>
                    <li>Đúng tiến độ</li>
                    <li>Phụ kiện chính hãng</li>
                </ul>
            </div>
            <div class="DienThongTin" id="DienThongTin">
                <form method="post" action="">
                    <h1>Điền thông tin</h1>
                    <h6 style="margin-bottom:40px">Chúng tôi xin phép gọi lại!</h6>
                    <div class="row form-DienThongTin-row">
                        <span class="col form-input">
                            <input class="form-control" name="txtTenKhachHang" type="text" placeholder="Họ và tên *" required>
                        </span>
                        
                    </div>
                    <div class="row form-DienThongTin-row">
                        <span class="col form-input">
                            <input class="form-control" name="txtSDT" type="text" placeholder="Số điện thoại *" required>
                        </span>
                        
                    </div>
                    <button class="btn-DatLich" name="btnDatLich" type="submit">Đặt lịch tư vấn</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btnDatLich"])) {
                    $TenKhachHang = $_POST["txtTenKhachHang"];
                    $SDT = $_POST["txtSDT"];
                    $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                    if (!$conn) {
                        die("Kết nối thất bại" . mysqli_connect_error());
                    }

                    $query = "insert into tblDatLichTuVan values ('', '".$TenKhachHang."', '".$SDT."', N'chưa tư vấn')";
                    $result = mysqli_query($conn, $query);

                    if ($result == true) {
                        echo '<script type="text/javascript">';
                        echo ' alert("Đặt lịch thành công")'; 
                        echo '</script>';
                    }
                }
                ?>
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