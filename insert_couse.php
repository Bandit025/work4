<?php
session_start();

require_once 'connect.php';

if (isset($_POST['signup'])) {
    $name_course= $_POST["name_course"];
    $level_course = $_POST["level_course"];
    $techer = $_POST["techer"];
    $price_course = $_POST["price_course"];
    $comment = $_POST["comment"];

    // echo $name_course."<br>";
    // echo $level_course."<br>";
    // echo $techer."<br>";
    // echo $price_course."<br>";
    // echo $comment."<br>";
    $error_flag = false; // เริ่มต้นตรวจสอบค่าข้อผิดพลาดเป็นเท็จ

    if (empty($name_course)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อคอร์ส';
        $error_flag = true;
    } else if (empty($level_course)) {
        $_SESSION['error'] = 'กรุณาเลือกระดับ';
        $error_flag = true;
    } else if (empty($techer)) {
        $_SESSION['error'] = 'กรุณาเลือกผู้สอน';
        $error_flag = true;
    } else if (empty($price_course)) {
        $_SESSION['error'] = 'กรุณาระบุราคา';
        $error_flag = true;
    } else {
        $sql = "SELECT * FROM course WHERE name_course='$name_course'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error'] = 'ชื่อคอร์สนี้มีอยู่ในระบบแล้ว';
            $error_flag = true;
        }
        
    }

    if (!$error_flag) { // ถ้าไม่มีข้อผิดพลาด
        $sql = "INSERT INTO `course`( `name_course`, `level_course`, `techer_course`, `price_course`, `detail_course`) 
                               VALUES ('$name_course','$level_course','$techer','$price_cours','$comment')";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $_SESSION['success'] = "เพิ่มคอร์สเรียนเรียบร้อยแล้ว";
            header("location: insert_couse_form.php");
            exit(); // ออกจากการทำงานหลังจากที่ลงทะเบียนเรียบร้อยแล้ว
        } else {
            $_SESSION['error'] = mysqli_error($conn);
        }
    }
    
   
    header("location: insert_couse_form.php");
    exit(); // ออกจากการทำงานเมื่อมีข้อผิดพลาด
}
?>
