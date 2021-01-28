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
** This class contains the functions required to work with the Site Directory.
**/
class Tags extends DB_Manager implements SlugSet, PortfolioJoin
{
    protected $content_tags;

    function __construct()
    {
        parent::__construct("tag", true);

        //$this->content_tags = $this->groupTagsByContent($this->content_tags);
        //$this->table = $this->setKeysAsSlug($this->table);
    }

    use SlugSetTrait;
    use PortfolioJoinTrait;
    
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