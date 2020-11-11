<?php 

    /**
     * Links to the home page.
     * If OB_Conversion is set, we'll have an absolute link to the page.
     */
    function linktoHomePage()
    {
        global $to_static;

        if($to_static == true)
            return "http://reillythate.com";
        return PROJECT_PATH;
    }
    function linkToAboutPage()
    {
        global $to_static;

        if($to_static == true)
            return "http://reillythate.com/about/";
        return PROJECT_PATH . "/about"; 
    }
    function linkToBlogPage()
    {
        global $to_static;

        if($to_static == true)
            return "http://reillythate.com/blog/";
        return PROJECT_PATH . "/blog"; 
    }

    function linkToImage($image)
    {
        global $to_static;

        if($to_static == true)
            return "http://reillythate.com/static/" . $image;
        return PROJECT_PATH . "/static/images/" . $image;
    }
?>