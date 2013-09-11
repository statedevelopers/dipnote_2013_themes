<?php
/**
 * @file
 * Node template 
 *
 */
  // Standard elements to hide.
  hide($content['comments']);
  hide($content['links']);
  
  // Preprocess location.
  $location = $content['field_location'][0]['#location'];
  $location_array = array();
  if(!empty($location['city'])) $location_array[] = $location['city'];
  
  if($location['country'] == "us") {
    if(!empty($location['province'])) $location_array[] = $location['province'];
  } else {
    if(!empty($location['country_name'])) $location_array[] = $location['country_name'];
  }
  $location_string = implode(", ", $location_array);

  // Load title parts in array.
  $title_array = array(
    l($content['field_contributor_ref'][0]['#markup'], "node/" . $content['field_contributor_ref']['#items'][0]['target_id']),
  );
  
  // Load position title.
  if(!empty($title)) {
    $title_array[] = "serves as";
    $title_array[] = $content['field_position_article'][0]['#markup'];
    $title_array[] = $title;
  }
  
  // Load assignment.
  if(!empty($content['field_assignment'][0]['#markup'])) {
    // Check for missions.
    if(
      (stripos($content['field_assignment'][0]['#markup'], "embassy") !== FALSE)
      || (stripos($content['field_assignment'][0]['#markup'], "consulate") !== FALSE)
      || (stripos($content['field_assignment'][0]['#markup'], "mission") !== FALSE)
    ) {
      $title_array[] = "at the";
    } else {
      $title_array[] = "in the";
    }
    
    // Check for assignment URL.
    if(!empty($content['field_assignment_url'][0]['#href'])) {
      $title_array[] = l($content['field_assignment'][0]['#markup'],$content['field_assignment_url'][0]['#href']);
    } else {
      $title_array[] = $content['field_assignment'][0]['#markup'];
    }
  }
  
  // Load location.
  if(!empty($location_string)) {
    $title_array[] = " in " . $location_string;
  }
  
  // Assemble into a single sentence.
  $title_string = implode(" ", $title_array) . "."; 
    
?>
<span class="contributor-title">
  <?php print $title_string; ?>
</span>
