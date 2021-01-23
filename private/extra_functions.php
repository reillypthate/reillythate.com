<?php
    /**
     *  Recurring function, used to add attributes to an auto-generated element.
     */
    function echoAttributes($attributes)
    {
        if($attributes == "")
        {
            return;
        }
        foreach($attributes as $attribute=>$value)
        {
            echo " " . $attribute . "=\"" . $value . "\"";
        }
    }
    /**
     * Build an <img> element using an image slug.
     * Takes an optional attributes argument, an associative array of attribute
     * keys and their values.
     */
    function img($imageSlug, $attributes="")
    {
        global $content;
        
        $img = $content->elementBySlug('image', $imageSlug);
        $img_src = li($img['name']);
        $img_alt = $img['alt'];

        if(isset($img['srcset']))
        {
            $img_srcset = json_decode($img['srcset'], true);
            $s = array();
            foreach($img_srcset as $key=>$value)
            {
                $src = IMAGE_PATH . '/' . $img['path'] . '/' . $img['name'] . '-' . $key . $img['type'];
                $imgSrc = IMAGE_PATH . '/' . $img['path'] . '/' . $img['name'] . '-' . $key . $img['type'];

                array_push($s, $src . ' ' . $value);
            }
        }
        
        include("includes/image.php");
    }
    function video($videoId, $attributes="")
    {
        global $content;

        $video = $content->getVideos()[$videoId]; //->getRowFromId($videoId);
        
        if(isset($video['attributes']))
        {
            $video_attributes = json_decode($video['attributes'], true);
        }

        include("includes/video.php");
    }
    function entity($entityId, $attributes="")
    {
        global $content;

        $entity = $content->getEntities()[$entityId];

        if(isset($entity['attributes']))
        {
            $entity_attributes = json_decode($entity['attributes'], true);
        }
        if(array_key_exists("script-name", $entity_attributes))
        {
            $entity_script = $entity_attributes['script-name'];
            unset($entity_attributes['script-name']);
        }

        include("includes/entity.php");
    }
    /**
     *  Generate a single tag, as a <p> element with class "tag".
     */
    function tag($tag, $attributes="")
    {
        include("includes/tag.php");
    }

    function portfolioPiecePreview($contentSlug, $parallaxStrength=-1, $attributes=null)
    {
        global $content;

        $portfolio = $content->contentBySlug('portfolio', $contentSlug);//getPortfolioPiece($contentSlug);
        $contentRow = $content->getTable()[$portfolio['content_id']];
        $imageSlug = $portfolio['image_slug'];

        include("includes/parallax/portfolio-piece-preview.php");
    }

    function portfolioPieceHeader($contentSlug, $parallaxStrength=-1, $attributes=null)
    {
        global $content;

        $portfolio = $content->contentBySlug('portfolio', $contentSlug);
        $contentRow = $content->getRowFromId($portfolio['content_id']);
        $imageSlug = $portfolio['image_slug'];

        include("includes/parallax/portfolio-piece-header.php");
    }

    function portfolioPieceVideos($contentSlug, $attributes=null)
    {
        global $content;

        $videos = $content->getVideosForContent($contentSlug);

        if(count($videos) == 0)
        {
            return;
        }
        include("includes/video-gallery.php");
    }

    function portfolioPieceEntities($contentSlug, $attributes=null)
    {
        global $content;

        $entities = $content->getEntitiesForContent($contentSlug);

        if(count($entities) == 0)
        {
            return;
        }
        include("includes/entity-gallery.php");
    }


    function portfolioPieceImages($contentSlug, $attributes=null)
    {
        global $content;

        $images = $content->getImagesForContent($contentSlug);

        if(count($images) == 0)
        {
            return;
        }
        include("includes/image-gallery.php");
    }

    
    function portfolioPieceBlogs($contentSlug, $attributes=null)
    {
        global $content;

        $blogPosts = $content->getBlogsForContent($contentSlug);

        if(count($blogPosts) == 0)
        {
            echo "<p>No blogs yet...</p>";
            return;
        }
        include("includes/blog-gallery.php");
    }
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