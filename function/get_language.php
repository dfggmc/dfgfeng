<?php
/**
 * 获取语言
 *
 * @return object 返回语言数据对象
 */
function get_language()
{
    $theme_config = get_theme_config();
    if (!$theme_config === false) {

        if ($theme_config->multilingual === true) {

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
        } else {
            return '主题未启用多语言';
        }
    }
}
