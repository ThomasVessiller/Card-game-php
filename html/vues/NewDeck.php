
<!DOCTYPE html>
<html>
<head>
    <title>Gestion des decks</title>
</head>
<body>


<?php
require_once __DIR__.'/../ApiSql/Cards.php';
$message1 = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ajout d'un utilisateur
    if (isset($_POST['addDeck'])) {
        // Récupération infos formulaire
        $name = $_POST['newname'];
        $nb_cards = $_POST['nb_cards'];
        $mail = $_POST['newMail'];
        $role = $_POST['newRole'];
        $name = $_POST['newName'];
        $surname = $_POST['newSurname'];


        if (!empty($name) && !empty($nb_cards) && !empty($mail) && !empty($role) && !empty($name) && !empty($surname)) {
            $success = createUser($name, $nb_cards, $mail, $role, $name, $surname);
            if ($success) {
                $message1 = "Le deck a été ajouté.";
            } else {
                $message1 = "Erreur lors de l'enregistrement du deck.";
            }
        } else {
            $message1 = "Il vous manque des champs pour le deck que vous avez tenté d'ajouter.";
        }
    }
    echo $message1;
}
?>
<h2>nouveau deck</h2>
<form action="NewDeck.php" method="post">
    <input type="hidden" name="addDeck" value="1">
    name: <input type="text" name="newname"><br>
    description: <input type="int" name="newName"><br>
    background picture: <input type="text" name="newSurname"><br>
    Role: 
    <select name="newRole">
        <?php 
        $Cards = getCard();
        foreach ($Cards as $card):
        ?>
        <option><?php echo $user['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Ajouter un utilisateur">
</form>

</body>
</html>