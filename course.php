<?php

session_start();
require_once 'connect.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
} else {
    if (isset($_SESSION['user_login'])) {
        $admin_id = $_SESSION['user_login'];
        $stmt = "SELECT * FROM course a
        INNER JOIN users b ON a.techer_course=b.id_user
        INNER JOIN level_course c ON a.level_course=c.id_level";
        $re_stmt = mysqli_query($conn, $stmt);
        
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Page</title>
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
    <?php require_once 'nav_user.php';?>
        <div class="container">


            <h3 class="mt-4">รายการคอร์สทั้งหมด</h3> 
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">รหัสคอร์ส</th>
                        <th scope="col">ชื่อคอร์ส</th>
                        <th scope="col">ระดับ</th>
                        <th scope="col">ผู้สอน</th>
                        <th scope="col">รายละเอียด</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($re_stmt)) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['id_course']?></th>
                        <td><?php echo $row['name_course']?></td>
                        <td><?php echo $row['name_level']?></td>
                        <td><?php echo $row['fname']." ".$row['lname']?></td>
                        <td><a  href="detail_course.php?id_course=<?php echo $row["id_course"] ?>" class="btn btn-primary">รายละเอียด</a></td>
                     
                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <script>
        function confirmDelete(id) {
            var result = confirm("คุณต้องการลบใช่หรือไม่?");
            if (result) {
                window.location.href = "delete_course.php?id=" + id;
                console.log(window.location.href);
            } else {

            }
        }
    </script>
    </body>
    

    </html>
<?php } ?>