<?php
// echo $post_id;
if(isset($_POST['parent'])):
  $parent_comment =  $_POST['parent_comment'];
  $author_id = Session::get('userId'); //Session::get('userid');
  $parent = 0;
  $created_at = date("F j, Y, g:i a");
  $updated_at = date("F j, Y, g:i a");
  $comment->add_comment($post_id, $author_id, $parent_comment, $parent, $created_at, $updated_at);
endif;
?>
<?php
if(isset($_POST['child'])):
  $chlid_comment =  $_POST['chlid_comment'];
  $author_id = Session::get('userId'); //Session::get('userid');
  $parent = $_POST['parent_id'];
  $created_at = date("F j, Y, g:i a");
  $updated_at = date("F j, Y, g:i a");
  $comment->add_comment($post_id, $author_id, $chlid_comment, $parent, $created_at, $updated_at);
endif;
?>

<?php
if(isset($_POST['edit_parent_comment'])):
  $id = $_POST['id_for_parent'];
  $content_parent_edit =  $_POST['content_parent_edit'];
  $author_id = Session::get('userId'); //Session::get('userid');
  $parent = 0;
  $updated_at = date("F j, Y, g:i a");
  $comment->edit_comment($post_id, $author_id, $content_parent_edit, $parent, $updated_at, $id);
endif;
?>

<?php
if(isset($_POST['edit_child_comment'])):
  $id = $_POST['id_edit_comment_child'];
  $content_child_edit =  $_POST['content_child_edit'];
  $author_id = Session::get('userId'); //Session::get('userid');
  $parent = $_POST['parent_edit_comment_child'];
  $updated_at = date("F j, Y, g:i a");
  $comment->edit_comment($post_id, $author_id, $content_child_edit, $parent, $updated_at, $id);
endif;
?>
<?php
// delete child comment
if(isset($_GET['delete'])):
  $id_to_delete = $_GET['delete'];
  $comment->delete_comment_with_id($id_to_delete);
endif;

// delete parent comment
if(isset($_GET['delete']) && isset($_GET['parent'])):
  $id_to_delete = $_GET['delete'];
  $parent_to_delete = $_GET['parent'];
  $comment->delete_comment_with_id($id_to_delete);
  $comment->delete_comment_with_parent($parent_to_delete);
