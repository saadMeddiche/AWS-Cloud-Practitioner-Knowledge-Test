<?php
session_start();

$_SESSION["correctAnswers"] = $_POST["correctAnswers"];
$_SESSION["falseAnswers"] = $_POST["falseAnswers"];
$_SESSION["indexOfselectedDescriptions"] = $_POST["indexOfselectedDescriptions"];

if ($_POST["AccessToResults"] == "YouHaveAccess") {
    $_SESSION["AccessToResults"] = "YouHaveAccess";
}


header("location:./Results.php");
