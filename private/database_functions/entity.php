<?php
namespace Trick;
use Trick\DB_Functions;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Site Directory.
**/
class Entity extends DB_Functions
{
    protected $content_entities;

    function __construct()
    {
        parent::__construct("entity", true);
        
        $this->content_entities = $this->fetchJoinTable('content_entity');

        $this->content_entities = $this->groupEntitiesByContent($this->content_entities);
    }

    public function getRowFromId($content_id)
    {
        return $this->table[$content_id];
    }

    private function fetchJoinTable($mainTable)
    {
        global $conn;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select('c.id AS content_id', 'c.slug as content_slug', 'e.id as entity_id, j.position as position')
            ->from($mainTable, 'j')
            ->innerJoin('j', 'content', 'c', 'j.content_id=c.id')
            ->innerJoin('j', 'entity', 'e', 'j.entity_id=e.id')
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
     *  its respective id and a numerical array of entity id's.
     */
    private function groupEntitiesByContent($table)
    {
        $a = array();

        foreach($table as $key=>$row)
        {
            if(array_key_exists($row['content_slug'], $a))
            {
                $a[$row['content_slug']]['entities'][$row['position']] = $row['entity_id'];
            }else
            {
                $a[$row['content_slug']] = array(
                    "content_id"=>$row['content_id'],
                    "entities"=>array(
                        $row['position']=>$row['entity_id']
                    )
                );
            }
        }
        return $a;
    }

    /**
     *  Return the associative array defined by the join process.
     */
    public function getContentEntities()
    {
        return $this->content_entities;
    }
}