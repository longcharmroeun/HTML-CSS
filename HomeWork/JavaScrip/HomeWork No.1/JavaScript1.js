function No1() {
    var name = prompt("What's is your name:");
    if (name != null) {
        alert("Your Name Is :" + name);
    }
}

function No2() {
    var name = prompt("What's is your year of birth:",new Date().getFullYear());
    if (name != null) {
        alert("Your age is :" + (new Date().getFullYear() - Number(name)));
    }
}

function No3() {
    var name = prompt("length of the square:");
    if (name != null) {
        alert("Perimeter:" + (Number(name) * 4));
    }
}

function No4() {
    var name = prompt("circle radius:");
    if (name != null) {
        alert("Area of circle:" + Math.pow((Number(name)), 2) * 3.14);
    }
}