<?php
include("/xampp/htdocs/tedx/shared/config.php");
if (isset($_POST['done'])) {
    $update = false;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $postion = mysqli_real_escape_string($conn, $_POST['postion']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $committee = mysqli_real_escape_string($conn, $_POST['committee']);
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $selectid = "SELECT `board_id` FROM `board`";
    $runselectid = mysqli_query($conn, $selectid);
    $insert = "INSERT INTO `board` VALUES (NULL,'$name','$section','$committee','$postion','$fileName')";
    $runinsert = mysqli_query($conn, $insert);
    if ($runinsert) {
        echo 'added';
        header('refresh:2;url=board.php');
    } else {
        echo ' There was an erorr ';
    }
}
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $editId = $_GET['edit'];
    $selected = "SELECT * FROM `board` join `committees` 
    on `board`.`board_committee`=`committees`.`committee_id`
    join `sections` 
    on `board`.`board_section`=`sections`.`section_id`
    WHERE `board_id`='$editId'";
    $selectedRun = mysqli_query($conn, $selected);
    $selectedArray = mysqli_fetch_array($selectedRun);
}
if (isset($_POST['edit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $postion = mysqli_real_escape_string($conn, $_POST['postion']);
    $section = mysqli_real_escape_string($conn, $_POST['committee']);
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $dir = "/xampp/htdocs//tedx/upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $editId = $_GET['edit'];
    $update = "UPDATE `board` SET `board_name`='$name',`board_committee`='$section', `board_position`='$postion' , `board_image`='$fileName' WHERE `board_id`=$editId";
    $updateRun = mysqli_query($conn, $update);
    if ($updateRun) {

        header("location:board.php");
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
    <script>
    $(document).ready(function() {
        $('.sectionid').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxData.php',
                    data: 'section=' + countryID,
                    success: function(html) {
                        $('.committeeid').html(html);
                    }
                });
            }
        });
    });
    </script>


    <style>

    </style>
</head>

<body>
   
<?php include '../nav/nav.php';?>



    <div class="container">
        <div class="title">Registration</div>
        <form method="POST" enctype="multipart/form-data">
            
        
        <?php if ($update) { ?>
                <img src="/tedx/upload/<?php echo $selectedArray['board_image'] ?>" width="100px" height="100px" alt="">
                <h1>UPDATE</h1>
                <?php } else { ?>
                <h1>INSERT</h1>
                <?php } ?>
                
                
            <div class="user-detail">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="NAME" name="name" value="<?php if ($update) {
                                                                                                echo $selectedArray['board_name'];
                                                                                            } ?>" required>
                </div>

                <div class="input-box">
                    <span class="details">Upload Image</span>
                    <input type="file" accept="image/*" name="image">
                </div>

                <div class="input-box">
                    <span class="details">Select</span>
                    <select class="sectionid" name="section" id="">
                        <option value="">hi</option>
                        <?php
                        $selected = "SELECT * FROM `sections` ";
                        $runselected = mysqli_query($conn, $selected);
                        if ($runselected) {
                            echo 'true';
                        } else {
                            echo 'false';
                        }
                        foreach ($runselected as $data) {
                        ?>
                        <option value="<?php echo $data['section_id']; ?>"><?php echo $data['section_name']; ?></option>
                        <?php }; ?>
                    </select>
                    <select class="committeeId" name="committee" id="" class="details">
                        <option value="">Select Committee</option>
                    </select>
                </div>
                <select name="postion" id="" class="details">
                    <option value="Head" <?php if ($update) {
                                                if ($selectedArray['board_position'] == "Head") { ?> Selected <?php }
                                                                                                                } ?>>
                        Head</option>
                    <option value="Vice" <?php if ($update) {
                                                if ($selectedArray['board_position'] == "Vice") { ?> Selected <?php }
                                                                                                                } ?>>
                        Vice</option>
                    <option value="Team Leader" <?php if ($update) {
                                                    if ($selectedArray['board_position'] == "Team Leader") { ?>
                        Selected
                        <?php }
                                                                                                                                } ?>>
                        Team Leader</option>
                </select>
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