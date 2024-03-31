<?php session_start();
require('connect.php');

$id_course = $_GET["id_course"];
$sql = "SELECT * FROM users WHERE urole=3 ";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM course WHERE id_course= $id_course";
$result2 = $conn->query($sql2);
$row2 = mysqli_fetch_assoc($result2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขคอร์ส</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container text-center">
        <h3 class="mt-4">แก้ไขคอร์ส</h3>
        <hr>
        <form action="update_couse_db.php" method="post">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">ชื่อคอร์ส</label>
                        <input type="text" class="form-control" name="name_course" value="<?php echo $row2['name_course'] ?>">
                        <input type="hidden" class="form-control" name="id_course" value="<?php echo $row2['id_course'] ?>">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label">ระดับคอร์ส</label>
                        <select class="form-select" aria-label="Default select example" name="level_course">
                            <option selected>เลือกระดับ</option>
                            <?php if ($row2['level_course'] == 1) { ?>
                                <option selected value="1">Beginner</option>
                                <option value="2">Basic</option>
                                <option value="3">Advance</option>
                                <option value="4">Premium</option>
                            <?php } else if ($row2['level_course'] == 2) { ?>
                                <option value="1">Beginner</option>
                                <option selected value="2">Basic</option>
                                <option value="3">Advance</option>
                                <option value="4">Premium</option>
                            <?php } else if ($row2['level_course'] == 3) { ?>
                                <option value="1">Beginner</option>
                                <option value="2">Basic</option>
                                <option selected value="3">Advance</option>
                                <option value="4">Premium</option>
                            <?php } else if ($row2['level_course'] == 4) { ?>
                                <option value="1">Beginner</option>
                                <option value="2">Basic</option>
                                <option value="3">Advance</option>
                                <option selected value="4">Premium</option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">ผู้สอน</label>
                        <select class="form-select" aria-label="Default select example" name="teacher">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row["id_user"] == $selectedTeacherId) ? "selected" : ""; // เช็คว่า id_user มีค่าเท่ากับ $selectedTeacherId หรือไม่
                                    echo "<option value='" . $row["id_user"] . "' $selected>" . $row["fname"] . " " . $row["lname"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>ไม่พบผู้ใช้</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="password" class="form-label">ราคา</label>
                        <input type="text" class="form-control" name="price_course" value="<?php echo $row2['price_course'] ?>">
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

                            <textarea class="form-control" id="floatingTextarea" name="comment"><?php echo $row2['detail_course']?></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3"><br><br>
                        <button type="submit" name="signup" class="btn btn-warning">แก้ไข</button>
                    </div>
                </div>
            </div>


        </form>
        <hr>


    </div>

</body>

</html>