<?php
require('connect.php');

session_start();
require_once 'connect.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: admin.php');
} else {

    $id = $_GET["id"];
    // echo  $id;

    $sql = "DELETE FROM `users` WHERE id_user= $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("ลบข้อมูลสำเร็จ")</script>';
        header('refresh:1;admin.php');
        
    } else {
        echo "เกิดข้อผิดพลาดเกิดขึ้น";
    }
}
?>
