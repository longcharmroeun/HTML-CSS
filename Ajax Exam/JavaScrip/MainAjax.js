var id = 0;
function loadDoc() {
    document.getElementById("button").style.display = 'block';
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
                label.className = "link link_animated";
                label.innerHTML = json[i].Pathfile;

                var tmp = document.createElement("div");
                tmp.className = "container";
                tmp.appendChild(label);

                div.appendChild(tmp);

                var label = document.createElement("audio");
                label.setAttribute("controls", "controls");
                var audio = document.createElement("source");
                audio.setAttribute("src", json[i].Pathfile);
                audio.setAttribute("type", "audio/mp3");
                label.appendChild(audio);
                div.appendChild(label);

                document.getElementById("Table").appendChild(div)
            }
            if (json.length < 5) {
                document.getElementById("button").style.display = 'none';
            }
        }
    };
    if (document.getElementById("search").value != "") {
        xhttp.open("POST", "../Request/SearchFile.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("Search=" + document.getElementById("search").value + "&Page=" + id);
    }
    else if (document.getElementById("select").value != 5) {
        xhttp.open("POST", "../Request/CategorySort.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("CategoryID=" + document.getElementById("select").value + "&Page=" + id);
    }
    else {
        xhttp.open("POST", "../Request/AllSound.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("Page=" + id);
    }
    id += 5;
}

function Search(text) {
    document.getElementById("button").style.display = 'block';
    id = 0;
    var myNode = document.getElementById("Table");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
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
                label.className = "link link_animated";
                label.innerHTML = json[i].Pathfile;

                var tmp = document.createElement("div");
                tmp.className = "container";
                tmp.appendChild(label);

                div.appendChild(tmp);

                var label = document.createElement("audio");
                label.setAttribute("controls", "controls");
                var audio = document.createElement("source");
                audio.setAttribute("src", json[i].Pathfile);
                audio.setAttribute("type", "audio/mp3");
                label.appendChild(audio);
                div.appendChild(label);

                document.getElementById("Table").appendChild(div)
            }
            if (json.length < 5) {
                document.getElementById("button").style.display = 'none';
            }
        }
    };
    xhttp.open("POST", "../Request/SearchFile.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Search=" + text.value + "&Page=" + id);
    id += 5;
}

function CategorySort(select) {
    document.getElementById("button").style.display = 'block';
    id = 0;
    var myNode = document.getElementById("Table");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    if (select.value!=5) {
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
                    label.className = "link link_animated";
                    label.innerHTML = json[i].Pathfile;

                    var tmp = document.createElement("div");
                    tmp.className = "container";
                    tmp.appendChild(label);

                    div.appendChild(tmp);

                    var label = document.createElement("audio");
                    label.setAttribute("controls", "controls");
                    var audio = document.createElement("source");
                    audio.setAttribute("src", json[i].Pathfile);
                    audio.setAttribute("type", "audio/mp3");
                    label.appendChild(audio);
                    div.appendChild(label);

                    document.getElementById("Table").appendChild(div)
                }
                if (json.length < 5) {
                    document.getElementById("button").style.display = 'none';
                }
            }
        };
        xhttp.open("POST", "../Request/CategorySort.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("CategoryID=" + select.value + "&Page=" + id);
        id += 5;
    }
    else {
        loadDoc();
    }
}