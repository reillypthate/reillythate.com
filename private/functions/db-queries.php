<?php
namespace Trick\DB;
//  
//  Functions used in database access/modification.
//  

/**
 *  Try to execute a SELECT call that returns an associative array.
 */
function executeTableFetch($queryBuilder, $errorType=null)
{
    global $log;

    $result = null;
    try
    {
        $result = $queryBuilder->execute();

        //  Return an associative array if there's more than 1 row.
        if($result->rowCount() > 0)
        {
            return $result->fetchAll(\PDO::FETCH_ASSOC);
        }else
        {
            return array();
        }
    }catch(Exception $e)
    {
        EXCEPTION_NOTIFY($e->getMessage());
        $log->debug($errorType);
        //  $_SESSION['message'] = "Error involved: " . $e->getMessage() . ".";
    }
    //  If the function reaches this point, we don't have any data.
    return null;
}

/**
 *  Try to execute an ADD call.
 */
function executeTableAdd($queryBuilder, $errorType=null)
{
    global $log;

    $result = null;
    try
    {
        $result = $queryBuilder->execute();
    }catch(Exception $e)
    {
        EXCEPTION_NOTIFY($e->getMessage());
        EXCEPTION_NOTIFY("Exception in DB-Manager::" . $this->tableName . "... add attempt failed.");
        $log->debug($errorType);

        $_SESSION['message'] = "FAILED to add element to (`" . $this->tableName . "`)!!!\n";
        echo $e->getMessage() . PHP_EOL;
        exit(-1);
    }
    $_SESSION['message'] = "Successful addition to (`" . $this->tableName . "`).\n";
    header('location: index.php');//?new-slug=' . $directory_slug);
    exit(0);
}

/**
 *  Try to execute an UPDATE call.
 */
function executeTableUpdate($queryBuilder, $errorType=null)
{
    global $log;

    $result = null;
    try
    {
        $result = $queryBuilder->execute();
    }catch(Exception $e)
    {
        EXCEPTION_NOTIFY($e->getMessage());
        EXCEPTION_NOTIFY("Exception in DB-Manager::" . $this->tableName . "... add attempt failed.");
        $log->debug($errorType);

        $_SESSION['message'] = "FAILED to update (`" . $this->tableName . "`)!!!\n";
        echo $e->getMessage() . PHP_EOL;
        exit(-1);
    }
    $_SESSION['message'] = "Successful update in (`" . $this->tableName . "`).\n";
    header('location: index.php');//?new-slug=' . $directory_slug);
    exit(0);
}
?>