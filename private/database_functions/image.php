<?php
namespace Trick;
use Trick\DB_Functions;

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Directory Functions
** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required to work with the site Directory.
**/
class Image extends DB_Functions
{
    protected $slugSet;
    function __construct()
    {
        parent::__construct("image", true);
        $this->buildSlugSet();
    }
    /**
     * Create a lookup table that returns the images's id from its slug.
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
     * Return the id of this element from its slug.
     */
    public function getIdFromSlug($slug)
    {
        return $this->slugSet[$slug];
    }
}