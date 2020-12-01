<?php
/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
 * + db_getSiteDirectory()
 * + getPageDescriptionFromTitle($page_title)
 * + getPageRobotsFromPageTitle($page_title)
 * + getPageIdFromPageTitle($page_title)
 * + buildURL($page_id)
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Site Directory.
**/
class DirectoryTable extends DB_Functions
{
    function __construct()
    {
        parent::__construct("site_directory");
    }

    public function getRowFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug);
    }

    // META functions.
    /**
    * Return the `title` of the page associated with the $page_slug.
    */
    public function getTitleFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['title'];
    }
    public function getDescriptionFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['description'];
    }
    public function getRobotsFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['robots'];
    }

    // TABLE functions.
    public function getIdFromSlug($page_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug)['id'];
    }
    /**
     * A recursive function that constructs a URL backwards from a particular page in the `directory`.
     * 
     * Note: As constructed, this function returns a url for a STATIC site.
     */
    public function buildURL($page_id)
    {
        if($page_id == -1)
        {
            return "Error: Invalid page id. (If used w/ getPageIdFromPageTitle(...), check spelling of passed variable)";
        }

        // 1st, find the url associated with the $page_id and get the p_id.
        // ($page_id - 1) corresponds to $site_directory row index (if ordered by ID).
        $path_chunk = $this->table[$page_id - 1]['slug'];
        $parent_dir = $this->table[$page_id - 1]['p_id'];

        if($parent_dir) // If not null, it's a sub-directory. Continue recursion.
        {
            return $this->buildURL($parent_dir) . "/" . $path_chunk;
        }
        // $parent_dir is null; this is the website root. End recursion.
        return $path_chunk;
    }
    public function getLinkStack($page_id, $stack)
    {
        if($page_id == -1)
        {
            return "Error: Invalid page id.";
        }

        $current_link = array($this->table[$page_id - 1]['title'], $this->linkToPage($this->table[$page_id - 1]['slug']));
        array_push($stack, $current_link);

        $parent_dir = $this->table[$page_id - 1]['p_id'];

        if($parent_dir) // If not null, it's a sub-directory. Continue recursion.
        {
            return $this->getLinkStack($parent_dir, $stack);
        }
        // $parent_dir is null; this is the website root. End recursion.
        return $stack;
    }

    public function linkToPage($page_slug)
    {
        global $to_static;

        if($to_static == true)
        {
            return "http://" . $this->buildURL($this->getIdFromSlug($page_slug));
        }
        return "/" . $this->buildURL($this->getIdFromSlug($page_slug));

    }
    public function linkToImage($image)
    {
        return $this->linkToPage("images") . "/" . $image;
    }
}
?>