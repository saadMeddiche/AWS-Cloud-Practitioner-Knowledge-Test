    /* Hint: The ids in the home page are used in the help page
    but the ids in the help page are not used in the home page */ 

    /* This function hide the start button and display the counter */
    function ReadyGo(){

        var seconds = 3;
    
        setInterval(function() {

            //Play the sound of 3 2 1 GO
            //How to use sound effect
            //https://noaheakin.medium.com/adding-sound-to-your-js-web-app-f6a0ca728984#:~:text=The%20simplest%20way%20to%20add,starts%20playing%20the%20current%20audio.
            document.querySelector('#audio').play();
            
            document.getElementById("holderOfStartBtn").style.display="none";

            //The script Home.js is used in two pages
            //There is an error happen in the home page bc: "HolderOfHelpDescription" id is not in home , so we need to check first if we are in the help page then we use it
            if(document.URL==("http://localhost/AWS-Cloud-Practitioner-Knowledge-Test/views/Help.php")){
                document.getElementById("HolderOfHelpDescription").style.display="none";
            }

            document.getElementById("holderOfHomeTimer").style.display="block";

            if(seconds == 0){
                document.getElementById("timerHome").innerHTML = "Ready";

                setInterval(function() {

                    document.getElementById("timerHome").innerHTML = "Goo";

                    setInterval(function() {
                        window.location.href ="./Test.php";              
                    },1000)

                },1000)


            }else{
                
                document.getElementById("timerHome").innerHTML =  seconds ;
    
                seconds--;
            }
    
            
    
        },1000)
    
    }
    