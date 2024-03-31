<?php 

session_start();
require_once 'connect.php';

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: index.php");
        exit(); // ออกจากการทำงานทันทีหลังจาก redirect
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: index.php");
        exit(); // ออกจากการทำงานทันทีหลังจาก redirect
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: index.php");
        exit(); // ออกจากการทำงานทันทีหลังจาก redirect
    } else {
        // ค้นหาผู้ใช้จากฐานข้อมูล
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result_check = mysqli_query($conn, $sql);

        if (!$result_check) {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการค้นหาข้อมูลผู้ใช้";
            header("location: index.php");
            exit(); // ออกจากการทำงานทันทีหลังจาก redirect
        }

        // ตรวจสอบว่ามีผู้ใช้ในฐานข้อมูลหรือไม่
        if (mysqli_num_rows($result_check) > 0) {
            $row = mysqli_fetch_assoc($result_check);
            
            if ($password == $row['pass']) {
                // ตรวจสอบบทบาทของผู้ใช้
                echo $password."<br>";
                echo $row['pass']."<br>";

                if (isset($row['urole']) && $row['urole'] == '2') {
                  
                    $_SESSION['admin_login'] = $row['id_user'];
                    
                    header("location: admin.php");
                    exit(); 
                } else {
                    
                    $_SESSION['user_login'] = $row['id_user'];
                    
                    header("location: user.php");
                    exit(); 
                }
            } else {
                $_SESSION['error'] = 'รหัสผ่านผิด';
                header("location: index.php");
                exit(); // ออกจากการทำงานทันทีหลังจาก redirect
            }
        } else {
            $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
            header("location: index.php");
            exit(); // ออกจากการทำงานทันทีหลังจาก redirect
        }
    }
}
    
?>