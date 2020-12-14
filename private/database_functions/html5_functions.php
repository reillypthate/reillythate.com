<?php
/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *  HTML5 Functions
 * + db_getHTML5()
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

class HTMLTable extends DB_Functions
{
    function __construct()
    {
        parent::__construct("html5_elements");
    }

  /**
    * Return the assoc_array of the row with the slug $pc_slug.
    * ! Case sensitive!
    */
    public function getRowFromCardSlug($card_slug)
    {
        return $this->getRowFromCellValue("slug", $card_slug);
    }

    public function buildTable()
    {
        return $this->buildTableWithEditButton(TRUE, 'html');
    }

}
function db_getHTML5()
{
    global $conn;

    $query = "SELECT * FROM `html5_elements` ORDER BY `id` ASC";
    $result = $conn->query($query);

    if ($result->num_rows > 0)
    {
        $final_result = $result->fetch_all(MYSQLI_ASSOC);
        // print_r($final_result);
        return $final_result;
    }

    echo "Fail";
    return -1;
}
function getHTML5Elements()
{
    global $elements_list;

    $elements = array();
    foreach($elements_list as $key=>$element)
    {
        $elements[] = $element['element'];
    }
    return $elements;
}
/**
 * Return the assoc_array of the row with the slug $pc_slug.
 * ! Case sensitive!
 */
function getRowFromHTML5Element($element)
{
    global $elements_list;

    foreach($elements_list as $key=>$row)
    {
        if($row['element'] == $$element)
        {
            return $row;
        }
    }

    return -1; // No image exists with this slug.
}
?>