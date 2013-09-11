<?php
function state_alpha_preprocess_html(&$variables) {
  // Add information about the number of sidebars.
  if (!empty($variables['page']['content']['content']['sidebar_first']) && !empty($variables['page']['content']['content']['sidebar_second'])) {
    $variables['attributes_array']['class'][] = 'two-sidebars';
  }
  elseif (!empty($variables['page']['content']['content']['sidebar_first'])) {
    $variables['attributes_array']['class'][] = 'one-sidebar sidebar-first';
  }
  elseif (!empty($variables['page']['content']['content']['sidebar_second'])) {
    $variables['attributes_array']['class'][] = 'one-sidebar sidebar-second';
  }
  else {
    $variables['attributes_array']['class'][] = 'no-sidebars';
  }

  // Add pre-content class if Content Top region is printed.
  if (!empty($variables['page']['content']['pre_content']['content_top'])) {
    $variables['attributes_array']['class'][] = 'content-top';
  }

  // Adding IE conditional stylesheets
  drupal_add_css(path_to_theme() . '/css/ie-lte-7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE, 'weight' => 999));

  // Add classes to certain nodes.
//   if(arg(0)=='node' && is_numeric(arg(1))) {
//     $node = node_load(arg(1)); 
//     $node_id = $node->nid;
//     switch ($node_id) {
//       case '16239':
//         $variables['attributes_array']['class'][] = 'example-class';
//         break;     
//     }
//   }

}
