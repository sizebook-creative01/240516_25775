<?php

// ショートコードの展開
function mv_text_callback()
{

    $no = (int) $_GET['no'] ?? 1;
    return get_area_string($no, 'kanji');
}
add_shortcode('mv_text', 'mv_text_callback');