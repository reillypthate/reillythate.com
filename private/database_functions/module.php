<?php

$isEditingModule = false;
$module_id = 0;
$module_text_rows = null;
$module_image_rows = null;

//  
//  INITIALIZE a parent module before attempting to edit, if necessary.
//  
//  
function initializeParentModule($post_id, $post_slug)
{
    global $conn, $log;

    //  First, we initialize a new `module_parent` row.
    $qb = $conn->createQueryBuilder();
    $qb ->insert('module_parent')
        ->values(
            array(
                'slug' => '?',
                'element' => '?',
                'class' => '?'
            )
        )
        ->setParameter(0, $post_slug)
        ->setParameter(1, 1)
        ->setParameter(2, 1)
    ;
    try
    {
        $result = $qb->execute();
    }catch(Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        $log->debug($e->getMessage());

        exit(-1);
    }
    $parent_module = $conn->lastInsertId();

    //  Next, we update the respective `posts` module value.
    $qb = $conn->createQueryBuilder();
    $qb ->update('posts')
        ->set('module', '?')
        ->where($qb->expr()->eq('posts.id', '?'))
        ->setParameter(0, $parent_module)
        ->setParameter(1, $post_id)
    ;
    try
    {
        $result = $qb->execute();
    }catch(Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        $log->debug($e->getMessage());

        exit(-1);
    }

    //  Return the parent module value.
    return $parent_module;
}

