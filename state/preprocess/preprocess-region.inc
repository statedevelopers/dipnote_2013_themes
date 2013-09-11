<?php
function state_alpha_preprocess_region(&$variables) {
  $region = $variables['region'];
  
  // Hide blocks within this region on mobile
  //if ($region == 'postscript_first') {
  if ($region == 'preface_first') {
    $variables['attributes_array']['class'][] = 'mobile-hidden';
  }
}
