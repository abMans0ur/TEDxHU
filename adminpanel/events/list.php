<?php
include("/xampp/htdocs/tedx/shared/config.php");

$select="SELECT * FROM `events` ";
$runselect=mysqli_query($conn , $select);
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$delete = "DELETE FROM `events` WHERE `event_id` =$id";
$rundelete = mysqli_query($conn, $delete);
header("location:list.php");
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
    <title>EVENTS</title>
</head>
<body>
<?php include '../nav/nav.php';?>
    <table>
        <tr>
            <th colspan="8" style="font-size:x-large;" id="header">Events <span style="float: right; padding-right:20px;"><a class="add" href="addevent.php">+</a></span></th>
        </tr>

        <tr id="header">
            <th>Name</th>
            <th>Descriotion</th>
            <th>Date</th>
            <th>Location</th>
            <th>Image</th>
            <th colspan="2">action</th>
        </tr>
        <tbody>
        <?php foreach ($runselect as $data){ ?>
          <tr>
            <td><?php echo $data['event_name'];?></td>
            <td><?php echo substr($data['event_desc'],0,300);?>.....</td>
            <td><?php $time=strtotime($data['event_date']); echo date("d,M,Y",$time)?></td>
            <td><iframe src="<?php echo $data['event_location'];?>" title="LOCATION"></iframe></td>
            <td> <img width="150" height="100" src="./../../upload/event/<?php echo $data['event_image']; ?>"> </td>

            <td><a href="list.php?delete=<?php echo $data['event_id'];?>">DELETE</a></td>
            <td><a href="addevent.php?edit=<?php echo $data['event_id'];?>">UPDATE</a></td>
          </tr>
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