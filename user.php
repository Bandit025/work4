<?php

session_start();
require_once 'connect.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
} else {
    $stmt = "SELECT * FROM course a
    INNER JOIN users b ON a.techer_course=b.id_user
    INNER JOIN level_course c ON a.level_course=c.id_level 
    WHERE a.id_course= 1";
    $re_stmt1 = mysqli_query($conn, $stmt);
    $row1=mysqli_fetch_assoc($re_stmt1);
    $stmt2 = "SELECT * FROM course a
    INNER JOIN users b ON a.techer_course=b.id_user
    INNER JOIN level_course c ON a.level_course=c.id_level 
    WHERE a.id_course= 5";
    $re_stmt2 = mysqli_query($conn, $stmt2);
    $row2=mysqli_fetch_assoc($re_stmt2);
    $stmt3 = "SELECT * FROM course a
    INNER JOIN users b ON a.techer_course=b.id_user
    INNER JOIN level_course c ON a.level_course=c.id_level 
    WHERE a.id_course= 6";
    $re_stmt3 = mysqli_query($conn, $stmt3);
    $row3=mysqli_fetch_assoc($re_stmt3);

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
        <div class="container">


            <h3 class="mt-4">คอรส์แนะนำ</h3>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="image/china basic.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row1['name_course']?></h5>
                                <p class="card-text"><?php echo $row1['fname']." ".$row1['lname']?></p>
                                <a href="detail_course.php?id_course=<?php echo $row1["id_course"] ?>" class="btn btn-primary">รายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    <div class="card" style="width: 18rem;">
                            <img src="image/japan basic.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row2['name_course']?></h5>
                                <p class="card-text"><?php echo $row2['fname']." ".$row2['lname']?></p>
                                <a href="detail_course.php?id_course=<?php echo $row2["id_course"] ?>" class="btn btn-primary">รายละเอียด</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    <div class="card" style="width: 18rem;">
                            <img src="image/korea basic.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row3['name_course']?></h5>
                                <p class="card-text"><?php echo $row3['fname']." ".$row3['lname']?></p>
                                <a href="detail_course.php?id_course=<?php echo $row3["id_course"] ?>" class="btn btn-primary">รายละเอียด</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>
    <script>

    </script>

    </html>
<?php } ?>