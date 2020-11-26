<?php
define("DB_FUNCS", 'database_functions/');
require_once(DB_FUNCS . 'site_directory_functions.php');
require_once(DB_FUNCS . 'image_directory_functions.php');
require_once(DB_FUNCS . 'portfolio_card_functions.php');

$site_directory = db_getSiteDirectory();
$image_directory = db_getImageDirectory();

$portfolio_cards = db_getPortfolioCards();


?>