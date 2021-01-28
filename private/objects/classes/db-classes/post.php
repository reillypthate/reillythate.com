<?php
namespace Trick;
use Trick\DB_Manager;
use Trick\Interfaces\SlugSet;
use Trick\Interfaces\PortfolioJoin;
use Trick\Traits\SlugSetTrait;
use Trick\Traits\PortfolioJoinTrait;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Blog Posts.
**/
class Post extends DB_Manager implements SlugSet, PortfolioJoin
{
    /**
     * Fetch the `post` table from the database.
     */
    function __construct()
    {
        parent::__construct("post");

    }
    
    use SlugSetTrait;
    use PortfolioJoinTrait;
    
    public function linkToBlog($postSlug)
    {
        global $data;

        return $data[DIRECTORY]->linkBySlug("blog") . "/index.php?blog-post=" . $postSlug;
    }
    /**
     *  Fetches the body for the given post ID.
     *  This function was created to conserve server memory; rather than store 
     *  all blog post bodies in memory, access the body when you need it.
     */
    public function getPostBody($bodyId)
    {
        global $conn;
        $qb = $conn->createQueryBuilder();
        $qb ->select('*')
            ->from('post_body')
            ->where($qb->expr()->eq('post_body.id', '?'))
            ->setParameter(0, $bodyId)
        ;

        $tmp = DB\executeTableFetch($qb, "DB_Manager: Post(__post_body)");

        if(isset($tmp))
        {
            return $this->setKeysAsId($tmp);
        }
        return null;

        // json_decode($tmp['body'], true);
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