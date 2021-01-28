<?php
namespace Trick;
use Trick\DB_Manager;
use Trick\Interfaces\SlugSet;
use Trick\Traits\SlugSetTrait;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the Portfolio.
**/
class Portfolio extends DB_Manager implements SlugSet
{
    /**
     *  The join tables connecting the `portfolio` table to base assets.
     */
    protected $joins;
    /**
     * Fetch the `post` table from the database.
     */
    function __construct()
    {
        parent::__construct("portfolio");

        $this->joins = array();
    }
    use SlugSetTrait;
    
    public function linkToProject($projectSlug)
    {
        global $data;

        return $data[DIRECTORY]->linkBySlug("portfolio-piece") . "/index.php?project=" . $projectSlug;
    }
    /**
     *  Add a join table to the $joins array.
     */
    public function addJoin($dataKey, $joinTable)
    {
        $this->joins[$dataKey] = $joinTable;
    }
    public function getJoins()
    {
        return $this->joins;
    }

    /**
     *  Retrieve every asset set associated with a given portfolio slug.
     */
    public function getProjectContent($portfolioSlug)
    {
        $p = array();

        foreach($this->joins as $assetKey=>$contentSet)
        {
            if(isset($contentSet[$portfolioSlug]))
            {
                $p[$assetKey] = $contentSet[$portfolioSlug][$assetKey];
            }else
            {
                $p[$assetKey] = null;
            }
        }

        return $p;
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