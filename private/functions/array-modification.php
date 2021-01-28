<?php

/**
 *  Take an array with any number of values, remove any elements without keys 
 *  that have the given prefix, and then reduce the keys by removing the prefix.
 *  @var $prefixToStrip = The prefix to strip from the keys.
 *  @var $array = The array we'll reduce.
 */
function stripPrefix($prefixToStrip, $array)
{
    $stripped = array();
    foreach($array as $key=>$value)
    {
        if(str_contains($key, $prefixToStrip))
        {
            $stripped_key = str_replace($prefixToStrip, "", $key);
            $stripped[$stripped_key] = $value;
        }
    }
    return $stripped;
}

?>