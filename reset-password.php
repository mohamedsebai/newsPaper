<?php $pageTitle = 'rest-password.php'; ?>
<?php include 'includes/templates/header.php'; ?>

<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

 $userEmail = $_POST['email'];
 $selector = bin2hex(random_bytes(8));
 $token    = random_bytes(32);
 $url = "http://localhost/oop_newspaper/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
 $expires = date("U") . 1800; // the end time of your message; date("u") get current date

 // delete data if exists
 $stmt = $db->connect()->prepare("DELETE FROM pwdreset where pwdResetEmail = ?");
 $stmt->execute(array($userEmail));

 // insert new data
 $hashedToken = password_hash($token, PASSWORD_DEFAULT);
 $stmt = $db->connect()->prepare("INSERT INTO pwdreset
        (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?)");
 $stmt->execute(array($userEmail, $selector, $hashedToken, $expires));


 $to = $userEmail;
 $subject = 'rest password from your account';
 $message = "reset link" . "<a herf='".$url."'>".$url."</a>";

 $headers = "From: <mohamedseabeai@gmail.com>" . '</br>';
 $headers .= "Reply-To: mohamedseabeai@gmail.com" . '</br>';
 $headers .= "Content-type: text/html";
 mail( $to, $subject, $message, $header );

 header('Location: reset-password.php?reset=success');
 exit();

}
?>
<body>

  <div class="main-body" style="width: 500px; margin: 50px auto auto">
    <div class="container">
      <h3 class="text-center">reset your password</h3>
      <p class="text-center">An e-mail will send to you with instruction on how to reset your password.</p>
        <div class="form-box">
          <form method="post">
            <?php
            if(isset($_GET['reset']) && !empty($_GET['reset']) && $_GET['reset'] === 'success'):
              echo '<span style="color: green">we send an e-mail to your email address check it</span>';
            endif;
            ?>
            <div class="form-group">
              <input class="form-control" type="text" name="email" placeholder="enter yor e-mail adderss...">
            </div>
            <button type="submit" name="reset-request-submit" class="btn btn-primary">recive new password by mail</button>
          </form>
        </div>

    </div>
  </div>

<?php include 'includes/templates/footer.php'; ?>
