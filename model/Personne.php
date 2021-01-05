<?php
require_once("Connexion.php");
class Personne extends Connexion
{
    public function createUser($_nom, $_prenom, $_email, $_adRue, $_adNum, $_adCp, $_box, $_adVille, $_mdp, $_phone, $_picture, $_description)
    {
        $requete = "INSERT INTO users (`user_name`, user_firstname,  user_mdp, user_street, user_street_number, user_box,user_city,user_citycode,user_phone,user_email,user_picture,user_description) VALUES (:nom, :prenom,  :mdp, :street, :streetNumber, :boxNumber,:city,:citycode,:phone,:email,:picture,:userDescription)";

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
            ":picture" => $_picture,
            ":userDescription" => $_description,
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
        $requete = "SELECT `user_id`,user_email,user_mdp, user_firstname, user_city FROM users WHERE user_email = :email";
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

    public function updateMdp($_userMdp, $_id)
    {
        $requete = "UPDATE users SET user_mdp = :mdp WHERE `user_id` = :id";

        $tabChamps = array(
            ":mdp" => $_userMdp,
            ":id" => $_id
        );
        return $this->execute($requete, $tabChamps);
    }

    public function updateUser($_id, $_nom, $_prenom, $_rue, $_number, $_boxnumber, $_citycode, $_city, $_phone, $_email, $_description)
    {
        $requete = "UPDATE users SET `user_name` = :nom, user_firstname = :prenom, user_street = :street, user_street_number = :streetnumber, user_box = :boxnumber, user_citycode = :citycode, user_city = :city, user_phone = :phone, user_email = :email, user_description = :userdescription WHERE `user_id`= :update_id";

        $tabChamps = array(
            ":nom" => $_nom,
            ":prenom" => $_prenom,
            ":street" => $_rue,
            ":streetnumber" => $_number,
            ":boxnumber" => $_boxnumber,
            ":citycode" => $_citycode,
            ":city" => $_city,
            ":phone" => $_phone,
            ":email" => $_email,
            ":userdescription" => $_description,
            ":update_id" => $_id
        );

        return $this->execute($requete, $tabChamps);
    }

    public function delete($_id)
    {
        $requete = "DELETE FROM users WHERE `user_id` = :id";
        $tabChamps = array(
            ":id" => $_id
        );
        $this->execute($requete, $tabChamps);
    }
}
