<?php

/**
 * Plugin Name: Switch Content by URL Params
 * Description: エリアごとのショップリストを表示します。
 * Version: 1.0
 * Author: sizebook
 * Author URI: https://sizebook.co.jp/
 */

if (!defined('ABSPATH')) exit;

require_once(plugin_dir_path(__FILE__) . 'tools.php');
require_once(plugin_dir_path(__FILE__) . 'mv_area_text.php');
require_once(plugin_dir_path(__FILE__) . 'switch_components.php');
require_once(plugin_dir_path(__FILE__) . 'switch_shop_list.php');