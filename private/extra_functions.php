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
     * Takes an optional attributes argument, an associative array of attribute keys and their values.
     */
    function img($imageSlug, $attributes="")
    {
        global $image_table;
        
        $img = $image_table->getRowFromImageSlug($imageSlug);
        $img_src = li($img['name']);
        $img_alt = $img['alt'];

        if(isset($img['srcset']))
        {
            $img_srcset = json_decode($img['srcset'], true);
            $img_src = li($img['path'] . '/' . $img['name'] . "_M" . $img['type']);
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

        $portfolio = $content->getPortfolioPiece($contentSlug);
        $contentRow = $content->getRowFromId($portfolio['content_id']);
        $imageSlug = $portfolio['image_slug'];

        include("includes/parallax/portfolio-piece-preview.php");
    }
    function portfolioPieceHeader($contentSlug, $parallaxStrength=-1, $attributes=null)
    {
        global $content;

        $portfolio = $content->getPortfolioPiece($contentSlug);
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
?>