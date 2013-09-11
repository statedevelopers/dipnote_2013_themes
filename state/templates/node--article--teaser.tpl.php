<?php
/**
 * @file
 * Node template 
 *
 */
  hide($content['field_photo']);
  // dpm($content['links']);
?>

<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>

  <?php // print $node->field_photo['und'][0]['target_id']; ?>
 
  <div class="photo-date">

      <?php
        if (isset($content['field_brightcove_video'])) {
          echo '<div class="photo video">';
          print render($content['field_brightcove_video']);
          echo '</div>';
        } elseif (isset($content['field_external_embed_video'])) {
          echo '<div class="photo">';
          print render($content['field_external_embed_video']);
          echo '</div>';
        } elseif (isset($node->field_photo['und'][0]['target_id'])) {
          echo '<div class="photo">';
          print render($content['field_photo']);
          echo '</div>';
        } elseif (isset($node->field_video['und'][0]['target_id'])) {
          echo '<div class="photo">';
          print render($content['field_video']);
          echo '</div>';
        } else {
          echo '<div class="photo placeholder">';
          $placeholder_view_mode = 'photo_thumbnail';
          $placeholder_node = node_load(16316);
          $placeholder_view = node_view($placeholder_node, $placeholder_view_mode);
          print render($placeholder_view);
          echo '</div>';
        }
        hide($content['field_photo']);
        hide($content['field_brightcove_video']);
        hide($content['field_external_embed_video']);
      ?>

    <div class="date overlay"><?php print $date; ?></div>
  </div>

  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
  <div class="counts clearfix">
    <?php if (!empty($content['links'])): ?>
      <?php print render($content['links']['statistics']); ?>
      <?php hide($content['links']['statistics']); ?>
      <div class="links node-links"><?php print render($content['links']); ?></div>
       <div class="comment-count"><a href="/node/<?php print $node->nid; ?>#comments"><?php print $comment_count; ?></a></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>
