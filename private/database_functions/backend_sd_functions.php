<?php

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Site Directory ADMIN Functions
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$isEditingDirectory = false;
$directory_id = 0;
$directory_pid = 0;
$directory_slug = "";
$directory_title = "";
$directory_description = "";
$directory_robots = "";
$directory_public = 0;
$directory_published = 0;

if(isset($_POST['dir_ADD']))
{
    dir_add($_POST);
}
if(isset($_GET['edit-dir']))
{
    $isEditingDirectory = true;
    $directory_id = $_GET['edit-dir'];

    dir_edit($directory_id);
}
if(isset($_POST['dir_UPDATE']))
{
    dir_update($_POST);
}
/*
if(isset($_POST['html_REFRESH']))
{
    html_refresh($_POST);
}*/
/**
 * Add a new row to the `site_directory` table.
 */
function dir_add($req_vals)
{
    global $conn, $errors,
        $directory_table, 
        $directory_pid, 
        $directory_slug, 
        $directory_title, 
        $directory_description, 
        $directory_robots, 
        $directory_public,
        $directory_published;

    $errors = [];

    $directory_pid = $req_vals['dir_pid'];
    $directory_slug = $req_vals['dir_slug'];
    $directory_title = $req_vals['dir_title'];
    $directory_description = $req_vals['dir_description'];

    $directory_robots = "";

    if(isset($req_vals['dir_public']))
        $directory_public = 1;
    else
        $directory_public = 0;

    if(isset($req_vals['dir_published']))
        $directory_public = 1;
    else
        $directory_public = 0;

    // Validate form.
    if(empty($directory_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($directory_title))
    {
        array_push($errors, "Title required!");
    }
    if(empty($directory_description))
    {
        array_push($errors, "Description required!");
    }

    if(count($errors) == 0)
    {
        $qb = $conn->createQueryBuilder();
        $qb ->insert('site_directory')
            ->values(
                array(
                    'p_id' => '?',
                    'slug' => '?',
                    'title' => '?',
                    'description' => '?',
                    'robots' => '?',
                    'public' => '?',
                    'published' => '?'
                )
            )
            ->setParameter(0, $directory_pid)
            ->setParameter(1, $directory_slug)
            ->setParameter(2, $directory_title)
            ->setParameter(3, $directory_description)
            ->setParameter(4, $directory_robots)
            ->setParameter(5, $directory_public)
            ->setParameter(6, $directory_published)
        ;
        try
        {
            $result = $qb->execute();
        }catch(Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
            
            $_SESSION['message'] = "Error involved: " . $e->getMessage() . ".";
            header('location: index.php');

            echo $e->getMessage() . PHP_EOL;
            exit(-1);
        }

        $_SESSION['message'] = "Sub-directory added successfully!\n";
        header('location: index.php?new-slug=' . $directory_slug);
        exit(0);
    }
}

function dir_edit($dir_id)
{
    global $directory_table,
        $directory_pid, 
        $directory_slug, 
        $directory_title, 
        $directory_description, 
        $directory_public,
        $directory_published;
    
    foreach($directory_table->getTable() as $key=>$check)
    {
        if($check['id'] == $dir_id)
        {
            $row = $check;
            break;
        }
    }
    $directory_pid = $row['p_id'];
    $directory_slug = $row['slug'];
    $directory_title = $row['title'];
    $directory_description = $row['description'];
    $directory_public = $row['public'] == 1 ? " checked" : "";
    $directory_published = $row['published'] == 1 ? " checked" : "";
}
/**
 * Update a row in the `site_directory` table.
 */
function dir_update($req_vals)
{
    global $conn, $errors, 
        $directory_pid, 
        $directory_slug, 
        $directory_title, 
        $directory_description, 
        $directory_robots, 
        $directory_public,
        $directory_published;

    $errors = [];

    $directory_id = $req_vals['dir_id'];
    $directory_pid = $req_vals['dir_pid'];
    $directory_slug = $req_vals['dir_slug'];
    $directory_title = $req_vals['dir_title'];
    $directory_description = $req_vals['dir_description'];

    $directory_robots = "";

    if(isset($req_vals['dir_public']))
    {
        $directory_public = 1;
    }
    else
    {
        $directory_public = 0;
        $directory_robots = "noindex, noindeximage";
    }    
    if(isset($req_vals['dir_published']))
    {
        $directory_published = 1;
    }
    else
    {
        $directory_published = 0;
    }

    // Validate form.
    if(empty($directory_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($directory_title))
    {
        array_push($errors, "Title required!");
    }
    if(empty($directory_description))
    {
        array_push($errors, "Description required!");
    }

    if(count($errors) == 0)
    {
        $qb = $conn->createQueryBuilder();
        $qb ->update('site_directory')
            ->set('site_directory.p_id', '?')
            ->set('site_directory.slug', '?')
            ->set('site_directory.title', '?')
            ->set('site_directory.description', '?')
            ->set('site_directory.robots', '?')
            ->set('site_directory.public', '?')
            ->set('site_directory.published', '?')
            ->where($qb->expr()->eq('site_directory.id', '?'))
            ->setParameter(0, $directory_id == 1 ? null : $directory_pid)
            ->setParameter(1, $directory_slug)
            ->setParameter(2, $directory_title)
            ->setParameter(3, $directory_description)
            ->setParameter(4, $directory_robots)
            ->setParameter(5, $directory_public)
            ->setParameter(6, $directory_published)
            ->setParameter(7, $directory_id)
        ;
        
        try
        {
            $result = $qb->execute();
        }catch(Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
            
            $_SESSION['message'] = "Error involved: " . $e->getMessage() . ".";
            header('location: index.php');

            echo $e->getMessage() . PHP_EOL;
            exit(-1);
        }

        if(!$result)
        {
            die("There was an error executing the update statement: [ " . $conn->error . " ]");
        }

        $_SESSION['message'] = "Sub-directory updated successfully!";
        header('location: index.php');
        exit(0);
    }
}

/**
 * Called at the end of the output buffer process when a static page is being updated.
 */
function html_refresh($req_vals)
{
    global $conn, $errors, $directory_table;

    $errors = [];

    $directory_id = $req_vals['refresh_id'];

    $qb = $conn->createQueryBuilder();
    $qb ->update('site_directory')
        ->set('last_updated', 'now()')
        ->where($qb->expr()->eq('site_directory.id', '?'))
        ->setParameter(0, $directory_id)
        ;
        
    //echo $qb->getSQL() . "\n";
    $result = $qb->execute();

    try
    {
        $result = $qb->execute();
    }catch(Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        
        $_SESSION['message'] = "Error involved: " . $e->getMessage() . ".";
        header('location: index.php');

        echo $e->getMessage() . PHP_EOL;
        exit(-1);
    }

    $_SESSION['message'] = "Sub-directory updated successfully!";
    header('location: ' . $directory_table->linkBySlug('directory') . '/index.php?');
    exit(0);
}
?>