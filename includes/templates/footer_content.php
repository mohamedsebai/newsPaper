<div class="footer" id="footer">
  <div class="container">

    <div class="secendry_advertising">
      <div class="row">
        <?php
      foreach($advertising as $data):
        if($data['ads_postion'] === 'left'): ?>
        <div class="col-md-6">
           <div class="ads-box">
             <a href="<?php echo $data['ads_url']; ?>"><img src="admin/<?php echo $data['ads_img']; ?>" class="img-fluid" /></a>
           </div>
         </div>
        <?php endif; ?>
        <?php if($data['ads_postion'] === 'right'): ?>
          <div class="col-md-6">
             <div class="ads-box">
               <a href="<?php echo $data['ads_url']; ?>"><img src="admin/<?php echo $data['ads_img']; ?>" class="img-fluid" /></a>
             </div>
           </div>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>


   <div class="row">
    <div class="col-md-4">
     <div class="footer-left">
       <?php
       foreach($advertising as $data):
       if($data['ads_postion'] === 'bottom'): ?>
       <div class="ads-box">
         <a href="<?php echo $data['ads_url']; ?>"><img src="admin/<?php echo $data['ads_img']; ?>" class="img-fluid" /></a>
       </div>
       <?php endif; ?>
       <?php endforeach; ?>
     </div>
    </div>
    <div class="col-md-4">
     <div class="footer-middle">
      <h2>Latest News</h2>
     <?php
     $count =  $posts->getLatestPostsData(6)['count'];
     $postsData = $posts->getLatestPostsData(6)['row'];
     if($count > 0):
     foreach($postsData as $post):
       $id              = $post['id'];
       $title           = $post['title'];
       $post_url = 'single_post.php?post_id='.$id;
     ?>
      <a href="<?php echo $post_url; ?>"><h5><?php echo $title; ?></h5></a>
    <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-danger">there is no posts</div>
    <?php endif; ?>
     </div>
    </div>
    <div class="col-md-4">
     <div class="footer-right">
      <h2>Contact us</h2>
      <div class="row" style="padding: 0;margin:0">
        <ul class="list-unstyled">
         <?php
         $mediaData = $media->getAllMediaAccounts()['row'];
         foreach($mediaData as $account): ?>
           <?php if($account['name'] === 'facebook'): ?>
             <li><a href="<?php echo $account['url']; ?>"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li>
           <?php endif; ?>
           <?php if($account['name'] === 'twitter'): ?>
             <li><a href="<?php echo $account['url']; ?>"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li>
           <?php endif; ?>
           <?php if($account['name'] === 'instagram'): ?>
             <li><a href="<?php echo $account['url']; ?>"><i class="fa fa-instagram fa-fw fa-lg"></i></a></li>
           <?php endif; ?>
           <?php if($account['name'] === 'linkedin'): ?>
             <li><a href="<?php echo $account['url']; ?>"><i class="fa fa-linkedin fa-fw fa-lg"></i></a></li>
           <?php endif; ?>
       <?php endforeach; ?>
        </ul>
      </div>
        <div class="row" style="padding: 0;margin:0">
          <?php if(!Session::check('userId') === true): ?>
          <a class="join-us" href="Login.php">Login</a>
          <a class="join-us"href="register.php">register</a>
         <?php else: ?>
           <a class="join-us" href="logout.php">logout</a>
         <?php endif; ?>
        </div>
     </div>
    </div>
   </div>
  </div>
  <div class="info text-sm-center">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
         <div class="copright float-sm-none float-left">
          All right reserved &copy; 2020 to seabeai
         </div>
        </div>
        <div class="col-md-6">
         <div class="copright float-sm-none float-rigth ">
          <p>Desgined by mohamed seabeai</p>
         </div>
        </div>
       </div>
    </div>
  </div>

</div>
