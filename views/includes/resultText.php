<?php

include "../database/Db.php";
include "../models/Description.php";
include "../controllers/DescriptionController.php";
$data = new DescriptionController;
$Descriptions = $data->getAllDescriptions();


?>

<div class="Message" id="Message" hidden>

    <div class="BodyOfMessage">
        <div class="correctAndFalseQuestion">
            <br>You Have <b><?php echo $_SESSION["correctAnswers"] ?></b> correct questions from <b><?php echo $_SESSION["numberOfquestion"] ?></b>
        </div>

        <div class="CorrectionOfFalseQuestion">
            <?php
            for ($i = 0; $i < count($_SESSION["indexOfselectedDescriptions"]); $i++) {
                $test = $_SESSION["indexOfselectedDescriptions"][$i] - 1;
                echo "<br> <br> <br> <b class='correctAndFalseQuestion'>" . $Descriptions[$test]->question . "</b>";

                echo "<br> <br>" . $Descriptions[$test]->description;
            };
            ?>

        </div>
    </div>

    <div class="HolderOfGoBackButton">
        <div>
            <button class="GoBack" onclick="GoBack()">
                Back
            </button>
        </div>
    </div>

</div>