<?php

$directory = db_getDirectory();

/**
 * 
 * Directory Functions
 * 
 */

function db_getDirectory()
{
    global $conn;

    $query = "SELECT * FROM `directory` ORDER BY `id` ASC";
    $result = $conn->query($query);

    if ($result->num_rows > 0)
    {
        $final_result = $result->fetch_all(MYSQLI_ASSOC);
        // print_r($final_result);
        return $final_result;
    }

    echo "Fail";
    return -1;
}
/**
 * Return the `description` of the page associated with the $page_title.
 * ! Case sensitive!
 */
function getPageDescriptionFromPageTitle($page_title)
{
    global $directory;

    foreach($directory as $key=>$page)
    {
        if($page['title'] == $page_title)
        {
            return $page['description'];
        }
    }

    return -1; // No page exists with this title.
}
function getPageRobotsFromPageTitle($page_title)
{
    global $directory;

    foreach($directory as $key=>$page)
    {
        if($page['title'] == $page_title)
        {
            if($page['robots'])
            {
                return $page['robots'];
            }
            return 0; // This page doesn't have a robots spec.
        }
    }

    return -1; // No page exists with this title.
}
/**
 * Return the `id` of the page associated with the $page_title.
 * ! Case sensitive!
 */
function getPageIdFromPageTitle($page_title)
{
    global $directory;

    foreach($directory as $key=>$page)
    {
        if($page['title'] == $page_title)
        {
            return $page['id'];
        }
    }

    return -1; // No page exists with this title.
}
/**
 * A recursive function that constructs a URL backwards from a particular page in the `directory`.
 * 
 * Note: As constructed, this function returns a url for a STATIC site.
 */
function buildURL($page_id)
{
    global $directory;

    if($page_id == -1)
    {
        return "Error: Invalid page id. (If used w/ getPageIdFromPageTitle(...), check spelling of passed variable)";
    }

    // 1st, find the url associated with the $page_id and get the p_id.
    // ($page_id - 1) corresponds to $directory row index (if ordered by ID).
    $path_chunk = $directory[$page_id - 1]['path'];
    $parent_dir = $directory[$page_id - 1]['p_id'];

    if($parent_dir) // If not null, it's a sub-directory. Continue recursion.
    {
        return buildURL($parent_dir) . "/" . $path_chunk;
    }
    // $parent_dir is null; this is the website root. End recursion.
    return $path_chunk;
}

?>