<?php
include("/xampp/htdocs/tedx/shared/config.php");
if (isset($_POST['done'])) {
    $update = false;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $postion = mysqli_real_escape_string($conn, $_POST['postion']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $selectid = "SELECT `highboard_id` FROM `highboard`";
    $runselectid = mysqli_query($conn, $selectid);
    $insert = "INSERT INTO `highboard` VALUES (NULL,'$name', '$section' ,'$postion', '$fileName')";
    $runinsert = mysqli_query($conn, $insert);
    header("location:CURD.php");
}
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $editId = $_GET['edit'];
    $selected = "SELECT * FROM `highboard` join `sections` 
    on `highboard`.`highboard_section`=`sections`.`section_id`

    WHERE `highboard_id`='$editId'";
    $selectedRun = mysqli_query($conn, $selected);
    $selectedArray = mysqli_fetch_array($selectedRun);
}
if (isset($_POST['edit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $postion = mysqli_real_escape_string($conn, $_POST['postion']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $editId = $_GET['edit'];
    $update = "UPDATE `highboard` SET `highboard_name`='$name',`highboard_section`='$section' ,`highboard_image` = '$fileName' , `highboard_position`='$postion' WHERE `highboard_id`=$editId";
    $updateRun = mysqli_query($conn, $update);
    if ($updateRun) {

    header('location:CURD.php');
    }
}

?>
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/381211cd04.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
            <?php  if($update){?>
                    <img src="/tedx/upload/<?php echo$selectedArray['image'] ?>" alt="">
                    <h1>UPDATE</h1>
                    <?php }else{ ?>
                    <h1>INSERT</h1>
                    <?php } ?>
                <div class="box"><input type="text" placeholder="NAME" name="name" value="<?php if ($update) {
                                                                                                echo $selectedArray['highboard_name'];
                                                                                            } ?>" required>

                </div>
                
                <div class="box">
                    <select class="section" name="section">
                        <?php if ($update) { ?>
                            <option value="<?php echo $selectedArray['section_id'] ?>"> 
                                <?php echo $selectedArray['section_name'] ?></option>
                        <?php } ?>
                        <?php $selectSection = "SELECT * FROM `sections`";
                        $runSection = mysqli_query($conn, $selectSection);
                        foreach ($runSection as $data) {
                        ?>
                            <option value="<?php echo $data['section_id'] ?>"><?php echo $data['section_name'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="box">
                    <input type="file" accept="image/*" name="image">
                </div>
                
<div class="box">
                    <select class="position" name="postion">
                        <?php if ($update) { ?>
                            <option value="<?php echo $selectedArray['highboard_id'] ?>">
                                <?php echo $selectedArray['highboard_position'] ?></option>
                        <?php } ?>
                        <?php $selectSection = "SELECT * FROM `highboard`";
                        $runSection = mysqli_query($conn, $selectSection);
                        foreach ($runSection as $data) {
                        ?>
                            <option value="<?php echo $data['highboard_id'] ?>"><?php echo $data['highboard_position'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <?php if ($update) { ?>
                    <div class="btn"><button type="submit" value="update" name="edit">edit </button></div><?php
                                                                                                        } else {
                                                                                                            ?>
                    <div class="btn"><button type="submit" value="create" name="done">done </button></div>

                <?php } ?>





</body>

</html>