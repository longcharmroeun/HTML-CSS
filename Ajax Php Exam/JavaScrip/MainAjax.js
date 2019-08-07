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
                label.innerHTML = json[i].Pathfile;
                div.appendChild(label);

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
    xhttp.open("POST", "AllSound.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Page=" + id);
    id += 5;
}

function Search(text) {
    var myNode = document.getElementById("Table");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    if (text.value != "") {
        id = 0;
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
                    label.innerHTML = json[i].Pathfile;
                    div.appendChild(label);

                    var label = document.createElement("audio");
                    label.setAttribute("controls", "controls");
                    var audio = document.createElement("source");
                    audio.setAttribute("src", json[i].Pathfile);
                    audio.setAttribute("type", "audio/mp3");
                    label.appendChild(audio);
                    div.appendChild(label);

                    document.getElementById("Table").appendChild(div);
                }
                if (json.length < 5) {
                    document.getElementById("button").style.display = 'none';
                }
            }
        };
        xhttp.open("POST", "SearchFile.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("Search=" + text.value);
    }
}