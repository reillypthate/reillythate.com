<?php
/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Image Directory Functions
 * + db_getImageDirectory()
 * + getPageDescriptionFromTitle($page_title)
 * + getPageRobotsFromPageTitle($page_title)
 * + getPageIdFromPageTitle($page_title)
 * + buildURL($page_id)
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
** This class contains the functions required for the Image directory table.
**/
class ImageTable extends DB_Functions
{
    function __construct()
    {
        parent::__construct("image_directory");
    }

    public function getRowFromImageSlug($image_slug)
    {
        return $this->getRowFromCellValue("slug", $image_slug);
    }
    public function getRowFromImageId($image_id)
    {
        return $this->getRowFromCellValue("id", $image_id);
    }

    public function buildTable()
    {
        return $this->buildTableWithEditButton(TRUE, 'index.php?edit-img');
    }
}

?>