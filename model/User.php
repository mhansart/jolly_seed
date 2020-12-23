<?php
require_once("Connexion.php");
class User extends Connexion
{
    public function read()
    {
        $requete = "SELECT * FROM users";
        return $this->execute($requete);
    }
}