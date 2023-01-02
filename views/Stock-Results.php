<?php
/* Stock the results of the test + give access to results page*/
session_start();

// $_SESSION["correctAnswers"] = $_POST["correctAnswers"];
// $_SESSION["falseAnswers"] = $_POST["falseAnswers"];

$_SESSION["indexOfSelectedAnswers"] = $_POST["indexOfSelectedAnswers"];
$_SESSION["AccessToResults"] = "YouHaveAccess";

include "../database/Db.php";
include "../models/Answers.php";
include "../controllers/AnswersController.php";
$data = new AnswersController;
$answers = $data->getAllAnswers();


$result = [];

$ids = array();

$indexOfFalseAnswers = array();

for ($i = 0; $i < count($answers); $i++) {
    array_push($ids, $answers[$i][0]);
}


//https://stackoverflow.com/questions/44052754/how-to-explode-an-array-of-strings-and-store-results-in-another-array-php
foreach (explode(",", $_SESSION["indexOfSelectedAnswers"]) as $row) {
    array_push($result, $row);
}

for ($i = 0; $i < count($result); $i++) {
    if (in_array($result[$i], $ids)) {
        array_push($indexOfFalseAnswers, $result[$i]);
    }
}

$_SESSION["falseAnswers"] = count($indexOfFalseAnswers);
$_SESSION["correctAnswers"] = count($result) - $_SESSION["falseAnswers"];

$_SESSION["indexOfselectedDescriptions"] = [];

for ($i = 0; $i < count($answers); $i++) {
    if (in_array($answers[$i][0], $indexOfFalseAnswers)) {

        array_push($_SESSION["indexOfselectedDescriptions"], $answers[$i][2]);
    };
}

header("location:./Results.php");
