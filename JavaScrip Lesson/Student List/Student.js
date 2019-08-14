var Counter = 0;
var Next = 0;
var arr = new Array();
var tmp = "null";
var ID = 0;
function StudentInsert() {
    if (Counter >= 15) {
        Counter = 0;
        arr.push(tmp);
        tmp = "null";
        var myNode = document.getElementById("table");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
        Next++;
    }

    if (tmp == "null") {

        if (Next == 8) {
            var myNode = document.getElementById("menu");
            while (myNode.firstChild) {
                myNode.removeChild(myNode.firstChild);
            }

            var label = document.createElement("label");
            label.innerHTML = "Page:";
            document.getElementById("menu").appendChild(label);

            var select = document.createElement("select");
            select.setAttribute("onchange", "myfunction(this)");
            select.setAttribute("id", "select");

            for (var i = 0; i <= Next; i++) {
                var option = document.createElement("option");
                option.setAttribute("value", i);
                option.innerHTML = i;
                select.appendChild(option);
            }

            document.getElementById("menu").appendChild(select);
        }
        else if (Next > 8) {
            var option = document.createElement("option");
            option.setAttribute("value", Next);
            option.innerHTML = Next;
            document.getElementById("select").appendChild(option);
        }
        else {
            var button = document.createElement("button");
            button.setAttribute("type", "button");
            button.setAttribute("onclick", "Page(this)");
            button.setAttribute("id", Next);
            button.innerHTML = Next;

            document.getElementById("menu").appendChild(button);
        }
    }
    else {
        document.getElementById("table").innerHTML = tmp;
    }

    var row = document.createElement("div");
    row.className = "Row";

    Counter++;

    var div = document.createElement("div");
    div.className = "Row Row Head ID Body";
    div.innerHTML = ++ID;
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

    tmp = document.getElementById("table").innerHTML;
}

function Page(bt) {
    if (bt.innerHTML == arr.length) {
        document.getElementById("table").innerHTML = tmp;
    }
    else {
        document.getElementById("table").innerHTML = arr[Number(bt.innerHTML)];
    }
}

function myfunction(bt) {
    if (bt.value == arr.length) {
        document.getElementById("table").innerHTML = tmp;
    }
    else {
        document.getElementById("table").innerHTML = arr[bt.value];
    }
}