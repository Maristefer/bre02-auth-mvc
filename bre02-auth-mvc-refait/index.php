<?php

session_start();

require_once "config/autoload.php";



// Initialiser le routeur et gérer la requête
// Créez une instance du routeur
$router = new Router();

// Passez la superglobale $_GET à la méthode handleRequest du routeur
$router->handleRequest($_GET);