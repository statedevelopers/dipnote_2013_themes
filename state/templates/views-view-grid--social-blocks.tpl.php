<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
 $social_id = array();
 $social_id[0][0] = "twitter";
 $social_id[0][1] = "youtube";
 $social_id[0][2] = "flickr";
 $social_id[1][0] = "facebook";
 $social_id[1][1] = "googleplus";
 $social_id[1][2] = "tumblr";
 
 
?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="<?php print $class; ?>"<?php print $attributes; ?>>
    <?php foreach ($rows as $row_number => $columns): ?>
      <div <?php if ($row_classes[$row_number]) { print 'class="row ' . $row_classes[$row_number] .' clearfix"';  } ?>>
        <?php foreach ($columns as $column_number => $item): ?>
          <div id="<?php print "social-block-" . $social_id[$row_number][$column_number]; ?>" <?php if ($column_classes[$row_number][$column_number]) { print 'class="views-row ' . $column_classes[$row_number][$column_number] .'"';  } ?>>
            <div class="row-wrapper">
              <?php print $item; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
</div>
