<?php 
require_once( "./shared/config.php");
//president
$select_president = "SELECT * FROM `highboard`
JOIN `sections`
ON highboard.highboard_section = sections.section_id
WHERE highboard_position = 'president' ";
$run_president = mysqli_query($conn , $select_president);
$fetch = mysqli_fetch_array($run_president);


//curator

$select = "SELECT * FROM `highboard`
JOIN `sections`
ON highboard.highboard_section = sections.section_id
WHERE highboard_position = 'curator' ";
$run_select= mysqli_query($conn , $select);

$select_proj = mysqli_query($conn , "SELECT * FROM `board` JOIN `committees` ON `board`.`board_committee` = `committees`.`committee_id`  WHERE `board_section` = 10");
$select_adv = mysqli_query($conn , "SELECT * FROM `highboard` JOIN `sections`
ON highboard.highboard_section = sections.section_id WHERE `highboard_position`='Advisor'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./shared/style.css" />
    <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">

    <title>Team</title>
  </head>
  <body>
<?php include './shared/navbar.html' ?>

  
    <div class="team-title-holder">
      <p class="team-title">Our Team</p>
    </div>
    <section class="main-team" style="margin-bottom:20px;">
      <div class="board">
        <div class="advisors">
        <?php foreach($run_president as $advisor){?>
          <div class="container" style="background: url('./upload/board/<?php echo $advisor['highboard_image'] ?>'); background-size: cover;
  background-position: center;">
              <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                  <p>
                  <?php echo $advisor['highboard_name'] ;  ?>
                  </p>
                  <hr />
                </div>
                <div class="items price">
                  <p class="new">         
                       <?php echo $advisor['highboard_position'] . "&nbsp"; echo  $advisor['section_name']; ?>
</p>
                </div>
              </div>
          
          </div>
          <?php } ?>
        </div>
        <?php foreach($run_select as $data){?>
          <div class="container" style="background: url('./upload/board/<?php echo $data['highboard_image'] ?>'); background-size: cover;
  background-position: center;">
              <a href="./committee.php?sectionid=<?php echo encryptIt($data['section_id']) ?>" class="link-card">
              <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                  <p>
                  <?php echo $data['highboard_name'] ;  ?>
                  </p>
                  <hr />
                </div>
                <div class="items price">
                  <p class="new">
            <?php echo $data['highboard_position'] . "&nbsp"; echo  $data['section_name']; ?>
                    
                  </p>
                  <small style="display: block; margin-top: 30px"
                    >tap to see more about <?php  echo  $data['section_name']; ?>
                  </small>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

      </div>
      <div class="board">
      <?php foreach($select_adv as $data){?>
          <div class="container" style="background: url('./upload/board/<?php echo $data['highboard_image'] ?>'); background-size: cover;
  background-position: center;">
              <a href="./committee.php?sectionid=<?php echo $data['section_id'] ?>" class="link-card">
              <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                  <p>
                  <?php echo $data['highboard_name'] ;  ?>
                  </p>
                  <hr />
                </div>
                <div class="items price">
                  <p class="new">
            <?php echo $data['highboard_position'] . "&nbsp"; echo  $data['section_name']; ?>
                    
                  </p>
                  <small style="display: block; margin-top: 30px"
                    >tap to see more about <?php  echo  $data['section_name']; ?>
                  </small>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>
          <?php foreach($select_proj as $data){?>
          <div class="container" style="background: url('./upload/board/<?php echo $data['board_image'] ?>'); background-size: cover;
  background-position: center;">
              <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                  <p>
                  <?php echo $data['board_name'] ;  ?>
                  </p>
                  <hr />
                </div>
                <div class="items price">
                  <p class="new">
            <?php echo $data['board_position'] . "&nbsp"; echo  $data['committee_name']; ?>
                    
                  </p>
              
                </div>
              </div>
          </div>
          <?php } ?>
      </div>
    </section>
    <?php include './shared/foot.php' ?>

  </body>
</html>
