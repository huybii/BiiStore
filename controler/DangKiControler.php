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

