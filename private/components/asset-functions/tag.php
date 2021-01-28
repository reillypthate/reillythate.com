<?php

    /**
     *  Generate a container for tags, as an <ol> element.
     */
    function tagSet($tagSet, $attributes="")
    {
        include(INCLUDES . "/tagSet.php");
    }
    /**
     *  Generate a single tag, as a <p> element with class "tag".
     */
    function tag($tagId, $attributes="")
    {
        global $data;

        $tag = $data[TAG]->getRowFromId($tagId);

        include(INCLUDES . "/tag.php");
    }
?>