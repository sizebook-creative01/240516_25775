<?php

function get_and_convert_no()
{
  $no = (int) $_GET['no'] ?? 1;

  if ($no <= 7) return $no;
  if (11 <= $no && $no <= 17) return 2;
  if (18 <= $no && $no <= 24) return 3;
  if (25 <= $no && $no <= 34) return 4;
  if (35 <= $no && $no <= 40) return 5;
  if (41 <= $no && $no <= 49) return 6;
  if (50 <= $no && $no <= 57) return 7;
  if (58 <= $no) return 1;
}

function get_area_string($no, $key)
{
  $csv_path = plugin_dir_path(__FILE__) . "area_params.csv";
  $csv_file = fopen($csv_path, "r");
  $rows_arr = ['no', 'romaji', 'kanji'];
  $index = array_search($key, $rows_arr);

  if (!$index) return 'z';

  if ($csv_file) {
    while (($rows = fgetcsv($csv_file, 100, ",")) !== false) {
      if ((int)$rows[0] === $no) return $rows[$index];
    }
    fclose($csv_file);
  }
  if ($key === 'romaji') return 'z';
  if ($key === 'kanji') return '全国';
  return 'error';
}
