<?php
/**
 *  Grab the data needed to create a Blog Post preview and include the
 *  respective html code.
 */
function blogPreview($postSlug)
{
    global $data;

    $post = $data[BLOG]->getRowFromId(
        $data[BLOG]->idBySlug($postSlug)
    );
    $postLink = $data[BLOG]->linkToBlog($postSlug);

    $time_html = date("Y-m-d H:i:s.000", strtotime($post['updated_at']));
    $time_normal = date("M j, Y", strtotime($post['updated_at']));
    $read_time = $post['read_time'];
    if($read_time < 1)
    {
        $read_time = "< 1 min Read";
    }else
    {
        $read_time = $read_time . " min Read";
    }

    include(INCLUDES . "/blog/post-preview.php");
}
?>