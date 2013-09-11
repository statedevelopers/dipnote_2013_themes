<?php
  // Stripped down template to simplify teaser markup
  hide($content['title']);
  hide($content['comments']);
  hide($content['links']);
  print render($content);
?>
