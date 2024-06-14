<?php

class PageController 
{
 
    
    public function spacePerso(): void
    {
        
        //echo "je suis la page profile";
        if(isset($_SESSION["user"]))
        {
        // Si l'utilisateur est connecté, définir la variable de route et charger le template
         $route = "space-perso";
         
         $user = $_SESSION["user"];
         
         require "templates/layout.phtml";
        }
        else
        {
            //Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
            header('Location: index.php?route=connexion');
            //exit(); // S'assurer que le script s'arrête après la redirection
        }
    }
    
    public function notFound(): void
    {
        $route = "notFound";
        
        require "templates/layout.phtml";
    }
    
}