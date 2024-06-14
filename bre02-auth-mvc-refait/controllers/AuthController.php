<?php

/*require_once "managers/UserManager.php";*/

//gere la connexion et l'inscription
class AuthController
{
    public function __construct()
    {
        
    }
    
    public function login(): void
    {
        //création de la variable route avec comme valeur connexion
         $route = "connexion";
         //inclusion du fichier layout.phtml
         require "templates/layout.phtml";
    }
    
    public function checkLogin(): void
    {
        //Vérifie si les champs du formulaire($_POST) "email" et "password" existent 
        if(isset($_POST["email"]) && isset($_POST["password"]))
        {
            //Vérifier si l'utilisateur existe dans la base de données grâce à son email
            
            //j'intancie ma classe UserManager(me permet d'intéragir avec la base de donnée)
            $userManager = new UserManager();
            
            //on utilise la méthode findOne de UserManager pour trouver 1 utilisateur par son mail
            $user = $userManager->findOne($_POST["email"]);
        
            if ($user->getId() !== null) //vérifie si l'id de l'utilisateur n'est pas null
            {
                //Vérifie si le mot de passe soumis correspond à celui stocké dans la base de données
                if (password_verify($_POST["password"], $user->getPassword())) 
                {
                // Si tout le mdp est bon, le user est stocker dans $_SESSION pour indiqué q'il est connecté
                $_SESSION["user"] = $user;
                
                // Puis est rediriger vers la page space-perso
                header('Location: index.php?route=space-perso');
            
                }
                else// si mauvaise code le user est redirigé vers la page de connexion 
                {
                    var_dump("Le mot de passe est faux");
                    //header('Location: index.php?route=connexion');
                    
                }
   
            } 
            else//si l'id est null le user sera redirigé vers page de connexion
            {
                var_dump("le user existe pas");
                //header('Location: index.php?route=connexion'); 
                
            }
        }
        else//si le champs email et password n'existent pas le user sera redirigé vers page de connexion
        {
            header('Location: index.php?route=connexion');
        }
       
    
    }   
    
   
    
}