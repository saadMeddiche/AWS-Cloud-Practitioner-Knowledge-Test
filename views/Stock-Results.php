<?php
/* Stock the results of the test + give access to results page*/
session_start();

$_SESSION["correctAnswers"] = $_POST["correctAnswers"];
$_SESSION["falseAnswers"] = $_POST["falseAnswers"];

$_SESSION["indexOfselectedDescriptions"] = $_POST["indexOfselectedDescriptions"];

$_SESSION["AccessToResults"] = "YouHaveAccess";

header("location:./Results.php");
