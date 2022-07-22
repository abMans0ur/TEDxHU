<?php 
include '../config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form action="" method="post">

    <?php 
// Include the database config file 
 
if(!empty($_POST['event_id'])){
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM `speakers` WHERE `speaker_event` = ".$_POST['event_id']." "; 
    $result = $conn->query($query);
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Speaker</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['speaker_id'].'">'.$row['speaker_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 

}else{
    echo '<option value="">NOOOOOOOOOOOOO</option>'; 
}
?>
    </form>
</body>
</html>