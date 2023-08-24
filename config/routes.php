<?php

require "sql.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$routes = [
    // inicio
    '' => 'views/home/index.php',
    'pesquisa' => 'views/home/search.php',
    // configs
    'cep' => 'config/actions/newCep.php',
    'api-cpf' => 'config/api/cpf_receita.php',
    // eventos
    'eventos' => 'views/events/index.php',
    // auth
    'menu' => 'views/auth/mobile.php',
    'entrar' => 'config/actions/login.php',
    'logout' => 'config/actions/logout.php',
    'register' => 'views/auth/register.php',
    'login-mobile' => 'views/auth/login-mobile.php',
];

$baseDirectory = __DIR__ . '/../';
$url = $_GET['url'] ?? '';

// Consulta SQL para obter os eventos
$consulta = "SELECT * FROM events WHERE status != 0";
$con = $conn->query($consulta) or die($conn->error);

while ($dado = $con->fetch_array()) {
    // Adicione as rotas dinâmicas para cada evento usando o título como chave
    $eventId = $dado['id'];
    $eventTitle = strtolower(str_replace(' ', '-', $dado['title'])) . '-' . $eventId;
    $routes[$eventTitle] = "views/events/view.php";
}

if (array_key_exists($url, $routes)) {
    $routeFile = $routes[$url];
    $filePath = $baseDirectory . $routeFile;
    
    if (file_exists($filePath)) {
        require $filePath;
        exit;
    }

} else {
    require $baseDirectory . 'config/404/index.php';
}

echo $baseDirectory;