//What will happen if the user choosed the first choice
/* Hide the "choice book" , display the results and change the "top message" */
function FirstChoice(){
    document.getElementById("choices").style.display="none";

    document.getElementById("Message").style.display="block";

    document.getElementById("messageOfResults").innerHTML="This is the correction of each question that you get it fault";
    document.getElementById("messageOfResults").style.display="block";
}

//What will happen if the user choosed the second choice
/* Hide the "choice Book" , display the "insert form" and change the "top message" */
function SecondChoice(){

    document.getElementById("choices").style.display="none";

    document.getElementById("InformationOfUser").style.display="block";

    document.getElementById("messageOfResults").innerHTML="Pleaze Enter your Name and Your Email. Then check Your Inbox For the Results !";
    document.getElementById("messageOfResults").style.display="block";

}

//What will happen the user pressed the button Back
/* Reload the page so we can go back to the "choice Book" */
function GoBack(){
    location. reload();
}