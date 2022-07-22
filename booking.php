<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Tickets</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./booking.css" />
  <link rel="stylesheet" href="./shared/style.css" />
  <link rel="shortcut icon" href="./upload/hnet.com-image.ico" type="image/x-icon">
</head>

<body>
  <?php
  require 'shared/config.php'; 
  include './mail.php';
  include './shared/navbar.html' ?>

  <!-- partial:index.partial.html -->
  <div class="reg-card">
    <div class="card-overlay"></div>
    <div class="cardenia">
      <div class="reg-card-description">
        <div class="reg-box">
          <h2 style="font-size: 6vh;">PAYMENT</h2>
          <form method="POST">
            <div class="user-box fname">
              <input type="text" name="Fname" required />
              <label>First Name</label>
            </div>
            <div class="user-box lname">
              <input type="text" name="Lname" required />
              <label>Last Name</label>
            </div>
            <div class="user-box">
              <input type="tel" name="phone" minlength="11" maxlength="11" required />
              <label>Phone Number</label>
            </div>
            <div class="user-box">
              <input type="email" name="mail" required />
              <label>Email</label>
            </div>
            <div class="user-box">
              <input type="text" name="faculty" required />
              <label>Faculty</label>
            </div>
            <div class="user-box">
              <select name="location" id="cars">
                <option value="Vodafone Cash">Vodafone Cash</option>
                <option value="Visa">Visa Card</option>
                <optgroup label="offline">
                  <option value="loc1">loc 1</option>
                  <option value="loc2">loc 2</option>
                  <option value="loc3">loc 3</option>
                  <option value="loc4">loc 4</option>
                </optgroup>
              </select>
              <label for="cars" class="label">Payment Method</label>

            </div>
            <button type="submit" name="buy" class="submit-btn">
              Reserve Your Ticket
            </button>
          </form>
          <?php
          $error = array();
          if (isset($_POST['buy'])) {
            $Fname = $conn->real_escape_string($_POST['Fname']);
            if (empty($Fname)) {
              array_push($error, "First Name is needed");
            }
            $Lname = $conn->real_escape_string($_POST['Lname']);
            if (empty($Lname)) {
              array_push($error, "Last Name is needed");
            }
            $phone = $conn->real_escape_string($_POST['phone']);
            if (empty($phone)) {
              array_push($error, "Phone is needed");
            }
            $eMail = $conn->real_escape_string($_POST['mail']);
            if (empty($eMail)) {
              array_push($error, "Mail is needed");
            }
            $faculty = $conn->real_escape_string($_POST['faculty']);
            if (empty($faculty)) {
              array_push($error, "Faculty is needed");
            }
            $location = $conn->real_escape_string($_POST['location']);
            if (empty($location)) {
              array_push($error, "Location is needed");
            }
            $selectMail = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `payment`WHERE`userMail`='$eMail'"));
            if ($selectMail > 0) {
              array_push($error, "Mail already exists");
            }
            if (!empty($error)) {
              foreach ($error as $msg) {
                echo "<h5>$msg</h5>";
              }
            } else {
              $userName = $Fname . " " . $Lname;
              $date = date("D,d-M h:i A");
              $insertPerson = mysqli_query($conn, "INSERT INTO`payment`VALUES(NULL,'$userName','$phone','$eMail','$faculty','$location','$date','0',NULL)");
              if ($insertPerson) {
                $user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT`userId`FROM `payment` WHERE`userMail`='$eMail' ORDER BY`userId`DESC LIMIT 1"));
                $userId=encryptIt($user['userId']);
                $resetBody="<a href='http://localhost/tedx/home.php?userId=$userId'>CONFIRM</a>";
                $mail->setFrom('tedxhelwanuniversity22@gmail.com','TEDx HelwanUniversity ');
                $mail->addAddress("$eMail");
                $mail->isHTML(true);   
                $mail->Subject = "CONFIRMATION MAIL";
                $mail->Body    = "WELCOME $userName<br>TO CONFIRM RESERVATION PLEASE CLICK HERE<br>$resetBody";
                $mail -> send();
                            } else {
                echo "nooooooooooooooo";
              }
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php include './shared/foot.php' ?>
</body>

</html>