<?php
include("/xampp/htdocs/tedx/shared/config.php");

//insert//
if (isset($_POST['send'])) {
    $speaker_name = $_POST['name'];
    $speaker_title = $_POST['title'];
    $speaker_talk = $_POST['talk'];
    $speaker_event = $_POST['event'];
    $speaker_desc = $conn->real_escape_string($_POST['desc']);
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/speaker/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $insert = "INSERT INTO `speakers` VALUES(NULL, '$speaker_name', '$speaker_title', '$speaker_talk', '$speaker_event', '$speaker_desc', '$fileName')";
    $runinsert = mysqli_query($conn, $insert);
    if ($runinsert) {
header('location:listspeaker.php');
    } else {
        echo "<h1>noooooo</h1>";
    }
}

//update///
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $speaker_id = $_GET['edit'];
    $select = "SELECT * FROM `speakers`JOIN`events`ON`speaker_event`=`event_id` WHERE `speaker_id`='$speaker_id'";
    $runselect = mysqli_query($conn, $select);
    $fetch_speaker = mysqli_fetch_assoc($runselect);
    $speaker_name = $fetch_speaker['speaker_name'];
    $speaker_title = $fetch_speaker['speaker_title'];
    $speaker_talk = $fetch_speaker['speaker_talk'];
    $speaker_event = $fetch_speaker['speaker_event'];
    $speaker_desc = $fetch_speaker['speaker_desc'];
    $speaker_image = $fetch_speaker['speaker_image'];
}

if (isset($_POST['update'])) {
    $speaker_id = $_GET['edit'];
    $speaker_name = $_POST['name'];
    $speaker_title = $_POST['title'];
    $speaker_talk = $_POST['talk'];
    $speaker_event = $_POST['event'];
    $speaker_desc =$conn->real_escape_string($_POST['desc']);
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/speaker/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = $speaker_image;
    }
    $update = "UPDATE `speakers` SET 
      `speaker_name`='$speaker_name'
    ,`speaker_title`='$speaker_title'
    ,`speaker_talk`='$speaker_talk'
    ,`speaker_event`='$speaker_event'
    ,`speaker_desc`='$speaker_desc'
    ,`speaker_image`='$fileName'
     WHERE `speaker_id`='$speaker_id'";
    $runupdate = mysqli_query($conn, $update);
    if ($runupdate) {
        header('location:listspeaker.php');
    } else {
        echo 'false';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Speaker</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./../../upload/hnet.com-image.ico" type="image/x-icon">
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
                <img src="/tedx/upload/speaker/<?php echo $speaker_image ?>" width="100" height="100" alt="">
                <h1>UPDATE</h1>
            <?php } else { ?>
                <h1>INSERT</h1>
            <?php } ?>

            <div class="user-detail">

                <div class="input-box">
                    <span class="details">Speaker Name</span>
                    <input class="item2" type="text" name="name" value="<?php if ($update) {
                                                                            echo $speaker_name;
                                                                        } ?>">
                </div>

                <div class="input-box">
                    <span class="details">Speaker Title</span>
                    <input class="item2" type="text" name="title" value="<?php if ($update) {
                                                                                echo $speaker_title;
                                                                            } ?>">
                </div>

                <div class="input-box">
                    <span class="details">Speaker Talk</span>
                    <input class="item2" type="text" name="talk" value="<?php if ($update) {
                                                                            echo $speaker_talk;
                                                                        } ?>">
                </div>

                <div class="input-box">
                    <span class="details">Speaker desc</span>
                    <input class="item2" type="text" name="desc" value="<?php if ($update) {
                                                                            echo $speaker_desc;
                                                                        } ?>">
                </div>
                <div class="input-box">
                    <span class="details">Speaker Image</span>
                    <input type="file" accept="image/*" name="image">
                </div>


                <div class="input-box">
                    <span class="details">Events</span>
                    <select name="event" id="" class="form-control">
                        <option value="<?php echo $fetch_speaker['event_id'] ?>"><?php echo $fetch_speaker['event_name'] ?></option>
                        <?php
                        $select_event = "SELECT * FROM `events`EXCEPT SELECT * FROM `events`WHERE`event_id`='$speaker_event'";
                        $runselect = mysqli_query($conn, $select_event);
                        foreach ($runselect as $data) {
                        ?>
                            <option value="<?php echo $data['event_id'] ?>"><?php echo $data['event_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <div class="button">
                <?php if ($update) { ?>
                    <input type="submit" value="update" name="update">
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