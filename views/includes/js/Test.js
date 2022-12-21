var Parts = [

    part1 = {
        question:`Why is AWS more economical than 
        traditional data centers for applications with
        varying compute workloads?`,

        option1:`Amazon EC2 costs are billed on a monthly basis.`,

        option2:`Users retain full administrative access to their Amazon EC2 instances.`,

        option3:`Amazon EC2 instances can be launched on demand when needed.`,

        option4:`Users can permanently run enough instances to handle peak workloads.`,

        correct:`Amazon EC2 instances can be launched on demand when needed.`   
    }

    ,

    part2 = {
        question:`Which AWS service would simplify
        the migration of a database to AWS?`,

        option1:`AWS Storage Gateway.`,

        option2:`AWS Database Migration Service (AWS DMS).`,

        option3:`Amazon EC2`,

        option4:`Amazon AppStream 2.0.`,

        correct:`AWS Database Migration Service (AWS DMS).`
    }

    ,

    part3 = {
        question:`3) Which AWS offering enables users to find, 
        buy, and immediately start using software solutions 
        in their AWS environment?`,

        option1:`AWS Config.`,

        option2:`AWS OpsWorks.`,

        option3:`AWS SDK.`,

        option4:`AWS Marketplace.`,

        correct:`AWS Marketplace.`
    }


    
]

//This varibale help us to check if any answer has been choosed
var check ="NoneYet"





NextQuestion();

timerOfTheEndOfTheQuestion(4);





    
function timerOfTheEndOfTheQuestion(seconds){

    setInterval(function() {

        seconds--;
        if(seconds === 0){

            document.getElementById("timer").innerHTML = "Done";

            alert(check);

            // if no option has been choosed then choose the "nothing option"
            if(check == "NoneYet" ){
                answer("nothing");
            }

            NextQuestion(document.getElementById("indexOfPart").value);

            //How to breake out of setinterval function
            //https://stackoverflow.com/questions/1795100/how-to-exit-from-setinterval
            // clearInterval(out);
            seconds = 4;
        }else{
            document.getElementById("timer").innerHTML =  seconds + "s ";
        }


    
    },1000)
}
    
function NextQuestion(){
    check ="NoneYet";

    let indexOfPart = document.getElementById("indexOfPart").value;

    // Because the indexOfPart is empty in the first time , we dont need to delete anything
    if(indexOfPart !== ""){
        Parts.splice(indexOfPart, 1);
    }


    

    //So when the user unswer all the question , what will happen ?
    if(Parts.length==0){
        window.location.href ="./Results.php";              
    }
    
    //How to Get an Object's Value by Index using JavaScript
    //https://bobbyhadz.com/blog/javascript-get-value-of-object-by-index#:~:text=To%20get%20a%20value%20of,values(obj)%5B1%5D%20.&text=Copied!

    //How to set a random index
    //Math floor for now x,xxx
    //https://www.w3schools.com/jsref/jsref_random.asp
    // console.log(Object.values(Parts)[Math.floor((Math.random() * 3))].question);

    //How to Get the length of an object
    //https://www.tutorialrepublic.com/faq/how-to-get-the-length-of-a-javascript-object.php#:~:text=You%20can%20simply%20use%20the,of%20elements%20in%20that%20array.
    let randomNumber = Math.floor((Math.random() * Parts.length ));
    let randomPart = Parts[randomNumber];

    document.getElementById("TheQuestion").innerHTML = randomPart.question;
    document.getElementById("indexOfPart").value = randomNumber;


    document.getElementById("Option1").innerHTML = randomPart.option1;
    document.getElementById("Option2").innerHTML = randomPart.option2;
    document.getElementById("Option3").innerHTML = randomPart.option3;
    document.getElementById("Option4").innerHTML = randomPart.option4;

    //Delete the chosen part so it cannot repeat another time
    //Parts.splice(randomNumber, 1);

   console.log(Parts);
    


}

function answer(id){


    
    let chosenAnwer = document.getElementById(id).innerHTML;
    

    //This index help us to indicat wich question the user is trying to answer that moment
    let indexOfPart = document.getElementById("indexOfPart").value;

    let correctAnswer = Parts[indexOfPart].correct;

    console.log(indexOfPart);
    console.log(chosenAnwer);
    console.log(correctAnswer);


    if ( chosenAnwer === correctAnswer && check != "NoneYet" ){
        alert("Corret answer");
    }else{
        alert("False answer");
    }

    check = "Yes";

}







