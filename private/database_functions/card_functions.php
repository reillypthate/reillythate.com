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

    public function buildTable()
    {
        global $directory_table;
        return $this->buildTableWithEditButton(TRUE, $directory_table->linkBySlug('card') . '/index.php?edit-card');
    }

    /**
     * Generate the lines of "Card" code and return them in an array.
     */
    public function getCardLines($card_slug, $heading_level)
    {
        global $directory_table, $image_table;

        $card = $this->getRowFromCardSlug($card_slug);

        $card_link = $directory_table->linkBySlug($card_slug);

        $card_id = $card['id'];
        $card_title = $card['title'];
        $card_description = getArticleLines($card['description']);

        $image_row = $image_table->getRowFromImageId($card['image_id']);
        $image_src = $directory_table->linkToImage($image_row['name']);
        $image_alt = $image_row['alt'];

        $cardLines = array();
        array_push($cardLines, str_repeat("\t", 1) . '<a href="' . $card_link . '">');
        array_push($cardLines, str_repeat("\t", 2) . '<div class="card">');
        array_push($cardLines, str_repeat("\t", 3) . '<img src="' . $image_src . '" alt="' . $image_alt . '">');
        array_push($cardLines, str_repeat("\t", 3) . '<h' . $heading_level . '>' . $card_title . '</h' . $heading_level . '>');
        array_push($cardLines, str_repeat("\t", 3) . '<div class="card_description">');
        foreach($card_description as $line_index=>$cd)
        {
            array_push($cardLines, str_repeat("\t", 4) . $cd);
        }
        array_push($cardLines, str_repeat("\t", 3) . '</div>');
        array_push($cardLines, str_repeat("\t", 2) . '</div>');
        array_push($cardLines, str_repeat("\t", 1) . '</a>');

        return $cardLines;
    }
    /**
     * Builds a <section> containing a grid of cards.
     */
    public function generateCardSection($card_slugs, $heading_level, $num_tabs, $classes="")
    {
        $cardSection = array();
        array_push($cardSection, '<section class="card_gallery card_count_' . count($card_slugs) . ' ' . $classes  . '">');
        foreach($card_slugs as $cs_index=>$slug)
        {
            $cardSection = array_merge($cardSection, $this->getCardLines($slug, $heading_level));
        }
        array_push($cardSection, '</section>');

        printLines($cardSection, $num_tabs);
    }
}
?>