<?php

class Router
{
    public function __construct()
    {
        
    }
    
     //Méthode
    
    public function handleRequest(array $get): void
    {
        $pageController = new PageController();
        
        $authController = new AuthController();
        
        if(isset($get["route"]) && $get["route"] === "connexion")
        {
            $authController->connexion();
        } 
        else if (isset($get["route"]) && $get["route"] === "check-connexion") 
        {
            $authController->checkConnexion();
        } 
        else if(isset($get["route"]) && $get["route"] ===  "inscription" )
        {
            $authController->register();
        }
        else if (isset($get["route"]) && $get["route"] === "check-inscription") 
        {
            $authController->checkRegister();
        } 
        else if(isset($get["route"]) && $get["route"] ===  "spacePerso" )
        {
            $pageController->spacePerso();
        }
        else 
        {
            // Pour toutes les autres routes
            $pageController->notFound();
        }
    }
    
}