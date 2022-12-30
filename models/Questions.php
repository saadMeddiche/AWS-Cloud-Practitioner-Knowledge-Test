<?php
include './database/Db.php';

class questions 
{

    static public function getAll()
    {
        $stmt = Db::connect()->prepare("SELECT * FROM `parts`");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;

    }
}
