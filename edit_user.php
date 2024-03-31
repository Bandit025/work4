<?php session_start();
require('connect.php');
require_once 'connect.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
} else {
    $id_user = $_GET['id_user'];
    $sql = "SELECT * FROM users WHERE id_user= $id_user";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>แก้ไขข้อมูล</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container text-center">
            <h3 class="mt-4">แก้ไขข้อมูล</h3>
            <hr>
            <form action="update_user.php" method="post">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3">

                        <input type="hidden" class="form-control" name="id_user" aria-describedby="id_user" value="<?php echo $row['id_user'] ?>">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First name</label>
                            <input type="text" class="form-control" name="firstname" aria-describedby="firstname" value="<?php echo $row['fname'] ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="lastname" aria-describedby="lastname" value="<?php echo $row['lname'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" aria-describedby="email" value="<?php echo $row['email'] ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $row['pass'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">สถานะ</label>
                            <select class="form-select" aria-label="Default select example" name="urole">
                                <?php if($row['urole']== 1){?>
                                <option selected value="1">ผู้ใช้</option>
                                <option value="2">แอดมิน</option>
                                <option value="3">อาจารย์ผู้สอน</option>
                                <?php }else if($row['urole']== 2){?>
                                <option value="1">ผู้ใช้</option>
                                <option selected value="2">แอดมิน</option>
                                <option value="3">อาจารย์ผู้สอน</option>
                                <?php }else if($row['urole']== 3){?>
                                <option value="1">ผู้ใช้</option>
                                <option value="2">แอดมิน</option>
                                <option selected value="3">อาจารย์ผู้สอน</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <br>
                        <button type="submit" name="signup" class="btn btn-warning">แก้ไขข้อมูล</button>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </body>

    </html>
<?php } ?>