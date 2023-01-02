<?php

class Answers
{



    static public function getAll()
    {
        $stmt = Db::connect()->prepare("SELECT `id`,`correct`,`question_id` FROM `answers` WHERE correct = 0");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
}
