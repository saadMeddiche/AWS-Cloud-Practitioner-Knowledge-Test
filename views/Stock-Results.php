<?php
    session_start();

    $_SESSION["correctAnswers"] = $_POST["correctAnswers"];
    $_SESSION["falseAnswers"] = $_POST["falseAnswers"];
    $_SESSION["indexOfselectedDescriptions"]=$_POST["indexOfselectedDescriptions"];


    header("location:./Results.php");
?>