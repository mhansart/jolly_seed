<?php
require_once("Connexion.php");
class Forum extends Connexion
{
    public function createForum($_title, $_msg, $_dateForum, $_userId, $_forumTags)
    {
        $requete = "INSERT INTO forum (forum_msg,forum_title, forum_date, `user_id`,forum_tags) VALUES (:msg, :title, :forumDate, :userId, :forumTag)";

        $tabChamps = array(
            ":title" => $_title,
            ":msg" => $_msg,
            ":forumDate" => $_dateForum,
            ":userId" => $_userId,
            ":forumTag" => $_forumTags
        );

        $this->execute($requete, $tabChamps);
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


    public function lastInsert()
    {
        $requete = "SELECT MAX(LAST_INSERT_ID(`response_id`))as 'dernier_id' FROM response_forum";

        return $this->execute($requete);
    }

    public function readforum()
    {
        $requete = "SELECT *,CONCAT(DAY(forum_date),' ', CASE MONTH(forum_date) WHEN 1 THEN 'Janvier' WHEN 2 THEN 'Février' WHEN 3 THEN 'Mars' WHEN 4 THEN 'Avril' WHEN 5 THEN 'Mai' WHEN 6 THEN 'Juin' WHEN 7 THEN 'Juillet' WHEN 8 THEN 'Août' WHEN 9 THEN 'Septembre' WHEN 10 THEN 'Octobre' WHEN 11 THEN 'Novembre' WHEN 12 THEN 'Décembre' END,' ', YEAR(forum_date)) as 'format_date' FROM `forum` ORDER BY forum_id DESC";
        return $this->execute($requete);
    }

    public function readById($_id)
    {
        $requete = "SELECT *,CONCAT(DAY(forum_date),' ', CASE MONTH(forum_date) WHEN 1 THEN 'Janvier' WHEN 2 THEN 'Février' WHEN 3 THEN 'Mars' WHEN 4 THEN 'Avril' WHEN 5 THEN 'Mai' WHEN 6 THEN 'Juin' WHEN 7 THEN 'Juillet' WHEN 8 THEN 'Août' WHEN 9 THEN 'Septembre' WHEN 10 THEN 'Octobre' WHEN 11 THEN 'Novembre' WHEN 12 THEN 'Décembre' END,' ', YEAR(forum_date)) as 'format_date' FROM forum WHERE forum_id = :id";
        $tabChamps = array(
            ":id" => $_id
        );
        return $this->execute($requete, $tabChamps);
    }

    public function readMsgByForumId($_id)
    {
        $requete = "SELECT *,CONCAT(DAY(response_date),' ', CASE MONTH(response_date) WHEN 1 THEN 'Janvier' WHEN 2 THEN 'Février' WHEN 3 THEN 'Mars' WHEN 4 THEN 'Avril' WHEN 5 THEN 'Mai' WHEN 6 THEN 'Juin' WHEN 7 THEN 'Juillet' WHEN 8 THEN 'Août' WHEN 9 THEN 'Septembre' WHEN 10 THEN 'Octobre' WHEN 11 THEN 'Novembre' WHEN 12 THEN 'Décembre' END,' ', YEAR(response_date)) as 'format_date' FROM response_forum WHERE forum_id = :id ORDER BY response_id ASC";
        $tabChamps = array(
            ":id" => $_id
        );
        return $this->execute($requete, $tabChamps);
    }


    public function updateForum($_newId, $_userId)
    {
        $requete = "UPDATE forum SET `user_id` = :newUserId WHERE `user_id` = :userId";

        $tabChamps = array(
            ":newUserId" => $_newId,
            ":userId" => $_userId
        );

        return $this->execute($requete, $tabChamps);
    }
    public function updateResponseForum($_newId, $_userId)
    {
        $requete = "UPDATE response_forum SET `user_id` = :newUserId WHERE `user_id` = :userId";

        $tabChamps = array(
            ":newUserId" => $_newId,
            ":userId" => $_userId
        );

        return $this->execute($requete, $tabChamps);
    }
}
