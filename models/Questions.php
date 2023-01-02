<?php
include '../database/Db.php';

class questions 
{

    static public function getAll()
    {
        $stmt = Db::connect()->prepare("SELECT * FROM `questions` INNER JOIN `answers` ON questions.id = answers.question_id LIMIT 20;");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;

    }
}
