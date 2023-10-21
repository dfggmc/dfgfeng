<?php
if (PHP_VERSION <= '5.6') {
    echo 'The server PHP version cannot be lower than 5.6';
} else {
    if (!file_exists('config.json')) {
        exit('The config.json file does not exist!');
    }

    //获取框架配置文件
    $config = json_decode(file_get_contents("config.json"));

    if (!file_exists(__DIR__ . '/template/theme/' . $config->theme)) {
        exit('The theme file does not exist, please check confing.json.');
    } else {

        /**
         * 获取主题URL
         * @return object 返回主题完整路径,末尾不用加空格
         */
        function get_theme_url()
        {
            global $config;
            $theme_name = $config->theme;
            return  './template/theme/' . $theme_name . '/';
        }

        /**
         * 获取主题配置
         * @return object 正常返回json数组否返回null
         */
        function get_theme_config()
        {
            if (!file_exists(get_theme_url() . 'theme_config')) {
                $theme_config_content = file_get_contents(get_theme_url() . 'theme_config');
                $theme_config_data = json_decode($theme_config_content);
                return $theme_config_data;
            } else {
                return null;
            }
        }

        /**
         * 获取语言
         *
         * @return object 返回语言数据对象
         */

        function get_language()
        {
            //检查是否存在语言cookie
            if (isset($_COOKIE["language"])) {
                $language_file_path = get_theme_url() . 'public/static/data/language/' . $_COOKIE['language'] . '.json';
                // 检查语言文件是否存在
                if (file_exists($language_file_path)) {
                    $language_file_content = file_get_contents($language_file_path);
                    $language_data = json_decode($language_file_content);
                    return $language_data;
                } else {
                    $language_null_data = json_decode(file_get_contents(get_theme_url() . 'public/static/data/language/zh-cn.json'));
                    return $language_null_data;
                }
            } else {
                setcookie("language", "zh-cn", time() + (60 * 60 * 24 * 365), '/');
                header("Refresh:0");
            }
        }

        //路由
        require  'route.php';
    }
}
