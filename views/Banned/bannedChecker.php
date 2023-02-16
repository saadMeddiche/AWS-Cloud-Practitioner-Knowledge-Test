<?php 

session_start();

/* check if the user is banned , if he is , then send him to banned page*/
if(isset($_SESSION["Banned"])){
    header("location:./Banned/bannedPage.php");
}

?>

