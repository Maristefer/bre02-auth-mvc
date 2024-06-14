<?php

/*require_once "managers/AbstractManager.php";
require_once "models/User.php";*/

//permet de créer et récupérer des utilisateurs
class UserManager extends AbstractManager
{
    public function findOne(string $email) : User
    {
        //$this->pdo : Fait référence à la connexion PDO à la base de données, héritée de AbstractManager
        //La requête SQL sélectionne toutes les colonnes de la table users où le email correspond au paramètre nommé :email.
        $query = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        
        $parameters = [
            "email" => $email,
        ];
        
        $query->execute($parameters);
        
        //Récupère le résultat de la requête sous forme de tableau associatif
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if($user !== null)//Vérifie si des données ont été trouvées (si $user n'est pas null).
        {
            //Si des données ont été trouvées, crée et retourne un nouvel objet User en utilisant les données récupérées 
            $item = new User($user["id"], $user["email"], $user["password"], $user["first_name"], $user["last_name"]);
            //définit l'Id de l'objet User avec la méthode setId.
            $item->setId($user['id']);
        }
        else
        {
            $item = new User("", "", "", "","");
        }

        return $item;
    }
}