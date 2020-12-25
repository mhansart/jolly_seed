<?php
require_once("Connexion.php");
class User extends Connexion
{
    public function readUsers()
    {
        $requete = "SELECT user_id, user_street, user_street_number, user_city, user_citycode FROM users";
        return $this->execute($requete);
    }


    public function readAds()
    {
        $requete = "SELECT ads_user_id, ads_type, ads_category, ads_active,ads_title, ads_city FROM ads WHERE ads_active = 1";
        return $this->execute($requete);
    }

}