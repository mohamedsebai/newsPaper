<?php

class Categories extends DBconnect {

  public function getAllCategories(){
    $query = "SELECT id, lower(name) as name FROM categories ORDER BY id DESC";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchAll();
    $data = [
      'count' => $count,
      'row'   => $row,
    ];
    return $data;
  }

}
