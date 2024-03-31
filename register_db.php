<?php
session_start();

require_once 'connect.php';

if (isset($_POST['signup'])) {
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $urole = 1;

    $error_flag = false; // เริ่มต้นตรวจสอบค่าข้อผิดพลาดเป็นเท็จ

    if (empty($fname)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อ';
        $error_flag = true;
    } else if (empty($lname)) {
        $_SESSION['error'] = 'กรุณากรอกนามสกุล';
        $error_flag = true;
    } else if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        $error_flag = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        $error_flag = true;
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        $error_flag = true;
    } else {
        // ตรวจสอบว่าอีเมลซ้ำหรือไม่
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error'] = 'อีเมลนี้มีอยู่ในระบบแล้ว';
            $error_flag = true;
        }
    }

    if (!$error_flag) { // ถ้าไม่มีข้อผิดพลาด
        $sql = "INSERT INTO `users`( `fname`, `lname`, `email`, `pass`, `urole`) 
                      VALUES ('$fname','$lname','$email','$password','$urole')";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว";
            header("location: index.php");
            exit(); // ออกจากการทำงานหลังจากที่ลงทะเบียนเรียบร้อยแล้ว
        } else {
            $_SESSION['error'] = mysqli_error($conn);
        }
    }
    
    // เมื่อมีข้อผิดพลาด กลับไปยังหน้า register.php
    header("location: register.php");
    exit(); // ออกจากการทำงานเมื่อมีข้อผิดพลาด
}
?>
