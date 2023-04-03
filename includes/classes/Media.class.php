<?php

class Media extends DBconnect {

  public function getAllMediaAccounts(){
    $query = "SELECT * FROM media";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetchAll();
    $data = [
      'count' => $count,
      'row' => $row,
    ];
    return $data;
  }

}
