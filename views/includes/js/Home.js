    function ReadyGo(){
        var seconds = 3;
        
        setInterval(function() {

            //Play the sound of 3 2 1 GO
            //How to use sound effect
            //https://noaheakin.medium.com/adding-sound-to-your-js-web-app-f6a0ca728984#:~:text=The%20simplest%20way%20to%20add,starts%20playing%20the%20current%20audio.
            document.querySelector('#audio').play();
            
            document.getElementById("holderOfStartBtn").style.display="none";
            if(document.URL==("http://localhost/AWS-Cloud-Practitioner-Knowledge-Test/views/Help.php")){
                document.getElementById("HolderOfHelpDescription").style.display="none";
            }
            document.getElementById("holderOfHomeTimer").style.display="block";

            if(seconds == 0){
                document.getElementById("timerHome").innerHTML = "Readyy";

                setInterval(function() {

                    document.getElementById("timerHome").innerHTML = "Goo";

                    setInterval(function() {
                        window.location.href ="./Test.php";              
                    },1000)

                },1000)


            }
    
            document.getElementById("timerHome").innerHTML =  seconds ;
    
            seconds--;
    
        },1000)
    
    }
    