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

    public function createResponse($_msg, $_dateResponse, $_userId, $_forumId)
    {
        $requete = "INSERT INTO response_forum (response_msg,`user_id`, response_date,forum_id) VALUES (:msg, :userId, :forumDate, :forumId)";

        $tabChamps = array(
            ":msg" => $_msg,
            ":forumDate" => $_dateResponse,
            ":userId" => $_userId,
            ":forumId" => $_forumId
        );

        return $this->execute($requete, $tabChamps);
    }

    public function readforum()
    {
        $requete = "SELECT *,CONCAT(DAY(forum_date),' ', CASE MONTH(forum_date) WHEN 1 THEN 'Janvier' WHEN 2 THEN 'Février' WHEN 3 THEN 'Mars' WHEN 4 THEN 'Avril' WHEN 5 THEN 'Mai' WHEN 6 THEN 'Juin' WHEN 7 THEN 'Juillet' WHEN 8 THEN 'Août' WHEN 9 THEN 'Septembre' WHEN 10 THEN 'Octobre' WHEN 11 THEN 'Novembre' WHEN 12 THEN 'Décembre' END,' ', YEAR(forum_date)) as 'format_date' FROM `forum` ORDER BY forum_id DESC";
        return $this->execute($requete);
    }

    public function createResponseChat($_senderId, $_receiverId, $_msg, $_msgDate, $_msgHour)
    {
        $requete = "INSERT INTO messagerie (sender_id,`receiver_id`, msg_text, msg_date, msg_hour) VALUES (:sender, :receiver, :msg, :dateMsg, :hourMsg)";

        $tabChamps = array(
            ":sender" => $_senderId,
            ":receiver" => $_receiverId,
            ":msg" => $_msg,
            ":dateMsg" => $_msgDate,
            ":hourMsg" => $_msgHour,
        );

        $this->execute($requete, $tabChamps);
    }
    public function readMessage()
    {
        $requete = "SELECT *, CONCAT(DAY(msg_date),' ', CASE MONTH(msg_date) WHEN 1 THEN 'Janvier' WHEN 2 THEN 'Février' WHEN 3 THEN 'Mars' WHEN 4 THEN 'Avril' WHEN 5 THEN 'Mai' WHEN 6 THEN 'Juin' WHEN 7 THEN 'Juillet' WHEN 8 THEN 'Août' WHEN 9 THEN 'Septembre' WHEN 10 THEN 'Octobre' WHEN 11 THEN 'Novembre' WHEN 12 THEN 'Décembre' END,' ', YEAR(msg_date)) as 'format_date', CONCAT(HOUR(msg_hour),'h',MINUTE(msg_hour)) as 'format_hour' FROM `messagerie`";
        return $this->execute($requete);
    }
    public function readAllUsers()
    {
        $requete = "SELECT * FROM users";
        return $this->execute($requete);
    }
}
