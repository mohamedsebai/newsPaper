<?php

class Comments extends DBconnect {

   public function add_comment($post_id, $author_id, $content, $parent, $created_at, $updated_at){
     $query = "INSERT INTO comments (post_id, author_id, content, parent, created_at, updated_at) VALUES (?,?,?,?,?,?)";
     $stmt  = $this->connect()->prepare($query);
     $stmt->execute(array($post_id, $author_id, $content, $parent, $created_at, $updated_at));
     return $stmt;
   }

   public function edit_comment($post_id, $author_id, $content, $parent, $updated_at, $id){
     $query = "UPDATE comments SET post_id = ?, author_id = ?, content = ?
     , parent = ?, updated_at = ? WHERE id = ?";
     $stmt  = $this->connect()->prepare($query);
     $stmt->execute(array($post_id, $author_id, $content, $parent, $updated_at, $id));
     return $stmt;
   }

   public function delete_comment_with_id($id){
     $query = "DELETE FROM comments WHERE id = ?";
     $stmt  = $this->connect()->prepare($query);
     $stmt->execute(array($id));
     return $stmt;
   }
   public function delete_comment_with_parent($parent){
     $query = "DELETE FROM comments WHERE parent = ?";
     $stmt  = $this->connect()->prepare($query);
     $stmt->execute(array($parent));
     return $stmt;
   }

   public function getCommentsData($post_id, $parent){
     $query = "SELECT comments.*, users.full_name as author_name , users.profile_img as profile_img
               FROM comments
               INNER JOIN users
               ON comments.author_id = users.id
               WHERE comments.post_id = ? AND comments.parent = ?
               ORDER BY id DESC";
     $stmt  = $this->connect()->prepare($query);
     $stmt->execute(array($post_id, $parent));
     $count = $stmt->rowCount();
     $row   = $stmt->fetchAll();
     $data = [
       'count' => $count,
       'row'   => $row
     ];
     return $data;
   }

   public function commentCount($dataToSelectBy, $id){
     $query = "SELECT count(*) FROM comments WHERE $dataToSelectBy = ?";
     $stmt = $this->connect()->prepare($query);
     $stmt->execute(array($id));
     $row = $stmt->fetch();
     return $row[0];
   }




  }
