<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <div class="toggles clearfix">
      <div id="menu-toggle"><a href="#toggle">Menu toggle</a></div>
      <div id="search-toggle" class="search-toggles"><a href="#toggle">Search toggle</a></div>
      <div id="search-toggle-mobile" class="search-toggles"><a href="#toggle">Search toggle</a></div>
    </div>
    <?php print $content; ?>
    <?php if ($main_menu || $secondary_menu): ?>
      <nav class="navigation collapsible-menu menu" id="main-menu">
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('links', 'clearfix', 'main-menu', 'menu')), 'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible')))); ?>
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('links', 'clearfix', 'secondary-menu', 'menu')), 'heading' => array('text' => t('Secondary menu'),'level' => 'h2','class' => array('element-invisible')))); ?>
      </nav>
    <?php endif; ?>
  </div>
</div>
