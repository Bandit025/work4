<?php

session_start();
require_once 'connect.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
} else {
    if (isset($_SESSION['user_login'])) {
        $id_course = $_GET['id_course'];
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
        <?php require_once 'nav_user.php'; ?>
        <div class="container text-center bg-success">
            <h1>Order summary</h1>
            
            


        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    
                </div>
                <div class="col">
                <h3 class="mt-4"><?php echo $row['name_course'] ?></h3>
                <h5 class="mt-4">ระดับการสอน : <?php echo $row['name_level']?></h5> 
                <a>ผู้สอน : <?php echo $row['fname'] . " " .$row['lname'] ?></a><br> 
                <a>ราคา : <?php echo $row['price_course'] ?></a><br>
                <h1>Thankyou Very much</h1>
                <a href="user.php"class="btn btn-success">กลับไปยังหน้าแรก</a>
                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>

    </body>


    </html>
<?php } ?>