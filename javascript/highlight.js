
var input = document.getElementById('in'), div = document.getElementById('input1');

input.addEventListener('focus', function() {
    div.classList.add('focused');
}, false);

input.addEventListener('blur', function() {
    div.classList.remove('focused');
}, false);
