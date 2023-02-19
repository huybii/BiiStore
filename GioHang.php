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
    <link rel="stylesheet" type="text/css" href="./style/GioHang.css">
    
    <title>Giỏ hàng</title>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
        
    </script>
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
        <div class="cart-controler">
                <div class="cart-table" >
                    <form class="form-control" action="" style="width:100%">
                        <table class="table" >
                        <thead>
                          <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            <?php
                                if(isset($_SESSION['userName'])){
                                    $conn = mysqli_connect("localhost", "root","","webnoithat");
                                    if($conn == true){
                                        $query = "SELECT tblgiohang.*, tblsanpham.DuongDanAnh, (tblgiohang.DonGia)*(tblgiohang.SoLuong) as 'TongTien' FROM tblgiohang,tblSanPham WHERE tblgiohang.TenSanPham = tblsanpham.TenSanPham AND tblgiohang.EmailUser ='" . $_SESSION['userName'] . "'";
                                        $result = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($result) > 0){          
                                            while($row = mysqli_fetch_assoc($result)){
                                                
                                                echo '<tr>';
                                                echo '<th scope="row" style="width:320px;text-align: left;">';
                                                echo '<a  class="cart-product">';
                                                echo '<img width="20%" src="'.$row["DuongDanAnh"].'" style="margin-right: 8px;" alt="">';
                                                        echo ''.$row["TenSanPham"].'';
                                                        echo '</a>';
                                                echo '</th>';
                                                echo '<td>'.number_format($row["DonGia"], 0, '', ',').'</td>';
                                                echo '<td>';
                                                echo '<div class="quantity">';
                                                echo '<a href="GioHangControler.php?ID='.$row["ID"].'&controler=sub" name="btn-add" id="btn-add" class="quantity-btn">-</a>';
                                                echo '<input id="quantity" class="quantity-input" value="'.$row["SoLuong"].'" type="number" min="1">';
                                                echo '<a href="GioHangControler.php?ID='.$row["ID"].'&controler=plus" name="btn-add" id="btn-sub" class="quantity-btn">+</a>';
                                                echo '</div>';
                                                echo '</td>';
                                                echo '<td>'.number_format($row["TongTien"], 0, '', ',').'</td>';
                                                echo '<td><a onclick="return confirm(\'Xác nhận xóa sản phẩm khỏi giỏ hàng?\')" href="GioHangControler.php?ID='.$row["ID"].'&controler=delete"><i class="far fa-trash-alt"></i></a> </td>';
                                                
                                            }

                                        }
                                        else{
                                            echo '<tr>';
                                            echo '<td>giỏ hàng trống</td>';
                                            echo'</tr>';
                                        }
                                    }
                                    else{
                                        echo "Connect error: " . mysqli_connect_error();
                                    }
                                }
                            ?>
                            
                        </tbody>
                        </table>
                        <!-- thành tiền -->
                        <div class="cart-btn">
                        <a href="index.php">Quay lại mua sắm</a>
                        <?php 
                            if(isset($_SESSION['userName'])){
                                $conn = mysqli_connect("localhost", "root","","webnoithat");
                                if($conn == true){
                                    $query = "SELECT sum(DonGia*SoLuong) as 'ThanhTien' from tblGioHang where EmailUser ='" . $_SESSION['userName'] . "'";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($result) > 0){          
                                        $row = mysqli_fetch_assoc($result);
                                        echo '<div>';
                                            echo 'Tổng thành tiền:';
                                            echo '<span  class="price-sale">'.number_format($row["ThanhTien"], 0, '', ',').' ₫</span>';
                                        echo '</div>';

                                    }
                                    else{
                                        echo "data empty";
                                    }
                                }
                                else{
                                    echo "Connect error: " . mysqli_connect_error();
                                }
                            }
                        ?>
                        
                        <!-- thành tiền -->
                        <!-- <div class="cart-btn"> -->
                            <!-- <a href="index.php">Quay lại mua sắm</a> -->
                            <!-- <button class="btn-buy" type="">Mua hàng</button> -->
                        </div>
                    </form>
        
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                
                        Quantity();
                    }
                    function Quantity(){
                        $KeyWord = $_POST['txtSearch'];
                        // echo "<script type='text/javascript'> var txtsearch = document.getElementById('txtsearch'); txtsearch.innerHTML=".$KeyWord." </script>";
        
                        $conn = mysqli_connect("localhost", "root","","qlsv_NguyenCongHuy");
                        if($conn != true){
                            echo "Connect error: " . mysqli_connect_error();
                            
                            
                        }
                        else{
                            $query = "select *, if(GioiTinh='1',N'Nam',N'Nữ') as 'Sex', IF(TrinhDoHocVan=0,N'Tiến sĩ',IF(TrinhDoHocVan=1,N'Thạc sĩ',IF(TrinhDoHocVan=2,N'Kỹ sư',N'khác'))) as 'level' from tblsinhvien where HoTen like N'%".$KeyWord."%' or QueQuan like N'%".$KeyWord."%' ";
                            
                            $result = mysqli_query($conn, $query);
                            if($result != null && mysqli_num_rows($result) > 0){
                                echo "<table class='table table-dark table-hover'><thead>";
                                echo "<th>ID</th><th>Tên sinh viên</th><th>Giới tính</th><th>Ngày sinh</th><th>Quê quán</th><th>Trình độ</th><th>Thao tác</th>";
                                echo "</thead>";
        
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row["ID"] . "</td>";
                                    echo "<td>" . $row["HoTen"] . "</td>";
                                    echo "<td>" . $row["Sex"] . "</td>";
                                    echo "<td>" . $row["NgaySinh"] . "</td>";
                                    echo "<td>" . $row["QueQuan"] . "</td>";
                                    echo "<td>" . $row["level"] . "</td>";
                                    // echo "<td>" . $row["Sex"] . "</td>";
                                    // echo "<td>" . $row["level"] . "</td>";
                                    echo "<td>" . "<a class='btn btn-primary' href='update.php?ID=".$row["ID"]."'>Sửa</a>" ." ". "<a class='btn btn-danger' onclick='return confirm(\"Xác nhận chặn người dùng?\")'
                                                href='delete.php?ID=".$row["ID"]."'>Xóa</a>" . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                            else{
                                echo "data is empty";
                            }
                        }
                    }
                ?>

                </div>
                <div class="payment">
                    <form method="post" class="form-control">
                        <h4>Thanh toán</h4>
                        <div class="shiping">
                            <h5>Thông tin nhận hàng</h5>
                            <div class="row form-shiping-row">
                                <span class="col form-input">
                                    <label for="">Họ và tên người nhận *</label>
                                    <input class="form-control" type="text" name="txtHoTen" placeholder="Nhập họ và tên" required>
                                </span>
                                
                            </div>
                            <div class="row form-shiping-row">
                                <span class="col form-input">
                                    <label for="">Thành phố / Tỉnh *</label>
                                    <input class="form-control" type="text" name="txtThanhPho" placeholder="Nhập thành phố / tỉnh" required>
                                </span>
                                
                            </div>
                            <div class="row form-shiping-row">
                                <span class="col form-input">
                                    <label for="">Quận / Huyện *</label>
                                    <input class="form-control" type="text" name="txtHuyen" placeholder="Nhập quận / huyện" required>
                                </span>
                                
                            </div>
                            <div class="row form-shiping-row">
                                <span class="col form-input">
                                    <label for="">Phường / Xã *</label>
                                    <input class="form-control" type="text" name="txtXa" placeholder="Nhập phường / xã" required>
                                </span>
                                
                            </div>
                            <div class="row form-shiping-row">
                                <span class="col form-input">
                                    <label for="">Địa chỉ chi tiết *</label>
                                    <input class="form-control" type="text" name="txtDiaChiChiTiet" placeholder="Nhập địa chỉ chi tiết" required>
                                </span>
                                
                            </div>
                            <div class="row form-shiping-row">
                                <span class="col form-input">
                                    <label for="">Số điện thoại nhận hàng *</label>
                                    <input class="form-control" type="text" name="txtSDT" placeholder="Nhập số điện thoại" required>
                                </span>
                                
                            </div>
                            <!-- <div class="total-price">
                                <button class="btn-buy" type="">Mua hàng</button>
                            </div> -->
                            <button class="btn-buy" name="btn-buy" type="submit" onclick='return confirm("Bạn có muốn đặt hàng không?")'>Mua hàng</button>
                        </div>
                    </form>
                </div>
            
        </div>
        
    </div>
    <!-- đặt hàng -->
        <?php 
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-buy'])){
                
                DatHang();
                ChuyenSangDaDat();
            }
            function DatHang(){
                
                $HoTen = $_POST['txtHoTen'];
                $ThanhPho = $_POST['txtThanhPho'];
                $Huyen = $_POST['txtHuyen'];
                $Xa = $_POST['txtXa'];
                $DcChiTiet = $_POST['txtDiaChiChiTiet'];
                $SDT = $_POST['txtSDT'];
                $date = getdate();
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $NgayDatHang = date('Y-m-d H:i:s');
                $DiaChiDatHang = $DcChiTiet."-".$Xa."-".$Huyen."-".$ThanhPho ;
                $conn = mysqli_connect("localhost", "root","","webnoithat");
                if($conn != true){
                    echo "Connect error: " . mysqli_connect_error();
                }
                else{
                    $query = "SELECT sum(DonGia*SoLuong) as 'ThanhTien' from tblGioHang where EmailUser ='" . $_SESSION['userName'] . "'";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0){    
                        $row = mysqli_fetch_assoc($result);
                        if($row["ThanhTien"] > 0){
                            $query1 = "insert into tblDonHang values ('', '".$_SESSION['userName']."', '".$row['ThanhTien']."', '".$HoTen."', '".$SDT."', '".$ThanhPho."', '".$Huyen."', '".$Xa."', '".$DcChiTiet."', '".$NgayDatHang."', N'chờ xác nhận')";
                            $result1 = mysqli_query($conn, $query1);
                            if($result1 == true){
                                echo '<meta http-equiv="refresh" content="0">';

                                echo "<script type='text/javascript'>";
                                echo "alert('Đặt hàng thành công!');";
                                echo "</script>";
                        
                            }
                            else{
                                echo "data is empty";
                            }
                        }else{
                            echo "<script type='text/javascript'>";
                            echo "alert('Chưa có sản phẩm nào trong giỏ hàng!');";
                            echo "</script>";
                        }    
                        
                        
                    }
                    else{
                        echo "";
                    }
                    
                }
            }

            function ChuyenSangDaDat(){
                $conn = mysqli_connect("localhost", "root","","webnoithat");
                if($conn != true){
                    echo "Connect error: " . mysqli_connect_error();
                }
                else{
                    $query_DonHang = "select max(ID) as 'IdDonHang' from tblDonHang where EmailUser ='" . $_SESSION['userName'] . "'";
                    $result_DonHang = mysqli_query($conn, $query_DonHang);
                    $row_DonHang = mysqli_fetch_assoc($result_DonHang);

                    $query = "SELECT * from tblGioHang where EmailUser ='" . $_SESSION['userName'] . "'";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0){          
                        while($row = mysqli_fetch_assoc($result)){
                            $query1 = "insert into tblDaDatHang values ('', '".$_SESSION['userName']."', '".$row['TenSanPham']."', '".$row['DonGia']."', ".$row["SoLuong"].", ".$row_DonHang["IdDonHang"].")";
                            $result1 = mysqli_query($conn, $query1);
                            if($result1 == true){
                                // echo '<meta http-equiv="refresh" content="0">';
                                $query2 = "delete from tblGioHang where TenSanPham = '".$row["TenSanPham"]."' and EmailUser = '" . $_SESSION['userName'] . "'";
                                $result2 = mysqli_query($conn, $query2);
                                
                            }
                            else{
                                echo "data is empty";
                            }
                        }
                        
                    }
                    else{
                        echo "chưa có sản phẩm nào trong giỏ hàng!";
                    }
                    
                }
            }
        ?>
    <!-- đặt hàng -->
    <!-- <script type="text/javascript">
        function addQuantity(){
            document.getElementById('quantity').value ++ ; 
        }
        function subQuantity(){
            document.getElementById('quantity').value -- ; 
        }
    </script> -->
    
    <!-- <script>
        $(function() {
        $(".quantity-btn").on("click", function() {
        var $button = $(this);
        var loops = document.getElementsByClassName('quantity-input')
        for(var i = 0; i<loops.length; i++){
            if ($button.text() == "+") {
                var newVal = parseFloat(loops[i].value) + 1;
                } else {
                // Don't allow decrementing below zero
                if (loops[i].value > 1) {
                    var newVal = parseFloat(loops[i].value) - 1;
                    } else {
                    newVal = 1;
                }
            }
            loops[i].value = newVal;
        }
        // 
        // var oldValue = $('.quantity-input').val();
        // if ($button.text() == "+") {
        //     var newVal = parseFloat(oldValue) + 1;
        //     } else {
        //     // Don't allow decrementing below zero
        //     if (oldValue > 1) {
        //         var newVal = parseFloat(oldValue) - 1;
        //         } else {
        //         newVal = 1;
        //     }
        //     }
        //     // $('a.add-to-cart').attr('data-quantity', newVal);
        //     $('.quantity-input').val(newVal);
        });
        });
    </script> -->

    <!-- đơn hàng -->
        <div class="order-layout">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Sản phẩm</th>

                <th scope="col">Tên người nhận</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ nhận hàng</th>
                <th scope="col">Tổng thanh toán</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_SESSION['userName'])){
                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                        if($conn == true){
                            $query = "SELECT @row := @row + 1 AS STT, t.* FROM tbldonhang t, (SELECT @row := 0) r where EmailUser ='" . $_SESSION['userName'] . "'";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){          
                                while($row = mysqli_fetch_assoc($result)){
                                    $DiaChiDatHang = $row["DiaChiChiTiet"]."-".$row["Xa"]."-".$row["Huyen"]."-".$row["ThanhPho"];
                                    echo '<tr>';
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
                                                            $query1 = "SELECT tblDaDatHang.*, tblsanpham.DuongDanAnh FROM tblDaDatHang,tblSanPham WHERE tblDaDatHang.TenSanPham = tblsanpham.TenSanPham AND tblDaDatHang.EmailUser ='" . $_SESSION['userName'] . "' and IdDonHang ='" . $row["ID"] . "'";
                                                            $result1 = mysqli_query($conn, $query1);
                                                            if(mysqli_num_rows($result1) > 0){          
                                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                            echo '<tr>';
                                                            echo '<th scope="row" style="max-width:280px;text-align: left;">';
                                                                echo '<a class="cart-product" style="width:280px;">';
                                                                    echo '<img width="20%" src="'.$row1["DuongDanAnh"].'" alt="">';
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
                                        echo '<td style="padding-top: 16px !important;">';
                                        // echo '<form action="GioHang.php" method="post">';
                                        if($row["TrangThai"] == 'chờ xác nhận'){
                                            echo '<a class="btn-cancel-order" name="btn-huy" onclick="return confirm(\'Bạn có muốn hủy không?\')" href="GioHangControler.php?IdDonHang='.$row["ID"].'">hủy</a>';
                                        }else{
                                            echo '<a class="btn-cancel-order" name="btn-huy" disabled title="đơn đang giao/đã giao không thể hủy!">hủy</a>';
                                        }
                                                
                                        // echo '</form>';
                                        // <!-- hủy đơn hàng -->
                                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-huy'])){
                                                
                                                    $query_huy = "update tblDonHang set TrangThai = 'đã hủy' where EmailUser ='" . $_SESSION['userName'] . "' and ID = '".$row["ID"]."'";
                                                    $result_huy = mysqli_query($conn, $query_huy);
                                                    if($result_huy == true){
                                                        // echo '<meta http-equiv="refresh" content="0">';

                                                        echo "<script type='text/javascript'>";
                                                        echo "alert('Hủy đơn thành công!');";
                                                        echo "</script>";
                                                    }
                                                    else{
                                                        echo "data empty";
                                                    }
                                                }
                                               
                                    // <!-- hủy đơn hàng -->


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
                ?>
                
            </tbody>
            </table>
        </div>
    <!-- đơn hàng -->
    


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