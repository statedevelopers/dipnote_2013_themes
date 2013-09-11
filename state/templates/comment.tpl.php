<?php
/**
 * @file
 * Customized template to display a single comment. 
 * Most of the elements have been removed.
 *
 * $author: Comment author. Can be link or plain text.
 * $content: An array of comment items. Use render($content) to print them all, or print a subset such as render($content['field_example']). Use hide($content['field_example']) to temporarily suppress the printing of a given element.
 * $created: Formatted date and time for when the comment was created. Preprocess functions can reformat it by calling format_date() with the desired parameters on the $comment->created variable.
 * $changed: Formatted date and time for when the comment was last changed. Preprocess functions can reformat it by calling format_date() with the desired parameters on the $comment->changed variable.
 * $new: New comment marker.
 * $permalink: Comment permalink.
 * $submitted: Submission information created from $author and $created during template_preprocess_comment().
 * $picture: Authors picture.
 * $signature: Authors signature.
 * $status: Comment status. Possible values are: comment-unpublished, comment-published or comment-preview.
 * $title: Linked title.
 * $classes: String of classes that can be used to style contextually through CSS. It can be manipulated through the variable $classes_array from preprocess functions. The default values can be one or more of the following:
 */
?>

<div class="<?php print $classes . ' ' . $zebra; ?>"<?php print $attributes; ?>>

  <div class="clearfix">

    <div class="author-location clearfix">
      <?php print render($content['field_commenter_name']); ?>
      <?php if(isset($content['field_commenter_location']))
        print '<div class="separator">|</div>' . render($content['field_commenter_location']);
      ?>
    </div>

    <div class="posted">
      <?php print date('F j, Y', $content['comment_body']['#object']->changed); ?>
    </div>

  <?php if ($new): ?>
    <span class="new"><?php print drupal_ucfirst($new) ?></span>
  <?php endif; ?>

    <div class="content"<?php print $content_attributes; ?>>
      <?php hide($content['links']); print render($content['comment_body']['#object']->comment_body['und'][0]['safe_value']); ?>
    </div>
    
  </div>

  <?php print render($content['links']) ?>
</div>

