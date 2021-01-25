<?php
$request = $_SERVER['REQUEST_URI'];


$rootPath = '/CmsProjectPHP/';


switch ($request) {
    case $rootPath:
        require __DIR__ . '/src/views/index.php';
        break;


    case $rootPath . '?p=' . $_GET['p']:
        require __DIR__ . '/src/views/index.php';
        break;

    case $rootPath . 'home':
        require __DIR__ . '/src/views/index.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
