<?php
namespace Trick;

abstract class DB_Functions
{
    protected $table;

    /**
     * Constructor for DB_functions subclass.
     */
    public function __construct($table_name, $make_assoc_from_id=false)
    {
        $this->table = $this->fetchTable($table_name, $make_assoc_from_id);
        if($make_assoc_from_id)
        {
            $this->table = $this->setKeysAsId($this->table);
        }
    }

    /**
     * Provides a function that can be applied to all DB tables.
     */
    private function fetchTable($table_name, $make_assoc_from_id=false)
    {
        global $conn;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select('*')
            ->from($table_name)
            ->orderBy($table_name . '.id', 'ASC');
            
        //echo $qb->getSQL() . "\n";
        try
        {
            $result = $qb->execute();
        }catch(Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
            
            $_SESSION['message'] = "Error involved: " . $e->getMessage() . ".";
            header('location: index.php');

            echo $e->getMessage() . PHP_EOL;
            die(-1);
        }

        if($result->rowCount() > 0)
        {
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        }

        echo "Fail in `getTable(" . $table_name . ")!";
        return -1;
    }
    private function setKeysAsId($table)
    {
        $a = array();

        foreach($table as $key=>$row)
        {
            $a[$row['id']] = $row;
        }

        return $a;
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

    protected function buildTableWithEditButton($hasEditColumn, $backendDirective)
    {
        echo '<table>';
        echo '<thead>';
        if($hasEditColumn)
        {
            echo '<th scope="col"></th>';
        }
        foreach(array_keys($this->table[0]) as $index=>$column)
        {
            echo '<th scope="col">' . $column . '</th>';
        }
        echo '</thead>';
        echo '<tbody>';
        foreach($this->table as $index=>$row)
        {
            echo '<tr>';
            if($hasEditColumn)
            {
                echo '<td>';
                echo '<button onclick="window.location.href=\'' . $backendDirective . '=' . $row['id'] . '\'">Edit</button>';
                echo '</td>';
            }
            foreach(array_keys($this->table[0]) as $col_key=>$key)
            {
                echo '<td>' . $row[$key] . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '<tfoot></tfoot>';
        echo '</table>';
    }
    protected function getTableLines($hasEditColumn, $backendDirective, $db_columns, $extra_columns)
    {
        $tableLines = array();
        array_push($tableLines, str_repeat("\t", 1) . '<table>');

        // Thead Section
        array_push($tableLines, str_repeat("\t", 2) . '<thead>');
        array_push($tableLines, str_repeat("\t", 3) . '<tr>');
        if($hasEditColumn)
        {
            array_push($tableLines, str_repeat("\t", 4) . '<th scope="col"></th>');
        }
        foreach(array_keys($this->table[0]) as $key_index=>$column)
        {
            array_push($tableLines, str_repeat("\t", 4) . '<th scope="col">' . $column . '</th>');
        }
        array_push($tableLines, str_repeat("\t", 3) . '</tr>');
        array_push($tableLines, str_repeat("\t", 2) . '</thead>');
        // TBody Section
        array_push($tableLines, str_repeat("\t", 2) . '<tbody>');
        foreach($this->table as $table_index=>$row)
        {
            array_push($tableLines, str_repeat("\t", 3) . '<tr>');
            if($hasEditColumn)
            {
                array_push($tableLines, str_repeat("\t", 4) . '<td><button onclick="window.location.ref=\'' . $backendDirective . '=' . $row['id'] . '\'">Edit</button></td>');
            }
            foreach(array_keys($this->table[0]) as $key_index=>$column)
            {
                array_push($tableLines, str_repeat("\t", 4) . '<td>' . $row[$column] . '</td>');
            }
            array_push($tableLines, str_repeat("\t", 3) . '</tr>');
        }
        array_push($tableLines, str_repeat("\t", 2) . '</tbody>');
        array_push($tableLines, str_repeat("\t", 2) . '<tfoot>');
        
        array_push($tableLines, str_repeat("\t", 2) . '</tfoot>');
        array_push($tableLines, str_repeat("\t", 1) . '</table>');

        return $tableLines;
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