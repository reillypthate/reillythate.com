<!doctype html>
<html id="backend">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<?php $page_row = $directory_table->getRowFromSlug($SLUG); ?>

        <title><?php echo $page_row['title']; // Defined in including page before this page is included ?> | Reilly Thate</title>
        <meta name="description" content="<?php echo $page_row['description'] ?>">
<?php if($page_row['robots']): ?>
        <meta name="robots" content="<?php echo $page_row['robots']; ?>">
<?php endif; ?>
        <link rel="icon" type="image/png" href="<?php echo $directory_table->linkToImage("renegade_favicon_32x32.ico");?>">
<?php 
    $wanted_stylesheets = $wanted_stylesheets . "";
    $wanted_ext_js = $wanted_ext_js . "";
    $wanted_body_js = $wanted_body_js . ",collapsible.js";
?>
<?php insertWantedStylesheets(); ?>
<?php insertJavascriptSrcFiles(); ?>


    </head>
    <body>
        <header id="public_header">
            <a href="<?php echo $directory_table->linkToPage("reillythate.com"); ?>">
                <img src="<?php echo $directory_table->linkToImage("Renegade_Blues.svg"); ?>" alt="Renegade logo.">
            </a>
            <h1><a href="<?php echo $directory_table->linkToPage("reillythate.com"); ?>">Reilly Thate</a></h1>
            <nav id="nav_primary">
                <button type="button" class="collapsible">Menu</button>
                <ul class="nav-ul-grid collapsible_content">
<?php $page_slugs = array("directory", "media", "card"); ?>
<?php foreach($page_slugs as $key=>$slug): ?>
                    <li><a <?php if($SLUG == $slug): ?>class="nav_active_page"<?php else: ?>href="<?php echo $directory_table->linkToPage($slug); ?>"<?php endif; ?>><?php echo ucwords($slug); ?></a></li>
<?php endforeach; ?>
                </ul>
            </nav>
        </header>
