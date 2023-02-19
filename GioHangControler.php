<?php
    session_start();
    if(isset($_SESSION['userName'])){
        if(isset($_GET["ID"]) && isset($_GET["controler"])){
            $_ID = $_GET["ID"];
            $_controler = $_GET["controler"];
            $conn = mysqli_connect("localhost", "root","","webnoithat");
            if($conn == true){
                if($_controler == 'plus'){
                    $query = "update tblGioHang set SoLuong = SoLuong+1 where ID='".$_ID."'";
                    $result = mysqli_query($conn, $query);
                    if($result == true){                
                        header('location: GioHang.php');
                    }
                    else{
                        echo "data empty";
                    }
                    
                }
                else if($_controler == 'sub'){
                    $query = "update tblGioHang set SoLuong = SoLuong-1 where ID='".$_ID."'";
                    $result = mysqli_query($conn, $query);
                    if($result == true){                
                        header('location: GioHang.php');
                    }
                    else{
                        echo "data empty";
                    }
                }else if($_controler == 'delete'){
                    $query = "delete from tblGioHang where ID='".$_ID."'";
                    $result = mysqli_query($conn, $query);
                    if($result == true){                
                        header('location: GioHang.php');
                    }
                    else{
                        echo "data empty";
                    }
                }
                
            }
            else{
                echo "Connect error: " . mysqli_connect_error();
            }
        }
        else if(isset($_GET["TenSanPham"]) && isset($_GET["controler"]) && isset($_GET["DonGia"])){
            $_TenSanPham = $_GET["TenSanPham"];
            $_controler = $_GET["controler"];
            $_DonGia = $_GET["DonGia"];
            $conn = mysqli_connect("localhost", "root","","webnoithat");
            if($conn == true){
                $query = "SELECT * FROM tblgiohang WHERE TenSanPham ='".$_TenSanPham."' AND EmailUser ='" . $_SESSION['userName'] . "'";
                    $result = mysqli_query($conn, $query);
                    if($result != null && mysqli_num_rows($result) > 0){                
                        $query2 = "update tblGioHang set SoLuong= SoLuong+1 where TenSanPham ='".$_TenSanPham."' AND EmailUser ='" . $_SESSION['userName'] . "'";
                        $result2 = mysqli_query($conn, $query2);
                        if($result2 == true){                
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            // echo "<script type='text/javascript'>";
                            // echo "alert('xóa dữ liệu thành công!');";
                            // echo "window.location.href='index.php';";
                            // echo "</script>";
                        }
                        else{
                            echo "data empty";
                        }
                    }
                    else{
                        $query3 = "insert into tblGioHang values ('', '".$_SESSION['userName']."', '".$_TenSanPham."', ".$_DonGia.", 1)";
                        $result3 = mysqli_query($conn, $query3);
                        if($result3 == true){                
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                        }
                        else{
                            echo "data empty";
                        }
                    }
                   
            }
            else{
                echo "Connect error: " . mysqli_connect_error();
            }
        }
    }
        ?>

        <?php 
            // <!-- hủy đơn hàng -->
            if(isset($_GET["IdDonHang"])){
                $IdDonHang = $_GET["IdDonHang"];
                $conn = mysqli_connect("localhost", "root","","webnoithat");
                if($conn == true){                        
                $query_huy = "update tblDonHang set TrangThai = 'đã hủy' where ID = '".$IdDonHang."'";
                $result_huy = mysqli_query($conn, $query_huy);
                if($result_huy == true){
                    // echo '<meta http-equiv="refresh" content="0">';

                    echo "<script type='text/javascript'>";
                    echo "alert('Hủy đơn thành công!');";
                    echo "window.location.href='GioHang.php';";
                    // echo "header('Location: ' . $_SERVER".""."['HTTP_REFERER']);";
                    echo "</script>";
                }
                else{
                    echo "data empty";
                }
            }
            else{
                echo "Connect error: " . mysqli_connect_error();
            }
        }
// <!-- hủy đơn hàng -->
        ?>