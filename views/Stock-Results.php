<?php

/* Stock the results of the test + give access to results page + Detect the false answer and*/
session_start();

include "../database/Db.php";
include "../models/Answers.php";
include "../controllers/AnswersController.php";
$data = new AnswersController;
$answers = $data->getAllAnswers();

/* ==================Collecting the needed data================== */
/*
We put the indexes of the selected Descriptions in an array ,
because they came as a string and with "," ,
so we use explode to separ between the values 
*/
$_SESSION["indexOfselectedDescriptions"] = [];

if ($_POST["indexOfselectedDescriptions"] != null) {
    foreach (explode(",", $_POST["indexOfselectedDescriptions"]) as $ops) {
        array_push($_SESSION["indexOfselectedDescriptions"], $ops);
    }
}

/*
We put the index of the select answers in an array ,
because they came as a string and with "," ,
so we use explode to separ between the values 
*/
//https://stackoverflow.com/questions/44052754/how-to-explode-an-array-of-strings-and-store-results-in-another-array-php
$_SESSION["indexOfSelectedAnswers"] = [];

foreach (explode(",", $_POST["indexOfSelectedAnswers"]) as $row) {
    array_push($_SESSION["indexOfSelectedAnswers"], $row);
}

//stock the number of question in a session so we can use late in "show results"
$_SESSION["numberOfquestion"] = $_POST["numberOfquestion"];

//Give Access to results page
$_SESSION["AccessToResults"] = "YouHaveAccess";
/* ================== End of collecting ==================*/



/* ==================Filtrage================== */

//We put the id of each answer in a separate array
$ids = array();

for ($i = 0; $i < count($answers); $i++) {
    array_push($ids, $answers[$i][0]);
}

/* Check the index of each selected answer if it is in the "ids" array
if it is in the array , that mean it is false ,
if not , that means it is true
*/
$indexOfFalseAnswers = array();

for ($i = 0; $i < count($_SESSION["indexOfSelectedAnswers"]); $i++) {
    if (in_array($_SESSION["indexOfSelectedAnswers"][$i], $ids)) {
        array_push($indexOfFalseAnswers, $_SESSION["indexOfSelectedAnswers"][$i]);
    }
}

$_SESSION["falseAnswers"] = count($indexOfFalseAnswers);
$_SESSION["correctAnswers"] = count($_SESSION["indexOfSelectedAnswers"]) - $_SESSION["falseAnswers"];


/* Hint : the id of question == index of description */
/* We check each id of the answers if it is the "indexOfFalseAnswers" array,
if ie does , then we stock the id of question (Bc it is equal to the index of description)
in the array "$_SESSION["indexOfselectedDescriptions"]"
*/
for ($i = 0; $i < count($answers); $i++) {
    if (in_array($answers[$i][0], $indexOfFalseAnswers)) {
        array_push($_SESSION["indexOfselectedDescriptions"], $answers[$i][1]);
    };
}

/* ==================End Of Filtrage================== */

header("location:./Results.php");
