<?php

class Logos extends DBconnect {

  public function getAllLogosData(){
    $query = "SELECT * FROM logos";
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
