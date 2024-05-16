<?php

// ショートコードの展開
function shop_list_callback()
{
    $no = get_and_convert_no(); // 1~7まで
    $area_romaji = get_area_string($no, 'romaji');

    if ($area_romaji === 'z') return '';

    $data_path = plugin_dir_path(__FILE__) . "shop_data/{$area_romaji}.html";
    $shop_list_text = file_get_contents($data_path);

    // デバッグ用
    // return $data_path;

    return $shop_list_text;
}
add_shortcode('shop_list', 'shop_list_callback');
