<?php
include("/xampp/htdocs/tedx/shared/config.php");
$select="SELECT * FROM `sections`";
$runselect=mysqli_query($conn, $select);

if(isset($_GET['delete'])){
    $section_id=$_GET['delete'];
    $delete="DELETE FROM `sections` where `section_id`=$section_id";
    $rundelete=mysqli_query($conn, $delete);
    header("location:listsection.php");
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
    <title>Table</title>
</head>
<body>
<?php include '../nav/nav.php';?>
    <table>
        <tr>
            <th colspan="8" style="font-size:x-large;" id="header">Sections<span style="float: right; padding-right:20px;"><a class="add" href="addsection.php">+</a></span></th>
        </tr>

        <tr id="header">
            <th>Name</th>
            <th>Year</th>
            <th>Description</th>
            <th colspan="2">action</th>
        </tr>
        <tbody>
        <?php foreach ( $runselect as $data ) { ?>

<tr>
  <td> <?php echo $data ['section_name']; ?> </td>
  <td> <?php echo $data ['section_year']; ?> </td>
  <td> <?php echo $data ['section_desc']; ?> </td>

  <td>
   
<a href="listsection.php?delete=<?php echo $data['section_id']; ?>"  onclick="return confirm(' Sure To Delete ?! ')">Delete</a>
</td>
<td>
<a href="addsection.php?edit=<?php echo $data['section_id']; ?>" >Update</a>

</td>
</tr>

<?php } ?>
    </table>
    
</body>
</html>
