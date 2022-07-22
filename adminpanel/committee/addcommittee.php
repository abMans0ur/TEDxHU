<?php
ob_start();
include("/xampp/htdocs/tedx/shared/config.php");
$select = "SELECT * FROM `sections`";
$run_select = mysqli_query($conn, $select);

//insert
if (isset($_POST['submit'])) {
    $committee_name =$conn->real_escape_string($_POST['committee_name']);
    $committee_section =$conn->real_escape_string( $_POST['committee_section']);
    $committee_description = $conn->real_escape_string($_POST['committee_description']);
    $insert = "INSERT INTO `committees` VALUES(NULL ,'$committee_name', '$committee_section', '$committee_description')";
    $run_insert = mysqli_query($conn, $insert);
    // header("location:committee.php");
}


//update
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select_edit = "SELECT * FROM `committees`join `sections` on`committees`.`committee_section`=`sections`.`section_id` WHERE committee_id = $id";
    $run_edit = mysqli_query($conn, $select_edit);
    $array = mysqli_fetch_array($run_edit);
}




if (isset($_POST['update'])) {
    $id = $_GET['edit'];
    $committee = $_POST['committee_name'];
    $section = $_POST['committee_section'];
    $desc = $_POST['committee_description'];
    $update_query = "UPDATE `committees` SET `committee_name` = '$committee' , `committee_section` = '$section' , `committee_description` = '$desc' WHERE `committee_id` = $id";
    $run_update = mysqli_query($conn, $update_query);
    if ($run_update) {
        // header("location:committee.php");
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
                
            <div class="user-detail">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" id="committee" name="committee_name" value="<?php if ($update) {
                                                                            echo $array['committee_name'];
                                                                        } ?>">
                </div>

              

                <div class="input-box">
                    <span class="details">Select</span>
                    <select name="committee_section" id="section">
            <?php if ($update) { ?>
            <option value="<?php
                                echo $array['committee_section'];
                                ?> "><?php echo $array['section_name'] ?>
            </option>
            <?php } ?>
            <?php foreach ($run_select as $data) { ?>
            <option value="<?php
                                echo $data['section_id'];
                                ?> "><?php echo $data['section_name'] ?>
            </option>
            <?php } ?>

        </select>
                </div>
                <div class="input-box">
                    <span class="details">Description</span>
                    <textarea type="text" id="desc" name="committee_description" value="<?php if ($update) {
                                                                                echo $array['committee_description'];
                                                                            } ?>"></textarea>                                                        
                </div>
            </div>


                <div class="button">
                <?php if ($update) { ?>
                <input type="submit" value="update" name="update">
                <?php
                  } else {
                ?>
               <input type="submit" value="create" name="submit">
                <?php } ?>

                </div>
            </div>

        </form>
</body>

</html>