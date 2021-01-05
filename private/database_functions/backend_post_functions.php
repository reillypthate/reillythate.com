<?php

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Post ADMIN Functions
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$createNewPost = false;
$isEditingPost = false;
$post = array(
    "id" => 0,
    "title" => "",
    "slug" => "",
    "read_time" => "",
    "created_at" => 0,
    "updated_at" => 0,
    "published" => 0,
    "banner" => 0,
    "summary" => "",
    "body" => ""
);
$post_id = 0;
$post_title = "";
$post_slug = "";
$post_description = "";
$post_banner = 0;

if(isset($_POST['post_ADD']))
{
    post_add($_POST);
}
if(isset($_GET['edit-post']))
{
    $isEditingPost = true;

    post_edit($_GET['edit-post']);
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
        $post;
        /*
        $post_slug,
        $post_banner, 
        $post_title, 
        $post_body, 
        $post_published;
        */

    $errors = [];

    $post_slug = $req_vals['post_slug'];
    $post_title = $req_vals['post_title'];
    $post_body = $req_vals['post_body'];

    $post["slug"] = $req_vals['post_slug'];
    $post["title"] = $req_vals['post_title'];
    $post["body"] = $req_vals['post_body'];

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

    $read_time = strlen($post_body) / 800.0;
    if(count($errors) == 0)
    {
        if(isset($req_vals['post_banner']))
        {
            $insert_statement = $conn->prepare("INSERT INTO `posts` (slug, title, body, read_time, banner, published) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_statement->bind_param('sssiii',
                $post_slug,
                $post_title, 
                $post_body, 
                $read_time,
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
    global $post_table, $post;
    
    foreach($post_table->getTable() as $key=>$check)
    {
        if($check['id'] == $post_id)
        {
            $post = $check;
            break;
        }
    }
}

/**
 * Update a row in the `post` table.
 */
function post_update($req_vals)
{
    global $conn, $errors, 
        $post;
        /*
        $post_id,
        $post_slug, 
        $post_title, 
        $post_body, 
        $post_banner,
        $post_published;
        */

    $errors = [];

    $post['id'] = $req_vals['post_id'];
    $post['title'] = $req_vals['post_title'];
    $post['slug'] = $req_vals['post_slug'];
    $post['read_time'] = strlen($post['body']) / 800.0;
    $post['updated_at'] = date('Y-m-d H:i:s');
    if(isset($req_vals['post_published']))
    {
        $post['published'] = 1;
    }
    else
    {
        $post['published'] = 0;
    }
    if(isset($req_vals['post_banner']))
    {
        $post['banner'] = $req_vals['post_banner'];
        if($req_vals['post_banner'] == 0)
        {
            $post['banner'] = NULL;
        }
    }else
    {
        $post['banner'] = NULL;
    }
    $post['summary'] = $req_vals['post_summary'];
    $post['body'] = $req_vals['post_body'];

    // Validate form.
    if(empty($post['slug']))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($post['title']))
    {
        array_push($errors, "Title required!");
    }
    if(empty($post['summary']))
    {
        array_push($errors, "Summary required!");
    }
    if(empty($post['body']))
    {
        array_push($errors, "Body required!");
    }

    if(count($errors) == 0)
    {
        $qb = $conn->createQueryBuilder();
        $qb ->update('posts')
            ->set('posts.title', '?')
            ->set('posts.slug', '?')
            ->set('posts.read_time', '?')
            ->set('posts.updated_at', '?')
            ->set('posts.published', '?')
            ->set('posts.banner', '?')
            ->set('posts.summary', '?')
            ->set('posts.body', '?')
            ->where($qb->expr()->eq('posts.id', '?'))
            ->setParameter(0, $post['title'])
            ->setParameter(1, $post['slug'])
            ->setParameter(2, $post['read_time'])
            ->setParameter(3, $post['updated_at'])
            ->setParameter(4, $post['published'])
            ->setParameter(5, $post['banner'])
            ->setParameter(6, $post['summary'])
            ->setParameter(7, $post['body'])
            ->setParameter(8, $post['id'])
        ;
        try
        {
            $result = $qb->execute();
        }catch(Exception $e)
        {
            echo $e->getMessage() . PHP_EOL;
            
            $_SESSION['message'] = "Error involved: " . $e->getMessage() . ".";
            header('location: ../index.php');

            echo $e->getMessage() . PHP_EOL;
            exit(-1);
        }

        $_SESSION['message'] = "Post updated successfully!\n";
        header('location: ../index.php?updated-post=' . $post['slug']);
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