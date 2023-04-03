<?php $pageTitle = 'create new password'; ?>
<?php include 'includes/templates/header.php'; ?>
<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

  $selector  = $_POST['selector'];
  $validator = $_POST['validator'];
  $password  = $_POST['pwd'];
  $password_repeat = $_POST['pwd_repeat'];
  $currentData = date("U");

  if(empty($password) || empty($password_repeat)){
    $password_error = 'password can not be empty';
  }elseif($password !== $password_repeat){
    $password_error = 'password dose not matched';
  }elseif(strlen($password) > 20){
    $password_error = 'Your password can not be more than 20';
  }

  if(!isset($password_error)){
    $stmt = $db->connect()->prepare("SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires <= ?");
    $stmt->execute(array($selector, $currentData));
    $pwdCount = $stmt->rowCount();
    $pwdData = $stmt->fetch();

    $tokenEmail = $pwdData['pwdResetEmail']; // new variable

    $stmt = $db->connect()->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute(array(md5($password),$tokenEmail));

    $stmt = $db->connect()->prepare("DELETE FROM pwdreset where pwdResetEmail = ?");
    $stmt->execute(array($tokenEmail));

    header('Location: login.php');
    exit();

  }

  /*
   ** make more logic by check if there is count in database or not
   ** make more error message
  */

}
?>

<body>

  <div class="main-body" style="width: 500px; margin: 50px auto auto">
    <div class="container">
      <h3 class="text-center">create new password</h3>
      <div class="form-box">
        <?php
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];
        if(empty($selector) || empty($validator)){
          echo 'we could not validate your request';
        }else{
           ?>
            <form  method="post">
              <?php if(isset($password_error)){ ?>
                <div class="alert alert-danger"><?php echo $password_error; ?></div>
              <?php } ?>
             <input type="hidden" name="selector" value="<?php echo $selector; ?>">
             <input type="hidden" name="validator" value="<?php echo $validator; ?>">
             <div class="form-group">
               <input class="form-control" type="text" name="pwd" placeholder="write your new password">
             </div>
             <div class="form-group">
               <input class="form-control" type="text" name="pwd_repeat" placeholder="repeat your new password">
             </div>
             <input class="btn btn-primary" type="submit" name="rtype-password-submit" value="rtype password">
            </form>
          <?php
        }
        ?>
      </div>
    </div>
  </div>

<?php include 'includes/templates/footer.php'; ?>
