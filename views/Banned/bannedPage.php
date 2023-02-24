<?php
/* In this page we creat a session that will help
to stop the user to enter the site if he got cheated */

session_start();
$_SESSION["Banned"] = "Banned";
// unset($_SESSION["Banned"]);
?>




<!DOCTYPE html>
<html lang="en" style="height:100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes/css/main.css">
    <title>Document</title>
</head>

<body class="bodyOfResults">

    <div>
        <h1 style="color:var(--Yellow);">You have no more access to the Test, You have been banned do to cheating.
            If you think that is a mistake please Contact Me</h1>
    </div>


</body>

<!-- =======links======= -->
<!-- Inconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

<!-- include the script that animate the stepper -->
<script src="../includes/js/step.js"></script>

<!-- include the script that animate the stepper -->
<script src="../includes/js/sender.js"></script>

<!-- The End of links -->

</html>

<?php

//If the user didn't pass the test yet
/* Hide the "choice Book" and diplay a message*/
if (!isset($_SESSION["AccessToResults"])) {
    echo "
    <script>
        document.getElementById('choices').style.display = 'none';
        document.getElementById('HolderOfRestartButton').style.display = 'none';
        document.getElementById('messageOfResults').style.display = 'block';
    </script>";
}

if (isset($_SESSION["sendSuccessfully"])) {
    echo "
    <script>
        document.getElementById('messageOfResults').innerHTML = 'Oops !Because I didn\'t use  a Mail-service, It seems that My email that I use to send results has been blocked';
        document.getElementById('messageOfResults').style.display = 'block';
    </script>";

    unset($_SESSION["sendSuccessfully"]);
}

?>