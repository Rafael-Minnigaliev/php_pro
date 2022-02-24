<?php
require_once 'lib/autoload.php';

spl_autoload_register('autoLoadClassName');

function autoLoadClassName($className){
    $directories = [
        'model',
        'controller',
        ''
    ];
    $found = false;
    foreach ($directories as $dir){
        $file = __DIR__.'/'.$dir.'/'.$className.'.php';
        if(is_file($file)){
            require_once ($file);
            $found = true;
            break;
        }
    }
    if(!$found){
        throw new Exception("Unable to load: ".$className);
    }
    return true;
}