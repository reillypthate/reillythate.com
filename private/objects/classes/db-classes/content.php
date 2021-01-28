<?php
namespace Trick;
use Trick\DB_Manager;
use Trick\Interfaces\SlugSet;
use Trick\Traits\SlugSetTrait;

/*/
/*  Content
/*/

/**
 *  A master class used to manage how content is related in this site.
 *  A master class used to manage all dynamic content in this site.
 */
class Content extends DB_Manager implements SlugSet
{
    /**
     * Content stores its ContentJoin objects in this array.
     */
    protected $joins;

    /**
     * Construct the DB Manager for Content and the respective join tables.
     */
    function __construct()
    {
        parent::__construct("content");

        $this->fetchContentJoinTables();
    }

    /**
     * 
     */
    private function fetchContentJoinTables()
    {
        global $data;

        $this->joins = array();
        $this->joins[IMAGE] = $data[IMAGE]->fetchContentJoinTable();
        $this->joins[VIDEO] = $data[VIDEO]->fetchContentJoinTable();
        $this->joins[ENTITY] = $data[ENTITY]->fetchContentJoinTable();
        $this->joins[TAG] = $data[TAG]->fetchContentJoinTable();
    }

    use SlugSetTrait;

    function getTags()
    {
        return $this->tags->getTable();
    }
    function tagNameById($tag_id)
    {
        return $this->db[CONTENT::$_TAG]->getTable()[$tag_id]['name'];
    }
    /**
     *  Return the array of tag(s) associated with a specific content.
     *  Grab the names in order.
     */
    function getTagsForContent($slug)
    {
        $t = array();

        foreach($this->joinTables['tag'][$slug]['tag'] as $key=>$tag_id)
        {
            array_push($t, strtoupper($this->tagNameById($tag_id)));
        }

        return $t;
    }
    function getImagesForContent($slug)
    {
        $i = array();

        if(!isset($this->images->getContentJoinTable()[$slug]))
        {
            return $i;
        }
        foreach($this->images->getContentJoinTable()[$slug]['image'] as $key=>$image_id)
        {
            array_push($i, $this->images->getRowFromId($image_id));
        }

        return $i;
    }

    function getPosts()
    {
        return $this->blogPosts->getTable();
    }

    function getBlogsForContent($slug)
    {
        $b = array();

        if(!isset($this->blogPosts->getContentJoinTable()[$slug]))
        {
            return $b;
        }
        
        foreach($this->blogPosts->getContentJoinTable()[$slug]['post'] as $key=>$post_id)
        {
            array_push($b, $this->blogPosts->getRowFromId($post_id));
        }

        return $b;
    }

/**
 * Required Abstract Functions
 */
    /**
     *  Format request values so they can be properly added to 
     *  the `directory` table.
     */
    protected function formatAddValues($request_values)
    {
        //  Step 1: Strip the $request_values with the db_dir_ prefix.
        $addValues = stripPrefix("db_dir_", $request_values);

        print_r($addValues);
    }
    /**
     *  Format request values so the appropriate row can be properly
     *  updated in the `directory` table.
     */
    protected function formatUpdateValues($request_values)
    {
        //  Step 1: Strip the $request_values with the db_dir_ prefix.
        $updateValues = stripPrefix("db_dir_", $request_values);
    }
}

?>