<?php
ob_start();
include("/xampp/htdocs/tedx/shared/config.php");
$select = "SELECT * FROM `sections`";
$run_select = mysqli_query($conn, $select);

//insert
if (isset($_POST['submit'])) {
    $committee_name = $_POST['committee_name'];
    $committee_section = $_POST['committee_section'];
    $committee_description = $_POST['committee_description'];
    $insert = "INSERT INTO `committees` VALUES(NULL ,'$committee_name', '$committee_section', '$committee_description')";
    $run_insert = mysqli_query($conn, $insert);
    header("location:committee.php");
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
        header("location:committee.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="committee"> Committee Name</label>
        <input type="text" id="committee" name="committee_name" value="<?php if ($update) {
                                                                            echo $array['committee_name'];
                                                                        } ?>">
        <label for="desc"> Committee Description</label>
        <input type="text" id="desc" name="committee_description" value="<?php if ($update) {
                                                                                echo $array['committee_description'];
                                                                            } ?>">
        <label for="section"> Section Name</label>
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
        <?php if ($update) { ?>
        <button type="submit" name="update"> update</button>
        <?php } else { ?>
        <button type="submit" name="submit"> Submit</button>
        <?php } ?>
    </form>
</body>

</html>