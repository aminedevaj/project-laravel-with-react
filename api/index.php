<?php

// Cree l-folders darouriyen f /tmp
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0777, true);
}

// L-base de données
$dbPath = '/tmp/database.sqlite';
if (!file_exists($dbPath)) {
    touch($dbPath);
}

require __DIR__ . '/../public/index.php';