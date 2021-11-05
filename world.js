"use strict";

window.onload = function() {
    let btn = document.getElementById("lookup");
    let search = document.getElementsByTagName("input")[0];
    let result = document.getElementById("result");

    btn.addEventListener('click', function(element) {
        element.preventDefault();
        var text = search.value.trim();

        // remove previous result
        result.innerHTML = "";

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                result.innerHTML = this.responseText;
            }
        };

        if(text.length == 0) { 
            xmlhttp.open("GET", "world.php", true);
            xmlhttp.send();
        }
        else if(/[a-zA-Z]/.test(text)) {
            xmlhttp.open("GET", "world.php?country="+text, true);
            xmlhttp.send();
        }
        else {
            alert("Please enter only letters.");
        }
    });

};