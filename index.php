<?php

use App\Base\ArgumentResolver;
use App\Base\Output;

function autoload($class): void{
    $exploded = explode('\\', $class);
    $currentFile = str_replace('index.php', '', __FILE__);
    $exploded[0] = 'App';
    $filePath = $currentFile.implode('/', $exploded).'.php';

    if(file_exists($filePath)){
        require_once($filePath);
    }
}

if(isset($argv)){
    spl_autoload_register('autoload');
    $file = $argv[0];
    unset($argv[0]);

    if(count($argv) > 0){
        $argumentResolver = (new ArgumentResolver($argv))->resolve();
        $controllerClass = $argumentResolver->findArguments('controller')->getValue() . 'Controller';
        $method = $argumentResolver->findArguments('method')->getValue();
        $controllerClass = 'App\\Controllers\\' .  $controllerClass; 

        if(!class_exists($controllerClass)){
            Output::writeLine('Controller '. $controllerClass. ' does not exist', 'error');
            die();
        }
        if(!method_exists($controllerClass, $method)){
            Output::writeLine('Method '. $method . ' does not exist', 'error');
            die();
        }
        $controller = new $controllerClass();
        $controller->$method($argumentResolver);
        exit();
    }
}