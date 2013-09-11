<?php
/**
 * @file
 * Node template 
 *
 */
  //hide($content['field_brightcove_video']);
  //hide($content['field_external_embed_video']);
  user_load($user->uid);
?>
<embed_video<?php print $attributes; ?>>
  <?php //print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      if (isset($content['field_brightcove_video'])) {
        print render($content['field_brightcove_video']);
      }
      if (isset($content['field_external_embed_video'])) {
        print render($content['field_external_embed_video']);
      }
      if (isset($node->field_region['und'][0]['tid'])) {
        $block = block_load('views', 'region_link-block_1');
        $output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));        
        print $output;
      }
      print render($content);

      // Insert the Contributor's bio field from a Views block
      $block = block_load('views', 'contributor_bio-block_1');     
      print render(_block_get_renderable_array(_block_render_blocks(array($block))));
    ?>
  </div>
  <div class="clearfix">
    <div class="credit-share clearfix">
      
      <?php // print '<a href="/' . $user_path . '"">'; ?><?php //if ($display_name != null) { print '<div class="credit">Posted by ' . $display_name . '</div>'; } ?><?php // print '</a>' ?>

      <?php if (!empty($content['links'])): ?>
        <?php hide($content['links']['statistics']); ?>
        <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
      <?php endif; ?>

      <?php
        global $user;
        if ( $user->uid ) {
          print '<br /><div class="stats">' . render($content['links']['statistics']['#links']['statistics_counter']['title']) . '</div>';
        }
      ?>

    </div>

    <?php print render($content['comments']); ?>
  </div>
</embed_video>
