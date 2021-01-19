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
}
