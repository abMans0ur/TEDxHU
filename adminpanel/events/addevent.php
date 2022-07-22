<?php
include("/xampp/htdocs/tedx/shared/config.php");
$update = false;
if (isset($_GET['edit'])) {
    $update = "true";
    $id = $_GET['edit'];
    $selectU = "SELECT * FROM `events` WHERE `event_id` = $id";
    $runselectU = mysqli_query($conn, $selectU);
    $data = mysqli_fetch_array($runselectU);

    if (isset($_POST['edit'])) {
        $event_names = $_POST['name'];
        $event_descs = $_POST['desc'];
        $event_dates = $_POST['date'];
        $event_locations = $_POST['location'];
        $fileName = $_FILES['img']['name'];
        $tempName = $_FILES['img']['tmp_name'];
        $dir = "/xampp/htdocs/tedx/upload/event/";
        $upload = move_uploaded_file($tempName, $dir . $fileName);
        if (empty($upload)) {
            $fileName = $data['event_image'];
        }
        $update = "UPDATE `events` SET `event_name`='$event_names',`event_desc`='$event_descs',`event_date`='$event_dates',`event_location`='$event_locations',`event_image`='$fileName' WHERE `event_id`= $id";
        $runupdate = mysqli_query($conn, $update);
        header("location: ./list.php");
    }
}
if (isset($_POST['send'])) {
    $event_name = $_POST['name'];
    $event_desc = $_POST['desc'];
    $event_date = $_POST['date'];
    $event_location = $_POST['location'];
    $fileName = $_FILES['img']['name'];
    $tempName = $_FILES['img']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/event/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $insert = "INSERT INTO `events` VALUES (NULL,'$event_name', '$event_desc', '$event_date' , '$event_location', '$fileName')";
    $runinsert = mysqli_query($conn, $insert);
    if ($runinsert) {
        echo "true";
    } else {
        echo "false";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="Reg.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <style>

    </style>
</head>

<body>

    <?php include '../nav/nav.php'; ?>



    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <?php if ($update) { ?>
                <img src="<?php echo $event_image['event_image'] ?>" alt="">
                <h1>UPDATE</h1>
            <?php } else { ?>
                <h1>INSERT</h1>
            <?php } ?>
            <div class="user-detail">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="enter event name" required name="name" value="<?php if (isset($_GET['edit'])) {
                                                                                                        echo $data['event_name'];
                                                                                                    } ?>">
                </div>

                <div class="input-box">
                    <span class="details">Upload Image</span>
                    <input type="file" accept="image/*" name="img">
                </div>

                <div class="input-box">
                    <span class="details">Description</span>
                    <input type="text" placeholder="..." required name="desc" value="<?php if (isset($_GET['edit'])) {
                                                                                            echo $data['event_desc'];
                                                                                        } ?>">
                </div>
                <div class="input-box">
                    <span class="details">Date</span>
                    <input type="date" required name="date" value="<?php if (isset($_GET['edit'])) {
                                                                        echo $data['event_date'];
                                                                    } ?>">
                </div>
                <div class="input-box">
                    <span class="details">location</span>
                    <input type="text" placeholder="enter event location" required name="location" value="<?php if (isset($_GET['edit'])) {
                                                                                                                echo $data['event_location'];
                                                                                                            } ?>">
                </div>

            </div>

            <div class="button">

                <?php
                if (isset($_GET['edit'])) {
                ?>

                    <input type="submit" value="updates" name="edit">

                <?php
                } else {
                ?>
                    <input type="submit" value="create" name="send">
                <?php } ?>

            </div>
    </div>

    </form>
</body>

</html>