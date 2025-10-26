<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");

$url = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRlKn--hJZYQtsgVD3trrYc713Ri0rrwPgP-ot-fUcTMhHW3AsmYzORmT20B0U2vg/pub?output=xlsx";
echo file_get_contents($url);
?>
