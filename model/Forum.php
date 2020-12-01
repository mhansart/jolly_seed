<?php
require_once("Connexion.php");
class Forum extends Connexion
{
    public function createForum($_title, $_msg, $_dateForum, $_userId)
    {
        $requete = "INSERT INTO forum (forum_msg,forum_title, forum_date, `user_id`) VALUES (:msg, :title, :forumDate, :userId)";

        $tabChamps = array(
            ":title" => $_title,
            ":msg" => $_msg,
            ":forumDate" => $_dateForum,
            ":userId" => $_userId,
        );

        $this->execute($requete, $tabChamps);
    }

    public function readforum()
    {
        $requete = "SELECT * FROM forum";
        return $this->execute($requete);
    }

    public function readById($_id)
    {
        $requete = "SELECT * FROM personne WHERE id = :id";
        $tabChamps = array(
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
