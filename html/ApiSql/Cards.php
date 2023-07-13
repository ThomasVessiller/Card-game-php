<?php
require_once __DIR__.'/../database/database.php';

function getCard() {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM Card');
    return $stmt->fetchAll();
}