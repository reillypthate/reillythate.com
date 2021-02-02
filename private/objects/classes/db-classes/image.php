<?php
namespace Trick;
use Trick\DB_Manager;
use Trick\Interfaces\SlugSet;
use Trick\Interfaces\PortfolioJoin;
use Trick\Traits\SlugSetTrait;
use Trick\Traits\PortfolioJoinTrait;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the site Directory.
**/
class Image extends DB_Manager implements SlugSet, PortfolioJoin
{
    /**
     * Fetch the `image` table from the database.
     */
    function __construct()
    {
        parent::__construct("image");
    }

    use SlugSetTrait;
    use PortfolioJoinTrait;


    /**
     * Returns a string containing the path to the image given by the slug.
     */
    function linkToImage($slug)
    {
        $image = $this->table[$this->idBySlug($slug)];

        return '/' . $image['path'] . '/' . $image['name'] . $image['type'];
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
        $addValues = stripPrefix("db_image_", $request_values);

        if(isset($addValues['srcset']))
        {
            unset($addValues['srcset']);
        }

        return $addValues;
    }
    /**
     *  Format request values so the appropriate row can be properly
     *  updated in the `directory` table.
     */
    protected function formatUpdateValues($request_values)
    {
        //  Step 1: Strip the $request_values with the db_dir_ prefix.
        $updateValues = stripPrefix("db_image_", $request_values);

        if(isset($addValues['srcset']))
        {
            unset($addValues['srcset']);
        }
        
        return $updateValues;
    }
}