endif;
// if(isset($_GET['delete']) && empty($_GET['delete'])):
//   $format->redirect("index.php");
// endif;
?>
<div class="comment-section">
  <div class="header">
    <i class="fa fa-plus flaot-left"></i>
    <h4 class="d-inline-block flaot-right">Add comment</h4>
  </div>
    <div class="comment-show">
      <!-- start parent -->
      <?php
      $count_parent = $comment->getCommentsData($post_id, 0)['count'];
      $comment_parent_data = $comment->getCommentsData($post_id, 0)['row'];
      if($count > 0):
        foreach($comment_parent_data as $commentParent):
          $parent_id = $commentParent['id'];
          $parent_author_name = $commentParent['author_name'];
          $parent_author_id = $commentParent['author_id'];
          $parent_data_parent_id = $commentParent['parent'];
          $parent_content     = $commentParent['content'];
          $parent_profile_img = $commentParent['profile_img'];
          $parent_created_at  = $commentParent['created_at'];
      ?>
      <div class="parent">
        <img src="<?php echo $parent_profile_img; ?>" width="50">
        <span class="author"><?php echo $parent_author_name; ?></span>
        <span class="date"><?php echo $parent_created_at; ?></span>
        <div class="body">
          <p><?php echo $parent_content; ?></p>
        </div>

        <?php if( Session::check('userId') === true && $parent_author_id === Session::get('userId') ): ?>
        <div class="option-box">
          <span class="edit">Edit</span>
          <span class="delete">
            <a href="<?php echo 'single_post.php?post_id='.$post_id.'&delete='. $parent_id . '&parent=' . $parent_id; ?>">
              Delete
            </a>
          </span>

             <form action="" method="POST" class="edit_comment_form">
               <div class="form-group">
                 <h5>Edit comment</h5>
                <input type="hidden" name="id_for_parent" value="<?php echo $parent_id; ?>">
                <textarea class="form-control" name="content_parent_edit"><?php echo $parent_content; ?></textarea>
                <input type="submit" name="edit_parent_comment" class="btn btn-primary" value="update">
               </div>
            </form>
         </div>
       <?php endif; ?>

        <span class="reply-head">Reply</span>
        <!-- start child -->
        <div class="child">
        <?php
        $count_child = $comment->getCommentsData($post_id, $parent_id )['count'];
        $comment_child_data = $comment->getCommentsData($post_id, $parent_id )['row'];
        if($comment_child_data):
          foreach($comment_child_data as $commentChild):
            $child_id          = $commentChild['id'];
            $child_author_name = $commentChild['author_name'];
            $child_author_id   = $commentChild['author_id'];
            $child_content     = $commentChild['content'];
            $child_profile_img =  $commentChild['profile_img'];
            $child_created_at  = $commentChild['created_at'];
            $child_parent      = $commentChild['parent'];
        ?>
          <div class="reply">
            <img src="<?php echo $child_profile_img; ?>" width="50">
            <span class="author"><?php echo $child_author_name; ?></span>
            <span class="date"><?php echo $child_created_at; ?></span>
            <div class="body">
              <p>
                <?php echo $child_content; ?>
              </p>
            </div>
            <?php if( Session::check('userId') === true && $child_author_id === Session::get('userId')): ?>
            <div class="option-box">
              <span class="edit">Edit</span>
              <span class="delete">
                <a href="<?php echo 'single_post.php?post_id='.$post_id.'&delete='. $child_id; ?>">
                Delete
              </a>
              </span>
                 <form action="" method="POST" class="edit_comment_form">
                   <div class="form-group">
                     <h5>Edit comment</h5>
                    <input type="hidden" name="id_edit_comment_child" value="<?php echo $child_id; ?>">
                    <input type="hidden" name="parent_edit_comment_child" value="<?php echo $child_parent; ?>">
                    <textarea class="form-control" name="content_child_edit"><?php echo $child_content; ?></textarea>
                    <input type="submit" name="edit_child_comment" class="btn btn-primary" value="update">
                   </div>
                </form>
             </div>
           <?php endif; ?>
          </div>

      <?php endforeach; // check count ?>
      <?php endif; // check count ?>
      <?php if( Session::check('userId') === true ): ?>
      <form action="" method="POST">
       <div class="form-group">
         <h5>Reply comment</h5>
        <textarea class="form-control" name="chlid_comment"></textarea>
        <input type="hidden" class="form-control" name="parent_id" value="<?php echo $parent_id; ?>">
        <input type="submit" class="btn btn-primary" value="Send" name="child">
       </div>
      </form>
    <?php else:?>
      <h6>login to add comment</h6>
      <a href="register.php" class="create_account">Create account</a>
      <a href="login.php" class="create_account">Login</a>
    <?php endif; ?>
     </div>
        <!-- end child -->
      </div>
    <?php endforeach; // check count ?>
    <?php else: ?>
      <div class="alert alert-danger">there is no comments yet.</div>
    <?php endif; // check count ?>
  <!-- end parent -->
  <?php  if( Session::check('userId') === true ): ?>
      <form action="<?php echo 'single_post.php?post_id='.$post_id.''; ?>" method="POST">
       <div class="form-group">
        <h5>Add comment</h5>
        <textarea class="form-control" name="parent_comment"></textarea>
        <input type="submit" class="btn btn-primary" value="Send" name="parent">
       </div>
      </form>
    <?php else: ?>
     <h6>login to add comment</h6>
     <a href="register.php" class="create_account">Create account</a>
     <a href="login.php" class="create_account">Login</a>
    <?php endif; ?>
    </div>
</div>
