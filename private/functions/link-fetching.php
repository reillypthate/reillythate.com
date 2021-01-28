<?php
//  Link Fetching

function l($slug)
{
    global $data;

    return $data[DIRECTORY]->linkBySlug($slug);
}
/**
 *  Return a link to an image.
 */
function li($slug)
{
    global $data;

    return $data[DIRECTORY]->linkBySlug('images') . $data[IMAGE]->linkToImage($slug);
}
/**
 *  Create a good old-fashioned anchor tag from a given page slug.
 */
function to($slug, $innerText=null)
{
    global $data;

    return $data[DIRECTORY]->linkBySlug($slug);

    include("includes/link.php");
}
function page($slug)
{
    global $data;

    return $data[DIRECTORY]->getRowFromSlug($slug);
}

?>