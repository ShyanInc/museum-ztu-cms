<?php

spl_autoload_register(static function ($className) {
    $path = str_replace('\\', '/', $className . '.php');
    if (file_exists($path)) {
        include_once $path;
    }
});

isset($_GET['route']) ? ($route = $_GET['route']) : ($route = '');

$core = core\Core::getInstance();
$core->run($route);
$core->done();
