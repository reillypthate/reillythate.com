<?php

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Card ADMIN Functions
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$isEditingCard = false;
$card_id = 0;
$card_slug = "";
$card_title = "";
$card_description = "";
$card_img_id = 0;

if(isset($_POST['card_ADD']))
{
    card_add($_POST);
}
if(isset($_GET['edit-card']))
{
    $isEditingCard = true;
    $card_id = $_GET['edit-card'];

    card_edit($card_id);
}
if(isset($_POST['card_UPDATE']))
{
    card_update($_POST);
}
if(isset($_POST['card_CANCEL']))
{
    card_cancel();
}
/**
 * Add a new row to the `image` table.
 */
function card_add($req_vals)
{
    global $conn, $errors, 
        $card_slug, 
        $card_title, 
        $card_description, 
        $card_img_id;

    $errors = [];

    $card_slug = $req_vals['card_slug'];
    $card_title = $req_vals['card_title'];
    $card_description = $req_vals['card_description'];
    $card_img_id = $req_vals['card_img_id'];

    // Validate form.
    if(empty($card_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($card_title))
    {
        array_push($errors, "Name required!");
    }
    if(empty($card_description))
    {
        array_push($errors, "Alt required!");
    }
    if(empty($card_img_id))
    {
        $card_img_id = 5;
    }

    if(count($errors) == 0)
    {
        $insert_statement = $conn->prepare("INSERT INTO `card` (slug, title, description, image_id) VALUES (?, ?, ?, ?)");
        $insert_statement->bind_param('sssi',
            $card_slug,
            $card_title, 
            $card_description, 
            $card_img_id
        );

        if(!$result = $insert_statement->execute())
        {
            die("There was an error executing the insert statement: [ " . $conn->error . " ]");
        }

        printf("%d Row inserted.\n", $insert_statement->affected_rows);
        $insert_statement->close();

        $_SESSION['message'] = "Card added successfully!";
        header('location: index.php');
        exit(0);
    }
}

function card_edit($card_id)
{
    global $card_table,
        $card_id, 
        $card_slug, 
        $card_title, 
        $card_description, 
        $card_img_id;
    
    foreach($card_table->getTable() as $key=>$check)
    {
        if($check['id'] == $card_id)
        {
            $row = $check;
            break;
        }
    }
    $card_id = $row['id'];
    $card_slug = $row['slug'];
    $card_title = $row['title'];
    $card_description = $row['description'];
    $card_img_id = $row['image_id'];
}
/**
 * Update a row in the `card` table.
 */
function card_update($req_vals)
{
    global $conn, $errors, 
        $card_id,
        $card_slug, 
        $card_title, 
        $card_description, 
        $card_img_id;

    $errors = [];

    $card_id = $req_vals['card_id'];
    $card_slug = $req_vals['card_slug'];
    $card_title = $req_vals['card_title'];
    $card_description = $req_vals['card_description'];
    $card_img_id = $req_vals['card_img_id'];

    // Validate form.
    if(empty($card_slug))
    {
        array_push($errors, "Slug required!");
    }
    if(empty($card_title))
    {
        array_push($errors, "Name required!");
    }
    if(empty($card_description))
    {
        array_push($errors, "Alt required!");
    }
    if(empty($card_img_id))
    {
        $card_img_id = 5;
    }

    if(count($errors) == 0)
    {
        $update_statement = $conn->prepare("UPDATE `card` SET slug=?, title=?, description=?, image_id=? WHERE id=?");
        $update_statement->bind_param('sssii',
            $card_slug,
            $card_title, 
            $card_description, 
            $card_img_id,
            $card_id
        );

        if(!$result = $update_statement->execute())
        {
            die("There was an error executing the update statement: [ " . $conn->error . " ]");
        }

        printf("%d Row updated.\n", $update_statement->affected_rows);
        $update_statement->close();

        $_SESSION['message'] = "Card updated successfully!";
        header('location: index.php');
        exit(0);
    }
}
function card_CANCEL()
{
    $_SESSION['message'] = "Operation cancelled successfully!";
    header('location: index.php');
    exit(0);
}
?>