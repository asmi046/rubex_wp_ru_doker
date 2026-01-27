<?php
  $post = $wp_query->post;
 
  if (in_category('117')) {
      include(TEMPLATEPATH.'/single-tender.php');
  } elseif(in_category('173')) {
      include(TEMPLATEPATH.'/single-news.php');
  } else {
      include(TEMPLATEPATH.'/single-default.php');
  }
?>