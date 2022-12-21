    
    var seconds = 30;
    setInterval(function() {
        
        if(seconds == 0){
            document.getElementById("timer").innerHTML = "Done";
            exist();
        }

        document.getElementById("timer").innerHTML =  seconds + "s ";

        seconds--;

    },1000)
