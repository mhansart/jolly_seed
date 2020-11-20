<?php 
    require_once("Connexion.php");
    class Personne extends Connexion 
    {
        public function create($_nom, $_prenom, $_sexe, $_adRue, $_adNum, $_adCp, $_adVille)
        {
            $requete = "INSERT INTO personne (nom, prenom, sexe, ad_rue, ad_num, ad_cp, ad_ville) VALUES (:nom, :prenom, :sexe, :adRue, :adNum, :adCp, :adVille)";

            $tabChamps= array(
                ":nom" => $_nom,
                ":prenom" => $_prenom,
                ":sexe" => $_sexe,
                ":adRue" => $_adRue,
                ":adNum" => $_adNum,
                "adCp" => $_adCp,
                ":adVille" => $_adVille
            );

            $this->execute($requete, $tabChamps);
        }

        public function read()
        {
            $requete = "SELECT * FROM personne";
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

            $tabChamps= array(
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
?>