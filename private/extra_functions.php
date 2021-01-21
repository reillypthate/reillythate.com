<?php
    function echoAttributes($attributes)
    {
        foreach($attributes as $attribute=>$value)
        {
            echo " " . $attribute . "=\"" . $value . "\"";
        }
    }
    /**
     * Build an <img> element using an image slug.
     * Takes an optional attributes argument, an associative array of attribute keys and their values.
     */
    function img($imageSlug, $attributes=null)
    {
        global $directory_table, $image_table;
        
        $img = $image_table->getRowFromImageSlug($imageSlug);
        $img_src = $directory_table->linkToImage($img['name']);
        $img_alt = $img['alt'];

        if(isset($img['srcset']))
        {
            $img_srcset = json_decode($img['srcset'], true);
            $img_src = $directory_table->linkToImage($img['path'] . '/' . $img['name'] . "_M" . $img['type']);
        }

        if(isset($attributes))
        {
            $att = $attributes;
        }
        
        include("functions/image.php");
    }
?>