    function test(){
        var seconds = 3;
        
        setInterval(function() {

            //Play the sound of 3 2 1 GO
            document.querySelector('#audio').play();
            
            document.getElementById("holderOfStartBtn").style.display="none";
            document.getElementById("holderOfHomeTimer").style.display="block";

            if(seconds == 0){
                document.getElementById("timerHome").innerHTML = "Readyy";

                setInterval(function() {

                    document.getElementById("timerHome").innerHTML = "Goo";

                    setInterval(function() {
                        window.location.href ="./Test.php";              
                    },1000)

                },1000)


                exist();
            }
    
            document.getElementById("timerHome").innerHTML =  seconds ;
    
            seconds--;
    
        },1000)
    
    }
    