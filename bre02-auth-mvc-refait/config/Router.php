<?php

class Router
{
    public function __construct()
    {
        
    }
    //Méthode qui permet d'analyse la route spécifiée dans le tableau $get (qui provient généralement de $_GET)
    public function handleRequest(array $get)
    {
        $pageController = new PageController();
        $authController = new AuthController();
        
        //Si la route est connexion, la méthode login de AuthController est appelée.
        if(isset($get["route"]) && $get["route"] === "connexion")
        {
            $authController->login();
        }
        //sinon si la route est check-connexion, la méthode checkLogin de AuthController est appelée.
        else if(isset($get["route"]) && $get["route"] === "check-connexion")
        {
            $authController->checkLogin();
        }
        
         //sinon si la route est space-perso, la méthode spacePerso de PageController est appelée.
        else if(isset($get["route"]) && $get["route"] === "space-perso")
        {
            $pageController->spacePerso();
        }
         //sinon si la route est deconnexion, la méthode logout de AuthController est appelée.
        else if(isset($get["route"]) && $get["route"] === "déconnexion")
        {
            $authController->logout();
        }
        else //sinon page d'erreur 404
        {
            $pageController->notFound();
        }
        
    }
}