<?php $pageTitle = 'login'; ?>
<?php include 'includes/templates/header.php'; ?>
<?php
if(Session::check('userId') === true):
  $format->redirect("index.php");
endif;
?>
<?php
if( $_SERVER['REQUEST_METHOD'] === 'POST' ): // start chec

$email    = $_POST['email'];
$password = $_POST['password'];
$count    = $auth->checkIfUserExists($email, $password)['count'];

if( $count > 0 ):

$userId = $auth->checkIfUserExists($email, $password)['row']['id'];
$userFullname = $auth->checkIfUserExists($email, $password)['row']['full_name'];
$userEmail = $auth->checkIfUserExists($email, $password)['row']['email'];
$userStatus = $auth->checkIfUserExists($email, $password)['row']['status'];
$userPassword = $password;

if( $userStatus == 0 ):
  $userStatusError = 'your account not confirmed yet';
endif;

if(!isset($userStatusError)): // start $userStatusError
  if($_POST['remember_me']):
  setcookie('email_cookie', $userEmail, time() + 60);
  setcookie('password_cookie', $userPassword, time() + 60);
  else:
  setcookie('email_cookie', $userEmail, 60);
  setcookie('password_cookie', $userPassword, 60);
  endif;

  Session::set('userId', $userId);
  Session::set('userFullname', $userFullname);

  $format->redirect('index.php');
endif; // end $userStatusError

endif;

if( $count == 0 ):
  $error = 'email or password is wrong';
endif;

endif; // end check request method
?>
<body class="member-page-body">
<div class="overlay"></div>
<div class="member-page">
  <div class="container">
   <div class="row">
     <div class="form-box m-auto">
       <h2 class="text-center">Welcome back!</h2>

       <?php if(isset($userStatusError)): ?>
         <div class="alert alert-danger"><?php echo $userStatusError; ?></div>
       <?php endif; ?>

       <?php if(isset($error)): ?>
         <div class="alert alert-danger"><?php echo $error; ?></div>
       <?php endif; ?>

       <?php
        $checked = '';
        $email_cookie = '';
        $password_cookie = '';
       if(isset($_COOKIE['email_cookie']) && isset($_COOKIE['password_cookie'])):
        $checked = 'checked';
        $email_cookie    = $_COOKIE['email_cookie'];
        $password_cookie = $_COOKIE['password_cookie'];

       endif;
       ?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Email"
          value="<?php echo $email_cookie; ?>">
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password"
          value="<?php echo $password_cookie; ?>">
        </div>

        <div class="form-group">
          <input type="checkbox" name="remember_me" id="remember_me"
          <?php echo $checked; ?>><label for="remember_me">remember me</label>
        </div>

        <div class="form-group">
          <a class="pwd-link" href="reset-password.php">forgot your password?</a>
        </div>



        <input class="btn btn-primary d-block m-auto" type="submit" name="login" value="Send">
       </form>
    </div>
   </div>
  </div>
</div>

<?php include 'includes/templates/footer.php'; ?>
