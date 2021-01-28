<?php

    /**
     *  Generate a single entity element.
     */
    function entity($entityId, $attributes="")
    {
        global $data;
        
        $entity = $data[ENTITY]->getRowFromId($entityId);

        if(isset($entity['attributes']))
        {
            $entity_attributes = json_decode($entity['attributes'], true);
        }
        if(array_key_exists("script-name", $entity_attributes))
        {
            $entity_script = $entity_attributes['script-name'];
            unset($entity_attributes['script-name']);
        }

        include(INCLUDES . "/entity.php");
    }
?>