<?php
include("/xampp/htdocs/tedx/shared/config.php");

//insert//
if(isset($_POST['send'])){
    $section_name=$_POST['name'];
    $section_year=$_POST['year'];
    $section_desc=$_POST['desc'];

$insert="INSERT INTO `sections` VALUES (NULL, '$section_name', '$section_year', '$section_desc')";
$runinsert=mysqli_query($conn, $insert);
if($runinsert){
    echo 'true';
}else{
    echo 'false';
}
}

//update///
$update= false;
if(isset($_GET['edit'])){
    $update= true;
    $section_id=$_GET['edit'];
    $select="SELECT * FROM `sections` WHERE `section_id`='$section_id'";
    $runselect=mysqli_query($conn, $select);
    $fetch_section=mysqli_fetch_assoc($runselect);
    $section_name=$fetch_section['section_name'];
    $section_year=$fetch_section['section_year'];
    $section_desc=$fetch_section['section_desc'];

}

if(isset($_POST['update'])){
    $section_id=$_GET['edit'];
    $section_name=$_POST['name'];
    $section_year=$_POST['year'];
    $section_desc=$_POST['desc'];

    $update="UPDATE `sections` SET `section_name`='$section_name', `section_year`='$section_year', `section_desc`='$section_desc' WHERE `section_id`='$section_id'";
$runupdate=mysqli_query($conn, $update);
if($runupdate){
    header("location:listsection.php");
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


    <style>

    </style>
</head>

<body>
   
<?php include '../nav/nav.php';?>



    <div class="container">
        <div class="title">Registration</div>
        <form method="POST">
                
            <div class="user-detail">
                <div class="input-box">
                    <span class="details">Section Name</span>
                    <input class="item2" type="text" name="name" value="<?php if($update){ echo $section_name; } ?>">
                </div>
                <div class="input-box">
                    <span class="details">Section Year</span>
                    <input class="item2" type="text" name="year" value="<?php if($update){ echo $section_year; } ?>">
                </div>
                <div class="input-box">
                    <span class="details">Section Year</span>
                    <input class="item2" type="text" name="desc" value="<?php if($update){ echo $section_desc; } ?>">
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