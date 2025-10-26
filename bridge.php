<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
$url = "https://docs.google.com/spreadsheets/d/e/2PACX-1vTRnhQa92Mh7TabDcvU0o24dy2OtbUhFXXgh2hwd5BCvZoMVcQ1HKHHK90CcqUUsWIgtEga-4t0TXxo/pub?output=xlsx";
echo file_get_contents($url);
?>