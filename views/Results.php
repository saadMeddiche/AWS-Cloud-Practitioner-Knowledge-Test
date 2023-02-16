<?php 
include "./Banned/bannedChecker.php"
?>
<!DOCTYPE html>
<html lang="en" style="height:100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./includes/css/main.css">
    <title>Document</title>
</head>

<body class="bodyOfResults">
    <!-- ===========The Header=========== -->
    <?php include "./includes/header.php"; ?>
    <!-- ===The end Of the Header=== -->

    <div class="messageOfResults" id="messageOfResults" hidden>
        <p>You should pass the test First , Then You can see your results</p>
    </div>

    <div class="choices" id="choices">
        <div class="FirstChoice" id="FirstChoice">
            <p><a onclick="FirstChoice()">Click Me</a> if you want to see your results here</p>


        </div>


        <div class="TheBorder" id="TheBorder">
            <button class="test"></button>
        </div>

        <div class="SecondChoice" id="SecondChoice">
            <p><a onclick="SecondChoice()">Click Me</a> if You want to send your results to your email</p>
        </div>
    </div>

    <div class="HolderOfRestartButton" id="HolderOfRestartButton">
        <a href="./includes/restart.php"><button class="RestartButton">Restart</button></a>
    </div>

    </div>

    <div class="InformationOfUser" id="InformationOfUser" hidden>
        <form action="./Send-Results.php" method="post">

            <div>
                <input type="text" name="nameOfUser" placeholder="Name..." required>

            </div>

            <div>
                <input type="email" name="emailOfUser" placeholder="Email..." required>
            </div>

            <div>
                <button type="submit" class="SendResultsButton" name="SendResultsButton">Send</button>
            </div>
            <div class="HolderOfGoBackButton">
                <div>
                    <button class="GoBack" onclick="GoBack()" style="width:20%;">
                        Back
                    </button>
                </div>
            </div>

        </form>
    </div>

    <?php include './includes/resultText.php'; ?>

</body>

<!-- =======links======= -->
<!-- Inconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

<!-- include the script that animate the stepper -->
<script src="./includes/js/step.js"></script>

<!-- include the script that animate the stepper -->
<script src="./includes/js/sender.js"></script>

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
        document.getElementById('messageOfResults').innerHTML = 'The results has been send successfuly to your email :D';
        document.getElementById('messageOfResults').style.display = 'block';
    </script>";

    unset($_SESSION["sendSuccessfully"]);
}

?>