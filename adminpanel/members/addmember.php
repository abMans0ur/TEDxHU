<?php 
include("/xampp/htdocs/tedx/shared/config.php");
if(isset($_POST['send'])){
    $member_name=$_POST['name'];
    $member_position=$_POST['position'];
    $member_committee=$_POST['committee'];
    $member_section=$_POST['section'];
    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $dir = "/xampp/htdocs/tedx/upload/";
    $upload = move_uploaded_file($tempName, $dir . $fileName);
    if (empty($upload)) {
        $fileName = "logo.png";
    }
    $insert="INSERT INTO `members` VALUES (NULL, '$member_name', '$member_section' , '$member_committee','$fileName')";
    $runinsert=mysqli_query($conn ,$insert);
    header("location:addmember.php");
        if($runinsert){
            echo "true";

        }   else{
            echo "false";
        }                                  
}
$update= false;
if(isset($_GET['edit'])){
    $update= true;
    $member_id=$_GET['edit']; 
    $select="SELECT * FROM `members` WHERE `member_id`= $member_id";
    $runSelect=mysqli_query($conn , $select);
    $fetch = mysqli_fetch_array( $runSelect);
}

    if (isset($_POST['update'])) {
    $member_id=$_GET['edit']; 
    $member_name=$_POST['name'];
    $member_position=$_POST['position'];
    $member_committee=$_POST['committee'];
    $member_section=$_POST['section'];
    $update = "UPDATE `members` SET `member_name` =' $member_name', 
    `member_committee`=' $member_committee', `member_section`=' $member_section' WHERE `member_id` = '$member_id'";
    $runupdate = mysqli_query($conn, $update);
    if($runupdate){
        echo 'true';
    }else{
        echo 'false';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="Reg.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.sectionid').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxData.php',
                    data: 'section=' + countryID,
                    success: function(html) {
                        $('.committeeid').html(html);
                    }
                });
            }
        });
    });
    </script>


    <style>

    </style>
</head>

<body>
   
<?php include '../nav/nav.php';?>



    <div class="container">
        <div class="title">Registration</div>
        <form method="POST">

        <?php  if($update){?>
                    <img src="/tedx/upload/<?php echo$selectedArray['image'] ?>" alt="">
                    <h1>UPDATE</h1>
                    <?php }else{ ?>
                    <h1>INSERT</h1>
                    <?php } ?>
                
            <div class="user-detail">
                <div class="input-box">
                    <span class="details">Name</span>
                   <input type="text" name="name" value="<?php if($update){ echo $fetch['member_name'];}  ?>">  
                </div>
                <div class="input-box">
                    <span class="details">Image</span>
                    <input type="file" accept="image/*" name="image">
                </div>

              

                <div class="input-box">
                    <span class="details">Select</span>
                    <select class="sectionid" name="section" id=""> 
        <option value="">Select Section</option>    
        <?php 
        $selected="SELECT * FROM `sections`";
        $runselected=mysqli_query($conn, $selected);
        if($runselected){
            echo 'true';
        }else{
            echo 'false';
        }
foreach($runselected as $data){
        ?>
        <option value="<?php echo $data['section_id']; ?>"><?php echo $data['section_name']; ?></option>    
        <?php };?>
</select>

        <select class="committeeId" name="committee" id="">
            <option value="">Select Committee</option>
        </select>                                                    
                </div>
            </div>


                <div class="button">
                <?php if ($update) { ?>
                <input type="submit" value="update" name="update">
                <?php
                  } else {
                ?>
               <input type="submit" value="create" name="send">
                <?php } ?>

                </div>
            </div>

        </form>
</body>

</html>