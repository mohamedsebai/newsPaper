<?php $pageTitle = 'edit profile'; ?>
<?php include 'includes/templates/header.php'; ?>
<body>
<?php include 'includes/templates/navbar.php'; ?>
<?php
$userData = $auth->checkDataExists('id',Session::get('userId'))['row'];
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'):

$fullname = $_POST['fullname'];
$email    = $_POST['email'];
$country  = $_POST['country'];
$gender   = $_POST['gender'];

$profile_img = $_FILES['profile_img'];
$profile_img_name     = $profile_img['name'];
$profile_img_tmp_name = $profile_img['tmp_name'];
$profile_img_error    = $profile_img['error'];
$profile_img_size     = $profile_img['size'];

$allowed_extension     = ['jpg', 'png'];
$profile_img_extension = $format->get_file_extension($profile_img_name);

$fullname = $format->validate_data($fullname);
$email    = $format->validate_data($email, FILTER_SANITIZE_EMAIL);
$country  = $format->validate_data($country);
$gender   = $format->validate_data($gender);


if( $profile_img_error == 0 &&  in_array($profile_img_extension, $allowed_extension) && $profile_img_size > 900000 ):
  $img_error = 'this img is very large';
endif;
if( $profile_img_error == 0 && !in_array($profile_img_extension, $allowed_extension)):
  $img_error = 'file you uploaded is not an image';
endif;
// start uploade file if no error
$path = 'admin/assets/images/users_images/';
if( $profile_img_error == 0 &&  in_array($profile_img_extension, $allowed_extension) && $profile_img_size < 900000 ):
 $profile_img_target_file = $format->file_upload($path,$profile_img_name,$profile_img_tmp_name);
endif;
if( $profile_img_error == 4 ):
 $profile_img_target_file = $userData['profile_img'];
endif;

// end uploade file if no error
if(strlen($fullname) > 0 && strlen($fullname) > 20):
  $fullname_error = 'Your fullname can not be more than 20';
endif;
if(empty($fullname)):
  $fullname_error = 'your fullname can not empty';
endif;
if(empty($email)):
  $email_error = 'your email can not empty';
endif;

if($auth->checkDataExists("email", $email)['count'] > 0 && $email !== $userData['email']):
  $email_error = 'this email aleardy exists';
endif;

$created_at = date("F j, Y, g:i a");
$updated_at = date("F j, Y, g:i a");
if(!isset($fullname_error) && !isset($email_error) && !isset($password_error) && !isset($img_error)):
  $stmt = $auth->update_user($fullname, $email, $gender, $country, $profile_img_target_file, $updated_at,$userData['id']);
  if($stmt):
    $success = 'user updated successfully';
  endif;
endif;

endif;
?>
<!-- Start Main Body -->
  <div class="edit-profile">
   <div class="container">
    <div class="row">
      <div class="form-box m-auto" >
        <h2 class="text-center" style="margin: 30px 0;">Edit <?php echo $userData['full_name']; ?> account</h2>

        <?php if(isset($success)): ?>
          <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

         <div class="form-group">
           <input class="form-control" type="text" name="fullname" placeholder="enter fullname"
           value="<?php echo $userData['full_name']; ?>">
           <?php if(isset($fullname_error)): ?>
             <div class="alert alert-danger"><?php echo $fullname_error; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <input class="form-control" type="email" name="email" placeholder="enter email"
           value="<?php echo $userData['email']; ?>">
           <?php if(isset($email_error)): ?>
             <div class="alert alert-danger"><?php echo $email_error; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <select class="form-control" name="gender">
             <option value="male" <?php if( $userData['gender'] === 'male' ){ echo 'selected'; } ?>>male</option>
             <option value="female" <?php if( $userData['gender'] === 'female' ){ echo 'selected'; } ?>>female</option>
           </select>
         </div>

         <div class="form-group">
           <select class="form-control" name="country">
             <option value="egypt" <?php if( $userData['country'] === 'egypt' ){ echo 'selected'; } ?>>Egypt</option>
             <option value="england" <?php if( $userData['country'] === 'england' ){ echo 'selected'; } ?>>England</option>
             <option value="spain" <?php if( $userData['country'] === 'spain' ){ echo 'selected'; } ?>>spain</option>
           </select>
         </div>

         <div class="form-group">
           <input class="form-control" type="file" name="profile_img">
           <?php if(isset($img_error)): ?>
             <div class="alert alert-danger"><?php echo $img_error; ?></div>
           <?php endif; ?>
         </div>

         <input type="submit" class="btn btn-primary" value="update">
        </form>

       </div>
      </div>
    </div>
  </div>
<?php include 'includes/templates/footer.php'; ?>
