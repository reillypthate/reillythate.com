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

/*
*   Called from "includes/blog-gallery.php".
*
*   Placeholder function until I establish a better way of importing
*   compound assets.
*/
function blogParallaxPreview($postId, $parallaxStrength=-1, $attributes=null)
{
    global $data;

    $blogPost = $data[BLOG]->getRowFromId($postId);

    $bannerSlug = $data[IMAGE]->slugById($blogPost['banner']);

    // print_r($blogPost);
    // die();

    include(INCLUDES . "/blog-post-preview.php");
}

/**
 *  Grab data necessary to build the blog post page. 
 */
function blogPost($postSlug, $attributes=null)
{
    global $data;

    $blogPost = $data[BLOG]->getRowFromId(
        $data[BLOG]->idBySlug($postSlug)
    );

    $blogPost['image_slug'] = $data[IMAGE]->slugById($blogPost['banner']);
    $blogPost['body'] = $data[BLOG]->getPostBody($blogPost['body_id']);
    $parallaxStrength = -1;

    include(INCLUDES . '/blog-post-page.php');
}
?>