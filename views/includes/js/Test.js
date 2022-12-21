var Parts = [

    part1 = {
        question:`1) Why is AWS more economical than 
        traditional data centers for applications with
        varying compute workloads?`,

        option1:`A) Amazon EC2 costs are billed on a monthly basis`,

        option2:`B) Users retain full administrative access to their Amazon EC2 instances.`,

        option3:`C) Amazon EC2 instances can be launched on demand when needed.`,

        option4:`D) Users can permanently run enough instances to handle peak workloads.`
    }

    ,

    part2 = {
        question:`2) Which AWS service would simplify
        the migration of a database to AWS?`,

        option1:`A) AWS Storage Gateway`,

        option2:`B) AWS Database Migration Service (AWS DMS)`,

        option3:`C) Amazon EC2`,

        option4:`D) Amazon AppStream 2.0`
    }

    ,

    part3 = {
        question:`3) Which AWS offering enables users to find, 
        buy, and immediately start using software solutions 
        in their AWS environment?`,

        option1:`A) AWS Config`,

        option2:`B) AWS OpsWorks`,

        option3:`C) AWS SDK`,

        option4:`D) AWS Marketplace`
    }


    
]






timerOfTheEndOfTheQuestion(3);
NextQuestion();





    
function timerOfTheEndOfTheQuestion(seconds){

    var out = setInterval(function() {

        seconds--;
        if(seconds === 0){

            document.getElementById("timer").innerHTML = "Done";
            NextQuestion();

            //How to breake out of setinterval function
            //https://stackoverflow.com/questions/1795100/how-to-exit-from-setinterval
            // clearInterval(out);
            seconds = 5;
        }else{
            document.getElementById("timer").innerHTML =  seconds + "s ";
        }


        




    },1000)
}
    

function NextQuestion(){

    
    //How to Get an Object's Value by Index using JavaScript
    //https://bobbyhadz.com/blog/javascript-get-value-of-object-by-index#:~:text=To%20get%20a%20value%20of,values(obj)%5B1%5D%20.&text=Copied!

    //How to set a random index
    //Math floor for now x,xxx
    //https://www.w3schools.com/jsref/jsref_random.asp
    // console.log(Object.values(Parts)[Math.floor((Math.random() * 3))].question);

    //How to Get the length of an object
    //https://www.tutorialrepublic.com/faq/how-to-get-the-length-of-a-javascript-object.php#:~:text=You%20can%20simply%20use%20the,of%20elements%20in%20that%20array.
    var randomNumber = Math.floor((Math.random() * Parts.length ));
    var randomPart = Parts[randomNumber];

    console.log(randomNumber);

    document.getElementById("TheQuestion").innerHTML = randomPart.question;

    document.getElementById("Option1").innerHTML = randomPart.option1;
    document.getElementById("Option2").innerHTML = randomPart.option2;
    document.getElementById("Option3").innerHTML = randomPart.option3;
    document.getElementById("Option4").innerHTML = randomPart.option4;

    //Delete the chosen part so it cannot repeat another time
    Parts.splice(randomNumber, 1);

   if(Parts.length==0){
    
   }
    


}




