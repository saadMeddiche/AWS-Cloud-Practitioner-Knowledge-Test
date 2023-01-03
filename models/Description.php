<?php

class Description
{

    static function getALL()
    {

        $stmt = Db::connect()->prepare("SELECT * FROM `questions` LIMIT 5;");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

        $stmt = null;
    }
}
