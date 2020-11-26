<?php
/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Image Directory Functions
 * + db_getImageDirectory()
 * + getPageDescriptionFromTitle($page_title)
 * + getPageRobotsFromPageTitle($page_title)
 * + getPageIdFromPageTitle($page_title)
 * + buildURL($page_id)
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function db_getImageDirectory()
{
    global $conn;

    $query = "SELECT * FROM `image_directory` ORDER BY `id` ASC";
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
/**
 * Return the assoc_array of the row with the slug $image_slug.
 * ! Case sensitive!
 */
function getRowFromImageSlug($image_slug)
{
    global $image_directory;

    foreach($image_directory as $key=>$row)
    {
        if($row['slug'] == $image_slug)
        {
            return $row;
        }
    }

    return -1; // No image exists with this slug.
}
/**
 * Return the assoc_array of the row with the id $image_id.
 * ! Case sensitive!
 */
function getRowFromImageId($image_id)
{
    global $image_directory;

    foreach($image_directory as $key=>$row)
    {
        if($row['id'] == $image_id)
        {
            return $row;
        }
    }

    return -1; // No image exists with this id.
}
?>