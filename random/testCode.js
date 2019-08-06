function changeText(){
    document.getElementById("testScript").innerHTML += "<p>uWu</p>"
}
function changeButton(a){
    var x = document.getElementById(a);
    if (x.getAttribute("class") == "btn btn-primary") {
        x.className = "btn btn-secondary";
    }
    else if (x.getAttribute("class") == "btn btn-secondary") {
        x.className = "btn btn-success";
    }
    else if (x.getAttribute("class") == "btn btn-success") {
        x.className = "btn btn-danger";
    }
    else if (x.getAttribute("class") == "btn btn-danger") {
        x.className = "btn btn-warning";
    }
    else if (x.getAttribute("class") == "btn btn-warning") {
        x.className = "btn btn-info";
    }
    else if (x.getAttribute("class") == "btn btn-info") {
        x.className = "btn btn-light";
    }
    else if (x.getAttribute("class") == "btn btn-light") {
        x.className = "btn btn-dark";
    }
    else if (x.getAttribute("class") == "btn btn-dark") {
        x.className = "btn btn-primary";
    }
}
function generateButton(){
    var i;
    var x = document.getElementById("buttonStore");
    for (i=1; i < 9; i++){
        x.innerHTML += '<input name="" id="button'+i+'" class="btn btn-primary" type="button" value="Click me!" onclick="changeButton('+"'button"+i+"');"+'">';
        var m;
        for (m=1; m <= i; m++){
            changeButton("button"+i.toString());
        }
    }
}