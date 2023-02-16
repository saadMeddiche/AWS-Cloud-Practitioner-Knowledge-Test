<?php


include "./Banned/bannedChecker.php";

// unset($_SESSION["AccessToResults"]);
// unset($_SESSION["accessToTest"]);

?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./includes/css/main.css">
    <title>QuiZiZy</title>
</head>

<body class="bodyOfHome">
    <!-- ===========The Header=========== -->
    <?php include "./includes/header.php"; ?>
    <!-- ===The end Of the Header=== -->

    <div class="holderOfHomeTimer" id="holderOfHomeTimer">
        <div class="onlycss">
            <audio id="audio" src="./includes/img/timerSound.mp3"></audio>
            <p class="HomeTimer" id="timerHome">3</p>
        </div>
    </div>

    <div class="holderOfStartBtn" id="holderOfStartBtn">
        <a href="./Help.php"><button class="StartBtn">Start</button></a>
    </div>


</body>

<!-- =======links======= -->

<!-- Inconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

<!-- include the script that animate the stepper -->
<script src="./includes/js/step.js"></script>



<!-- The End of links -->


</html>