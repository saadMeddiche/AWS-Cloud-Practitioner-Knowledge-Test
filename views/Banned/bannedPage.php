<?php
/* In this page we creat a session that will help
to stop the user to enter the site if he got cheated */

session_start();
$_SESSION["Banned"] = "Banned";
?>

<div>
    <h1>You have no more access to the Test, You have been banned from this this seat do to cheating.
        If you think that is a mistake please contact this email</h1>
</div>