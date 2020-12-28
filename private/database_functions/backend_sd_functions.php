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
        $directory_pid, 
        $directory_slug, 
        $directory_title, 
        $directory_description, 
        $directory_robots, 
        $directory_public,
        $directory_published;;

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
        $insert_statement = $conn->prepare("INSERT INTO `site_directory` (p_id, slug, title, description, robots, public, published) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert_statement->bind_param('issssi',
            $directory_pid,
            $directory_slug, 
            $directory_title, 
            $directory_description, 
            $directory_robots,
            $directory_public,
            $directory_published
        );

        if(!$result = $insert_statement->execute())
        {
            die("There was an error executing the insert statement: [ " . $conn->error . " ]");
        }

        printf("%d Row inserted.\n", $insert_statement->affected_rows);
        $insert_statement->close();

        $_SESSION['message'] = "Sub-directory added successfully!";
        header('location: index.php');
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
        if($directory_id == 1)
        {
            $update_statement = $conn->prepare("UPDATE `site_directory` SET slug=?, title=?, description=?, robots=?, public=?, published=? WHERE id=?");
            $update_statement->bind_param('ssssiii',
                $directory_slug, 
                $directory_title, 
                $directory_description, 
                $directory_robots,
                $directory_public,
                $directory_published,
                $directory_id
            );
        }else
        {
            $update_statement = $conn->prepare("UPDATE `site_directory` SET p_id=?, slug=?, title=?, description=?, robots=?, public=?, published=? WHERE id=?");
            $update_statement->bind_param('issssiii',
                $directory_pid,
                $directory_slug, 
                $directory_title, 
                $directory_description, 
                $directory_robots,
                $directory_public,
                $directory_published,
                $directory_id
            );
        }

        if(!$result = $update_statement->execute())
        {
            die("There was an error executing the update statement: [ " . $conn->error . " ]");
        }

        printf("%d Row updated.\n", $update_statement->affected_rows);
        $update_statement->close();

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

    $update_statement = $conn->prepare("UPDATE `site_directory` SET last_updated=now() WHERE id=?");
    $update_statement->bind_param('i',
        $directory_id);

    if(!$result = $update_statement->execute())
    {
        die("There was an error executing the update statement: [ " . $conn->error . " ]");
    }

    //die("%d Row updated:\n" . $update_statement->affected_rows);
    printf("%d Row updated.\n", $update_statement->affected_rows);
    $update_statement->close();

    $_SESSION['message'] = "Sub-directory updated successfully!";
    header('location: ' . $directory_table->linkBySlug('directory') . '/index.php');
    exit(0);
}
?>