


<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./includes/css/main.css">
    <title>Results</title>
</head>

<body class="bodyOfResults">

    <!-- ===========The Header=========== -->
    <?php include "./includes/header.php"; ?>
    <!-- ===The end Of the Header=== -->



    <div class="DescriptionOfTheReasonTofillTheInformation" id="DescriptionOfTheReasonTofillTheInformation">
        In Order to see your results , Pleaze Enter your Name and Your Email. Then check Your Email For the Results !
    </div>

    <div class="InformationOfUser" id="InformationOfUser">
        <form action="./Send-Results.php" method="post">

            <div>
                <input type="text" name="nameOfUser" placeholder="Name...">

            </div>

            <div>
                <input type="email" name="emailOfUser" placeholder="Email...">
            </div>

            <div>
                <button type="submit" class="SendResultsButton" name="SendResultsButton">Send</button>
            </div>

        </form>
    </div>





</body>

<!-- =======links======= -->
<!-- Inconify -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

<!-- Cdn Of Jquery -->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>


<!-- include the script that animate the stepper -->
<script src="./includes/js/step.js"></script>

<!-- The End of links -->

</html>

<?php
session_start();

// If the user didnt finish all the question ! then he can see his results
if (!isset($_SESSION["AccessToResults"])) {
    echo "
        <script>
        document.getElementById('InformationOfUser').style.visibility = 'hidden';
        document.getElementById('DescriptionOfTheReasonTofillTheInformation').innerHTML='You should pass the test First , Then You can see your results';
        </script>";
}




//the changes that will after the send of the mailtext
if (isset($_SESSION["GoBack"])) {

    echo "
    <script>
    document.getElementById('InformationOfUser').style.visibility = 'hidden';
    document.getElementById('DescriptionOfTheReasonTofillTheInformation').innerHTML='The Results Has been Send To your Email , Pleaze check your Inbox :D';
    </script>";


    unset($_SESSION["GoBack"]);
}

?>