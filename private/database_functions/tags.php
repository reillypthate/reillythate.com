<?php
namespace Trick;
use Trick\DB_Functions;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Site Directory.
**/
class Tags extends DB_Functions
{
    protected $content_tags;

    function __construct()
    {
        parent::__construct("tag", true);

        $this->content_tags = $this->fetchJoinTable('content_tag');
        $this->content_tags = $this->groupTagsByContent($this->content_tags);
        //$this->table = $this->setKeysAsSlug($this->table);
    }
    private function fetchJoinTable($mainTable)
    {
        global $conn;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select('c.id AS content_id', 'c.slug as content_slug', 't.id as tag_id, j.position as position')
            ->from($mainTable, 'j')
            ->innerJoin('j', 'content', 'c', 'j.content_id=c.id')
            ->innerJoin('j', 'tag', 't', 'j.tag_id=t.id')
            ->orderBy('c.slug', 'ASC')
            ->addOrderBy('j.position', 'ASC')
        ;
        
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
    /**
     *  Builds an associative array where each content_slug value corresponds to
     *  its respective id and a numerical array of tag id's.
     */
    private function groupTagsByContent($table)
    {
        $a = array();

        foreach($table as $key=>$row)
        {
            if(array_key_exists($row['content_slug'], $a))
            {
                $a[$row['content_slug']]['tags'][$row['position']] = $row['tag_id'];
            }else
            {
                $a[$row['content_slug']] = array(
                    "content_id"=>$row['content_id'],
                    "tags"=>array(
                        $row['position']=>$row['tag_id']
                    )
                );
            }
        }
        return $a;
    }

    /**
     *  Return the associative array defined by the join process.
     */
    public function getContentTags()
    {
        return $this->content_tags;
    }
}