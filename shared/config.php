<?php
$localhost="localhost";
$username="root";
$password="";
$dbname="tedx";
$conn= mysqli_connect($localhost, $username, $password, $dbname);
session_start();
ob_start();
// encrypt
function encryptIt( $q ) {
    $cryptKey  = "qJB0rGtIn5UB1xG03efyCp";
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( urlencode($qEncoded) );
  }
  // decrypt
  function decryptIt( $q ) {
    $cryptKey  = "qJB0rGtIn5UB1xG03efyCp";
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
  }
?>