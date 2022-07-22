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
    header("location:/tedx/adminpanel/committees/committee.php");
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
    <table border="1">
        <tr>
            <td>Committee Name</td>
            <td>Committee Description</td>
            <td>Section Name</td>
            <td>for delete</td>
            <td>for update</td>
        </tr>
<?php foreach($run_select as $data){?>
    <tr>
        <td><?php echo $data['committee_name'] ?></td>
        <td><?php echo $data['committee_description'] ?></td>
        <td><?php echo $data['section_name'] ?></td>
        <td> <a href="/tedx/adminpanel/committees/committee.php?delete=<?php echo $data['committee_id'] ?>" onclick="return confirm('are you sure?')"> delete </a></td>
        <td> <a href="/tedx/adminpanel/committees/addcommittee.php?edit=<?php echo $data['committee_id'] ?>">Update</a></td>
    </tr>
    <?php } ?>
    </table>
</body>
</html>