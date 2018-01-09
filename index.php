<?php
spl_autoload_register(function ($className)
{
    $path = 'class/' . $className . ".class.php";

    include $path;
});



