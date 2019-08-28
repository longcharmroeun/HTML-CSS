var pieces = new Array();

function Cut() {
    pieces = new Array();
    corrent = new Array();
    var myNode = document.getElementById("id");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    var image = new Image();
    image.src = document.getElementById("url").value;
    image.onload = function () {
        var width = image.width / document.getElementById("row").value;
        var height = image.height / document.getElementById("column").value;
        var y = 0;
        var counter = 0;

        for (var i = 0; i < document.getElementById("column").value; i++) {

            var x = 0;
            for (var j = 0; j < document.getElementById("row").value; j++) {
                var canvas = document.createElement("canvas");
                canvas.setAttribute("width", width);
                canvas.setAttribute("height", height);
               
                canvas.getContext("2d").drawImage(image, x, y, width, height, 0, 0, width, height);
                pieces.push({ Key: counter, value: canvas });
                x += width;
                counter++;
            }
            y += height;
        }
        counter = 0;
        for (var i = 0; i < document.getElementById("column").value; i++) {
            var row = document.createElement("div");
            row.className = "Row";
            for (var j = 0; j < document.getElementById("row").value; j++) {
                var div = document.createElement("div");
                div.setAttribute("ondrop", "drop(event,this)");
                div.setAttribute("ondragover", "allowDrop(event)");
                div.setAttribute("draggable", "true");
                div.setAttribute("ondragstart", "drag(event)");
                div.setAttribute("id", counter);
                div.className = "div1";

                div.append(pieces[counter].value)

                row.appendChild(div);

                counter++;
            }
            document.getElementById("id").appendChild(row);
        }
    }
}

function Check() {
    var num = document.getElementById("column").value * document.getElementById("row").value;
    var tmp = 0;
    for (var i = 0; i < num; i++) {
        if (pieces[i].Key == document.getElementById(i).id) {
            tmp++;
            alert(document.getElementById(i).id);
        }
    }
    if (tmp == num) {
        alert("you Wong!");
    }
    else {
        alert("Plz try Again!");
    }
}

function Shuffle() {
    var myNode = document.getElementById("id");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    shuffle(pieces);
    counter = 0;
    for (var i = 0; i < document.getElementById("column").value; i++) {
        var row = document.createElement("div");
        row.className = "Row";
        for (var j = 0; j < document.getElementById("row").value; j++) {
            var div = document.createElement("div");
            div.setAttribute("ondrop", "drop(event,this)");
            div.setAttribute("ondragover", "allowDrop(event)");
            div.setAttribute("draggable", "true");
            div.setAttribute("ondragstart", "drag(event)");
            div.setAttribute("id", counter);
            div.className = "div1";

            div.append(pieces[counter].value)

            row.appendChild(div);

            counter++;
        }
        document.getElementById("id").appendChild(row);
    }
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text/plain", ev.target.id);
}

function drop(ev,th) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text/plain");
    document.getElementById(th.id).appendChild(document.getElementById(data).firstChild);
    document.getElementById(data).appendChild(document.getElementById(th.id).firstChild);
}

function shuffle(array) {
    array.sort(() => Math.random() - 0.5);
}