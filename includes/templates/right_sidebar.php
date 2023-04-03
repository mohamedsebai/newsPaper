<div class="d-none d-md-block col-md-3">
 <div class="sidebar">
   <h2 class="header">Random News</h2>
   <?php
   $count     =  $posts->getRandomPostsData()['count'];
   $postsData = $posts->getRandomPostsData()['row'];
   if($count > 0):
   foreach($postsData as $post):
     $id              = $post['id'];
     $img             = 'admin/' . $post['img'];
     $title           = $post['title'];
     $excerpt         = $post['excerpt'];
     $post_url = 'single_post.php?post_id='.$id;
   ?>
   <div class="news-box">
     <div class="img-box">
       <div class="overlay"></div>
         <img class="img-fluid" src="<?php echo $img; ?>"/>
     </div>
    <div class="news-box-body">
      <a href="<?php echo $post_url; ?>" class="d-block"><h5><?php echo $title; ?></h5></a>
      <P><?php echo $excerpt; ?></P>
      <a href="<?php echo $post_url; ?>" class="read-more">Read more</a>
    </div>
   </div>
 <?php endforeach; ?>
 <?php else: ?>
   <div class="alert alert-danger">there is no posts</div>
 <?php endif; ?>

 </div>
</div>
