<?php
/* Make a connection with the data Base */
class Db
{

    static public function connect()
    {


        try {

            $dbname = "aws-cloud-practitioner-knowledge-test";
            $username = 'root';
            $password = '';

            //PDO is an extention that help us to make a connection with the data base 
            $db       = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

            // $db->exec('set names utf8');

            return $db;
        } catch (PDOException $e) {

            print $e->getMessage();
            die();
        }
    }
}
