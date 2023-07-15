<!DOCTYPE html>
<html>
<head>
    <title>Gestion des cartes</title>
</head>
<body>


<?php
require_once __DIR__.'/../layout/navbar.php';
require_once __DIR__.'/../ApiSql/Cards.php';
require_once __DIR__.'/../database/database.php';
$api = new ApiSql();
$selectedType = isset($_POST['newtype_card']) ? $_POST['newtype_card'] : '';
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ajout d'unecarte
    if (isset($_POST['addCard'])) {
        // Récupération infos formulaire
        $name = $_POST['newname'];
        $picture = $_POST['newpicture'];
        $description = $_POST['newdescription'];
        $type_card = $_POST['newtype_card'];
        $life_points = $_POST['newlife_points'];
        $attack = $_POST['newattack'];
        $power = $_POST['newpower'];
        $activation = $_POST['newactivation'];

        
        if (!empty($name) && !empty($picture) && !empty($description) && !empty($type_card)) {
            $success = createCard($life_points, $picture, $description, $type_card, $life_points, $attack, $power, $activation);
            if ($success) {
                $message = "La carte a été ajouté a la liste des cartes disponibles";
            } else {
                $message = "Erreur lors de l'enregistrement de la carte.";
            }
        } else {
            $message = "Il vous manque des champs pour la carte que vous avez tenté d'ajouter.";
        }
    }
    echo $message;
}
?>
<h2>nouvelle carte</h2>
<form action="NewCard.php" method="post">
    <input type="hidden" name="addCard" value="1">
    nom: <input type="text" name="newname"><br>
    picture: <input type="int" name="newpicture"><br>
    description: <input type="text" name="newdescription"><br>
    type de Carte:

    <select name="newtype_card">
    <?php
    $typeCards = $api->getTypeCard();
    
    foreach ($typeCards as $typeCard) {
        $type = $typeCard['type'];
        
        //echo '<option value="' . $type . '">' . $type . '</option>';
        echo '<option value="' . $type . '"' . ($type === $selectedType ? 'selected' : '') . '>' . $type . '</option>';
    }
    ?></select><?php

    $selectedType = isset($_POST['newtype_card']) ? $_POST['newtype_card'] : '';


    echo "<br>".$selectedType."|".$seltype;



    switch ($selectedType) {
        case 'attack':
            ?>
            Attack: <input type="text" name="newattack"><br>
            Power: <input type="text" name="newpower"><br>
            <?php
            break;
        case 'mob':
            ?>
            HP: <input type="text" name="newlife_points"><br>
            Defense: <input type="text" name="newdefense"><br>
            Speed: <input type="text" name="newspeed"><br>
            <?php
            break;
        case 'spell':
            ?>
            Power: <input type="text" name="newpower"><br>
            Activation: <input type="text" name="newactivation"><br>
            <?php
            break;
        default:
            // Aucun champ supplémentaire n'est affiché par défaut
            break;
    }
    ?>
    <br>
    <input type="submit" value="Ajouter une carte">
</form>
<button onclick="window.location.href='./NewDeck.php';"> retourner au deck </button>
</body>
</html>