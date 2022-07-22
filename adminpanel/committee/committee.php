<?php
ob_start();
include("/xampp/htdocs/tedx/shared/config.php");
$select = "SELECT * FROM `committees` 
JOIN `sections` WHERE committees.committee_section = sections.section_id";
$run_select = mysqli_query($conn, $select);

//delete

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM `committees` WHERE committee_id = $id";
    $run_delete = mysqli_query($conn, $delete);
    header("location:/tedx/adminkos/committee/committee.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="table.css">
    <title>Table</title>
</head>
<body>
<?php include '../nav/nav.php';?>
    <table>
        <tr>
            <th colspan="8" style="font-size:x-large;" id="header">Committee<span style="float: right; padding-right:20px;"><a class="add" href="addcommittee.php">+</a></span></th>
        </tr>

        <tr id="header">
            <th>Name</th>
            <th>Description</th>
            <th>section</th>
            <th colspan="2">action</th>
        </tr>
        <tbody>
        
<?php foreach($run_select as $data){?>
    <tr>
        <td><?php echo $data['committee_name'] ?></td>
        <td><?php echo $data['committee_description'] ?></td>
        <td><?php echo $data['section_name'] ?></td>
        <td> <a href="/tedx/adminkos/committee/committee.php?delete=<?php echo $data['committee_id'] ?>" onclick="return confirm('are you sure?')"> delete </a></td>
        <td> <a href="/tedx/adminkos/committee/addcommittee.php?edit=<?php echo $data['committee_id'] ?>">Update</a></td>
    </tr>
    <?php } ?>
    </table>
    
</body>
</html>
