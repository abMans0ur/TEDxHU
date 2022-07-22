<?php
require_once( "./shared/config.php");
if(isset($_GET['sectionid'])){
  
$section_id = decryptIt($_GET['sectionid']);
$select_committee = "SELECT * FROM `committees` WHERE committee_section = $section_id ";
$run_committee  = mysqli_query($conn , $select_committee);
$fetch = mysqli_fetch_array($run_committee);

$select_board = "SELECT * FROM `board` WHERE board_section = $section_id";
$run_board = mysqli_query($conn , $select_board);
$select_section = "SELECT * FROM `sections` WHERE `section_id` = $section_id";
$run_select_section = mysqli_query($conn , $select_section);
$fetch_section = mysqli_fetch_array($run_select_section);
}
//board we committee
if(isset($_GET['id'])){
    $committee_id = decryptIt($_GET['id']);
    $select_board_committee = "SELECT * FROM `board` WHERE board.board_committee = $committee_id";
    $run_board_committee = mysqli_query($conn , $select_board_committee);
    $select_members = "SELECT * FROM `members` 
    JOIN `committees` 
    ON members.member_committee = committees.committee_id 
    WHERE committee_id = $committee_id";
    $run_select_member = mysqli_query($conn ,$select_members);
$committee_fetch = mysqli_fetch_array($run_select_member);

}
?>
<style>
    .slider {
  max-width: 1200px;
  margin: 0 auto;
}

.swiper-container {
  padding-bottom: 20px;
}

.swiper-wrapper img {
  width: 100%;
  object-fit: cover;
}
.swiper-slider{
  position: relative;
  overflow:hidden;

  
}
.text-slider{
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: 100;
    color: #d6d6d6;
    background: rgba(255, 0, 0, 0.8);
    margin: 0%;
    padding:1rem 1rem ;
    text-align: right;
  font-size:16px;
   width:100%;
  }
  .upper{
    height:50vh;
  }

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./shared/style.css" />
    <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css"
    />

    <title><?php echo $fetch_section['section_name'] ?></title>
</head>
<body>
<?php include './shared/navbar.html' ?>

<div class="team-title-holder">
      <p class="team-title"><?php if(isset($_GET['sectionid']) && isset($_GET['id'])){ echo $committee_fetch['committee_name']." "."Team"; } elseif (isset($_GET['sectionid'])){ echo $fetch_section['section_name']." "."Section"; } ?></p>
    </div>
    <div class="titles">
      
        <p class="desc">
        <?php if(isset($_GET['sectionid']) && isset($_GET['id'])){ echo $committee_fetch['committee_description']; } elseif (isset($_GET['sectionid'])){ echo $fetch_section['section_name']." "."Section"; } ?>
        </p>
    </div>
    <div style="margin: 0 auto; display:flex; justify-content: center; gap:20px;">
    <?php foreach($run_committee as $data){?>
        <a class="button-committee" href="committee.php?sectionid=<?php echo encryptIt($section_id) ?>&id=<?php echo encryptIt($data['committee_id']) ?>"  role="button"><?php echo $data['committee_name'] ; } ?></a>

</div>
</section>
<?php if(isset($_GET['id'])){ ?>
<section class="board-section">
  <?php foreach($run_board_committee as $committee){ ?>
    <div class="container" style="background: url('./upload/board/<?php echo $committee['board_image'] ?>'); background-size: cover;
  background-position: center;">
              <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                  <p>
                  <?php echo $committee['board_name'] ?>
                  </p>
                  <hr />
                </div>
                <div class="items price">
                  <p class="new">         
                  <h3><?php echo $committee['board_position'] . "&nbsp"; echo $committee_fetch['committee_name']  ?></h3>
</p>
                </div>
              </div>
          
          </div>
<?php } ?>

</section>  
<section class="upper">

<div class="slider">
      <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php foreach($run_select_member as $member){?>  
          <div class="swiper-slide">
         <div style="background:url('./upload/<?php echo $member['member_image'] ?>'); background-repeat:no-repeat;background-position:center;width:100%; height:50vh;background-size:cover;">
      
              </div>
            <h1 class="text-slider">
            <?php echo $member['member_name'] ?>
            </h1>
          </div>
           
<?php } ?>
        

         
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
</section>  
<?php } else { ?>
<section class="board-section">
<?php
$select_board = "SELECT * FROM `board` WHERE board_section = $section_id";
$run_board = mysqli_query($conn , $select_board);


foreach($run_board as $committee){ ?>
    <div class="container" style="background: url('./upload/board/<?php echo $committee['board_image'] ?>'); background-size: cover;
  background-position: center;">
              <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                  <p>
                  <?php echo $committee['board_name'] ?>
                  </p>
                  <hr />
                </div>
                <div class="items price">
                  <p class="new">         
                  <h3><?php echo $committee['board_position'] ?></h3>
</p>
                </div>
              </div>
          
          </div>
<?php } ?>
</section> 
<?php } ?> 


<?php include './shared/foot.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
    <script>
      var $swiperSelector = $(".swiper-container");

      $swiperSelector.each(function (index) {
        var $this = $(this);
        $this.addClass("swiper-slider-" + index);

        var dragSize = $this.data("drag-size") ? $this.data("drag-size") : 50;
        var freeMode = $this.data("free-mode") ? $this.data("free-mode") : true;
        var loop = $this.data("loop") ? $this.data("loop") : true;
        var slidesDesktop = $this.data("slides-desktop")
          ? $this.data("slides-desktop")
          : 4;
        var slidesTablet = $this.data("slides-tablet")
          ? $this.data("slides-tablet")
          : 3;
        var slidesMobile = $this.data("slides-mobile")
          ? $this.data("slides-mobile")
          : 2.5;
        var spaceBetween = $this.data("space-between")
          ? $this.data("space-between")
          : 20;
        var watchOverflow = $this.data("watch-overflow")
          ? $this.data("watch-overflow")
          : true;

        var swiper = new Swiper(".swiper-slider-" + index, {
          direction: "horizontal",
          loop: loop,
          freeMode: freeMode,
          watchOverflow: watchOverflow,
          spaceBetween: spaceBetween,
          breakpoints: {
            1920: {
              slidesPerView: slidesDesktop,
            },
            992: {
              slidesPerView: slidesTablet,
            },
            480: {
              slidesPerView: slidesMobile,
            },
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        
        });
      });
    </script>
</body>
</html>