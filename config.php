<?php
    spl_autoload_register(function($class){
        $file = "_classes".DIRECTORY_SEPARATOR.$class.".php";

        require_once $file;
    });