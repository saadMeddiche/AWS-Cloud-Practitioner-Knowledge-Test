    var Parts = [

        part1 = {
            question: `1) Why is AWS more economical than 
        traditional data centers for applications with
        varying compute workloads?`,

            option1: `Amazon EC2 costs are billed on a monthly basis.`,

            option2: `Users retain full administrative access to their Amazon EC2 instances.`,

            option3: `Amazon EC2 instances can be launched on demand when needed.`,

            option4: `Users can permanently run enough instances to handle peak workloads.`,

            correct: `Amazon EC2 instances can be launched on demand when needed.`,

            indexOfDescription: 1
        }

        ,

        part2 = {
            question: `2) Which AWS service would simplify
        the migration of a database to AWS?`,

            option1: `AWS Storage Gateway.`,

            option2: `AWS Database Migration Service (AWS DMS).`,

            option3: `Amazon EC2`,

            option4: `Amazon AppStream 2.0.`,

            correct: `AWS Database Migration Service (AWS DMS).`,

            indexOfDescription: 2

        }

        ,

        part3 = {
            question: `3) Which AWS offering enables users to find, 
        buy, and immediately start using software solutions 
        in their AWS environment?`,

            option1: `AWS Config.`,

            option2: `AWS OpsWorks.`,

            option3: `AWS SDK.`,

            option4: `AWS Marketplace.`,

            correct: `AWS Marketplace.`,

            indexOfDescription: 3

        }



    ]

    var selectedDescriptions = [];

    //This varibale help us to check if any answer has been choosed
    var check = "NoneYet";

    //The counter of the end of one question
    var timer = "30";

    var correctAnswer = 0;
    var falseAnswer = 0;

    var correctAnswers = 0;
    var falseAnswers = 0;

    //So we can stop the setinterval function
    var out;

    var FirstLenght = Parts.length;




    progress();

    NextQuestion();

    timerOfTheEndOfTheQuestion(timer);






    function timerOfTheEndOfTheQuestion(seconds) {

        out = setInterval(function() {

            if (seconds === 0) {

                document.getElementById("timer").innerHTML = "Done";

                // if no option has been choosed then choose the "nothing option"
                if (check == "NoneYet") {
                    answer("nothing");
                }

                NextQuestion();
                progressFillCircles();

                //How to breake out of setinterval function
                //https://stackoverflow.com/questions/1795100/how-to-exit-from-setinterval
                seconds = timer;
            } else {
                document.getElementById("timer").innerHTML = seconds + "s ";
            }
            seconds--;



        }, 1000)
    }


    function NextQuestion() {

        let indexOfPart = document.getElementById("indexOfPart").value;

        //Send the index of the corrected choosen question
        if (falseAnswer == 1) {

            selectedDescriptions.push(Parts[indexOfPart].indexOfDescription);

            document.getElementById("indexOfselectedDescriptions").value = selectedDescriptions;
            console.log(document.getElementById("indexOfselectedDescriptions").value);

        }


        correctAnswers += correctAnswer;
        falseAnswers += falseAnswer;

        console.log(correctAnswers);
        console.log(falseAnswers);

        //Stock the answers into hidden inputs so we can later use post method 
        document.getElementById("correctAnswers").value = correctAnswers;
        document.getElementById("falseAnswers").value = falseAnswers;

        console.log(document.getElementById("correctAnswers").value);
        console.log(document.getElementById("falseAnswers").value);




        // if no option has been choosed then disable the n ext button
        if (check == "NoneYet") {
            document.getElementById("NextBtn").disabled = "true";
        }

        check = "NoneYet";


        // Because the indexOfPart is empty in the first time , we dont need to delete anything
        if (indexOfPart !== "") {
            Parts.splice(indexOfPart, 1);
        }




        //So when the user unswer all the question , what will happen ?
        if (Parts.length == 0) {
            // window.location.href = "./Results.php";
            document.getElementById("AccessToResults").value="YouHaveAccess";
            document.getElementById("insertAnswers").click();
        }

        //How to Get an Object's Value by Index using JavaScript
        //https://bobbyhadz.com/blog/javascript-get-value-of-object-by-index#:~:text=To%20get%20a%20value%20of,values(obj)%5B1%5D%20.&text=Copied!

        //How to set a random index
        //Math floor for now x,xxx
        //https://www.w3schools.com/jsref/jsref_random.asp
        // console.log(Object.values(Parts)[Math.floor((Math.random() * 3))].question);

        //How to Get the length of an object
        //https://www.tutorialrepublic.com/faq/how-to-get-the-length-of-a-javascript-object.php#:~:text=You%20can%20simply%20use%20the,of%20elements%20in%20that%20array.
        let randomNumber = Math.floor((Math.random() * Parts.length));
        let randomPart = Parts[randomNumber];

        document.getElementById("TheQuestion").innerHTML = randomPart.question;
        document.getElementById("indexOfPart").value = randomNumber;


        document.getElementById("Option1").innerHTML = randomPart.option1;
        document.getElementById("Option2").innerHTML = randomPart.option2;
        document.getElementById("Option3").innerHTML = randomPart.option3;
        document.getElementById("Option4").innerHTML = randomPart.option4;

        //Delete the chosen part so it cannot repeat another time
        //Parts.splice(randomNumber, 1);

        // console.log(Parts);

        //So the button can't be only disable  once in the first question , and in the next questions it will always be allowed 
        document.getElementById("NextBtn").disabled = true;


    }

    function answer(id) {

        let chosenAnwer = document.getElementById(id).innerHTML;

        //This index help us to indicat wich question the user is trying to answer that moment
        let indexOfPart = document.getElementById("indexOfPart").value;

        let correctOne = Parts[indexOfPart].correct;

        console.log(indexOfPart);
        console.log(chosenAnwer);
        console.log(correctOne);
        // $('#ggggj').one('click' , function)

        document.getElementById("NextBtn").disabled = false;

        if (chosenAnwer == correctOne) {
            // alert("Corret answer");
            correctAnswer = 1;
            falseAnswer = 0;

        } else {
            // alert("False answer");
            falseAnswer = 1;
            correctAnswer = 0;

        }



        check = "Yes";

    }

    function Next() {

        clearInterval(out);
        timerOfTheEndOfTheQuestion(timer);
        document.getElementById("timer").innerHTML = "...";
        NextQuestion();

        progressFillCircles();



    }

    //This function only print the circles 
    function progress(){

        for(let i =0 ; i<FirstLenght;i++){
            document.getElementById("ProgressBar").innerHTML+= `
            <div class="holderOfOneCircle" id="holderOfOneCircle">
                <div class="onlycssCirlce" id="circle${i}">
                </div>
            </div>
            `;
        }
    }

    //This function fill the circle of the progress bar 
    function progressFillCircles(){
        for(let i =0 ;i<FirstLenght-Parts.length;i++){
            document.getElementById("circle"+i).style.display="none";
        }
    }

 


