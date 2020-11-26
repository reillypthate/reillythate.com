<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; // Defined in including page before this page is included ?> | Reilly Thate</title>
        <meta name="description" content="<?php echo getPageDescriptionFromPageTitle($page_title); ?>">
<?php if($robots=getPageRobotsFromPageTitle($page_title)): ?>
        <meta name="robots" content="<?php echo $robots; ?>">
<?php endif; ?>
        <link rel="icon" type="image/png" href="<?php echo linkToImage("renegade_favicon_32x32.ico");?>">
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
            <a href="<?php echo linkToPage("Home"); ?>">
                <img src="<?php echo linkToImage("Renegade_Blues.svg"); ?>" alt="Renegade logo.">
            </a>
            <h1><a href="<?php echo linkToPage("Home"); ?>">Reilly Thate</a></h1>
            <nav id="nav_primary">
                <button type="button" class="collapsible">Menu</button>
                <ul class="nav-ul-grid collapsible_content">
<?php $page_names = array("About", "Blog", "Portfolio"); ?>
<?php foreach($page_names as $key=>$page): ?>
                    <li><a
<?php if($page_title == $page): ?>
                            class="nav_active_page"
<?php else: ?>
                            href="<?php echo linkToPage($page); ?>"
<?php endif; ?>
                        ><?php echo $page; ?></a></li>
<?php endforeach; ?>
                </ul>
            </nav>
        </header>
