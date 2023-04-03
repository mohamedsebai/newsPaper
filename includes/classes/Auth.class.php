<?php

class Auth extends DBconnect {

  public function checkIfUserExists($email, $password){
    $query = "SELECT * FROM users WHERE email = ? AND password = ? AND group_id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute(array($email, md5($password), 0));
    $count = $stmt->rowCount();
    $row   = $stmt->fetch();
    $data = [
      'count' => $count,
      'row'   => $row
    ];
    return $data;
  }

  public function add_user($full_name, $email, $password, $gender, $country, $profile_img, $group_id, $created_at, $updated_at){
    $query = "INSERT INTO users (full_name, email, password, gender, country, profile_img, group_id, created_at, updated_at)
    VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute(array($full_name, $email, $password, $gender, $country, $profile_img, $group_id, $created_at, $updated_at));
    return $stmt;
  }

  public function update_user($full_name, $email, $gender, $country, $profile_img, $updated_at ,$id){
    $query = "UPDATE users SET full_name = ?, email = ?, gender = ?, country = ?, profile_img = ?,
    updated_at = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute(array($full_name, $email, $gender, $country, $profile_img, $updated_at, $id));
    return $stmt;
  }


  public function checkDataExists($dataToChekBy,$value){
    $query = "SELECT * FROM users WHERE $dataToChekBy = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute(array($value));
    $count = $stmt->rowCount();
    $row = $stmt->fetch();
    $data = [
      'count' => $count,
      'row'   => $row
    ];
    return $data;
  }

  public function changeUserPassword($password,$id){
    $query = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute(array($password,$id));
    return $stmt;
  }




}
