<?php
include "../models/Questions.php";
include "../controllers/QuestionsController.php";

$data = new QuestionsController();
$question = $data->getAllQuestions();

//This varibale we will use it to stock the parts
$text;

//To know wich option we will print
$countOfOption = 0;

//The current row
$row = 0;


$lastone = 0;

$loop = 0;

//This variable stop a the big loop from working when it is $fin !=0
$fin = 0;

/* each option has a different index from other .
with this index we can know the selecetd answer and
we can detect if its false or not
*/
$indexOfOption = 0;

// index of question = index of description
?>
<script>
    //This is the array were we stock our questions 

    /* I separeted The Parts array into other parts,
    each part contain the question , the options , 
    the index of the answer and the index of the description
    that will help us a lot to show the descriptions [results] */
    var Parts = [
        <?php

        //This "While loops" == "number of questions"
        while ($fin == 0) {

            /* Because in our requeste , the same question came 4 time,
            So this loop is the solution to do not repeat the same question */
            for ($f = 0; $f < count($question); $f++) {

                //This condition detect if we are in the last question
                /* If the future row is equal to the length of the array ,
                that mean we are in the last question.
                So we need to stop the while loop and print the current question */
                if ($row + 1 == count($question)) {
                    $lastone = count($question) / 2;
                    $fin = 1;
                }

                /* Each time we need to check if the "current row" is different to "future row" 
                If it is ! that mean we are in the border, so we need to print the question in the "current row.
                then we need to break from the loop"
                */
                if ($question[$row][0] != $question[$row + 1 - $lastone][0]) {
                    $text = '
                    part' . $question[$row][0] . ' = {
                        question:" ' . $question[$row][1] . '",';
                    $row++;

                    break;
                }
                $row++;
            }

            //This loop print the option and its index
            for ($k = 1; $k <= 4; $k++) {

                $text .= '
                        option' . $k . ': `' . $question[$countOfOption][4] . '`,

                        indexOfOption' . $k . ': `' . $question[$indexOfOption][3] . '`,

                        ';
                $indexOfOption++;
                $countOfOption++;
            }


            //$row-1 because it is the current row
            $text .= '

                indexOfDescription:`' . $question[$row-1][0] . '`
                    
                }
                ,
                   ';


            echo $text;
        }
        ?>
    ]

    /* this varibale help us to do not
     stock the same index of answers */
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
    var timer = "30";

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

            /* Put the values of the array "selectedAnswers" into a hidden input ,
            so we can stock it in a php session */
            document.getElementById("indexOfSelectedAnswers").value = selectedAnswers;

            /* Put the values of the array "selectedDescriptions" into a hidden input ,
            so we can stock it in a php session */
            document.getElementById("indexOfselectedDescriptions").value = selectedDescriptions;

            //We also send number of question so we can use it in results
            document.getElementById("numberOfquestion").value = FirstLenght;

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

            let indexOfChosenAnswer = document.getElementById("indexOfOption" + id).innerHTML;

            //first check the index is already stocked in the array or not
            if (!selectedAnswers.includes(indexOfChosenAnswer)) {

                /*
                By using the variable "checkIndex"
                we detect if he choosed the answer from the same question
                so we can overwrite the previous index
                */
                if (checkIndex === "replace") {

                    //delete the last index then ...
                    selectedAnswers.pop();

                    // ... replace it with the new index
                    selectedAnswers.push(indexOfChosenAnswer);

                } else {

                    selectedAnswers.push(indexOfChosenAnswer);

                    checkIndex = "replace";
                }

            }



        } else {
            //If no answer has been choosed , then we will stock the index of description
            selectedDescriptions.push(Parts[indexOfPart].indexOfDescription);
            console.log(selectedDescriptions);


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