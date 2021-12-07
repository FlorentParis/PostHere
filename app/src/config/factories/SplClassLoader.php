<?php

namespace app\config\factories;

class SplClassLoader
{
    public static function spl_autoload($classname){
        require $classname.'.php';
    }
}