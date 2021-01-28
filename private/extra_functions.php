<?php

    
    function blogPostPreview($blogPost, $parallaxStrength=-1, $attributes=null)
    {
        global $content;
        
        include("includes/blog-post-preview.php");
    }

    function blogPost($postSlug)
    {
        global $content;

        $blogPost = $content->getBlogPosts('blogPost', $postSlug)[$postSlug];

        $parallaxStrength = -1;

        include("includes/blog-post-page.php");
    }
?>