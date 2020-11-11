<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_name; // Defined in including page before this page is included ?> | Reilly Thate</title>
        <meta name="description" content="<?php echo $page_description; // See previous comment ?>">
        <link rel="icon" type="image/png" href="<?php echo linkToImage("renegade_favicon_32x32.ico");?>">
<?php insertWantedStylesheets(); ?>
<?php insertJavascriptSrcFiles(); ?>


    </head>
    <body>
        <header class="header-grid">
            <img id="identity_logo" src="<?php echo linkToImage("Renegade_Blues.svg"); ?>" alt="Renegade logo.">
            <div id="identity_title">
                <h1><a href="<?php echo linkToHomePage(); ?>">Reilly Thate</a></h1>
                <p id="identity_tagline">Filmmaker</p>
            </div>
            <nav id="nav_primary">
                <ul class="nav-ul-grid">
                    <li><a href="<?php echo linkToAboutPage(); ?>">About</a></li>
                    <li><a href="<?php echo linkToBlogPage(); ?>">Blog</a></li>
                </ul>
            </nav>
        </header>