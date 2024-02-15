<?php
// Exemple de HeaderController.php

class HeaderControleur {
    // Méthode pour afficher la page d'accueil
    public function index() {
        
        // Chargement de la vue correspondante avec les données préparées
        include_once 'views/header.php';
    }

    // Autres méthodes d'action pour gérer d'autres fonctionnalités de la page d'accueil
}