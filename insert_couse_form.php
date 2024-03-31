<?php session_start();
require('connect.php');

$sql = "SELECT * FROM users WHERE urole=3";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container text-center">
        <h3 class="mt-4">เพิ่มคอร์ส</h3>
        <hr>
        <form action="insert_couse.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">ชื่อคอร์ส</label>
                        <input type="text" class="form-control" name="name_course">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label">ระดับคอร์ส</label>
                        <select class="form-select" aria-label="Default select example" name="level_course">
                            <option selected>เลือกระดับ</option>
                            <option value="1">Beginner</option>
                            <option value="2">Basic</option>
                            <option value="3">Advance</option>
                            <option value="4">Premium</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">ผู้สอน</label>
                        <select class="form-select" aria-label="Default select example" name="techer">
                        <option selected>เลือกผู้สอน</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["id_user"] . "'>" . $row["fname"] . " " . $row["lname"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No users found</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="password" class="form-label">ราคา</label>
                        <input type="text" class="form-control" name="price_course">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="mb-3">
                        <div class="mb-3">
                        <label for="password" class="form-label">คำอธิบาย</label>
                            <div class="form-floating">
                            
                                <textarea class="form-control"  id="floatingTextarea" name="comment"></textarea>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3"><br><br>
                    <button type="submit" name="signup" class="btn btn-primary">เพิ่มคอร์ส</button>
                    <a  href="course_list.php" class="btn btn-danger">ย้อนกลับ</a>
                    </div>
                </div>
            </div>


        </form>
        <hr>
        
        
    </div>

</body>

</html>