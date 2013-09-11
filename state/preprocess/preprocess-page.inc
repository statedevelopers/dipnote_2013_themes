<?php
function state_alpha_preprocess_page(&$vars) {
  // Hide the node title on the front page
  if($vars['is_front']) {
    $vars['title_hidden'] = TRUE;
    // $vars['tabs_hidden'] = TRUE;
  }
}