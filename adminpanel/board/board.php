<?php
include("/xampp/htdocs/tedx/shared/config.php");

$select = "SELECT * FROM ((`board`
join `committees` 
on `board`.`board_committee`=`committees`.`committee_id`)
join `sections` 
on `board`.`board_section`=`sections`.`section_id`)";
$runselect = mysqli_query($conn, $select);
// if($runselect){
//     echo 'true';
// }else{
//     echo 'false';
// }

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
            <th colspan="8" style="font-size:x-large;" id="header">Board <span style="float: right; padding-right:20px;"><a class="add" href="addboard.php">+</a></span></th>
        </tr>

        <tr id="header">
            <th>Name</th>
            <th>Image</th>
            <th>Position</th>
            <th>section</th>
            <th>committee</th>
            <th colspan="2">action</th>
        </tr>
        <tbody>
        <?php foreach ($runselect as $data) {  ?>
                        <tr>
                           
                            <td><?php echo $data['board_name']; ?></td>
                            <td><img width="100px" height="100px" src="/tedx/upload/<?php echo $data['board_image']; ?>" alt=""></td>
                            <td><?php echo $data['board_position']; ?></td>
                            <td><?php echo $data['section_name']; ?></td>
                            <td><?php echo $data['committee_name']; ?></td>
                            <td><a class="edit" href="addboard.php?edit=<?php echo $data['board_id']; ?>">EDIT</a></td>
                            <td><a class="delete" href="board.php?delete=<?php echo $data['board_id']; ?>">DELETE</a></td>
                        </tr>
                </tbody>
            <?php } ?>
    </table>
    
</body>
</html>
<?php

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `board` WHERE `board_id`='$id'";
    $deleteRun = mysqli_query($conn, $delete);
    if ($deleteRun) {
        echo "deleted";
        header('location:board.php');
    }
}