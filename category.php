<?php $pageTitle = 'category'; ?>
<?php include 'includes/templates/header.php'; ?>
<body>
<?php include 'includes/templates/navbar.php'; ?>
<?php include 'includes/templates/main_ads.php'; ?>
<?php

if ( !isset ($_GET['page']) || !isset ($_GET['category']) ) {
  $format->redirect("index.php");
}
if ( isset ($_GET['page']) && empty($_GET['page']) ) {
  $format->redirect("index.php");
}
if ( isset ($_GET['page']) && !is_numeric($_GET['page']) ) {
  $format->redirect("index.php");
}
if ( isset ($_GET['category']) && empty($_GET['category']) ) {
  $format->redirect("index.php");
}

$category_name = $_GET['category'];
$page = $_GET['page'];
$results_per_page = 25;
$start_from = ($page - 1) * $results_per_page;
$number_of_result =  $posts->getCountOfPosts("categories", $category_name);
$number_of_page = ceil($number_of_result / $results_per_page);
?>
<!-- Start body -->
<div class="main-body cat_main_body">
  <div class="container">
   <div class="row">
     <!-- start latest posts -->
     <div class="col-md-9">
       <h2 class="header"><?php echo ucwords($category_name); ?> News</h2>
       <div class="row">
         <?php
         $count    =  $posts->getPostsByGetRequest("categories",$category_name,$start_from, $results_per_page)['count'];
         $postsData = $posts->getPostsByGetRequest("categories",$category_name,$start_from, $results_per_page)['row'];
         if($count > 0):
         foreach($postsData as $post):
           $id              = $post['id'];
           $img             = 'admin/' . $post['img'];
           $title           = $post['title'];
           $excerpt         = $post['excerpt'];
           $categories      = $post['categories'];
           $created_at      = $post['created_at'];
           $post_url = 'single_post.php?post_id='.$id;
         ?>
          <div class="col-md-4">
            <div class="latest-news">
                <a href="<?php echo $post_url; ?>"><img class="img-fluid" src="<?php echo $img; ?>"/></a>
                  <div class="news-box-body">
                    <a href="<?php echo $post_url; ?>" class="d-block"><h5><?php echo $title; ?></h5></a>
                    <span class="date"><i class="fa fa-calendar"></i><?php echo $created_at; ?></span>
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
                  </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php else: ?>
          <div class="alert alert-danger">there is no posts</div>
        <?php endif; ?>

       </div>

     </div>

     <!-- end latest posts -->

     <!-- start sidebar -->
     <?php include 'includes/templates/right_sidebar.php'; ?>
     <!-- end sidebar -->
   </div>
   <div class="order-list">
     <ul class="list-unstyled">
       <?php for($page = 1; $page <= $number_of_page; $page++) { ?>
          <li> <a href="category.php?category=<?php echo $category_name;?>&page=<?php echo $page; ?>"><?php echo $page; ?></a> </li>
        <?php } ?>
     </ul>
   </div>
  </div>
</div>
<!-- End body -->
<?php include 'includes/templates/footer_content.php'; ?>
<?php include 'includes/templates/footer.php'; ?>
