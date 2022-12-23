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

    <div class="ProgressBar" id="ProgressBar">
        
    </div>

    <div class="TheTest">

        <div class="TheQuestion">
            <input id="indexOfPart" type="hidden" value="">
            <p id="TheQuestion">
            </p>

        </div>

        <div class="TheOpstions">
            <p class="TheOpstion" onclick="answer('Option1')">A) <span id="Option1"></span></p>
            <p class="TheOpstion" onclick="answer('Option2')">B) <span id="Option2"></span></p>
            <p class="TheOpstion" onclick="answer('Option3')">C) <span id="Option3"></span></p>
            <p class="TheOpstion" onclick="answer('Option4')">D) <span id="Option4"></span></p>
            <!-- This span will help us to detect if no option has been choosen -->
            <span id="nothing"> </span>
        </div>

        <!-- Reason to make this div ?  to send a value from js to php so i can use for the email-->
        <div hidden>
            <form action="./Stock-Results.php" method="post">
                <input type="text" id="AccessToResults" name="AccessToResults">
                <input type="text" id="indexOfselectedDescriptions" name="indexOfselectedDescriptions">
                <input type="text" id="correctAnswers" name="correctAnswers" value="">
                <input type="text" id="falseAnswers" name="falseAnswers" value="">
                <button type="submit" id="insertAnswers">start</button>
            </form>
        </div>

    </div>

    <div class="downStuff">

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
<script src="./includes/js/Test.js"></script>
<!-- The End of links -->


</html>