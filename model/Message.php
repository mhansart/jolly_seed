<?php
require_once("Connexion.php");
class Message extends Connexion
{
    public function createMessage($_sender, $_receiver, $_msg)
    {
        $requete = "INSERT INTO messagerie (sender_id, receiver_id,msg_text) VALUES (:sender, :receiver, :msg)";

        $tabChamps = array(
            ":sender" => $_sender,
            ":receiver" => $_receiver,
            ":msg" => $_msg,
        );

        $this->execute($requete, $tabChamps);
    }
    public function readById($_id)
    {
        $requete = "SELECT *  FROM `messagerie` WHERE `sender_id` = :id OR receiver_id = :id";
        $tabChamps = array(
            ":id" => $_id
        );
        return $this->execute($requete, $tabChamps);
    }

    public function readMessage($_id, $_otherId)
    {
        $requete = "SELECT *, CONCAT(DAY(msg_date),' ', CASE MONTH(msg_date) WHEN 1 THEN 'Janvier' WHEN 2 THEN 'Février' WHEN 3 THEN 'Mars' WHEN 4 THEN 'Avril' WHEN 5 THEN 'Mai' WHEN 6 THEN 'Juin' WHEN 7 THEN 'Juillet' WHEN 8 THEN 'Août' WHEN 9 THEN 'Septembre' WHEN 10 THEN 'Octobre' WHEN 11 THEN 'Novembre' WHEN 12 THEN 'Décembre' END,' ', YEAR(msg_date)) as 'format_date', CONCAT(HOUR(msg_hour),'h',MINUTE(msg_hour)) as 'format_hour' FROM `messagerie` WHERE sender_id = :id AND receiver_id = :otherid OR sender_id = :otherid AND receiver_id = :id";
        $tabChamps = array(
            ":id" => $_id,
            ":otherid" => $_otherId
        );
        return $this->execute($requete, $tabChamps);
    }

    public function createResponse($_senderId, $_receiverId, $_msg, $_msgDate, $_msgHour)
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
    public function deleteMessage($_userId)
    {
        $requete = "DELETE FROM messagerie WHERE sender_id = :userId OR receiver_id = :userId";
        $tabChamps = array(
            ":userId" => $_userId,
        );
        $this->execute($requete, $tabChamps);
    }
    public function updateMsg($_id, $_otherId, $_vu)
    {
        $requete = "UPDATE messagerie SET msg_vu = :vu WHERE sender_id = :id AND receiver_id = :otherid";

        $tabChamps = array(
            ":id" => $_id,
            ":otherid" => $_otherId,
            ":vu" => $_vu

        );
        return $this->execute($requete, $tabChamps);
    }
}
