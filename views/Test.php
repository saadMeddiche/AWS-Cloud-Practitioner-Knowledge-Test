<?php
include "./Banned/bannedChecker.php"
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

<body class="bodyOfTest">
    <!-- ===========The Header=========== -->
    <?php include "./includes/header.php"; ?>
    <!-- ===The end Of the Header=== -->

    <div class="messageTest" id="messageTest">
        <p id="messageTest">Pleaze check <a href="./Help.php"><b> >>Help<< </b></a> Before Your starting the test</p>
    </div>

    <div class="ProgressBar" id="ProgressBar">

    </div>

    <div class="TheTest" id="TheTest">

        <div class="TheQuestion">
            <p id="TheQuestion">
            </p>
        </div>

        <div class="TheOpstions">

            <p class="TheOpstion" onclick="answer('1'),changeStyleOfOption('1')" id="Test1">A) <span id="Option1"></span><span id="indexOfOption1" hidden></span></p>
            <p class="TheOpstion" onclick="answer('2'),changeStyleOfOption('2')" id="Test2">B) <span id="Option2"></span><span id="indexOfOption2" hidden></span></p>
            <p class="TheOpstion" onclick="answer('3'),changeStyleOfOption('3')" id="Test3">C) <span id="Option3"></span><span id="indexOfOption3" hidden></span></p>
            <p class="TheOpstion" onclick="answer('4'),changeStyleOfOption('4')" id="Test4">D) <span id="Option4"></span><span id="indexOfOption4" hidden></span></p>
        </div>

        <!-- Reason to make this div ?  to send a value from js to php so i can use for the email-->
        <div hidden>
            <form action="./Stock-Results.php" method="post">
                <input type="text" id="indexOfSelectedAnswers" name="indexOfSelectedAnswers">
                <input type="text" id="indexOfselectedDescriptions" name="indexOfselectedDescriptions">
                <input type="text" id="numberOfquestion" name="numberOfquestion">
                <button type="submit" id="insertAnswers">start</button>
            </form>
        </div>

    </div>

    <div class="downStuff" id="downStuff">

        <div class="HolderOfTestTimer">
            <p class="TestTimer" id="timer">...</p>
        </div>
        <div class="HolderOfNextBtn">
            <button class="NextBtn" id="NextBtn" onclick="Next()" disabled>Next Question</button>
        </div>
    </div>


</body>

<!-- =======links======= -->

<!-- Inconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

<!-- Incule the timer script -->
<?php include "./includes/js/Test.php"; ?>
<!-- The End of links -->

<!-- Include the dogwatcher -->

<!-- include the script that animate the stepper -->
<script src="./includes/js/step.js"></script>


</html>

<?php

//If the user didn't visit the help page yet
//Hide every thing and show a message
if (!isset($_SESSION["accessToTest"])) {
    echo "
    <script>
        document.getElementById('TheTest').style.display = 'none';
        document.getElementById('ProgressBar').style.display = 'none';
        document.getElementById('downStuff').style.display = 'none';
    </script>
    ";
} else {
    echo "
    <script>
        document.getElementById('messageTest').style.display = 'none';
    </script>

";
}


?>