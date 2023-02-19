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
            <div class="main-header">
                <h3 style="margin-bottom: 30px;">Quản lí sản phẩm</h3>
                <div class="main-header-btn">
                    <a class="add-new" href="SanPhamControler.php?Controler=insert">+ Thêm mới</a>
                    <a class="export-file" onclick="exportTableToExcel('tblData')" href=""><i class="fas fa-file-download"></i></a>
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

            <div class="" style="margin-top: 50px;">
            <table class="table" id="tblData">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col" style="text-align: left;">Sản phẩm</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Giá gốc</th>
                            <th scope="col">Giá khuyến mãi</th>
                            <th scope="col">Thao tác</th>

                          </tr>
                        </thead>
                        <!-- <tbody> -->
                        <?php
                                
                                    $conn = mysqli_connect("localhost", "root","","webnoithat");
                                    if($conn == true){
                                        $query = "SELECT @row := @row + 1 AS STT, t.* FROM tblSanPham t, (SELECT @row := 0) r ORDER BY IdDanhMuc";
                                        $result = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($result) > 0){ 
                                            echo '<tbody id="tBodyMain">';         
                                            while($row = mysqli_fetch_assoc($result)){
                                                
                                                echo '<tr>';
                                                echo '<td>'.$row["STT"].'</td>';
                                                echo '<th scope="row" style="width:320px;text-align: left;">';
                                                echo '<a  class="cart-product">';
                                                echo '<img width="20%" src="../'.$row["DuongDanAnh"].'" style="margin-right: 8px;" alt="">';
                                                        echo ''.$row["TenSanPham"].'';
                                                        echo '</a>';
                                                echo '</th>';
                                                $query1 = "SELECT * FROM tblDanhMuc where ID = '".$row["IdDanhMuc"]."' ";
                                                $result1 = mysqli_query($conn, $query1);
                                                if(mysqli_num_rows($result1) > 0){
                                                    $row1 = mysqli_fetch_assoc($result1);
                                                    echo '<td>'.$row1["TenDanhMuc"].'</td>';
                                                }

                                                
                                                echo '<td>'.number_format($row["GiaGoc"], 0, '', ',').'</td>';
                                                echo '<td>'.number_format($row["GiaKhuyenMai"], 0, '', ',').'</td>';
                                                echo '<td>';
                                                echo '<a href="SanPhamControler.php?ID='.$row["ID"].'&Controler=update" style="margin-right: 12px;"><i class="far fa-edit"></i></a>';
                                                echo '<a onclick="return confirm(\'Bạn có muốn xóa không?\')" href="SanPhamControler.php?ID='.$row["ID"].'&Controler=delete"><i class="far fa-trash-alt"></i></a>';  
                                                echo '</td>';
                                                echo '</tr>';
                                            }

                                        }
                                        else{
                                            echo '<tr>';
                                            echo '<td>giỏ hàng trống</td>';
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
                                            $query1 = "select @row := @row + 1 AS STT, t.* FROM tblSanPham t, (SELECT @row := 0) r where TenSanPham like N'%".$KeyWord."%'";
                                            
                                            $result1 = mysqli_query($conn, $query1);
                                            if($result1 != null && mysqli_num_rows($result1) > 0){
                                                echo '<tbody>';  
                                                while($row1 = mysqli_fetch_assoc($result1)){
                                                
                                                    echo '<tr>';
                                                    echo '<td>'.$row1["STT"].'</td>';
                                                    echo '<th scope="row" style="width:320px;text-align: left;">';
                                                    echo '<a  class="cart-product">';
                                                    echo '<img width="20%" src="../'.$row1["DuongDanAnh"].'" style="margin-right: 8px;" alt="">';
                                                            echo ''.$row1["TenSanPham"].'';
                                                            echo '</a>';
                                                    echo '</th>';
                                                    $query2 = "SELECT * FROM tblDanhMuc where ID = '".$row1["IdDanhMuc"]."' ";
                                                    $result2 = mysqli_query($conn, $query2);
                                                    if(mysqli_num_rows($result2) > 0){
                                                        $row2 = mysqli_fetch_assoc($result2);
                                                        echo '<td>'.$row2["TenDanhMuc"].'</td>';
                                                    }
    
                                                    
                                                    echo '<td>'.number_format($row1["GiaGoc"], 0, '', ',').'</td>';
                                                    echo '<td>'.number_format($row1["GiaKhuyenMai"], 0, '', ',').'</td>';
                                                    echo '<td>';
                                                    echo '<a href="SanPhamControler.php?ID='.$row1["ID"].'&Controler=update" style="margin-right: 12px;"><i class="far fa-edit"></i></a>';
                                                    echo '<a onclick="return confirm(\'Bạn có muốn xóa không?\')" href="SanPhamControler.php?ID='.$row1["ID"].'&Controler=delete"><i class="far fa-trash-alt"></i></a>';  
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
            </div>
        </div>
        

        
    </div>
            <script type="text/javascript">
                function confirm_delete(){
                    if(confirm("Bạn có chắc chắn muốn xóa?") === true){
                        return true;
                    }else{
                        return false;
                }
                }
            </script>

    <script type="text/javascript">
        function exportTableToExcel(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';
            
            // Create download link element
            downloadLink = document.createElement("a");
            
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
        }
    </script>
</body>
</html>