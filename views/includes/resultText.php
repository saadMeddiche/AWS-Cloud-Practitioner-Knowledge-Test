<?php
session_start();

/* this file is included in Results.php */
/* This array contain the description of each question*/
$Description = array(
    "1" => array(

        "question" => "Why is AWS more economical than traditional data centers for applications with varying compute
        workloads?",

        "description" => "<b>The correct answer is </b> C) Amazon EC2 instances can be launched on demand when needed  <br><b>Because:</b>  The ability to launch instances on demand when needed allows users to launch and terminate instances in
        response to a varying workload. This is a more economical practice than purchasing enough on-premises servers
        to handle the peak load."
    ),
    "2" => array(

        "question" => " Which AWS service would simplify the migration of a database to AWS?",

        "description" => "<b>The correct answer is </b>B) AWS Database Migration Service (AWS DMS)
        <b><br>Because:</b>  AWS DMS helps users migrate databases to AWS quickly and securely. The source database remains
        fully operational during the migration, minimizing downtime to applications that rely on the database. AWS DMS
        can migrate data to and from most widely used commercial and open-source databases.
        
        "
    ),
    "3" => array(

        "question" => "Which AWS offering enables users to find, buy, and immediately start using software solutions in their
        AWS environment?",

        "description" => "<b>The correct answer is </b>D) AWS Marketplace <br><b>Because :</b> AWS Marketplace is a digital catalog with thousands of software listings from independent software
        vendors that makes it easy to find, test, buy, and deploy software that runs on AWS.
        "
    ),
    "4" => array(

        "question" => " Which AWS networking service enables a company to create a virtual network within AWS?",

        "description" => "<b>The correct answer is</b> D) Amazon Virtual Private Cloud (Amazon VPC) <br><b>Because :</b>  Amazon VPC lets users provision a logically isolated section of the AWS Cloud where users can launch
        AWS resources in a virtual network that they define.
        "
    ),
    "5" => array(

        "question" => " Which of the following is an AWS responsibility under the AWS shared responsibility model?",

        "description" => "<b>The correct answer is</b> B) Maintaining physical hardware <br><b>Because :</b> Maintaining physical hardware is an AWS responsibility under the AWS shared responsibility model.
        "
    )
);

?>

<div class="Message" id="Message" hidden>

    <div class="BodyOfMessage">
        <div class="correctAndFalseQuestion">
            <br>You Have <b><?php echo $_SESSION["correctAnswers"] ?></b> correct questions from <b><?php echo $_SESSION["correctAnswers"] + $_SESSION["falseAnswers"] ?></b>
        </div>

        <div class="CorrectionOfFalseQuestion">
            <?php
            for ($i = 0; $i < count($_SESSION["indexOfselectedDescriptions"]); $i++) {
                echo "<br> <br> <br> <b class='correctAndFalseQuestion'>" . $Description[$_SESSION["indexOfselectedDescriptions"][$i]]["question"] . "</b>";

                echo "<br> <br>" . $Description[$_SESSION["indexOfselectedDescriptions"][$i]]["description"];
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