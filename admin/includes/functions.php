<?php 

spl_autoload_register('autoload');

function autoload($class){

    $class = strtolower($class);

    $the_path = "includes/{$class}.php";

    //Video 50
    if(is_file($the_path) && !class_exists($class)){
        require_once($the_path);
    }
    
    //Commented out in video 50
    // if(file_exists($the_path)){
    //     require_once($the_path);
    // } else {
    //     die("This file name {$class}.php was not found, man...");
    // }
}
function redirect($location){
    header("Location: {$location}");
}
?>