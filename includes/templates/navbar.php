<!-- start navigation -->
<div class="navigation">

  <div class="toggle-menu">
    <i class="fa fa-bars fa-fw fa-lg"></i>
  </div>
  <div class="nav">



    <div class="logo-box">
      <?php $logoData = $logo->getAllLogosData()['row']; ?>
      <img src="<?php echo 'admin/' . $logoData[0]['img']; ?>" />
    </div>
    <br>
    <?php if(Session::check('userId') === true): ?>

        <h5>welcome <?php echo Session::get('userFullname'); ?></h5>
    <?php endif; ?>

    <form action="search.php?page=1" method="POST" class="searchform">
      <h2>Type keywords</h2>
      <div class="form-group">
        <input class="form-control" type="text" name="search">
        <input type="submit" value="Search">
      </div>
    </form>

    <ul class="list-unstyled">
    <h2>Our Menu</h2>
     <?php
       $count = $categories->getAllCategories()['count'];
       $categoriesData = $categories->getAllCategories()['row'];
       if($count > 0):
       foreach($categoriesData as $category):
         $name = $category['name'];
         $category_url = 'category.php?category='.$name.'&page=1';
      ?>
     <li><a href="<?php echo $category_url; ?>"><?php echo $name; ?></a></li>
   <?php endforeach; ?>
   <?php else: ?>
    <div class="alert alert-danger">there is no categories</div>
   <?php endif; ?>
    </ul>
    <div class="join">
      <h2>Join us now</h2>
      <?php if(Session::check('userId') === true): ?>
        <a class="join-us" href="edit_profile.php">edit profile</a>
        <a class="join-us" href="change_password.php">change password</a>
        <a class="join-us" href="logout.php">logout</a>
      <?php else: ?>
        <a class="join-us" href="login.php">Login</a>
        <a class="join-us"href="register.php">register</a>
      <?php endif; ?>
    </div>
  </div>

</div>
