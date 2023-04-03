<?php

// url
$domin = 'localhost';
$adminRoute = "http://".$domin."/oop_newspaper/admin/";
$frontRoute = "http://".$domin."/oop_newspaper/";
// route
$css = 'assets/css/';
$fonts = 'assets/fonts/';
$js = 'assets/js/';
// include classes
spl_autoload_register(function($class){
  $classes = 'includes/classes/';
  include $classes . $class . '.class.php';
});

$db = new DBconnect;
$format = new Format;
$ads = new Ads;
$posts = new Posts;
$categories = new Categories;
$logo = new Logos;
$media = new Media;
$comment = new Comments;
$auth = new Auth;
$advertising = $ads->getAllAdsData()['row'];
//$session = new Session;
