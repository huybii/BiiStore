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
    <link rel="stylesheet" href="./style/QuanLiDanhMuc.css" type="text/css">
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
                    <a class="menu-item-link" href="QuanLiSanPham.php" >Quản lí sản phẩm</a>
                </li>
                <li class="menu-item" style="background-color: rgba(255,255,255, 0.1);">
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
        <div class="QuanLiDanhMuc">
            <!-- lấy dữ liệu -->
        <?php 
            if(isset($_GET["ID"]) && isset($_GET["Controler"]) && $_GET["Controler"] == 'update'){
                    $_ID = $_GET["ID"];
                    $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                    if (!$conn) {
                        die("Kết nối thất bại" . mysqli_connect_error());
                    }

                    $query3 = "SELECT * from tblDanhMuc where ID = '".$_ID."'";
                    $result3 = mysqli_query($conn, $query3);

                    if (mysqli_num_rows($result3)) {

                        $row3 = mysqli_fetch_assoc($result3);
                            $_TenDanhMuc = $row3["TenDanhMuc"];
                            $_DuongDanAnh = $row3["DuongDanAnh"];
                        
                    
                }
            }else{
                $_TenDanhMuc = '';
                $_DuongDanAnh = './img/34f657b7c4abf0fb76d23b2a48fc89c3 (1).png';
            }
            
        ?>
            <div class="main-header">
                <h3 style="margin-bottom: 30px;">Quản lí danh mục</h3>
                <div class="main-header-btn">
                    <button type="submit" form="formDanhMuc" name="btnSave" class="add-new">+ Thêm mới</button>
                    <a class="export-file" href=""><i class="fas fa-file-download"></i></a>
                </div>
            </div>

            <div class="search-btn" style="position: relative;">
                <form method="post">
                    <input type="text" class="search-input" name="txtSearch" id="inputSearch" placeholder="Nhập từ khóa" value="<?php if (isset($_POST['txtSearch'])) echo $_POST['txtSearch']; ?>">
                    <a style="position: absolute;top:4px;left:180px;" href=""><i class="fas fa-times"></i></a>
                    
                    <button class="btn-search" type="submit" name="btnSearch">
                        Tìm
                    <i class="fas fa-search" style="margin-left:4px"></i>
                </button>
                </form>
            </div>


            <div class="" style="margin-top: 50px;display:flex;justify-content:space-between;align-items: flex-start;">
            <table class="table" id="tblData" style="width:65%;">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col" >Danh mục</th>
                            <!-- <th scope="col">Đường dẫn ảnh</th> -->
                            <th scope="col">Thao tác</th>

                          </tr>
                        </thead>
                        <!-- <tbody> -->
                        <?php
                                
                                    $conn = mysqli_connect("localhost", "root","","webnoithat");
                                    if($conn == true){
                                        $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblDanhMuc t, (SELECT @row := 0) r";
                                        $result = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($result) > 0){ 
                                            echo '<tbody id="tBodyMain">';         
                                            while($row = mysqli_fetch_assoc($result)){
                                                
                                                echo '<tr>';
                                                echo '<td>'.$row["STT"].'</td>';
                                                echo '<th scope="row" style="width:320px;">';
                                                echo '<a  class="cart-product">';
                                                echo '<img width="20%" src=".'.$row["DuongDanAnh"].'" style="margin-right: 8px;" alt="">';
                                                        echo ''.$row["TenDanhMuc"].'';
                                                        echo '</a>';
                                                echo '</th>';
                                                
                                                
                                                

                                                
                                                
                                                echo '<td>';
                                                echo '<a href="QuanLiDanhMuc.php?ID='.$row["ID"].'&Controler=update" style="margin-right: 12px;"><i class="far fa-edit"></i></a>';
                                                echo '<a onclick="return confirm(\'Bạn có muốn xóa không?\')" href="QuanLiDanhMuc.php?ID='.$row["ID"].'&Controler=delete"><i class="far fa-trash-alt"></i></a>';  
                                                echo '</td>';
                                                echo '</tr>';
                                            }

                                        }
                                        else{
                                            echo '<tr>';
                                            echo '<td>Danh mục trống</td>';
                                            echo'</tr>';
                                        }
                                        echo '</tbody>';
                                    }
                                    else{
                                        echo "Connect error: " . mysqli_connect_error();
                                    }
                                    // tìm kiếm
                                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                
                                        Search();
                                    }
                                    function Search(){
                                        
                                        echo "<script type='text/javascript'> var Main = document.getElementById('tBodyMain'); Main.innerHTML='';</script>";
                                        $KeyWord = $_POST['txtSearch'];
                                        // echo "<script type='text/javascript'> var txtsearch = document.getElementById('inputSearch'); txtsearch.innerHTML=".$KeyWord.";</script>";
                        
                                        $conn = mysqli_connect("localhost", "root","","webnoithat");
                                        if($conn != true){
                                            echo "Connect error: " . mysqli_connect_error();
                                            
                                            
                                        }
                                        else{
                                            $query1 = "select @row := @row + 1 AS STT, t.* FROM tblDanhMuc t, (SELECT @row := 0) r where TenDanhMuc like N'%".$KeyWord."%'";
                                            
                                            $result1 = mysqli_query($conn, $query1);
                                            if($result1 != null && mysqli_num_rows($result1) > 0){
                                                echo '<tbody>';  
                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                
                                                    echo '<tr>';
                                                    echo '<td>'.$row1["STT"].'</td>';
                                                    echo '<th scope="row" style="width:320px;text-align: left;">';
                                                    echo '<a  class="cart-product">';
                                                    echo '<img width="20%" src=".'.$row1["DuongDanAnh"].'" style="margin-right: 8px;" alt="">';
                                                            echo ''.$row1["TenDanhMuc"].'';
                                                            echo '</a>';
                                                    echo '</th>';
                                                    
                                                    // echo '<td>'.$row1["DuongDanAnh"].'</td>';
                                                    
                                                    echo '<td>';
                                                    echo '<a href="QuanLiDanhMuc.php?ID='.$row1["ID"].'&Controler=update" style="margin-right: 12px;"><i class="far fa-edit"></i></a>';
                                                    echo '<a onclick="return confirm(\'Bạn có muốn xóa không?\')" href="QuanLiDanhMuc.php?ID='.$row1["ID"].'&Controler=delete"><i class="far fa-trash-alt"></i></a>';  
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                                echo '</tbody>';
                                            }
                                            else{
                                                echo "k tìm thấy";
                                            }
                                        }
                                    }
                            ?>
                          
                        <!-- </tbody> -->
                        </table>

                    <div class="product-layout-left" style="width:30%;height:500px; margin-top:40px;">
                        
                        <div style="display: flex;justify-content:space-between;align-items:center;">
                            <h5>Thông tin</h5>
                            <button type="submit" form="formDanhMuc" name="btnSave" class="add-new">Lưu dữ liệu</button>
                        </div>
                        <form method="post" id="formDanhMuc" style="height: 100%;">
                        <div class="row" style="margin-bottom:16px;">
                            <span class="col form-input">
                                <label for="">Tên danh mục *</label>
                                <input class="form-control" type="text" value="<?php echo $_TenDanhMuc ?>" name="txtTenDanhMuc" placeholder="Nhập tên sản phẩm" required>
                            </span>     
                            </div>

                            <div class="row" style="margin-bottom:16px;">
                            <span class="col form-input">
                                <label for="">Hình ảnh *</label>
                                <input type="file" class="form-control-file" name="txtDuongDanAnh" id="">
                                <img src=".<?php echo $_DuongDanAnh ?>" alt="" width="100%">
                            </span>   
                            
                            </div>
                        </form>
                    </div>
            </div>



        </div>
        
        

        
    </div>
    <!-- thêm -->
    <?php 
    if(!isset($_GET["Controler"])){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btnSave"])){
            
            $TenDanhMuc = $_POST["txtTenDanhMuc"];
            $DuongDanAnh = './img/DanhMuc/'.$_POST["txtDuongDanAnh"];

            $conn = mysqli_connect("localhost", "root", "", "webnoithat");
            if (!$conn) {
                die("Kết nối thất bại" . mysqli_connect_error());
            }else{
                $query2 = "insert into tblDanhMuc values ('', '".$TenDanhMuc."', '".$DuongDanAnh."')";
                $result2 = mysqli_query($conn, $query2);

                if ($result2 == true) {
                    echo "<script type='text/javascript'>";
                    echo "alert('Thêm mới sản phẩm thành công!');";
                    echo "window.location.href='QuanLiDanhMuc.php';";
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
        
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["btnSave"])){
                if(isset($_GET["ID"]) && isset($_GET["Controler"]) && $_GET["Controler"] == 'update'){
                $_ID = $_GET["ID"];
                $TenDanhMuc = $_POST["txtTenDanhMuc"];
                $DuongDanAnh = './img/DanhMuc/'.$_POST["txtDuongDanAnh"];

                $conn = mysqli_connect("localhost", "root", "", "webnoithat");
                if (!$conn) {
                    die("Kết nối thất bại" . mysqli_connect_error());
                }else{
                    $query2 = "update tblDanhMuc set TenDanhMuc = '".$TenDanhMuc."', DuongDanAnh = '".$DuongDanAnh."' where ID = '".$_ID."'";
                    $result2 = mysqli_query($conn, $query2);

                    if ($result2 == true) {
                        echo "<script type='text/javascript'>";
                        echo "alert('Sửa thông danh mục thành công!');";
                        echo "window.location.href='QuanLiDanhMuc.php';";
                        echo "</script>";
                    }else{
                        echo 'thất bại';
                    }
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

                    $query2 = "delete from tblDanhMuc where ID = ".$_ID_delete."";
                    $result2 = mysqli_query($conn, $query2);

                    if ($result2 == true) {
                        echo "<script type='text/javascript'>";
                        echo "alert('Xóa danh mục thành công!');";
                        echo "window.location.href='QuanLiDanhMuc.php';";
                        echo "</script>";
                }
            }
        
        ?>
</body>
</html>