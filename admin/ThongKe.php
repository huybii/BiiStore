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
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    

<link rel="stylesheet" href="../style/GioHang.css" type="text/css">
    <link rel="stylesheet" href="./style/admin.css" type="text/css">
    <style>
        .time-picker{
            width: 50%;
            display: flex;
            align-items: center;
        }
        .time-filter {
            width: 40%;
        }
        .btn-search{
            border-radius: 5px;
            outline: none;
            border: none;
            box-shadow: 0 4px 10px rgb(0 0 0 / 3%) !important;
            padding: 4px 8px;
            background-color: var(--main-color);
            color: white;
            margin-top: 24px;
            margin-left: 8px;
        }
    </style>
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
                    <a class="menu-item-link" href="QuanLiSanPham.php">Quản lí sản phẩm</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="QuanLiDanhMuc.php">Quản lí danh mục</a>
                </li>
                <li class="menu-item">
                    <a class="menu-item-link" href="TuVanThietKe.php">Tư vấn thiết kế</a>
                </li>
                <li class="menu-item" style="background-color: rgba(255,255,255, 0.1);">
                    <a class="menu-item-link" href="QuanLiBaiViet.php">Thống kê doanh thu</a>
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
        <h3 style="margin-bottom: 30px;">Thống kê doanh thu</h3>
        <h5 style="color: #75ab38;">Thống kê theo ngày</h5>
        <form action="ThongKe.php" method="post">
        <div class="time-picker">
            <div class="time-filter from-time">
                <label for="" style="color: #75ab38;font-weight:500">Từ</label>
                <input type="date" name="from-time" class="form-control" value="<?php if (isset($_POST['from-time'])) echo $_POST['from-time']; ?>" required>
            </div>
            
            <div class="time-filter to-time">
                <label for="" style="color: #75ab38;font-weight:500">Đến</label>
                <input type="date" name="to-time" class="form-control" value="<?php if (isset($_POST['to-time'])) echo $_POST['to-time']; ?>"  required>
            </div>

            <button class="btn-search" type="submit" name="btnSearch">
                        Tìm
                    <i class="fas fa-search" style="margin-left:4px"></i>
            </button>
        </div>
        </form>

        

        <div id="bar-chart" style="width: 800px; height: 400px; margin-left: 160px;margin-top:30px;"></div>
           
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ngày', 'Doanh thu'],
          <?php
        //    $date=$_POST['date'];
        //    $time = explode("-", $date);
        //    $thang=$time[0];
        //    $nam=$time[1];


        $conn= mysqli_connect("localhost","root","","webnoithat");
            $query="select sum(TongTien) as 'TongTien', date(NgayDat) as 'NgayDat' from tblDonHang group by date(NgayDat)";
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnSearch'])){
                $from_time = $_POST['from-time'];
                $to_time = $_POST['to-time'];
                $query="select sum(TongTien) as 'TongTien', date(NgayDat) as 'NgayDat' from tblDonHang where date(NgayDat) >= '".$from_time."' and date(NgayDat) <= '".$to_time."' group by date(NgayDat)";
            }
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $Ten=$data['NgayDat'];
              $Doanhthu=$data['TongTien'];
              
           ?>
           ['<?php echo $Ten;?>',<?php echo $Doanhthu;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Biểu đồ chi tiết doanh thu  ',
            
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('bar-chart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    </div>
</body>
</html>