//  
//  EDIT Module
//  
//  
function editModule($module_id)
{
    global $conn, $module_text_rows, $module_image_rows, $log;
    //$log->debug("Module ID: " . $module_id);

    // Get text modules.
    $qb = $conn->createQueryBuilder();
    $qb ->select('m.id', 'me.element', 'mc.class', 'm.position', 'm.content')
        ->from('module', 'm')
        ->where($qb->expr()->eq('m.p_id', '?'))
        //->where($qb->expr()->eq('m.slug', '?'))
        ->innerJoin('m', 'module_element', 'me', 'm.element = me.id')
        ->innerJoin('m', 'module_class', 'mc', 'm.class = mc.id')
        ->setParameter(0, $module_id)
        ->orderBy('m.position', 'ASC')
    ;

    try
    {
        $module_text_rows = $qb->execute();
        //$log->debug($module_rows->);
    }catch (Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        $log->debug($e->getMessage());
    }

    //  Here's how I should do it.
    //
    //  First: Perform a select statement that gives me each unique photo gallery ID.
    //  Set these unique IDs as keys in a new associative array.
    //
    $qb = $conn->createQueryBuilder();
    $qb ->select('mg.id', 'mg.position')
        ->from('module_parent', 'mp')
        ->where($qb->expr()->eq('mg.p_id', '?'))
        ->innerJoin('mp', 'module_gallery', 'mg', 'mp.id = mg.p_id')
        ->setParameter(0, $module_id)
        ->orderBy('mg.id', 'ASC')
        ->addOrderBy('mg.position', 'ASC')
    ;
    try
    {
        $module_image_rows = $qb->execute();
    }catch (Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        $log->debug($e->getMessage());
    }

    $module_galleries = array();
    foreach($module_image_rows->fetchAll(\PDO::FETCH_ASSOC) as $index=>$row)
    {
        $module_galleries["module-child__gallery" . $row['id']] = array();
        $module_galleries["module-child__gallery" . $row['id']]['position'] = $row['position'];
    }
    //print_r($module_galleries);
    //  
    //  Second: Fill the associative array with image values and names, in order.
    //  
    $qb = $conn->createQueryBuilder();
    $qb ->select('mi.p_id', 'mi.position', 'mi.image')
        ->from('module_parent', 'mp')
        ->where($qb->expr()->eq('mg.p_id', '?'))
        ->innerJoin('mp', 'module_gallery', 'mg', 'mp.id = mg.p_id')
        ->innerJoin('mg', 'module_image', 'mi', 'mg.id = mi.p_id')
        ->setParameter(0, $module_id)
        ->orderBy('mi.p_id', 'ASC')
        ->addOrderBy('mi.position', 'ASC')
    ;
    try
    {
        $module_image_rows = $qb->execute();
    }catch (Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        $log->debug($e->getMessage());
    }
    foreach($module_image_rows->fetchAll(\PDO::FETCH_ASSOC) as $index=>$row)
    {
        $module_galleries["module-child__gallery" . $row['p_id']]["img_" . $row['image']] = $row['image'];
    }

    //print_r($module_galleries);

    $module_image_rows = $module_galleries;
    /*
    // Get image modules.
    $qb = $conn->createQueryBuilder();
    $qb ->select('mg.id', 'mg.position as MG_POS', 'mi.position as MI_POS', 'mi.image')
        ->from('module_parent', 'mp')
        ->where($qb->expr()->eq('mg.p_id', '?'))
        //->where($qb->expr()->eq('m.slug', '?'))
        ->innerJoin('mp', 'module_gallery', 'mg', 'mp.id = mg.p_id')
        ->innerJoin('mg', 'module_image', 'mi', 'mg.id = mi.p_id')
        ->setParameter(0, $module_id)
        ->orderBy('mg.id', 'ASC')
        ->addOrderBy('mg.position', 'ASC')
        ->addOrderBy('mi.position', 'ASC')
    ;

    try
    {
        $module_image_rows = $qb->execute();
        //$log->debug($module_rows->);
    }catch (Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        $log->debug($e->getMessage());
    }
    /*
    
    print_r($module_text_rows->fetchAll(\PDO::FETCH_ASSOC));
    */
    //print_r($module_image_rows->fetchAll(\PDO::FETCH_ASSOC));
    
}
function updateModule($req_vals)
{
    global $conn, $log;

    $val1 = 0;
    $val2 = 0;
    //  Parent module already exists.
    $parent_module = $req_vals['parent_module'];
    //  Update child elements that have been changed.

    //  Remove child elements that have been deleted.
    //      For each module child, if its ID doesn't have a corresponding module-child_#, remove it from the `modules` table.
    if($req_vals['modules_removed'] != "")
    {
        $removed = explode(";", $req_vals['modules_removed']);
        for($i = 0; $i < count($removed) - 1; $i++)
        {
            if(strpos($removed[$i], 'gallery') !== false)
            {// This is an image gallery. Drop any module_image rows corresponding to this gallery, and then remove this gallery.
                $idToRemove = intval(str_split($removed[$i], 21)[1]);

                $qb = $conn->createQueryBuilder();
                $qb ->delete('module_image')
                    ->where($qb->expr()->eq('module_image.p_id', '?'))
                    ->setParameter(0, $idToRemove)
                ;
                $qb2 = $conn->createQueryBuilder();
                $qb2 ->delete('module_gallery')
                    ->where($qb2->expr()->eq('module_gallery.id', '?'))
                    ->setParameter(0, $idToRemove)
                ;
                try
                {
                    $result = $qb->execute();
                    $result2 = $qb2->execute();
                }catch(Exception $e)
                {
                    echo $e->getMessage() . PHP_EOL;
                    $log->debug($e->getMessage());
                }
            }else
            {
                $idToRemove = intval(str_split($removed[$i], 13)[1]);
    
                $qb = $conn->createQueryBuilder();
                $qb ->delete('module')
                    ->where($qb->expr()->eq('module.id', '?'))
                    ->setParameter(0, $idToRemove)
                    ->setMaxResults(1)
                ;
                try
                {
                    $result = $qb->execute();
                }catch(Exception $e)
                {
                    echo $e->getMessage() . PHP_EOL;
                    $log->debug($e->getMessage());
                }
            }
        }
    }
    //  Add child elements that have been created.

    //  IDEA: Add a hidden input that specifies the order of the elements for the builder: module-child_20;module-child_1;module-child_2; etc.
    //  ... instead of renaming the modules.
    $order = explode(";", $req_vals['module-order']);
    $orderSet = array();
    for($i = 0; $i < count($order) - 1; $i++)
    {
        $temp = explode(":", $order[$i]);
        $orderSet[intval($temp[1])] = $temp[0];
    }

    foreach($orderSet as $key=>$id)
    {
        //$log->debug($key . ' ... ' . $id);
        if(strpos($id, 'gallery') !== false)
        {// For gallery updates.
            if(strpos($id, 'new') !== false)
            {
                $qb = $conn->createQueryBuilder();
                $qb ->insert('module_gallery')
                    ->values(
                        array(
                            'p_id' => '?',
                            'element' => '?',
                            'class' => '?',
                            'position' => '?'
                        )
                    )
                    ->setParameter(0, $parent_module)
                    ->setParameter(1, 3)
                    ->setParameter(2, 12)
                    ->setParameter(3, intval($key))
                ;
                try
                {
                    $result = $qb->execute();
                }catch(Exception $e)
                {
                    echo $e->getMessage() . PHP_EOL;
                    $log->debug($e->getMessage());
                }
            }else
            {
                $child_id = intval(str_split($id, 21)[1]);
                echo $child_id . PHP_EOL;
                $qb = $conn->createQueryBuilder();
                $qb ->update('module_gallery')
                    ->set('module_gallery.p_id', '?')
                    ->set('module_gallery.element', '?')
                    ->set('module_gallery.class', '?')
                    ->set('module_gallery.position', '?')
                    ->where($qb->expr()->eq('module_gallery.id', '?'))
                    ->setParameter(0, $parent_module)
                    ->setParameter(1, 3)
                    ->setParameter(2, 12)
                    ->setParameter(3, intval($key))
                    ->setParameter(4, $child_id)
                ;
                try
                {
                    //$log->debug($parent_module . "; " . intval($key) . "; " . $child_id);
                    $result = $qb->execute();
                }catch(Exception $e)
                {
                    echo $e->getMessage() . PHP_EOL;
                    $log->debug($e->getMessage());
                }
            }
        }else
        {
            //$log->debug($key . ", " . $id);
            if(strpos($id, 'new') !== false)
            {// Insert new child module w/ position = $key
                $qb = $conn->createQueryBuilder();
                $qb ->insert('module')
                    ->values(
                        array(
                            'p_id' => '?',
                            'element' => '?',
                            'class' => '?',
                            'position' => '?',
                            'content' => '?'
                        )
                    )
                    ->setParameter(0, $parent_module)
                    ->setParameter(1, 2)
                    ->setParameter(2, 10)
                    ->setParameter(3, intval($key))
                    ->setParameter(4, $req_vals[$id])
                ;
                try
                {
                    $result = $qb->execute();
                }catch(Exception $e)
                {
                    echo $e->getMessage() . PHP_EOL;
                }
            }else
            {// Update child module w/ position = key
                $child_id = intval(str_split($id, 13)[1]);
                echo $child_id . PHP_EOL;
                $qb = $conn->createQueryBuilder();
                $qb ->update('module')
                    ->set('module.p_id', '?')
                    ->set('module.element', '?')
                    ->set('module.class', '?')
                    ->set('module.position', '?')
                    ->set('module.content', '?')
                    ->where($qb->expr()->eq('module.id', '?'))
                    ->setParameter(0, $parent_module)
                    ->setParameter(1, 2)
                    ->setParameter(2, 10)
                    ->setParameter(3, intval($key))
                    ->setParameter(4, $req_vals[$id])
                    ->setParameter(5, $child_id)
                ;
                try
                {
                    $result = $qb->execute();
                }catch(Exception $e)
                {
                    echo $e->getMessage() . PHP_EOL;
                }
            }
        }

        //  For each (module-child_#), update the respective module row.
        //      + Set the position for the respective row to the position in the input.
        //  For each (module-child_new#), add a new module.
        //      + Set their position according to their position in the input.
    }
}




?>