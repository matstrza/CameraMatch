<?php

spl_autoload_register(function ($class) {
    $class_file = $class.".php";
    
    if (file_exists("src/templates/".$class_file)) {
        // echo "include templates</br>";
        require_once "src/templates/".$class_file;
    }
    
    if (file_exists("src/framework/".$class_file)) {
        // echo "include framework</br>";
        require_once "src/framework/".$class_file;
    }
    
    if (file_exists("src/classes/".$class_file)) {
        // echo "include classes</br>";
        require_once "src/classes/".$class_file;
    }
    
    if (file_exists("src/controllers/".$class_file)) {
        // echo "include controllers</br>";
        require_once "src/controllers/".$class_file;
    }
    
    
    if (file_exists("src/models/".$class_file)) {
        // echo "include models</br>";
        require_once "src/models/".$class_file;
    }
    
     if (file_exists("src/includes/".$class_file)) {
        // echo "include models</br>";
        require_once "src/includes/".$class_file;
    }
});