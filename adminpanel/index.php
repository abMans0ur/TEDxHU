<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./../upload/hnet.com-image.ico" type="image/x-icon">
    <title>login</title>
</head>
<style>
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html,
body {
  width: 100%;
  min-height: 100vh;
  overflow-x: hidden;
}

body {
  display: flex;
  font-family: "Open Sans", sans-serif;
}


.sign-in {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  flex: 1;
}

h1 {
  font-size: 3.5rem;
  margin-bottom: 30px;
  color: red;
}

form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

input[type="email"],
input[type="password"] {
  padding: 10px;
  font-size: 1.2rem;
  border: none;
  border-bottom: solid 1px #000;
  outline: none;
}

input[type="email"]::placeholder,
input[type="password"]::placeholder {
  letter-spacing: 2px;
  transition: all 0.3s ease;
}

input[type="email"]:hover::placeholder,
input[type="password"]:hover::placeholder {
  color: #000;
}

input[type="submit"] {
  background-color: #000;
  color: #fff;
  padding: 10px;
  font-size: 1.3rem;
  cursor: pointer;
  border: none;
  transition: all 0.3s ease;
  border-radius: 15px;
}

input[type="submit"]:hover {
  background-color: #eee;
  color: #000;
}

a {
  color: #424242;
  text-decoration: none;
  align-self: flex-end;
}

a:hover {
  text-decoration: underline;
}

::selection {
  color: #fff;
  background-color: #000;
}

</style>
<body>
<div class="sign-in">
  <h1>Sign In</h1>
  <form method="POST">
    <input type="email" placeholder="Username"name="email">
    <input type="password" placeholder="Password"name="password">
    <input type="submit" name="log" value="Sign In">
  </form>
  <?php
  include './../shared/config.php' ;
  $error=array();
  if(isset($_POST['log'])){
$email=$conn->real_escape_string($_POST['email']);
if (empty($email)) {
    array_push($error, "E-mail is needed");
  }
$password=$conn->real_escape_string($_POST['password']);
if (empty($password)) {
    array_push($error, "Password is needed");
}
$selectAdmin=mysqli_query($conn,"SELECT * FROM `admin` WHERE `admin_email` = '$email' AND `admin_password`='$password'");
$numAdmin=mysqli_num_rows($selectAdmin);
if(!$numAdmin==1){
    array_push($error, "Mail Or Password is incorrect");   
}
if(empty($error)){
  $admin=mysqli_fetch_array($selectAdmin);
$_SESSION['adminName']=$admin['admin_id'];
    header('location:tickets/tickets.php');
}else{
    foreach($error as $msg){
        echo"<h5>$msg</h5>";
    }
}
}
  ?>
</div>
</body>
</html>