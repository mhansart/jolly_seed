<?php
require_once("Connexion.php");
class Personne extends Connexion
{
    public function createUser($_nom, $_prenom, $_email, $_adRue, $_adNum, $_adCp, $_box, $_adVille, $_mdp, $_phone)
    {
        $requete = "INSERT INTO users (`user_name`, user_firstname,  user_mdp, user_street, user_street_number, user_box,user_city,user_citycode,user_phone,user_email) VALUES (:nom, :prenom,  :mdp, :street, :streetNumber, :boxNumber,:city,:citycode,:phone,:email)";

        $tabChamps = array(
            ":nom" => $_nom,
            ":prenom" => $_prenom,
            ":email" => $_email,
            ":street" => $_adRue,
            ":streetNumber" => $_adNum,
            ":citycode" => $_adCp,
            ":boxNumber" => $_box,
            ":city" => $_adVille,
            ":mdp" => $_mdp,
            ":phone" => $_phone,

        );

        $this->execute($requete, $tabChamps);
    }

    public function readUser()
    {
        $requete = "SELECT * FROM users";
        return $this->execute($requete);
    }

    public function readById($_id)
    {
        $requete = "SELECT * FROM `users` WHERE `user_id` = :id";
        $tabChamps = array(
            ":id" => $_id
        );
        return $this->execute($requete, $tabChamps);
    }

    public function readConnexion($_email)
    {
        $requete = "SELECT `user_id`,user_email,user_mdp, user_firstname FROM users WHERE user_email = :email";
        $tabChamps = array(
            ":email" => $_email
        );
        return $this->execute($requete, $tabChamps);
    }

    public function lastInsert()
    {
        $requete = "SELECT MAX(LAST_INSERT_ID(`user_id`))as 'dernier_id' FROM users";

        return $this->execute($requete);
    }

    public function updatePicture($_userPicture, $_id)
    {
        $requete = "UPDATE users SET user_picture = :picture WHERE `user_id` = :id";

        $tabChamps = array(
            ":picture" => $_userPicture,
            ":id" => $_id
        );
        return $this->execute($requete, $tabChamps);
    }

    public function updateDescription($_userDescription, $_id)
    {
        $requete = "UPDATE users SET user_description = :descriptionUser WHERE `user_id` = :id";

        $tabChamps = array(
            ":descriptionUser" => $_userDescription,
            ":id" => $_id
        );
        return $this->execute($requete, $tabChamps);
    }

    public function update($_id, $_nom, $_prenom, $_sexe, $_adRue, $_adNum, $_adCp, $_adVille)
    {
        $requete = "UPDATE personne SET nom = :nom, prenom = :prenom, sexe = :sexe, ad_rue = :adRue, ad_num = :adNum, ad_cp = :adCp, ad_ville = :adVille WHERE id = :id";

        $tabChamps = array(
            ":nom" => $_nom,
            ":prenom" => $_prenom,
            ":sexe" => $_sexe,
            ":adRue" => $_adRue,
            ":adNum" => $_adNum,
            "adCp" => $_adCp,
            ":adVille" => $_adVille,
            ":id" => $_id
        );

        return $this->execute($requete, $tabChamps);
    }

    public function delete($_id)
    {
        $requete = "DELETE FROM personne WHERE id = :id";
        $tabChamps = array(
            ":id" => $_id
        );
        $this->execute($requete, $tabChamps);
    }
}
