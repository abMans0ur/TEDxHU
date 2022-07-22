<?php 
include("/xampp/htdocs/tedx/shared/config.php");

if(!empty($_POST["section_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM `committees` WHERE `committee_section` = " . $_POST['section_id'] . " "; 
    $result = $conn->query($query); 
    
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select commiteee</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['committee_id'].'">'.$row['committee_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 

} 
?>