var searchOriginInput = document.getElementById("searchOriginInput");
var searchDestinationInput = document.getElementById("searchDestinationInput");

var searchOriginResults = document.getElementById("searchOriginResults");
var searchDestinationResults = document.getElementById("searchDestinationResults");

function search(value, input, results) {
    var value = event.target.value;
    if (!value) {
        results.innerHTML = "";
    }
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var origins = JSON.parse(this.responseText).results;
                results.innerHTML = "";

                origins.forEach(c => {
                    const li = document.createElement('li');
                    li.innerText = c.origin;
                    li.addEventListener('click', function () {
                        input.value = c.origin;
                        results.innerHTML = "";
                    });
                    results.appendChild(li);
                });
            }
        };
        xhttp.open("GET", `search.php?origin=${value}`, true);
        xhttp.send();
    }
}

searchOriginInput.addEventListener("input", function (e) {
    search(e.target.value, searchOriginInput, searchOriginResults)
});
searchDestinationInput.addEventListener("input", function (e) {
    search(e.target.value, searchDestinationInput, searchDestinationResults)
});

