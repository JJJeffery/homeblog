<?php 
$pageId = $post->ID;
//$_SESSION['unik_page_id'] = $pageId;

$get_meta = get_post_custom($post->ID);

//$weblusive_sidebar_pos = $get_meta["_weblusive_sidebar_pos"][0];
get_template_part( 'library/includes/page-head' );
get_template_part( 'inner-header', 'content'); 
?>

