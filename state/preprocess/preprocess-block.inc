<?php
function state_alpha_preprocess_block(&$variables) {
  $block = $variables['block'];
  $classes = &$variables['attributes_array']['class'];
  $content_classes = &$variables['content_attributes_array']['class'];
  $title_classes = &$variables['title_attributes_array']['class'];
  $block_id = $variables['block']->module . '-' . $variables['block']->delta;

  // Add class to block-content for easier theming
  $content_classes[] .= 'block-content';

  // Wrap span around the first word of title
  if ($block->subject) {
    $words = explode(' ', $block->subject);
    $words[0] = '<span class="first">' . $words[0] . '</span>';
    $block->subject = implode(' ', $words);
  }

  /* Various block-specific subjects and theming */
  switch ($block_id) {
    case 'views-featured_stories-block':
      $block->subject = '<span class="wrapper">' . $block->subject . '</span>';
      break;
    case 'facebook_pull-facebook_pull_default':
      $block->subject = '<span class="first">Facebook</span>';
      break;
    case 'custom_search_blocks-1':
      $classes[] = 'block-search block-search-form';
      break;
    case 'menu_block-1':
      $classes[] = 'secondary-menu menu block-menu';
      break;
    case 'menu_block-2':
      $classes[] = 'main-menu menu block-menu block-main-menu';
      break;
    }
  
  if ($block->region == "sidebar_second" || $block->region == "content_top") {

    // Add class to block-content for JS reference later
    $content_classes[] .= 'collapsible-content';

  }

  if ($block->subject && $block->region == "sidebar_second") {
    
    // Add mobile-collapsible class to block
    $classes[] = 'mobile-collapsible';

    // Add mobile-header class to title
    $title_classes[] = 'mobile-header';
  }

}