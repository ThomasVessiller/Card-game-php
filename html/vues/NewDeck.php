
<!DOCTYPE html>
<html>
<head>
    <title>Gestion des decks</title>
</head>
<body>


<?php
require_once __DIR__.'/../layout/navbar.php';
require_once __DIR__.'/../ApiSql/Cards.php';
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ajout d'un utilisateur
    if (isset($_POST['addDeck'])) {
        // Récupération infos formulaire
        $name = $_POST['newname'];
        $description = $_POST['newdescription'];
        $bg_picture = $_POST['newbg_picture'];
        $card = $_POST['newcard'];


        if (!empty($name) && !empty($description) && !empty($bg_picture) && !empty($card)) {
            $success = createUser($name, $nb_cards, $description, $bg_picture, $card);
            if ($success) {
                $message = "Le deck a été ajouté.";
            } else {
                $message = "Erreur lors de l'enregistrement du deck.";
            }
        } else {
            $message = "Il vous manque des champs pour le deck que vous avez tenté d'ajouter.";
        }
    }
    echo $message;
}
?>
<h2>nouveau deck</h2>
<form action="NewDeck.php" method="post">
    <input type="hidden" name="addDeck" value="1">
    nom: <input type="text" name="newname"><br>
    description: <input type="text" name="newdescription"><br>
    background picture: <input type="text" name="newbg_picture"><br>
    Cards :
    <select name="newcard">
        <?php 
        $Cards = getCard();
        foreach ($Cards as $card):
        ?>
        <option><?php echo $card['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Ajouter un deck">
</form>
<button onclick="window.location.href='./NewCard.php';"> nouvelle une carte </button>
</body>
</html>