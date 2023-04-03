<?php $pageTitle = 'search'; ?>
<?php include 'includes/templates/header.php'; ?>
<body>
<?php include 'includes/templates/navbar.php'; ?>
<?php include 'includes/templates/main_ads.php'; ?>
<?php

if(isset($_POST['search'])):
  $search = $_POST['search'];
else:
  $search = $_GET['search'];
endif;
if(!isset($_POST['search']) && !isset($_GET['search'])):
  $format->redirect("index.php");
endif;
if ( empty ($_POST['search']) && empty($_GET['search']) ):
  $format->redirect("index.php");
endif;
if (empty($_GET['page']) || !is_numeric($_GET['page'])):
  $format->redirect("index.php");
endif;

$page = $_GET['page'];
$results_per_page = 1;
$start_from = ($page - 1) * $results_per_page;
$number_of_result =  $posts->getCountOfPostsToSearchBox("categories", "tags", $search);
$number_of_page = ceil($number_of_result / $results_per_page);
?>
<!-- Start body -->
<div class="main-body search_main_body">
  <div class="container">
   <div class="row">
     <!-- start latest posts -->
     <div class="col-md-9">
      <div class="search_posts">
         <h2 class="header"><?php
           if(isset($_POST['search'])):
             echo $_POST['search'];
           endif;
           if(isset($_GET['search'])):
             echo $_GET['search'];
           endif;
         ?> News</h2>
       <div class="row">
         <?php
         $count    =  $posts->getPostsBySearchBox("categories", "tags", $search, $start_from, $results_per_page)['count'];
         $postsData = $posts->getPostsBySearchBox("categories", "tags", $search, $start_from, $results_per_page)['row'];
         if($count > 0):
         foreach($postsData as $post):
           $id              = $post['id'];
           $img             = 'admin/' . $post['img'];
           $title           = $post['title'];
           $excerpt         = $post['excerpt'];
           $tags            = $post['tags'];
           $categories      = $post['categories'];
           $created_at      = $post['created_at'];
           $post_url        = 'single_post.php?post_id='.$id;
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
                    <div class="tags"><i class="fa fa-tags"></i>
                      Tags:
                      <?php
                      $tags = explode(',', $tags);
                      foreach($tags as $tag):
                        $tag = str_replace(' ', '', $tag);
                      ?>
                      <a href="tag.php?tag=<?php echo $tag; ?>&page=1"><?php echo $tag . ','; ?></a>
                      <?php endforeach; ?>
                    </div>
                  </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php else: ?>
          <?php $format->redirect("page404.php"); ?>
        <?php endif; ?>

        </div>
       </div>
     </div>
     <!-- end latest posts -->

     <!-- start sidebar -->
       <?php include 'includes/templates/right_sidebar.php'; ?>
     <!-- end sidebar -->
   </div>
   <div class="order-list">
     <ul class="list-unstyled">
       <?php for($page = 1; $page <= $number_of_page; $page++){ ?>
          <li> <a href="search.php?page=<?php echo $page; ?>&search=<?php echo $search; ?>"><?php echo $page; ?></a></li>
        <?php } ?>
     </ul>
   </div>
  </div>
</div>
<!-- End body -->
<?php include 'includes/templates/footer_content.php'; ?>
<?php include 'includes/templates/footer.php'; ?>
