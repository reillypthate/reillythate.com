<?php
namespace Trick;

abstract class DB_Functions
{
    protected $table_name;
    protected $table;

    /**
     * The join table between the child class and the content class.
     */
    protected $contentJoinTable;

    /**
     * Constructor for DB_functions subclass.
     */
    public function __construct($table_name, $make_assoc_from_id=false)
    {
        //  Used in join table.
        $this->table_name = $table_name;

        $this->table = $this->fetchTable($table_name, $make_assoc_from_id);
        if($make_assoc_from_id)
        {
            $this->table = $this->setKeysAsId($this->table);
        }

        if($table_name != 'content' && $table_name != 'directory')
        {
            $this->contentJoinTable = $this->fetchContentJoinTable();
            $this->contentJoinTable = $this->groupElementsByContent();
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
    /**
     * Retrieve a join table containing elements associated with each row of 
     * content, ordered by position.
     */
    protected function fetchContentJoinTable()
    {
        global $conn;
        $t = $this->table_name;

        $qb = $conn->createQueryBuilder();
        $qb
            ->select(
                'c.id AS content_id',
                'c.slug AS content_slug',
                ($t . '.id AS ' . $t . '_id'),
                'j.position AS position'
            )
            ->from(('content_' . $t), 'j')
            ->innerJoin('j', 'content', 'c', 'j.content_id=c.id')
            ->innerJoin('j', $t, $t, ('j.' . $t . '_id=' . $t . '.id'))
            ->orderBy('c.slug', 'ASC')
            ->addOrderBy('j.position', 'ASC')
        ;

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

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
    /**
     *  Builds an associative array where each content_slug value corresponds to
     *  its respective id and a numerical array of element id.
     *  Ordered by content slug, and then by join position.
     */
    protected function groupElementsByContent()
    {
        $g = array();
        $name = $this->table_name;
        $id = $this->table_name . '_id';

        foreach($this->contentJoinTable as $key=>$row)
        {
            //  Check to see if there's already a unique key for
            //  this element's respective content.
            //  If so, then simply add this element to its group.
            if(array_key_exists($row['content_slug'], $g))
            {
                $g[$row['content_slug']][$name][$row['position']] = $row[$id];
            }else
            {
                $g[$row['content_slug']] = array(
                    "content_id" => $row['content_id'],
                    $name => array(
                        $row['position'] => $row[$id]
                    )
                );
            }
        }

        return $g;
    }

    public function getContentJoinTable()
    {
        return $this->contentJoinTable;
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

    /**
     *  Return a row from this element's table by ID.
     */
    public function getRowFromId($id)
    {
        return $this->table[$id];
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