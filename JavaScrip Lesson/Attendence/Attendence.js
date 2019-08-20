var Data = Array();
var Counter = 0;
var Next = 1;
var tmp = "";
var Input = Array();
var num = 1;

function Onload() {
    var date = new Date();
    var form = document.forms[0];
    var time = date.getHours().toString().padStart(2, 0) + ":" + date.getMinutes().toString().padStart(2, 0) + ":" + date.getSeconds().toString().padStart(2, 0);;
    form.children[6].children[1].value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) +
        '-' + date.getDate().toString().padStart(2, 0);
    form.children[7].children[1].value = time;
    form.children[8].children[1].value = time;
    document.forms[0].children[1].children[1].value = 1;
}

function Insert() {
    
    if (Data.length == 0) {
        var button = document.createElement("button");
        button.setAttribute("type", "button");
        button.setAttribute("onclick", "Page(this)");
        button.innerHTML = Next;

        document.getElementById("menu").appendChild(button);
        document.getElementById("menu").lastChild.style.backgroundColor = "darkred";
    }

    var form = document.forms[0];

    LoadInput(form);

    var row = document.createElement("div");
    row.className = "Row";
    row.setAttribute("onmouseover", "RowOver(this)")
    row.setAttribute("onmouseout", "RowOut(this)")
    row.setAttribute("onclick", "RowClick(this)")

    var div = document.createElement("div");
    div.className = "Row Head ID Body";
    div.innerHTML = form.children[1].children[1].value;
    div.style.cursor = "pointer";
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Head QTY Body";
    div.innerHTML = form.children[0].children[1].value;
    div.style.cursor = "pointer";
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Head QTY Body";
    div.innerHTML = form.children[3].children[1].value;
    div.style.cursor = "pointer";
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Head QTY Body";
    div.innerHTML = form.children[2].children[1].value;
    div.style.cursor = "pointer";
    row.appendChild(div);

    var div = document.createElement("div");
    div.className = "Row Head QTY Body";
    div.innerHTML = form.children[5].children[1].value;
    div.style.cursor = "pointer";
    row.appendChild(div);
    Counter++;
    if (Counter > 15) {
        tmp = "";
        ClearButton();
        Next++;
        Counter = 1;
        var myNode = document.getElementById("table");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }

        if (Next == 6) {
            var button = document.createElement("button");
            button.setAttribute("type", "button");
            button.setAttribute("onclick", "Page(this)");
            button.setAttribute("style","");
            button.style.color = "black";
            button.style.backgroundColor = "white";
            button.disabled = true;
            button.style.cursor = "context-menu";
            button.style.width = "auto";
            button.style.border = "none";
            button.style.padding = "4px";
            button.style.fontSize = "20px";
            button.style.fontWeight = "bold";
            button.innerHTML = "...";

            document.getElementById("menu").insertBefore(button, document.getElementById("menu").children[Number(document.getElementById("menu").lastChild.innerHTML) - 1]);
            document.getElementById("menu").lastChild.innerHTML = Next;
            document.getElementById("menu").lastChild.style.backgroundColor = "darkred";
        }
        else if (Next > 6) {
            document.getElementById("menu").lastChild.innerHTML = Next;
            document.getElementById("menu").lastChild.style.backgroundColor = "darkred";
        }
        else {
            var button = document.createElement("button");
            button.setAttribute("type", "button");
            button.setAttribute("onclick", "Page(this)");
            button.innerHTML = Next;

            document.getElementById("menu").appendChild(button);
            document.getElementById("menu").lastChild.style.backgroundColor = "darkred";
        }
    }

    Data.push({ key: Next, value: row.innerHTML });
    document.getElementById("table").innerHTML = tmp;
    document.getElementById("table").appendChild(row);
    tmp = document.getElementById("table").innerHTML;
    ClearButton();
    document.getElementById("menu").lastChild.style.backgroundColor = "darkred";

    document.forms[0].children[1].children[1].value = ++num;
}

