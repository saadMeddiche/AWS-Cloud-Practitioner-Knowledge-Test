<?php
/* Send The results of the test to the email */
session_start();

$_SESSION["sendSuccessfully"] = "success";

include "../database/Db.php";
include "../models/Description.php";
include "../controllers/DescriptionController.php";
$data = new DescriptionController;
$Descriptions = $data->getAllDescriptions();


//https://stackoverflow.com/questions/34056632/using-php-loops-inside-mailtext-mail

$mailtext = '<div class="Message">
<div class="Salutation">
    Hi, <b>' . $_POST["nameOfUser"] . '</b>
</div>

<div class="BodyOfMessage">
    <div class="correctAndFalseQuestion">
        <br>You Have <b> ' . $_SESSION["correctAnswers"] . ' </b> correct questions from <b> ' . $_SESSION["numberOfquestion"] . '</b>
    </div>

    <div class="CorrectionOfFalseQuestion">
        <br><b>This is the correction of each question that you get it fault </b> <br>
        ';
for ($i = 0; $i < count($_SESSION["indexOfselectedDescriptions"]); $i++) {
    $test = $_SESSION["indexOfselectedDescriptions"][$i] - 1;
    $mailtext .= '<br> <br> <b>' . $Descriptions[$test]->question . '</b>
                <br>' . $Descriptions[$test]->description . '';
};

$mailtext .= '

    </div>
</div>
</div>';
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';



if (isset($_POST["SendResultsButton"])) {


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username  = "DummyEmail12121213@gmail.com";
    $mail->Password = "ejgaodwcmqyjedpz";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom("DummyEmail12121213@gmail.com");
    $mail->addAddress($_POST["emailOfUser"]);

    $mail->isHTML(true);

    $mail->Subject = "test";

    $mail->Body = $mailtext;

    $mail->send
    
}

header("location:./Results.php");
?>