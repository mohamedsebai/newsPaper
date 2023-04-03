<?php $pageTitle = 'change password'; ?>
<?php include 'includes/templates/header.php'; ?>
<body>
<?php include 'includes/templates/navbar.php'; ?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'):

  $old_password          = md5($_POST['old_password']);
  $new_password          = $_POST['new_password'];
  $repeat_new_password   = $_POST['repeat_new_password'];
  $database_old_password = $auth->checkDataExists('id',Session::get('userId'))['row']['password'];

  if($old_password !== $database_old_password):
    $password_error = 'wrong old password';
  endif;

  if($old_password === $database_old_password):
      if(strlen($new_password) > 0 && strlen($new_password) > 20):
        $password_error = 'Your new password can not be more than 20';
      endif;
      if(empty($new_password)):
        $password_error = 'your new password can not empty';
      endif;
      if($new_password !== $repeat_new_password):
        $password_error = 'new password dose not matched';
      endif;
  endif;

  if(!isset($password_error)):
    $stmt = $auth->changeUserPassword( md5($new_password), Session::get('userId'));
    if($stmt):
      $success = 'password changed successfully';
    endif;
  endif;

endif;
?>
<!-- Start Main Body -->
  <div class="change-pass">
   <div class="container">
    <div class="row">
      <div class="form-box m-auto">
        <h2 class="text-center" style="margin: 30px 0;">Change Password</h2>

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

         <?php if(isset($password_error)): ?>
           <div class="alert alert-danger"><?php echo $password_error; ?></div>
         <?php endif; ?>

         <?php if(isset($success)): ?>
           <div class="alert alert-success"><?php echo $success; ?></div>
         <?php endif; ?>

         <div class="form-group">
           <input class="form-control" type="password" name="old_password" placeholder="Old Password">
         </div>

         <div class="form-group">
           <input class="form-control" type="password" name="new_password" placeholder="New Password">
         </div>

         <div class="form-group">
           <input class="form-control" type="password" name="repeat_new_password" placeholder="Repeat New Password">
         </div>

         <input class="btn btn-primary"type="submit" value="change password">

        </form>

       </div>
      </div>
    </div>
  </div>
<!-- End Main Body -->
<?php include 'includes/templates/footer.php'; ?>
