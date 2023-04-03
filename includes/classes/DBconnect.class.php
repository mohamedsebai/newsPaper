<?php

class DBconnect {

  private $host = 'mysql:host=localhost;dbname=oop_newspaper';
  private $user = 'root';
  private $pass = '';

  public function connect(){
      try{
        $db = new PDO($this->host, $this->user, $this->pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
      }
      catch(PDOException $e){
       echo 'faild to connect with database' . $e->getMessage();
      }
  }

}
