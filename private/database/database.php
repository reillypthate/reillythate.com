<?php

    session_start();

    $adminEnabled = true;

    //  
    //  Using Doctrine\DBAL for MYSQL functionality.
    //  
    $connectionParams = array(
        'dbname' => 'reillythate.com',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    );

    $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
    try
    {
        $conn->connect();
    } catch (Exception $e)
    {
        echo $e->getMessage() . PHP_EOL;
        var_dump(memory_get_peak_usage());
    }

    //  Prevent SQL logger from overflowing and overwhelming server space.
    $conn->getConfiguration()->setSQLLogger(null);

?>