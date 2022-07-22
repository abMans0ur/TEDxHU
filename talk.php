<?php 
include("./shared/config.php");
if(isset($_GET['id'])){
    $id=decryptIt($_GET['id']);
    $selectV="SELECT * FROM `speakers` JOIN `events` ON `speakers`.`speaker_event`=`events`.`event_id` WHERE `speaker_id`=$id";
    $runselectV=mysqli_query($conn,$selectV);
    $array=mysqli_fetch_array($runselectV);
}

$select = "SELECT * FROM `speakers` JOIN `events` ON 
`speakers`.`speaker_event` = `events`.`event_id` ORDER BY RAND()";
$run_select = mysqli_query($conn , $select);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./shared/style.css">
    <title>talk</title>
    <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">
   
</head>

<body>
<?php include './shared/navbar.html' ?>

    <section class="main">
        <div class="left">
<?php  if(empty($array['speaker_talk'])||$array['speaker_talk']=="NULL"){echo"<h1>COMING SOON</h1>";}else{ ?>

            <iframe width="100%" height="401" src="<?php echo $array['speaker_talk']; ?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <h1 class="speaker-name"><?php echo $array['speaker_name']; ?> </h1>
            <h4 class="vedio-information"><?php echo $array['speaker_desc']; ?></h4>
            <small class="date"><?php $time=strtotime($array['event_date']); echo date("d-M-Y",$time);  ?></small>
        <?php } ?>
        </div>

        <div class="right">
            <h3>
                See More Videos
            </h3>
            <?php foreach($run_select as  $data){?>
            <a style="display:block;" href="talk.php?id=<?php echo encryptIt($data['speaker_id']); ?>">  
            <div class="h-card">
                <div class="h-left">
                    <img src="/tedx/upload/speaker/<?php echo $data['speaker_image']; ?>" alt="Avatar" style="width:100px;height:100px" >
                </div>
                <div class="h-right">
                    <h1><?php echo $data['speaker_name']; ?> </h1>
                    <h4> <?php echo $data['event_name']; ?></h4>
                    <small><?php $time=strtotime($data['event_date']); echo date("d-M-Y",$time);  ?></small>
            
                </div>
            </div></a>
            <?php } ?>
           
        </div>
    </section>
    <?php include './shared/foot.php' ?>

</body>

</html>