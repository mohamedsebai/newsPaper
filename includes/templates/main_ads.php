<?php
foreach($advertising as $data):
if($data['ads_postion'] === 'top'): ?>

<div class="main_advertising text-center">
 <div class="container">
     <div class="ads-box">
       <a href="<?php echo $data['ads_url']; ?>"><img src="admin/<?php echo $data['ads_img']; ?>" /></a>
     </div>
 </div>
</div>

<?php endif; ?>
<?php endforeach; ?>
<!-- Start .main_advertising -->

<!-- end .main_advertising -->
