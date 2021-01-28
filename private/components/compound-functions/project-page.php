<?php

    /**
     *  Prepare the necessary data to build the project header.
     */
    function projectHeader($attributes=null)
    {
        global $data, $project, $projectContent;

        $videos = $projectContent[VIDEO];
        
        $bannerSlug = $data[IMAGE]->slugById($project['banner']);//$data[IMAGE]->getRowById($data[PORTFOLIO]->idBySlug($projectSlug));

        include(INCLUDES . "/parallax/project-header.php");
    }

    /**
     *  Prepare the necessary data to build the project entity gallery pane.
     */
    function projectEntities($attributes=null)
    {
        global $projectContent;

        $entities = $projectContent[ENTITY];

        if(isset($entities))
        {
            include(INCLUDES . "/entity-gallery.php");
        }
    }
    
    /**
     *  Prepare the necessary data to build the project image gallery pane.
     */
    function projectImages($attributes=null)
    {
        global $data, $projectContent;

        $images = $projectContent[IMAGE];

        if(isset($images))
        {
            include(INCLUDES . "/image-gallery.php");
        }
    }

    /**
     *  Prepare the necessary data to build the project post gallery pane.
     */
    function projectPosts($attributes=null)
    {
        global $data, $projectContent;

        $posts = $projectContent[BLOG];

        if(isset($posts))
        {
            include(INCLUDES . "/blog-gallery.php");
        }
    }
    /**
     *  Prepare the necessary data to build the project video gallery pane.
     */
    function projectVideos($attributes=null)
    {
        global $projectContent;

        $videos = $projectContent[VIDEO];

        if(isset($videos))
        {
            include(INCLUDES . "/video-gallery.php");
        }
    }

?>