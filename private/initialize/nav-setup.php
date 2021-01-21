<?php
    //  Changes the header/footer nav menu options depending on whether
    //  the user is on the public site or the backend site.
    if(isset($NAV_SET))
    {
        if($NAV_SET == "admin")
        {
            $nav_slugs = array("directory", "media", "card", "blog-admin");
            $footer_slugs = $nav_slugs;
        }
    }else
    {
        $nav_slugs = array("portfolio", "blog", "about");
        $footer_slugs = array("about", "blog", "contact", "portfolio");
        if(!$to_static)
        {
            array_push($footer_slugs, "admin");
        }
    }

?>