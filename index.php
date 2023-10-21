<?php
/**
 *██████╗ ███████╗ ██████╗ ███████╗███████╗███╗   ██╗ ██████╗     ██████╗ ██╗  ██╗██████╗     ███████╗██████╗  █████╗ ███╗   ███╗███████╗
 *██╔══██╗██╔════╝██╔════╝ ██╔════╝██╔════╝████╗  ██║██╔════╝     ██╔══██╗██║  ██║██╔══██╗    ██╔════╝██╔══██╗██╔══██╗████╗ ████║██╔════╝
 *██║  ██║█████╗  ██║  ███╗█████╗  █████╗  ██╔██╗ ██║██║  ███╗    ██████╔╝███████║██████╔╝    █████╗  ██████╔╝███████║██╔████╔██║█████╗
 *██║  ██║██╔══╝  ██║   ██║██╔══╝  ██╔══╝  ██║╚██╗██║██║   ██║    ██╔═══╝ ██╔══██║██╔═══╝     ██╔══╝  ██╔══██╗██╔══██║██║╚██╔╝██║██╔══╝
 *██████╔╝██║     ╚██████╔╝██║     ███████╗██║ ╚████║╚██████╔╝    ██║     ██║  ██║██║         ██║     ██║  ██║██║  ██║██║ ╚═╝ ██║███████╗
 *╚═════╝ ╚═╝      ╚═════╝ ╚═╝     ╚══════╝╚═╝  ╚═══╝ ╚═════╝     ╚═╝     ╚═╝  ╚═╝╚═╝         ╚═╝     ╚═╝  ╚═╝╚═╝  ╚═╝╚═╝     ╚═╝╚══════╝
 
 *██╗   ██╗███████╗██████╗ ███████╗██╗ ██████╗ ███╗   ██╗        ██╗    ██████╗     █████╗
 *██║   ██║██╔════╝██╔══██╗██╔════╝██║██╔═══██╗████╗  ██║    ██╗███║   ██╔═████╗   ██╔══██╗
 *██║   ██║█████╗  ██████╔╝███████╗██║██║   ██║██╔██╗ ██║    ╚═╝╚██║   ██║██╔██║   ╚██████║
 *╚██╗ ██╔╝██╔══╝  ██╔══██╗╚════██║██║██║   ██║██║╚██╗██║    ██╗ ██║   ████╔╝██║    ╚═══██║
 * ╚████╔╝ ███████╗██║  ██║███████║██║╚██████╔╝██║ ╚████║    ╚═╝ ██║██╗╚██████╔╝██╗ █████╔╝
 *  ╚═══╝  ╚══════╝╚═╝  ╚═╝╚══════╝╚═╝ ╚═════╝ ╚═╝  ╚═══╝        ╚═╝╚═╝ ╚═════╝ ╚═╝ ╚════╝
 * Dfgfeng PHP Frame Version :1.0.9
 * link : https://github.com/dfggmc/dfgfeng
 */
header("content-type:text/html;charset=utf-8");

if (PHP_VERSION <= '5.6') {
    header("content-type:text/html;charset=utf-8");
    http_response_code(501);
    exit('The server PHP version cannot be lower than 5.6, Current version:' .  phpversion());
}

if (!file_exists('config.json')) {
    header("content-type:text/html;charset=utf-8");
    http_response_code(500);
    exit('The config.json file does not exist!');
}

$config = json_decode(file_get_contents("config.json"));
if (!file_exists(__DIR__ . '/template/theme/' . $config->theme)) {
    http_response_code(404);
    header("content-type:text/html;charset=utf-8");
    exit('The ' . $config->theme . ' theme file does not exist! please check confing.json.');
}

//引入自有函数
$function_list = array(
    "get_theme",
    "get_language",
    "route",
);
foreach ($function_list as $function_list) {
    require __DIR__ . '/function/' . $function_list . '.php';
};
