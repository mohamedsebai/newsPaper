<?php

class Sliders extends DBconnect{

    public function getAllSlidersData(){
      $query = "SELECT * FROM sliders";
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
