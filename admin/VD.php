<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tên sản phẩm', 'số lượng bán được'],
          <?php
           $conn= mysqli_connect("localhost","root","","webnoithat");
            $query="select * from tbldonhang";
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $Ten=$data['ID'];
              $Soluong=$data['TongTien'];
              
           ?>
           ['<?php echo $Ten;?>',<?php echo $Soluong;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Biểu đồ sản phẩm bán chạy ',
            
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>
<div class="content" style=" margin-left: 90px;">
           <div class="content-left" style="margin:100px 0 0 30px;">
           <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Chọn Thống Kê
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                
                <li><a class="dropdown-item" href="chart.php">Thống kê các hàng bán chạy</a></li>
                <li><a class="dropdown-item" href="chart1.php">Thống kê các hàng bán chạy theo tháng</a></li>
                <li><a class="dropdown-item" href="chart2.php">Thống kê doanh thu theo tháng</a></li>
                <li><a class="dropdown-item" href="chart3.php">Thống kê doanh thu theo năm</a></li>
              </ul>
            </div>
           </div> 
           <div>
               <br>

           <div id="barchart_material" style="width: 800px; height: 400px; margin-left: 50px;"></div>
           </div>


         </div>
          
</body>
</html>