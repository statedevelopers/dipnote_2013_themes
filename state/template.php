<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

function state_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 40;  // define size of the textfield
    // $form['search_block_form']['#weight'] = 2;
    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('Go'); // Change the text on the submit button

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    
    // Prevent user from searching the default text
    // $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

  } elseif ($form_id == 'comment_node_article_form') {
    unset($form['author']['name']);
  }
}

function state_more_link ($array) {
   if (stristr( $array['url'], 'aggregator'))
   {
      return "";
   }
}

/*
 */
function state_comment_form_alter(&$form, &$form_state) {
print_r($form); print "<br />form_id = $form_id<br />\n";
  //unset($form['name']);
  unset($form['author']['name']);
  //unset($form['comment_filter']['comment']['#title']);

  //return drupal_render($form);
}

/**
 * Implement template_preprocess
 *
 */
function state_preprocess_comment(&$variables) { 
//print "<h1>VARIABLES</h1>\n"; print_r($variables['content']['field_commenter_name']['#items']);print "<br />\n";
  // NAME: Reduce surnames to an initial, and remove middle initials and middle names. 
  $name_item = $variables['content']['field_commenter_name']['#items'][0];
  $namearray[] = array_shift(explode(" ",$name_item['given']));
  if(strlen($name_item['family'])) $namearray[] = $name_item['family'][0] . ".";
  $variables['content']['field_commenter_name'][0]['#markup'] = implode(" ", $namearray);

  // LOCATION: Show only the country if foreign, the state if domestic.
  if(!empty($variables['content']['field_commenter_location'])) {
    $location_item = $variables['content']['field_commenter_location']['#items'][0];
    if($location_item['country'] == 'us' && strlen($location_item['province_name'])) { 
      $variables['content']['field_commenter_location'][0]['#markup'] = $location_item['province_name'];
    } else {
      $variables['content']['field_commenter_location'][0]['#markup'] = $location_item['country_name'];
    }
  }
}

/**
 * Implement template_preprocess
 *
 */
function state_preprocess_search_result(&$variables) {
  $result = $variables['result'];
  $variables['info'] = $result['user'] . ' — ' . format_date($result['node']->created, 'short');
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function state_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'state') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function state_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

