<?php
$slider = new Sliders;
$imgs = $slider->getAllSlidersData()['row'];
?>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
 <ol class="carousel-indicators">
   <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
   <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
   <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
 </ol>
 <div class="carousel-inner">
   <div class="overlay"></div>

   <div class="carousel-item active">
     <img src="admin/<?php echo $imgs[0]['img']; ?>" class="d-block w-100" alt="...">
     <div class="carousel-caption d-block">
       <h5 class="h2"><?php echo $imgs[0]['title']; ?></h5>
       <p><?php echo $imgs[0]['content']; ?></p>
     </div>
   </div>
   <div class="carousel-item">
     <img src="admin/<?php echo $imgs[1]['img']; ?>" class="d-block w-100" alt="...">
     <div class="carousel-caption d-block">
       <h5 class="h2"><?php echo $imgs[1]['title']; ?></h5>
       <p><?php echo $imgs[1]['content']; ?></p>
     </div>
   </div>
   <div class="carousel-item">
     <img src="admin/<?php echo $imgs[2]['img']; ?>" class="d-block w-100" alt="...">
     <div class="carousel-caption d-block">
       <h5 class="h2"><?php echo $imgs[2]['title']; ?></h5>
       <p><?php echo $imgs[2]['content']; ?></p>
     </div>
   </div>
 </div>
</div>
