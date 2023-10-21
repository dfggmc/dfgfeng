<?php
require get_theme_url() . 'public/static/data/router_data.php';
$path = rtrim($_SERVER['REQUEST_URI'], '/');
if (array_key_exists($path, $routes)) {
    include $routes[$path];
} else {
    echo '404 Not Found';
    header("HTTP/1.1 404 Not Found");
}
