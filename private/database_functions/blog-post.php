<?php
namespace Trick;
use Trick\DB_Functions;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Blog Posts.
**/
class BlogPost extends DB_Functions
{
    protected $slugSet;
    protected $idSet;

    function __construct()
    {
        $this->table = $this->fetchPostTableWithContent();
        $this->table = $this->setKeysAsSlug($this->table);
        
        foreach($this->table as $key=>$value)
        {
            $body = json_decode($value['body'], true);
            $this->table[$key]['body'] = $body;

            //echo json_last_error() . PHP_EOL;
            //echo json_last_error_msg() . PHP_EOL;
        }

        $this->table_name = 'post';
        $this->contentJoinTable = $this->fetchContentJoinTable();
        $this->contentJoinTable = $this->groupElementsByContent();
        
        $this->buildSlugSet();
        $this->buildIdSet();
    }
    
    /**
     * Specialized join table function.
     */
    private function fetchPostTableWithContent()
    {
        global $conn;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select('p.id AS id', 'c.slug as slug', 'c.title as title', 'c.summary as summary', 'i.id as image_id', 'i.slug as image_slug', 'p.read_time as read_time', 'p.created_at as created_at', 'p.updated_at as updated_at', 'p.published as published', 'p.body as body')
            ->from('post', 'p')
            ->innerJoin('p', 'content', 'c', 'p.content_id=c.id')
            ->innerJoin('p', 'image', 'i', 'p.image_id=i.id');
        
        try
        {
            $result = $qb->execute();
        }catch(Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
            
            $_SESSION['message'] = "Error involved: " . $e->getMessage() . ".";
            header('location: index.php');

            echo $e->getMessage() . PHP_EOL;
            die(-1);
        }

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function setKeysAsSlug($table)
    {
        $a = array();

        foreach($table as $key=>$row)
        {
            $a[$row['slug']] = $row;
            //unset($a[$row['content_id']]['content_id']);
        }

        return $a;
    }

    /**
     * Create a lookup table that returns the post's id.
     */
    private function buildSlugSet()
    {
        $this->slugSet = array();

        foreach($this->table as $key=>$row)
        {
            $this->slugSet[$row['slug']] = $row['id'];
        }
    }
    /**
     * Create a lookup table that returns the post's slug.
     */
    private function buildIdSet()
    {
        $this->idSet = array();

        foreach($this->table as $key=>$row)
        {
            $this->idSet[$row['id']] = $row['slug'];
        }
    }
    // TABLE functions.
    public function getIdFromSlug($post_slug)
    {
        return $this->slugSet[$post_slug];
    }

    public function getRowFromId($content_id)
    {
        return $this->table[$this->idSet[$content_id]];
    }
}