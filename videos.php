<?php 
include './shared/config.php';
//SELECT
$select="SELECT * FROM `speakers` JOIN `events` ON `speakers`.`speaker_event`= `events`.`event_id`";
$runselect=mysqli_query($conn,$select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./shared/style.css">
    <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">
    <title>Videos</title>
</head>
<body>
<?php include './shared/navbar.html' ?>

    <section class="cardss">    
       <?php foreach($runselect as $data) { ?>
        <a href="./talk.php?id=<?php echo encryptIt($data['speaker_id']) ?>"style="text-decoration:none;">
        <div class="card-video">
            <img  src="./upload/speaker/<?php echo $data['speaker_image']; ?>" alt="Avatar" height="400px" style="width:100%" >
            <div class="disc">
         <h1  style="color: #000000;" ><?php echo $data['speaker_name']; ?> </h1>
         <h4 style="color: #000000;" ><a href="event.php?event=<?php echo $data['event_id']; ?>"><?php echo $data['event_name']; ?></a></h4>
         <small><?php echo substr($data['speaker_desc'],0,50); ?>...</small>
            </div>
   
          </div>
       </a>
          <?php } ?>
    </section>
    <?php include './shared/foot.php' ?>

</body>
</html>