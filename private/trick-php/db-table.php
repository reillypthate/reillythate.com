<?php
namespace Trick\DBT;

trait Table
{
    //  
    //  Syntax for usage:
    //      use Trick\DBT\Table
    //  
    /** @var string */
    protected $database;

    /** @var string */
    protected $table;

    public function setDatabase($database_name)
    {
        $this->database = $database_name;
    }
    public function setTable($table_name)
    {
        $this->table = $table_name;
    }

    public function getDatabase()
    {
        if(!isset($this->database))
        {
            return -1;
        }

        return $this->database;
    }
    public function getTable()
    {
        if(!isset($this->table))
        {
            return -1;
        }

        return $this->table;
    }
}

?>