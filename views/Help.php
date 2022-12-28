<?php
session_start();
$_SESSION["accessToTest"] = "yay";
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./includes/css/main.css">

    <title>Help</title>
</head>

<body class="bodyOfHelp">

    <!-- ===========The Header=========== -->
    <?php include "./includes/header.php"; ?>
    <!-- ===The end Of the Header=== -->

    <div class="holderOfHomeTimer" id="holderOfHomeTimer">
        <div class="onlycss">
            <audio id="audio" src="./includes/img/timerSound.mp3"></audio>
            <p class="HomeTimer" id="timerHome">3</p>
        </div>
    </div>

    <div class="HolderOfHelpDescription" id="HolderOfHelpDescription">

        <div class="Description">
            <h2>This instruction will give you a hint how the test goes</h2>
        </div>

        <div class="instruction">
            <p><b>[</b> If You didn't answer the question in 30s , it will consider as a fault answer <b>]</b></p>
            <br>
            <p><b>[</b> You Can't skip the question , until you choose one or the time end.<b>]</b></p>
            <br>
            <p><b>[</b> You will see your results only if you finished all the questions.<b>]</b></p>
            <br>
            <p><b>[</b> You will notice some circles in the top when you are passing the test. <br>Those Circles indicate how much question left.<b>]</b></p>
            <br>
            <p><b>[ Warning :</b>The Restart Button will delete your results . <br> If you want to keep it ! Then send it to your email<b>]</b></p>


        </div>

        <div class="holderOfStartTest" id="holderOfStartBtn">
            <button class="StartTest" onclick="ReadyGo()"> Start The Test </button>
        </div>

    </div>


</body>

<!-- =======links======= -->
<!-- Inconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

<!-- Incule the timer script -->
<script src="./includes/js/StartTheTest.js.js"></script>

<!-- include the script that animate the stepper -->
<script src="./includes/js/step.js"></script>

<!-- The End of links -->


</html>