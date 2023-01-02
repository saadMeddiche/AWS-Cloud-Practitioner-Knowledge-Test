<?php
include "../models/Questions.php";
include "../controllers/QuestionsController.php";
$data = new QuestionsController();
$question = $data->getAllQuestions();

$text;
$countOfQuestion = 0;
$indexOfOption = 0;

// index of question = index of description
?>
<script>
    //This is the array were we stock our questions 

    /* I separeted The Parts array into other parts,
    each part contain the question , the options , 
    the correct answer and the index of the description
    that will help us a lot to show the descriptions [reesults] */
    var Parts = [
        <?php
        for ($i = 0; $i < 5; $i++) {
            $text = '
                part' . $question[$countOfQuestion][0] . ' = {
                    question:" ' . $question[$countOfQuestion][1] . '",';

            for ($k = 0; $k < 4; $k++) {
                $copyOFK = $k + 1;

                $text .= '
                        option' . $copyOFK . ': `' . $question[$k][4] . '`,

                        indexOfOption' . $copyOFK . ': `' . $question[$indexOfOption][3] . '`,

                        ';
                $indexOfOption++;
            }

            $text .= '
                    indexOfDescription: ' . $question[$countOfQuestion][0] . ',
                    
                    
                }
                ,
                   ';


            echo $text;
            $countOfQuestion += 4;
        }
        ?>
    ]

    var checkIndex = "replace";
    /* This is the array where we stock the 
    index of the description of the selected option */
    var selectedDescriptions = [];

    /* This is the array where we stock the 
    index of the index of the selected option */
    var selectedAnswers = [];

    /* This varibale help us to check if any answer
    has been choosed, if none has been choosed ,
    then it will consider as a fault answer */
    var check = "NoneYet";

    //The counter of the end of one question
    var timer = "66666666666";

    //with this variables we know if the user has choosen a correct or false answer
    var correctAnswer = 0;
    var falseAnswer = 0;

    //In this variables we stock total of correct and false answers
    var correctAnswers = 0;
    var falseAnswers = 0;

    //With this variable we can stop the timer bc: i am using the "setinterval function"
    var out;

    /* stock the lenght of the array before any changes happen ,
     so I can use it in progress bar [how many circles will appear ] */
    var FirstLenght = Parts.length;

    //In this variable we will stock index of the current part:
    //Why we stock ?
    // + To know the right index of descrption
    // + To know wich part we will delete
    // + To know if the choosen answer is correct
    var indexOfPart = "First";

    /* The first functions that will be excuted */
    progress();
    progressFillCircles();

    NextQuestion();

    timerOfTheEndOfTheQuestion(timer);

    console.log(window);

    /*========== The count down function ==========*/
    /* Print the variable "timer" then "timer--" , then print again.
    Repeat This process until "timer == 0",
    then go to the next question and restart the count down */
    function timerOfTheEndOfTheQuestion(seconds) {

        out = setInterval(function() {

            if (seconds == 0) {

                //Display "..." instead of the time
                document.getElementById("timer").innerHTML = "...";

                //If no option has been choosed then consider it as a fault answer
                if (check == "NoneYet") {
                    // "0" mean nothing has been choosed
                    answer(0);
                }

                Next();


            } else {
                //Display the time
                document.getElementById("timer").innerHTML = seconds + "s ";
                seconds--;
            }



        }, 1000)
    }

    /*========== The Next Question function ==========*/
    /* This function does a lot jobs at the same time */
    function NextQuestion() {

        checkIndex = "no-replace";

        //Why "0" , that mean  change the color of all option to white
        changeStyleOfOption(0);

        //Disable the "next question" button
        document.getElementById("NextBtn").disabled = true;

        //Each time we display a new question , we also need to set "check" to it's default
        check = "NoneYet";


        /* ====== Description ====== */

        //If the choosen answer is false , then stock index of the description into the array "selectedDescriptions"
        if (falseAnswer == 1) {

            selectedDescriptions.push(Parts[indexOfPart].indexOfDescription);

            /* Put the value of the array "selectedDescriptions" into a hidden input ,
            so we can stock it in a php session */
            document.getElementById("indexOfselectedDescriptions").value = selectedDescriptions;

        }
        /* ====== End ====== */

        /* ====== Stock the state of Answers ====== */

        //stock the of the correct and false answers
        correctAnswers += correctAnswer;
        falseAnswers += falseAnswer;

        //Stock the answers into hidden inputs so we can later use post method 
        document.getElementById("correctAnswers").value = correctAnswers;
        document.getElementById("falseAnswers").value = falseAnswers;
        /* ====== End ====== */

        /* ====== Delete ====== */
        /* Each time we need to delete the "used part",
        so it can't be repeated another time */

        // Because the indexOfPart is empty in the first time , we dont need to delete anything
        if (indexOfPart !== "First") {
            Parts.splice(indexOfPart, 1);
        }
        /* ====== End ====== */

        /* ====== End Of Question ====== */

        //So when the user unswer all the question , what will happen ?
        if (Parts.length == 0) {

            document.getElementById("indexOfSelectedAnswers").value = selectedAnswers;
            //click a hidden button . By this button , we stock the answers
            document.getElementById("insertAnswers").click();
        }
        /* ====== End ====== */



        /* ====== Genarate a random question ====== */

        //How to set a random index
        //Math floor for no x,xxx
        //https://www.w3schools.com/jsref/jsref_random.asp

        /*Why Parts.length? Bc:We don't want to repeat the same question 
        Or Bc: an error will apear in line "X$292HY%%sq02" becasue that value 
        is already delete so HE will not know it */
        let randomNumber = Math.floor((Math.random() * Parts.length));
        let randomPart = Parts[randomNumber];

        indexOfPart = randomNumber;

        document.getElementById("TheQuestion").innerHTML = randomPart.question; /* X$292HY%%sq02 */

        <?php

        for ($t = 1; $t <= 4; $t++) {
            echo '
            document.getElementById("Option' . $t . '").innerHTML = randomPart.option' . $t . ';
            document.getElementById("indexOfOption' . $t . '").innerHTML = randomPart.indexOfOption' . $t . ';

            ';
        }

        ?>

                

        /* ====== End ====== */


    }

    /*========== False||Correct answer ==========*/
    //By the "id" we can know the choosen option
    function answer(id) {

        // "0" mean nothing has been choosed
        //If "id" == 0 then no option has been choosed , so it will consider as a falt answer
        if (id != 0) {
            //active the button , bc the user has choosed an answer
            document.getElementById("NextBtn").disabled = false;

            //We change the value of "check" so we know that an option has been choosed
            check = "Yes";

            //The choosen answer
            let chosenAnwer = document.getElementById("Option" + id).innerHTML;

            let indexOfChosenAnswer = document.getElementById("indexOfOption" + id).innerHTML;

            if (!selectedAnswers.includes(indexOfChosenAnswer)) {

                if (checkIndex === "replace") {

                    selectedAnswers.pop();
                    selectedAnswers.push(indexOfChosenAnswer);
                    console.log(selectedAnswers);

                } else {
                    selectedAnswers.push(indexOfChosenAnswer);
                    console.log(selectedAnswers);

                    checkIndex = "replace";
                }

            }


            //The Correct answer
            let correctOne = Parts[indexOfPart].correct;

            /* Check if the choosed answer is correct or not ,
            by comaparing the choosen and the correct answer*/
            if (chosenAnwer == correctOne) {
                correctAnswer = 1;
                falseAnswer = 0;

            } else {
                falseAnswer = 1;
                correctAnswer = 0;
            }
        } else {
            falseAnswer = 1;
            correctAnswer = 0;
        }


    }

    /*========== When "next question" button is clicked ==========*/
    function Next() {

        //stop the previous count , so we can later start a new count for a new question
        //How to breake out of setinterval function
        //https://stackoverflow.com/questions/1795100/how-to-exit-from-setinterval
        clearInterval(out);

        //Set a new count
        timerOfTheEndOfTheQuestion(timer);

        //Because the count start 1s late , we will fill it temperay with "..."
        document.getElementById("timer").innerHTML = "...";

        //Genarate new question
        NextQuestion();

        //Fill the next circle
        progressFillCircles();
    }

    /*========== Progress Bar ==========*/
    //add the circle of the progress bar related to the number of the questions
    function progress() {

        for (let i = 0; i < FirstLenght; i++) {
            document.getElementById("ProgressBar").innerHTML += `
            <div class="holderOfOneCircle" id="holderOfOneCircle">
                <div class="onlycssCirlce" id="circle${i}">
                </div>
            </div>
            `;
        }
    }

    //This function fill the circle of the progress bar 
    function progressFillCircles() {
        for (let i = 0; i < FirstLenght - (Parts.length - 1); i++) {
            document.getElementById("circle" + i).style.display = "none";
        }
    }
    /*====================*/

    /*========== Selected option ==========*/
    //This function change the style of the selected option
    /* First set the color of all option to white then set the color of the selected option to balck */

    function changeStyleOfOption(option) {


        for (var i = 1; i < 5; i++) {
            document.getElementById("Option" + i).style.color = "White";

            document.getElementById("Test" + i).style.color = "White";

        }
        /* Why ? after each question we need to reset the color of all options ,
          so it od not show up as it is always chooed */
        if (option != 0) {
            document.getElementById("Option" + option).style.color = "Black";
            document.getElementById("Test" + option).style.color = "Black";
        }
    }
    /*====================*/
</script>