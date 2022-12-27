//What will happen if the user choosed the first choice
function FirstChoice(){
    document.getElementById("choices").style.display="none";


    document.getElementById("messageOfResults").innerHTML="This is the correction of each question that you get it fault";
    document.getElementById("messageOfResults").style.display="block";
    
    document.getElementById("Message").style.display="block";
}

//What will happen if the user choosed the second choice
function SecondChoice(){

    document.getElementById("choices").style.display="none";

    document.getElementById("InformationOfUser").style.display="block";

    document.getElementById("messageOfResults").innerHTML="Pleaze Enter your Name and Your Email. Then check Your Inbox For the Results !";

    document.getElementById("messageOfResults").style.display="block";

}

//What will happen the user pressed the button Back
function GoBack(){
    location. reload();
}