<?php
namespace Trick\Traits;
use Trick\DB;

trait PortfolioJoinTrait
{
    /**
     *  Retrieve a join table containing elements associated with each row of 
     *  `portfolio`, ordered by position.
     */
    public function fetchPortfolioJoinTable()
    {
        global $conn;
        $t = $this->tableName;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select(
                'p.id AS portfolio_id',
                'p.slug AS portfolio_slug',
                ($t . '.id AS ' . $t . '_id'),
                'j.position AS position'
            )
            ->from(('portfolio_' . $t), 'j')
            ->innerJoin('j', 'portfolio', 'p', 'j.portfolio_id=p.id')
            ->innerJoin('j', $t, $t, ('j.' . $t . '_id=' . $t . '.id'))
            ->orderBy('p.slug', 'ASC')
            ->addOrderBy('j.position', 'ASC')
        ;

        $tmp = DB\executeTableFetch($qb, "TRAIT: Portfolio JOIN ( " . $t . ")!");

        if(isset($tmp))
        {
            return $this->groupElementsByPortfolio($tmp, $t);
        }
        return null;
    }

    /**
     *  Builds an associative array where each portfolio_slug value corresponds 
     *  to its respective id and a numerical array of element id.
     *  Ordered by portfolio slug, and then by join position.
     */
    function groupElementsByPortfolio($array, $tableName)
    {
        $g = array();
        $name = $tableName;
        $id = $tableName . '_id';

        foreach($array as $key=>$row)
        {
            //  Check to see if there's already a unique key for
            //  this element's respective portfolio.
            //  If so, then simply add this element to its group.
            if(array_key_exists($row['portfolio_slug'], $g))
            {
                $g[$row['portfolio_slug']][$name][$row['position']] = $row[$id];
            }else
            {
                $g[$row['portfolio_slug']] = array(
                    "portfolio_id" => $row['portfolio_id'],
                    $name => array(
                        $row['position'] => $row[$id]
                    )
                );
            }
        }

        return $g;
    }
}

?>