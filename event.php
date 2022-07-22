<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./shared/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=0, initial-scale=1.0">
    <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">

    <script src="https://kit.fontawesome.com/bfd2cf06bb.js" crossorigin="anonymous"></script>
    <title>Event</title>
</head>

<body>
    
    <?php include './shared/config.php' ?>
    <?php include './shared/navbar.html' ?>


    <!--loction section-->
    <section>
        <?php
        if (isset($_GET['event'])) {
            $eventId = decryptIt($_GET['event']);
            $selectEvent = mysqli_fetch_array(mysqli_query($conn, "SELECT *FROM`events`WHERE`event_id`='$eventId'"));
        } ?>
        <div class="hero-event">
            <div class="theme">
                <h1>THEME: <?php echo $selectEvent['event_name'] ?></h1>
                <br>
                <h3><?php
                    echo date("F d,Y", strtotime($selectEvent['event_date']));
                    // date(,);
                    ?>
                    <!-- </h3>
                <h3>7:00pm - 9:00pm </h3> -->
            </div>
            <div class="location">
                <h1> Event Location:</h1>
                <br>
                <iframe src="<?php echo $selectEvent['event_location']; ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!--speakers section-->
    <section class="speakers-sec">
        <div class="wrapper">
            <div class="heading">
                <h1><span style="color:black">Event</span>
                    <span style="color:var(--red)">Speakers</span>
                </h1>
            </div>
            <div class="speakers-div">
                <?php
                $selectSpeaker = "SELECT * FROM `speakers` WHERE `speaker_event` = '$eventId' ";
                $runSpeaker = mysqli_query($conn, $selectSpeaker);
                if(mysqli_num_rows($runSpeaker)==0){?>
                <h1 align="center">COMING SOON</h1>
                <?php 
                }else{
                foreach ($runSpeaker as $data) { ?>
                    <div class="speaker">
                        <div class="sp-img"> <img src="./upload/speaker/<?php echo $data['speaker_image'] ?>" alt=""> </div>
                        <h3 class="name"><?php echo $data['speaker_name'] ?></h3>
                        <p class="role"><?php echo $data['speaker_title'] ?></p>
                        <p><?php echo substr($data['speaker_desc'],0,200) ?>...</p>
                        <br> <a href="talk.php?id=<?php echo encryptIt($data['speaker_id'])  ?>" class="btn-event">See More</a>
                    </div>
                <?php } } ?>
            </div>

        </div>
    </section>
    <!--End of speakers section-->
    <?php include './shared/foot.php' ?>

</body>

</html>