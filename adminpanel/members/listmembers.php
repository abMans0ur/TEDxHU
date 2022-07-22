<!-- get the data from users -->
<?php 
include("/xampp/htdocs/tedx/shared/config.php");
    $select="SELECT * FROM ((`members`
    join `committees` ON `members`.`member_committee`=`committees`.`committee_id`)
    join `sections` ON `members`.`member_section`=`sections`.`section_id`)";
    $runselect= mysqli_query($conn, $select);


    if(isset($_GET['delete'])){
        $member_id=$_GET['delete'];
        $delete="DELETE FROM `member` WHERE `member_id`=$member_id";
        $rundelete=mysqli_query($conn , $delete);
        header("location:listmembers.php");
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
            <th colspan="8" style="font-size:x-large;" id="header">Members<span style="float: right; padding-right:20px;"><a class="add" href="addmember.php">+</a></span></th>
        </tr>

        <tr id="header">
                <th>NAME</th>
                <th>Position</th>
                <th>section</th>
                <th>Committe</th>
            <th colspan="2">action</th>
        </tr>
        <tbody>
        <?php foreach ($runselect as $data) { ?>
                <tr>
                    <td><?php echo $data['member_name']; ?></td>
                    <td><img src="/tedx/upload/<?php echo $data['member_image']; ?>" alt=""></td>
                    <td><?php echo $data['section_name']; ?></td>
                    <td><?php echo $data['committee_name']; ?></td>


                    <td><a href="addmember.php?edit=<?php echo $data['member_id']; ?>">EDIT</a></td>
                    <td><a href="listmembers.php?delete=<?php echo $data['member_id']; ?>" onclick="return confirm ('Sure To Delete ?')">DELETE</a></td>

                </tr>
            <?php } ?>
    </table>
    
</body>
</html>
