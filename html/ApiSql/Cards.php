<?php
require_once __DIR__.'/../database/database.php';


function getCard() {
    global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM Card');
        $stmt->execute();
        return $stmt->fetchAll();
    }

function getTypeCard() {
    global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM Type_card');
        $stmt->execute();
        return $stmt->fetchAll();
    }

function createCard($name, $picture, $description, $type_card, $life_points, $attack, $power, $activation) {
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO Card (name, picture, description, type_card, life_points, attack, power, activation) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$name, $picture, $description, $type_card, $life_points, $attack, $power, $activation]);
        return $stmt->rowCount() > 0;
    }


    function getattack() {
        global $pdo;
            $stmt = $pdo->prepare('SELECT * FROM Card where type_card="attack"');
            $stmt->execute();
            return $stmt->fetchAll();
        }
    
    // function createCommentary($userId, $taskId, $title, $content, $creationDate) {
    //     global $pdo;
    //     $stmt = $pdo->prepare('INSERT INTO comments (userId, taskId, title, content, creationDate) VALUES (?, ?, ?, ?, ?)');
    //     return $stmt->execute([$userId, $taskId, $title, $content, $creationDate]);
    // }



?>