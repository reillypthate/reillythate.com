<?php 
    $page_row = page($SLUG);
    $home_link = "/reillythate.com";
    if($to_static)
    {
        ob_start("callback"); // Begins output buffer. 
        $home_link = "http://reillythate.com";
    }

    $page = array();
    $page['title'] = $page_row['title'];
    $page['description'] = $page_row['description'];
    $page['base'] = $home_link;
    $page['icon'] = li("renegade-icon");
    
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page['title'];?> | Reilly Thate</title>
        
        <meta name="author" content="Reilly Thate">
        <meta name="description" content="<?php echo $page['description']; ?>">
        <meta name="keywords" content="Filmmaker, Developer, Designer">
        
        <base href="<?php echo $page['base']?>">
        <link rel="icon" type="image/png" href="<?php echo $page['icon']?>">
        
<?php if($page_row['robots']): ?>
        <meta name="robots" content="<?php echo $page_row['robots']; ?>">
<?php endif; ?>
<?php require_once('sharing.php'); ?>

        <!-- Stylesheets -->
<?php require_once('stylesheets.php'); ?>

        <!-- Javascript Files -->
<?php require_once('scripts.php'); ?>
    </head>

    <body>
<?php if (isset($_SESSION['message'])): ?>
        <div id="session-message__container">
            <p><?php echo $_SESSION['message']; ?></p>
        </div>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>
        <header>
            <a id="logo-to-home" href="<?php echo $home_link; ?>">
                <img src="<?php echo li("renegade-blues"); ?>" alt="Renegade logo.">
            </a>
            <h1><a href="<?php echo $home_link; ?>">Reilly Thate</a></h1>
<?php include_once('head-nav.php'); ?>
<?php include_once('backticks.php'); ?>
        </header>