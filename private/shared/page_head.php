<?php 
    if($to_static)
    {
        ob_start("callback"); // Begins output buffer. 
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<?php $page_row = $directory_table->getRowFromSlug($SLUG); ?>

        <title><?php echo $page_row['title']; // Defined in including page before this page is included ?> | Reilly Thate</title>
        <meta name="description" content="<?php echo $page_row['description']; ?>">
        <meta name="keywords" content="Filmmaker, Developer, Designer">

        <base href="<?php echo $directory_table->linkToPage("reillythate.com"); ?>">
        <meta name="author" content="Reilly Thate">
<?php if($page_row['robots']): ?>
        <meta name="robots" content="<?php echo $page_row['robots']; ?>">
<?php endif; ?>

        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $page_row['title'];?> | Reilly Thate">
        <meta property="og:description" content="<?php echo $page_row['description']; ?>">
        <meta property="og:url" content="<?php echo $directory_table->linkToPage($SLUG); ?>">
        <meta property="og:site_name" content="Reilly Thate">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:creator" content="@trickthate">

        <link rel="icon" type="image/png" href="<?php echo $directory_table->linkToImage("renegade_favicon_32x32.ico");?>">
<?php 
    // array_push($wanted_stylesheets, "");
    // array_push($wanted_ext_js, "");
    // array_push($wanted_body_js, "")
?>
<?php insertWantedStylesheets(); ?>
<?php insertJavascriptSrcFiles(); ?>

    </head>
    <body>
        <header>
            <a href="<?php echo $directory_table->linkToPage("reillythate.com"); ?>">
                <img src="<?php echo $directory_table->linkToImage("Renegade_Blues.svg"); ?>" alt="Renegade logo.">
            </a>
            <h1><a href="<?php echo $directory_table->linkToPage("reillythate.com"); ?>">Reilly Thate</a></h1>
            <nav id="nav_primary">
                <button type="button" class="collapsible">Menu</button>
                <ul class="nav-ul-grid collapsible_content">
<?php $page_slugs = array("portfolio", "blog", "about"); ?>
<?php foreach($page_slugs as $key=>$slug): ?>
                    <li><a <?php if($SLUG == $slug): ?>class="nav_active_page"<?php else: ?>href="<?php echo $directory_table->linkToPage($slug); ?>"<?php endif; ?>><?php echo ucwords($slug); ?></a></li>
<?php endforeach; ?>
                </ul>
            </nav>
        </header>
<?php if($SLUG != 'reillythate.com'): ?>
        <nav id="backticks">
            <ul>
<?php $linkStack = $directory_table->getLinkStack($directory_table->getIdFromSlug($SLUG), array()); ?>
<?php for($i = count($linkStack) - 2; $i >= 0; $i--): ?>
                <li class="level_<?php echo count($linkStack) - $i; ?>"><a href="<?php echo $linkStack[$i][1];?>"><?php echo $linkStack[$i][0]; ?></a></li>
<?php endfor; ?>
            </ul>
        </nav>
<?php endif; ?>
