<?php
function state_alpha_preprocess_node(&$variables) {

  // if($variables['type'] == 'article' && $variables['view_mode'] == 'teaser') $variables['comment'] = 1;

  // Remove node titles for certain custom view modes.
  if($variables['type'] == 'image_record') {
    if (
      $variables['view_mode'] == 'photo_banner'
      || $variables['view_mode'] == 'photo_display'
      || $variables['view_mode'] == 'photo_thumbnail'
    ) {
      // Hide the node elements before the node is getting rendered.
      $variables['title'] = NULL;
    }
  }

  if($variables['type'] == 'article' && $variables['view_mode'] == 'teaser') {
    $variables['attributes_array']['class'][] = 'sharethis-abbreviated';
  }

  // Add a span to the first word of node titles
  // $node_words = explode(' ', $variables['title']);
  // $node_words[0] = '<span class="first">' . $node_words[0] . '</span>';
  // $variables['title'] = implode(' ', $node_words);

  // Format date
  $variables['date'] = t('@date', array('@date' => date("F j, Y", $variables['created'])));

  // Turn off submission line (author and date) in teasers.
  if($variables['view_mode'] == 'teaser') {
    $variables['display_submitted'] = FALSE;
  }

  // Add a CSS class with the name of the view mode, if not a teaser 
  if ($variables['view_mode'] != 'teaser') {
    $variables['attributes_array']['class'][] = 'node-' . $variables['view_mode'];
  }

  // Author display name instead of username on nodes
  $node = $variables['node'];
  $author = user_load($node->uid);

  $display_names = field_get_items('user', $author, 'field_display_name'); 
  $variables['display_name'] = !empty($display_names[0]['value']) ? check_plain($display_names[0]['value']) : '';

  $userpath = field_get_items('user', $author, 'uid');
  $variables['user_path'] = 'user/' . $userpath;
  
  // Hiding 'add new comment' from links array
  if (isset($variables['content']['links'])) {
    unset($variables['content']['links']['comment']['#links']['comment-add']);
  }

  // Hiding "x new comment(s)" from links array in article teasers
  if($variables['type'] == 'article' && $variables['view_mode'] == 'teaser') {
    unset($variables['content']['links']['comment-new-comments']['#links']['title']);
  }

}