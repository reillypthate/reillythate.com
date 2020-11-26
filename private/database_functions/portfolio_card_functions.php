<?php
/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Portfolio Card Functions
 * + db_getPortfolioCards()
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function db_getPortfolioCards()
{
    global $conn;

    $query = "SELECT * FROM `portfolio_card` ORDER BY `id` ASC";
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
function getPortfolioCardSlugs()
{
    global $portfolio_cards;

    $slugs = array();
    foreach($portfolio_cards as $key=>$slug)
    {
        $slugs[] = $slug['slug'];
    }
    return $slugs;
}
/**
 * Return the assoc_array of the row with the slug $pc_slug.
 * ! Case sensitive!
 */
function getRowFromPortfolioCardSlug($pc_slug)
{
    global $portfolio_cards;

    foreach($portfolio_cards as $key=>$row)
    {
        if($row['slug'] == $pc_slug)
        {
            return $row;
        }
    }

    return -1; // No image exists with this slug.
}
function constructPortfolioCard($slug)
{
    global $portfolio_card;

    // Setup
    $card = getRowFromPortfolioCardSlug($slug);
    $card_id = $card['id'];
    $card_title = $card['title'];
    $card_description = $card['description'];
    
    $image_row = getRowFromImageId($card['image_id']);
    $image_name = $image_row['name'];
    $image_alt = $image_row['alt'];

    // Construction
    $cardHTML = '';
    $cardHTML .= '<a href="' . linkToPage(getPageTitleFromPageSlug($slug)) . '">';
        $cardHTML .= '<div class="portfolio_card">';
            $cardHTML .= '<img src="' . linkToImage($image_name) . '" alt="' . $image_alt . '">';
            $cardHTML .= '<h3>&ldquo;' . $card_title . '&rdquo;</h3>';
            $cardHTML .= '<div class="pc_description">';
                $cardHTML .= $card_description;
            $cardHTML .= '</div>';
        $cardHTML .= '</div>';
    $cardHTML .= '</a>';

    return $cardHTML;
}

?>