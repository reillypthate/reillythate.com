<?php

    $errors = [];
    $exceptions = [];

    /**
     * Push a new error to the $errors array.
     */
    function ERROR_NOTIFY($new_error)
    {
        global $errors;

        array_push($errors, $new_error);
    }

    /**
     * Push a new exception to the $exceptions array.
     */
    function PUSH_EXCEPTION($new_exception)
    {
        global $exceptions;

        array_push($exceptions, $new_exception);
    }

    /**
     * For debugging -- print to browser's console.
     */
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

?>