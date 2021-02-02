<?php
    //  Changes the header/footer nav menu options depending on whether
    //  the user is on the public site or the backend site.
    if(isset($NAV_SET))
    {
        if($NAV_SET == "admin")
        {
            $nav_slugs = array(
                "directory"=>"Directory", 
                "image-admin"=>"Image Manager",
                "video-admin"=>"Video Manager",
                //"blog-admin"=>"Blog Manager"
            );
            $footer_slugs = $nav_slugs;
        }
    }else
    {
        $nav_slugs = array(
            "portfolio"=>"Portfolio", 
            "blog"=>"Blog", 
            "about"=>"About"
        );
        $footer_slugs = array(
            "about"=>"About",
            "blog"=>"Blog", 
            "contact"=>"Contact",
            "portfolio"=>"Portfolio", 
            "admin"=>"Admin"
        );

        if(!$to_static)
        {
            $footer_slugs['admin'] = "Admin";
        }
    }

?>