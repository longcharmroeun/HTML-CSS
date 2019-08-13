function bt(text) {
    if (text.innerText == "C") {
        document.getElementById("sc").value ="";
    }
    else if (text.innerText == "=") {
        document.getElementById("sc").value += "=" + eval(document.getElementById("sc").value);
    }
    else {
        document.getElementById("sc").value += text.innerText;asd
    }
}