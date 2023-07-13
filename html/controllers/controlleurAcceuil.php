<?php

require_once __DIR__.'/../Modele/Deck.php';
require_once __DIR__.'/../Vue/Acceuil.php';

class ControleurAccueil {

    private $Deck;

    public function __construct() {
        $this->Deck = new Deck();
    }

// Affiche la liste de tous les Decks du blog
    public function accueil() {
        $Decks = $this->Deck->getDecks();
        $vue = new Vue("Accueil");
        $vue->generer(array('Decks' => $Decks));
    }

}

