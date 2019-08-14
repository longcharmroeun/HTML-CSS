var Counter = 0;
function StudentInsert() {
    var row = document.createElement("div");
    row.className = "Row";

    var div = document.createElement("div");
    div.className = "Row Row Head ID Body";
    div.innerHTML = ++Counter;
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Row Head QTY Body";
    div.innerHTML = document.getElementById("first").value + document.getElementById("last").value;
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Row Head QTY Body";
    div.innerHTML = document.getElementById("address1").value;
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Row Head QTY Body";
    div.innerHTML = document.getElementById("sex").value;
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Row Head QTY Body";
    div.innerHTML = document.getElementById("date").value;
    row.appendChild(div);

    document.getElementById("table").appendChild(row);
}