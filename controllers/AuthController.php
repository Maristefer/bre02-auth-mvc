<?php

require_once "managers/UserManager.php";

//gere la connexion et l'inscription
class AuthController
{
    
    public function connexion(): void
    {
         $route = "connexion";
         
         require "templates/layout.phtml";
    }
    
    public function checkConnexion(): void
    {
        //Récupérer les champs du formulaire dans $_POST
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        //Vérifier si l'utilisateur existe dans la base de données grâce à son email
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        
        if ($user) 
        {
            // 3. Vérifier si le mot de passe soumis correspond à celui stocké dans la base de données
            if (password_verify($password, $user->getPassword())) 
            {
                // 4. Si tout est bon, stocker dans $_SESSION le fait que l'utilisateur soit connecté
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['email'] = $user->getEmail();
                
                // 5. Rediriger vers la bonne route
                header('Location: index.php?route=spacePerso');
                exit();
            } 
            else 
            {
                // Mot de passe incorrect
                $error = "Mot de passe incorrect ou utilisateur non trouvé.";
            }
            
                header('Location: index.php?route=notFound'.$error);
                exit();
        }
    }
    
    public function register(): void
    {
         $route = "inscription";
         require "templates/layout.phtml";
    }
    
    public function checkRegister(): void
    {
        $email = $_POST['email'] ?? '';
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (!empty($email) && !empty($first_name) && !empty($last_name) && !empty($password)) 
        {
            $userManager = new UserManager();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user = new User(null, $first_name, $last_name, $hashedPassword, $email);
            $userManager->createUser($user);
            
            session_start();
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['first_name'] = $user->getFirst_name();
            $_SESSION['last_name'] = $user->getLast_name();
            header('Location: index.php?route=spacePerso');
            exit();
        } 
        else 
        {
            $error = "Tous les champs sont obligatoires.";
            header('Location: index.php?route=notFound' . $error);
            exit();
        }
        header('Location: index.php?route=spacePerso');
        exit();
    }
        
}