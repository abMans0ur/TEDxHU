<?php 
include("/xampp/htdocs/tedx/shared/config.php");
$update = "false";
if(isset($_GET['edit'])){
    $update="true";
    $id=$_GET['edit'];
    $selectU="SELECT * FROM `events` WHERE `event_id` = $id";
    $runselectU=mysqli_query($conn , $selectU);
    $data=mysqli_fetch_array($runselectU);

    if(isset($_POST['updates'])){
        $event_names=$_POST['name'];
        $event_descs=$_POST['desc'];
        $event_dates=$_POST['date'];
        $event_locations=$_POST['location'];
        $update="UPDATE `events` SET `event_name`='$event_names',`event_desc`='$event_descs',`event_date`='$event_dates',`event_location`='$event_locations' WHERE `event_id`= $id";
        $runupdate= mysqli_query($conn, $update);
        header("location: ./list.php");
    }

}
if(isset($_POST['send'])){
    $event_name=$_POST['name'];
    $event_desc=$_POST['desc'];
    $event_date=$_POST['date'];
    $event_location=$_POST['location'];
    $fileName = $_FILES['img']['name'];
    $tempName = $_FILES['img']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $insert="INSERT INTO `events` VALUES (NULL,'$event_name', '$event_desc', '$event_date' , '$event_location', '$fileName')";
    $runinsert=mysqli_query($conn,$insert);
    if($runinsert){
        echo "true";
    }else{
        echo "false";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add events</title>
    
</head>
<body>
    <div>

        <form method="POST" enctype="multipart/form-data">
        <?php  if($update){ ?>
                    <img src="<?php echo $event_image['event_image'] ?>" alt="">
                    <h1>UPDATE</h1>
                    <?php }else{ ?>
                    <h1>INSERT</h1>
                    <?php } ?>
            <label for="">Name</label>
            <input type="text" placeholder="enter event name" required name="name" value="<?php if(isset($_GET['edit'])){echo $data['event_name'];} ?>">
            <div class="box">
                    <input type="file" accept="image/*" name="img">
                </div>
            
                
            <label for="">Description</label>
            <input type="text" placeholder="..." required name="desc" value="<?php if(isset($_GET['edit'])){echo $data['event_desc'];} ?>">
            <label for="">Date</label>
            <input type="date" required name="date" value="<?php if(isset($_GET['edit'])){echo $data['event_date'];} ?>">
            <label for="">Location</label>
            <input type="text" placeholder="enter event location" required name="location" value="<?php if(isset($_GET['edit'])){echo $data['event_location'];} ?>">
            <?php 
            if(isset($_GET['edit'])){
            ?>
            <button type="submit" name="updates">
                update
            </button>
            <?php }else{ ?>
            <button type="submit" name="send">
                Submit
            </button>
            <?php  } ?>
            
        </form>
    </div>
</body>
</html>