
$(document).ready(function() {
    

    var str2 = String("I am Onigbanjo Abdul Basit, A web developer from Lagos...");
    var intervals = 170;
    var letterh2 = str2.split("");
    var cnt1 = 0;

    var str = new String("Welcome to my To-Do app!");
    var interval = 170;
    var letters = str.split("");
    var cnt = 0;


    var f = function() {
            document.getElementById("h1").innerHTML = document.getElementById("h1").innerHTML + (letters[cnt]);
            if( cnt++<(letters.length-1)) {
            setTimeout(f, interval)
        }
    }

    var f1 = function () {
        document.getElementById("h2").innerHTML = document.getElementById("h2").innerHTML + (letterh2[cnt1]);
                if(cnt1++<(letterh2.length-1)) {
                setTimeout(f1, intervals)
                }
    }
         f();
        f1();
        
})


