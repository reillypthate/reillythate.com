<?php
define("DB_FUNCS", 'database_functions/');

require_once(DB_FUNCS . 'abstract_db_functions.php');

require_once(DB_FUNCS . 'directory_functions.php');
require_once(DB_FUNCS . 'image_table_functions.php');
require_once(DB_FUNCS . 'card_functions.php');
require_once(DB_FUNCS . 'post_functions.php');

$directory_table = new DirectoryTable();
$image_table = new ImageTable();
$card_table = new CardTable();
$post_table = new PostTable();

require_once(DB_FUNCS . 'html5_functions.php');

$html_table = new HTMLTable();

$elements = db_getHTML5();

require_once(DB_FUNCS . 'backend_sd_functions.php');
require_once(DB_FUNCS . 'backend_id_functions.php');
require_once(DB_FUNCS . 'backend_card_functions.php');
require_once(DB_FUNCS . 'module.php');
require_once(DB_FUNCS . 'backend_post_functions.php');



?>