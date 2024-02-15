<?php
// Inclure le fichier de configuration
require_once 'config.php';

// Déterminer l'URL demandée
$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = substr($request_uri, 13);

if (strlen($request_uri) > 1) $request_uri = rtrim($request_uri, '/');


// Définir les routes
$routes = [
    '/' => 'AccueilControleur@index',
    '/accueil' => 'AccueilControleur@index',
    '/club' => 'ClubControleur@index',
    '/equipes' => 'EquipesControleur@index',
    '/galerie' => 'GalerieControleur@index',
    '/boutique' => 'BoutiqueControleur@index',
    '/contacts' => 'ContactsControleur@index',
];

require_once 'app/controleurs/HeaderControleur.php';

$header = new HeaderControleur();
$header->index();

// Vérifier si l'URL demandée correspond à une route
if (array_key_exists($request_uri, $routes)) {
    // Extraire le contrôleur et la méthode à appeler
    list($controleur, $methode) = explode('@', $routes[$request_uri]);

    // Afficher la route correspondante pour le débogage
    // echo "Route: $request_uri => $controller::$method <br>";
    
    // Inclure le fichier du contrôleur
    require_once 'app/controleurs/' . $controleur . '.php';

    // Créer une instance du contrôleur et appeler la méthode
    $controleurInstance = new $controleur();
    $controleurInstance->$methode();
} else {
    // Afficher une erreur 404 si l'URL demandée n'existe pas dans les routes
    http_response_code(404);
    echo "Erreur 404 - Page non trouvée";
}