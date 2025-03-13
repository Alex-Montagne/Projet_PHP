<?php

namespace Roles;

class SuperAdmin{
    protected string $_nom;
    protected int $_id;

    public function __construct($nom,$id){
        $this -> nom = $nom;
        $this -> id = $id;
    }

    public function poster(){
        
    }

    public function nommerAdmin($nom,$id){
        try {
            $mysqlClient = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        } catch (\Exception $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $sqlQuery = 'SELECT * FROM users WHERE nom = :nom';
        $usersStatement = $mysqlClient->prepare($sqlQuery);
        $usersStatement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $usersStatement->execute();
        $user = $usersStatement->fetch(\PDO::FETCH_ASSOC);

        if($user){
            if($user["role"] == "Admin"){
                die("Cet utilisateur est déjà un admin.");
            }
            else{
                $sqlQuery = 'UPDATE users SET role = "Admin" WHERE id = :id';
                $updateStatement = $mysqlClient->prepare($sqlQuery);
                $updateStatement->bindParam(':id', $id, \PDO::PARAM_INT);
                $updateStatement->execute();
                echo "Cet utilisateur est maintenant un Admin.";
            }
        }
        else{
            die("Nom d'utilisateur incorrect.");
        }
    }

    public function demettreAdmin($nom,$id){
        try {
            $mysqlClient = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        } catch (\Exception $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $sqlQuery = 'SELECT * FROM users WHERE nom = :nom';
        $usersStatement = $mysqlClient->prepare($sqlQuery);
        $usersStatement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $usersStatement->execute();
        $user = $usersStatement->fetch(\PDO::FETCH_ASSOC);

        if($user){
            if($user["role"] != "Admin"){
                die("Cet utilisateur n'est déjà pas un Admin.");
            }
            else{
                $sqlQuery = 'UPDATE users SET role = "Lecteur" WHERE id = :id';
                $updateStatement = $mysqlClient->prepare($sqlQuery);
                $updateStatement->bindParam(':id', $id, \PDO::PARAM_INT);
                $updateStatement->execute();
                echo "Cet utilisateur n'est plus un Admin.";
            }
        }
        else{
            die("Nom d'utilisateur incorrect.");
        }
    }

    public function nommerAuteur($nom,$id){
        try {
            $mysqlClient = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        } catch (\Exception $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $sqlQuery = 'SELECT * FROM users WHERE nom = :nom';
        $usersStatement = $mysqlClient->prepare($sqlQuery);
        $usersStatement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $usersStatement->execute();
        $user = $usersStatement->fetch(\PDO::FETCH_ASSOC);

        if($user){
            if($user["role"] == "Auteur"){
                die("Cet utilisateur est déjà un auteur.");
            }
            else{
                $sqlQuery = 'UPDATE users SET role = "Auteur" WHERE id = :id';
                $updateStatement = $mysqlClient->prepare($sqlQuery);
                $updateStatement->bindParam(':id', $id, \PDO::PARAM_INT);
                $updateStatement->execute();
                echo "Cet utilisateur est maintenant un auteur.";
            }
        }
        else{
            die("Nom d'utilisateur incorrect.");
        }
    }

    public function demettreAuteur($nom,$id){
        try {
            $mysqlClient = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        } catch (\Exception $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $sqlQuery = 'SELECT * FROM users WHERE nom = :nom';
        $usersStatement = $mysqlClient->prepare($sqlQuery);
        $usersStatement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $usersStatement->execute();
        $user = $usersStatement->fetch(\PDO::FETCH_ASSOC);

        if($user){
            if($user["role"] != "Auteur"){
                die("Cet utilisateur n'est déjà pas un auteur.");
            }
            else{
                $sqlQuery = 'UPDATE users SET role = "Lecteur" WHERE id = :id';
                $updateStatement = $mysqlClient->prepare($sqlQuery);
                $updateStatement->bindParam(':id', $id, \PDO::PARAM_INT);
                $updateStatement->execute();
                echo "Cet utilisateur n'est plus un auteur.";
            }
        }
        else{
            die("Nom d'utilisateur incorrect.");
        }
    }

    public function supprimerCompte($nom,$id){
        try {
            $mysqlClient = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        } catch (\Exception $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        $sqlQuery = 'SELECT * FROM users WHERE nom = :nom AND id = :id';
        $usersStatement = $mysqlClient->prepare($sqlQuery);
        $usersStatement->bindParam(':nom', $nom, \PDO::PARAM_STR);
        $usersStatement->bindParam(':id', $id, \PDO::PARAM_INT);
        $usersStatement->execute();
        $user = $usersStatement->fetch(\PDO::FETCH_ASSOC);

        if($user){
            $sqlQuery = 'DELETE FROM users WHERE nom = :nom AND id = :id';
            $updateStatement = $mysqlClient->prepare($sqlQuery);
            $usersStatement->bindParam(':nom', $nom, \PDO::PARAM_STR);
            $updateStatement->bindParam(':id', $id, \PDO::PARAM_INT);
            $updateStatement->execute();
            echo "Le compte de cet utilisateur a été supprimé.";
        }
        else{
            die("Cet utilisateur n'existe déjà pas.");
        }
    }
}