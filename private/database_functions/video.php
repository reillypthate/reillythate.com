<?php
namespace Trick;
use Trick\DB_Functions;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Site Directory.
**/
class Video extends DB_Functions
{
    protected $content_videos;

    function __construct()
    {
        parent::__construct("video", true);
        
        $this->content_videos = $this->fetchJoinTable('content_video');

        $this->content_videos = $this->groupVideosByContent($this->content_videos);
        //$this->table = $this->setKeysAsSlug($this->table);
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
            ->select('c.id AS content_id', 'c.slug as content_slug', 'v.id as video_id, j.position as position')
            ->from($mainTable, 'j')
            ->innerJoin('j', 'site_content', 'c', 'j.content_id=c.id')
            ->innerJoin('j', 'video', 'v', 'j.video_id=v.id')
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
     *  its respective id and a numerical array of video id's.
     */
    private function groupVideosByContent($table)
    {
        $a = array();

        foreach($table as $key=>$row)
        {
            if(array_key_exists($row['content_slug'], $a))
            {
                $a[$row['content_slug']]['videos'][$row['position']] = $row['video_id'];
            }else
            {
                $a[$row['content_slug']] = array(
                    "content_id"=>$row['content_id'],
                    "videos"=>array(
                        $row['position']=>$row['video_id']
                    )
                );
            }
        }
        return $a;
    }

    /**
     *  Return the associative array defined by the join process.
     */
    public function getContentVideos()
    {
        return $this->content_videos;
    }
}