<?php

class Posts extends DBconnect {

  public function getLatestPostsData($limit){
    $query = "SELECT posts.*, users.full_name as author_name
              FROM posts
              INNER JOIN users
              ON posts.author_id = users.id
              ORDER BY id DESC LIMIT $limit";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchAll();
    $data = [
      'count' => $count,
      'row'  => $row
    ];
    return $data;
  }

  public function getRandomPostsData(){
    $query = "SELECT id, title, excerpt, img
              FROM posts WHERE DATE_STAMP
              BETWEEN DATE_SUB(CURDATE(), INTERVAL 10 DAY)  AND CURDATE()  ORDER BY RAND() LIMIT 5";

    $stmt = $this->connect()->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchAll();
    $data = [
      'count' => $count,
      'row'  => $row
    ];
    return $data;
  }

  public function getPostsByGetRequest($dataToSelectBy, $value, $start_from, $results_per_page){
    $query = "SELECT * FROM posts WHERE $dataToSelectBy LIKE '%$value%' ORDER BY id DESC LIMIT $start_from, $results_per_page ";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchALL();
    $data = [
      'count' => $count,
      'row'  => $row
    ];
    return $data;
  }

  public function getCountOfPosts($dataToSelectBy, $value){
    $query = "SELECT count(*) FROM posts WHERE $dataToSelectBy LIKE '%$value%' ";
    $stmt  = $this->connect()->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
  }

  public function getPostsBySearchBox($dataToSelectBy_1, $dataToSelectBy_2, $value, $start_from, $results_per_page){
    $query = "SELECT * FROM posts WHERE $dataToSelectBy_1 LIKE '%$value%' OR $dataToSelectBy_2 LIKE '%$value%'
    ORDER BY id DESC LIMIT $start_from, $results_per_page ";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchALL();
    $data = [
      'count' => $count,
      'row'  => $row
    ];
    return $data;
  }

  public function getCountOfPostsToSearchBox($dataToSelectBy_1, $dataToSelectBy_2, $value){
    $query = "SELECT count(*) FROM posts WHERE $dataToSelectBy_1 LIKE '%$value%' OR $dataToSelectBy_2 LIKE '%$value%' ";
    $stmt  = $this->connect()->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
  }

  public function getLimitPostData($dataToSelectBy, $value){
    $query = "SELECT posts.*, users.full_name as author_name
              FROM posts
              INNER JOIN users
              ON posts.author_id = users.id
              WHERE posts.$dataToSelectBy = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute(array($value));
    $count = $stmt->rowCount();
    $row = $stmt->fetchAll();
    $data = [
      'count' => $count,
      'row'  => $row
    ];
    return $data;
  }



}
