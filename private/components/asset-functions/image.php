<?php

/**
 * Build an <img> element using an image slug.
 * Takes an optional attributes argument, an associative array of attribute
 * keys and their values.
 */
function img($imageSlug, $attributes="")
{
    global $data, $content;
    
    $img = $data[IMAGE]->getRowFromId(
        $data[IMAGE]->idBySlug($imageSlug)
    );

    $img_src = $data[DIRECTORY]->linkBySlug('images') . $data[IMAGE]->linkToImage($imageSlug);

    if(isset($img['srcset']))
    {
        $img_srcset = json_decode($img['srcset'], true);
        $s = array();
        foreach($img_srcset as $key=>$value)
        {
            $src = IMAGE_PATH . '/' . $img['path'] . '/' . $img['name'] . '-' . $key . $img['type'];
            $imgSrc = IMAGE_PATH . '/' . $img['path'] . '/' . $img['name'] . '-' . $key . $img['type'];
    
            array_push($s, $src . ' ' . $value);
        }
    }

    $img_alt = $img['alt'];
    
    include(INCLUDES . "/image.php");
}

/**
 * Build an <img> element using an image slug.
 * Takes an optional attributes argument, an associative array of attribute
 * keys and their values.
 */
function picture($imageSlug, $attributes="")
{
    global $data, $content;

    $img = $data[IMAGE]->getRowFromId(
        $data[IMAGE]->idBySlug($imageSlug)
    );

}

?>