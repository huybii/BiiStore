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
                <li class="menu-item" style="background-color: rgba(255,255,255, 0.1);">
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
                    <a class="menu-item-link" href="../DangXuat.php">Đăng xuất</a>
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
        <!-- lấy số liệu -->
        <?php 
            $conn = mysqli_connect("localhost", "root", "", "webnoithat");
            if (!$conn) {
                die("Kết nối thất bại" . mysqli_connect_error());
            }
            $_DoanhThu = "SELECT sum(TongTien) as 'DoanhThu' from tblDonHang where date(NgayDat) = CURRENT_DATE()";
            $_DoanhThu = mysqli_query($conn, $_DoanhThu);

            if (mysqli_num_rows($_DoanhThu)) {
                $row_DoanhThu = mysqli_fetch_assoc($_DoanhThu);
                    $_DoanhThu = $row_DoanhThu["DoanhThu"];
            }

            $query_TongDonHang = "SELECT count(*) as 'TongDonHang' from tblDonHang where date(NgayDat) = CURRENT_DATE()";
            $result_TongDonHang = mysqli_query($conn, $query_TongDonHang);

            if (mysqli_num_rows($result_TongDonHang)) {
                $row_TongDonHang = mysqli_fetch_assoc($result_TongDonHang);
                    $_TongDonHang = $row_TongDonHang["TongDonHang"];
            }

            $query_HoanHang = "SELECT count(*) as 'HoanHang' from tblDonHang where TrangThai = N'giao thất bại' and date(NgayDat) = CURRENT_DATE()";
            $result_HoanHang = mysqli_query($conn, $query_HoanHang);

            if (mysqli_num_rows($result_HoanHang)) {
                $row_HoanHang = mysqli_fetch_assoc($result_HoanHang);
                    $_HoanHang = $row_HoanHang["HoanHang"];
            }

            $query_dangKiMoi = "SELECT count(*) as 'DangKiMoi' from tblDangNhap where NgayTao = CURRENT_DATE()";
            $result_dangKiMoi = mysqli_query($conn, $query_dangKiMoi);

            if (mysqli_num_rows($result_dangKiMoi)) {
                $row_dangKiMoi = mysqli_fetch_assoc($result_dangKiMoi);
                    $_dangKiMoi = $row_dangKiMoi["DangKiMoi"];
            }

             
        ?>
        <h3 style="margin-bottom: 30px;">Tổng quan</h3>
        <h5 style="color: #75ab38;">Tổng quan hôm nay</h5>
        <div class="today-status">
            <div class="today-status-item">
                <div class="today-status-item-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Doanh thu</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo number_format($_DoanhThu, 0, '', ','). ' đ' ?></span>
                </div>
            </div>
            <div class="today-status-item">
                <div class="today-status-item-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Đơn hàng</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_TongDonHang ?></span>
                </div>
            </div>
            <div class="today-status-item">
                <div class="today-status-item-icon">
                    <i class="fas fa-undo-alt"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Hoàn hàng</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_HoanHang ?></span>
                </div>
            </div>
            <div class="today-status-item">
                <div class="today-status-item-icon">
                    <i class="far fa-user"></i>
                </div>
                <div class="today-status-item-info">
                    <h5 style="color: #7c7c7c;font-size: 14px;">Khách đăng kí mới</h5>
                    <span style="color: #75ab38; font-weight: 500;font-size: 20px;"><?php echo $_dangKiMoi ?></span>
                </div>
            </div>
        </div>

        <!-- đơn hàng -->
        <div class="new-order" style="margin-top: 30px;">
            <h5 style="color: #75ab38;">Đơn hôm nay</h5>
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
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where date(NgayDat) = CURRENT_DATE() order by NgayDat desc ";
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
        </table>
        </div>
    </div>
</body>
</html>