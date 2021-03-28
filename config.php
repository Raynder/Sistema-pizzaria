<?php
    spl_autoload_register(function($class){
        $file = "classes".DIRECTORY_SEPARATOR.$class.".php";

        require_once $file;
    });