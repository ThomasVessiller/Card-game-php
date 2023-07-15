<?php
require_once __DIR__.'/../database/database.php';

class ApiSql {
    private $pdo;
    
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
    
    public function getCard() {
        $stmt = $this->pdo->prepare('SELECT * FROM Card');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getTypeCard() {
        $stmt = $this->pdo->prepare('SELECT * FROM Type_card');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createCard($name, $picture, $description, $type_card, $life_points, $attack, $power, $activation) {
        $stmt = $this->pdo->prepare('INSERT INTO Card (name, picture, description, type_card, life_points, attack, power, activation) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$name, $picture, $description, $type_card, $life_points, $attack, $power, $activation]);
        return $stmt->rowCount() > 0;
    }


    // function createCommentary($userId, $taskId, $title, $content, $creationDate) {
    //     global $pdo;
    //     $stmt = $pdo->prepare('INSERT INTO comments (userId, taskId, title, content, creationDate) VALUES (?, ?, ?, ?, ?)');
    //     return $stmt->execute([$userId, $taskId, $title, $content, $creationDate]);
    // }
    
}
?>