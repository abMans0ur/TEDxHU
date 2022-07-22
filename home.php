<?php 
include "./shared/config.php";
if(isset($_GET['userId'])){
$userId=decryptIt($_GET['userId']);
$confirm=mysqli_query($conn,"UPDATE`payment`SET`approved`='1' WHERE`userId`='$userId'");
header('location:home.php');
}
$select_speakers = "SELECT * FROM `speakers` WHERE `speaker_event`= '4' ORDER BY RAND() LIMIT 4";
$run_speaker = mysqli_query($conn , $select_speakers);
$select_event = "SELECT * FROM `events`";
$run_event = mysqli_query($conn , $select_event);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">

    <!-- <<----------------------CSS------------------>
    <link rel="stylesheet" href="./shared/style.css">
    <!-- ---------------CDN font--------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css"
        integrity="sha512-f2MWjotY+JCWDlE0+QAshlykvZUtIm35A6RHwfYZPdxKgLJpL8B+VVxjpHJwZDsZaWdyHVhlIHoblFYGkmrbhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<?php include './shared/navbar.html' ?>


<body>
    <!-- <-----------------------Header------------------->
    <div class="header">
        <div class="header-container">
            <div class="row">
                <div class="col-2">
                    <div class="col-2-title">
                        <h1 id="H1-Title">idea <br> worth <br> spreading</h1><br>
                        <p>checkout the amazing <span id="tedx-title">TEDx</span> Helwan talks </p>
                    </div>
                    <div class="btns">

                        <div class="ion-icon">
                            <ion-icon size="large" name="play-circle"></ion-icon>
                        </div>
                        <div class="btnhome first"> <a href="talk.php?id=<?php echo encryptIt(rand(6,37)) ?>" class="">See Video</a>
                        </div>
                        <div class="btnhome second"> <a href="videos.php" class="">See All Speackers </a>
                        </div>
                    </div>

                </div>
                <div class="col-2">

                </div>

            </div>
        </div>
    </div>
<div class="timer">
<div id="timer">
    OUR EVENT STARTS IN
</div>
<div id="countdown">
  <div class="counter" count="days"><span b="--"></span><b>Days</b></div>
  <div class="counter" count="hours"><span b="--"></span><b>Hrs</b></div>
  <div class="counter" count="minutes"><span b="--"></span><b>Min</b></div>
  <div class="counter" count="seconds"><span b="--"></span><b>Sec</b></div>
</div>
</div>
    <section class="Speaker">
        <h1 id="H-Title">last Season Speakers</h1>
        <div class="Speaker-row" id="row" >
            <?php foreach($run_speaker as $speaker){?>
            <div class="col-4"
                style="background:url(/tedx/upload/speaker/<?php echo $speaker['speaker_image']; ?>); background-position: center; background-size: cover; height:300px; ">
                <div class="spealer-img">

                </div>
                <div class="title">
                    <h5><?php echo $speaker['speaker_name'] ; ?></h5>
                    <p><?php echo $speaker['speaker_title'] ; ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <div class="events-container">
        <div class="events-sub-container">
            <div class="row">

                <div class="event-col-2 event-img">

                    <div class="event-content">
                        <div class="detailss">
                            <h1> Eternity</h1>
                            <div class="date-of-event">
                                <p style="font-size:12px;"> 23 July 2022 Upcoming</p>
                            </div> 
                            <br>
                            <h3><span class="tedx-title">TEDx</span> Helwan University</h3>
                            <p>#ETERNITY_TEDxHelwanUniversity</p>
                            <a href="event.php?event=<?php echo encryptIt(1) ?>" id="more-info">More Info</a>
                        </div>


                    </div>
                </div>
                <div class="event-col-2 past-detail">
                    <div class="event-title">
                        <h1>Past Event</h1>
                        </div>
                        <?php foreach($run_event as $event){ ?>
                        <div class="event-old">
                        <h4><?php echo $event['event_name'] ?></h4>
                            <p><?php echo $event['event_date'] ?></p>
                    </div>
<?php } ?>
                </div>

            </div>
        </div>
    </div>
<script>
    const gc = s => document.querySelector('#countdown [count="' + s + '"] span');

let d = new Date('2022-07-23T10:00:00') - new Date();

const mainCalc = (s, t, c) => {
  gc(s).classList.remove('ping');
  const m = t % c;
  const e = a => gc(s)[a + 'Attribute'].bind(gc(s));
  e('set')('b', m < 10 ? '0' + m : m);
  setTimeout(() => gc(s).classList.add('ping'), 10);
  return m;
};

const count = (b = 0) => (d -= 1000) && count.seconds(d, b);
const opti = (v, n) => (v - v % n) / n;

count.seconds = (t, i = !1) => {
  t = opti(t, 1000);
  i && count.minutes(t, i);
  if (mainCalc('seconds', t, 60) == 59) count.minutes(t, i);
};
count.minutes = (t, i = !1) => {
  t = opti(t, 60);
  i && count.hours(t, i);
  if (mainCalc('minutes', t, 60) == 59) count.hours(t, i);
};
count.hours = (t, i = !1) => {
  t = opti(t, 60) - 1;
  i && count.days(t);
  if (mainCalc('hours', t, 24) == 23) count.days(t);
};
count.days = t => {
  t = opti(t, 24);
  gc('days').setAttribute('b', t < 10 ? '0' + t : t);
  setTimeout(() => gc('days').classList.add('ping'), 10);
};

setTimeout(() => {
  count(true);
  setInterval(count, 1000);
}, d % 1000);
</script>
<?php include './shared/foot.php' ?>

</body>

</html>