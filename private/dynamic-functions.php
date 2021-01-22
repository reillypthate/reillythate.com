<?php
//  Link Fetching

    function l($slug)
    {
        global $content;

        return $content->getDirectory()->linkBySlug($slug);
    }
    /**
     *  Return a link to an image.
     */
    function li($slug)
    {
        global $content;

        return $content->getDirectory()->linkToImage($slug);
    }
    /**
     *  Create a good old-fashioned anchor tag from a given page slug.
     */
    function to($slug, $innerText=null)
    {
        global $content;

        $href = $content->getDirectory()->linkBySlug($slug);

        include("includes/link.php");
    }
    function page($slug)
    {
        global $content;

        return $content->getDirectory()->getRowFromSlug($slug);
    }

?>