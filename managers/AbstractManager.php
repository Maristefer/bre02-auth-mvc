<?php

// Gére la connexion de la base de données
class AbstractManager
{
    protected PDO $pdo;
    
    public function __construct()
    {
        
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "marieevamirtil_soutienpdo";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = "marieevamirtil";
        $password = "298bd4f37ef5f7fa0395445666351fa6";
        
     $this->pdo = new PDO(
            $connexionString,
            $user,
            $password); 
    
    echo "<pre>";
    var_dump($this->pdo);
    echo "</pre>";
    }
    
   
}