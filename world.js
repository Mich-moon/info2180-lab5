"use strict";

window.onload = function() {
    let search = document.getElementsByTagName("button")[0];

    search.addEventListener('click', function(element) {
        element.preventDefault();

        var text = search.value.trim();
        if(/^[a-zA-Z]/.test(text)) {

        }
        else {
            alert("Please enter only letters.");
        }
    })

    function getCountry() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
          if (httpRequest.status === 200) {
            var response = httpRequest.responseText;
            alert(response);
          } else {
            alert('There was a problem with the request.');
          }
        }
      }
};