<?php
  // Strip items of type 'status', which
  // includes responses to reader comments. 
  $newitems = array();
  $maxitems = 5;
  foreach($items as $item) {
    if(count($newitems) >= $maxitems) break;
    if($item->type != 'status') $newitems[] = $item;
  }
  $items = $newitems;
?>
<div class="facebook-feed">
<?php foreach ($items as $item): ?>
  <div class="item-wrapper clearfix">
    <?php 
    if(!isset($item->picture)) { 
      // $item->picture = "sites/default/files/styles/thumbnail/public/contributed_images/placeholder-photo.jpeg";
      echo '<div class="avatar">';
      $placeholder_view_mode = 'photo_thumbnail';
      $placeholder_node = node_load(16316);
      $placeholder_view = node_view($placeholder_node, $placeholder_view_mode);
      print render($placeholder_view);
      echo '</div>';
    } else { ?>
      <div class="avatar"><img alt="<?php echo $item->from->name; ?>" src="<?php echo $item->picture; ?>" /></div>
    <?php }; ?>
    <div class="text-wrapper">
      <div class="text">
      <?php // echo $item->message; ?>
        <?php echo l(substr($item->message,0,66) . "…", $item->link); ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
