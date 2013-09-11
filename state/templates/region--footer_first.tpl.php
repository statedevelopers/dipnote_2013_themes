<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <div id="main-menu-footer" class="collapsible-menu">
      <?php
        $block = block_load('menu_block', '2');
        $output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));        
        print $output; 
        $block = block_load('menu_block', '1');
        $output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));        
        print $output; 
      ?>
    </div>
    <?php print $content; ?>
    <div class="toggle-wrapper">
      <div class="toggles clearfix">
        <div id="menu-toggle-footer"><a href="#toggle">Menu toggle</a></div>
        <div id="search-toggle-footer" class="search-toggles"><a href="#toggle">Search toggle</a></div>
        <div id="search-toggle-mobile-footer" class="search-toggles"><a href="#toggle">Search toggle</a></div>
      </div>
    </div>
  </div>
</div>
