function dis(val) {
    var current = eval(document.getElementById("result").value);
    current = current + eval(val);
    document.getElementById("result").value = current;
}

function load_dis(val) {
    document.getElementById("result").value = val;
    
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

    $("input[type='button']").removeClass("active");    
    
    return true;
}

function sample() {
    console.log(document.getElementById("result").value);
    // DO THIS IF POSSIBLE - Change the color of the button when the input is the same as the button's value
    var elements = document.querySelectorAll("input[type=button]");  
    for(var i = 0, len = elements.length; i < len; i++) {   
        if (elements[i].value == document.getElementById("result").value) {
            console.log("YEAH EQUALS");
            $("input[type='button']").removeClass("active");
            $(elements[i]).addClass("active");
        } else {
            $(elements[i]).removeClass("active");
        }
        console.log(elements[i].value + ' ' + document.getElementById("result").value);

        
    }
}
