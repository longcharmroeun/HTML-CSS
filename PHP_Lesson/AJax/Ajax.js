var id = 0;
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(this.responseText);
            for (var i = 0; i < json.length; i++) {

                var div = document.createElement("div");
                div.className = 'Row';

                var label = document.createElement("label");
                label.className = "Row Head QTY Body";
                label.innerHTML = json[i].ID;
                div.appendChild(label);

                var label = document.createElement("label");
                label.className = "Row Head Name Body";
                label.innerHTML = json[i].Name;
                div.appendChild(label);

                var label = document.createElement("label");
                label.className = "Row Head Unit-Price Body";
                label.innerHTML = json[i].Price;
                div.appendChild(label);

                var label = document.createElement("label");
                label.className = "Row Head QTY Body";
                label.innerHTML = json[i].Stock;
                div.appendChild(label);

                document.getElementById("table").appendChild(div);
            }
            if (json.length < 5) {
                document.getElementById("button").style.display = 'none';
            }
        }
    };
    xhttp.open("POST", "LoadData.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("start_ID="+id);
    id += 10;
}

function insert() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert("Bigo");
        }
    };
    xhttp.open("GET", "InsertData.php?name=" + document.getElementById("name").value + "&price=" + document.getElementById("price").value + "&stock=" + document.getElementById("name").value, true);
    xhttp.send();
    id += 5;
}


