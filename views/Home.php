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
        <button onclick="test()" class="StartBtn">Start</button>
    </div>


</body>

<!-- =======links======= -->
<!-- Inconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

<!-- Cdn Of Jquery -->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<!-- Incule the timer script -->
<script src="./includes/js/timerHome.js"></script>
<!-- The End of links -->

</html>