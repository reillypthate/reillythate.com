<?php
namespace Trick;

use Trick\DB as DB;

/**
 *  The abstract DB_Manager class stores and modifies table information.
 *  Every single table in the database will be under the control of this class:
 *      +   Create table (if necessary)
 *      +   Load table
 *      +   Modify table
 */
abstract class DB_Manager
{
    /**
     *  The name of the table, which will be used when accessing or modifying
     *  in the database.
     */
    protected $tableName;
    /**
     *  The table itself, which will be organized by `id`.
     */
    protected $table;

    /**
     *  Constructor for DB_functions subclass.
     */
    public function __construct($table_name)
    {
        $this->tableName = $table_name;

        //  Execute a query that grabs all rows from this table in the database,
        //  orders them by ID, and sets the key access to their ID.
        $this->fetchTable();
    }

/**
 * ACCESS FUNCTIONS
 */
    /**
     *  This function populates the $table variable with an associative array
     *  containing the data from the database.
     */
    private function fetchTable()
    {
        global $conn;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select('*')
            ->from($this->tableName)
            ->orderBy($this->tableName . '.id', 'ASC');
        
        $tmp = DB\executeTableFetch($qb, "DB_Manager: " . $this->tableName);

        if(isset($tmp))
        {
            $this->table = $this->setKeysAsId($tmp);
            return true;
        }
        return false;
    }
    /**
     *  This function sets the keys of the given associative array to the 
     *  respective rows' `id` values.
     */
    private function setKeysAsId($table)
    {
        //  Check to see if the table's rows have an 'id' column.
        if(!isset($table[0]['id']))
        {
            EXCEPTION_NOTIFY("Exception in DB-Manager::" . $this->tableName . "... key 'id' does not exist.");
            return null;
        }

        $tableForIdKeys = array();
        foreach($table as $key=>$row)
        {
            $tableForIdKeys[$row['id']] = $row;
        }

        return $tableForIdKeys;
    }

    protected function getRowFromCellValue($column, $cell_value)
    {
        foreach($this->table as $key=>$row)
        {
            if(strtolower($row[$column]) == strtolower($cell_value))
            {
                return $row;
            }
        }

        return -1; // No row exists with this cell value in the respective column.
    }
    /**
     *  Return a row from this element's table by ID.
     */
    public function getRowFromId($id)
    {
        return $this->table[$id];
    }
    /**
     * Getter method that returns the associative array representing this table.
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Getter method for the `table` variable's array keys.
     * Assumes table is not empty.
     */
    public function getKeys()
    {
        return array_keys($this->table[0]);
    }

/**
 * MODIFICATION FUNCTIONS
 */
    /**
     *  This abstract function will return an array of parameters that will
     *  be used to add a new element to this table.
     */
    abstract protected function formatAddValues($request_values);
    /**
     *  This abstract function will return an array of parameters that will
     *  be used to modify an existing element in this table.
     */
    abstract protected function formatUpdateValues($request_values);

    /**
     *  This general function will take an array of request key/value pairs 
     *  and will attempt to add a new element to this table.
     * 
     *  This function will be prefaced with a $formatAddValues function so
     *  child classes will have more control over what gets added.
     */
    public function db_Add($request_values)
    {
        global $conn;

        $parameters = formatAddValues($request_values);

        //  Build the query.
        $qb = $conn->createQueryBuilder();
        $qb->insert($this->tableName);
        for($i = 0; $i < count($parameters); $i++)
        {
            $qb->setParameter($i, $parameters[$i]);
        }

        DB\executeTableAdd($qb, "DB_Manager: " . $this->tableName);
    }

    /**
     *  This general function will take an array of request key/value pairs 
     *  and will attempt to add a new element to this table.
     * 
     *  This function will be prefaced with a $formatAddValues function so
     *  child classes will have more control over what gets added.
     */
    public function db_Update($request_values)
    {
        global $conn;

        $parameters = formatUpdateValues($request_values);

        //  Build the query.
        $qb = $conn->createQueryBuilder();
        $qb->update($this->tableName);
        foreach($request_values as $key=>$value)
        {
            //  If the key is `id`, set the WHERE clause.
            if($key == 'id')
            {
                $qb->where($qb->expr()->eq($this->tableName . 'id', '?'));
                continue;
            }
            //  Otherwise, set a SET clause.
            $qb->set($this->tableName . '.' . $key, '?');
        }
        for($i = 0; $i < count($parameters); $i++)
        {
            $qb->setParameter($i, $parameters[$i]);
        }

        DB\executeTableUpdate($qb, "DB_Manager: " . $this->tableName);
    }
}

?>