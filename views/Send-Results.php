<?php
session_start();



$Description = array(
    "1" => array(

        "question" => "Why is AWS more economical than traditional data centers for applications with varying compute
        workloads?",

        "description" => "C  The ability to launch instances on demand when needed allows users to launch and terminate instances in
        response to a varying workload. This is a more economical practice than purchasing enough on-premises servers
        to handle the peak load."
    ),
    "2" => array(

        "question" => " Which AWS service would simplify the migration of a database to AWS?",

        "description" => " B  AWS DMS helps users migrate databases to AWS quickly and securely. The source database remains
        fully operational during the migration, minimizing downtime to applications that rely on the database. AWS DMS
        can migrate data to and from most widely used commercial and open-source databases.
        
        "
    ),
    "3" => array(

        "question" => "Which AWS offering enables users to find, buy, and immediately start using software solutions in their
        AWS environment?",

        "description" => " D  AWS Marketplace is a digital catalog with thousands of software listings from independent software
        vendors that makes it easy to find, test, buy, and deploy software that runs on AWS.
        "
    )
);
?>
<div class="Message">
    <div class="Salutation">
        Hi, <b><?php echo $_POST["nameOfUser"] ?></b>
    </div>

    <div class="BodyOfMessage">
        <div class="correctAndFalseQuestion">
            <br>You Have <b><?php echo $_SESSION["correctAnswers"] ?></b> correct questions from <b><?php echo $_SESSION["correctAnswers"] + $_SESSION["falseAnswers"] ?></b>
        </div>

        <div class="CorrectionOfFalseQuestion">
            <br><b>This is the correction of each question that you get it fault </b> <br>
            <?php
                for ($i = 0; $i < $_SESSION["falseAnswers"] + ($_SESSION["falseAnswers"] - 1); $i++) {
                    if ($_SESSION["indexOfselectedDescriptions"][$i] != ",") {
                        echo "<br> <br> <b>" . $Description[$_SESSION["indexOfselectedDescriptions"][$i]]["question"] ."</b>";

                        echo "<br>" . $Description[$_SESSION["indexOfselectedDescriptions"][$i]]["description"];
                    }
                };
            ?>

        </div>
    </div>


</div>

