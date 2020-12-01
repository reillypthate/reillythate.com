<?php

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Image ADMIN Functions
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$isEditingImg = false;
$img_id = 0;
$img_slug = "";
$img_name = "";
$img_alt = "";
$img_class = "";

if(isset($_POST['img_ADD']))
{
    img_add($_POST);
}
if(isset($_GET['edit-img']))
{
    $isEditingImg = true;
    $img_id = $_GET['edit-img'];

    img_edit($img_id);
}
if(isset($_POST['img_UPDATE']))
{
    img_update($_POST);
}
/**
 * Add a new row to the `image` table.
 */
function img_add($req_vals)
{
    global $conn, $errors, 
        $img_slug, 
        $img_name, 
        $img_alt, 
        $img_class;

    $errors = [];

    $img_slug = $req_vals['img_slug'];
    $img_name = $req_vals['img_name'];
    $img_alt = $req_vals['img_alt'];

    $img_class = "";

    // Validate form.
    if(empty($img_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($img_name))
    {
        array_push($errors, "Name required!");
    }
    if(empty($img_alt))
    {
        array_push($errors, "Alt required!");
    }

    if(count($errors) == 0)
    {
        $insert_statement = $conn->prepare("INSERT INTO `image_directory` (slug, name, alt, class) VALUES (?, ?, ?, ?)");
        $insert_statement->bind_param('ssss',
            $img_slug,
            $img_name, 
            $img_alt, 
            $img_class
        );

        if(!$result = $insert_statement->execute())
        {
            die("There was an error executing the insert statement: [ " . $conn->error . " ]");
        }

        printf("%d Row inserted.\n", $insert_statement->affected_rows);
        $insert_statement->close();

        $_SESSION['message'] = "Image added successfully!";
        header('location: index.php');
        exit(0);
    }
}

function img_edit($img_id)
{
    global $image_table,
        $img_id, 
        $img_slug, 
        $img_name, 
        $img_alt, 
        $img_class;
    
    foreach($image_table->getTable() as $key=>$check)
    {
        if($check['id'] == $img_id)
        {
            $row = $check;
            break;
        }
    }
    $img_id = $row['id'];
    $img_slug = $row['slug'];
    $img_name = $row['name'];
    $img_alt = $row['alt'];
    $img_class = $row['class'];
}
/**
 * Update a row in the `site` table.
 */
function img_update($req_vals)
{
    global $conn, $errors, 
        $img_id,
        $img_slug, 
        $img_name, 
        $img_alt, 
        $img_class;

    $errors = [];

    $img_id = $req_vals['img_id'];
    $img_slug = $req_vals['img_slug'];
    $img_name = $req_vals['img_name'];
    $img_alt = $req_vals['img_alt'];

    $img_class = "";

    // Validate form.
    if(empty($img_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($img_name))
    {
        array_push($errors, "Name required!");
    }
    if(empty($img_alt))
    {
        array_push($errors, "Alt required!");
    }

    if(count($errors) == 0)
    {
        $update_statement = $conn->prepare("UPDATE `image_directory` SET slug=?, name=?, alt=?, class=? WHERE id=?");
        $update_statement->bind_param('ssssi',
            $img_slug,
            $img_name, 
            $img_alt, 
            $img_class,
            $img_id
        );

        if(!$result = $update_statement->execute())
        {
            die("There was an error executing the update statement: [ " . $conn->error . " ]");
        }

        printf("%d Row updated.\n", $update_statement->affected_rows);
        $update_statement->close();

        $_SESSION['message'] = "Image directory updated successfully!";
        header('location: index.php');
        exit(0);
    }
}
?>