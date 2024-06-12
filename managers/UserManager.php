<?php

require_once "managers/AbstractManager.php";
require_once "models/User.php";

//permet de créer et récupérer des utilisateurs
class UserManager extends AbstractManager
{
    public function createUser($first_name, $last_name, $email, $password): void
    {
        $query = $this->pdo->prepare("INSERT INTO users (id, first_name, last_name, email, password) VALUES (NULL, :first_name, :last_name, :email, :password)");
        $query->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
    
    //permet de recupéré un user par le biais de son email et le renvoyer dans une instance de la class User s'il existe ou renvoie null.
    public function getUserByEmail(string $email): ? User//la métohde retourne soit un objet User soit null,(le ? indique que le retour peut être de type User ou null).
    {
        //$this->pdo : Fait référence à la connexion PDO à la base de données, héritée de AbstractManager
        //La requête SQL sélectionne toutes les colonnes de la table users où le email correspond au paramètre nommé :email.
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([':email' => $email]);
        $data = $query->fetch(PDO::FETCH_ASSOC); /*fetch(PDO::FETCH_ASSOC) : Récupère le prochain résultat de la requête sous forme de tableau associatif. 
        Chaque colonne de la table devient une clé du tableau.*/

        if ($data) 
        { //Vérifie si des données ont été trouvées (si $data n'est pas vide ou false).
            
            //Si des données ont été trouvées, crée et retourne un nouvel objet User en utilisant les données récupérées 
            return new User($data['id'], $data['first_name'], $data['last_name'], $data['email'], $data['password']);
        }
        return null; //Si aucune donnée n'a été trouvée (aucun utilisateur avec ce username), retourne null.
    
        var_dump($this->data);
    }
}
