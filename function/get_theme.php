<?php
/**
 * 获取主题URL
 * @return object 返回主题完整路径,末尾不用加'/'
 */
function get_theme_url()
{
    global $config;
    $theme_name = $config->theme;
    return  './template/theme/' . $theme_name . '/';
}

/**
 * 获取主题配置
 * @return object 正常返回json数组否返回false
 */
function get_theme_config()
{
    $theme_config_path = get_theme_url() . 'theme_config.json';
    if (file_exists($theme_config_path)) {
        $theme_config_content = file_get_contents($theme_config_path);
        $theme_config_data = json_decode($theme_config_content);
        return $theme_config_data;
    } else {
        return false;
    }
}
