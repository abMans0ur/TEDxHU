<?php
include('./shared/config.php');
$select = "SELECT * FROM `events`ORDER BY`event_date`DESC";
$runselect = mysqli_query($conn, $select);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./shared/style.css">
    <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap CSS -->
</head>

<body>
    <?php include './shared/navbar.html' ?>

    <section>
        <div class="container-events">
            <div class="section-header">
                <h2>Our Events</h2>
            </div>
            <div class="sub-header">

                <p>
                    Proceeding from our belief in the power of idea, we determined to create a community of ideas aiming
                    to enrich our community minds . Also inspiring and motivating them to cope with and contribute to
                    the age of renaissance that our country live recently.
                </p>

            </div>
            <div class="timeline">
                <ul>

                    <?php foreach ($runselect as $data) { ?>
                    <?php
                        $yearEvent = explode("-", $data['event_date']);
                        ?>
                    <li>
                        <div class="content">
                            <a href="event.php?event=<?php echo encryptIt($data['event_id']); ?>"
                                style="text-decoration: none!important;">
                                <h3 style="text-align: center;"><?php echo $data['event_name']; ?></h3>
                                <img src="./upload/event/<?php echo $data['event_image'] ?>" width="100%" alt="">
                            </a>
                            <p><?php echo $data['event_desc']; ?> </p>
                        </div>
                        <div class="time">
                            <h4 style="text-align: center;"><?php echo $yearEvent[0] ?></h4>
                        </div>

                    </li>
                    <?php } ?>

                    <div style="clear:both;"></div>
                </ul>
            </div>
    </section>

    <?php include './shared/foot.php' ?>

</body>

</html>