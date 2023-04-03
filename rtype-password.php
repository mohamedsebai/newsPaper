<?php

if(isset($_POST['rtype-password-submit'])){

  $selector  = $_POST['selector'];
  $validator = $_POST['validator'];
  $password  = $_POST['pwd'];
  $password_repeat = $_POST['pwd_repeat'];

  if(empty($password) || empty($password_repeat)){
    echo 'password can not be empty';
    exit();
  }elseif($password !== $password_repeat){
    echo 'password dose not matched';
    exit();
  }

  $currentData = date("U");
  include 'includes/init.php'; // $db

  // query to get email by get['selector'];
  $stmt = $db->connect()->prepare("SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires <= ?");
  $stmt->execute(array($selector, $currentData));
  $pwdCount = $stmt->rowCount();
  $pwdData = $stmt->fetch();

  $tokenEmail = $pwdData['pwdResetEmail']; // new variable


  $stmt = $db->connect()->prepare("UPDATE users SET password = ? WHERE email = ?");
  $stmt->execute(array(md5($password),$tokenEmail));

  $stmt = $db->connect()->prepare("DELETE FROM pwdreset where pwdResetEmail = ?");
  $stmt->execute(array($tokenEmail));

  /*
   ** make more logic by check if there is count in database or not
   ** make more error message
  */

}else{
  header('Location: login.php');
  exit();
}
