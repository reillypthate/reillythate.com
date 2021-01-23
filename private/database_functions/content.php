<?php

use Trick\DB_Functions;
use Trick\Directory as D;
use Trick\Image as I;
use Trick\Portfolio as P;
use Trick\Tags as T;
use Trick\Video as V;
use Trick\Entity as E;
use Trick\BlogPost as BP;

require_once('directory.php');
require_once('image.php');
require_once('portfolio.php');
require_once('tags.php');
require_once('video.php');
require_once('entity.php');

require_once('blog-post.php');

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
    protected $images;
    protected $gallery;
    protected $portfolio;
    protected $tags;
    protected $videos;
    protected $entities;

    protected $blogPosts;

    function __construct()
    {
        parent::__construct("content", true);
        $this->directory = new D();
        $this->images = new I();
        $this->portfolio = new P();
        $this->tags = new T();
        $this->videos = new V();
        $this->entities = new E();
        $this->blogPosts = new BP();

        //print_r($this->table);
        //print_r($this->directory->getTable());
        //print_r($this->portfolio->getTable());
        //print_r($this->tags->getContentTags());
        //print_r($this->videos->getContentVideos());
    }

    public function getRowFromSlug($content_slug)
    {
        return $this->getRowFromCellValue("slug", $content_slug);
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
     * Retrieves the table for the given element.
     * If $element is empty, return the $content table.
     */
    public function getTable($element=null)
    {
        switch($element)
        {
            case 'directory': return $this->directory->getTable();
            case 'image': return $this->images->getTable();
            case 'portfolio': return $this->portfolio->getContentJoinTable();
            case 'tag': return $this->tags->getTable();
            case 'video': return $this->videos->getTable();
            case 'entity': return $this->entities->getTable();
            default: return parent::getTable();
        }
    }
    public function elementBySlug($element, $elementSlug)
    {
        switch($element)
        {
            case 'portfolio': die("The \"" . $element . "\" table has no slug column!");
            case 'image': return $this->getTable($element)[$this->images->getIdFromSlug($elementSlug)];
            case 'tag': die("The \"" . $element . "\" table has no slug column!");
            case 'video':die("The \"" . $element . "\" table has no slug column!");
            case 'entity': die("The \"" . $element . "\" table has no slug column!");
            case 'blogPost': return $this->blogPosts->getRowFromId($this->blogPosts->getIdFromSlug($elementSlug));
            default: return $this->getTable($element)[$elementSlug];
        }
    }
    public function getContentJoin($element)
    {
        switch($element)
        {
            case 'directory': die("X"); return null;
            case 'content': die("Y"); return null;
            case 'image': return $this->images->getContentJoinTable();
            case 'portfolio': return $this->portfolio->getContentJoinTable();
            case 'tag': return $this->tags->getContentJoinTable();
            case 'video': return $this->videos->getContentJoinTable();
            case 'entity': return $this->entities->getContentJoinTable();
            case 'blogPost': return $this->blogPosts->getContentJoinTable();
            default: die("Z"); return null;
        }
    }
    public function contentBySlug($element, $contentSlug)
    {
        switch($element)
        {
            case 'directory': return null;
            case 'content': return null;
            default: return $this->getContentJoin($element)[$contentSlug];
        }
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
    
    function getImages()
    {
        return $this->images->getTable();
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

    function getBlogPosts()
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

}

?>