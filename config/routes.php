<?php

$routes = [
    // inicio
    '' => 'views/home/index.php',
];

$baseDirectory = __DIR__ . '/../';
$url = $_GET['url'] ?? '';

if (array_key_exists($url, $routes)) {
    $routeFile = $routes[$url];
    $filePath = $baseDirectory . $routeFile;
    
    if (file_exists($filePath)) {
        require $filePath;
        exit;
    }

} require $baseDirectory . 'config/404/index.php';