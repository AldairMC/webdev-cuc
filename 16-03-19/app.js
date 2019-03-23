/*
var nombreOne = "Pablo";
var nombreTwo = "Juan";

var con_cat = nombreOne+ " "+nombreTwo;

var para = document.querySelector("div");
para.innerHTML = con_cat;
*/


var buton = document.getElementById("btn").addEventListener("click", function() {
    document.getElementById("divs");
        divs.innerHTML = "start";
        divs.style.background = "green";
        setTimeout(() => {
            divs.innerHTML = "Stop";
            divs.style.background = "red";
        }, 2000);


        setInterval(function(){
            divs.style.webkitTransform = `rotate(10deg)`;    
        },2000);
    });
        
    

