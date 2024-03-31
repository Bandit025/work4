<?php

session_start();
require_once 'connect.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
} else {
    if (isset($_SESSION['user_login'])) {
        $id_course =$_GET['id_course'];
        $admin_id = $_SESSION['user_login'];
        $stmt = "SELECT * FROM course a
        INNER JOIN users b ON a.techer_course=b.id_user
        INNER JOIN level_course c ON a.level_course=c.id_level WHERE id_course=$id_course";
        $re_stmt = mysqli_query($conn, $stmt);
        $row = mysqli_fetch_assoc($re_stmt);
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>user Page</title>
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
    <?php require_once 'nav_user.php';?>
        <div class="container">
            <h3 class="mt-4"><?php echo $row['name_course']?></h3> 
            <h5 class="mt-4">ระดับการสอน : <?php echo $row['name_level']?></h5> 
           <a>ผู้สอน : <?php echo $row['fname'] . " " .$row['lname'] ?></a><br>
           <a>ราคา : <?php echo $row['price_course'] ?></a><br>
           <a>รายละเอียด : <?php echo $row['detail_course'] ?></a><br>
           <a href="pay_course.php?id_course=<?php echo $row["id_course"] ?>" class="btn btn-primary">ซื้อคอร์สออนไลน์</a>
                

        </div>
        <script>
       
    </script>
    </body>
    

    </html>
<?php } ?>