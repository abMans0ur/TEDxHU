<?php
include("/xampp/htdocs/tedx/shared/config.php");
$select="SELECT * FROM `speakers`JOIN`events`ON`speaker_event`=`event_id`ORDER BY`event_id`ASC";
$runselect=mysqli_query($conn, $select);

if(isset($_GET['delete'])){
    $speaker_id=$_GET['delete'];
    $delete="DELETE FROM `speakers` where `speaker_id`=$speaker_id";
    $rundelete=mysqli_query($conn, $delete);
    header("location:listspeaker.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="table.css">
    <link rel="shortcut icon" href="./../../upload/hnet.com-image.ico" type="image/x-icon">
    <title>Speakers</title>
</head>
<body>
<?php include '../nav/nav.php';?>
    <table>
        <tr>
            <th colspan="8" style="font-size:x-large;" id="header">Speaker<span style="float: right; padding-right:20px;"><a class="add" href="addspeaker.php">+</a></span></th>
        </tr>

        <tr id="header">
        <th>Name</th>
       <th >Title</th>
       <th >Talk</th>
       <th >Event</th>
       <th >Description</th>
       <th>Image</th>
       <th colspan="2">Action</th>
        </tr>
        <tbody>
 
        <?php foreach ( $runselect as $data ) { ?>

<tr>
  <td> <?php echo $data ['speaker_name']; ?> </td>
  <td> <?php echo $data ['speaker_title']; ?> </td>
  <td> <a href="<?php echo $data ['speaker_talk']; ?>"target="_blank">VIDEO</a> </td>
  <td> <?php echo $data ['event_name']; ?> </td>
  <td> <?php echo substr($data ['speaker_desc'],0,300); ?> </td>
  <td> <img width="100" height="100" src="/tedx/upload/speaker/<?php echo $data['speaker_image']; ?>"> </td>

  <td>
<a href="addspeaker.php?edit=<?php echo $data['speaker_id']; ?>" >Update</a>

</td>
  <td>
      <a href="listspeaker.php?delete=<?php echo $data['speaker_id']; ?>"  onclick="return confirm(' Sure To Delete ?! ')">Delete</a>
    </td> 
</tr>

<?php } ?>
    </table>
    
</body>
</html>
