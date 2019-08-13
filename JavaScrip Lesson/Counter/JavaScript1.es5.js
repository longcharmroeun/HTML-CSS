"use strict";

var Count = 0;
var Array = new Array();
function CounterClick() {
    document.getElementById("num").innerText = ++Count;
    Array.push(Count);
    document.getElementById("arr").innerText = Array.length;
}

