<?php

use Trick\DB_Functions;
use Trick\Directory as D;
use Trick\Portfolio as P;
use Trick\Tags as T;
use Trick\Video as V;
use Trick\Entity as E;

require_once('directory_functions.php');
require_once('image_table_functions.php');
require_once('portfolio.php');
require_once('tags.php');
require_once('video.php');
require_once('entity.php');

require_once('card_functions.php');
require_once('post_functions.php');

/*/
/*  Content
/*/

/**
 *  A master class used to manage all dynamic content in this site.
 */
class Content extends DB_Functions
{
    protected $directory;
    protected $gallery;
    protected $portfolio;
    protected $tags;
    protected $videos;
    protected $entities;

    function __construct()
    {
        parent::__construct("site_content", true);
        $this->directory = new D();
        $this->gallery = new ImageTable();
        $this->portfolio = new P();
        $this->tags = new T();
        $this->videos = new V();
        $this->entities = new E();

        //print_r($this->table);
        //print_r($this->directory->getTable());
        //print_r($this->portfolio->getTable());
        //print_r($this->tags->getContentTags());
        //print_r($this->videos->getContentVideos());
    }

    public function getRowFromSlug($content_slug)
    {
        return $this->getRowFromCellValue("slug", $page_slug);
    }
    public function getRowFromId($content_id)
    {
        return $this->table[$content_id];
    }

    /**
     *  Return the Directory class for general use.
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     *  Return the Entity class for general use.
     */
    function getEntities()
    {
        return $this->entities->getTable();
    }
    function getEntitiesForContent($slug)
    {
        $v = array();

        if(!isset($this->entities->getContentEntities()[$slug]))
        {
            return $v;
        }
        foreach($this->entities->getContentEntities()[$slug]['entities'] as $key=>$entity_id)
        {
            array_push($v, $this->entities->getRowFromId($entity_id));
        }

        return $v;
    }
    /**
     *  Return the Portfolio class for general use.
     */
    function getPortfolio()
    {
        return $this->portfolio;
    }
    /**
     *  Return a specific portfolio piece.
     */
    function getPortfolioPiece($slug)
    {
        return $this->portfolio->getTable()[$slug];
    }
    function getTags()
    {
        return $this->tags->getTable();
    }
    function tagNameById($tag_id)
    {
        return $this->tags->getTable()[$tag_id]['name'];
    }
    /**
     *  Return the array of tag(s) associated with a specific content.
     *  Grab the names in order.
     */
    function getTagsForContent($slug)
    {
        $t = array();

        foreach($this->tags->getContentTags()[$slug]['tags'] as $key=>$tag_id)
        {
            array_push($t, strtoupper($this->tagNameById($tag_id)));
        }

        return $t;
    }

    function getVideos()
    {
        return $this->videos->getTable();
    }
    function getVideosForContent($slug)
    {
        $v = array();

        if(!isset($this->videos->getContentVideos()[$slug]))
        {
            return $v;
        }
        foreach($this->videos->getContentVideos()[$slug]['videos'] as $key=>$video_id)
        {
            array_push($v, $this->videos->getRowFromId($video_id));
        }

        return $v;
    }
    
}

?>