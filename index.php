<?php
$pageTitle = 'index';
?>
<?php include 'includes/templates/header.php'; ?>
<body>
<?php include 'includes/templates/navbar.php'; ?>
<?php include 'includes/templates/carousel.php'; ?>
<?php include 'includes/templates/main_ads.php'; ?>
<!-- Start body -->
<div class="main-body">
  <div class="container">
   <div class="row">
     <!-- start latest posts -->
     <div class="col-md-9">

      <div class="latest-news">
        <h2 class="header">Latest news</h2>
      </div>
       <?php
       $count =  $posts->getLatestPostsData(10)['count'];
       $postsData = $posts->getLatestPostsData(10)['row'];
       if($count > 0):
       foreach($postsData as $post):
         $id              = $post['id'];
         $img             = 'admin/' . $post['img'];
         $author_name     = $post['author_name'];
         $title           = $post['title'];
         $excerpt         = $post['excerpt'];
         $comments_count  = $comment->commentCount('post_id',$id);
         $tags            = $post['tags'];
         $categories      = $post['categories'];
         $created_at      = $post['created_at'];
         $post_url = 'single_post.php?post_id='.$id;
       ?>
       <div class="latest-news">
        <div class="row">
          <div class="col-md-4">
            <a href="<?php echo $post_url; ?> ">
              <img class="img-fluid" src="<?php echo $img; ?>"/>
            </a>
          </div>
          <div class="col-md-8">
            <div class="news-box-body">
              <a href="<?php echo $post_url; ?>" class="d-block"><h5><?php echo $title; ?></h5></a>
              <span class="date"><i class="fa fa-calendar"></i><?php echo $created_at; ?></span>
              <span class="author"><i class="fa fa-user"></i><?php echo $author_name; ?></span>
              <span class="comment-count"><i class="fa fa-comment"></i><?php echo $comments_count; ?></span>
              <P><?php echo $excerpt; ?></P>
              <a href="<?php echo $post_url; ?>" class="read-more">Read more</a>
              <div class="categories"><i class="fa fa-tags"></i>
                Categories:
                <?php
                $categories = explode(',', $categories);
                foreach($categories as $category):
                  $category = str_replace(' ', '', $category);
                ?>
                <a href="category.php?category=<?php echo $category; ?>&page=1"><?php echo $category . ','; ?></a>
                <?php endforeach; ?>
              </div>
              <div class="tags"><i class="fa fa-tags"></i>
                Tags:
                <?php
                $tags = explode(',', $tags);
                foreach($tags as $tag):
                  $tag = str_replace(' ', '', $tag);
                ?>
                <a href="tag.php?tag=<?php echo $tag; ?>&page=1"><?php echo '#' . $tag . ','; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
         </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-danger">there is no posts</div>
    <?php endif; ?>


     </div>
     <!-- end latest posts -->

     <!-- start sidebar -->
     <?php include 'includes/templates/right_sidebar.php'; ?>
     <!-- end sidebar -->
   </div>
  </div>
</div>
<!-- End body -->
<?php include 'includes/templates/footer_content.php'; ?>
<?php include 'includes/templates/footer.php'; ?>
