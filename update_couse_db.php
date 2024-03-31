<?php
session_start();

require_once 'connect.php';

if (isset($_POST['signup'])) {
    $id_course = $_POST['id_course'];
    $name_course = $_POST["name_course"];
    $level_course = $_POST["level_course"];
    $teacher = $_POST["teacher"];
    $price_course = $_POST["price_course"];
    $comment = $_POST["comment"];

        $sql = "UPDATE `course` SET `name_course`='$name_course',
                                    `level_course`='$level_course',
                                    `techer_course`='$teacher',
                                    `price_course`='$price_course',
                                    `detail_course`='$comment'
                                     WHERE id_course='$id_course' ";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "<script>alert('แก้ไขข้อมูลสำเร็จ')</script>";
            header('refresh:1;course_list.php');
            exit(); 
        } else {
            echo mysqli_error($conn);
        }
    }

?>
