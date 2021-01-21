<?php
    //  Checks to see if page has been designated for static conversion.
    if(isset($_GET['html-refresh']))
    {
        $to_static = true;
    }else
    {
        $to_static = false;
    }
    /**
     * User-Defined callback function that replaces the server working root directory with a static root directory.
     */
    function callback($buffer)
    {
        return (str_replace("/reillythate.com", "http://reillythate.com", $buffer));
    }
?>