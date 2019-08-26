Header = new Array();
function Load() {
    Header.push({ Key: "ID", ClassName: "Row Head QTY Body" });
}

function onload() {
    document.getElementById("header").appendChild(Colunm());
}

function Colunm() {
    var div = document.createElement("div");
    div.className = "Caculator";
    for (var i = 0; i < 20; i++) {
        div.appendChild(TableHeader("Row"));
    }
    return div;
}

function TableHeader(ClassName) {
    Load();
    var div = document.createElement("div");
    div.className = ClassName;
    for (var i = 0; i < 6; i++) {
        var label = document.createElement("input");
        label.className = Header[0].ClassName;

        div.appendChild(label);
    }

    return div
}