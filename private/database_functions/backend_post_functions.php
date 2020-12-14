<?php

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Post ADMIN Functions
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$createNewPost = false;
$isEditingPost = false;
$post_id = 0;
$post_slug = "";
$post_title = "";
$post_description = "";
$post_banner = 0;

if(isset($_POST['post_ADD']))
{
    post_add($_POST);
}
if(isset($_GET['edit-post']))
{
    $isEditingPost = true;
    $post_id = $_GET['edit-post'];

    post_edit($post_id);
}
if(isset($_POST['post_UPDATE']))
{
    post_update($_POST);
}
if(isset($_POST['post_CANCEL']))
{
    post_cancel();
}
/**
 * Add a new row to the `image` table.
 */
function post_add($req_vals)
{
    global $conn, $errors, 
        $post_slug,
        $post_banner, 
        $post_title, 
        $post_body, 
        $post_published;

    $errors = [];

    $post_slug = $req_vals['post_slug'];
    $post_title = $req_vals['post_title'];
    $post_body = $req_vals['post_body'];

    // Validate form.
    if(empty($post_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($post_title))
    {
        array_push($errors, "Title required!");
    }
    if(empty($post_body))
    {
        array_push($errors, "Body required!");
    }    
    if(isset($req_vals['post_published']))
        $post_published = 1;
    else
        $post_published = 0;

    if(count($errors) == 0)
    {
        if(isset($req_vals['post_banner']))
        {
            $insert_statement = $conn->prepare("INSERT INTO `posts` (slug, title, body, banner, published) VALUES (?, ?, ?, ?, ?)");
            $insert_statement->bind_param('sssii',
                $post_slug,
                $post_title, 
                $post_body, 
                $req_vals['post_banner'],
                $post_published
            );
        }else
        {
            $insert_statement = $conn->prepare("INSERT INTO `posts` (slug, title, body, published) VALUES (?, ?, ?, ?)");
            $insert_statement->bind_param('sssi',
                $post_slug,
                $post_title, 
                $post_body, 
                $post_published
            );
        }

        if(!$result = $insert_statement->execute())
        {
            die("There was an error executing the insert statement: [ " . $conn->error . " ]");
        }

        printf("%d Row inserted.\n", $insert_statement->affected_rows);
        $insert_statement->close();

        $_SESSION['message'] = "Post added successfully!";
        header('location: index.php');
        exit(0);
    }
}

function post_edit($post_id)
{
    global $post_table,
        $post_id, 
        $post_slug, 
        $post_title, 
        $post_body, 
        $post_published;
    
    foreach($post_table->getTable() as $key=>$check)
    {
        if($check['id'] == $post_id)
        {
            $row = $check;
            break;
        }
    }
    $post_id = $row['id'];
    $post_slug = $row['slug'];
    $post_title = $row['title'];
    $post_body = $row['body'];
    $post_published = $row['published'];
}
/**
 * Update a row in the `post` table.
 */
function post_update($req_vals)
{
    global $conn, $errors, 
        $post_id,
        $post_slug, 
        $post_title, 
        $post_body, 
        $post_banner,
        $post_published;

    $errors = [];

    $post_id = $req_vals['post_id'];
    $post_slug = $req_vals['post_slug'];
    $post_title = $req_vals['post_title'];
    $post_body = $req_vals['post_body'];
    $post_published = $req_vals['post_published'];

    // Validate form.
    if(empty($post_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($post_title))
    {
        array_push($errors, "Title required!");
    }
    if(empty($post_body))
    {
        array_push($errors, "Body required!");
    }    
    if(isset($req_vals['post_published']))
        $post_published = 1;
    else
        $post_published = 0;

    if(count($errors) == 0)
    {
        if(isset($req_vals['post_banner']))
        {
            $update_statement = $conn->prepare("UPDATE `posts` SET slug=?, title=?, body=?, published=?, banner=?, updated_at=now() WHERE id=?");
            $update_statement->bind_param('sssiii',
                $post_slug,
                $post_title, 
                $post_body, 
                $post_published,
                $req_vals['post_banner'],
                $post_id
            );
        }else
        {
            $update_statement = $conn->prepare("UPDATE `posts` SET slug=?, title=?, body=?, published=?, updated_at=now() WHERE id=?");
            $update_statement->bind_param('sssii',
                $post_slug,
                $post_title, 
                $post_body, 
                $post_published,
                $post_id
            );
        }

        if(!$result = $update_statement->execute())
        {
            die("There was an error executing the update statement: [ " . $conn->error . " ]");
        }

        printf("%d Row updated.\n", $update_statement->affected_rows);
        $update_statement->close();

        $_SESSION['message'] = "Post updated successfully!";
        header('location: index.php');
        exit(0);
    }
}
function post_CANCEL()
{
    $_SESSION['message'] = "Operation cancelled successfully!";
    header('location: ../');
    exit(0);
}
?>