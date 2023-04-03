<?php

class Format{


  public function get_page_title(){
    global $pageTitle;
      if(isset($pageTitle)){
        echo $pageTitle;
      }else{
        echo 'default';
      }
  }

  public function validate_data($data, $filter_sanitize = FILTER_SANITIZE_STRING){
   $data = htmlspecialchars($data);
   $data = trim($data);
   $data = filter_var($data, $filter_sanitize);
   return $data;
  }

  public function get_file_extension($file_name){
    $file_extension = explode('.', $file_name);
    $file_extension = strtolower(end($file_extension));
    return $file_extension;
  }

  public function file_upload( $path, $file_name, $file_tmp_name ){
    if(!file_exists($path)){
      mkdir($path);
    }
    if(file_exists($path) && is_dir($path)){
      $file_name = rand(0, 999999999999) . "_" . $file_name;
      $target_file = $path . basename($file_name);
      move_uploaded_file($file_tmp_name, $target_file);
      return $target_file;
    }
  }

  public function redirect($url){
      header('Location: '.$url.'');
      exit();
  }


}
