<?php

class BoutiqueControleur
{
    public function index()
    {
        $data = array(
            'title' => 'Page d\'accueil',
            'content' => 'Bienvenue sur notre site!'
        );

        // Chargement de la vue correspondante avec les données préparées
        include_once 'views/boutique.php';
    }

}
