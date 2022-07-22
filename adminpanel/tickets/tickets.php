<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="shortcut icon" href="./../../upload/hnet.com-image.ico" type="image/x-icon">
    <link rel="stylesheet" href="../board/normalize.css">
    <link rel="stylesheet" href="../board/table.css">
</head>
<body>
    <?php 
    include './../../shared/config.php';
    include '../nav/nav.php';
    echo$_SESSION['adminName'];
    if(isset($_GET['app'])){
        $ticketId=$_GET['app'];
        $updateTickect=mysqli_query($conn,"UPDATE`payment`SET`approved`='2' WHERE`userId`='$ticketId'");
        header('location:tickets.php');
    }
    if(isset($_GET['del'])){
        $ticketId=$_GET['del'];
        $delTickect=mysqli_multi_query($conn,"INSERT INTO`deleted`SELECT * FROM `payment` WHERE`userId`='$ticketId'; DELETE FROM`payment`WHERE`userId`='$ticketId'");
        header('location:tickets.php');
        ob_end_flush();
    }
    
    
    
    
    
    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Mail</th>
                <th>Faculty</th>
                <th>Area</th>
                <th>Time</th>
                <th>Approved</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $selectPerson=mysqli_query($conn,"SELECT * FROM `payment` ORDER BY `approved`ASC , `time` ASC "); 
            foreach($selectPerson as $data){
                ?>
                <tr>
                <td><?php echo$data['userName'] ?></td>
                <td><a href="tel:+2<?php echo$data['userPhone'] ?>"><?php echo$data['userPhone'] ?></a></td>
                <td><a href="mailto:<?php echo$data['userMail'] ?>"><?php echo$data['userMail'] ?></a></td>
                <td><?php echo$data['userFac'] ?></td>
                <td><?php echo$data['method'] ?></td>
                <td><?php echo$data['time'] ?></td>
                <td><?php  if($data['approved']==0){echo"NOT ACTIVATED";}elseif($data['approved']==1){echo"Pending";}else{echo"Done";} ?></td>
                <td><a href="tickets.php?app=<?php echo$data['userId'] ?>">CALLED</a></td>
                <td><a href="tickets.php?del=<?php echo$data['userId'] ?>">DELETE</a></td>
            </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>