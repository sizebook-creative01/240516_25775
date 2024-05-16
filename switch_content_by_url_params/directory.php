<?php
$site_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($site_url);
$directory = isset($parsed_url['path']) ? rtrim($parsed_url['path'], '/') : '';