function RowOver(row) {
    for (var i = 0; i < row.childElementCount; i++) {
        row.children[i].style.backgroundColor = "#808080";
    }
}

function RowOut(row) {
    for (var i = 0; i < row.childElementCount; i++) {
        row.children[i].style.backgroundColor = "whitesmoke";
    }
}

function RowClick(row) {
    var modal = document.getElementById("modal");
    modal.style.display = "block";
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var form = document.forms[1];
    for (var i = 0; i < Input.length; i++) {
        if (row.children[0].innerHTML == Input[i].ID) {
            form.children[0].children[1].value = Input[i].Name;
            form.children[1].children[1].value = Input[i].ID;
            form.children[2].children[1].value = Input[i].Subject;
            form.children[3].children[1].value = Input[i].Teacher;
            form.children[4].children[1].value = Input[i].Room;
            form.children[5].children[1].value = Input[i].Lesson;
            form.children[6].children[1].value = Input[i].Data;
            form.children[7].children[1].value = Input[i].Start;
            form.children[8].children[1].value = Input[i].End;
        }
    }
}

function Page(bt) {
    if (document.getElementById("menu").children[3] == bt && Next > 5) {
        var menu = document.getElementById("menu");
        if (Number(menu.children[3].innerHTML) + 1 < Next) {
            menu.children[1].innerHTML = Number(bt.innerHTML) - 1;
            menu.children[2].innerHTML = Number(bt.innerHTML);
            ClearButton();
            menu.children[2].style.backgroundColor = "darkred";
            menu.children[3].innerHTML = Number(bt.innerHTML) + 1;
        }
        else {
            ClearButton();
            bt.style.backgroundColor = "darkred";
        }
    }
    else if (document.getElementById("menu").children[1] == bt && Next > 5) {
        var menu = document.getElementById("menu");
        if (Number(menu.children[1].innerHTML) - 1 > 1) {
            menu.children[3].innerHTML = Number(menu.children[3].innerHTML) - 1;
            menu.children[2].innerHTML = Number(bt.innerHTML);
            ClearButton();
            menu.children[2].style.backgroundColor = "darkred";
            menu.children[1].innerHTML = Number(bt.innerHTML) - 1;
        }
        else {
            ClearButton();
            bt.style.backgroundColor = "darkred";
        }
    }
    else if (document.getElementById("menu").firstChild == bt && Next > 5) {
        var menu = document.getElementById("menu");
        menu.children[1].innerHTML = 2;
        menu.children[2].innerHTML = 3;
        menu.children[3].innerHTML = 4;
        ClearButton();
        menu.firstChild.style.backgroundColor = "darkred";
    }
    else {
        ClearButton();
        bt.style.backgroundColor = "darkred";
    }
    var myNode = document.getElementById("table");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    for (var i = 0; i < Data.length; i++) {
        if (Data[i].key == bt.innerHTML) {
            var row = document.createElement("div");
            row.className = "Row";
            row.setAttribute("onmouseover", "RowOver(this)")
            row.setAttribute("onmouseout", "RowOut(this)")
            row.setAttribute("onclick", "RowClick(this)");

            row.innerHTML = Data[i].value;
            myNode.appendChild(row);
        }
    }
}

function ClearButton() {
    var button = document.getElementById("menu");
    for (var i = 0; i < button.children.length; i++) {
        if (button.children[i].style.backgroundColor != "white") {
            button.children[i].style.backgroundColor = "#3e64ff";
        }
    }
}

function LoadInput(form) {
    Input.push({
        Name: form.children[0].children[1].value,
        ID: form.children[1].children[1].value,
        Subject: form.children[2].children[1].value,
        Teacher: form.children[3].children[1].value,
        Room: form.children[4].children[1].value,
        Lesson: form.children[5].children[1].value,
        Date: form.children[6].children[1].value,
        Start: form.children[7].children[1].value,
        End: form.children[8].children[1].value
    });
}

function Update() {
  
}