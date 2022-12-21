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
            <p>1) Why is AWS more economical than traditional data
                centers for applications with varying compute
                workloads?
            </p>

        </div>

        <div class="TheOpstions">
            <p class="TheOpstion">A) Amazon EC2 costs are billed on a monthly basis.</p>
            <p class="TheOpstion">B) Users retain full administrative access to their Amazon EC2 instances.</p>
            <p class="TheOpstion">C) Amazon EC2 instances can be launched on demand when needed.</p>
            <p class="TheOpstion">D) Users can permanently run enough instances to handle peak workloads.</p>
        </div>
    </div>

    <div class="downStuff">

        <div class="HolderOfTimer">
            <p class="Timer" id="timer"></p>
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
    <script src="./includes/js/timer.js"></script>

<!-- The End of links -->


</html>