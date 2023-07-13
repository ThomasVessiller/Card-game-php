<?php

require_once __DIR__.'/ControleurAccueil.php';
require_once __DIR__.'/ControleurEvent.php';
require_once __DIR__.'/../Vue/acceuil.php';
class Routeur {

    private $ctrlAccueil;
    private $ctrlEvent;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlEvent = new ControleurEvent();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'event') {
                    $idEvent = intval($this->getParametre($_GET, 'id'));
                    if ($idEvent != 0) {
                        $this->ctrlEvent->event($idEvent);
                    }
                    else
                        throw new Exception("Identifiant de event non valide");
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idEvent = $this->getParametre($_POST, 'id');
                    $this->ctrlEvent->commenter($auteur, $contenu, $idEvent);
                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
