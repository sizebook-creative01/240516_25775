<?php

require_once 'directory.php';

// 切り替え対象のパラメーターからパスを取得
function is_target_no()
{
    $no = (int) $_GET['no'] ?? 1;

    $target = [2, 3, 4, 5, 6, 7, 43, 44, 46, 47, 48];
    return in_array($no, $target);
}

// ランキングテーブル
function table_callback()
{
    global $directory;
    if (in_array($directory, ["/rinx_007", "/rinx_009"])) {
        $file_name = is_target_no() ? 'musee_rairole_9' : 'eminal_rize_9';
    } else if (in_array($directory, ["/rinx_010", "/rinx_011"])) {
        $file_name = is_target_no() ? 'musee_rairole_10' : 'eminal_rize_10';
    } else {
        $file_name = is_target_no() ? 'musee_rairole' : 'eminal_rize';
    }
    $data_path = plugin_dir_path(__FILE__) . "tables/$file_name.html";
    $table_text = file_get_contents($data_path);

    // デバッグ用
    // return $data_path;

    return $table_text;
}
add_shortcode('table_switch', 'table_callback');

function second_content_callback()
{
    $file_name = is_target_no() ? 'clear_10' : 'eminal_10';
    $data_path = plugin_dir_path(__FILE__) . "2rd_content/$file_name.html";

    $second_content_text = file_get_contents($data_path);

    // デバッグ用
    // return $data_path;

    return $second_content_text;
}
add_shortcode('second_content_switch', 'second_content_callback');


// 3位のコンテンツ（エミナルとTBC）
function third_content_callback()
{
    global $directory;
    if ($directory == "/rinx_009") {
        $file_name = is_target_no() ? 'tbc_9' : 'eminal_9';
    } else if (in_array($directory, ["/rinx_010", "/rinx_011"])) {
        $file_name = is_target_no() ? 'tbc_10' : 'clear_10';
    } else {
        $file_name = is_target_no() ? 'tbc' : 'eminal';
    }

    $data_path = plugin_dir_path(__FILE__) . "3rd_content/$file_name.html";

    $third_content_text = file_get_contents($data_path);

    // デバッグ用
    // return $data_path;

    return $third_content_text;
}
add_shortcode('third_content_switch', 'third_content_callback');

// 4位以下のコンテンツ（リゼ/TBCとミュゼ/レイロール）
function other_contents_callback()
{
    global $directory;
    if (in_array($directory, ["/rinx_010", "/rinx_011"])) {
        $file_name = 'musee_rairole10';
    } else {
        $file_name = is_target_no() ? 'musee_rairole' : 'eminal_rize';
    }
    $data_path = plugin_dir_path(__FILE__) . "other_contents/$file_name.html";
    $other_contents_text = file_get_contents($data_path);

    // デバッグ用
    // return $data_path;

    return $other_contents_text;
}
add_shortcode('other_contents_switch', 'other_contents_callback');
