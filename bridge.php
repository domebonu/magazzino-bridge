<?php
// Bridge PHP - Magazzino Itech Point
// Versione aggiornata novembre 2025 - anti-cache + nuova Web App

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/octet-stream");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Nuovo URL della Web App Google Script
$url = "https://script.google.com/macros/s/AKfycbyzpfvbtxMGR7FaiR9Tfl4J_excAqV6gJlRsb1tE2RiGXpfuxpnqje_lYSOvA58egNO/exec";

// Aggiunge un timestamp per evitare qualsiasi caching
$url .= "?nocache=" . time();

// Timeout 20 secondi per evitare blocchi
$context = stream_context_create([
  "http" => ["timeout" => 20]
]);

// Recupera e stampa i dati della Web App
echo file_get_contents($url, false, $context);
?>
