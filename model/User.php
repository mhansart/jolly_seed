<?php
require_once("Connexion.php");
class User extends Connexion
{
    public function read()
    {
        $requete = "SELECT * FROM users";
        return $this->execute($requete);
    }

    public function createResponse($_msg, $_dateResponse, $_userId, $_forumId)
    {
        $requete = "INSERT INTO response_forum (response_msg,`user_id`, response_date,forum_id) VALUES (:msg, :userId, :forumDate, :forumId)";

        $tabChamps = array(
            ":msg" => $_msg,
            ":forumDate" => $_dateResponse,
            ":userId" => $_userId,
            ":forumId" => $_forumId
        );

        $this->execute($requete, $tabChamps);
    }

    public function readforum()
    {
        $requete = "SELECT *,CONCAT(DAY(forum_date),' ', CASE MONTH(forum_date) WHEN 1 THEN 'Janvier' WHEN 2 THEN 'Février' WHEN 3 THEN 'Mars' WHEN 4 THEN 'Avril' WHEN 5 THEN 'Mai' WHEN 6 THEN 'Juin' WHEN 7 THEN 'Juillet' WHEN 8 THEN 'Août' WHEN 9 THEN 'Septembre' WHEN 10 THEN 'Octobre' WHEN 11 THEN 'Novembre' WHEN 12 THEN 'Décembre' END,' ', YEAR(forum_date)) as 'format_date' FROM `forum` ORDER BY forum_id DESC";
        return $this->execute($requete);
    }
}
