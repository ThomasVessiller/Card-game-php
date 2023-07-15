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
            $success = createCard($name, $picture, $description, $type_card, $life_points, $attack, $power, $activation);
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
    $typeCards = getTypeCard();
    var_dump($typecards);
    
    foreach ($typeCards as $typeCard) {
        $type = $typeCard['type'];
        echo '<option value="' . $type . '">' . $type . '</option>';
        ?>
    <?php }
    ?></select><br><?php



    //echo "<br>".$selectedType."|".$type_card;?>


<br> pour les cartes types 'attaque' remplissez uniquement les champs suivant.<br>
            Power: <input type="text" name="newpower"><br>
            <br>pour les cartes types 'mob' remplissez uniquement les champs suivant.<br>
            HP: <input type="number" name="newlife_points"><br>


            Attack: <select name="newattack"><?php
            $attacks = getattack();
            var_dump($attacks);
            foreach ($attacks as $attack){
                echo $attack;
                echo '<option value="' . $attack . '">' . $attack . '</option>';
            }
            ?></select><br>


            <br>pour les cartes types 'spell' remplissez uniquement les champs suivant.<br>
            Power: <input type="text" name="newpower"><br>
            Activation: <input type="text" name="newactivation"><br>

    <br>
    <input type="submit" value="Ajouter une carte">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selectTypeCard'])) {


    }
}
?>
<button onclick="window.location.href='./NewDeck.php';"> retourner au deck </button>
</body>
</html>