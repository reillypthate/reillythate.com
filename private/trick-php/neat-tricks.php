<?php

//
//  Closure
//  
//  An object disguised as a PHP function.
//

$closure = function ($name) {
    return sprintf('Hello %s', $name);
};

//echo $closure("Reilly");

//
//  Attach State (Modern PHP, page 27)
//  
//  Associate a variable with a Closure.
//  The enclosePerson() named function accepts a $name argument, and it returns 
//  a closure object that encloses the $name object.
//  
//  The returned closure object preserves the $name argument's value even after 
//  the closure exits the enclosePerson() function's scope. The $name variable 
//  still exists in the closure!
//

function enclosePerson($name) {
    return function ($doCommand) use ($name) {
        return sprintf('%s, %s', $name, $doCommand);
    };
};

// Enclose "Reilly" string in closure
$reilly = enclosePerson('Reilly');

// Invoke closure with command
echo $reilly('keep doing awesome stuff!');

?>