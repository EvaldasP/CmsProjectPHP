<?php
$request = $_SERVER['REQUEST_URI'];
$rootURL = '/CmsProjectPHP';
switch ($request) {
    case '/CmsProjectPHP/':
        require __DIR__ . '/src/views/index.php';
        break;


    case $rootURL . '/?p=' . $_GET['p']:
        require __DIR__ . '/src/views/index.php';
        break;

    case $rootURL . '/home':
        require __DIR__ . '/src/views/index.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
