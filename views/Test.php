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

    <div class="TheTest">

        <div class="TheQuestion">
            <p id="TheQuestion">
            </p>

        </div>

        <div class="TheOpstions">
            <p class="TheOpstion" id="Option1">A)</p>
            <p class="TheOpstion" id="Option2">B)</p>
            <p class="TheOpstion" id="Option3">C)</p>
            <p class="TheOpstion" id="Option4">C)</p>
        </div>
    </div>

    <div class="downStuff">

        <div class="HolderOfTestTimer">
            <p class="TestTimer" id="timer">30s</p>
        </div>
        <div class="HolderOfNextBtn">
            <button class="NextBtn">Next Question</button>
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