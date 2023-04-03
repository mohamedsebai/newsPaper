<?php

class Session {

  public static function init(){  
     return session_start();
  }

  public static function set($key, $val){
    return $_SESSION[$key] = $val;
  }

  public static function get($key){
     return $_SESSION[$key];
  }

  public static function check($key){
   if(isset($_SESSION[$key])){
     return true;
   }else{
     return false;
   }
  }

  public static function destroy(){
      self::init();
      session_unset();
      session_destroy();
  }

}
