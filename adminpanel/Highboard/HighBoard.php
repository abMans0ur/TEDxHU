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
    $insert = "INSERT INTO `highboard` VALUES (NULL,'$name', '$section' ,'$postion', '$fileName')";
    $runinsert = mysqli_query($conn, $insert);
    // header("location:CURD.php");
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
    $array_id = $selectedArray['highboard_id'];
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
   
<?php include '../nav/nav.php';?>



    <div class="container">
        <div class="title">Registration</div>
        <form method="POST">
        <?php  if($update){?>
                    <img  src="/tedx/upload/<?php echo$selectedArray['highboard_image'] ?>" alt=".." width= "200px">
                    <h1>UPDATE</h1>
                    <?php }else{ ?>
                    <h1>INSERT</h1>
                    <?php } ?>
            <div class="user-detail">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="NAME" name="name" value="<?php if ($update) {
                                                                                                echo $selectedArray['highboard_name'];
                                                                                            } ?>" required>

                </div>
                <div class="input-box">
                    <span class="details">Image</span>
                    <input type="file" accept="image/*" name="image">
                </div>

              

                <div class="input-box">
                    <span class="details">Select</span>
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

                <div class="input-box">
                    <span class="details">Select</span>
                  <select class="position" name="postion">
<option value="President" <?php if($update){ if($selectedArray['highboard_position'] == "President"){ ?> selected <?php } } ?> >
                                President</option>
                                <option value="curator" <?php if($update){ if($selectedArray['highboard_position'] == "Curator"){ ?> selected <?php } } ?> >
                               Curator</option>
                                <option value="advisor" <?php if($update){if($selectedArray['highboard_position'] == "Advisor"){ ?> selected <?php } }?> >
                                Advisor</option>
                    </select>

                     
                </div>
            </div>


                <div class="button">
                <?php if ($update) { ?>
                <input type="submit" value="update" name="edit">
                <?php
                  } else {
                ?>
               <input type="submit" value="create" name="done">
                <?php } ?>

                </div>
            </div>

        </form>
</body>

</html>