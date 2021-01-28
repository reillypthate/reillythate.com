<?php

    /**
     *  Generate a container for videos, as an <ol> element.
     */
    //function tagSet($tagSet, $attributes="")
    //{
    //    include(INCLUDES . "/tagSet.php");
    //}
    /**
     *  Generate a single video element.
     */
    function video($videoId, $attributes="")
    {
        global $data;
        
        $video = $data[VIDEO]->getRowFromId($videoId);

        if(isset($video['attributes']))
        {
            $video_attributes = json_decode($video['attributes'], true);
        }

        include(INCLUDES . "/video.php");
    }

?>