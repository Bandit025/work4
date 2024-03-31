<?php
session_start();

require_once 'connect.php';

if (isset($_POST['signup'])) {
    $id_user = $_POST['id_user'];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $urole = $_POST["urole"];

        $sql = "UPDATE `users` SET `fname`='$fname',
                                    `lname`='$lname',
                                    `email`='$email',
                                    `pass`='$password',
                                    `urole`='$urole'
                                     WHERE id_user = '$id_user' ";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "<script>alert('แก้ไขข้อมูลสำเร็จ')</script>";
            header('refresh:1;admin.php');
            exit(); // ออกจากการทำงานหลังจากที่ลงทะเบียนเรียบร้อยแล้ว
        } else {
            echo mysqli_error($conn);
        }
    }

?>
