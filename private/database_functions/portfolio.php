<?php
namespace Trick;
use Trick\DB_Functions;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Site Directory.
**/
class Portfolio extends DB_Functions
{
    function __construct()
    {
        $this->table = $this->fetchJoinTable('portfolio');
        $this->table = $this->setKeysAsSlug($this->table);
    }
    private function fetchJoinTable($mainTable)
    {
        global $conn;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select('c.id AS content_id', 'c.slug as content_slug', 'i.id as image_id', 'i.slug as image_slug')
            ->from($mainTable, 'p')
            ->innerJoin('p', 'site_content', 'c', 'p.content_id=c.id')
            ->innerJoin('p', 'image_directory', 'i', 'p.image_id=i.id');
        
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
            $a[$row['content_slug']] = $row;
            //unset($a[$row['content_id']]['content_id']);
        }

        return $a;
    }
}