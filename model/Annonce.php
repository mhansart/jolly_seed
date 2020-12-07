<?php 
    require_once("Connexion.php");
    class Annonce extends Connexion 
    {
        public function create($_ads_type, $_ads_category, $_ads_time, $_ads_date, $_ads_description, $_ads_picture, $_ads_active, $_ads_title)
        {
            $requete = "INSERT INTO ads (ads_type, ads_category, ads_time, ads_date, ads_description, ads_picture, ads_active, ads_title) VALUES (:adsType, :adsCategory, :adsTime, :adsDate, :adsDescription, :adsPicture, :adsActive, :adsTitle)";

            $tabChamps= array(
                ":adsType" => $_ads_type,
                ":adsCategory" => $_ads_category,
                ":adsTime" => $_ads_time,
                ":adsDate" => $_ads_date,
                ":adsDescription" => $_ads_description,
                ":adsPicture" => $_ads_picture,
                ":adsActive" => $_ads_active,
                ":adsTitle" => $_ads_title,
            );

            $this->execute($requete, $tabChamps);
        }

        public function read()
        {
            $requete = "SELECT * FROM ads";
            return $this->execute($requete);
        }

        public function readByCategoryType($_ads_category)
        {
            $requete = "SELECT * FROM ads WHERE ads_category != :temps";
            $tabChamps = array(
                ":temps" => $_ads_category
            );
            return $this->execute($requete, $tabChamps);
        }

        public function readByCategoryTime($_ads_category)
        {
            $requete = "SELECT * FROM ads WHERE ads_category == :temps";
            $tabChamps = array(
                ":temps" => $_ads_category
            );
            return $this->execute($requete, $tabChamps);
        }

        public function readById($_ads_id)
        {
            $requete = "SELECT * FROM ads WHERE ads_id = :adsId";
            $tabChamps = array(
                ":adsId" => $_ads_id
            );
            return $this->execute($requete, $tabChamps);
        }

        public function update($_ads_id, $_ads_type, $_ads_category, $_ads_date, $_ads_description, $_ads_picture, $_ads_active, $_ads_title)
        {
            $requete = "UPDATE ads SET ads_type = :adsType, ads_category = :adsCategory, ads_date = :adsDate, ads_description = :adsDescription, ads_picture = :adsPicture, ads_active = :adsActive, ads_title = :adsTitle WHERE ads_id = :id";

            $tabChamps= array(
                ":adsType" => $_ads_type,
                ":adsCategory" => $_ads_category,
                ":adsDate" => $_ads_date,
                ":adsDescription" => $_ads_description,
                ":adsPicture" => $_ads_picture,
                ":adsActive" => $_ads_active,
                ":adsTitle" => $_ads_title,
                ":adsId" => $_ads_id
            );

            return $this->execute($requete, $tabChamps);
        }

        public function delete($_ads_id)
        {
            $requete = "DELETE FROM ads WHERE ads_id = :adsId";
            $tabChamps = array(
                ":adsId" => $_ads_id
            );
            $this->execute($requete, $tabChamps);
        }
    }
?>