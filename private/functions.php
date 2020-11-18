<?php 

    /**
     * Use database functions to build a URL to a specific directory.
     * Each directory has its own index.php file.
     * 
     * If OB_Conversion is set, we'll have an absolute link to the page.
     */
    function linkToPage($page_title)
    {
        global $to_static;

        if($to_static == true)
        {
            return "http://" . buildURL(getPageIdFromPageTitle($page_title));
        }
        return "/" . buildURL(getPageIdFromPageTitle($page_title));

        ////Hard-coded template for page-specific methods (linkToHomePage(), etc).
        //  global $to_static;
        //  if($to_static == true)
        //      return "http://reillythate.com";
        //  return PROJECT_PATH;
    }
    /**
     * Use database functions to build a URL to the Images directory
     * and appand the $image filename to it.
     */
    function linkToImage($image)
    {
        return linkToPage("Images") . "/" . $image;
    }
?>