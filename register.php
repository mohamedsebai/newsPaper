<?php $pageTitle = 'register'; ?>
<?php include 'includes/templates/header.php'; ?>
  <!-- start navigation -->

  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'):

  $fullname = $_POST['fullname'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
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
   $profile_img_target_file = $path . rand(0, 999999999999) . "_" . 'person_3.jpg';
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
  if(strlen($password) > 0 && strlen($password) > 20):
    $password_error = 'Your password can not be more than 20';
  endif;
  if(empty($password)):
    $password_error = 'your password can not empty';
  endif;

  $group_id = 0; // 1 mean that user will be admin
  $created_at = date("F j, Y, g:i a");
  $updated_at = date("F j, Y, g:i a");
  if(!isset($fullname_error) && !isset($email_error) && !isset($password_error)):
    if($auth->checkDataExists("email", $email)['count'] > 0):
      $failed = 'this email is aleardy exists';
    else:
      $stmt = $auth->add_user($fullname, $email, md5($password), $gender, $country, $profile_img_target_file, $group_id, $created_at, $updated_at);
      if($stmt):
        $success = 'user added successfully';
      endif;
    endif;
  endif;

  endif;
  ?>
<body class="member-page-body">
<div class="overlay"></div>

<div class="member-page">
  <div class="container">
   <div class="row">
     <div class="form-box m-auto">
       <h2 class="text-center">Happy to join us!</h2>

       <?php if(isset($failed)): ?>
         <div class="alert alert-danger"><?php echo $failed; ?></div>
       <?php endif; ?>

       <?php if(isset($success)): ?>
         <div class="alert alert-success"><?php echo $success; ?></div>
       <?php endif; ?>

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

         <div class="form-group">
           <label>fullname:</label>
           <input class="form-control" type="text" name="fullname" placeholder="enter fullname">
           <?php if(isset($fullname_error)): ?>
             <div class="alert alert-danger"><?php echo $fullname_error; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>email:</label>
           <input class="form-control" type="email" name="email" placeholder="enter email">
           <?php if(isset($email_error)): ?>
             <div class="alert alert-danger"><?php echo $email_error; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>password:</label>
           <input class="form-control" type="text" name="password" placeholder="enter password">
           <?php if(isset($password_error)): ?>
             <div class="alert alert-danger"><?php echo $password_error; ?></div>
           <?php endif; ?>
         </div>

         <div class="form-group">
           <label>gender:</label>
           <select class="form-control" name="gender">
             <option value="male">male</option>
             <option value="female">female</option>
           </select>
         </div>

         <div class="form-group">
           <label>country:</label>
           <select class="form-control" name="country">
             <option value="egypt">Egypt</option>
             <option value="england">England</option>
             <option value="spain">spain</option>
           </select>
         </div>

         <div class="form-group">
           <label>profile image:</label>
           <input class="form-control" type="file" name="profile_img">
           <?php if(isset($img_error)): ?>
             <div class="alert alert-danger"><?php echo $img_error; ?></div>
           <?php endif; ?>
         </div>

         <input type="submit" class="btn btn-primary" value="send">

        </form>
    </div>
   </div>
  </div>
</div>
<?php include 'includes/templates/footer.php'; ?>
