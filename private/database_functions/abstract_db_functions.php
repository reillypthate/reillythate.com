<?php

abstract class DB_Functions
{
    protected $table;

    /**
     * Constructor for DB_functions subclass.
     */
    public function __construct($table_name)
    {
        $this->table = $this->fetchTable($table_name);
    }

    /**
     * Provides a function that can be applied to all DB tables.
     */
    private function fetchTable($table_name)
    {
        global $conn;

        $query = "SELECT * FROM `" . $table_name . "` ORDER BY `id` ASC";
        $result = $conn->query($query);

        if($result->num_rows > 0)
        {
            $final_result = $result->fetch_all(MYSQLI_ASSOC);
            return $final_result;
        }
        echo "Fail in `getTable(" . $table_name . ")!";
        return -1;
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
     * Getter method for the `table` variable.
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
}

?>