<?php
/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *  Card Functions
 * + db_getCards()
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


class CardTable extends DB_Functions
{
    function __construct()
    {
        parent::__construct("card");
    }

  /**
    * Return the assoc_array of the row with the slug $pc_slug.
    * ! Case sensitive!
    */
    public function getRowFromCardSlug($card_slug)
    {
        return $this->getRowFromCellValue("slug", $card_slug);
    }

    public function printCard($card_slug, $heading_level)
    {
        global $directory_table, $image_table;

        $card = $this->getRowFromCardSlug($card_slug);

        $card_link = $directory_table->linkToPage($card_slug);

        $card_id = $card['id'];
        $card_title = $card['title'];
        $card_description = $card['description'];

        $image_row = $image_table->getRowFromImageId($card['image_id']);
        $image_src = $directory_table->linkToImage($image_row['name']);
        $image_alt = $image_row['alt'];

        echo '<a href="' . $card_link . '">';
        echo '<div class="card">';
        echo '<img src="' . $image_src . '" alt="' . $image_alt . '">';
        echo '<h' . $heading_level . '>' . $card_title . '</h' . $heading_level . '>';
        echo '<div class="card_description">';
        echo $card_description;
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }

}
?>