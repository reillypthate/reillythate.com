<?php
namespace Trick\Traits;

/**
 *  A trait designed to give lookup table functionality to any table
 *  whose members can be referred to by ID or by SLUG.
 */
trait SlugSetTrait
{
    /**
     * A lookup table which maps SLUG values to ID keys.
     */
    private $slugById;
    /**
     * A lookup table which maps ID value to SLUG keys.
     */
    private $idBySlug;

    /**
     * Retrieve a join table containing elements associated with each row of 
     * content, ordered by position.
     */
    public function generateLookupTables()
    {
        $this->slugById = array();
        $this->idBySlug = array();

        foreach($this->table as $id=>$row)
        {
            $this->slugById[$id] = $row['slug'];
            $this->idBySlug[$row['slug']] = $id;
        }
    }

    /**
     * Getter function. Returns the slug associated with an id.
     */
    public function slugById($id)
    {
        return $this->slugById[$id];
    }
    /**
     * Getter function. Returns the id associated with a slug.
     */
    public function idBySlug($slug)
    {
        return $this->idBySlug[$slug];
    }
    /**
     * Getter function. Returns the data set's SLUG values.
     */
    public function getSlugs()
    {
        return $this->slugById;
    }
    /**
     * Getter function. Returns the data set's ID values.
     */
    public function getIds()
    {
        return $this->idBySlug;
    }
}

?>