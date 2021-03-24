function dis(val) {
    var current = eval(document.getElementById("result").value);
    current = current + eval(val);
    document.getElementById("result").value = current
}

//function that evaluates the digit and return result
function solve() {
    let x = document.getElementById("result").value
    let y = eval(x)
    document.getElementById("result").value = y
}

//function that clear the display
function clr() {
    document.getElementById("result").value = "0"
}

// function for loading only whole numbers
function onlyNumber(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}