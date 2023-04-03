<?php

class Ads extends DBconnect {

  public function getAllAdsData(){
    $query = "SELECT * FROM ads";
    $stmt  = $this->connect()->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row   = $stmt->fetchAll();
    $data = [
      'count' => $count,
      'row'   => $row
    ];
    return $data;
  }

}
